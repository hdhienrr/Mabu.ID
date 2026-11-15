@extends('layouts.mabu')

@section('title', 'Rekomendasi Smart Match - MABU')

@section('content')
<div class="flex flex-col w-full">
    <!-- Top Smart Match AI Announcement & KRS Sync Status -->
    <section class="relative w-full rounded-2xl bg-surface-container-lowest shadow-sm p-space-lg mb-space-lg overflow-hidden">
        <div class="absolute -right-16 -top-16 w-80 h-80 rounded-full bg-primary-fixed/30 blur-3xl pointer-events-none"></div>
        <div class="absolute right-32 bottom-0 w-48 h-48 rounded-full bg-tertiary-fixed/40 blur-2xl pointer-events-none"></div>
        <div class="relative z-10 flex flex-col xl:flex-row xl:items-center justify-between gap-space-lg">
            <div class="flex-1 max-w-3xl">
                <div class="inline-flex items-center gap-space-xs bg-tertiary-fixed px-space-sm py-1 rounded-full text-on-tertiary-fixed mb-space-sm">
                    <span class="material-symbols-outlined text-[16px] text-tertiary">verified_user</span>
                    <span class="font-label-sm text-label-sm uppercase tracking-wider">AI Sync SIAKAD Aktif</span>
                </div>
                <h1 class="font-headline-lg text-headline-lg text-on-surface tracking-tight">Smart Match: 100% Bebas Bentrok Kuliah</h1>
                <p class="font-body-md text-body-md text-on-surface-variant mt-space-xs max-w-2xl leading-relaxed">
                    Sistem MABU memindai <span class="font-label-lg text-primary font-semibold">42 jam luang mingguanmu</span> (Senin-Minggu dari SIAKAD ITS) dan merekomendasikan lowongan dengan kecocokan tinggi tanpa mengorbankan waktu studi.
                </p>
            </div>
            <!-- Sync Status Widget -->
            <div class="flex items-center gap-space-md bg-surface-container-low p-space-md rounded-2xl shrink-0">
                <div class="relative flex items-center justify-center w-14 h-14 bg-surface-container-lowest rounded-xl shadow-sm">
                    <svg class="w-12 h-12 -rotate-90" viewbox="0 0 36 36">
                        <path class="text-surface-container" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" fill="none" stroke="currentColor" stroke-width="3"></path>
                        <path class="text-tertiary-container" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" fill="none" stroke="currentColor" stroke-dasharray="100, 100" stroke-linecap="round" stroke-width="3"></path>
                    </svg>
                    <span class="material-symbols-outlined text-tertiary text-[24px] absolute">event_available</span>
                </div>
                <div class="flex flex-col">
                    <div class="flex items-center gap-space-xs">
                        <span class="w-2.5 h-2.5 rounded-full bg-tertiary animate-pulse"></span>
                        <span class="font-label-sm text-label-sm text-tertiary tracking-wide uppercase">KRS Terkunci Aktif</span>
                    </div>
                    <span class="font-headline-sm text-headline-sm text-on-surface">0% Bentrok</span>
                    <span class="font-body-sm text-body-sm text-on-surface-variant">SIAKAD Genap 2024/2025</span>
                </div>
            </div>
        </div>
        <!-- Filter chips -->
        <div class="flex items-center gap-space-xs mt-space-lg flex-wrap pt-space-md">
            <button type="button" class="px-space-md py-1.5 rounded-full font-label-md text-label-md bg-primary text-on-primary shadow-sm hover:bg-primary-container transition-all flex items-center gap-space-xs">
                <span>Semua Rekomendasi</span>
                <span class="w-5 h-5 rounded-full bg-on-primary/20 text-on-primary text-[10px] flex items-center justify-center font-bold">6</span>
            </button>
            <button type="button" class="px-space-md py-1.5 rounded-full font-label-md text-label-md bg-surface-container text-on-surface-variant hover:text-on-surface hover:bg-surface-container-high transition-all flex items-center gap-space-xs">
                <span class="material-symbols-outlined text-[16px] text-tertiary">bolt</span>
                <span>Kompatibilitas &gt;95%</span>
                <span class="w-5 h-5 rounded-full bg-surface-variant text-on-surface text-[10px] flex items-center justify-center font-bold">3</span>
            </button>
            <button type="button" class="px-space-md py-1.5 rounded-full font-label-md text-label-md bg-surface-container text-on-surface-variant hover:text-on-surface hover:bg-surface-container-high transition-all flex items-center gap-space-xs">
                <span class="material-symbols-outlined text-[16px] text-primary">near_me</span>
                <span>Di Bawah 1 Km Kampus</span>
                <span class="w-5 h-5 rounded-full bg-surface-variant text-on-surface text-[10px] flex items-center justify-center font-bold">4</span>
            </button>
            <button type="button" class="px-space-md py-1.5 rounded-full font-label-md text-label-md bg-surface-container text-on-surface-variant hover:text-on-surface hover:bg-surface-container-high transition-all flex items-center gap-space-xs">
                <span class="material-symbols-outlined text-[16px] text-on-surface-variant">payments</span>
                <span>Upah Tertinggi</span>
                <span class="w-5 h-5 rounded-full bg-surface-variant text-on-surface text-[10px] flex items-center justify-center font-bold">2</span>
            </button>
        </div>
    </section>

    <!-- Split View Master-Detail Container -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-gutter items-start">
        <!-- LEFT COLUMN: Recommendations List (5 cols) -->
        <div class="lg:col-span-5 flex flex-col gap-space-md">
            <div class="flex items-center justify-between px-space-xs mb-space-xs">
                <span class="font-label-lg text-label-lg text-on-surface">Pilihan Lowongan Terpilih</span>
                <span class="font-body-sm text-body-sm text-on-surface-variant">Urutkan: AI Compatibility</span>
            </div>

            <!-- CARD 1: Selected State -->
            <div class="relative bg-surface-container-lowest rounded-2xl p-space-md shadow-md cursor-pointer transition-all ring-2 ring-primary bg-gradient-to-r from-surface-container-lowest via-primary/5 to-surface-container-lowest">
                <div class="flex items-start justify-between gap-space-sm mb-space-sm">
                    <div class="flex items-center gap-space-sm">
                        <div class="w-12 h-12 rounded-xl bg-primary-fixed flex items-center justify-center text-primary shrink-0 shadow-sm">
                            <span class="material-symbols-outlined text-[26px]">coffee</span>
                        </div>
                        <div>
                            <span class="font-label-sm text-label-sm text-primary uppercase tracking-wide">Kopi Sahabat Sukolilo</span>
                            <h3 class="font-headline-sm text-headline-sm text-on-surface line-clamp-1">Barista Malam Warkop</h3>
                        </div>
                    </div>
                    <div class="px-space-sm py-1 rounded-full bg-tertiary-fixed text-on-tertiary-fixed font-label-sm text-label-sm flex items-center gap-0.5 shrink-0">
                        <span class="material-symbols-outlined text-[14px]">verified</span>
                        <span>99% MATCH</span>
                    </div>
                </div>
                <div class="flex flex-wrap items-center gap-space-xs mb-space-md">
                    <span class="inline-flex items-center gap-1 px-space-sm py-0.5 rounded-full bg-surface-container font-label-md text-label-md text-on-surface-variant">
                        <span class="material-symbols-outlined text-[14px] text-primary">distance</span>
                        700m dari Sukolilo
                    </span>
                    <span class="inline-flex items-center gap-1 px-space-sm py-0.5 rounded-full bg-surface-container font-label-md text-label-md text-on-surface-variant">
                        <span class="material-symbols-outlined text-[14px]">schedule</span>
                        19:00 - 23:00 WIB
                    </span>
                </div>
                <!-- Academic Safe Badge -->
                <div class="flex items-center gap-space-xs p-space-xs px-space-sm rounded-xl bg-tertiary-fixed/30 text-on-tertiary-fixed-variant mb-space-md">
                    <span class="material-symbols-outlined text-[16px] text-tertiary">check_circle</span>
                    <span class="font-label-sm text-label-sm">Bebas Kuliah: Aman dari Basis Data (Selesai 16:30)</span>
                </div>
                <div class="flex items-center justify-between pt-space-xs">
                    <div>
                        <span class="font-body-sm text-body-sm text-on-surface-variant block">Gaji per Shift</span>
                        <span class="font-headline-sm text-headline-sm text-on-surface font-semibold">Rp 175.000<span class="font-body-sm text-body-sm text-on-surface-variant font-normal">/hari</span></span>
                    </div>
                    <span class="font-label-md text-label-md text-primary flex items-center gap-0.5">
                        Sedang Dilihat
                        <span class="material-symbols-outlined text-[18px]">chevron_right</span>
                    </span>
                </div>
            </div>

            <!-- CARD 2 -->
            <div class="bg-surface-container-lowest rounded-2xl p-space-md shadow-sm hover:shadow-md transition-all cursor-pointer hover:bg-surface-container-low group">
                <div class="flex items-start justify-between gap-space-sm mb-space-sm">
                    <div class="flex items-center gap-space-sm">
                        <div class="w-12 h-12 rounded-xl bg-surface-container flex items-center justify-center text-on-surface-variant shrink-0 group-hover:bg-primary-fixed group-hover:text-primary transition-colors">
                            <span class="material-symbols-outlined text-[26px]">dry_cleaning</span>
                        </div>
                        <div>
                            <span class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wide">Gebang Apparel Co.</span>
                            <h3 class="font-headline-sm text-headline-sm text-on-surface line-clamp-1">Operator Sablon &amp; Packing Distro</h3>
                        </div>
                    </div>
                    <div class="px-space-sm py-1 rounded-full bg-surface-container text-on-surface font-label-sm text-label-sm flex items-center gap-0.5 shrink-0">
                        <span>96% MATCH</span>
                    </div>
                </div>
                <div class="flex flex-wrap items-center gap-space-xs mb-space-sm">
                    <span class="inline-flex items-center gap-1 px-space-sm py-0.5 rounded-full bg-surface-container font-label-md text-label-md text-on-surface-variant">
                        <span class="material-symbols-outlined text-[14px]">distance</span>
                        1.2 km Gebang Wetan
                    </span>
                    <span class="inline-flex items-center gap-1 px-space-sm py-0.5 rounded-full bg-surface-container font-label-md text-label-md text-on-surface-variant">
                        <span class="material-symbols-outlined text-[14px]">schedule</span>
                        15:00 - 19:00 WIB
                    </span>
                </div>
                <div class="flex items-center justify-between pt-space-xs">
                    <div>
                        <span class="font-body-sm text-body-sm text-on-surface-variant block">Gaji per Shift</span>
                        <span class="font-headline-sm text-headline-sm text-on-surface font-semibold">Rp 140.000<span class="font-body-sm text-body-sm text-on-surface-variant font-normal">/hari</span></span>
                    </div>
                    <span class="w-8 h-8 rounded-full bg-surface-container flex items-center justify-center text-on-surface-variant group-hover:bg-primary group-hover:text-on-primary transition-all">
                        <span class="material-symbols-outlined text-[18px]">arrow_forward</span>
                    </span>
                </div>
            </div>

            <!-- CARD 3 -->
            <div class="bg-surface-container-lowest rounded-2xl p-space-md shadow-sm hover:shadow-md transition-all cursor-pointer hover:bg-surface-container-low group">
                <div class="flex items-start justify-between gap-space-sm mb-space-sm">
                    <div class="flex items-center gap-space-sm">
                        <div class="w-12 h-12 rounded-xl bg-surface-container flex items-center justify-center text-on-surface-variant shrink-0 group-hover:bg-primary-fixed group-hover:text-primary transition-colors">
                            <span class="material-symbols-outlined text-[26px]">print</span>
                        </div>
                        <div>
                            <span class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wide">Mitra Grafika Mandiri</span>
                            <h3 class="font-headline-sm text-headline-sm text-on-surface line-clamp-1">Penjaga Toko ATK &amp; Fotokopi</h3>
                        </div>
                    </div>
                    <div class="px-space-sm py-1 rounded-full bg-surface-container text-on-surface font-label-sm text-label-sm flex items-center gap-0.5 shrink-0">
                        <span>93% MATCH</span>
                    </div>
                </div>
                <div class="flex flex-wrap items-center gap-space-xs mb-space-sm">
                    <span class="inline-flex items-center gap-1 px-space-sm py-0.5 rounded-full bg-surface-container font-label-md text-label-md text-on-surface-variant">
                        <span class="material-symbols-outlined text-[14px]">distance</span>
                        350m Gerbang Utama ITS
                    </span>
                    <span class="inline-flex items-center gap-1 px-space-sm py-0.5 rounded-full bg-surface-container font-label-md text-label-md text-on-surface-variant">
                        <span class="material-symbols-outlined text-[14px]">schedule</span>
                        11:30 - 15:30 WIB (Sela Kuliah)
                    </span>
                </div>
                <div class="flex items-center justify-between pt-space-xs">
                    <div>
                        <span class="font-body-sm text-body-sm text-on-surface-variant block">Gaji per Shift</span>
                        <span class="font-headline-sm text-headline-sm text-on-surface font-semibold">Rp 130.000<span class="font-body-sm text-body-sm text-on-surface-variant font-normal">/hari</span></span>
                    </div>
                    <span class="w-8 h-8 rounded-full bg-surface-container flex items-center justify-center text-on-surface-variant group-hover:bg-primary group-hover:text-on-primary transition-all">
                        <span class="material-symbols-outlined text-[18px]">arrow_forward</span>
                    </span>
                </div>
            </div>

            <!-- CARD 4 -->
            <div class="bg-surface-container-lowest rounded-2xl p-space-md shadow-sm hover:shadow-md transition-all cursor-pointer hover:bg-surface-container-low group">
                <div class="flex items-start justify-between gap-space-sm mb-space-sm">
                    <div class="flex items-center gap-space-sm">
                        <div class="w-12 h-12 rounded-xl bg-surface-container flex items-center justify-center text-on-surface-variant shrink-0 group-hover:bg-primary-fixed group-hover:text-primary transition-colors">
                            <span class="material-symbols-outlined text-[26px]">local_cafe</span>
                        </div>
                        <div>
                            <span class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wide">Roastery Kertajaya</span>
                            <h3 class="font-headline-sm text-headline-sm text-on-surface line-clamp-1">Asisten Barista Akhir Pekan</h3>
                        </div>
                    </div>
                    <div class="px-space-sm py-1 rounded-full bg-surface-container text-on-surface font-label-sm text-label-sm flex items-center gap-0.5 shrink-0">
                        <span>91% MATCH</span>
                    </div>
                </div>
                <div class="flex flex-wrap items-center gap-space-xs mb-space-sm">
                    <span class="inline-flex items-center gap-1 px-space-sm py-0.5 rounded-full bg-surface-container font-label-md text-label-md text-on-surface-variant">
                        <span class="material-symbols-outlined text-[14px]">distance</span>
                        2.1 km Kertajaya Indah
                    </span>
                    <span class="inline-flex items-center gap-1 px-space-sm py-0.5 rounded-full bg-surface-container font-label-md text-label-md text-on-surface-variant">
                        <span class="material-symbols-outlined text-[14px]">date_range</span>
                        Sabtu - Minggu Saja
                    </span>
                </div>
                <div class="flex items-center justify-between pt-space-xs">
                    <div>
                        <span class="font-body-sm text-body-sm text-on-surface-variant block">Gaji per Shift</span>
                        <span class="font-headline-sm text-headline-sm text-on-surface font-semibold">Rp 200.000<span class="font-body-sm text-body-sm text-on-surface-variant font-normal">/hari</span></span>
                    </div>
                    <span class="w-8 h-8 rounded-full bg-surface-container flex items-center justify-center text-on-surface-variant group-hover:bg-primary group-hover:text-on-primary transition-all">
                        <span class="material-symbols-outlined text-[18px]">arrow_forward</span>
                    </span>
                </div>
            </div>
        </div>

        <!-- RIGHT COLUMN: Active Job Detail Panel (7 cols) -->
        <div class="lg:col-span-7 bg-surface-container-lowest rounded-2xl shadow-sm overflow-hidden flex flex-col">
            <!-- Media Banner Image -->
            <div class="relative h-60 w-full overflow-hidden">
                <div class="bg-cover bg-center w-full h-full transform hover:scale-105 transition-transform duration-700" data-alt="Vibrant cozy Indonesian student cafe coffee shop with warm ambient amber hanging lights, wooden espresso counter, modern youth atmosphere, clean aesthetic in Sukolilo Surabaya" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuB7m6DhHILUkVj8XcOWQdxgm0vOaHsVKuMqwdfl1P4O7QEg7xezvjPZUXlfYv9B0szAVwp2vbCfQ72XgWEJK3DjvaA6bRhqECiry_vOpRH6krc-FBSsuLxqKZwKJ6mbj2QxeRmJp1djKV2XE7wBBsngXwxqoBRYMVjI8gShpurG6w0In5SxFwslw09Fd_0nC_Ad1sHOAin20hCuJmfijPqKi_esk1lxgRmt2pLLiYI')"></div>
                <div class="absolute inset-0 bg-gradient-to-t from-on-surface/90 via-on-surface/30 to-transparent"></div>
                <!-- Header Floating Badges -->
                <div class="absolute top-space-md left-space-md right-space-md flex items-center justify-between">
                    <div class="flex items-center gap-space-xs bg-surface-container-lowest/90 backdrop-blur-md px-space-sm py-1 rounded-full shadow-sm">
                        <span class="material-symbols-outlined text-primary text-[18px]">verified</span>
                        <span class="font-label-sm text-label-sm text-on-surface">Mitra Resmi Terverifikasi MABU</span>
                    </div>
                    <div class="flex items-center gap-space-xs bg-surface-container-lowest/90 backdrop-blur-md px-space-sm py-1 rounded-full shadow-sm">
                        <span class="w-2 h-2 rounded-full bg-tertiary"></span>
                        <span class="font-label-sm text-label-sm text-on-surface">Buka Sekarang (Shift Malam)</span>
                    </div>
                </div>
                <!-- Over-Image Details -->
                <div class="absolute bottom-space-md left-space-md right-space-md text-surface">
                    <div class="flex items-center gap-space-xs text-tertiary-fixed font-label-md mb-1">
                        <span class="material-symbols-outlined text-[18px]" style="font-variation-settings: 'FILL' 1;">star</span>
                        <span class="font-bold">4.9</span>
                        <span class="text-surface/80">(34 ulasan mahasiswa ITS &amp; PENS)</span>
                    </div>
                    <h2 class="font-headline-lg text-headline-lg font-bold text-surface tracking-tight leading-snug">Barista &amp; Kasir Warkop Malam</h2>
                    <span class="font-body-md text-body-md text-surface/90">Warkop Kopi Sahabat • Sukolilo, Surabaya</span>
                </div>
            </div>

            <!-- Main Detail Content Body -->
            <div class="p-space-lg flex flex-col gap-space-lg">
                <!-- Compensation & Quick Stats Banner -->
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-space-sm bg-surface-container-low p-space-md rounded-2xl">
                    <div class="flex flex-col">
                        <span class="font-body-sm text-body-sm text-on-surface-variant">Estimasi Take-Home Pay</span>
                        <span class="font-headline-sm text-headline-sm text-primary font-bold">Rp 175.000</span>
                        <span class="font-label-sm text-label-sm text-tertiary font-medium">Cair mingguan tiap Senin</span>
                    </div>
                    <div class="flex flex-col">
                        <span class="font-body-sm text-body-sm text-on-surface-variant">Durasi Kerja</span>
                        <span class="font-headline-sm text-headline-sm text-on-surface font-semibold">4 Jam / Shift</span>
                        <span class="font-label-sm text-label-sm text-on-surface-variant">19:00 - 23:00 WIB</span>
                    </div>
                    <div class="flex flex-col">
                        <span class="font-body-sm text-body-sm text-on-surface-variant">Jarak dari Kampus</span>
                        <span class="font-headline-sm text-headline-sm text-on-surface font-semibold">700 Meter</span>
                        <span class="font-label-sm text-label-sm text-on-surface-variant">±3 Menit Naik Motor</span>
                    </div>
                </div>

                <!-- Interactive Schedule Clash Breakdown -->
                <div class="flex flex-col gap-space-sm">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-space-xs">
                            <span class="material-symbols-outlined text-primary text-[20px]">calendar_today</span>
                            <h4 class="font-label-lg text-label-lg text-on-surface">Komparasi Jadwal Hari Ini (KRS vs Shift)</h4>
                        </div>
                        <span class="font-label-sm text-label-sm text-tertiary font-bold bg-tertiary-fixed/40 px-2 py-0.5 rounded-full">
                            STATUS: AMAN 100%
                        </span>
                    </div>
                    <!-- Flow Timeline visual -->
                    <div class="bg-surface-container p-space-md rounded-2xl flex flex-col md:flex-row items-stretch md:items-center justify-between gap-space-sm">
                        <!-- Timeline Item 1 -->
                        <div class="flex-1 bg-surface-container-lowest p-space-sm rounded-xl shadow-sm border-l-4 border-primary">
                            <div class="flex items-center justify-between mb-1">
                                <span class="font-label-sm text-label-sm text-primary uppercase font-bold">Kuliah SIAKAD</span>
                                <span class="material-symbols-outlined text-[16px] text-primary">school</span>
                            </div>
                            <p class="font-label-md text-label-md text-on-surface truncate">Sistem Basis Data (IF234)</p>
                            <span class="font-body-sm text-body-sm text-on-surface-variant">13:30 - 16:30 WIB</span>
                        </div>
                        <div class="flex items-center justify-center text-on-surface-variant shrink-0">
                            <span class="material-symbols-outlined text-[20px] hidden md:block">arrow_forward</span>
                            <span class="material-symbols-outlined text-[20px] md:hidden">arrow_downward</span>
                        </div>
                        <!-- Timeline Item 2: Rest & Buffer -->
                        <div class="flex-1 bg-surface-container-lowest p-space-sm rounded-xl shadow-sm border-l-4 border-outline-variant">
                            <div class="flex items-center justify-between mb-1">
                                <span class="font-label-sm text-label-sm text-on-surface-variant uppercase font-bold">Jeda Istirahat</span>
                                <span class="material-symbols-outlined text-[16px] text-on-surface-variant">bed</span>
                            </div>
                            <p class="font-label-md text-label-md text-on-surface">Mandi, Santai &amp; Makan</p>
                            <span class="font-body-sm text-body-sm text-tertiary font-semibold">16:30 - 19:00 (2.5 Jam)</span>
                        </div>
                        <div class="flex items-center justify-center text-on-surface-variant shrink-0">
                            <span class="material-symbols-outlined text-[20px] hidden md:block">arrow_forward</span>
                            <span class="material-symbols-outlined text-[20px] md:hidden">arrow_downward</span>
                        </div>
                        <!-- Timeline Item 3: Part time job -->
                        <div class="flex-1 bg-surface-container-lowest p-space-sm rounded-xl shadow-sm border-l-4 border-tertiary">
                            <div class="flex items-center justify-between mb-1">
                                <span class="font-label-sm text-label-sm text-tertiary uppercase font-bold">Shift Kerja</span>
                                <span class="material-symbols-outlined text-[16px] text-tertiary">store</span>
                            </div>
                            <p class="font-label-md text-label-md text-on-surface">Warkop Kopi Sahabat</p>
                            <span class="font-body-sm text-body-sm text-on-surface-variant">19:00 - 23:00 WIB</span>
                        </div>
                    </div>
                </div>

                <!-- Benefits & Facilities -->
                <div class="flex flex-col gap-space-sm">
                    <h4 class="font-label-lg text-label-lg text-on-surface">Benefit &amp; Fasilitas Mahasiswa</h4>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-space-sm">
                        <div class="flex items-center gap-space-sm p-space-sm bg-surface-container-low rounded-xl">
                            <div class="w-9 h-9 rounded-lg bg-surface-container-lowest flex items-center justify-center text-primary shadow-sm shrink-0">
                                <span class="material-symbols-outlined text-[20px]">lunch_dining</span>
                            </div>
                            <div class="flex flex-col min-w-0">
                                <span class="font-label-md text-label-md text-on-surface truncate">Makan Malam Gratis</span>
                                <span class="font-body-sm text-body-sm text-on-surface-variant truncate">Menu reguler tiap shift</span>
                            </div>
                        </div>
                        <div class="flex items-center gap-space-sm p-space-sm bg-surface-container-low rounded-xl">
                            <div class="w-9 h-9 rounded-lg bg-surface-container-lowest flex items-center justify-center text-primary shadow-sm shrink-0">
                                <span class="material-symbols-outlined text-[20px]">local_cafe</span>
                            </div>
                            <div class="flex flex-col min-w-0">
                                <span class="font-label-md text-label-md text-on-surface truncate">Free-Flow Racikan Kopi</span>
                                <span class="font-body-sm text-body-sm text-on-surface-variant truncate">Americano &amp; Kopi Susu</span>
                            </div>
                        </div>
                        <div class="flex items-center gap-space-sm p-space-sm bg-surface-container-low rounded-xl">
                            <div class="w-9 h-9 rounded-lg bg-surface-container-lowest flex items-center justify-center text-primary shadow-sm shrink-0">
                                <span class="material-symbols-outlined text-[20px]">savings</span>
                            </div>
                            <div class="flex flex-col min-w-0">
                                <span class="font-label-md text-label-md text-on-surface truncate">Bagi Hasil Tips Harian</span>
                                <span class="font-body-sm text-body-sm text-on-surface-variant truncate">Dibagi rata tiap tutup kasir</span>
                            </div>
                        </div>
                        <div class="flex items-center gap-space-sm p-space-sm bg-surface-container-low rounded-xl">
                            <div class="w-9 h-9 rounded-lg bg-surface-container-lowest flex items-center justify-center text-primary shadow-sm shrink-0">
                                <span class="material-symbols-outlined text-[20px]">wifi</span>
                            </div>
                            <div class="flex flex-col min-w-0">
                                <span class="font-label-md text-label-md text-on-surface truncate">WiFi Super Cepat 100 Mbps</span>
                                <span class="font-body-sm text-body-sm text-on-surface-variant truncate">Boleh nugas pas warkop sepi</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Student Eligibility Requirements -->
                <div class="flex flex-col gap-space-xs">
                    <h4 class="font-label-lg text-label-lg text-on-surface">Kualifikasi Khusus Mahasiswa</h4>
                    <ul class="space-y-2 font-body-md text-body-md text-on-surface-variant">
                        <li class="flex items-start gap-space-xs">
                            <span class="material-symbols-outlined text-primary text-[18px] mt-0.5 shrink-0">check_circle</span>
                            <span>Mahasiswa aktif ITS / PENS / PPNS (ditunjukkan dengan KTM aktif saat verifikasi).</span>
                        </li>
                        <li class="flex items-start gap-space-xs">
                            <span class="material-symbols-outlined text-primary text-[18px] mt-0.5 shrink-0">check_circle</span>
                            <span><strong class="text-on-surface font-semibold">TANPA PENGALAMAN:</strong> Diajari langsung oleh Head Barista cara seduh V60, tubruk, dan operasional mesin kasir tablet (POS).</span>
                        </li>
                        <li class="flex items-start gap-space-xs">
                            <span class="material-symbols-outlined text-primary text-[18px] mt-0.5 shrink-0">check_circle</span>
                            <span>Memiliki etika komunikasi ramah khas mahasiswa Sukolilo, disiplin waktu, dan bertanggung jawab.</span>
                        </li>
                    </ul>
                </div>

                <!-- Location & Parking Snapshot -->
                <div class="flex flex-col gap-space-xs">
                    <div class="flex items-center justify-between">
                        <h4 class="font-label-lg text-label-lg text-on-surface">Lokasi &amp; Navigasi Kampus</h4>
                        <span class="font-body-sm text-body-sm text-primary flex items-center gap-1 cursor-pointer hover:underline">
                            <span class="material-symbols-outlined text-[16px]">map</span>
                            Buka Google Maps
                        </span>
                    </div>
                    <div class="w-full h-36 rounded-2xl bg-cover bg-center relative overflow-hidden flex items-end p-space-md shadow-sm" data-location="Kopi Sahabat Gebang Sukolilo Surabaya" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuC1_mFkKFHOTyHXEHgD-IItgnPkzR23e7rRB4_UIYHLWKkQAjsmqRfiMvzsffpCZTAjASbnnOkS0pWNeci-PLkdoL_v2u2DEpCENphI07Bm4VKfeW9FKsD49nHE7Paq0CgsX6XaHbSyxr53N5jTGF3Cl8ZKcnSeG5KDHOcjXgaQ2EYlJgCuiFr05Xf9-dcLuCa1_8OoasCioesE9MbR16TKaMdadPyL21J43rFesuU')">
                        <div class="absolute inset-0 bg-gradient-to-t from-on-surface/80 via-transparent to-transparent"></div>
                        <div class="relative z-10 flex items-center justify-between w-full text-surface">
                            <div class="flex items-center gap-space-xs">
                                <span class="material-symbols-outlined text-[20px] text-tertiary-fixed">two_wheeler</span>
                                <span class="font-label-md text-label-md">Parkir motor mahasiswa aman &amp; beratap CCTV</span>
                            </div>
                            <span class="font-label-sm text-label-sm bg-surface/20 backdrop-blur-md px-space-sm py-1 rounded-full text-surface">Jalan Gebang Putih No. 18</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sticky Action Bar Bottom -->
            <div class="p-space-md bg-surface-container-low flex items-center justify-between gap-space-sm mt-auto">
                <div class="flex items-center gap-space-xs">
                    <button type="button" class="w-11 h-11 rounded-full bg-surface-container-lowest text-on-surface-variant hover:text-primary hover:bg-primary-fixed transition-colors flex items-center justify-center shadow-sm" title="Simpan ke Bookmark">
                        <span class="material-symbols-outlined text-[20px]">bookmark</span>
                    </button>
                    <button type="button" class="px-space-md py-2.5 rounded-full bg-surface-container-lowest text-on-surface font-label-md text-label-md hover:bg-surface-container hover:text-primary transition-all flex items-center gap-space-xs shadow-sm">
                        <span class="material-symbols-outlined text-[18px]">chat</span>
                        <span class="hidden sm:inline">Tanya Pemilik</span>
                    </button>
                </div>
                <button type="button" class="flex-1 max-w-xs px-space-lg py-2.5 rounded-full bg-primary-container text-on-primary font-label-lg text-label-lg hover:bg-primary transition-all shadow-md flex items-center justify-center gap-space-xs group" id="applyBtn" onclick="handleApply()">
                    <span>Lamar Pekerjaan Sekarang</span>
                    <span class="material-symbols-outlined text-[18px] group-hover:translate-x-1 transition-transform">send</span>
                </button>
            </div>
        </div>
    </div>

    <!-- Toast Notification (Hidden by default, triggered via script) -->
    <div class="fixed bottom-6 right-6 z-50 transform translate-y-20 opacity-0 transition-all duration-300 pointer-events-none flex items-center gap-space-sm bg-on-surface text-surface px-space-lg py-space-md rounded-2xl shadow-xl" id="toastNotification">
        <div class="w-8 h-8 rounded-full bg-tertiary flex items-center justify-center text-on-tertiary">
            <span class="material-symbols-outlined text-[18px]">check</span>
        </div>
        <div class="flex flex-col">
            <span class="font-label-md text-label-md font-semibold">Lamaran Terkirim Otomatis!</span>
            <span class="font-body-sm text-body-sm text-surface-dim">CV MABU &amp; Jadwal Kuliahmu berhasil dikirimkan ke Warkop Kopi Sahabat.</span>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    function handleApply() {
        const toast = document.getElementById('toastNotification');
        const btn = document.getElementById('applyBtn');

        btn.innerHTML = '<span class="material-symbols-outlined text-[18px] animate-spin">refresh</span><span>Mengirim CV MABU...</span>';
        btn.disabled = true;

        setTimeout(() => {
            btn.innerHTML = '<span class="material-symbols-outlined text-[18px]">done_all</span><span>Telah Dilamar</span>';
            btn.classList.remove('bg-primary-container', 'hover:bg-primary');
            btn.classList.add('bg-tertiary', 'text-on-tertiary');

            toast.classList.remove('translate-y-20', 'opacity-0');
            toast.classList.add('translate-y-0', 'opacity-100');

            setTimeout(() => {
                toast.classList.remove('translate-y-0', 'opacity-100');
                toast.classList.add('translate-y-20', 'opacity-0');
            }, 4000);
        }, 900);
    }
</script>
@endpush
