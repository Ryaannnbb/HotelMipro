<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Room;
use App\Models\User;
use App\Models\Kamar;
use App\Models\Diskon;
use App\Models\Pesanan;
use App\Models\Fasilitas;
use App\Models\Pembayaran;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Helpers\DaysCountHelper;
use App\Models\PemakaianFasilitas;
use App\Models\Kategori;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function index(Request $request)
    {
        $user = auth()->user();
        $kamars = Kamar::findOrFail($request->id);
        $kategori_id = $kamars->kategori_id;
        $kategori = Kategori::find($request->id);
        $fasilitas = Fasilitas::all();
        $bank = Pembayaran::where('metode_pembayaran', 'bank')->get();
        $wallet = Pembayaran::where('metode_pembayaran', 'e-wallet')->get();
        return view('user.checkout', compact('user', 'fasilitas', 'bank', 'wallet', 'kamars','request'));
        $diskons = DB::table('diskons')
                ->select('potongan_harga', 'kategori_id', 'akhir_berlaku','jenis')
                ->where('kategori_id', $kategori_id)
                ->first();
        return view('user.checkout', compact('user', 'fasilitas', 'bank', 'wallet', 'kamars', 'diskons','kategori'));

        // dd($kamars);

        // $userID = Auth::id();
        // $user = User::find($userID);
        // $kamar = Kamar::findOrFail($request->id);
        // if ($kamar->status != 'booked') {
        //     $pesanan = Pesanan::all();
        //     return view('user.checkout', compact('pesanan', 'kamar', 'user', 'userID'));
        // } else {
        //     return redirect()->route('usermenu')->with("error", "mana bisa gtu");
        // }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $rules = [
            'tanggal_awal' => [
                'required',
                'date',
                'before_or_equal:tanggal_akhir',
                Rule::unique('pesanans')->where(function ($query) use ($request) {
                    return $query->where('rooms_id', $request->id_kamar)
                        ->whereDate('tanggal_akhir', '>=', $request->tanggal_awal)
                        ->whereDate('tanggal_awal', '<=', $request->tanggal_akhir);
                }),
            ],
            'tanggal_akhir' => [
                'required',
                'date',
                'after_or_equal:tanggal_awal',
                Rule::unique('pesanans')->where(function ($query) use ($request) {
                    return $query->where('rooms_id', $request->id_kamar)
                        ->whereDate('tanggal_akhir', '>=', $request->tanggal_awal)
                        ->whereDate('tanggal_awal', '<=', $request->tanggal_akhir);
                }),
            ],
            'metode_pembayaran' => 'required|string',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:10048',
            // 'nama_fasilitas' => 'required|array',
            // 'nama_fasilitas.*' => 'exists:fasilitas,id',

            // 'kategori_id' => 'nullable|exists:diskons,id',
        ];

        $message = [
            'tanggal_awal.required' => 'Tanggal awal harus diisi.',
            'tanggal_awal.date' => 'Tanggal awal harus dalam format tanggal yang valid.',
            'tanggal_awal.before_or_equal' => 'Tanggal awal tidak boleh lebih dari tanggal akhir.',
            'tanggal_awal.after_or_equal' => 'Tanggal awal tidak boleh kurang dari tanggal sekarang.',
            'tanggal_awal.unique' => 'The selected date range is already booked. Please choose another date range.',
            'tanggal_akhir.required' => 'Tanggal akhir harus diisi.',
            'tanggal_akhir.date' => 'Tanggal akhir harus dalam format tanggal yang valid.',
            'tanggal_akhir.after_or_equal' => 'Tanggal akhir harus setelah atau sama dengan tanggal awal.',
            'tanggal_akhir.unique' => 'The selected date range is already booked. Please choose another date range.',
            'metode_pembayaran.required' => 'Metode pembayaran harus diisi.',
            'metode_pembayaran.string' => 'Metode pembayaran harus berupa teks.',
            'foto.required' => 'The photo field is required.',
            'foto.image' => 'The photo must be an image.',
            'foto.mimes' => 'The photo must be a file of type: jpeg, png, jpg, gif.',
            'foto.max' => 'The photo may not be greater than 10 mb.',
            // 'nama_fasilitas.required' => 'The facility field is required.',
            // 'nama_fasilitas.array' => 'The facility field must be an array.',
            // 'nama_fasilitas.*.exists' => 'Selected facility is invalid.',
        ];

        if ($request->metode_pembayaran == 'bank') {
            $rules['tujuan_bank'] = 'required';
        } else if ($request->metode_pembayaran == 'e-wallet') {
            $rules['tujuan_ewallet'] = 'required';
        }

        $request->validate($rules, $message);

        $usedeadline = true;

        $user = $request->user_id;
        $diskon = $request->diskon_id;
        $kamar = $request->id_kamar;
        $tarif = Kamar::find($kamar)->harga;
        $file = $request->file('foto');
        $kategori = $request->kategori_id;
        $tglawal = Carbon::parse($request->tanggal_awal)->format('Y-m-d H:i');
        $tglakhir = Carbon::parse($request->tanggal_akhir)->format('Y-m-d H:i');
        $jedacheckout = DaysCountHelper::jedacheckout();
        $jedacheckin = DaysCountHelper::jedaCheckIn();
        $jampergatiancheckin = DaysCountHelper::jamPergantianCheckIn();
        $kategori_id = $request->kategori_id;
        $diskon = $request->jenis;

        $buktipembayaran = Str::random(10) . '.' . $file->getClientOriginalExtension();
        $file->storeAs('public/kamar', $buktipembayaran);

        $totalinap = 0;

        if ($usedeadline) {
            $totalinap += DaysCountHelper::formateDateWithDeadline($jedacheckin, $jedacheckout, $jampergatiancheckin, $tglawal, $tglakhir);
        } else {
            $totalinap += DaysCountHelper::formatDate($tglawal, $tglakhir, $jedacheckout);
        }

        $kategori_id = $kategori_id ?? null;
        // Set nilai default sebagai null jika 'kategori_id' tidak ada
        $diskon_amount = 0;
        if ($kategori_id) {
            $diskon = Diskon::find($request->diskon_id);
            // dd($diskon);
            // dd($diskon);
            // dd($kategori_id);
            // Hitung total harga pesanan
        $totalFacilityPrice = session()->get('totalFacilityPrice', 0);
        // dd($totalFacilityPrice);
        $totalharga = $totalinap * $tarif;
        // dd($totalharga);
        // Periksa apakah totalFacilityPrice tidak nol sebelum digunakan dalam perhitungan
        // dd($totalFacilityPrice);
        if ($totalFacilityPrice != 0) {
            // Hitung total harga pesanan


            // Tambahkan harga fasilitas jika ada
            $totalFacilityPrice = session()->get('totalFacilityPrice', 0);
            // $totalharga += $totalFacilityPrice;
            if ($diskon) {
                $diskon_amount = $diskon->potongan_harga;
                $totalharga = $totalinap * $tarif - $diskon_amount;
            }

        }

        $pesanan = new Pesanan;
        $pesanan->email = $request->email;
        $pesanan->username = $request->username;
        $pesanan->telp = $request->no_tlp;
        $pesanan->user_id = $user;
        $pesanan->kategori_id = $kategori;
        $pesanan->tanggal_awal = $tglawal;
        $pesanan->tanggal_akhir = $tglakhir;
        $pesanan->rooms_id = $kamar;
        $pesanan->diskon_id = $diskon->id;
        $diskon->diskon = $request->jenis;
        $pesanan->metode_pembayaran = $request->metode_pembayaran;
        $pesanan->invoice = $buktipembayaran;
        $pesanan->harga_pesanan =  (int) $totalharga ?? (int) $totalinap * $tarif - $diskon_amount;


        if ($kategori_id) {
            $pesanan->kategori_id = $kategori_id;
        } else {
            $pesanan->kategori_id = null; // Atau berikan nilai default yang sesuai
        }

        $pesanan->save();

        // Update status kamar menjadi booked
        Kamar::findOrFail($kamar)->update(['status' => 'booked']);
       // Jika hanya satu fasilitas yang dipilih
 // Simpan detail pemakaian fasilitas
//
//  if (!empty($request->nama_fasilitas)) {
//     foreach ($request->nama_fasilitas as $fasilitas_id) {
//         if (Fasilitas::where('id', $fasilitas_id)->exists()) {
//             $fasilitas = Fasilitas::find($fasilitas_id);

//             $detailPemakaian = new PemakaianFasilitas;
//             $detailPemakaian->pesanan_id = $pesanan->id;
//             $detailPemakaian->fasilitas_id = $fasilitas_id;
//             $detailPemakaian->jumlah_pemakaian = 1; // Set jumlah pemakaian sesuai kebutuhan

//             // Harga pemakaian diatur sesuai dengan harga satuan fasilitas
//             $detailPemakaian->harga_pemakaian = intval($fasilitas->harga_satuan ?? 0);
//             $detailPemakaian->save();
//         }
//     }
// }
        return redirect()->route('homeuser')->with("success", "Product data added successfully!");
    }
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Mendapatkan detail pesanan berdasarkan ID
        $pesanan = Pesanan::findOrFail($id);
        // Mendapatkan informasi profil
        $profil = User::where('email', $pesanan->email)->select('username', 'email', 'telp')->first();
        // Inisialisasi $data dengan array kosong sebagai nilai default
        $data = [];
        // Jika profil ditemukan, isi data dengan informasi dari pesanan dan profil
        if ($profil) {
            $data = [
                'nama' => $profil->username ?? '', // Pastikan untuk menambahkan null coalescing operator untuk mencegah kesalahan jika username tidak tersedia
                'email' => $profil->email ?? '', // Sama seperti sebelumnya
                'no_tlp' => $profil->telp ?? '', // Sama seperti sebelumnya
                'tanggal_awal' => $pesanan->tanggal_awal,
                'tanggal_akhir' => $pesanan->tanggal_akhir,
                'fasilitas' => $pesanan->fasilitas,
                'metode_pembayaran' => $pesanan->metode_pembayaran,
            ];
        }
        // Menampilkan halaman detail pesanan dengan informasi profil
        return view('user.pesanan', ['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        if ($request->has('nama_fasilitas')) {
            $totalFacilityPrice = 0;

            foreach ($request->nama_fasilitas as $fasilitas_id) {
                $pemakaianFasilitas = PemakaianFasilitas::find($fasilitas_id);

                if ($pemakaianFasilitas) {
                    $totalFacilityPrice += $pemakaianFasilitas->harga_pemakaian;
                }
            }

            session()->put('totalFacilityPrice', $totalFacilityPrice);
            return redirect()->back()->withInput(['nama_fasilitas' => $request->nama_fasilitas]);
        } else {
            // Jika tidak ada fasilitas yang dipilih, set total harga fasilitas ke 0 dalam session
            session()->put('totalFacilityPrice', 0);
            return redirect()->back()->withErrors(['error' => 'No facilities selected']);
        }
    }

    public function rejectOrder(Request $request, $id)
    {
        $pesanan = Pesanan::findOrFail($id);
        $pesanan->status = 'reject';
        $pesanan->reject_reason = $request->input('reject_reason');
        $pesanan->save();

        // Kode lainnya...

        return redirect()->back()->with('success', 'Pesanan berhasil ditolak.');
    }
    public function approveOrder($id)
    {
        $pesanan = Pesanan::findOrFail($id);

        // Set status menjadi "approve"
        $pesanan->status = 'approve';
        $pesanan->save();

        return redirect()->back()->with('success', 'Pesanan berhasil disetujui.');
    }

    public function cancelOrder(Request $request, $id)
    {
        $pesanan = Pesanan::findOrFail($id);

        // Hanya izinkan pembatalan jika status pesanan adalah 'pending'
        if ($pesanan->status === 'pending') {
            // Set status pesanan menjadi 'reject' dan simpan alasan pembatalan
            $pesanan->status = 'reject';
            $pesanan->alasan_pembatalan = $request->alasan_pembatalan;
            $pesanan->save();

            return redirect()->back()->with('success', 'Pesanan berhasil dibatalkan.');
        } else {
            return redirect()->back()->with('error', 'Hanya pesanan dengan status "pending" yang dapat dibatalkan.');
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
