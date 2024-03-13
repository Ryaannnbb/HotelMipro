<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\Detailkamar;
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
        $kamar = Kamar::where('id', $id)->get();
        $detailkamars = Detailkamar::where('kamar_id', $id)->get();

        foreach ($detailkamars as $detailkamar) {
            $detailkamar->foto = asset('public/storage/kamar/' . $detailkamar->foto);
        }
        
        return view('user.detailkamar', compact('user', 'kamar', 'detailkamars'));
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
        $data = $request->all();

        // Pastikan ulasan tidak kosong sebelum menyimpan
        if (empty($data['ulasan'])) {
            return redirect()->back()->withInput()->withErrors(['ulasan' => 'Ulasan tidak boleh kosong']);
        }

        // Pastikan ada nilai yang diberikan untuk 'foto'
        if (!isset($data['foto'])) {
            $data['foto'] = null;
        }

        // Tambahkan ID kamar ke data
        $data['kamar_id'] = $request->input('id');

        // Simpan ulasan hanya untuk kamar yang sesuai
        Detailkamar::create($data);

        return redirect()->route('detailkamar', $request->input('id'))->with("success", "Review data added successfully!");
    }
        /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $kamar = Kamar::find($id);

        $detailkamars = DB::table('detailkamars')
            ->join('users', 'users.id','=','detailkamars.user_id')
            ->select('detailkamars.*', 'users.name')
            ->where('detailkamars.id','=', $id)
            ->get();

        $user = auth()->user();

        return view('user.detailkamar', compact('user',  'detailkamars', 'kamar'));
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
