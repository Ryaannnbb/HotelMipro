<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\Pesanan;
use App\Models\Fasilitas;
use App\Models\Detailkamar;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DetailKamarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, $id)
    {
        $user = auth()->user();
        $kamars = Kamar::where('id', $id)->get();
        $fasilitas = Fasilitas::all();
        $pesanan = Pesanan::find($id);
        $detailkamars = Detailkamar::where('kamar_id', $id)->get();
        $diskons = DB::table('diskons')
            ->leftJoin('diskons as diskon', 'diskon.id', '=',  'diskons.id')
            ->select('diskon.potongan_harga', 'diskon.kategori_id', 'diskon.akhir_berlaku','diskon.jenis')
            ->get();
        // $diskonsArray = $diskons->toArray();
        // $kategoriIds = [];
        // foreach ($diskonsArray as $diskon) {
        //     $kategoriIds[] = $diskon->kategori_id;
        // }
        // $kategoriIds = array_unique($kategoriIds);
         // Ambil data pesanan dari database
        //  $pesanan = Pesanan::withCount('produk')->get();

        //  // Hitung jumlah penjualan untuk setiap kombinasi nama produk dan pesanan
        //  $jumlahPenjualan = $pesanan->groupBy(['nama_produk', 'jenis_pesanan'])->map->count();

        //  // Temukan item dengan jumlah penjualan tertinggi
        //  $bestSeller = $jumlahPenjualan->sortDesc()->keys()->first();

        $totalRating = $detailkamars->avg('rating');
        $totalUlasan = $detailkamars->count();



        return view('user.detailkamar', compact('user', 'kamars', 'detailkamars', 'totalRating', 'totalUlasan', 'pesanan','diskons','id','fasilitas'));
    }
        // Hitung total rating dan total ulasan



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
        // dd($request->all());
        $data = $request->all();

        // Proses penyimpanan foto jika ada
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $fileName = Str::random(10) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('public/kamar'), $fileName);
            $data['foto'] = $fileName; // simpan nama file foto ke dalam data
        }

        // Periksa apakah pengguna sudah memberikan ulasan sebelumnya untuk kamar tertentu
        $existingReview = Detailkamar::where('kamar_id', $request->input('id'))
        ->where('user_id', auth()->id())
        ->exists();

        // Jika ulasan sudah ada, kembalikan pengguna dengan pesan kesalahan
        if ($existingReview) {
            return redirect()->back()->withInput()->withErrors(['error' => 'Maaf, Anda telah memberikan ulasan untuk kamar ini sebelumnya.']);
        }

        // Periksa apakah pengguna sudah memesan kamar ini sebelumnya
        $existingBooking = Pesanan::where('rooms_id', $request->input('id'))
        ->where('user_id', auth()->id())
        ->exists();

        // Jika belum memesan, kembalikan pengguna dengan pesan kesalahan
        if (!$existingBooking) {
        return redirect()->back()->withErrors(['error' => 'Anda harus memesan kamar ini sebelum menambahkan ulasan.']);
        }

        // Proses penyimpanan foto jika ada
        if ($request->hasFile('foto')) {
        // Proses penyimpanan foto
        }

        // Proses validasi jika ulasan kosong
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

        return redirect()->route('detailkamar', $request->input('id'))->with("success", "Data berhasil ditambahkan!");
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
    public function update($id,Request $request)
    {
        // dd($request->all());
        // Dapatkan data ulasan berdasarkan ID yang diterima dari request
        $ulasan = Detailkamar::findOrFail($id);

        // Perbarui nilai atribut berdasarkan data dari request
        $ulasan->rating = $request->rating;
        $ulasan->ulasan = $request->ulasan;
        $ulasan->user_id = $request->user_id;
        $existingimage = $ulasan->foto;

        // Periksa apakah ada file foto yang diunggah
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $fileName = Str::random('10') .'.'. $file->getClientOriginalExtension();
            $file->move(public_path('public/kamar'), $fileName);

            $ulasan->update(['foto' => $fileName]);

            if ($existingimage) {
                Storage::delete('kamar/' . $existingimage);
            }
        }

        $ulasan->save();

        return redirect()->route('detailkamar', ['id' => $ulasan->kamar_id])->with("success", "Product data updated successfully.");
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
