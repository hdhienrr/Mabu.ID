@extends('layouts.mabu')

@section('title', 'Dashboard Profil - MABU')

@section('content')
@php
    // Data fallback otomatis supaya langsung jalan tanpa error meskipun belum dihubungkan ke database
    $authUser = auth()->user();
    $namaUser = $user['name'] ?? ($authUser->name ?? 'Andika Candra');
    $inisial = collect(explode(' ', $namaUser))->map(fn($n) => strtoupper(substr($n, 0, 1)))->take(2)->join('');
    $kampus = $user['campus'] ?? 'Institut Teknologi Sepuluh Nopember (ITS), Surabaya';
    $jurusan = $user['major'] ?? 'Mahasiswa Teknik Informatika';
    $kelengkapan = $user['profile_completion'] ?? 80;
    $keahlian = $user['skills'] ?? ['Barista & F&B', 'Kasir & Point of Sales', 'Admin Marketplace', 'Tutor Matematika'];
@endphp

<div class="space-y-space-lg">
    <!-- BARIS 1: HERO SAMBUTAN & PROGRESS PROFIL -->
    <section class="bg-gradient-to-br from-primary via-primary-container to-surface-tint rounded-3xl p-6 sm:p-8 text-on-primary shadow-lg shadow-primary/20 relative overflow-hidden">
        <div class="absolute -right-10 -bottom-10 w-72 h-72 rounded-full bg-white/10 blur-2xl pointer-events-none"></div>
        <div class="relative z-10 flex flex-col lg:flex-row lg:items-center justify-between gap-6">
            <div class="space-y-3 max-w-2xl">
                <div class="flex items-center gap-3">
                    <div class="w-12 h-12 rounded-2xl bg-white/20 backdrop-blur-md border border-white/30 flex items-center justify-center font-headline-sm font-bold text-lg text-on-primary shrink-0">
                        {{ $inisial }}
                    </div>
                    <div>
                        <h2 class="font-headline-lg font-bold text-2xl sm:text-3xl tracking-tight flex items-center gap-2">
                            Halo, {{ explode(' ', $namaUser)[0] }}! <span>👋</span>
                        </h2>
                        <p class="text-on-primary-container text-xs sm:text-sm font-medium">{{ $jurusan }} • {{ $kampus }}</p>
                    </div>
                </div>
                <p class="text-on-primary-container/90 text-sm leading-relaxed">
                    Profilmu sudah <span class="font-bold text-on-primary">{{ $kelengkapan }}% lengkap</span>. Lengkapi jadwal kuliah dan keahlianmu agar sistem cerdas MABU dapat otomatis merekomendasikan lowongan part-time di sekitarmu tanpa bentrok waktu!
                </p>

                <!-- Tags Keahlian -->
                <div class="flex flex-wrap items-center gap-1.5 pt-1">
                    <span class="text-xs text-on-primary-container font-medium mr-1">Keahlianmu:</span>
                    @foreach($keahlian as $skill)
                        <span class="bg-white/15 backdrop-blur-sm border border-white/20 text-on-primary text-[11px] font-medium px-2.5 py-0.5 rounded-full">{{ $skill }}</span>
                    @endforeach
                    <button type="button" onclick="document.getElementById('modalEditProfil').classList.remove('hidden')" class="text-xs text-on-primary underline font-semibold hover:opacity-80 ml-2">
                        + Tambah
                    </button>
                </div>
            </div>

            <!-- Profil Completion Widget -->
            <div class="bg-white/15 backdrop-blur-md border border-white/20 rounded-2xl p-5 lg:w-80 shrink-0 space-y-4">
                <div class="flex items-center justify-between">
                    <span class="text-xs font-semibold text-on-primary-container uppercase tracking-wider">Kelengkapan Profil</span>
                    <span class="font-headline-md font-bold text-xl text-on-primary">{{ $kelengkapan }}%</span>
                </div>
                <div class="w-full bg-black/20 rounded-full h-2.5 overflow-hidden">
                    <div class="bg-on-primary h-2.5 rounded-full transition-all duration-700" style="width: {{ $kelengkapan }}%"></div>
                </div>
                <button type="button" onclick="document.getElementById('modalEditProfil').classList.remove('hidden')" class="w-full bg-surface-container-lowest text-primary hover:bg-primary-fixed font-label-lg font-semibold text-xs sm:text-sm py-2.5 px-4 rounded-xl flex items-center justify-center gap-2 shadow-sm transition-all">
                    <span class="material-symbols-outlined text-[18px]">edit</span>
                    <span>Lengkapi Profil Sekarang</span>
                </button>
            </div>
        </div>
    </section>

    <!-- BARIS 2: STATISTIK STATUS PEKERJAAN -->
    <section class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        <div class="bg-surface-container-lowest p-5 rounded-2xl border border-outline-variant/40 shadow-xs hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between mb-3">
                <span class="font-label-md text-on-surface-variant uppercase tracking-wide">Lamaran Aktif</span>
                <div class="w-9 h-9 rounded-xl bg-primary-fixed text-primary flex items-center justify-center">
                    <span class="material-symbols-outlined text-[20px]">send</span>
                </div>
            </div>
            <div class="flex items-baseline gap-2">
                <span class="font-headline-lg font-bold text-2xl sm:text-3xl text-on-surface">{{ $stats['active_applications'] ?? 3 }}</span>
                <span class="font-body-sm text-on-surface-variant">Lowongan diajukan</span>
            </div>
        </div>

        <div class="bg-surface-container-lowest p-5 rounded-2xl border border-outline-variant/40 shadow-xs hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between mb-3">
                <span class="font-label-md text-on-surface-variant uppercase tracking-wide">Diterima / Berjalan</span>
                <div class="w-9 h-9 rounded-xl bg-tertiary-fixed text-on-tertiary-fixed-variant flex items-center justify-center">
                    <span class="material-symbols-outlined text-[20px]">check_circle</span>
                </div>
            </div>
            <div class="flex items-baseline gap-2">
                <span class="font-headline-lg font-bold text-2xl sm:text-3xl text-tertiary">{{ $stats['accepted_jobs'] ?? 1 }}</span>
                <span class="font-body-sm text-on-surface-variant">Kontrak aktif</span>
            </div>
        </div>

        <div class="bg-surface-container-lowest p-5 rounded-2xl border border-outline-variant/40 shadow-xs hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between mb-3">
                <span class="font-label-md text-on-surface-variant uppercase tracking-wide">Pekerjaan Selesai</span>
                <div class="w-9 h-9 rounded-xl bg-primary-fixed text-primary flex items-center justify-center">
                    <span class="material-symbols-outlined text-[20px]">workspace_premium</span>
                </div>
            </div>
            <div class="flex items-baseline gap-2">
                <span class="font-headline-lg font-bold text-2xl sm:text-3xl text-on-surface">{{ $stats['completed_jobs'] ?? 12 }}</span>
                <span class="font-body-sm text-on-surface-variant">Proyek / Shift</span>
            </div>
        </div>

        <!-- Jadwal Terdekat -->
        <div class="bg-surface-container-lowest p-5 rounded-2xl border-2 border-primary shadow-sm relative overflow-hidden">
            <div class="absolute top-0 right-0 w-2 h-full bg-primary"></div>
            <div class="flex items-center justify-between mb-2">
                <span class="font-label-md font-bold text-primary uppercase tracking-wide flex items-center gap-1.5">
                    <span class="material-symbols-outlined text-[18px]">alarm</span>
                    <span>Jadwal Terdekat</span>
                </span>
                <span class="bg-primary-fixed text-on-primary-fixed-variant font-label-sm px-2 py-0.5 rounded-full">HARI INI</span>
            </div>
            <h4 class="font-headline-sm text-on-surface">{{ $upcomingShift['title'] ?? 'Shift Barista' }}</h4>
            <p class="font-body-sm text-on-surface-variant flex items-center gap-1 mt-0.5">
                <span class="material-symbols-outlined text-[16px]">location_on</span>
                <span>{{ $upcomingShift['location'] ?? 'Kopi Kenangan, Surabaya' }}</span>
            </p>
            <div class="mt-3 bg-surface-container-low text-on-primary-fixed-variant font-label-md py-1.5 px-3 rounded-lg flex items-center justify-between">
                <span>{{ $upcomingShift['time'] ?? 'Pukul 16:00 - 20:00 WIB' }}</span>
                <span class="text-[11px] text-primary font-semibold">{{ $upcomingShift['countdown'] ?? 'Mulai dlm 2 jam' }}</span>
            </div>
        </div>
    </section>

    <!-- BARIS 3: RINGKASAN BIODATA & QUICK ACCESS MENU -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
        <!-- Kartu Informasi Akademik & Preferensi Kerja (7/12) -->
        <section class="lg:col-span-7 bg-surface-container-lowest rounded-3xl border border-outline-variant/40 p-5 sm:p-6 shadow-xs space-y-5">
            <div class="flex items-center justify-between border-b border-outline-variant/30 pb-4">
                <div>
                    <h3 class="font-headline-sm text-on-surface">Informasi Mahasiswa & Preferensi</h3>
                    <p class="font-body-sm text-on-surface-variant">Data ini digunakan untuk pencocokan lowongan & generate CV otomatis</p>
                </div>
                <button type="button" onclick="document.getElementById('modalEditProfil').classList.remove('hidden')" class="font-label-md text-primary bg-primary-fixed/60 hover:bg-primary-fixed px-3 py-1.5 rounded-xl flex items-center gap-1.5 transition-colors">
                    <span class="material-symbols-outlined text-[16px]">edit</span>
                    <span>Edit Data</span>
                </button>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-xs">
                <div class="p-3.5 rounded-2xl bg-surface-container-low border border-outline-variant/20">
                    <span class="font-label-sm text-on-surface-variant uppercase block">Nama Lengkap</span>
                    <span class="font-label-lg text-on-surface mt-0.5 block">{{ $namaUser }}</span>
                </div>
                <div class="p-3.5 rounded-2xl bg-surface-container-low border border-outline-variant/20">
                    <span class="font-label-sm text-on-surface-variant uppercase block">Email & Kontak</span>
                    <span class="font-label-lg text-on-surface mt-0.5 block">{{ $authUser->email ?? 'andika.candra@mhs.its.ac.id' }}</span>
                </div>
                <div class="p-3.5 rounded-2xl bg-surface-container-low border border-outline-variant/20">
                    <span class="font-label-sm text-on-surface-variant uppercase block">Kampus / Instansi</span>
                    <span class="font-label-lg text-on-surface mt-0.5 block">{{ $kampus }}</span>
                </div>
                <div class="p-3.5 rounded-2xl bg-surface-container-low border border-outline-variant/20">
                    <span class="font-label-sm text-on-surface-variant uppercase block">Radius Lokasi Kerja</span>
                    <span class="font-label-lg text-primary mt-0.5 block">Maksimal 3 km dari Kampus</span>
                </div>
            </div>

            <div class="p-4 rounded-2xl bg-surface-container-low border border-outline-variant/20 text-xs">
                <span class="font-label-sm text-on-surface-variant uppercase block mb-1">Ringkasan Pengalaman Kerja</span>
                <p class="font-body-md text-on-surface leading-relaxed">{{ $user['experience'] ?? 'Barista paruh waktu selama 6 bulan di Warkop Mbois Manyar. Terbiasa menggunakan sistem POS Moka, ramah pelanggan, dan teliti dalam pembukuan kas harian.' }}</p>
            </div>
        </section>

        <!-- Pintasan Fitur Dashboard (5/12) -->
        <section class="lg:col-span-5 bg-surface-container-lowest rounded-3xl border border-outline-variant/40 p-5 sm:p-6 shadow-xs space-y-4">
            <div>
                <h3 class="font-headline-sm text-on-surface">Akses Cepat Menu</h3>
                <p class="font-body-sm text-on-surface-variant">Lanjutkan aktivitas pencarian kerja part-time kamu</p>
            </div>

            <div class="space-y-2.5">
                <a href="{{ route('mabu.rekomendasi') }}" class="flex items-center justify-between p-3.5 rounded-2xl border border-outline-variant/40 hover:border-primary hover:bg-surface-container-low transition-all group">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center shrink-0">
                            <span class="material-symbols-outlined text-[22px]">auto_awesome</span>
                        </div>
                        <div>
                            <h4 class="font-label-lg text-on-surface group-hover:text-primary">Cek Rekomendasi Lowongan</h4>
                            <p class="font-body-sm text-on-surface-variant">4 lowongan cocok 95%+ dengan jadwalmu</p>
                        </div>
                    </div>
                    <span class="material-symbols-outlined text-[20px] text-on-surface-variant group-hover:text-primary">chevron_right</span>
                </a>

                <a href="{{ route('mabu.jadwal') }}" class="flex items-center justify-between p-3.5 rounded-2xl border border-outline-variant/40 hover:border-primary hover:bg-surface-container-low transition-all group">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl bg-primary-fixed text-primary flex items-center justify-center shrink-0">
                            <span class="material-symbols-outlined text-[22px]">calendar_month</span>
                        </div>
                        <div>
                            <h4 class="font-label-lg text-on-surface group-hover:text-primary">Atur Jadwal Kuliah</h4>
                            <p class="font-body-sm text-on-surface-variant">Update jam kosong agar tidak bentrok shift</p>
                        </div>
                    </div>
                    <span class="material-symbols-outlined text-[20px] text-on-surface-variant group-hover:text-primary">chevron_right</span>
                </a>

                <a href="{{ route('mabu.cv') }}" class="flex items-center justify-between p-3.5 rounded-2xl border border-outline-variant/40 hover:border-primary hover:bg-surface-container-low transition-all group">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl bg-tertiary-fixed text-on-tertiary-fixed-variant flex items-center justify-center shrink-0">
                            <span class="material-symbols-outlined text-[22px]">description</span>
                        </div>
                        <div>
                            <h4 class="font-label-lg text-on-surface group-hover:text-primary">Generate CV Otomatis</h4>
                            <p class="font-body-sm text-on-surface-variant">Unduh CV siap lamar format PDF</p>
                        </div>
                    </div>
                    <span class="material-symbols-outlined text-[20px] text-on-surface-variant group-hover:text-primary">chevron_right</span>
                </a>
            </div>
        </section>
    </div>
