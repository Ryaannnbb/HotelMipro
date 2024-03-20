<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        $pembayaran = Pembayaran::all();
        return view("admin.pembayaran.index", compact('pembayaran','user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = auth()->user();
        $pembayaran = Pembayaran::all();
        return view("admin.pembayaran.create", compact('pembayaran','user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // $request->dd();
    // if ($request->metode_pembayaran === 'bank') {
    //     $request->validate([
    //         'keterangan_bank' => 'required|numeric|digits:10',
    //         'nama' => 'required|string|max:255',
    //         'tujuan_bank' => 'required|string',
    //     ], [
    //         'keterangan_bank.required' => 'Kolom nomor rekening wajib diisi.',
    //         'keterangan_bank.numeric' => 'Nomor rekening harus berupa angka.',
    //         'keterangan_bank.digits' => 'Nomor rekening tidak boleh kurang :digits karakter.',
    //         // 'keterangan_bank.max' => 'Nomor rekening tidak boleh lebih :max karakter.',
    //         'nama.required' => 'Kolom Nama wajib diisi.',
    //         'nama.string' => 'Nama harus berupa teks.',
    //         'nama.max' => 'Nama tidak boleh lebih dari :max karakter.',
    //         'tujuan_bank.required' => 'Kolom bank wajib diisi.',
    //         'tujuan_bank.string' => ' kolom bank harus berupa teks.',
    //     ]);
    // }
    if ($request->metode_pembayaran === 'e-wallet') {
    $request->validate([
        'keterangan_ewallet' => 'required|file|max:255|mimes:jpeg,png,pdf',
        'tujuan_ewallet' => 'required|string|max:255',
        'nama_ewallet' => 'required|string|max:255',
    ], [
        'keterangan_ewallet.required' => 'Kolom E-Wallet wajib diisi.',
        'keterangan_ewallet.file' => 'E-Wallet harus berupa file.',
        'keterangan_ewallet.digits' => 'E-Wallet tidak boleh lebih dari :digits kilobita.',
        'keterangan_ewallet.mimes' => 'E-Wallet harus dalam format JPEG, PNG, atau PDF.',
        'tujuan_ewallet.required' => 'Kolom bank E-Wallet wajib diisi.',
        'tujuan_ewallet.string' => 'bank E-Wallet harus berupa teks.',
        'tujuan_ewallet.max' => 'bank E-Wallet tidak boleh lebih dari :max karakter.',
        'nama_ewallet.required' => 'Kolom Nama E-Wallet wajib diisi.',
        'nama_ewallet.string' => 'Nama E-Wallet harus berupa teks.',
        'nama_ewallet.max' => 'Nama E-Wallet tidak boleh lebih dari :max karakter.',
    ]);
}

    // dd($request->all());

    if($request->keterangan_ewallet == null)
    {
        if($request->keterangan_bank == null)
        {
            return redirect()->route('pembayaran');
        }else{
            Pembayaran::create([
                'metode_pembayaran' => $request->metode_pembayaran,
                'tujuan' => $request->tujuan_bank,
                'keterangan' => $request->keterangan_bank,
                'nama' => $request->nama, // Pastikan 'nama' diisi ketika metode pembayaran adalah bank
            ]);
        }
    }else{
        $namefile = $request->file('keterangan_ewallet');
        $path = $namefile->hashName();
        $namefile->storeAs('public/kamar', $path);
        Pembayaran::create([
            'metode_pembayaran' => $request->metode_pembayaran,
            'tujuan' => $request->tujuan_ewallet,
            'keterangan' => $path,
            'nama_ewallet'=>$request->nama_ewallet,
        ]);
    }
    return redirect()->route('pembayaran')->with('success', 'Successfully added payment');
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
        $pembayaran = Pembayaran::find($id);
        $user = auth()->user();
        return view("admin.pembayaran.edit", compact('pembayaran','user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'metode_pembayaran' => 'required|string|max:255',
        ], [
            'metode_pembayaran.required' => 'The Payment Method column is mandatory.',
            'metode_pembayaran.string' => 'Payment Method must be text.',
            'metode_pembayaran.max' => 'Payment Method must have no more than :max characters.',
        ]);

        $pembayaran = Pembayaran::find($id);
        $pembayaran->update($request->all());
        return redirect()->route('pembayaran')->with("success", "Payment data updated successfully.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pembayaran = Pembayaran::find($id);
        try {
            //code...
            $pembayaran->delete();
            return redirect()->route("pembayaran")->with("success", "Payment data has been successfully deleted!");
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->route('pembayaran')->with("error", "Failed to delete because payment data is in use!");
        }
    }
}
