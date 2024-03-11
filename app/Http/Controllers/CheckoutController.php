<?php

namespace App\Http\Controllers;

use App\Models\Fasilitas;
use App\Models\Pembayaran;
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
        return view('user.checkout', compact('user', 'fasilitas', 'bank', 'wallet'));
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
        //
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
