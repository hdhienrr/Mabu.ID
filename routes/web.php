<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Halaman Publik (Landing Page)
Route::get('/', function () {
    return view('home');
})->name('home');

// Dashboard MABU - butuh login
Route::middleware('auth')->prefix('dashboard')->name('mabu.')->group(function () {
    Route::view('/dashboard', 'mabu.dashboard')->name('dashboard');
    Route::view('/jadwal', 'mabu.jadwal')->name('jadwal');
    Route::view('/profil', 'mabu.profil')->name('profil');
    Route::view('/profil/data-diri', 'mabu.profil.data-diri')->name('profil.data-diri');
    Route::view('/profil/pengalaman', 'mabu.profil.pengalaman')->name('profil.pengalaman');

    // Redirect sementara untuk route yang file view-nya sudah dihapus
    Route::redirect('/lowongan', '/dashboard/dashboard')->name('lowongan');
    Route::redirect('/rekomendasi', '/dashboard/dashboard')->name('rekomendasi');
    Route::redirect('/lamaran', '/dashboard/dashboard')->name('lamaran');
    Route::redirect('/cv', '/dashboard/dashboard')->name('cv');
    Route::redirect('/dokumen', '/dashboard/dashboard')->name('dokumen');
});

// Setelah login, /dashboard langsung masuk ke Main Page
Route::redirect('/dashboard', '/dashboard/dashboard')->name('dashboard');

// Manajemen akun (Breeze)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
