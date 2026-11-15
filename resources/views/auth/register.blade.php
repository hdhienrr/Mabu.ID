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

            <div class="flex flex-col gap-space-xs">
                <label class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">Pilih Jenis
                    Akun</label>
                <div class="grid grid-cols-2 gap-space-xs p-1 bg-surface-container-low rounded-xl border border-border-light">
                    <button
                        class="flex flex-col items-start p-space-sm rounded-lg text-left transition-all duration-200 bg-surface-container-lowest shadow-sm text-primary group border border-border-light"
                        id="role-jobseeker-btn" onclick="setRole('jobseeker')" type="button">
                        <div class="flex items-center justify-between w-full mb-1">
                            <span
                                class="material-symbols-outlined text-[22px] text-primary group-hover:scale-110 transition-transform">school</span>
                        </div>
                        <span class="font-label-md text-label-md text-on-surface font-semibold">Pencari Kerja</span>
                        <span class="font-body-xs text-body-xs text-on-surface-variant line-clamp-1 mt-0.5">Mahasiswa, SMK,
                            Umum</span>
                    </button>
                    <button
                        class="flex flex-col items-start p-space-sm rounded-lg text-left transition-all duration-200 text-on-surface-variant hover:text-on-surface group border border-transparent"
                        id="role-employer-btn" onclick="setRole('employer')" type="button">
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

            <form class="flex flex-col gap-space-md" method="POST" action="{{ route('register') }}"
                onsubmit="return validateForm()">
                @csrf
                <input id="selected-role" name="role" type="hidden" value="jobseeker">

                <div class="flex flex-col gap-1.5">
                    <label class="font-label-md text-label-md text-on-surface" for="fullname">Nama Lengkap</label>
                    <div class="relative flex items-center">
                        <span
                            class="material-symbols-outlined absolute left-3 text-[20px] text-on-surface-variant pointer-events-none">person</span>
                        <input
                            class="w-full pl-10 pr-4 py-2.5 rounded-lg bg-surface-container-low text-on-surface placeholder:text-text-faint-light font-body-sm text-body-sm focus:bg-surface-container-lowest focus:ring-2 focus:ring-brand-500 transition-all outline-none border border-border-light"
                            id="fullname" name="name" placeholder="Contoh: Bagas Pratama" required type="text">
                    </div>
                </div>

                <div class="flex flex-col gap-1.5">
                    <label class="font-label-md text-label-md text-on-surface" for="email">Email Aktif</label>
                    <div class="relative flex items-center">
                        <span
                            class="material-symbols-outlined absolute left-3 text-[20px] text-on-surface-variant pointer-events-none">mail</span>
                        <input
                            class="w-full pl-10 pr-4 py-2.5 rounded-lg bg-surface-container-low text-on-surface placeholder:text-text-faint-light font-body-sm text-body-sm focus:bg-surface-container-lowest focus:ring-2 focus:ring-brand-500 transition-all outline-none border border-border-light"
                            id="email" name="email" placeholder="nama@email.com" required type="email">
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
                            id="phone" name="phone" pattern="[0-9]{10,14}" placeholder="081234567890" required type="tel">
                    </div>
                </div>

                <div class="flex flex-col gap-1.5">
                    <label class="font-label-md text-label-md text-on-surface" for="password">Kata Sandi</label>
                    <div class="relative flex items-center">
                        <span
                            class="material-symbols-outlined absolute left-3 text-[20px] text-on-surface-variant pointer-events-none">lock</span>
                        <input
                            class="w-full pl-10 pr-11 py-2.5 rounded-lg bg-surface-container-low text-on-surface placeholder:text-text-faint-light font-body-sm text-body-sm focus:bg-surface-container-lowest focus:ring-2 focus:ring-brand-500 transition-all outline-none border border-border-light"
                            id="password" name="password" oninput="checkPasswordStrength(this.value)"
                            placeholder="Minimal 8 karakter" required type="password">
                        <button aria-label="Tampilkan atau sembunyikan kata sandi"
                            class="absolute right-3 text-on-surface-variant hover:text-on-surface flex items-center justify-center p-1"
                            onclick="togglePasswordVisibility('password', 'password-toggle-icon')" type="button">
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
                            id="password_confirmation" name="password_confirmation" oninput="checkPasswordMatch()"
                            placeholder="Ulangi kata sandi" required type="password">
                        <button aria-label="Tampilkan atau sembunyikan konfirmasi kata sandi"
                            class="absolute right-3 text-on-surface-variant hover:text-on-surface flex items-center justify-center p-1"
                            onclick="togglePasswordVisibility('password_confirmation', 'confirm-toggle-icon')"
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
                    onclick="handleGoogleSignUp()" type="button">
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

