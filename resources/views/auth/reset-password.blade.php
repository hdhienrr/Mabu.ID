@extends('layouts.auth')
@section('title', 'Buat Kata Sandi Baru - MABU')

@section('content')
    <div class="flex flex-col w-full py-space-xl px-margin items-center justify-center relative overflow-hidden">
        <div class="absolute -top-32 -left-20 w-96 h-96 rounded-full bg-brand-100 opacity-60 dark:opacity-20 blur-3xl pointer-events-none"></div>
        <div class="absolute -bottom-24 -right-16 w-80 h-80 rounded-full bg-primary-fixed opacity-40 dark:opacity-20 blur-3xl pointer-events-none"></div>

        <div class="relative w-full max-w-[450px] mx-auto">
            <div class="auth-card rounded-xl shadow-xl p-space-xl sm:p-space-2xl border border-border-light">
                <div class="text-center mb-space-lg">
                    <div class="w-14 h-14 rounded-2xl bg-primary/10 flex items-center justify-center mx-auto mb-space-md">
                        <span class="material-symbols-outlined text-primary text-[28px]">key</span>
                    </div>
                    <h1 class="font-headline-xl text-headline-xl text-on-surface tracking-tight">Kata Sandi Baru</h1>
                    <p class="font-body-sm text-body-sm text-on-surface-variant mt-space-xxs">
                        Buat kata sandi baru untuk akunmu. Minimal 8 karakter.
                    </p>
                </div>

                @if ($errors->any())
                    <div class="mb-space-md p-3.5 rounded-xl bg-error/10 border border-error/20 text-error font-body-sm text-body-sm flex items-start gap-2.5">
                        <span class="material-symbols-outlined text-[20px] shrink-0 mt-0.5">error</span>
                        <div class="flex-1">
                            @foreach ($errors->all() as $error)
                                <span class="block">{{ $error }}</span>
                            @endforeach
                        </div>
                    </div>
                @endif

                <form class="space-y-space-md" method="POST" action="{{ route('password.store') }}">
                    @csrf
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    <div>
                        <label class="block font-label-sm text-label-sm text-on-surface mb-1" for="email">Email</label>
                        <div class="relative flex items-center">
                            <span class="material-symbols-outlined absolute left-space-md text-[20px] text-on-surface-variant pointer-events-none">alternate_email</span>
                            <input
                                class="w-full pl-11 pr-space-md py-2.5 rounded-lg bg-surface-container-low text-on-surface font-body-sm text-body-sm focus:outline-none focus:bg-surface-container-lowest focus:ring-2 focus:ring-brand-500 transition-all border border-border-light"
                                id="email" name="email" value="{{ old('email', $request->email) }}" required autofocus autocomplete="username" type="email" />
                        </div>
                    </div>

                    <div>
                        <label class="block font-label-sm text-label-sm text-on-surface mb-1" for="password">Kata Sandi Baru</label>
                        <div class="relative flex items-center">
                            <span class="material-symbols-outlined absolute left-space-md text-[20px] text-on-surface-variant pointer-events-none">lock</span>
                            <input
                                class="w-full pl-11 pr-11 py-2.5 rounded-lg bg-surface-container-low text-on-surface placeholder:text-text-faint-light font-body-sm text-body-sm focus:outline-none focus:bg-surface-container-lowest focus:ring-2 focus:ring-brand-500 transition-all border border-border-light"
                                id="password" name="password" placeholder="Minimal 8 karakter" required autocomplete="new-password" type="password" />
                            <button class="absolute right-space-md text-on-surface-variant hover:text-on-surface focus:outline-none" id="toggle-password" type="button" aria-label="Tampilkan kata sandi">
                                <span class="material-symbols-outlined text-[20px]" id="password-icon">visibility</span>
                            </button>
                        </div>
                    </div>

                    <div>
                        <label class="block font-label-sm text-label-sm text-on-surface mb-1" for="password_confirmation">Konfirmasi Kata Sandi</label>
                        <div class="relative flex items-center">
                            <span class="material-symbols-outlined absolute left-space-md text-[20px] text-on-surface-variant pointer-events-none">lock</span>
                            <input
                                class="w-full pl-11 pr-space-md py-2.5 rounded-lg bg-surface-container-low text-on-surface placeholder:text-text-faint-light font-body-sm text-body-sm focus:outline-none focus:bg-surface-container-lowest focus:ring-2 focus:ring-brand-500 transition-all border border-border-light"
                                id="password_confirmation" name="password_confirmation" placeholder="Ulangi kata sandi" required autocomplete="new-password" type="password" />
                        </div>
                    </div>

                    <button
                        class="w-full mt-2 py-3 px-space-lg rounded-full bg-brand-600 text-white font-label-md text-label-md hover:bg-brand-700 active:scale-[0.99] transition-all shadow-md flex items-center justify-center gap-space-xs"
                        type="submit">
                        <span>Simpan Kata Sandi</span>
                        <span class="material-symbols-outlined text-[18px]">check</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
