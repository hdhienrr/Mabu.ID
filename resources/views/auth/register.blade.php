@extends('layouts.auth')
@section('title', 'Daftar Akun - MABU')

@section('content')
    <div class="flex flex-col w-full py-space-xl px-margin sm:px-0 items-center justify-center relative overflow-hidden">
        <div class="absolute -top-24 -left-20 w-80 h-80 bg-brand-100 opacity-40 dark:opacity-20 rounded-full blur-3xl pointer-events-none -z-10">
        </div>
        <div
            class="absolute -bottom-20 -right-20 w-96 h-96 bg-primary-fixed opacity-40 dark:opacity-20 rounded-full blur-3xl pointer-events-none -z-10">
        </div>

        <div
            class="w-full max-w-[480px] auth-card rounded-xl shadow-xl p-space-lg sm:p-space-xl flex flex-col gap-space-lg transition-all duration-300 border border-border-light">

            <div class="flex flex-col items-center text-center gap-space-xxs">
                <div
                    class="inline-flex items-center gap-space-xs px-space-sm py-1 rounded-full bg-brand-50 text-primary font-label-sm text-label-sm mb-space-xxs border border-border-light">
                    <span class="material-symbols-outlined text-[16px] text-primary">verified_user</span>
                    <span>Aman & Terverifikasi</span>
                </div>
                <h1 class="font-headline-xl text-headline-xl text-on-surface tracking-tight">Daftar Akun MABU</h1>
                <p class="font-body-sm text-body-sm text-on-surface-variant max-w-[380px]">
                    Mulai temukan pekerjaan part-time fleksibel atau pasang lowongan untuk usaha Anda.
                </p>
            </div>

            <!-- Validation Errors Alert -->
            @if ($errors->any())
                <div class="p-3.5 rounded-xl bg-error/10 border border-error/20 text-error font-body-sm text-body-sm flex items-start gap-2.5">
                    <span class="material-symbols-outlined text-[20px] shrink-0 mt-0.5">error</span>
                    <div class="flex-1">
                        <span class="font-semibold block mb-0.5">Pendaftaran gagal:</span>
                        <ul class="list-disc list-inside space-y-0.5 text-xs">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

            <div class="flex flex-col gap-space-xs">
                <label class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">Pilih Jenis
                    Akun</label>
                <div class="grid grid-cols-2 gap-space-xs p-1 bg-surface-container-low rounded-xl border border-border-light">
                    <button
                        class="flex flex-col items-start p-space-sm rounded-lg text-left transition-all duration-200 {{ old('role', 'jobseeker') === 'jobseeker' ? 'bg-surface-container-lowest shadow-sm text-primary border border-border-light' : 'text-on-surface-variant hover:text-on-surface border border-transparent' }} group"
                        id="role-jobseeker-btn" type="button">
                        <div class="flex items-center justify-between w-full mb-1">
                            <span
                                class="material-symbols-outlined text-[22px] text-primary group-hover:scale-110 transition-transform">school</span>
                        </div>
                        <span class="font-label-md text-label-md text-on-surface font-semibold">Pencari Kerja</span>
                        <span class="font-body-xs text-body-xs text-on-surface-variant line-clamp-1 mt-0.5">Mahasiswa, SMK,
                            Umum</span>
                    </button>
                    <button
                        class="flex flex-col items-start p-space-sm rounded-lg text-left transition-all duration-200 {{ old('role') === 'employer' ? 'bg-surface-container-lowest shadow-sm text-primary border border-border-light' : 'text-on-surface-variant hover:text-on-surface border border-transparent' }} group"
                        id="role-employer-btn" type="button">
                        <div class="flex items-center justify-between w-full mb-1">
                            <span
                                class="material-symbols-outlined text-[22px] text-on-surface-variant group-hover:text-primary transition-colors group-hover:scale-110 transition-transform">storefront</span>
                        </div>
                        <span class="font-label-md text-label-md text-on-surface font-semibold">Pemilik Usaha</span>
                        <span class="font-body-xs text-body-xs text-on-surface-variant line-clamp-1 mt-0.5">Warkop, Kafe,
                            UMKM</span>
                    </button>
                </div>
            </div>

            <form id="register-form" class="flex flex-col gap-space-md" method="POST" action="{{ route('register') }}">
                @csrf
                <input id="selected-role" name="role" type="hidden" value="{{ old('role', 'jobseeker') }}">

                <div class="flex flex-col gap-1.5">
                    <label class="font-label-md text-label-md text-on-surface" for="fullname">Nama Lengkap</label>
                    <div class="relative flex items-center">
                        <span
                            class="material-symbols-outlined absolute left-3 text-[20px] text-on-surface-variant pointer-events-none">person</span>
                        <input
                            class="w-full pl-10 pr-4 py-2.5 rounded-lg bg-surface-container-low text-on-surface placeholder:text-text-faint-light font-body-sm text-body-sm focus:bg-surface-container-lowest focus:ring-2 focus:ring-brand-500 transition-all outline-none border border-border-light"
                            id="fullname" name="name" value="{{ old('name') }}" placeholder="Contoh: Bagas Pratama" required type="text">
                    </div>
                </div>

                <div class="flex flex-col gap-1.5">
                    <label class="font-label-md text-label-md text-on-surface" for="email">Email Aktif</label>
                    <div class="relative flex items-center">
                        <span
                            class="material-symbols-outlined absolute left-3 text-[20px] text-on-surface-variant pointer-events-none">mail</span>
                        <input
                            class="w-full pl-10 pr-4 py-2.5 rounded-lg bg-surface-container-low text-on-surface placeholder:text-text-faint-light font-body-sm text-body-sm focus:bg-surface-container-lowest focus:ring-2 focus:ring-brand-500 transition-all outline-none border border-border-light"
                            id="email" name="email" value="{{ old('email') }}" placeholder="nama@email.com" required type="email">
                    </div>
                </div>

                <div class="flex flex-col gap-1.5">
                    <div class="flex items-center justify-between">
                        <label class="font-label-md text-label-md text-on-surface" for="phone">Nomor WhatsApp / HP</label>
                        <span class="font-body-xs text-body-xs text-text-faint-light">Untuk info shift & kontak</span>
                    </div>
                    <div class="relative flex items-center">
                        <span
                            class="material-symbols-outlined absolute left-3 text-[20px] text-on-surface-variant pointer-events-none">call</span>
                        <input
                            class="w-full pl-10 pr-4 py-2.5 rounded-lg bg-surface-container-low text-on-surface placeholder:text-text-faint-light font-body-sm text-body-sm focus:bg-surface-container-lowest focus:ring-2 focus:ring-brand-500 transition-all outline-none border border-border-light"
                            id="phone" name="phone" value="{{ old('phone') }}" pattern="[0-9]{10,14}" placeholder="081234567890" required type="tel">
                    </div>
                </div>

                <div class="flex flex-col gap-1.5">
                    <label class="font-label-md text-label-md text-on-surface" for="password">Kata Sandi</label>
                    <div class="relative flex items-center">
                        <span
                            class="material-symbols-outlined absolute left-3 text-[20px] text-on-surface-variant pointer-events-none">lock</span>
                        <input
                            class="w-full pl-10 pr-11 py-2.5 rounded-lg bg-surface-container-low text-on-surface placeholder:text-text-faint-light font-body-sm text-body-sm focus:bg-surface-container-lowest focus:ring-2 focus:ring-brand-500 transition-all outline-none border border-border-light"
                            id="password" name="password" placeholder="Minimal 8 karakter" required type="password">
                        <button aria-label="Tampilkan atau sembunyikan kata sandi"
                            class="absolute right-3 text-on-surface-variant hover:text-on-surface flex items-center justify-center p-1"
                            id="toggle-reg-password" data-toggle="password" data-target="password" data-icon="password-toggle-icon" type="button">
                            <span class="material-symbols-outlined text-[20px]" id="password-toggle-icon">visibility</span>
                        </button>
                    </div>
                    <div class="flex flex-col gap-1 mt-1">
                        <div class="grid grid-cols-4 gap-1 h-1.5 w-full rounded-full overflow-hidden bg-surface-container">
                            <div class="h-full bg-border-light transition-colors" id="bar-1"></div>
                            <div class="h-full bg-border-light transition-colors" id="bar-2"></div>
                            <div class="h-full bg-border-light transition-colors" id="bar-3"></div>
                            <div class="h-full bg-border-light transition-colors" id="bar-4"></div>
                        </div>
                        <div class="flex items-center justify-between text-body-xs font-body-xs text-text-faint-light">
                            <span id="strength-label">Kekuatan sandi</span>
                            <span class="text-[11px]">Kombinasi huruf & angka</span>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col gap-1.5">
                    <label class="font-label-md text-label-md text-on-surface" for="password_confirmation">Konfirmasi Kata
                        Sandi</label>
                    <div class="relative flex items-center">
                        <span
                            class="material-symbols-outlined absolute left-3 text-[20px] text-on-surface-variant pointer-events-none">lock_reset</span>
                        <input
                            class="w-full pl-10 pr-11 py-2.5 rounded-lg bg-surface-container-low text-on-surface placeholder:text-text-faint-light font-body-sm text-body-sm focus:bg-surface-container-lowest focus:ring-2 focus:ring-brand-500 transition-all outline-none border border-border-light"
                            id="password_confirmation" name="password_confirmation" placeholder="Ulangi kata sandi" required type="password">
                        <button aria-label="Tampilkan atau sembunyikan konfirmasi kata sandi"
                            class="absolute right-3 text-on-surface-variant hover:text-on-surface flex items-center justify-center p-1"
                            id="toggle-confirm-password" data-toggle="password" data-target="password_confirmation" data-icon="confirm-toggle-icon"
                            type="button">
                            <span class="material-symbols-outlined text-[20px]" id="confirm-toggle-icon">visibility</span>
                        </button>
                    </div>
                    <p class="hidden text-error font-body-xs text-body-xs flex items-center gap-1 mt-0.5" id="match-error">
                        <span class="material-symbols-outlined text-[14px]">error</span>
                        <span>Kata sandi tidak cocok.</span>
                    </p>
                </div>

                <div class="flex items-start gap-space-xs mt-1">
                    <div class="relative flex items-center pt-0.5">
                        <input
                            class="w-4 h-4 rounded cursor-pointer accent-brand-600 bg-surface-container-low border border-border-light text-primary"
                            id="terms" required type="checkbox">
                    </div>
                    <label
                        class="font-body-sm text-body-sm text-on-surface-variant select-none cursor-pointer leading-tight"
                        for="terms">
                        Saya menyetujui <a class="text-primary hover:underline font-label-md font-medium" href="#">Syarat &
                            Ketentuan</a> serta <a class="text-primary hover:underline font-label-md font-medium"
                            href="#">Kebijakan Privasi</a> MABU.
                    </label>
                </div>

                <button
                    class="w-full py-3.5 px-space-lg rounded-full bg-brand-600 hover:bg-brand-700 active:scale-[0.99] text-white font-label-lg text-label-lg shadow-md hover:shadow-lg transition-all flex items-center justify-center gap-space-xs mt-space-xs"
                    id="submit-btn" type="submit">
                    <span>Daftar Sekarang</span>
                    <span class="material-symbols-outlined text-[20px]">arrow_forward</span>
                </button>

                <div class="relative flex items-center justify-center my-space-xs">
                    <div class="w-full h-[1px] bg-border-light"></div>
                    <span
                        class="absolute bg-surface-container-lowest px-space-md text-text-faint-light font-body-xs text-body-xs uppercase tracking-wider">atau
                        daftar dengan</span>
                </div>

                <button
                    class="w-full py-2.5 px-space-md rounded-full bg-surface-container-low hover:bg-surface-container text-on-surface font-label-md text-label-md shadow-sm hover:shadow transition-all flex items-center justify-center gap-space-xs border border-border-light"
                    type="button" data-action="google-auth">
                    <svg aria-hidden="true" class="w-5 h-5 shrink-0" viewBox="0 0 24 24">
                        <path
                            d="M23.745 12.27c0-.7-.06-1.4-.19-2.07H12v4.51h6.6c-.29 1.52-1.14 2.8-2.4 3.65v3h3.86c2.26-2.09 3.68-5.17 3.68-9.09z"
                            fill="#4285F4"></path>
                        <path
                            d="M12 24c3.24 0 5.95-1.08 7.93-2.91l-3.86-3c-1.08.72-2.45 1.16-4.07 1.16-3.13 0-5.78-2.11-6.73-4.96H1.29v3.09C3.26 21.3 7.37 24 12 24z"
                            fill="#34A853"></path>
                        <path
                            d="M5.27 14.29c-.25-.72-.38-1.49-.38-2.29s.13-1.57.38-2.29V6.62H1.29C.47 8.24 0 10.06 0 12s.47 3.76 1.29 5.38l3.98-3.09z"
                            fill="#FBBC05"></path>
                        <path
                            d="M12 4.75c1.77 0 3.35.61 4.6 1.8l3.42-3.42C17.95 1.19 15.24 0 12 0 7.37 0 3.26 2.7 1.29 6.62l3.98 3.09c.95-2.85 3.6-4.96 6.73-4.96z"
                            fill="#EA4335"></path>
                    </svg>
                    <span>Daftar dengan Google</span>
                </button>
            </form>

            <div class="pt-space-xs text-center">
                <p class="font-body-sm text-body-sm text-on-surface-variant">
                    Sudah punya akun?
                    <a class="text-primary hover:underline font-label-md text-label-md font-semibold"
                        href="{{ route('login') }}">Masuk di sini</a>
                </p>
            </div>
        </div>

        <div
            class="mt-space-md flex flex-wrap items-center justify-center gap-space-lg text-text-faint-light font-body-xs text-body-xs">
            <div class="flex items-center gap-1">
                <span class="material-symbols-outlined text-[16px] text-success">lock</span>
                <span>Enkripsi SSL 256-bit</span>
            </div>
            <div class="flex items-center gap-1">
                <span class="material-symbols-outlined text-[16px] text-primary">verified</span>
                <span>100% Gratis untuk Pencari Kerja</span>
            </div>
        </div>
    </div>
@endsection
