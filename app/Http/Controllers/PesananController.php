<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Room;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use App\Helpers\DaysCountHelper;
use App\Models\Kamar;

class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function index(Request $request)
    {
        $userID = Auth::id();
        $user = User::find($userID);
        $kamar = Kamar::findOrFail($request->id);
        if ($kamar->status != 'booked') {
            $pesanan = Pesanan::all();
            return view('user.pesanan', compact('pesanan', 'kamar', 'user', 'userID'));
        } else {
            return redirect()->route('menu')->with("error", "mana bisa gtu");
        }
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
        dd($request->all());
        $request->validate([
            'tanggal_awal' => 'required|date|before_or_equal:tanggal_akhir|after_or_equal:today',
            'tanggal_akhir' => 'required|date|after_or_equal:tanggal_awal|after_or_equal:today',
            'metode_pembayaran' => 'required|string',
        ], [
            'tanggal_awal.required' => 'Tanggal awal harus diisi.',
            'tanggal_awal.date' => 'Tanggal awal harus dalam format tanggal yang valid.',
            'tanggal_awal.before_or_equal' => 'Tanggal awal tidak boleh lebih dari tanggal akhir.',
            'tanggal_awal.after_or_equal' => 'Tanggal awal tidak boleh kurang dari tanggal sekarang.',
            'tanggal_akhir.required' => 'Tanggal akhir harus diisi.',
            'tanggal_akhir.date' => 'Tanggal akhir harus dalam format tanggal yang valid.',
            'tanggal_akhir.after_or_equal' => 'Tanggal akhir harus setelah atau sama dengan tanggal awal.',
            'metode_pembayaran.required' => 'Metode pembayaran harus diisi.',
            'metode_pembayaran.string' => 'Metode pembayaran harus berupa teks.',
        ]);

        $usedeadline = true;

        $kamar = $request->id_kamar;
        $tarif = Kamar::findOrFail($kamar)->harga;
        $tglawal = $request->tanggal_awal;
        $tglakhir = $request->tanggal_akhir;
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

        return redirect()->route('histori')->with("success", "Product data added successfully!");
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
