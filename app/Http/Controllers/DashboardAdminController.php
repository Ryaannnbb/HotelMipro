<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Charts\PesananChart;
use Illuminate\Http\Request;
use App\Charts\KamarFavoritChart;
use App\Charts\KategorikamarChart;
use App\Charts\MenuKamarUserChart;
use Illuminate\Foundation\Auth\User;

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

        // Menggabungkan $data dan $rooms ke dalam satu array
        $viewData = array_merge($data, ['rooms' => $rooms, 'totalUsers'=> $totalUsers, 'roomsAvailable'=> $roomsAvailable, 'roomsBooked'=> $roomsBooked]);

        return view('admin.dashboard', $viewData);

        // return view('admin.dashboard', ['chart' => $chart->build()]);
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
