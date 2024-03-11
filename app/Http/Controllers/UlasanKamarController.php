<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\UlasanKamar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UlasanKamarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        return view('user.ulasan_kamar', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        // UlasanKamar::create($request->all());
        // return redirect()->route('ulasan_kamars', $request->input('id'))->with("success", "Review data added successfully!");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        UlasanKamar::create($request->all());
        return redirect()->route('ulasankamar', $request->input('id'))->with("success", "Review data added successfully!");
    }

    /**
     * Display the specified resource.
     */
   public function show(string $id)
{
    $kamar = Kamar::find($id);

    $ulasan_kamars = DB::table('ulasan_kamars')
        ->join('users', 'users.id','=','ulasan_kamars.user_id')
        ->select('ulasan_kamars.*', 'users.name')
        ->where('ulasan_kamars.id','=', $id)
        ->get();

    $user = auth()->user();

    return view('user.ulasan_kamar', compact('user',  'ulasan_kamars', 'kamar'));
}
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UlasanKamar $ulasanKamar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UlasanKamar $ulasanKamar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UlasanKamar $ulasanKamar)
    {
        //
    }
}
