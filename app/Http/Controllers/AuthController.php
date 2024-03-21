<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Auth as ModelsAuth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreAuthRequest;
use App\Http\Requests\UpdateAuthRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class AuthController extends Controller
{
    public function login()
    {
        $user = Auth::user();
        return view('auth.login', compact('user'));
    }

    public function register()
    {
        return view('auth.register');
    }


    public function Createregister(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required',
        ], [
            'name.required' => 'Nama wajib diisi.',
            'email.required' => 'Alamat email wajib diisi.',
            'email.email' => 'Format alamat email tidak valid.',
            'email.unique' => 'Alamat email sudah terdaftar. Harap gunakan alamat email lain.',
            'password.required' => 'Kata sandi wajib diisi.',
            'password.min' => 'Kata sandi minimal harus terdiri dari 8 karakter.',
            'password.confirmed' => 'Konfirmasi kata sandi tidak sesuai.',
            'password_confirmation.required' => 'Konfirmasi kata sandi wajib diisi.',
        ]);
        if (User::where('email', $request->email)->exists()) {
            return redirect()->route('login')->with('error', 'Alamat email sudah terdaftar. Gunakan alamat email lain.');
        }
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            // 'changepassword' => $request->password,
            'role' => 'user',

        ];
        $user = User::create($data); // Membuat pengguna baru dan menyimpannya

        // event(new Registered($user));
        // Auth::login($user);
        return redirect()->route('login')->with('success', 'Registrasi Anda berhasil');
    }

    public function proseslogin(Request $request)
    {
        $rules = [
            'email' => 'required|email',
            'password' => 'required',
        ];

        $customMessages = [
            'email.required' => 'email harus diisi.',
            'email.email' => 'email sudah ada.',
            'password.required' => 'passowrd harus diisi.',
        ];


        $validator = Validator::make($request->all(), $rules, $customMessages);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput($request->except('password'));
        }

        if (auth()->attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
            if (auth()->user()->role == 'user') {
                return redirect()->route('homeuser')->with('success', 'Anda berhasil masuk.');
                return redirect()->route('login')->with('error', 'Email atau password salah.');
            } else if (auth()->user()->role == 'admin') {
                return redirect()->route('dashboard')->with('success', 'Anda berhasil masuk.');
                return redirect()->route('login')->with('error', 'Email atau kata sandi salah.');
            }
        }

        return redirect()->back()->withInput($request->except('password'))->withErrors(['password' => 'Kredensial tidak valid']);
    }

    public function logout(){

        Auth::logout();

        return redirect('/')->with('success', 'Berhasil keluar');
    }
    public function changeAccount(){

        Auth::logout();
        return redirect()->route('login')->with('success', 'Berhasil logout, harap ganti akun');
    }
}
