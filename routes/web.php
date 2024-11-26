<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

use App\Http\Controllers\HomeController;

Route::get('/home', [HomeController::class, 'index'])->name('home'); // Halaman setelah login
Route::get('/', function () {
    return view('welcome'); // Halaman default (optional)
});

use App\Http\Controllers\Auth\LoginController;

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login'); // Menampilkan form login
Route::post('login', [LoginController::class, 'login']); // Memproses login
Route::post('logout', [LoginController::class, 'logout'])->name('logout'); // Logout user

use App\Http\Controllers\Auth\RegisterController;

Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register'); // Menampilkan form registrasi
Route::post('register', [RegisterController::class, 'register']); // Memproses registrasi

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;

Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request'); // Form lupa password
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email'); // Kirim link reset password
Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset'); // Form reset password
Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update'); // Proses reset password

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
