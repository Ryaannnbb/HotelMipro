<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MenuKamarUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = auth()->user();
        $kamar = Kamar::all();
        return view('user.menukamaruser', compact('kamar', 'user'));

        $kategori = Kategori::all();
        $user = auth()->user();
        $devices = $request->input('device');
        $minPrice = $request->input('min');
        $maxPrice = $request->input('max');

        // Lakukan filter data dengan menggunakan nilai-nilai yang diperoleh dari form
        $query = DB::table('produk')
            ->leftJoin('ulasan', 'produk.id', '=', 'ulasan.produk_id')
            ->select(
                'produk.id',
                'produk.nama_produk',
                'produk.path_produk',
                'produk.harga',
                'produk.stok',
                'produk.deskripsi',
                DB::raw('avg(rating) AS rating'),
                DB::raw('count(ulasan.produk_id) AS totalulasan')
            )
            ->groupBy(
                'produk.id',
                'produk.nama_produk',
                'produk.path_produk',
                'produk.harga',
                'produk.stok',
                'produk.deskripsi'
            );

        if (!empty($devices)) {
            $query->whereIn('kategori_id', $devices);
        } else {
            $devices = [0];
        }

        if (!empty($minPrice) && !empty($maxPrice)) {
            $query->whereBetween('harga', [intval($minPrice), intval($maxPrice)]);
        }

        if (empty($minPrice)) {
            $minPrice = null;
        }

        if (empty($maxPrice)) {
            $maxPrice = null;
        }

        // // Tambahkan filter untuk rating
        // if (!empty($rating)) {
        //     $query->havingRaw('avg(rating) >= ?', [$rating]);
        // }

        // Eksekusi query untuk mendapatkan hasil filter
        $produk = $query->get();

        // dd($wishlist);
        // Lakukan tindakan lainnya, seperti menampilkan data pada view atau mengembalikan respons JSON
        return view('user.produkfilter', compact('produk', 'user', 'kategori', 'devices', 'minPrice', 'maxPrice', 'totalpesanan', 'wishlist'));
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
