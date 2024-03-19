<?php

namespace App\Http\Controllers;

use App\Models\Fasilitas;
use Illuminate\Http\Request;

class FasilitasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fasilitas = Fasilitas::all();
        return view('admin.fasilitas.index', compact('fasilitas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.fasilitas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_fasilitas' => 'required|string|max:255',
            'harga_satuan' => 'required|numeric|min:10000',
        ], [
            'nama_fasilitas.required' => 'Facility title is required.',
            'nama_fasilitas.max' => 'Facility title may not be greater than :max characters.',
            'harga_satuan.required' => 'Best price is required.',
            'harga_satuan.numeric' => 'Best price must be a number.',
            'harga_satuan.min' => 'Best price must be at least :min.',
        ]);
        Fasilitas::create($request->all());
        return redirect()->route('fasilitas')->with("success", "Facility data added successfully!");
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
        $fasilitas = Fasilitas::findOrFail($id);
        return view('admin.fasilitas.edit', compact('fasilitas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $fasilitas = Fasilitas::find($id);
        $fasilitas->update($request->all());
        return redirect()->route('fasilitas')->with("success", "Facility data updated successfully.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $fasilitas = Fasilitas::find($id);
        try {
            //code...
            $fasilitas->delete();
            return redirect()->route("fasilitas")->with("success", "Fasilitas data has been successfully deleted!");
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->route('fasilitas')->with("error", "Failed to delete because fasilitas data is in use!");
        }
    }
}
