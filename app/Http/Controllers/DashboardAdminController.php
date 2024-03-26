<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Charts\PesananChart;
use Illuminate\Http\Request;
use App\Charts\KamarFavoritChart;
use App\Charts\KategorikamarChart;
use App\Charts\MenuKamarUserChart;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User;
use App\Models\Pesanan;

class DashboardAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(KategorikamarChart $chart1, MenuKamarUserChart $chart2, PesananChart $chart3)
    {
        $rooms = Kamar::all();
        $data['chart1'] = $chart1->build();
        $data['chart2'] = $chart2->build();
        $data['chart3'] = $chart3->build();
        $totalUsers = User::where('role', '!=', 'admin')->count();
        $roomsAvailable = Kamar::where('status', 'available')->count();
        $roomsBooked = Kamar::where('status', 'booked')->count();
        $totalincome = DB::table('pesanans')->sum('harga_pesanan');

        // Menggabungkan $data dan $rooms ke dalam satu array
        $viewData = array_merge($data, ['rooms' => $rooms, 'totalUsers'=> $totalUsers, 'roomsAvailable'=> $roomsAvailable, 'roomsBooked'=> $roomsBooked]);

        // Query untuk mendapatkan data pesanan dengan informasi pengguna, kategori kamar, dan harga
        $pesanan = Pesanan::with('user', 'kategori')->latest()->take(5)->get();

        return view('admin.dashboard', $viewData, compact('totalincome', 'pesanan'));
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