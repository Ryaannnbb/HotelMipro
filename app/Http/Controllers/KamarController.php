<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\Kategori;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;


class KamarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        $kamar = Kamar::all();
        return view('admin.kamar.index', compact('kamar'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategori = Kategori::all();
        return view('admin.kamar.create', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $deskripsi = strip_tags($request->deskripsi);

        $request->validate([
            'nama_kamar' => 'required',
            'deskripsi' => 'required',
            'path_kamar' => 'required|image|mimes:jpeg,png,jpg|max:10048',
            'kategori_id' => 'required',
            'harga' => 'required|numeric|min:10000',
        ], [
            'nama_kamar.required' => 'Nama kamar harus diisi.',
            'deskripsi.required' => 'Deskripsi kamar harus diisi.',
            'path_kamar.required' => 'Gambar kamar harus diisi.',
            'path_kamar.image' => 'File yang diunggah harus berupa gambar.',
            'path_kamar.mimes' => 'Gambar harus dalam format jpeg, png, atau jpg.',
            'path_kamar.max' => 'Ukuran gambar tidak boleh melebihi 10 MB.',
            'kategori_id.required' => 'Kategori kamar harus diisi.',
            'harga.required' => 'Harga kamar diperlukan.',
            'harga.numeric' => 'Harga kamar harus berupa angka.',
            'harga.min' => 'Nilai atribut harus minimal :min.',
        ]);

        $file = $request->file('path_kamar');
        $fileName = Str::random(10) . '.' .  $file->getClientOriginalExtension();
        $file->storeAs('public/kamar', $fileName);

        Kamar::create([
            "path_kamar" => $fileName,
            "nama_kamar" => $request->nama_kamar,
            "deskripsi" => $deskripsi,
            "harga" => $request->harga,
            "kategori_id" => $request->kategori_id,
        ]);

        return redirect()->route('kamar')->with("success", "Data kamar berhasil diperbarui.");
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
        $kamar = Kamar::findOrFail($id);
        $kategori = Kategori::all();
        return view('admin.kamar.edit', compact('kamar', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $deskripsi = strip_tags($request->deskripsi);

        $request->validate([
            'nama_kamar' => 'required',
            'deskripsi' => 'required',
            'path_kamar' => 'required|image|mimes:jpeg,png,jpg|max:10048',
            'kategori_id' => 'required',
            'harga' => 'required|numeric|min:10000',
        ], [
           'nama_kamar.required' => 'Nama kamar harus diisi.',
            'deskripsi.required' => 'Deskripsi kamar harus diisi.',
            'path_kamar.required' => 'Gambar kamar harus diisi.',
            'path_kamar.image' => 'File yang diunggah harus berupa gambar.',
            'path_kamar.mimes' => 'Gambar harus dalam format jpeg, png, atau jpg.',
            'path_kamar.max' => 'Ukuran gambar tidak boleh melebihi 10 MB.',
            'kategori_id.required' => 'Kategori kamar harus diisi.',
            'harga.required' => 'Harga kamar diperlukan.',
            'harga.numeric' => 'Harga kamar harus berupa angka.',
            'harga.min' => 'Nilai atribut harus minimal :min.',
        ]);

        $kamar = Kamar::find($id);
        $existingimage = $kamar->path_kamar;

        $kamar->update([
            'nama_kamar' => $request->nama_kamar,
            'deskripsi' => $deskripsi,
            'harga' => $request->harga,
            'kategori_id' => $request->kategori_id,
        ]);

        if ($request->hasFile('path_kamar')) {
            $file = $request->file('path_kamar');
            $fileName = Str::random('10') . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('storage/kamar'), $fileName);

            $kamar->update(['path_kamar' => $fileName]);

            if ($existingimage) {
                Storage::delete('kamar/' . $existingimage);
            }
        }
// dd($request);
return redirect()->route('kamar')->with("success", "Data kamar berhasil diperbarui.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kamar = Kamar::findOrfail($id);
        // return dd($kamar);

        if ($kamar) {
            $path_kamar = $kamar->path_kamar;
            $path = public_path($path_kamar);

            // return dd($path);

            if (File::exists($path)) {
                File::delete($path);
            }

            $kamar->delete();

            return redirect()->route("kamar")->with("success", "Data kamar berhasil dihapus!");
        }

        return redirect()->route("kamar")->with("warning", "Kamar tidak ditemukan atau sudah dihapus.");
    }
}
