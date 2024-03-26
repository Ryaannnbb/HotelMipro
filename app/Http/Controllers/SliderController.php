<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sliders = Slider::all();
        return view('admin.slider.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $deskripsi = strip_tags($request->deskripsi);

        $validatedData = $request->validate([
            'path_kamar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Memastikan bahwa file yang diunggah adalah gambar dengan format yang diizinkan dan ukuran maksimum 2MB
            'judul' => 'required',
            'deskripsi' => 'required',
            'harga' => 'nullable|numeric',
            'fasilitas' => 'nullable|string',
            'diskon' => 'nullable|numeric',
        ], [
            'path_kamar.required' => 'Kolom path kamar harus diisi.',
            'judul.required' => 'Kolom judul harus diisi.',
            'deskripsi.required' => 'Kolom deskripsi harus diisi.',
            'harga.numeric' => 'Kolom harga harus berupa angka.',
            'path_kamar.image' => 'Kolom path kamar harus berupa gambar.',
            'path_kamar.mimes' => 'Format gambar yang diperbolehkan adalah: jpeg, png, jpg, gif.',
            'path_kamar.max' => 'Ukuran gambar tidak boleh melebihi 2MB.',
            'fasilitas.string' => 'Kolom fasilitas harus berupa teks.', 
            'diskon.numeric' => 'Kolom diskon harus berupa angka.',
        ]);
        $validatedData['deskripsi'] = $deskripsi;

        if ($request->hasFile('path_kamar')) {
            $file = $request->file('path_kamar');
            $fileName = Str::random(10) . '.' .  $file->getClientOriginalExtension();
            $file->storeAs('public/kamar', $fileName);
            $validatedData['path_kamar'] = $fileName;

            Slider::create($validatedData); // Tambahkan data ke database
        }

        return redirect()->route('Slider')->with('success', 'Slider berhasil ditambahkan.');
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
        $sliders = Slider::findOrFail($id);
        $sliders->deskripsi = htmlspecialchars_decode($sliders->deskripsi);
        return view('admin.slider.edit', compact('sliders'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'path_kamar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Ubah validasi untuk memungkinkan input gambar yang bersifat opsional
            'judul' => 'required',
            'deskripsi' => 'required',
            'harga' => 'nullable|numeric',
        ], [
            'path_kamar.image' => 'Kolom path kamar harus berupa gambar.',
            'path_kamar.mimes' => 'Format gambar yang diperbolehkan adalah: jpeg, png, jpg, gif.',
            'path_kamar.max' => 'Ukuran gambar tidak boleh melebihi 2MB.',
            'judul.required' => 'Kolom judul harus diisi.',
            'deskripsi.required' => 'Kolom deskripsi harus diisi.',
            'harga.numeric' => 'Kolom harga harus berupa angka.',
        ]);

        $slider = Slider::findOrFail($id); // Dapatkan objek Slider berdasarkan $id

        // Perbarui atribut-atribut objek Slider
        $slider->judul = $request->judul;
        $slider->deskripsi = $request->deskripsi;
        $slider->harga = $request->harga;

        // Periksa apakah ada file gambar yang diunggah
        if ($request->hasFile('path_kamar')) {
            // Hapus gambar lama dari penyimpanan
            Storage::delete('public/kamar/' . $slider->path_kamar);

            // Simpan gambar baru
            $file = $request->file('path_kamar');
            $fileName = Str::random(10) . '.' .  $file->getClientOriginalExtension();
            $file->storeAs('public/kamar', $fileName);
            $slider->path_kamar = $fileName;
        }

        $slider->save(); // Simpan perubahan

        return redirect()->route('Slider')->with("success", "Data kamar berhasil diperbarui.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $sliders = Slider::findOrFail($id); // menggunakan metode findOrFail() untuk mendapatkan objek Slider

        $sliders->delete(); // hapus objek Slider

        return redirect()->route("Slider")->with("success", "Data kamar berhasil dihapus!");
    }
}