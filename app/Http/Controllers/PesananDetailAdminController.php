<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PesananDetailAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        $pesanan = DB::table('pesanans')
        ->leftJoin('users', 'pesanans.user_id', '=', 'users.id')
        ->leftJoin('kamars', 'pesanans.rooms_id', '=', 'kamars.id')
        // ->leftJoin('diskons', 'pesanans.diskon_id', '=', 'diskons.id')
        ->select(
            'pesanans.*',
            'users.name',
            'kamars.nama_kamar'
            // 'diskons.discount as diskon_discount'
            )
        // ->where('pesanans.user_id', $user->id)
        ->get();
        return view('admin.pesanan.index', compact('user', 'pesanan'));
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
