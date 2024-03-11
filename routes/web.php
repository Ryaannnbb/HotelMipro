<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\UserMiddleware;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\KamarController;
use App\Http\Controllers\DiskonController;
use App\Http\Controllers\ProfilController;
use App\Http\Middleware\RedirectMiddleware;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\HomeUserController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\FasilitasController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\DetailKamarController;
use App\Http\Controllers\UlasanKamarController;
use App\Http\Controllers\MenuKamarUserController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\DashboardAdminController;

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


// Route::middleware([RedirectMiddleware::class])->group(function () {
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
// });

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

    Route::controller(PembayaranController::class)->prefix('pembayaran')->group(function () {
        Route::get('', 'index')->name('pembayaran');
        Route::get('create', 'create')->name('pembayaran.create');
        Route::post('store', 'store')->name('pembayaran.store');
        Route::get('edit/{id}', 'edit')->name('pembayaran.edit');
        Route::put('edit/{id}', 'update')->name('pembayaran.update');
        Route::delete('destroy/{id}', 'destroy')->name('pembayaran.destroy');
    });
    Route::controller(FasilitasController::class)->prefix('fasilitas')->group(function () {
        Route::get('', 'index')->name('fasilitas');
        Route::get('create', 'create')->name('fasilitas.create');
        Route::post('store', 'store')->name('fasilitas.store');
        Route::get('edit/{id}', 'edit')->name('fasilitas.edit');
        Route::put('edit/{id}', 'update')->name('fasilitas.update');
        Route::delete('destroy/{id}', 'destroy')->name('fasilitas.destroy');
    });
    Route::controller(DiskonController::class)->prefix('diskon')->group(function () {
        Route::get('/', 'index')->name('diskon');
        Route::get('/create', 'create')->name('diskon.create');
        Route::post('/store', 'store')->name('diskon.store');
        Route::get('/edit/{id}', 'edit')->name('diskon.edit');
        Route::put('/edit/{id}', 'update')->name('diskon.update');
        Route::delete('destroy/{id}', 'destroy')->name('diskon.destroy');
    });

});

// ADMIN
Route::middleware([UserMiddleware::class])->group(function () {
    Route::get('/homeuser', [HomeUserController::class, 'index'])->name('homeuser');
    Route::get('/usermenu', [MenuKamarUserController::class, 'index'])->name('usermenu');
    Route::get('/detailkamar{id}', [DetailKamarController::class, 'index'])->name('detailkamar');
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');

    Route::controller(UlasanKamarController::class)->prefix('ulasankamar')->group(function () {
        Route::get('show/{id}', 'show')->name('ulasankamar');
        Route::post('store', 'store')->name('ulasankamar.store');
    });

    Route::controller(ProfilController::class)->prefix('profil')->group(function () {
        Route::get('', 'index')->name('profil');
        Route::get('create', 'create')->name('profil.create');
        Route::post('store', 'store')->name('profil.store');
        Route::get('edit/{id}', 'edit')->name('profil.edit');
        Route::put('edit/{id}', 'update')->name('profil.update');
        Route::get('destroy/{id}', 'destroy')->name('profil.destroy');
    });

});
