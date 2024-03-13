<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\Kategori;
use App\Models\Detailkamar;
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
        $kategori = Kategori::all();
        $kamar = Kamar::query();
        $detailkamars = Detailkamar::where('kamar_id')->get();

        // Filter berdasarkan kategori
        $selectedCategories = $request->input('kategori');

        if (!empty($selectedCategories)) {
            $kamar->whereIn('kategori_id', $selectedCategories);
        }

        // Filter berdasarkan harga
        $minPrice = $request->input('min');
        $maxPrice = $request->input('max');

        if (!empty($minPrice) && !empty($maxPrice)) {
            $kamar->whereBetween('harga', [intval($minPrice), intval($maxPrice)]);
        }

        // Menetapkan kembali variabel $kamar setelah menerapkan filter
        $kamar = $kamar->get();

        return view('user.menukamaruser', compact('kamar', 'user', 'kategori', 'minPrice', 'maxPrice', 'selectedCategories','detailkamars'));
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
