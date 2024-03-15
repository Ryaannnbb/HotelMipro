<?php

namespace App\Http\Controllers;

use auth;
use App\Models\User;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        $lastorder = Pesanan::where('user_id', $user->id)->orderBy('created_at', 'desc')->take(1)->get();
        $totalorder = Pesanan::where('user_id', $user->id)->get()->count();
        $totalpembayaran = DB::table('pesanans')
        ->select(
            DB::raw('sum(harga_pesanan) AS total'),
        )
        ->where('user_id', $user->id)
        ->get();
        $pesanan = DB::table('pesanans')
        ->leftJoin('users', 'pesanans.user_id', '=', 'users.id')
        ->leftJoin('kamars', 'pesanans.rooms_id', '=', 'kamars.id')
        // ->leftJoin('diskons', 'pesanans.diskon_id', '=', 'diskons.id')
        ->select(
            'pesanans.*',
            'users.name as user_name',
            'kamars.nama_kamar'
            // 'diskons.discount as diskon_discount'
            )
        ->where('pesanans.user_id', $user->id)
        ->get();
        return view('user.profile', compact('user', 'pesanan', 'totalpembayaran', 'totalorder', 'lastorder'));
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
        try {
            // dd($request->all());
            $request->validate([
                'name' => 'nullable',
                'address' => 'nullable',
                'telp' => 'nullable',
                'profile' => 'nullable|image',
            ], [
                'profile.image' => 'The profile must be an image.',
            ]);

            $user = User::find($id);

            if (!$user) {
                return redirect()->route('user.index')->with('error', 'Error, please try again');
            }

            $userData = [];

            if ($request->filled('name')) {
                $userData['name'] = $request->input('name');
            }

            if ($request->filled('address')) {
                $userData['address'] = $request->input('address');
            }

            if ($request->filled('telp')) {
                $userData['telp'] = $request->input('telp');
            }

            if ($request->file('profile')) {
                $userData['profile'] = $request->file('profile')->store('profil', 'public');

                if ($user->profile) {
                    Storage::disk('public')->delete($user->profile);
                }
            }

            $user->update($userData);

            return redirect()->route('profil')->with('success', 'Successfully updated profile');
        } catch (\Exception $e) {
            return redirect()->route('profil')->with('error', 'Error');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}