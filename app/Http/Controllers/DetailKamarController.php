<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\Detailkamar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

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

        // Hitung total rating dan total ulasan
        $totalRating = $detailkamars->avg('rating');
        $totalUlasan = $detailkamars->count();

        return view('user.detailkamar', compact('user', 'kamar', 'detailkamars', 'totalRating', 'totalUlasan', 'id'));
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

    // Proses penyimpanan foto jika ada
    if ($request->hasFile('foto')) {
        $file = $request->file('foto');
        $fileName = Str::random(10) . '.' . $file->getClientOriginalExtension();
        $file->storeAs('public/kamar', $fileName);
        $data['foto'] = $fileName; // simpan nama file foto ke dalam data
    }

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
            ->where('kamar_id','=', $id) // Menggunakan kamar_id, bukan id
            ->get();

        $user = auth()->user();

        return view('user.detailkamar', compact('user', 'detailkamars', 'kamar'));
    }




    public function detailkamars(Request $request, $id)
    {
        $user = auth()->user();
        $kamar = DB::table('kamars')
            ->leftJoin('detailkamars', 'kamars.id', '=', 'detailkamars.kamar_id')
            ->select(
                'kamars.id',
                'kamars.nama_kamar',
                'kamars.path_kamar',
                'kamars.harga',
                'kamars.deskripsi',
                'kamars.status',
                DB::raw('avg(detailkamars.rating) AS rating'),
                DB::raw('count(detailkamars.kamar_id) AS totalulasan'))
            ->where('kamars.id', $id)
            ->groupBy(
                'kamars.id',
                'kamars.nama_kamar',
                'kamars.path_kamar',
                'kamars.harga',
                'kamars.deskripsi',
                'kamars.status')
            ->get(); // Use first() instead of get() to retrieve a single object

        return view('user.detailkamar', compact('kamar', 'user', 'rating', 'totalulasan'));
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
    public function destroy($id)
    {
        // Cari ulasan berdasarkan ID
        $detailkamar = Detailkamar::findOrFail($id);

        // Lakukan pengecekan apakah pengguna yang sedang login adalah pemilik ulasan
        if ($detailkamar->user_id === auth()->id()) {
            // Hapus ulasan
            $detailkamar->delete();

            // Redirect dengan pesan sukses
            return redirect()->back()->with("success", "Ulasan berhasil dihapus!");
        }

        // Jika pengguna yang sedang login bukan pemilik ulasan, maka kembalikan pesan error
        return redirect()->back()->withErrors(['error' => 'Anda tidak memiliki izin untuk menghapus ulasan ini.']);
    }
}