</div>

<!-- MODAL EDIT PROFIL -->
<div id="modalEditProfil" class="fixed inset-0 z-50 bg-on-surface/50 backdrop-blur-xs flex items-center justify-center p-4 hidden">
    <div class="bg-surface-container-lowest rounded-3xl max-w-lg w-full p-6 shadow-xl border border-outline-variant/30 space-y-5">
        <div class="flex items-center justify-between border-b border-outline-variant/30 pb-3">
            <h3 class="font-headline-sm text-on-surface">Edit Profil Mahasiswa</h3>
            <button type="button" onclick="document.getElementById('modalEditProfil').classList.add('hidden')" class="w-8 h-8 rounded-lg flex items-center justify-center text-on-surface-variant hover:bg-surface-container">
                <span class="material-symbols-outlined text-[20px]">close</span>
            </button>
        </div>

        <form action="#" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="font-label-md text-on-surface block mb-1">Nama Lengkap</label>
                <input type="text" name="name" value="{{ $namaUser }}" class="w-full rounded-xl border border-outline-variant bg-surface px-3.5 py-2 font-body-md text-on-surface focus:outline-none focus:border-primary">
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                <div>
                    <label class="font-label-md text-on-surface block mb-1">Kampus</label>
                    <input type="text" name="campus" value="{{ $kampus }}" class="w-full rounded-xl border border-outline-variant bg-surface px-3.5 py-2 font-body-md text-on-surface focus:outline-none focus:border-primary">
                </div>
                <div>
                    <label class="font-label-md text-on-surface block mb-1">Jurusan</label>
                    <input type="text" name="major" value="{{ $jurusan }}" class="w-full rounded-xl border border-outline-variant bg-surface px-3.5 py-2 font-body-md text-on-surface focus:outline-none focus:border-primary">
                </div>
            </div>
            <div>
                <label class="font-label-md text-on-surface block mb-1">Keahlian (pisahkan dengan koma)</label>
                <input type="text" name="skills" value="{{ implode(', ', $keahlian) }}" class="w-full rounded-xl border border-outline-variant bg-surface px-3.5 py-2 font-body-md text-on-surface focus:outline-none focus:border-primary">
            </div>
            <div>
                <label class="font-label-md text-on-surface block mb-1">Ringkasan Pengalaman</label>
                <textarea name="experience" rows="3" class="w-full rounded-xl border border-outline-variant bg-surface px-3.5 py-2 font-body-md text-on-surface focus:outline-none focus:border-primary">{{ $user['experience'] ?? 'Barista paruh waktu selama 6 bulan di Warkop Mbois Manyar. Terbiasa menggunakan sistem POS Moka, ramah pelanggan, dan teliti dalam pembukuan kas harian.' }}</textarea>
            </div>
            <div class="flex items-center justify-end gap-2 pt-2">
                <button type="button" onclick="document.getElementById('modalEditProfil').classList.add('hidden')" class="px-4 py-2 rounded-xl font-label-lg text-on-surface-variant hover:bg-surface-container">
                    Batal
                </button>
                <button type="submit" class="px-5 py-2 rounded-xl font-label-lg bg-primary text-on-primary hover:bg-primary-container shadow-sm">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
