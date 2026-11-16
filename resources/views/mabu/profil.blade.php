@extends('layouts.mabu')

@section('title', 'Edit Profil Pengguna - MABU')

@section('content')
<div class="max-w-6xl mx-auto space-y-6">

    <!-- Header Atas Profil + Tab Navigasi ke Halaman Dwiky -->
    <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-xs space-y-4">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3">
            <div class="space-y-0.5">
                <div class="flex items-center gap-1.5 text-muted text-xs font-medium">
                    <a class="hover:text-primary transition-colors" href="{{ route('mabu.dashboard') }}">Main Page</a>
                    <span class="material-symbols-outlined text-[14px]">chevron_right</span>
                    <span class="text-ink font-semibold">Profil Pengguna</span>
                </div>
                <h1 class="font-heading text-2xl font-extrabold text-ink tracking-tight">Edit Profil Pengguna</h1>
            </div>

            <div class="flex items-center gap-2.5 self-start sm:self-auto">
                <div class="flex items-center gap-2 px-3 py-1.5 rounded-full bg-emerald-50 border border-emerald-200">
                    <div class="w-2 h-2 rounded-full bg-emerald-600 animate-pulse"></div>
                    <span class="text-xs text-emerald-800 font-semibold">Profil 85% Lengkap</span>
                </div>
                <a href="{{ route('mabu.jadwal') }}"
                   class="inline-flex items-center gap-1 px-3.5 py-1.5 rounded-full bg-primary-light text-primary hover:bg-blue-100 transition-colors text-xs font-semibold">
                    <span>Atur Jadwal Kuliah</span>
                    <span class="material-symbols-outlined text-[16px]">calendar_today</span>
                </a>
            </div>
        </div>

        <!-- Tab Sub-menu Profil -->
        <div class="flex flex-wrap items-center gap-2 pt-3 border-t border-slate-100">
            <a href="{{ route('mabu.profil') }}"
               class="px-3.5 py-1.5 rounded-xl text-xs font-bold bg-primary text-white shadow-2xs">
                Ringkasan &amp; Akun
            </a>
            <a href="{{ route('mabu.profil.data-diri') }}"
               class="px-3.5 py-1.5 rounded-xl text-xs font-semibold bg-slate-50 border border-slate-200 text-ink hover:bg-primary-light hover:text-primary transition">
                Data Diri Lengkap
            </a>
            <a href="{{ route('mabu.profil.pengalaman') }}"
               class="px-3.5 py-1.5 rounded-xl text-xs font-semibold bg-slate-50 border border-slate-200 text-ink hover:bg-primary-light hover:text-primary transition">
                Pengalaman &amp; Keahlian
            </a>
        </div>
    </div>

    <!-- Main Form Grid Layout -->
    <form class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-start" id="profileForm" onsubmit="event.preventDefault(); showSaveToast();">

        <!-- KOLOM KIRI (7/12) -->
        <div class="lg:col-span-7 flex flex-col gap-6">

            <div class="bg-white rounded-2xl border border-slate-200/80 shadow-xs overflow-hidden">
                <div class="relative h-36 w-full bg-gradient-to-r from-primary via-primary-container to-blue-400 flex items-end justify-end p-4 overflow-hidden">
                    <div class="absolute -top-10 -right-10 w-44 h-44 rounded-full bg-white/10 blur-xl"></div>
                    <div class="absolute -bottom-8 left-16 w-32 h-32 rounded-full bg-emerald-300/20 blur-lg"></div>
                    <button class="relative z-10 inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full bg-white/90 text-ink hover:bg-white text-xs font-semibold shadow-xs backdrop-blur-md transition active:scale-95" type="button">
                        <span class="material-symbols-outlined text-[16px] text-primary">edit</span>
                        <span>Ganti Sampul</span>
                    </button>
                </div>

                <div class="px-6 pb-6 pt-0">
                    <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4 -mt-12 mb-4">
                        <div class="relative inline-block self-start">
                            <div class="w-24 h-24 rounded-2xl bg-primary-light text-primary font-heading font-extrabold text-2xl flex items-center justify-center overflow-hidden shadow-md ring-4 ring-white" id="avatarPreviewBox">
                                AC
                            </div>
                            <button aria-label="Ganti foto profil" onclick="document.getElementById('avatarFileInput').click()"
                                    class="absolute -bottom-1 -right-1 w-8 h-8 rounded-full bg-primary text-white flex items-center justify-center shadow-md hover:scale-105 transition" type="button">
                                <span class="material-symbols-outlined text-[16px]">photo_camera</span>
                            </button>
                        </div>

                        <div class="flex items-center gap-2 pt-2">
                            <button class="px-4 py-2 rounded-full bg-slate-100 hover:bg-slate-200 text-ink font-semibold text-xs transition"
                                    onclick="document.getElementById('avatarFileInput').click()" type="button">
                                Unggah Foto Baru
                            </button>
                            <input accept="image/*" class="hidden" id="avatarFileInput" type="file" onchange="previewAvatar(event)"/>
                            <button class="px-5 py-2 rounded-full bg-primary text-white hover:bg-blue-700 transition font-semibold text-xs shadow-xs"
                                    onclick="showSaveToast('Foto profil tersimpan')" type="button">
                                Simpan
                            </button>
                        </div>
                    </div>

                    <div>
                        <h2 class="font-heading text-base text-ink font-bold">Foto Profil Kamu</h2>
                        <p class="text-xs text-muted mt-0.5">
                            Foto ini akan ditampilkan pada kartu pelamar kerja dan portofolio resmi MABU. Format JPG/PNG maks. 2MB.
                        </p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl border border-slate-200/80 shadow-xs p-6 flex flex-col gap-4">
                <div class="flex items-center justify-between pb-2 border-b border-slate-100">
                    <div>
                        <h2 class="font-heading text-base text-ink font-bold">Informasi Pribadi</h2>
                        <p class="text-xs text-muted">Lengkapi data diri akademik dan kontak untuk mempermudah verifikasi mitra usaha.</p>
                    </div>
                    <span class="w-9 h-9 rounded-full bg-primary-light flex items-center justify-center text-primary">
                        <span class="material-symbols-outlined text-[18px]">badge</span>
                    </span>
                </div>

                <div class="space-y-1.5">
                    <label class="block text-xs font-bold text-ink" for="fullName">Nama Lengkap</label>
                    <div class="relative flex items-center">
                        <span class="absolute left-3.5 material-symbols-outlined text-[18px] text-muted">person</span>
                        <input class="w-full bg-slate-50 border border-slate-200 focus:bg-white focus:border-primary rounded-xl py-2.5 pl-10 pr-4 text-ink text-xs transition outline-none"
                               id="fullName" name="fullName" type="text" value="Andika Candra"/>
                    </div>
                </div>

                <div class="space-y-1.5">
                    <label class="block text-xs font-bold text-ink" for="emailAddress">Alamat Email Kampus / Aktif</label>
                    <div class="relative flex items-center">
                        <span class="absolute left-3.5 material-symbols-outlined text-[18px] text-muted">mail</span>
                        <input class="w-full bg-slate-50 border border-slate-200 focus:bg-white focus:border-primary rounded-xl py-2.5 pl-10 pr-4 text-ink text-xs transition outline-none"
                               id="emailAddress" name="emailAddress" type="email" value="andika.candra@student.its.ac.id"/>
                    </div>
                </div>

                <div class="space-y-1.5">
                    <label class="block text-xs font-bold text-ink" for="phoneNumber">Nomor WhatsApp Aktif</label>
                    <div class="relative flex items-center">
                        <div class="absolute left-3.5 flex items-center gap-1.5 pointer-events-none">
                            <span class="w-4 h-3 bg-red-600 rounded-[1px] relative overflow-hidden inline-block border border-slate-200">
                                <span class="absolute bottom-0 inset-x-0 h-1/2 bg-white"></span>
                            </span>
                            <span class="text-xs text-ink font-semibold">+62</span>
                        </div>
                        <input class="w-full bg-slate-50 border border-slate-200 focus:bg-white focus:border-primary rounded-xl py-2.5 pl-16 pr-4 text-ink text-xs transition outline-none"
                               id="phoneNumber" name="phoneNumber" type="tel" value="812-3456-7890"/>
                    </div>
                </div>

                <div class="space-y-1.5">
                    <label class="block text-xs font-bold text-ink" for="universityMajor">Universitas &amp; Jurusan</label>
                    <div class="relative flex items-center">
                        <span class="absolute left-3.5 material-symbols-outlined text-[18px] text-muted">account_balance</span>
                        <input class="w-full bg-slate-50 border border-slate-200 focus:bg-white focus:border-primary rounded-xl py-2.5 pl-10 pr-4 text-ink text-xs transition outline-none"
                               id="universityMajor" name="universityMajor" type="text" value="Institut Teknologi Sepuluh Nopember - Teknik Informatika"/>
                    </div>
                </div>
            </div>
        </div>

        <!-- KOLOM KANAN (5/12) -->
        <div class="lg:col-span-5 flex flex-col gap-6">

            <div class="bg-white rounded-2xl border border-slate-200/80 shadow-xs p-6 flex flex-col gap-4">
                <div>
                    <h2 class="font-heading text-base text-ink font-bold">Bidang yang Diminati</h2>
                    <p class="text-xs text-muted mt-1 leading-snug">
                        Pilih bidang minat pekerjaan part-time agar rekomendasi lowongan di Main Page semakin akurat.
                    </p>
                </div>

                <div class="flex flex-wrap gap-2" id="interestsContainer">
                    @foreach(['Barista & F&B', 'Desain Grafis & UI', 'Kasir & Retail', 'Admin & Data Entry', 'Event Staff & Crew', 'Tutor / Pengajar'] as $minat)
                    <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full bg-primary-light text-primary text-xs font-semibold">
                        <span>{{ $minat }}</span>
                        <button aria-label="Hapus {{ $minat }}" class="hover:text-red-600 transition-colors flex items-center justify-center" onclick="this.parentElement.remove()" type="button">
                            <span class="material-symbols-outlined text-[15px]">close</span>
                        </button>
                    </span>
                    @endforeach
                </div>

                <div class="pt-1">
                    <div class="hidden flex items-center gap-2 mb-2" id="addInterestInputWrapper">
                        <input class="flex-1 bg-slate-50 border border-slate-200 rounded-xl py-2 px-3 text-ink text-xs outline-none focus:border-primary"
                               id="newInterestInput" placeholder="Ketik keahlian / minat..." type="text"/>
                        <button class="px-3.5 py-2 rounded-xl bg-primary text-white text-xs font-semibold" onclick="addNewInterest()" type="button">Tambah</button>
                        <button class="p-1.5 text-muted hover:text-ink" onclick="toggleAddInterest(false)" type="button">
                            <span class="material-symbols-outlined text-[18px]">close</span>
                        </button>
                    </div>
                    <button class="w-full py-2.5 rounded-xl bg-slate-50 hover:bg-primary-light text-primary text-xs font-semibold flex items-center justify-center gap-1.5 border border-slate-200/80 transition"
                            id="openAddInterestBtn" onclick="toggleAddInterest(true)" type="button">
                        <span class="material-symbols-outlined text-[18px]">add_circle</span>
                        <span>Tambah Bidang Minat</span>
                    </button>
                </div>
            </div>

            <div class="bg-white rounded-2xl border border-slate-200/80 shadow-xs p-6 flex flex-col gap-4">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="font-heading text-base text-ink font-bold">Akun Media Sosial &amp; Tautan</h2>
                        <p class="text-xs text-muted mt-0.5">Tautkan portofolio atau akun profesionalmu.</p>
                    </div>
                    <span class="w-8 h-8 rounded-full bg-primary-light flex items-center justify-center text-primary">
                        <span class="material-symbols-outlined text-[18px]">link</span>
                    </span>
                </div>

                <div class="flex flex-col gap-2.5" id="socialLinksContainer">
                    <div class="relative flex items-center">
                        <div class="absolute left-3 w-6 h-6 rounded-md bg-primary-light flex items-center justify-center text-primary">
                            <span class="text-[11px] font-bold">in</span>
                        </div>
                        <input class="w-full bg-slate-50 border border-slate-200 focus:bg-white focus:border-primary rounded-xl py-2.5 pl-11 pr-4 text-ink text-xs outline-none"
                               name="linkedinUrl" type="text" value="https://linkedin.com/in/andikacandra"/>
                    </div>

                    <div class="relative flex items-center">
                        <div class="absolute left-3 w-6 h-6 rounded-md bg-primary-light flex items-center justify-center text-primary">
                            <span class="material-symbols-outlined text-[15px]">photo_camera</span>
                        </div>
                        <input class="w-full bg-slate-50 border border-slate-200 focus:bg-white focus:border-primary rounded-xl py-2.5 pl-11 pr-4 text-ink text-xs outline-none"
                               name="instagramUrl" type="text" value="https://instagram.com/andika.candra"/>
                    </div>

                    <div class="relative flex items-center">
                        <div class="absolute left-3 w-6 h-6 rounded-md bg-primary-light flex items-center justify-center text-primary">
                            <span class="material-symbols-outlined text-[15px]">code</span>
                        </div>
                        <input class="w-full bg-slate-50 border border-slate-200 focus:bg-white focus:border-primary rounded-xl py-2.5 pl-11 pr-4 text-ink text-xs outline-none"
                               name="portfolioUrl" type="text" value="https://github.com/andikacandra"/>
                    </div>
                </div>

                <button class="w-full py-2.5 rounded-xl bg-slate-50 hover:bg-slate-100 text-ink text-xs font-semibold flex items-center justify-center gap-1.5 border border-slate-200/80 transition"
                        onclick="addCustomSocialLink()" type="button">
                    <span class="material-symbols-outlined text-[18px]">add</span>
                    <span>Tambah Tautan Lain</span>
                </button>
            </div>
        </div>

        <!-- ACTION BAR BAWAH -->
        <div class="lg:col-span-12 flex flex-col sm:flex-row items-center justify-between gap-4 bg-white p-5 rounded-2xl border border-slate-200/80 shadow-xs">
            <div class="flex items-center gap-2 text-muted text-xs">
                <span class="material-symbols-outlined text-[18px] text-emerald-600">check_circle</span>
                <span>Pastikan data kontak &amp; bidang minat sesuai agar rekomendasi lowongan akurat.</span>
            </div>

            <div class="flex items-center w-full sm:w-auto justify-end">
                <a href="{{ route('mabu.profil.data-diri') }}" class="px-7 py-2.5 rounded-full bg-primary text-white hover:bg-blue-700 transition font-semibold text-xs shadow-xs flex items-center gap-1.5">
                    <span class="material-symbols-outlined text-[17px]">person_edit</span>
                    <span>Edit Data Diri</span>
                </a>
            </div>
        </div>
    </form>

    <!-- Form Logout Breeze -->
    <div class="flex justify-start">
        <form method="POST" action="{{ route('logout') }}" onsubmit="return confirm('Yakin ingin keluar dari akun ini?')">
            @csrf
            <button type="submit" class="inline-flex items-center gap-1.5 px-4 py-2.5 rounded-xl text-xs font-semibold text-red-600 hover:bg-red-50 transition">
                <span class="material-symbols-outlined text-[18px]">logout</span>
                <span>Logout dari Akun</span>
            </button>
        </form>
    </div>

    <!-- Save Notification Toast -->
    <div class="fixed bottom-6 right-6 z-50 transform translate-y-20 opacity-0 transition-all duration-300 pointer-events-none" id="saveToast">
        <div class="bg-slate-900 text-white px-5 py-3 rounded-xl shadow-xl flex items-center gap-2.5">
            <span class="material-symbols-outlined text-emerald-400 text-[20px]">verified</span>
            <span class="text-xs font-semibold" id="toastMessage">Profil berhasil diperbarui dan disimpan!</span>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    function previewAvatar(event) {
        const file = event.target.files[0];
        if (!file) return;
        const reader = new FileReader();
        reader.onload = function(e) {
            const box = document.getElementById('avatarPreviewBox');
            box.innerHTML = `<img src="${e.target.result}" class="w-full h-full object-cover" alt="Foto Profil">`;
        };
        reader.readAsDataURL(file);
    }

    function toggleAddInterest(show) {
        const inputWrapper = document.getElementById('addInterestInputWrapper');
        const openBtn = document.getElementById('openAddInterestBtn');
        const input = document.getElementById('newInterestInput');

        if (show) {
            inputWrapper.classList.remove('hidden');
            openBtn.classList.add('hidden');
            input.focus();
        } else {
            inputWrapper.classList.add('hidden');
            openBtn.classList.remove('hidden');
            input.value = '';
        }
    }

    function addNewInterest() {
        const input = document.getElementById('newInterestInput');
        const val = input.value.trim();
        if (!val) return;

        const container = document.getElementById('interestsContainer');
        const chip = document.createElement('span');
        chip.className = 'inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full bg-primary-light text-primary text-xs font-semibold';
        chip.innerHTML = `
            <span>${val}</span>
            <button type="button" onclick="this.parentElement.remove()" class="hover:text-red-600 transition-colors flex items-center justify-center">
                <span class="material-symbols-outlined text-[15px]">close</span>
            </button>
        `;
        container.appendChild(chip);

        input.value = '';
        toggleAddInterest(false);
    }

    function addCustomSocialLink() {
        const container = document.getElementById('socialLinksContainer');
        const linkDiv = document.createElement('div');
        linkDiv.className = 'relative flex items-center';
        linkDiv.innerHTML = `
            <div class="absolute left-3 w-6 h-6 rounded-md bg-primary-light flex items-center justify-center text-primary">
                <span class="material-symbols-outlined text-[15px]">language</span>
            </div>
            <input type="text" name="customUrl[]" class="w-full bg-slate-50 border border-slate-200 focus:bg-white focus:border-primary rounded-xl py-2.5 pl-11 pr-10 text-ink text-xs outline-none" placeholder="https://website-atau-portofolio-kamu.com">
            <button type="button" onclick="this.parentElement.remove()" class="absolute right-3 text-muted hover:text-red-600 transition-colors">
                <span class="material-symbols-outlined text-[17px]">delete</span>
            </button>
        `;
        container.appendChild(linkDiv);
    }

    function showSaveToast(customMsg) {
        const toast = document.getElementById('saveToast');
        const msgElement = document.getElementById('toastMessage');
        msgElement.textContent = customMsg || 'Profil berhasil diperbarui dan disimpan!';
        toast.classList.remove('translate-y-20', 'opacity-0', 'pointer-events-none');
        setTimeout(() => {
            toast.classList.add('translate-y-20', 'opacity-0', 'pointer-events-none');
        }, 3000);
    }
</script>
@endpush
