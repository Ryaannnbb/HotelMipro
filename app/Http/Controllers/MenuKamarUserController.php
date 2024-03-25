<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\Kategori;
use App\Models\Fasilitas;
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
        $kamars = Kamar::query();
        $detailkamars = Detailkamar::query(); // Mengubah query menjadi objek Detailkamar
        $fasilitas = Fasilitas::all();
        $diskons = DB::table('diskons')
            ->leftJoin('diskons as diskon', 'diskon.id', '=',  'diskons.id')
            ->select('diskon.potongan_harga', 'diskon.kategori_id', 'diskon.akhir_berlaku', 'diskon.jenis')
            ->get();

        // Filter berdasarkan kategori
        $selectedCategories = $request->input('kategori');

        if (!empty($selectedCategories)) {
            $kamars->whereIn('kategori_id', $selectedCategories);
        }

        // Filter berdasarkan harga
        $minPrice = $request->input('min');
        $maxPrice = $request->input('max');

        if (!empty($minPrice) && !empty($maxPrice)) {
            $kamars->whereBetween('harga', [intval($minPrice), intval($maxPrice)]);
        }

         // Filter berdasarkan rating
$selectedRating = $request->input('flexRadio');

// Simpan nilai radio button ke dalam session saat tombol "Go" diklik
session()->put('selectedRating', $selectedRating);

if (!empty($selectedRating)) {
    $kamars->whereIn('id', function ($query) use ($selectedRating, $detailkamars) {
        $query->select('kamar_id')
            ->from('detailkamars')
            ->where('rating', $selectedRating);
    });
}

// Menetapkan kembali variabel $kamars setelah menerapkan filter
$kamars = $kamars->get();

        // Menetapkan kembali variabel $detailkamars setelah menerapkan filter rating
        $detailkamars = $detailkamars->get();

        $ratings = [];
        $totalUlasans = [];

        // Hitung rating rata-rata dan total ulasan untuk setiap kamar
        foreach ($kamars as $kamar) {
            $filteredDetailkamars = $detailkamars->where('kamar_id', $kamar->id); // Filter detail kamar berdasarkan kamar
            $ratings[$kamar->id] = $filteredDetailkamars->avg('rating'); // Hitung rating rata-rata
            $totalUlasans[$kamar->id] = $filteredDetailkamars->count(); // Hitung total ulasan
        }

        return view('user.menukamaruser', compact('kamars', 'user', 'kategori', 'minPrice', 'maxPrice', 'selectedCategories', 'detailkamars', 'ratings', 'totalUlasans','selectedRating','fasilitas','diskons'));
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
