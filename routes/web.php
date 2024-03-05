<?php

use App\Http\Controllers\DashboardAdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\HomeUserController;
use App\Http\Controllers\KamarController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Middleware\UserMiddleware;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
    |
*/

// LANDING PAGE
Route::get('/', function () {
    return view('user.landing');
});


// LOGIN REGISTER
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/proseslogin', [AuthController::class, 'proseslogin'])->name('proseslogin');
Route::post('/Createregister', [AuthController::class, 'Createregister'])->name('Createregister');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// RESET PASSWORD
Route::controller(ResetPasswordController::class)->group(function () {
    Route::get('forgot-password', 'request')->name('password.request');
    Route::post('forgot-password', 'sendEmail')->name('password.email');
    Route::get('reset-password/{token}', 'resetPassword')->name('password.reset');
    Route::post('reset-password', 'updatePassword')->name('password.update');
});

// USER
Route::middleware([AdminMiddleware::class])->group(function () {
    Route::get('/homeadmin', [KamarController::class, 'index'])->name('homeadmin');
    Route::get('/dashboard', [DashboardAdminController::class, 'index'])->name('dashboard');

    Route::controller(KamarController::class)->prefix('kamar')->group(function () {
        Route::get('/', 'index')->name('kamar');
        Route::get('/create', 'create')->name('kamar.create');
        Route::post('/store', 'store')->name('kamar.store');
        Route::get('/edit/{id}', 'edit')->name('kamar.edit');
        Route::put('/edit/{id}', 'update')->name('kamar.update');
        Route::delete('destroy/{id}', 'destroy')->name('kamar.destroy');
    });

    Route::controller(KategoriController::class)->prefix('kategori')->group(function () {
        Route::get('/', 'index')->name('kategori');
        Route::get('/create', 'create')->name('kategori.create');
        Route::post('/store', 'store')->name('kategori.store');
        Route::get('/edit/{id}', 'edit')->name('kategori.edit');
        Route::put('/edit/{id}', 'update')->name('kategori.update');
        Route::delete('destroy/{id}', 'destroy')->name('kategori.destroy');
    });
});

// ADMIN
Route::middleware([UserMiddleware::class])->group(function () {
    Route::get('/homeuser', [HomeUserController::class, 'index'])->name('homeuser');
});
