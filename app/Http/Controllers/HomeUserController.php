<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Kamars = DB::table('kamars')
        // ->leftJoin('ulasan', 'id', '=', 'ulasan.produk_id')
        ->select('id', 'nama_kamar','path_kamar','harga','deskripsi','status',) // sertakan semua kolom non-agregasi di sini
        // DB::raw('avg(rating) AS rating'), DB::raw('count(ulasan.produk_id) AS totalulasan'))
        ->groupBy('id', 'nama_kamar','path_kamar','harga','deskripsi','status',) // sertakan semua kolom non-agregasi di sini
        ->get();
        $user = auth()->user();
        // $wishlist = Wishlist::where('user_id', $user->id)->get();
        // $productsInWishlist = $user->wishlists;
        return view('user.homeuser', compact('Kamars', 'user'));
    }

    public function Detailkamar(Request $request, $id)
    {
        // $totalpesanan = Detailpesanan::where('status', 'keranjang')->get()->count();
        // $produk = produk::where('id', $id)->get();
        $user = auth()->user();
        $Kamars = DB::table('kamars')
        // ->leftJoin('ulasan', 'id', '=', 'ulasan.produk_id')
        ->select('id', 'nama_kamar','path_kamar','harga','deskripsi','status',) // sertakan semua kolom non-agregasi di sini
        // DB::raw('avg(rating) AS rating'), DB::raw('count(ulasan.produk_id) AS totalulasan'))
        ->where('id', $id)
        ->groupBy('.id', 'nama_kamar','path_kamar','harga','deskripsi','status',) // sertakan semua kolom non-agregasi di sini
        ->get();
        return view('user.kamardetail', compact('Kamars', 'user'));
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
