@extends('layouts.auth')
@section('title', 'Verifikasi Email - MABU')

@section('content')
    <div class="flex flex-col w-full py-space-xl px-margin items-center justify-center relative overflow-hidden">
        <div class="absolute -top-32 -left-20 w-96 h-96 rounded-full bg-brand-100 opacity-60 dark:opacity-20 blur-3xl pointer-events-none"></div>
        <div class="absolute -bottom-24 -right-16 w-80 h-80 rounded-full bg-primary-fixed opacity-40 dark:opacity-20 blur-3xl pointer-events-none"></div>

        <div class="relative w-full max-w-[450px] mx-auto">
            <div class="auth-card rounded-xl shadow-xl p-space-xl sm:p-space-2xl border border-border-light text-center">
                <div class="w-14 h-14 rounded-2xl bg-primary/10 flex items-center justify-center mx-auto mb-space-md">
                    <span class="material-symbols-outlined text-primary text-[28px]">mark_email_unread</span>
                </div>
                <h1 class="font-headline-xl text-headline-xl text-on-surface tracking-tight">Verifikasi Email</h1>
                <p class="font-body-sm text-body-sm text-on-surface-variant mt-space-sm">
                    Terima kasih sudah mendaftar. Klik tautan yang kami kirim ke emailmu untuk mengaktifkan akun. Belum terima? Kirim ulang di bawah.
                </p>

                @if (session('status') == 'verification-link-sent')
                    <div class="mt-space-md p-3.5 rounded-xl bg-success/10 border border-success/20 text-success font-body-sm text-body-sm flex items-center gap-2.5 text-left">
                        <span class="material-symbols-outlined text-[20px] shrink-0">check_circle</span>
                        <span>Tautan verifikasi baru sudah dikirim ke emailmu.</span>
                    </div>
                @endif

                <div class="mt-space-lg flex flex-col gap-space-sm">
                    <form method="POST" action="{{ route('verification.send') }}">
                        @csrf
                        <button
                            class="w-full py-3 px-space-lg rounded-full bg-brand-600 text-white font-label-md text-label-md hover:bg-brand-700 active:scale-[0.99] transition-all shadow-md flex items-center justify-center gap-space-xs"
                            type="submit">
                            <span>Kirim Ulang Email</span>
                            <span class="material-symbols-outlined text-[18px]">send</span>
                        </button>
                    </form>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="font-label-md text-label-md text-on-surface-variant hover:text-primary transition-colors" type="submit">
                            Keluar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
