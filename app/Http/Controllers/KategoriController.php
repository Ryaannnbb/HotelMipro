<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        $kategori = kategori::all();
        return view('admin.kategori.index', compact('kategori','user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = auth()->user();
        return view("admin.kategori.create", compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255', // Tambahkan aturan lain sesuai kebutuhan
        ], [
            'nama_kategori.required' => 'Category name is required.',
            // 'nama_kategori.string' => 'Category Name must be text.',
        ]);

        Kategori::create($request->all());
        return redirect()->route('kategori')->with("success", "Category data added successfully!");
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
        $kategori = Kategori::find($id);
        $user = auth()->user();
        return view("admin.kategori.edit", compact("kategori", "user"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pembayaran = Kategori::find($id);
        $pembayaran->update($request->all());
        return redirect()->route('kategori')->with("success", "Category data updated successfully.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kategori = Kategori::find($id);
        try {
            //code...
            $kategori->delete();
            return redirect()->route("kategori")->with("success", "Category data has been successfully deleted!");
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->route('kategori')->with("error", "Failed to delete because category data is in use!");
        }
    }
}
