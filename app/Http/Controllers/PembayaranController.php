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
