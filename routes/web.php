<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Halaman Publik (Landing Page)
Route::get('/', function () {
    return view('home');
})->name('home');

// Dashboard MABU (7 Halaman Utama) - butuh login
Route::middleware('auth')->prefix('dashboard')->name('mabu.')->group(function () {
    Route::view('/profil', 'mabu.profil')->name('profil');
    Route::view('/profil/data-diri', 'mabu.profil.data-diri')->name('profil.data-diri');
    Route::view('/profil/pengalaman', 'mabu.profil.pengalaman')->name('profil.pengalaman');
    Route::view('/lowongan', 'mabu.lowongan')->name('lowongan');
    Route::view('/rekomendasi', 'mabu.rekomendasi')->name('rekomendasi');
    Route::view('/jadwal', 'mabu.jadwal')->name('jadwal');
    Route::view('/lamaran', 'mabu.lamaran')->name('lamaran');
    Route::view('/cv', 'mabu.cv')->name('cv');
    Route::view('/dokumen', 'mabu.dokumen')->name('dokumen');
});

// /dashboard langsung ke halaman profil
Route::redirect('/dashboard', '/dashboard/profil')->name('dashboard');

// Manajemen akun (Breeze)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
