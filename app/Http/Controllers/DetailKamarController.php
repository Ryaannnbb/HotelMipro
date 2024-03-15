<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DetailKamarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, $id)
    {
        $user = auth()->user();
        $kamars = Kamar::where('id', $id)->get();
        $pesanan = Pesanan::find($id);
        $diskons = DB::table('diskons')
            ->leftJoin('diskons as diskon', 'diskon.id', '=',  'diskons.id')
            ->select('diskon.potongan_harga', 'diskon.kategori_id', 'diskon.akhir_berlaku')
            ->get();
        // $diskonsArray = $diskons->toArray();
        // $kategoriIds = [];
        // foreach ($diskonsArray as $diskon) {
        //     $kategoriIds[] = $diskon->kategori_id;
        // }
        // $kategoriIds = array_unique($kategoriIds);
        return view('user.detailkamar', compact('user', 'kamars', 'diskons', 'pesanan'));
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
