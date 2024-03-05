<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\HomeUserController;
use App\Http\Controllers\KamarController;
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
});

// ADMIN
Route::middleware([UserMiddleware::class])->group(function () {
    Route::get('/homeuser', [HomeUserController::class, 'index'])->name('homeuser');
});
