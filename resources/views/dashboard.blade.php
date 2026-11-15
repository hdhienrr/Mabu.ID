@extends('layouts.mabu')
@section('title', 'Dashboard - MABU')

@section('content')
    <div class="max-w-2xl mx-auto text-center py-space-2xl">
        <div class="w-16 h-16 rounded-2xl bg-primary/10 flex items-center justify-center mx-auto mb-space-md">
            <span class="material-symbols-outlined text-primary text-[32px]">dashboard</span>
        </div>
        <h1 class="font-headline-lg text-headline-lg text-on-surface tracking-tight">Kamu sudah masuk</h1>
        <p class="font-body-md text-body-md text-on-surface-variant mt-space-sm">
            Selamat datang di MABU. Buka menu di kiri untuk mulai mencari lowongan part-time.
        </p>
        <a href="{{ route('mabu.profil') }}" class="inline-flex items-center gap-2 mt-space-lg px-space-lg py-3 rounded-full bg-primary text-on-primary font-label-md text-label-md hover:bg-primary-container transition-all shadow-sm">
            <span>Ke Dashboard Profil</span>
            <span class="material-symbols-outlined text-[18px]">arrow_forward</span>
        </a>
    </div>
@endsection
