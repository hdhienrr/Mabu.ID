@extends('layouts.mabu')

@section('title', 'MABU - Dashboard Pengguna')

@push('styles')
<script src="https://unpkg.com/lucide@latest"></script>
<style>
    .custom-gradient-banner {
        background: linear-gradient(135deg, #1E40AF 0%, #2563EB 50%, #3B82F6 100%);
    }
</style>
@endpush

@section('content')
<div class="space-y-6">

    <!-- BARIS 1: HERO SAMBUTAN & PROGRESS PROFIL -->
    <section class="custom-gradient-banner rounded-3xl p-6 sm:p-8 text-white shadow-lg shadow-blue-700/20 relative overflow-hidden">
        <div class="absolute -right-10 -bottom-10 w-72 h-72 rounded-full bg-white/10 blur-2xl pointer-events-none"></div>
        <div class="absolute right-12 top-6 opacity-15 hidden lg:block pointer-events-none">
            <i data-lucide="sparkles" class="w-32 h-32"></i>
        </div>

        <div class="relative z-10 flex flex-col lg:flex-row lg:items-center justify-between gap-6">
            <div class="space-y-3 max-w-2xl">
                <div>
                    <h2 class="font-heading font-extrabold text-2xl sm:text-3xl tracking-tight flex items-center gap-2">
                        Halo, Andika! <span class="animate-bounce">👋</span>
                    </h2>
                    <p class="text-blue-100 text-xs sm:text-sm font-medium">Mahasiswa Teknik Informatika • Institut Teknologi Sepuluh Nopember (ITS), Surabaya</p>
                </div>

                <p class="text-blue-50 text-sm leading-relaxed">
                    Profilmu sudah <span class="font-bold text-white">80% lengkap</span>. Lengkapi profil dan keahlianmu agar sistem cerdas MABU dapat otomatis merekomendasikan lowongan part-time warkop, UMKM, dan toko di sekitarmu tanpa bentrok waktu!
                </p>

                <div class="flex flex-wrap items-center gap-1.5 pt-1">
                    <span class="text-xs text-blue-100 font-medium mr-1">Keahlianmu:</span>
                    <span class="bg-white/15 backdrop-blur-xs border border-white/20 text-white text-[11px] font-medium px-2.5 py-0.5 rounded-full">Barista &amp; F&amp;B</span>
                    <span class="bg-white/15 backdrop-blur-xs border border-white/20 text-white text-[11px] font-medium px-2.5 py-0.5 rounded-full">Kasir &amp; Point of Sales</span>
                    <span class="bg-white/15 backdrop-blur-xs border border-white/20 text-white text-[11px] font-medium px-2.5 py-0.5 rounded-full">Admin Marketplace</span>
                    <span class="bg-white/15 backdrop-blur-xs border border-white/20 text-white text-[11px] font-medium px-2.5 py-0.5 rounded-full">Tutor Matematika</span>
                    <button type="button" class="text-xs text-white/90 underline font-semibold hover:text-white ml-2 flex items-center gap-1" onclick="openModal('modalEditProfil')">
                        + Tambah
                    </button>
                </div>
            </div>

            <!-- Profil Completion Widget -->
            <div class="bg-white/15 backdrop-blur-md border border-white/20 rounded-2xl p-5 lg:w-80 shrink-0 space-y-4">
                <div class="flex items-center justify-between">
                    <span class="text-xs font-semibold text-blue-100 uppercase tracking-wider">Kelengkapan Profil</span>
                    <span class="font-heading font-extrabold text-xl text-white">80%</span>
                </div>

                <div class="w-full bg-black/20 rounded-full h-2.5 overflow-hidden">
                    <div class="bg-white h-2.5 rounded-full transition-all duration-700 ease-out" style="width: 80%"></div>
                </div>

                <div class="space-y-2 text-xs">
                    <a class="flex items-center justify-between text-white/90 hover:text-white" href="{{ route('mabu.profil.data-diri') }}">
                        <span class="flex items-center gap-2">
                            <i data-lucide="check-circle" class="w-4 h-4 text-blue-200"></i>
                            <span>Data Diri Mahasiswa</span>
                        </span>
                        <span class="text-[10px] font-bold text-blue-200">Selesai</span>
                    </a>
                    <a class="flex items-center justify-between text-white/90 hover:text-white" href="{{ route('mabu.jadwal') }}">
                        <span class="flex items-center gap-2">
                            <i data-lucide="check-circle" class="w-4 h-4 text-blue-200"></i>
                            <span>Jadwal Kuliah Semester Ini</span>
                        </span>
                        <span class="text-[10px] font-bold text-blue-200">Selesai</span>
                    </a>
                    <a class="flex items-center justify-between text-white/90 hover:text-white" href="{{ route('mabu.profil.pengalaman') }}">
                        <span class="flex items-center gap-2">
                            <i data-lucide="check-circle" class="w-4 h-4 text-blue-200"></i>
                            <span>Pengalaman Part-Time</span>
                        </span>
                        <span class="text-[10px] font-bold text-blue-200">Selesai</span>
                    </a>
                    <a class="flex items-center justify-between text-amber-200 hover:text-amber-100 font-semibold bg-white/10 px-2 py-1 rounded-lg" href="{{ route('mabu.profil') }}">
                        <span class="flex items-center gap-2">
                            <i data-lucide="alert-circle" class="w-4 h-4 text-amber-300"></i>
                            <span>Sertifikat &amp; Portofolio (Opsional)</span>
                        </span>
                        <span class="text-[10px] uppercase underline">+20%</span>
                    </a>
                </div>

                <a href="{{ route('mabu.profil') }}" class="w-full bg-white text-blue-700 hover:bg-blue-50 font-bold text-xs sm:text-sm py-2.5 px-4 rounded-xl flex items-center justify-center gap-2 shadow-sm transition-all transform active:scale-95">
                    <i data-lucide="edit-3" class="w-4 h-4"></i>
                    <span>Lengkapi Profil Sekarang</span>
                </a>
            </div>
        </div>
    </section>

    <!-- BARIS 2: STATISTIK STATUS PEKERJAAN & JADWAL TERDEKAT -->
    <section class="grid grid-cols-1 md:grid-cols-3 gap-6 w-full">
        <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-xs hover:shadow-md transition-all group flex flex-col justify-between w-full">
            <div>
                <div class="flex items-center justify-between mb-3">
                    <span class="text-xs font-semibold text-slate-500 uppercase tracking-wide">Lamaran Aktif</span>
                    <div class="w-9 h-9 rounded-xl bg-blue-50 text-primary flex items-center justify-center group-hover:scale-105 transition-transform">
                        <i data-lucide="send" class="w-4 h-4"></i>
                    </div>
                </div>
                <div class="flex items-baseline gap-2">
                    <span class="font-heading font-extrabold text-2xl sm:text-3xl text-slate-900">3</span>
                    <span class="text-xs text-slate-500 font-medium">Lowongan diajukan</span>
                </div>
            </div>
            <div class="mt-4 flex items-center gap-1.5 text-xs text-primary font-medium pt-3 border-t border-slate-100">
                <i data-lucide="clock" class="w-3.5 h-3.5"></i>
                <span class="truncate">2 sedang diproses, 1 wawancara</span>
            </div>
        </div>

        <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-xs hover:shadow-md transition-all group flex flex-col justify-between w-full">
            <div>
                <div class="flex items-center justify-between mb-3">
                    <span class="text-xs font-semibold text-slate-500 uppercase tracking-wide">Diterima / Berjalan</span>
                    <div class="w-9 h-9 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center group-hover:scale-105 transition-transform">
                        <i data-lucide="briefcase" class="w-4 h-4"></i>
                    </div>
                </div>
                <div class="flex items-baseline gap-2">
                    <span class="font-heading font-extrabold text-2xl sm:text-3xl text-slate-900">1</span>
                    <span class="text-xs text-slate-500 font-medium">Kontrak aktif</span>
                </div>
            </div>
            <div class="mt-4 flex items-center gap-1.5 text-xs text-emerald-600 font-medium pt-3 border-t border-slate-100">
                <i data-lucide="check-circle-2" class="w-3.5 h-3.5"></i>
                <span class="truncate">Kopi Kenangan (Shift Sore)</span>
            </div>
        </div>

        <div class="bg-white p-5 rounded-2xl border-2 border-primary shadow-sm relative overflow-hidden flex flex-col justify-between w-full">
            <div class="absolute top-0 right-0 w-2 h-full bg-primary"></div>
            <div>
                <div class="flex items-center justify-between mb-2">
                    <span class="text-xs font-bold text-blue-700 uppercase tracking-wide flex items-center gap-1.5">
                        <i data-lucide="alarm-clock" class="w-4 h-4"></i>
                        <span>Jadwal Terdekat</span>
                    </span>
                    <span class="bg-blue-100 text-blue-800 text-[10px] font-bold px-2 py-0.5 rounded-full">HARI INI</span>
                </div>
                <h4 class="font-heading font-bold text-base text-slate-900 truncate">Shift Barista</h4>
                <p class="text-xs text-slate-500 flex items-center gap-1 mt-0.5 truncate">
                    <i data-lucide="map-pin" class="w-3.5 h-3.5 text-slate-400 shrink-0"></i>
                    <span class="truncate">Kopi Kenangan, Surabaya</span>
                </p>
            </div>
            <div class="mt-4 bg-blue-50 text-blue-800 text-xs font-semibold py-2 px-3 rounded-lg flex items-center justify-between gap-1">
                <span class="truncate">16:00 - 20:00 WIB</span>
                <span class="text-[11px] text-primary font-medium shrink-0">Mulai dlm 2 jam</span>
            </div>
        </div>
    </section>

    <!-- BARIS 3: 2-COLUMN LAYOUT -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">

        <!-- KOLOM KIRI (7/12) -->
        <div class="lg:col-span-7 space-y-6">

            <!-- REKOMENDASI UNTUKMU -->
            <section class="bg-white rounded-3xl border border-slate-200/80 p-5 sm:p-6 shadow-xs space-y-5" id="rekomendasi">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="font-heading font-extrabold text-lg text-slate-900">Rekomendasi Untukmu</h3>
                        <p class="text-xs text-slate-400 mt-0.5">Disesuaikan otomatis dengan slot waktu luang setelah jam kuliah</p>
                    </div>
                    <a class="text-xs font-semibold text-primary hover:underline flex items-center gap-1" href="#rekomendasi">
                        <span>Lihat Semua</span>
                        <i data-lucide="arrow-right" class="w-3.5 h-3.5"></i>
                    </a>
                </div>

                <div class="space-y-4" id="recommendationList">
                    <!-- KARTU 1 -->
                    <div class="border border-slate-200 rounded-2xl p-4 sm:p-5 hover:border-primary hover:shadow-md transition-all bg-white relative group">
                        <div class="flex flex-col sm:flex-row sm:items-start justify-between gap-3">
                            <div>
                                <div class="flex flex-wrap items-center gap-2 mb-1">
                                    <span class="bg-blue-50 text-blue-700 border border-blue-200 text-[11px] font-bold px-2 py-0.5 rounded-full flex items-center gap-1">
                                        <i data-lucide="zap" class="w-3 h-3 text-primary"></i>
                                        Cocok 98% dengan jadwalmu
                                    </span>
                                    <span class="bg-slate-100 text-slate-600 text-[10px] font-semibold px-2 py-0.5 rounded-md">Warkop / Kafe</span>
                                </div>
                                <h4 class="font-heading font-bold text-base text-slate-900 group-hover:text-primary transition-colors">
                                    Barista &amp; Kasir Shift Malam
                                </h4>
                                <p class="text-xs text-slate-600 font-medium mt-0.5">
                                    Warkop Titik Kumpul (Sukolilo) • <span class="text-slate-400">800m dari Kampus ITS Surabaya</span>
                                </p>
                            </div>
                            <div class="text-left sm:text-right shrink-0">
                                <span class="text-xs text-slate-400 block">Upah Bersih</span>
                                <span class="font-heading font-extrabold text-base text-primary">Rp 175.000</span>
                                <span class="text-[11px] text-slate-500 block">/ shift (5 jam)</span>
                            </div>
                        </div>

                        <div class="mt-3.5 pt-3.5 border-t border-slate-100 text-xs text-slate-600 space-y-2">
                            <p class="line-clamp-2 text-slate-600">
                                <strong>Tugas &amp; Syarat:</strong> Meracik kopi seduh manual &amp; espresso, input kasir POS sederhana, ramah. Tersedia makan malam &amp; insentif tip harian.
                            </p>
                            <div class="flex flex-wrap items-center justify-between gap-2 pt-1">
                                <div class="flex items-center gap-3 text-slate-500 text-[11px]">
                                    <span class="flex items-center gap-1">
                                        <i data-lucide="calendar-check" class="w-3.5 h-3.5 text-primary"></i>
                                        Kamis &amp; Jumat (18:00 - 23:00)
                                    </span>
                                    <span class="flex items-center gap-1 text-emerald-600 font-medium">
                                        <i data-lucide="shield-check" class="w-3.5 h-3.5"></i>
                                        UMKM Terverifikasi
                                    </span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <button type="button" class="px-3 py-1.5 text-slate-600 hover:text-slate-900 font-semibold rounded-lg hover:bg-slate-100 transition-colors"
                                            onclick="openJobDetail('Barista &amp; Kasir Shift Malam', 'Warkop Titik Kumpul (Sukolilo)', 'Rp 175.000 / shift', 'Kamis &amp; Jumat (18:00 - 23:00)', 'Sukolilo, Surabaya (800m dari ITS)', 'Meracik minuman kopi sederhana, melayani kasir POS, menjaga kebersihan bar. Cocok untuk mahasiswa yang kuliah pagi-siang.')">
                                        Lihat Detail
                                    </button>
                                    <button type="button" class="px-4 py-1.5 bg-primary hover:bg-blue-700 text-white font-semibold rounded-xl text-xs shadow-xs transition-transform active:scale-95 flex items-center gap-1"
                                            onclick="applyJob('Barista &amp; Kasir Shift Malam', 'Warkop Titik Kumpul')">
                                        <span>Lamar Cepat</span>
                                        <i data-lucide="send" class="w-3 h-3"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- KARTU 2 -->
                    <div class="border border-slate-200 rounded-2xl p-4 sm:p-5 hover:border-primary hover:shadow-md transition-all bg-white relative group">
                        <div class="flex flex-col sm:flex-row sm:items-start justify-between gap-3">
                            <div>
                                <div class="flex flex-wrap items-center gap-2 mb-1">
                                    <span class="bg-blue-50 text-blue-700 border border-blue-200 text-[11px] font-bold px-2 py-0.5 rounded-full flex items-center gap-1">
                                        <i data-lucide="zap" class="w-3 h-3 text-primary"></i>
                                        Cocok 95% dengan jadwalmu
                                    </span>
                                    <span class="bg-slate-100 text-slate-600 text-[10px] font-semibold px-2 py-0.5 rounded-md">Booth UMKM</span>
                                </div>
                                <h4 class="font-heading font-bold text-base text-slate-900 group-hover:text-primary transition-colors">
                                    Penjaga Booth Teh Solo Makmur
                                </h4>
                                <p class="text-xs text-slate-600 font-medium mt-0.5">
                                    Teh Solo Makmur Gebang • <span class="text-slate-400">Jalan Gebang Putih (500m dari asrama ITS)</span>
                                </p>
                            </div>
                            <div class="text-left sm:text-right shrink-0">
                                <span class="text-xs text-slate-400 block">Upah Harian</span>
                                <span class="font-heading font-extrabold text-base text-primary">Rp 120.000</span>
                                <span class="text-[11px] text-slate-500 block">/ hari + bonus cup</span>
                            </div>
                        </div>

                        <div class="mt-3.5 pt-3.5 border-t border-slate-100 text-xs text-slate-600 space-y-2">
                            <p class="line-clamp-2 text-slate-600">
                                <strong>Tugas &amp; Syarat:</strong> Standby booth, melayani pembeli es teh jumbo, catat stok bahan cup. Waktu kerja fleksibel sore hari tidak bentrok kuliah.
                            </p>
                            <div class="flex flex-wrap items-center justify-between gap-2 pt-1">
                                <div class="flex items-center gap-3 text-slate-500 text-[11px]">
                                    <span class="flex items-center gap-1">
                                        <i data-lucide="calendar-check" class="w-3.5 h-3.5 text-primary"></i>
                                        Senin - Rabu (16:30 - 20:30)
                                    </span>
                                    <span class="flex items-center gap-1 text-emerald-600 font-medium">
                                        <i data-lucide="shield-check" class="w-3.5 h-3.5"></i>
                                        Pencairan Harian
                                    </span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <button type="button" class="px-3 py-1.5 text-slate-600 hover:text-slate-900 font-semibold rounded-lg hover:bg-slate-100 transition-colors"
                                            onclick="openJobDetail('Penjaga Booth Teh Solo Makmur', 'Teh Solo Makmur Gebang', 'Rp 120.000 / hari', 'Senin - Rabu (16:30 - 20:30)', 'Gebang Putih, Surabaya', 'Menjaga booth minuman teh viral, membuat racikan cup, melayani pembayaran QRIS/tunai. Ringan dan cocok untuk mahasiswa/pelajar.')">
                                        Lihat Detail
                                    </button>
                                    <button type="button" class="px-4 py-1.5 bg-primary hover:bg-blue-700 text-white font-semibold rounded-xl text-xs shadow-xs transition-transform active:scale-95 flex items-center gap-1"
                                            onclick="applyJob('Penjaga Booth Teh Solo Makmur', 'Teh Solo Makmur Gebang')">
                                        <span>Lamar Cepat</span>
                                        <i data-lucide="send" class="w-3 h-3"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- KARTU 3 -->
                    <div class="border border-slate-200 rounded-2xl p-4 sm:p-5 hover:border-primary hover:shadow-md transition-all bg-white relative group">
                        <div class="flex flex-col sm:flex-row sm:items-start justify-between gap-3">
                            <div>
                                <div class="flex flex-wrap items-center gap-2 mb-1">
                                    <span class="bg-blue-50 text-blue-700 border border-blue-200 text-[11px] font-bold px-2 py-0.5 rounded-full flex items-center gap-1">
                                        <i data-lucide="zap" class="w-3 h-3 text-primary"></i>
                                        Cocok 92% dengan jadwalmu
                                    </span>
                                    <span class="bg-indigo-100 text-indigo-700 text-[10px] font-semibold px-2 py-0.5 rounded-md">Usaha Rumahan / Olshop</span>
                                </div>
                                <h4 class="font-heading font-bold text-base text-slate-900 group-hover:text-primary transition-colors">
                                    Admin Packing &amp; Balas Chat Olshop
                                </h4>
                                <p class="text-xs text-slate-600 font-medium mt-0.5">
                                    Dapur Bunda Snack &amp; Cookies • <span class="text-slate-400">Mulyorejo, Surabaya (1.8 km)</span>
                                </p>
                            </div>
                            <div class="text-left sm:text-right shrink-0">
                                <span class="text-xs text-slate-400 block">Kisaran Upah</span>
                                <span class="font-heading font-extrabold text-base text-primary">Rp 150.000</span>
                                <span class="text-[11px] text-slate-500 block">/ shift 4 jam</span>
                            </div>
                        </div>

                        <div class="mt-3.5 pt-3.5 border-t border-slate-100 text-xs text-slate-600 space-y-2">
                            <p class="line-clamp-2 text-slate-600">
                                <strong>Tugas &amp; Syarat:</strong> Membantu packing pesanan kue kering shopee/tokopedia, tempel resi, balas chat pelanggan secara ramah. Lingkungan santai rumahan.
                            </p>
                            <div class="flex flex-wrap items-center justify-between gap-2 pt-1">
                                <div class="flex items-center gap-3 text-slate-500 text-[11px]">
                                    <span class="flex items-center gap-1">
                                        <i data-lucide="calendar-check" class="w-3.5 h-3.5 text-primary"></i>
                                        Sabtu &amp; Minggu (09:00 - 13:00)
                                    </span>
                                    <span class="flex items-center gap-1 text-indigo-700 font-medium">
                                        <i data-lucide="cookie" class="w-3.5 h-3.5"></i>
                                        Dapat Snack Gratis
                                    </span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <button type="button" class="px-3 py-1.5 text-slate-600 hover:text-slate-900 font-semibold rounded-lg hover:bg-slate-100 transition-colors"
                                            onclick="openJobDetail('Admin Packing &amp; Balas Chat Olshop', 'Dapur Bunda Snack &amp; Cookies', 'Rp 150.000 / shift', 'Sabtu &amp; Minggu (09:00 - 13:00)', 'Mulyorejo, Surabaya', 'Membantu pengemasan produk makanan ringan, print label alamat pengiriman, dan merespons pertanyaan pembeli online.')">
                                        Lihat Detail
                                    </button>
                                    <button type="button" class="px-4 py-1.5 bg-primary hover:bg-blue-700 text-white font-semibold rounded-xl text-xs shadow-xs transition-transform active:scale-95 flex items-center gap-1"
                                            onclick="applyJob('Admin Packing &amp; Balas Chat Olshop', 'Dapur Bunda Snack &amp; Cookies')">
                                        <span>Lamar Cepat</span>
                                        <i data-lucide="send" class="w-3 h-3"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- STATUS LAMARAN TERBARU -->
            <section class="bg-white rounded-3xl border border-slate-200/80 p-5 sm:p-6 shadow-xs space-y-4" id="statusLamaran">
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2">
                    <div>
                        <h3 class="font-heading font-extrabold text-lg text-slate-900">Status Lamaran Terbaru</h3>
                        <p class="text-xs text-slate-400">Pantau progres seleksi dan kontrak dari mitra usaha yang telah Anda lamar</p>
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="text-xs text-slate-500">Filter status:</span>
                        <select class="text-xs font-semibold bg-slate-50 border border-slate-200 rounded-lg px-2.5 py-1 text-slate-700 focus:outline-none focus:ring-1 focus:ring-primary" onchange="filterApplicationStatus(this.value)">
                            <option value="semua">Semua (4)</option>
                            <option value="Diterima">Diterima (1)</option>
                            <option value="Wawancara">Wawancara (1)</option>
                            <option value="Diproses">Diproses (1)</option>
                            <option value="Dikirim">Dikirim (1)</option>
                        </select>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left text-xs">
                        <thead>
                            <tr class="border-b border-slate-100 text-slate-400 uppercase tracking-wider text-[10px]">
                                <th class="py-3 px-2 font-semibold">Posisi &amp; Usaha</th>
                                <th class="py-3 px-2 font-semibold">Tgl Melamar</th>
                                <th class="py-3 px-2 font-semibold">Jadwal Shift</th>
                                <th class="py-3 px-2 font-semibold text-center">Status</th>
                                <th class="py-3 px-2 font-semibold text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100" id="applicationTableBody">
                            <tr class="hover:bg-slate-50/70 transition-colors app-row" data-status="Diterima">
                                <td class="py-3.5 px-2">
                                    <div class="font-bold text-slate-900">Shift Barista</div>
                                    <div class="text-[11px] text-slate-500">Kopi Kenangan (Klaska/Manyar)</div>
                                </td>
                                <td class="py-3.5 px-2 text-slate-600">12 Nov 2026</td>
                                <td class="py-3.5 px-2 text-slate-600">Hari ini, 16:00 - 20:00</td>
                                <td class="py-3.5 px-2 text-center">
                                    <span class="bg-emerald-100 text-emerald-800 text-[11px] font-bold px-2.5 py-1 rounded-full inline-flex items-center gap-1">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-600"></span> Diterima
                                    </span>
                                </td>
                                <td class="py-3.5 px-2 text-right">
                                    <a class="text-primary hover:underline font-semibold" href="{{ route('mabu.dokumen') }}">Lihat Kontrak</a>
                                </td>
                            </tr>
                            <tr class="hover:bg-slate-50/70 transition-colors app-row" data-status="Wawancara">
                                <td class="py-3.5 px-2">
                                    <div class="font-bold text-slate-900">Staff Packing &amp; Sortir</div>
                                    <div class="text-[11px] text-slate-500">Toko Berkah Sembako Surabaya</div>
                                </td>
                                <td class="py-3.5 px-2 text-slate-600">13 Nov 2026</td>
                                <td class="py-3.5 px-2 text-slate-600">Sabtu, 08:00 - 12:00</td>
                                <td class="py-3.5 px-2 text-center">
                                    <span class="bg-blue-100 text-blue-800 text-[11px] font-bold px-2.5 py-1 rounded-full inline-flex items-center gap-1">
                                        <span class="w-1.5 h-1.5 rounded-full bg-primary"></span> Wawancara
                                    </span>
                                </td>
                                <td class="py-3.5 px-2 text-right">
                                    <button type="button" class="text-primary hover:underline font-semibold" onclick="alert('Wawancara singkat via WhatsApp dengan Ibu Ratna besok pukul 10:00.')">Cek Jadwal</button>
                                </td>
                            </tr>
                            <tr class="hover:bg-slate-50/70 transition-colors app-row" data-status="Diproses">
                                <td class="py-3.5 px-2">
                                    <div class="font-bold text-slate-900">Crew Event Bazar Kampus</div>
                                    <div class="text-[11px] text-slate-500">Surabaya Youth Fest (Event Organizer)</div>
                                </td>
                                <td class="py-3.5 px-2 text-slate-600">14 Nov 2026</td>
                                <td class="py-3.5 px-2 text-slate-600">Minggu, 07:00 - 15:00</td>
                                <td class="py-3.5 px-2 text-center">
                                    <span class="bg-amber-100 text-amber-800 text-[11px] font-bold px-2.5 py-1 rounded-full inline-flex items-center gap-1">
                                        <span class="w-1.5 h-1.5 rounded-full bg-amber-600"></span> Diproses
                                    </span>
                                </td>
                                <td class="py-3.5 px-2 text-right">
                                    <span class="text-slate-400">Review Profil</span>
                                </td>
                            </tr>
                            <tr class="hover:bg-slate-50/70 transition-colors app-row" data-status="Dikirim">
                                <td class="py-3.5 px-2">
                                    <div class="font-bold text-slate-900">Tutor Les Privat Matematika SMA</div>
                                    <div class="text-[11px] text-slate-500">Bimbel Sahabat Prestasi Gebang</div>
                                </td>
                                <td class="py-3.5 px-2 text-slate-600">Hari ini</td>
                                <td class="py-3.5 px-2 text-slate-600">Rabu &amp; Kamis (19:00 - 20:30)</td>
                                <td class="py-3.5 px-2 text-center">
                                    <span class="bg-slate-100 text-slate-700 text-[11px] font-bold px-2.5 py-1 rounded-full inline-flex items-center gap-1">
                                        <span class="w-1.5 h-1.5 rounded-full bg-slate-500"></span> Dikirim
                                    </span>
                                </td>
                                <td class="py-3.5 px-2 text-right">
                                    <button type="button" class="text-rose-500 hover:text-rose-700 font-semibold" onclick="cancelApp(this)">Batalkan</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="mt-4 pt-3 border-t border-slate-100 flex items-center justify-between text-xs text-slate-500">
                    <div class="flex items-center gap-2">
                        <i data-lucide="trending-up" class="w-4 h-4 text-primary"></i>
                        <span>Aktivitas Lamaran Bulan Ini: <strong class="text-slate-800">4 lamaran diajukan</strong></span>
                    </div>
                </div>
            </section>
        </div>

        <!-- KOLOM KANAN (5/12) -->
        <div class="lg:col-span-5 space-y-6">

            <!-- WIDGET: JADWAL MINGGU INI -->
            <section class="bg-white rounded-3xl border border-slate-200/80 p-5 sm:p-6 shadow-xs space-y-4" id="jadwal">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="font-heading font-extrabold text-lg text-slate-900">Jadwal Minggu Ini</h3>
                        <p class="text-xs text-slate-400">Kuliah vs Waktu Luang Kerja</p>
                    </div>
                    <button type="button" class="text-xs font-bold text-blue-700 hover:text-blue-800 bg-blue-50 hover:bg-blue-100 px-3 py-1.5 rounded-xl transition-colors flex items-center gap-1 border border-blue-200/60" onclick="openModal('modalInputJadwal')">
                        <i data-lucide="plus" class="w-3.5 h-3.5"></i>
                        <span>Input Jadwal</span>
                    </button>
                </div>

                <div class="flex flex-wrap items-center gap-3 text-[11px] font-medium text-slate-600 bg-slate-50 p-2.5 rounded-xl border border-slate-100">
                    <span class="flex items-center gap-1.5">
                        <span class="w-3 h-3 rounded-md bg-slate-500 inline-block"></span> Jadwal Kuliah ITS
                    </span>
                    <span class="flex items-center gap-1.5">
                        <span class="w-3 h-3 rounded-md bg-primary inline-block"></span> Shift Kerja Part-Time
                    </span>
                    <span class="flex items-center gap-1.5">
                        <span class="w-3 h-3 rounded-md bg-blue-50 border border-blue-300 inline-block"></span> Waktu Luang Siap Kerja
                    </span>
                </div>

                <div class="space-y-2.5 text-xs">
                    <div class="flex items-center gap-3 p-2 rounded-xl hover:bg-slate-50 border border-transparent hover:border-slate-100 transition-colors">
                        <div class="w-12 text-center shrink-0">
                            <span class="block text-[10px] font-bold text-slate-400 uppercase">SEN</span>
                            <span class="font-heading font-bold text-sm text-slate-800">17</span>
                        </div>
                        <div class="flex-1 grid grid-cols-2 gap-2">
                            <div class="bg-slate-100 border border-slate-200 text-slate-700 px-2 py-1 rounded-lg truncate">
                                <span class="font-bold">08:00 - 12:00</span> Kuliah Basis Data
                            </div>
                            <div class="bg-blue-50 border border-blue-200 text-blue-700 px-2 py-1 rounded-lg truncate flex items-center justify-between">
                                <span><strong>13:00 - 21:00</strong> Waktu Luang</span>
                                <i data-lucide="check" class="w-3 h-3 text-primary"></i>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center gap-3 p-2 rounded-xl hover:bg-slate-50 border border-transparent hover:border-slate-100 transition-colors">
                        <div class="w-12 text-center shrink-0">
                            <span class="block text-[10px] font-bold text-slate-400 uppercase">SEL</span>
                            <span class="font-heading font-bold text-sm text-slate-800">18</span>
                        </div>
                        <div class="flex-1 grid grid-cols-2 gap-2">
                            <div class="bg-slate-100 border border-slate-200 text-slate-700 px-2 py-1 rounded-lg truncate">
                                <span class="font-bold">09:00 - 15:00</span> Kuliah Praktikum
                            </div>
                            <div class="bg-blue-50 border border-blue-200 text-blue-700 px-2 py-1 rounded-lg truncate flex items-center justify-between">
                                <span><strong>16:00 - 21:00</strong> Waktu Luang</span>
                                <i data-lucide="check" class="w-3 h-3 text-primary"></i>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center gap-3 p-2.5 rounded-xl bg-blue-50/70 border border-blue-200 transition-colors shadow-2xs">
                        <div class="w-12 text-center shrink-0">
                            <span class="block text-[10px] font-bold text-blue-700 uppercase">RAB (HARI INI)</span>
                            <span class="font-heading font-bold text-sm text-blue-800">19</span>
                        </div>
                        <div class="flex-1 grid grid-cols-2 gap-2">
                            <div class="bg-slate-100 border border-slate-200 text-slate-700 px-2 py-1 rounded-lg truncate">
                                <span class="font-bold">08:00 - 12:00</span> Kuliah Jaringan
                            </div>
                            <div class="bg-primary text-white px-2 py-1 rounded-lg truncate shadow-xs">
                                <span class="font-bold">16:00 - 20:00</span> Shift Kopi Kenangan
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center gap-3 p-2 rounded-xl hover:bg-slate-50 border border-transparent hover:border-slate-100 transition-colors">
                        <div class="w-12 text-center shrink-0">
                            <span class="block text-[10px] font-bold text-slate-400 uppercase">KAM</span>
                            <span class="font-heading font-bold text-sm text-slate-800">20</span>
                        </div>
                        <div class="flex-1 grid grid-cols-2 gap-2">
                            <div class="bg-slate-100 border border-slate-200 text-slate-700 px-2 py-1 rounded-lg truncate">
                                <span class="font-bold">10:00 - 14:00</span> Kuliah Algo
                            </div>
                            <div class="bg-blue-50 border border-blue-200 text-blue-700 px-2 py-1 rounded-lg truncate flex items-center justify-between">
                                <span><strong>15:00 - 22:00</strong> Waktu Luang</span>
                                <i data-lucide="check" class="w-3 h-3 text-primary"></i>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center gap-3 p-2 rounded-xl bg-slate-50/60 border border-slate-100 text-slate-600">
                        <div class="w-12 text-center shrink-0">
                            <span class="block text-[10px] font-bold text-slate-400 uppercase">SAB-MIN</span>
                            <span class="font-heading font-bold text-sm text-slate-700">22-23</span>
                        </div>
                        <div class="flex-1 text-xs">
                            <span class="bg-blue-100 text-blue-800 font-bold px-2 py-0.5 rounded text-[11px]">Full Weekend Bebas Kuliah</span>
                            <span class="text-slate-500 ml-1.5">Siap ambil shift harian/event crew</span>
                        </div>
                    </div>
                </div>

                <div class="pt-2 flex items-center justify-between border-t border-slate-100">
                    <span class="text-xs text-slate-500">Sinkronisasi Google Calendar: <strong>Aktif</strong></span>
                    <a href="{{ route('mabu.jadwal') }}" class="text-xs font-semibold text-primary hover:underline">
                        Kelola Kalender Lengkap →
                    </a>
                </div>
            </section>

            <!-- GENERATE CV OTOMATIS -->
            <section class="bg-white rounded-3xl border border-slate-200/80 p-5 sm:p-6 shadow-xs space-y-4" id="generateCV">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-2.5">
                        <div class="w-9 h-9 rounded-xl bg-blue-50 text-primary flex items-center justify-center">
                            <i data-lucide="file-badge" class="w-5 h-5"></i>
                        </div>
                        <div>
                            <h3 class="font-heading font-bold text-base text-slate-900">CV Otomatis MABU</h3>
                            <p class="text-[11px] text-slate-400">Generate CV instan dari profil &amp; keahlianmu</p>
                        </div>
                    </div>
                    <span class="bg-blue-100 text-blue-800 text-[10px] font-bold px-2 py-0.5 rounded-full">SIAP DOWNLOAD</span>
                </div>

                <div class="bg-slate-50 border border-slate-200/80 rounded-2xl p-4 flex items-center gap-4">
                    <div class="w-16 h-20 bg-white rounded-lg border border-slate-300 shadow-2xs flex flex-col items-center justify-center p-2 text-center shrink-0">
                        <div class="w-6 h-6 rounded-full bg-blue-100 text-primary flex items-center justify-center text-[10px] font-bold mb-1">
                            AC
                        </div>
                        <div class="w-8 h-1 bg-slate-300 rounded mb-1"></div>
                        <div class="w-10 h-1 bg-slate-200 rounded"></div>
                    </div>
                    <div class="space-y-1 text-xs">
                        <p class="font-bold text-slate-800">CV Andika Candra - Edisi Part-Time.pdf</p>
                        <p class="text-slate-500 text-[11px]">Format: ATS-Friendly Ramah UMKM • Diperbarui hari ini</p>
                        <div class="flex items-center gap-2 pt-1">
                            <span class="text-[10px] text-slate-400">Template:</span>
                            <select class="text-[11px] bg-white border border-slate-200 rounded px-1.5 py-0.5 font-medium text-slate-700" id="cvTemplateSelect">
                                <option value="modern">Modern F&amp;B &amp; Retail</option>
                                <option value="minimalist">Minimalis Kasir/Booth</option>
                                <option value="akademik">Akademik &amp; Tutor</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-2 pt-1">
                    <button type="button" class="w-full py-2 px-3 rounded-xl border border-slate-200 text-slate-700 font-semibold text-xs hover:bg-slate-50 transition-colors flex items-center justify-center gap-1.5" onclick="previewCVModal()">
                        <i data-lucide="eye" class="w-3.5 h-3.5 text-slate-400"></i>
                        <span>Preview CV</span>
                    </button>
                    <button type="button" class="w-full py-2 px-3 rounded-xl bg-primary hover:bg-blue-700 text-white font-semibold text-xs shadow-xs transition-transform active:scale-95 flex items-center justify-center gap-1.5" onclick="downloadCVDummy()">
                        <i data-lucide="download" class="w-3.5 h-3.5"></i>
                        <span>Download PDF</span>
                    </button>
                </div>
            </section>
        </div>
    </div>

    <!-- Footer Info -->
    <footer class="pt-6 border-t border-slate-200 text-center text-xs text-slate-400">
        <p>© 2026 MABU (Mahasiswa Butuh Uang). Platform Penghubung Pekerjaan Part-Time Inklusif untuk Mahasiswa, Pelajar SMA/SMK, &amp; Masyarakat Umum.</p>
        <p class="mt-1">Dibuat khusus untuk efisiensi jadwal studi dan kemandirian finansial.</p>
    </footer>
</div>

<!-- MODAL: DETAIL PEKERJAAN -->
<div class="fixed inset-0 z-50 bg-slate-900/50 backdrop-blur-xs flex items-center justify-center p-4 hidden" id="modalJobDetail">
    <div class="bg-white rounded-3xl max-w-lg w-full p-6 space-y-5 shadow-2xl border border-slate-100 max-h-[90vh] overflow-y-auto">
        <div class="flex items-start justify-between border-b border-slate-100 pb-4">
            <div>
                <span class="bg-blue-100 text-blue-800 text-[10px] font-bold px-2.5 py-0.5 rounded-full inline-block mb-1.5">PART-TIME FLEKSIBEL</span>
                <h3 class="font-heading font-extrabold text-xl text-slate-900" id="modalJobTitle">Judul Pekerjaan</h3>
                <p class="text-xs text-slate-500 font-medium" id="modalJobCompany">Nama Usaha / Mitra</p>
            </div>
            <button type="button" class="text-slate-400 hover:text-slate-600 p-1 rounded-lg" onclick="closeModal('modalJobDetail')">
                <i data-lucide="x" class="w-5 h-5"></i>
            </button>
        </div>

        <div class="grid grid-cols-2 gap-3 text-xs bg-slate-50 p-3.5 rounded-2xl border border-slate-100">
            <div>
                <span class="text-slate-400 block text-[10px] uppercase font-semibold">Estimasi Upah</span>
                <span class="font-bold text-primary text-sm" id="modalJobWage">Rp 0</span>
            </div>
            <div>
                <span class="text-slate-400 block text-[10px] uppercase font-semibold">Jadwal Shift</span>
                <span class="font-bold text-slate-800 text-xs" id="modalJobSchedule">Jadwal Kerja</span>
            </div>
            <div class="col-span-2 pt-1 border-t border-slate-200/60">
                <span class="text-slate-400 block text-[10px] uppercase font-semibold">Lokasi Usaha</span>
                <span class="font-medium text-slate-700 text-xs" id="modalJobLocation">Lokasi</span>
            </div>
        </div>

        <div class="space-y-3 text-xs text-slate-600">
            <div>
                <h4 class="font-bold text-slate-900 mb-1">Deskripsi Pekerjaan &amp; Persyaratan:</h4>
                <p class="leading-relaxed text-slate-600" id="modalJobDesc">Deskripsi lengkap tugas dan lingkungan kerja.</p>
            </div>
            <div class="bg-blue-50 text-blue-900 p-3 rounded-xl border border-blue-100 flex items-center gap-2">
                <i data-lucide="sparkles" class="w-5 h-5 text-primary shrink-0"></i>
                <span class="text-[11px]">Sistem MABU telah memverifikasi bahwa shift ini <strong>100% tidak bertabrakan</strong> dengan jadwal kuliah aktif Andika di ITS.</span>
            </div>
        </div>

        <div class="flex items-center justify-end gap-2 pt-2 border-t border-slate-100">
            <button type="button" class="px-4 py-2.5 rounded-xl border border-slate-200 text-slate-600 font-semibold text-xs hover:bg-slate-50" onclick="closeModal('modalJobDetail')">Tutup</button>
            <button type="button" class="px-5 py-2.5 rounded-xl bg-primary hover:bg-blue-700 text-white font-bold text-xs shadow-md flex items-center gap-1.5" onclick="applyFromModal()">
                <span>Kirim Lamaran Sekarang</span>
                <i data-lucide="arrow-right" class="w-4 h-4"></i>
            </button>
        </div>
    </div>
</div>

<!-- MODAL: KELOLA JADWAL KULIAH -->
<div class="fixed inset-0 z-50 bg-slate-900/50 backdrop-blur-xs flex items-center justify-center p-4 hidden" id="modalInputJadwal">
    <div class="bg-white rounded-3xl max-w-md w-full p-6 space-y-4 shadow-2xl border border-slate-100">
        <div class="flex items-center justify-between border-b border-slate-100 pb-3">
            <div class="flex items-center gap-2">
                <div class="w-8 h-8 rounded-xl bg-blue-100 text-blue-700 flex items-center justify-center">
                    <i data-lucide="calendar-plus" class="w-4 h-4"></i>
                </div>
                <h3 class="font-heading font-bold text-base text-slate-900">Input Jadwal Kuliah / Sekolah</h3>
            </div>
            <button type="button" class="text-slate-400 hover:text-slate-600 p-1" onclick="closeModal('modalInputJadwal')">
                <i data-lucide="x" class="w-5 h-5"></i>
            </button>
        </div>
        <p class="text-xs text-slate-500">
            Masukkan slot kuliah atau jam sekolah Anda agar slot waktu luang dapat terdeteksi secara presisi.
        </p>
        <form class="space-y-3 text-xs" onsubmit="handleSaveJadwal(event)">
            <div>
                <label class="block font-semibold text-slate-700 mb-1">Mata Kuliah / Keterangan</label>
                <input class="w-full border border-slate-200 rounded-xl px-3 py-2 text-slate-800 focus:outline-none focus:ring-1 focus:ring-primary" placeholder="Contoh: Pemrograman Web Lanjut" required type="text">
            </div>
            <div class="grid grid-cols-2 gap-2">
                <div>
                    <label class="block font-semibold text-slate-700 mb-1">Hari</label>
                    <select class="w-full border border-slate-200 rounded-xl px-3 py-2 text-slate-800 focus:outline-none focus:ring-1 focus:ring-primary">
                        <option>Senin</option>
                        <option>Selasa</option>
                        <option>Rabu</option>
                        <option>Kamis</option>
                        <option>Jumat</option>
                        <option>Sabtu</option>
                    </select>
                </div>
                <div>
                    <label class="block font-semibold text-slate-700 mb-1">Lokasi Kampus</label>
                    <input class="w-full border border-slate-200 rounded-xl px-3 py-2 text-slate-800 focus:outline-none focus:ring-1 focus:ring-primary" type="text" value="Gedung Informatika ITS">
                </div>
            </div>
            <div class="grid grid-cols-2 gap-2">
                <div>
                    <label class="block font-semibold text-slate-700 mb-1">Jam Mulai</label>
                    <input class="w-full border border-slate-200 rounded-xl px-3 py-2 text-slate-800 focus:outline-none focus:ring-1 focus:ring-primary" type="time" value="08:00">
                </div>
                <div>
                    <label class="block font-semibold text-slate-700 mb-1">Jam Selesai</label>
                    <input class="w-full border border-slate-200 rounded-xl px-3 py-2 text-slate-800 focus:outline-none focus:ring-1 focus:ring-primary" type="time" value="11:30">
                </div>
            </div>
            <div class="pt-2 flex items-center justify-end gap-2">
                <button type="button" class="px-4 py-2 border border-slate-200 rounded-xl text-slate-600 font-semibold hover:bg-slate-50" onclick="closeModal('modalInputJadwal')">Batal</button>
                <button type="submit" class="px-4 py-2 bg-primary hover:bg-blue-700 text-white rounded-xl font-bold">Simpan Jadwal</button>
            </div>
        </form>
    </div>
</div>

<!-- MODAL: KELENGKAPAN PROFIL -->
<div class="fixed inset-0 z-50 bg-slate-900/50 backdrop-blur-xs flex items-center justify-center p-4 hidden" id="modalEditProfil">
    <div class="bg-white rounded-3xl max-w-lg w-full p-6 space-y-4 shadow-2xl border border-slate-100 max-h-[90vh] overflow-y-auto">
        <div class="flex items-center justify-between border-b border-slate-100 pb-3">
            <h3 class="font-heading font-bold text-base text-slate-900">Kelola Data Profil &amp; Keahlian</h3>
            <button type="button" class="text-slate-400 hover:text-slate-600 p-1" onclick="closeModal('modalEditProfil')">
                <i data-lucide="x" class="w-5 h-5"></i>
            </button>
        </div>
        <div class="space-y-3 text-xs">
            <div>
                <label class="block font-semibold text-slate-700 mb-1">Nama Lengkap</label>
                <input class="w-full border border-slate-200 rounded-xl px-3 py-2 text-slate-800" type="text" value="Andika Candra">
            </div>
            <div>
                <label class="block font-semibold text-slate-700 mb-1">Asal Sekolah / Kampus</label>
                <input class="w-full border border-slate-200 rounded-xl px-3 py-2 text-slate-800" type="text" value="Institut Teknologi Sepuluh Nopember (ITS) Surabaya">
            </div>
            <div>
                <label class="block font-semibold text-slate-700 mb-1">Ringkasan Pengalaman Kerja Part-Time</label>
                <textarea class="w-full border border-slate-200 rounded-xl p-3 text-slate-800" rows="2">Barista paruh waktu selama 6 bulan di Warkop Mbois Manyar, terbiasa kasir POS &amp; menjaga kebersihan stan.</textarea>
            </div>
            <div>
                <label class="block font-semibold text-slate-700 mb-1">Pilihan Keahlian (Pilih Minat Anda)</label>
                <div class="flex flex-wrap gap-1.5 pt-1">
                    <span class="bg-blue-50 border border-blue-300 text-blue-800 px-2.5 py-1 rounded-full text-xs font-semibold cursor-pointer">✓ Barista &amp; Racik Kopi</span>
                    <span class="bg-blue-50 border border-blue-300 text-blue-800 px-2.5 py-1 rounded-full text-xs font-semibold cursor-pointer">✓ Kasir &amp; Point of Sales</span>
                    <span class="bg-blue-50 border border-blue-300 text-blue-800 px-2.5 py-1 rounded-full text-xs font-semibold cursor-pointer">✓ Packing Olshop</span>
                    <span class="bg-slate-100 hover:bg-slate-200 text-slate-700 px-2.5 py-1 rounded-full text-xs font-semibold cursor-pointer">+ Desain Banner Promosi</span>
                    <span class="bg-slate-100 hover:bg-slate-200 text-slate-700 px-2.5 py-1 rounded-full text-xs font-semibold cursor-pointer">+ Penjaga Stand Makanan</span>
                </div>
            </div>
        </div>
        <div class="pt-3 border-t border-slate-100 flex items-center justify-end gap-2">
            <button type="button" class="px-4 py-2 border border-slate-200 rounded-xl text-slate-600 font-semibold text-xs" onclick="closeModal('modalEditProfil')">Batal</button>
            <button type="button" class="px-4 py-2 bg-primary hover:bg-blue-700 text-white rounded-xl font-bold text-xs" onclick="saveProfilSuccess()">Simpan Perubahan</button>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener("DOMContentLoaded", () => {
        if (typeof lucide !== 'undefined') {
            lucide.createIcons();
        }
    });

    let currentJobApplying = {};

    function openJobDetail(title, company, wage, schedule, location, desc) {
        currentJobApplying = { title, company, wage, schedule, location, desc };
        document.getElementById('modalJobTitle').textContent = title;
        document.getElementById('modalJobCompany').textContent = company;
        document.getElementById('modalJobWage').textContent = wage;
        document.getElementById('modalJobSchedule').textContent = schedule;
        document.getElementById('modalJobLocation').textContent = location;
        document.getElementById('modalJobDesc').textContent = desc;
        openModal('modalJobDetail');
    }

    function applyJob(title, company) {
        const confirmApply = confirm(`Kirimkan lamaran cepat untuk posisi "${title}" di ${company} menggunakan profil terverifikasi Andika Candra?`);
        if (confirmApply) {
            addApplicationToTable(title, company);
            alert(`Lamaran untuk ${title} berhasil dikirim ke pemilik usaha! Pantau statusnya di tabel Status Lamaran.`);
        }
    }

    function applyFromModal() {
        closeModal('modalJobDetail');
        applyJob(currentJobApplying.title, currentJobApplying.company);
    }

    function addApplicationToTable(title, company) {
        const tableBody = document.getElementById('applicationTableBody');
        const newRow = document.createElement('tr');
        newRow.className = "hover:bg-slate-50/70 transition-colors app-row";
        newRow.setAttribute('data-status', 'Dikirim');
        newRow.innerHTML = `
            <td class="py-3.5 px-2">
                <div class="font-bold text-slate-900">${title}</div>
                <div class="text-[11px] text-slate-500">${company}</div>
            </td>
            <td class="py-3.5 px-2 text-slate-600">Baru saja</td>
            <td class="py-3.5 px-2 text-slate-600">Sesuai Waktu Luang</td>
            <td class="py-3.5 px-2 text-center">
                <span class="bg-slate-100 text-slate-700 text-[11px] font-bold px-2.5 py-1 rounded-full inline-flex items-center gap-1">
                    <span class="w-1.5 h-1.5 rounded-full bg-slate-500"></span> Dikirim
                </span>
            </td>
            <td class="py-3.5 px-2 text-right">
                <button type="button" onclick="cancelApp(this)" class="text-rose-500 hover:text-rose-700 font-semibold">Batalkan</button>
            </td>
        `;
        tableBody.prepend(newRow);
    }

    function cancelApp(btn) {
        if (confirm('Apakah Anda yakin ingin membatalkan lamaran ini?')) {
            btn.closest('tr').remove();
        }
    }

    function filterApplicationStatus(status) {
        document.querySelectorAll('.app-row').forEach(row => {
            row.style.display = (status === 'semua' || row.getAttribute('data-status') === status) ? '' : 'none';
        });
    }

    function previewCVModal() {
        const template = document.getElementById('cvTemplateSelect').value;
        alert(`Membuka Pratinjau CV Interaktif (Template: ${template.toUpperCase()}) untuk Andika Candra.`);
    }

    function downloadCVDummy() {
        alert('Membuat dan mengunduh berkas "CV_Andika_Candra_MABU.pdf" langsung dari data profil...');
    }

    function openModal(id) {
        const modal = document.getElementById(id);
        if (modal) {
            modal.classList.remove('hidden');
            if (typeof lucide !== 'undefined') lucide.createIcons();
        }
    }

    function closeModal(id) {
        const modal = document.getElementById(id);
        if (modal) modal.classList.add('hidden');
    }

    function handleSaveJadwal(e) {
        e.preventDefault();
        closeModal('modalInputJadwal');
        alert('Jadwal kuliah baru berhasil disimpan! Slot waktu luang Anda telah diperbarui secara otomatis.');
    }

    function saveProfilSuccess() {
        closeModal('modalEditProfil');
        alert('Data profil dan keahlian berhasil diperbarui!');
    }
</script>
@endpush
