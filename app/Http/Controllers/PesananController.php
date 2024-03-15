<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Room;
use App\Models\User;
use App\Models\Kamar;
use App\Models\Pesanan;
use App\Models\Fasilitas;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Helpers\DaysCountHelper;
use App\Models\PemakaianFasilitas;
use Illuminate\Http\JsonResponse;
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
        $fasilitas = Fasilitas::all();
        $bank = Pembayaran::where('metode_pembayaran', 'bank')->get();
        $wallet = Pembayaran::where('metode_pembayaran', 'e-wallet')->get();
        return view('user.checkout', compact('user', 'fasilitas', 'bank', 'wallet', 'kamars','request'));

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
            'nama_fasilitas' => 'required|array',
            'nama_fasilitas.*' => 'exists:fasilitas,id',
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
            'nama_fasilitas.required' => 'The facility field is required.',
            'nama_fasilitas.array' => 'The facility field must be an array.',
            'nama_fasilitas.*.exists' => 'Selected facility is invalid.',
        ];

        if($request->metode_pembayaran == 'bank') {
            $rules['tujuan_bank'] = 'required';
        } else if($request->metode_pembayaran == 'e-wallet') {
            $rules['tujuan_ewallet'] = 'required';
        }

        // $kamar = Kamar::findOrFail($request->id_kamar);
        // if ($kamar->status == 'booked') {
        //     return redirect()->route('usermenu')->with("error", "The selected room is already booked.");
        // }

        $request->validate($rules, $message);

        $usedeadline = true;

        $kamar = $request->id_kamar;
        $tarif = Kamar::find($kamar)->harga;
        // $tglawal = $request->tanggal_awal;
        // $tglakhir = $request->tanggal_akhir;
        $tglawal = Carbon::parse($request->tanggal_awal)->format('Y-m-d H:i');
        $tglakhir = Carbon::parse($request->tanggal_akhir)->format('Y-m-d H:i');
        $jedacheckout = DaysCountHelper::jedacheckout();
        $jedacheckin = DaysCountHelper::jedaCheckIn();
        $jampergatiancheckin = DaysCountHelper::jamPergantianCheckIn();

        $totalinap = 0;
        if ($usedeadline) {
            $totalinap += DaysCountHelper::formateDateWithDeadline($jedacheckin, $jedacheckout, $jampergatiancheckin, $tglawal, $tglakhir);
        } else {
            $totalinap += DaysCountHelper::formatDate($tglawal, $tglakhir, $jedacheckout);
        }

        $totalharga = $totalinap * $tarif;
        $pesanan = new Pesanan;
        $pesanan->email = $request->email;
        $pesanan->username = $request->username;
        $pesanan->telp = $request->no_tlp;
        $pesanan->tanggal_awal = $tglawal;
        $pesanan->tanggal_akhir = $tglakhir;
        $pesanan->rooms_id = $kamar;
        $pesanan->metode_pembayaran = $request->metode_pembayaran;
        $pesanan->harga_pesanan = $totalharga;
        $pesanan->save();
        Kamar::findOrFail($kamar)->update(['status' => 'booked']);

        foreach ($request->nama_fasilitas as $fasilitas_id => $jumlahPemakaian) {
            // Periksa apakah fasilitas_id ada dalam tabel fasilitas
            if (Fasilitas::where('id', $fasilitas_id)->exists()) {
                // Ambil fasilitas berdasarkan ID
                $fasilitas = Fasilitas::find($fasilitas_id);

                // Buat detail pemakaian baru
                $detailPemakaian = new PemakaianFasilitas;
                $detailPemakaian->pesanan_id = $pesanan->id;
                $detailPemakaian->fasilitas_id = $fasilitas_id;
                $detailPemakaian->jumlah_pemakaian = $jumlahPemakaian;

                // Set harga pemakaian sesuai dengan harga satuan fasilitas
                // Pastikan untuk menggunakan harga yang diterima dari permintaan
                // Jika harga tidak diterima dari permintaan, gunakan harga default dari database
                $detailPemakaian->harga_pemakaian += intval($fasilitas->harga_satuan ?? 0) * $jumlahPemakaian;
                $detailPemakaian->save();
            }
        }



        // dd($kamar);
        return redirect()->route('homeuser')->with("success", "Product data added successfully!");
    }

    public function updateFacilitiesPrice(Request $request): JsonResponse
{
    $totalFacilityPrice = 0;
    foreach ($request->selectedFacilities as $facility) {
        // Hitung harga total fasilitas
        $totalFacilityPrice += $facility['price'] * $facility['jumlah_pemakaian'];
    }

    // Mengirim total harga fasilitas sebagai respons JSON
    return response()->json(['totalFacilityPrice' => $totalFacilityPrice]);
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
