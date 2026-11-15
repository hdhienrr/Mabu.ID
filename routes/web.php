<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// Halaman Publik (Landing Page)
Route::get('/', function () {
    return view('home');
})->name('home');

// Autentikasi (Guest only)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);

    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Halaman Dashboard MABU (7 Halaman Utama)
Route::prefix('dashboard')->name('mabu.')->group(function () {
    Route::view('/profil', 'mabu.profil')->name('profil');
    Route::view('/lowongan', 'mabu.lowongan')->name('lowongan');
    Route::view('/rekomendasi', 'mabu.rekomendasi')->name('rekomendasi');
    Route::view('/jadwal', 'mabu.jadwal')->name('jadwal');
    Route::view('/lamaran', 'mabu.lamaran')->name('lamaran');
    Route::view('/cv', 'mabu.cv')->name('cv');
    Route::view('/dokumen', 'mabu.dokumen')->name('dokumen');
});

// Redirect otomatis jika akses /dashboard langsung ke halaman profil
Route::redirect('/dashboard', '/dashboard/profil');