@push('scripts')
    <script>
        function setRole(role) {
            const jobseekerBtn = document.getElementById('role-jobseeker-btn');
            const employerBtn = document.getElementById('role-employer-btn');
            const selectedRoleInput = document.getElementById('selected-role');

            selectedRoleInput.value = role;

            if (role === 'jobseeker') {
                jobseekerBtn.className = 'flex flex-col items-start p-space-sm rounded-lg text-left transition-all duration-200 bg-surface-container-lowest shadow-sm text-primary group border border-border-light';
                employerBtn.className = 'flex flex-col items-start p-space-sm rounded-lg text-left transition-all duration-200 text-on-surface-variant hover:text-on-surface group border border-transparent';
            } else {
                employerBtn.className = 'flex flex-col items-start p-space-sm rounded-lg text-left transition-all duration-200 bg-surface-container-lowest shadow-sm text-primary group border border-border-light';
                jobseekerBtn.className = 'flex flex-col items-start p-space-sm rounded-lg text-left transition-all duration-200 text-on-surface-variant hover:text-on-surface group border border-transparent';
            }
        }

        function togglePasswordVisibility(fieldId, iconId) {
            const field = document.getElementById(fieldId);
            const icon = document.getElementById(iconId);
            if (field.type === 'password') {
                field.type = 'text';
                icon.textContent = 'visibility_off';
            } else {
                field.type = 'password';
                icon.textContent = 'visibility';
            }
        }

        function checkPasswordStrength(val) {
            const b1 = document.getElementById('bar-1'), b2 = document.getElementById('bar-2'),
                b3 = document.getElementById('bar-3'), b4 = document.getElementById('bar-4');
            const label = document.getElementById('strength-label');

            [b1, b2, b3, b4].forEach(b => b.className = 'h-full bg-border-light transition-colors');

            if (!val) {
                label.textContent = 'Kekuatan sandi';
                label.className = 'font-body-xs text-body-xs text-text-faint-light';
                return;
            }

            let score = 0;
            if (val.length >= 8) score++;
            if (/[A-Z]/.test(val)) score++;
            if (/[0-9]/.test(val)) score++;
            if (/[^A-Za-z0-9]/.test(val)) score++;

            if (score === 1) {
                b1.className = 'h-full bg-error transition-colors';
                label.textContent = 'Lemah'; label.className = 'font-body-xs text-body-xs text-error font-medium';
            } else if (score === 2) {
                b1.className = b2.className = 'h-full bg-warning transition-colors';
                label.textContent = 'Cukup'; label.className = 'font-body-xs text-body-xs text-warning font-medium';
            } else if (score === 3) {
                b1.className = b2.className = b3.className = 'h-full bg-info transition-colors';
                label.textContent = 'Baik'; label.className = 'font-body-xs text-body-xs text-info font-medium';
            } else if (score >= 4) {
                [b1, b2, b3, b4].forEach(b => b.className = 'h-full bg-success transition-colors');
                label.textContent = 'Sangat Kuat'; label.className = 'font-body-xs text-body-xs text-success font-medium';
            }
        }

        function checkPasswordMatch() {
            const pwd = document.getElementById('password').value;
            const confirm = document.getElementById('password_confirmation').value;
            const errorEl = document.getElementById('match-error');
            if (confirm && pwd !== confirm) errorEl.classList.remove('hidden');
            else errorEl.classList.add('hidden');
        }

        function validateForm() {
            const pwd = document.getElementById('password').value;
            const confirm = document.getElementById('password_confirmation').value;
            if (pwd !== confirm) {
                document.getElementById('match-error').classList.remove('hidden');
                return false;
            }

            const btn = document.getElementById('submit-btn');
            btn.disabled = true;
            btn.innerHTML = '<span class="material-symbols-outlined animate-spin text-[20px]">progress_activity</span><span>Memproses...</span>';
            return true;
        }

        function handleGoogleSignUp() {
            alert('Membuka autentikasi Google untuk pendaftaran akun MABU...');
        }
    </script>
@endpush
