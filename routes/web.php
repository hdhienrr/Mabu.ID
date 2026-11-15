<?php

use Illuminate\Support\Facades\Route;

// Halaman Publik & Autentikasi (Landing Page & Auth)
Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

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
