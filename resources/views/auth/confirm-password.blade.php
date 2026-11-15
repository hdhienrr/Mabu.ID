@extends('layouts.auth')
@section('title', 'Konfirmasi Kata Sandi - MABU')

@section('content')
    <div class="flex flex-col w-full py-space-xl px-margin items-center justify-center relative overflow-hidden">
        <div class="absolute -top-32 -left-20 w-96 h-96 rounded-full bg-brand-100 opacity-60 dark:opacity-20 blur-3xl pointer-events-none"></div>
        <div class="absolute -bottom-24 -right-16 w-80 h-80 rounded-full bg-primary-fixed opacity-40 dark:opacity-20 blur-3xl pointer-events-none"></div>

        <div class="relative w-full max-w-[450px] mx-auto">
            <div class="auth-card rounded-xl shadow-xl p-space-xl sm:p-space-2xl border border-border-light">
                <div class="text-center mb-space-lg">
                    <div class="w-14 h-14 rounded-2xl bg-primary/10 flex items-center justify-center mx-auto mb-space-md">
                        <span class="material-symbols-outlined text-primary text-[28px]">shield_lock</span>
                    </div>
                    <h1 class="font-headline-xl text-headline-xl text-on-surface tracking-tight">Konfirmasi Kata Sandi</h1>
                    <p class="font-body-sm text-body-sm text-on-surface-variant mt-space-xxs">
                        Area ini aman. Masukkan kata sandimu untuk lanjut.
                    </p>
                </div>

                @if ($errors->any())
                    <div class="mb-space-md p-3.5 rounded-xl bg-error/10 border border-error/20 text-error font-body-sm text-body-sm flex items-start gap-2.5">
                        <span class="material-symbols-outlined text-[20px] shrink-0 mt-0.5">error</span>
                        <div class="flex-1">
                            @foreach ($errors->all() as $error)
                                <span>{{ $error }}</span>
                            @endforeach
                        </div>
                    </div>
                @endif

                <form class="space-y-space-md" method="POST" action="{{ route('password.confirm') }}">
                    @csrf
                    <div>
                        <label class="block font-label-sm text-label-sm text-on-surface mb-1" for="password">Kata Sandi</label>
                        <div class="relative flex items-center">
                            <span class="material-symbols-outlined absolute left-space-md text-[20px] text-on-surface-variant pointer-events-none">lock</span>
                            <input
                                class="w-full pl-11 pr-11 py-2.5 rounded-lg bg-surface-container-low text-on-surface font-body-sm text-body-sm focus:outline-none focus:bg-surface-container-lowest focus:ring-2 focus:ring-brand-500 transition-all border border-border-light"
                                id="password" name="password" required autocomplete="current-password" type="password" />
                            <button class="absolute right-space-md text-on-surface-variant hover:text-on-surface focus:outline-none" id="toggle-password" type="button" aria-label="Tampilkan kata sandi">
                                <span class="material-symbols-outlined text-[20px]" id="password-icon">visibility</span>
                            </button>
                        </div>
                    </div>

                    <button
                        class="w-full mt-2 py-3 px-space-lg rounded-full bg-brand-600 text-white font-label-md text-label-md hover:bg-brand-700 active:scale-[0.99] transition-all shadow-md flex items-center justify-center gap-space-xs"
                        type="submit">
                        <span>Konfirmasi</span>
                        <span class="material-symbols-outlined text-[18px]">arrow_forward</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
