<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Kamar;
use App\Models\Diskon;
use Illuminate\Support\Str;
use App\Models\DetailDiskon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DiskonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $diskon = Diskon::all();
        return view('admin.diskon.index', compact('diskon'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $diskon = Diskon::all();
        $room = Kamar::all();
        $query = DB::table('diskons')
        ->leftJoin('detail_diskons', 'diskons.id', '=', 'detail_diskons.diskon_id')
        ->join('kamars', 'kamars.id', '=', 'detail_diskons.rooms_id')
        ->select(
            'kamars.id',
            'kamars.nama_kamar',
            'kamars.path_kamar',
            DB::raw('sum(detail_diskons.nominal_potongan) AS total'),
            DB::raw('min(diskons.awal_berlaku) AS awal_berlaku'),
            DB::raw('max(diskons.akhir_berlaku) AS akhir_berlaku'),
        )
        ->groupBy(
            'detail_diskons.rooms_id', // Jika ingin groupBy harus menyertakan semua kolom termasuk kolom yang tidak mmiliki DB:raw
            "kamars.id",
            "kamars.nama_kamar",
            "kamars.path_kamar",
            )
        ->where('diskons.awal_berlaku', '>=', Carbon::now('Asia/Jakarta'));
        $detaildiskon = $query->get();
        return view('admin.diskon.create', compact('room', 'detaildiskon', 'diskon'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $deskripsi = strip_tags($request->deskripsi);

        // dd($request->all());
        $request->validate([
            'nama_diskon' => 'required|string|max:255',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:10048',
            'deskripsi' => 'required|string',
            'jenis' => 'required|in:nominal,percentage',
            'potongan_harga' => [
                'required',
                'numeric',
                function ($attribute, $value, $fail) use ($request) {
                    $jenis = $request->input('jenis');
                    $kamar = $request->input('nama_kamar');

                    if ($jenis === 'percentage' && $value > 100) {
                        $fail('Potongan harga tidak boleh melebihi 100%.');
                    }

                    if ($jenis === 'nominal') {
                        $harga_kamar = 0;

                        // Menghitung total harga kamar
                        foreach ($kamar as $kamar_id) {
                            $room = Kamar::find($kamar_id);
                            $harga_kamar += $room->harga;
                        }

                        if ($value > $harga_kamar) {
                            $fail('Potongan harga tidak boleh melebihi harga kamar.');
                        }
                    }
                },
            ],
            'awal_berlaku' => 'required|date|after_or_equal:today',
            'akhir_berlaku' => 'required|date|after_or_equal:awal_berlaku|after_or_equal:today',
            'nama_kamar' => 'required|array',
            'nama_kamar.*' => 'required|exists:kamars,id',
        ], [
            'nama_diskon.required' => 'Nama diskon harus diisi.',
            'nama_diskon.max' => 'Nama diskon tidak boleh melebihi :max karakter.',
            'gambar.required' => 'Gambar diskon harus diunggah.',
            'gambar.image' => 'File harus berupa gambar.',
            'gambar.mimes' => 'Format gambar yang diperbolehkan: jpeg, png, jpg, gif.',
            'gambar.max' => 'Ukuran gambar tidak boleh melebihi 2MB.',
            'deskripsi.required' => 'Deskripsi diskon harus diisi.',
            'jenis.required' => 'Jenis diskon harus dipilih.',
            'jenis.in' => 'Jenis diskon yang dipilih tidak valid.',
            'potongan_harga.required' => 'Potongan harga diskon harus diisi.',
            'potongan_harga.numeric' => 'Potongan harga diskon harus berupa angka.',
            'awal_berlaku.required' => 'Tanggal awal berlaku harus diisi.',
            'awal_berlaku.after_or_equal' => 'Tanggal awal berlaku harus setelah atau sama dengan tanggal hari ini.',
            'akhir_berlaku.required' => 'Tanggal akhir berlaku harus diisi.',
            'akhir_berlaku.after_or_equal' => 'Tanggal akhir berlaku harus setelah atau sama dengan tanggal awal berlaku.',
            'akhir_berlaku.after_or_equal:today' => 'Tanggal akhir berlaku harus setelah atau sama dengan tanggal hari ini.',
            'nama_kamar.required' => 'Kamar diskon harus dipilih.',
            'nama_kamar.array' => 'Kamar diskon harus berupa array.',
            'nama_kamar.*.exists' => 'Salah satu kamar yang dipilih tidak valid.',
            'nama_kamar.*.required' => 'Kamar diskon harus dipilih.',
        ]);

        $file = $request->file('gambar');
        $fileName = Str::random(10) . '.' .  $file->getClientOriginalExtension();
        $file->storeAs('public/kamar', $fileName);


        $diskon = new Diskon;
        $diskon->nama_diskon = $request->nama_diskon;
        $diskon->gambar = $fileName;
        $diskon->deskripsi = $deskripsi;
        $diskon->jenis = $request->jenis;
        $diskon->potongan_harga = $request->potongan_harga;
        $diskon->awal_berlaku = Carbon::parse($request->awal_berlaku)->format('Y-m-d');
        $diskon->akhir_berlaku = Carbon::parse($request->akhir_berlaku)->format('Y-m-d');
        $diskon->save();

        $kamar = $request->nama_kamar;
        foreach ($kamar as $value) {
            $detail = new DetailDiskon;
            $detail->rooms_id = $value;
            $detail->diskon_id = $diskon->id;

            $room = Kamar::find($value);
            $harga_kamar = $room->harga;
            if ($request->jenis == 'percentage') {
                $detail->nominal_potongan = $harga_kamar - ($harga_kamar * $request->potongan_harga / 100);
            }else {
                $detail->nominal_potongan = $harga_kamar - $request->potongan_harga;
            }
            $detail->save();
        }

        return redirect()->route('diskon')->with("success", "Diskon data added successfully!");
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
        $room = Kamar::all();
        $query = DB::table('diskons')
        ->leftJoin('detail_diskons', 'diskons.id', '=', 'detail_diskons.diskon_id')
        ->join('kamars', 'kamars.id', '=', 'detail_diskons.rooms_id')
        ->select(
            'kamars.id',
            'kamars.nama_kamar',
            'kamars.path_kamar',
            DB::raw('sum(detail_diskons.nominal_potongan) AS total'),
            DB::raw('min(diskons.awal_berlaku) AS awal_berlaku'),
            DB::raw('max(diskons.akhir_berlaku) AS akhir_berlaku'),
        )
        ->groupBy(
            'detail_diskons.rooms_id',
            "kamars.id",
            "kamars.nama_kamar",
            "kamars.path_kamar",
            )
        ->where('diskons.awal_berlaku', '>=', Carbon::now('Asia/Jakarta'));
        $detaildiskon = $query->get();

        $diskon = Diskon::findOrFail($id);
        $diskons = Diskon::all();
        $kamarterdiskon = DetailDiskon::where('diskon_id', $id)->get();
        return view('admin.diskon.edit', compact('room', 'detaildiskon', 'diskon', 'kamarterdiskon', 'diskons'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_diskon' => 'required|string|max:255',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:10048',
            'deskripsi' => 'required|string',
            'jenis' => 'required|in:nominal,percentage',
            'potongan_harga' => [
                'required',
                'numeric',
                function ($attribute, $value, $fail) use ($request) {
                    $jenis = $request->input('jenis');
                    $kamar = $request->input('nama_kamar');

                    if ($jenis === 'percentage' && $value > 100) {
                        $fail('Potongan harga tidak boleh melebihi 100%.');
                    }

                    if ($jenis === 'nominal') {
                        $harga_kamar = 0;

                        // Menghitung total harga kamar
                        foreach ($kamar as $kamar_id) {
                            $room = Kamar::find($kamar_id);
                            $harga_kamar += $room->harga;
                        }

                        if ($value > $harga_kamar) {
                            $fail('Potongan harga tidak boleh melebihi harga kamar.');
                        }
                    }
                },
            ],
            'awal_berlaku' => 'required|date|after_or_equal:today',
            'akhir_berlaku' => 'required|date|after_or_equal:awal_berlaku|after_or_equal:today',
            'nama_kamar' => 'required|array',
            'nama_kamar.*' => 'exists:kamars,id',
        ], [
            'nama_diskon.required' => 'Nama diskon harus diisi.',
            'nama_diskon.max' => 'Nama diskon tidak boleh melebihi :max karakter.',
            'gambar.required' => 'Gambar diskon harus diunggah.',
            'gambar.image' => 'File harus berupa gambar.',
            'gambar.mimes' => 'Format gambar yang diperbolehkan: jpeg, png, jpg, gif.',
            'gambar.max' => 'Ukuran gambar tidak boleh melebihi 2MB.',
            'deskripsi.required' => 'Deskripsi diskon harus diisi.',
            'jenis.required' => 'Jenis diskon harus dipilih.',
            'jenis.in' => 'Jenis diskon yang dipilih tidak valid.',
            'potongan_harga.required' => 'Potongan harga diskon harus diisi.',
            'potongan_harga.numeric' => 'Potongan harga diskon harus berupa angka.',
            'awal_berlaku.required' => 'Tanggal awal berlaku harus diisi.',
            'awal_berlaku.after_or_equal' => 'Tanggal awal berlaku harus setelah atau sama dengan tanggal hari ini.',
            'akhir_berlaku.required' => 'Tanggal akhir berlaku harus diisi.',
            'akhir_berlaku.after_or_equal' => 'Tanggal akhir berlaku harus setelah atau sama dengan tanggal awal berlaku.',
            'akhir_berlaku.after_or_equal:today' => 'Tanggal akhir berlaku harus setelah atau sama dengan tanggal hari ini.',
            'nama_kamar.required' => 'Kamar diskon harus dipilih.',
            'nama_kamar.array' => 'Kamar diskon harus berupa array.',
            'nama_kamar.*.exists' => 'Salah satu kamar yang dipilih tidak valid.',
        ]);

        $diskon = Diskon::findOrFail($id);
        $existingimage = $diskon->gambar;

        $diskon->update([
            'nama_diskon' => $request->nama_diskon,
            'deskripsi' => $request->deskripsi,
            'jenis' => $request->jenis,
            'potongan_harga' => $request->potongan_harga,
            'awal_berlaku' => Carbon::parse($request->awal_berlaku)->format('Y-m-d'),
            'akhir_berlaku' => Carbon::parse($request->akhir_berlaku)->format('Y-m-d'),
        ]);

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $fileName = Str::random('10') . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('storage/kamar'), $fileName);

            $diskon->update(['gambar' => $fileName]);

            if ($existingimage) {
                Storage::delete('kamar/' . $existingimage);
            }
        }

        $kamar = $request->nama_kamar;
        $kamarDB = Kamar::all();
        foreach ($kamarDB as $value) {
            $room = Kamar::find($value->id);
            $harga_kamar = $room->harga;
            if ($request->jenis == 'percentage') {
                $nominal_potongan = $harga_kamar - ($harga_kamar * $request->potongan_harga / 100);
            }else {
                $nominal_potongan = $harga_kamar - $request->potongan_harga;
            }

            $checkdetail = DetailDiskon::where('diskon_id', $id)->where('rooms_id', $value->id)->get();
            if ($checkdetail->count() > 0) {
                if (in_array($value->id, $kamar)) {
                    DetailDiskon::where('diskon_id', $id)
                    ->where('rooms_id', $value->id)
                    ->update(['nominal_potongan' => $nominal_potongan]);
                } else {
                    DetailDiskon::where('diskon_id', $id)
                    ->where('rooms_id', $value->id)
                    ->delete();
                }
            } else {
                if (in_array($value->id, $kamar)) {
                    $detail = new DetailDiskon;
                    $detail->rooms_id = $value->id;
                    $detail->diskon_id = $id;
                    $detail->nominal_potongan = $nominal_potongan;
                    $detail->save();
                }
            }
            // echo $checkdetail->count();
        }

    return redirect()->route('diskon')->with("success", "Diskon data added successfully!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
