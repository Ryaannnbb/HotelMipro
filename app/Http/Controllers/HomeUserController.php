<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\Kategori;
use App\Models\Detailkamar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = auth()->user();
        $kamars = Kamar::all();
        $kategoris_with_diskons = Kategori::whereHas('diskons')->get();
        $diskons = DB::table('diskons')
        ->leftJoin('diskons as diskon', 'diskon.id', '=',  'diskons.id')
        ->select('diskon.potongan_harga', 'diskon.kategori_id', 'diskon.akhir_berlaku', 'diskon.jenis')
        ->get();

        // Inisialisasi array untuk menyimpan rating dan total ulasan untuk setiap kamar
        $ratings = [];
        $totalUlasans = [];

        // Hitung rating rata-rata dan total ulasan untuk setiap kamar
        foreach ($kamars as $kamar) {
            $detailkamars = Detailkamar::where('kamar_id', $kamar->id)->get();
            $ratings[$kamar->id] = $detailkamars->avg('rating');
            $totalUlasans[$kamar->id] = $detailkamars->count();
        }

        return view('user.homeuser', compact('kamars', 'user', 'ratings', 'totalUlasans','diskons','kategoris_with_diskons'));
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
    public function homeuser()
    {
        $kamars = DB::table('kamars')
            ->leftJoin('detailkamars', 'kamars.id', '=', 'detailkamars.kamar_id')
            ->select(
                'kamars.id',
                'kamars.nama_kamar',
                'kamars.path_kamar',
                'kamars.harga',
                'kamars.deskripsi',
                'kamars.status',
                DB::raw('avg(detailkamars.rating) AS rating'),
                DB::raw('count(detailkamars.id) AS totalulasan'))
            ->groupBy(
                'kamars.id',
                'kamars.nama_kamar',
                'kamars.path_kamar',
                'kamars.harga',
                'kamars.deskripsi',
                'kamars.status')
            ->groupBy('detailkamars.kamar_id') // Tambahkan pengelompokan berdasarkan kamar_id
            ->get();

        $user = auth()->user();

        return view('user.homeuser', compact('kamars', 'user'));
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
