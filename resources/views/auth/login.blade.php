@extends('layouts.auth')
@section('title', 'Masuk - MABU')

@section('content')
    <div class="flex flex-col w-full">
        <div class="relative w-full py-space-xl px-margin flex items-center justify-center overflow-hidden">
            <div
                class="absolute -top-32 -left-20 w-96 h-96 rounded-full bg-brand-100 opacity-60 dark:opacity-20 blur-3xl pointer-events-none">
            </div>
            <div
                class="absolute -bottom-24 -right-16 w-80 h-80 rounded-full bg-primary-fixed opacity-40 dark:opacity-20 blur-3xl pointer-events-none">
            </div>
            <div class="relative w-full max-w-[450px] mx-auto">
                <div
                    class="mb-space-sm flex items-center justify-center gap-space-xs bg-surface-container px-space-md py-1.5 rounded-full w-fit mx-auto shadow-sm border border-border-light">
                    <span class="material-symbols-outlined text-[16px] text-success"
                        style="font-variation-settings: 'FILL' 1;">verified</span>
                    <span class="font-label-sm text-label-sm text-on-surface">Portal Mahasiswa & Mitra Terverifikasi</span>
                </div>

                <div class="auth-card rounded-xl shadow-xl p-space-xl sm:p-space-2xl transition-all border border-border-light">
                    <div class="text-center mb-space-lg">
                        <h1 class="font-headline-xl text-headline-xl text-on-surface tracking-tight">Masuk ke Akun MABU</h1>
                        <p class="font-body-sm text-body-sm text-on-surface-variant mt-space-xxs">
                            Akses lowongan part-time dan kelola jadwal fleksibelmu
                        </p>
                    </div>

                    <!-- Flash and Error Alerts -->
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

                    @if (session('success'))
                        <div class="mb-space-md p-3.5 rounded-xl bg-success/10 border border-success/20 text-success font-body-sm text-body-sm flex items-center gap-2.5">
                            <span class="material-symbols-outlined text-[20px] shrink-0">check_circle</span>
                            <span>{{ session('success') }}</span>
                        </div>
                    @endif

                    <div
                        class="flex items-center justify-between p-space-xs bg-surface-container-low rounded-lg mb-space-lg border border-border-light">
                        <button
                            class="flex-1 py-1.5 text-center font-label-md text-label-md rounded-md bg-surface-container-lowest text-primary shadow-sm transition-all flex items-center justify-center gap-1 border border-border-light"
                            id="role-student" type="button">
                            <span class="material-symbols-outlined text-[18px]">school</span>
                            Mahasiswa
                        </button>
                        <button
                            class="flex-1 py-1.5 text-center font-label-md text-label-md rounded-md text-on-surface-variant hover:text-on-surface transition-all flex items-center justify-center gap-1 border border-transparent"
                            id="role-partner" type="button">
                            <span class="material-symbols-outlined text-[18px]">storefront</span>
                            Mitra Usaha
                        </button>
                    </div>

                    <form class="space-y-space-md" method="POST" action="{{ route('login') }}">
                        @csrf
                        <input type="hidden" name="role" id="login-role" value="{{ old('role', 'student') }}">

                        <div>
                            <label class="block font-label-sm text-label-sm text-on-surface mb-1" for="identifier">
                                Email atau No. Handphone
                            </label>
                            <div class="relative flex items-center">
                                <span
                                    class="material-symbols-outlined absolute left-space-md text-[20px] text-on-surface-variant pointer-events-none">alternate_email</span>
                                <input
                                    class="w-full pl-11 pr-space-md py-2.5 rounded-lg bg-surface-container-low text-on-surface placeholder:text-text-faint-light font-body-sm text-body-sm focus:outline-none focus:bg-surface-container-lowest focus:ring-2 focus:ring-brand-500 transition-all border border-border-light"
                                    id="identifier" name="email" value="{{ old('email') }}" placeholder="nama@email.com atau 0812..." required
                                    type="text" />
                            </div>
                        </div>

                        <div>
                            <label class="block font-label-sm text-label-sm text-on-surface mb-1" for="password">Kata
                                Sandi</label>
                            <div class="relative flex items-center">
                                <span
                                    class="material-symbols-outlined absolute left-space-md text-[20px] text-on-surface-variant pointer-events-none">lock</span>
                                <input
                                    class="w-full pl-11 pr-11 py-2.5 rounded-lg bg-surface-container-low text-on-surface placeholder:text-text-faint-light font-body-sm text-body-sm focus:outline-none focus:bg-surface-container-lowest focus:ring-2 focus:ring-brand-500 transition-all border border-border-light"
                                    id="password" name="password" placeholder="Minimal 8 karakter" required
                                    type="password" />
                                <button aria-label="Tampilkan atau sembunyikan kata sandi"
                                    class="absolute right-space-md text-on-surface-variant hover:text-on-surface focus:outline-none flex items-center justify-center"
                                    id="toggle-password" type="button">
                                    <span class="material-symbols-outlined text-[20px]" id="password-icon">visibility</span>
                                </button>
                            </div>
                        </div>

                        <div class="flex items-center justify-between pt-1">
                            <label class="flex items-center gap-2 cursor-pointer select-none">
                                <input
                                    class="w-4 h-4 rounded text-brand-600 bg-surface-container-low border border-border-light focus:ring-brand-500 accent-brand-600 cursor-pointer"
                                    id="remember" name="remember" type="checkbox" />
                                <span class="font-body-sm text-body-sm text-on-surface-variant">Ingat saya</span>
                            </label>
                            <a class="font-label-sm text-label-sm text-primary hover:underline transition-colors"
                                href="{{ route('password.request') }}">Lupa kata sandi?</a>
                        </div>

                        <button
                            class="w-full mt-2 py-3 px-space-lg rounded-full bg-brand-600 text-white font-label-md text-label-md hover:bg-brand-700 active:scale-[0.99] transition-all shadow-md flex items-center justify-center gap-space-xs"
                            type="submit">
                            <span>Masuk Sekarang</span>
                            <span class="material-symbols-outlined text-[18px]">arrow_forward</span>
                        </button>
                    </form>

                    <div class="relative my-space-lg flex items-center justify-center">
                        <div class="w-full h-[1px] bg-border-light"></div>
                        <span
                            class="absolute px-space-md bg-surface-container-lowest font-body-xs text-body-xs text-on-surface-variant uppercase tracking-wider">atau
                            masuk dengan</span>
                    </div>

                    <button
                        class="w-full py-2.5 px-space-md rounded-full bg-surface-container-low hover:bg-surface-container text-on-surface font-label-md text-label-md transition-all flex items-center justify-center gap-3 shadow-sm active:scale-[0.99] border border-border-light"
                        type="button" data-action="google-auth">
                        <svg class="w-5 h-5 flex-shrink-0" viewBox="0 0 24 24">
                            <path
                                d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"
                                fill="#4285F4"></path>
                            <path
                                d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"
                                fill="#34A853"></path>
                            <path
                                d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.06H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.94l2.85-2.22.81-.63z"
                                fill="#FBBC05"></path>
                            <path
                                d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.06l3.66 2.84c.87-2.6 3.3-4.52 6.16-4.52z"
                                fill="#EA4335"></path>
                        </svg>
                        <span>Lanjutkan dengan Google</span>
                    </button>

                    <p class="text-center font-body-sm text-body-sm text-on-surface-variant mt-space-lg">
                        Belum punya akun?
                        <a class="font-label-md text-label-md text-primary hover:underline transition-colors ml-1 font-semibold"
                            href="{{ route('register') }}">Daftar Sekarang</a>
                    </p>
                </div>

                <div class="mt-space-lg flex flex-col items-center gap-space-xs text-center">
                    <div class="inline-flex items-center gap-space-xs text-on-surface-variant font-label-sm text-label-sm">
                        <span class="material-symbols-outlined text-[16px] text-success">lock_open</span>
                        <span>100% Gratis untuk Pencari Kerja · Dilindungi enkripsi aman</span>
                    </div>
                    <p class="font-body-xs text-body-xs text-on-surface-variant max-w-xs">
                        Terintegrasi langsung dengan jadwal kuliah & verifikasi KTP/KTM resmi
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
