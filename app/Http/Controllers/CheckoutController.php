<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\Pesanan;
use App\Models\Checkout;
use App\Models\Fasilitas;
use App\Models\Pembayaran;
use App\Models\Detailkamar;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        $fasilitas = Fasilitas::all();
        $bank = Pembayaran::where('metode_pembayaran', 'bank')->get();
        $wallet = Pembayaran::where('metode_pembayaran', 'e-wallet')->get();
        $kamar = Kamar::query();
        return view('user.checkout', compact('user', 'fasilitas', 'bank', 'wallet','kamar'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    $user = auth()->user();
    if (is_null($user->address) && is_null($user->telp)) {
        return redirect()->route('profil');
    } else {
        $payments = Pembayaran::all();
        $bank = Pembayaran::where('metode_pembayaran', 'bank')->get();
        $wallet = Pembayaran::where('metode_pembayaran', 'e-wallet')->get();
        $items = Detailkamar::where('status', 'checkout')->where('user_id', $user->id)->get();
        $id = $user->id; // Mengambil ID pengguna
        return view('user.checkout', compact('items', 'user', 'wallet', 'bank', 'id'));
    }
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        dd($request->all());
        // Validasi data yang diterima dari form
        $request->validate([
            'metode_pembayaran' => 'required|in:e-wallet,bank',
            'tujuan_ewallet' => 'required_if:metode_pembayaran,e-wallet',
            'tujuan_bank' => 'required_if:metode_pembayaran,bank',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'awal_berlaku' => 'required|date_format:d-m-Y',
            'akhir_berlaku' => 'required|date_format:d-m-Y|after:awal_berlaku',
            'nama_fasilitas' => 'required|array',
            'nama_fasilitas.*' => 'exists:fasilitas,id',
        ]);

        // Proses penyimpanan foto
        $fotoPath = $request->file('foto')->store('public/foto');

        // Proses penyimpanan data checkout ke database
        $pesanan = new Pesanan();
        $pesanan->metode_pembayaran = $request->metode_pembayaran;
        $pesanan->tujuan_ewallet = $request->tujuan_ewallet;
        $pesanan->tujuan_bank = $request->tujuan_bank;
        $pesanan->foto = $fotoPath;
        $pesanan->awal_berlaku = \Carbon\Carbon::createFromFormat('d-m-Y', $request->awal_berlaku);
        $pesanan->akhir_berlaku = \Carbon\Carbon::createFromFormat('d-m-Y', $request->akhir_berlaku);
        $pesanan->save();

        // Attach fasilitas yang dipilih ke checkout
        $pesanan->fasilitas()->attach($request->nama_fasilitas);

        // Redirect dengan pesan sukses
        return redirect()->route('detailkamar')->with('success', 'Pesanan Anda telah berhasil diproses.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
