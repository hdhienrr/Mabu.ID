@extends('layouts.mabu')

@section('title', 'Manajemen Jadwal - MABU')

@section('content')
<div class="flex flex-col w-full gap-space-lg">
    <!-- Top Banner / Summary Header -->
    <section class="relative overflow-hidden rounded-2xl bg-surface-container-lowest p-space-lg shadow-[0_1px_4px_rgba(15,23,42,0.05)] border border-surface-container-high/60">
        <div class="relative z-10 flex flex-col lg:flex-row lg:items-center justify-between gap-space-md">
            <div class="flex flex-col gap-space-xs max-w-2xl">
                <div class="flex flex-wrap items-center gap-space-xs">
                    <span class="inline-flex items-center gap-1.5 px-space-sm py-1 rounded-full bg-primary-fixed/80 text-on-primary-fixed font-label-sm text-label-sm font-semibold tracking-wide">
                        <span class="w-2 h-2 rounded-full bg-primary animate-pulse"></span>
                        Semester Genap 2024/2025 • SIAKAD Terhubung
                    </span>
                    <span class="font-body-sm text-body-sm text-on-surface-variant flex items-center gap-1.5 bg-surface-container-low px-space-xs py-0.5 rounded-full">
                        <span class="material-symbols-outlined text-[14px] text-primary">account_balance</span>
                        Institut Teknologi Sepuluh Nopember (ITS)
                    </span>
                </div>
                <h1 class="font-headline-lg text-headline-lg text-on-surface tracking-tight font-bold">
                    Manajemen Waktu &amp; Jadwal Kuliah
                </h1>
                <p class="font-body-md text-body-md text-on-surface-variant leading-relaxed">
                    Kelola keselarasan waktu akademik, shift kerja part-time, dan slot siap kerja. Sistem AI otomatis memproteksi Anda dari bentrok jadwal kuliah dan ujian.
                </p>
            </div>
            <!-- Action Buttons -->
            <div class="flex flex-wrap items-center gap-space-sm shrink-0">
                <button type="button" class="flex items-center gap-space-xs px-space-md py-space-sm rounded-xl bg-primary text-on-primary font-label-lg text-label-lg shadow-sm hover:bg-primary-container active:scale-95 transition-all" id="openModalBtn">
                    <span class="material-symbols-outlined text-[20px]">add_circle</span>
                    <span>Tambah Jadwal</span>
                </button>
                <button type="button" class="flex items-center gap-space-xs px-space-md py-space-sm rounded-xl bg-surface-container-lowest border border-outline-variant/60 text-on-surface font-label-lg text-label-lg shadow-sm hover:bg-surface-container-low active:scale-95 transition-all">
                    <span class="material-symbols-outlined text-[20px] text-primary">sync</span>
                    <span>Sinkron Google Calendar</span>
                </button>
                <button type="button" class="flex items-center gap-space-xs px-space-md py-space-sm rounded-xl bg-surface-container-low text-on-surface font-label-lg text-label-lg hover:bg-surface-container hover:text-primary transition-all">
                    <span class="material-symbols-outlined text-[18px]">tune</span>
                    <span>Filter Tampilan</span>
                </button>
            </div>
        </div>
        <!-- Decorative Subtle Glow Underlay -->
        <div class="absolute -right-16 -top-16 w-72 h-72 rounded-full bg-primary-fixed/20 blur-3xl pointer-events-none"></div>
        <div class="absolute right-72 -bottom-20 w-60 h-60 rounded-full bg-tertiary-fixed/20 blur-2xl pointer-events-none"></div>
    </section>

    <!-- Interactive Filters & Schedule Metrics Bar -->
    <div class="grid grid-cols-1 xl:grid-cols-12 gap-space-md items-center">
        <!-- Legends & Category Filter Panel -->
        <div class="xl:col-span-8 bg-surface-container-lowest rounded-2xl p-space-md shadow-sm border border-surface-container-high/60 flex flex-wrap items-center justify-between gap-space-sm">
            <div class="flex flex-wrap items-center gap-space-xs">
                <button type="button" class="inline-flex items-center gap-space-xs px-space-sm py-1.5 rounded-full bg-primary text-on-primary font-label-sm text-label-sm font-semibold shadow-sm transition-all">
                    <span>Semua Jadwal</span>
                </button>
                <button type="button" class="inline-flex items-center gap-space-xs px-space-sm py-1.5 rounded-full bg-primary-fixed/60 text-on-primary-fixed font-label-sm text-label-sm font-medium hover:bg-primary-fixed transition-all">
                    <span class="w-2 h-2 rounded-full bg-primary"></span>
                    <span>Kuliah ITS (18 Jam)</span>
                </button>
                <button type="button" class="inline-flex items-center gap-space-xs px-space-sm py-1.5 rounded-full bg-tertiary-fixed/60 text-on-tertiary-fixed font-label-sm text-label-sm font-medium hover:bg-tertiary-fixed transition-all">
                    <span class="w-2 h-2 rounded-full bg-tertiary"></span>
                    <span>Shift Part-Time (12 Jam)</span>
                </button>
                <button type="button" class="inline-flex items-center gap-space-xs px-space-sm py-1.5 rounded-full bg-surface-container-high text-on-surface-variant font-label-sm text-label-sm font-medium hover:bg-surface-container-highest transition-all">
                    <span class="w-2 h-2 rounded-full bg-primary-container"></span>
                    <span>Slot Siap Kerja (24 Jam)</span>
                </button>
                <button type="button" class="inline-flex items-center gap-space-xs px-space-sm py-1.5 rounded-full bg-error-container/70 text-on-error-container font-label-sm text-label-sm font-medium hover:bg-error-container transition-all">
                    <span class="w-2 h-2 rounded-full bg-error"></span>
                    <span>Wawancara</span>
                </button>
            </div>
            <div class="inline-flex items-center gap-1.5 text-tertiary bg-tertiary-fixed/30 border border-tertiary-fixed-dim/40 px-space-sm py-1 rounded-full text-label-sm font-label-sm font-semibold">
                <span class="material-symbols-outlined text-[16px]">verified</span>
                <span>Anti-Bentrok AI Aktif</span>
            </div>
        </div>

        <!-- Quick Calendar Week Navigator -->
        <div class="xl:col-span-4 bg-surface-container-lowest rounded-2xl p-space-md shadow-sm border border-surface-container-high/60 flex items-center justify-between">
            <div class="flex items-center gap-space-xs">
                <button type="button" aria-label="Minggu Lalu" class="w-8 h-8 rounded-full flex items-center justify-center text-on-surface-variant hover:bg-surface-container transition-colors">
                    <span class="material-symbols-outlined text-[20px]">chevron_left</span>
                </button>
                <div class="flex flex-col">
                    <span class="font-label-lg text-label-lg text-on-surface font-bold">17 - 23 November 2024</span>
                    <span class="font-body-sm text-body-sm text-on-surface-variant">Minggu ke-11 Perkuliahan</span>
                </div>
            </div>
            <div class="flex items-center gap-space-xs">
                <button type="button" aria-label="Minggu Depan" class="w-8 h-8 rounded-full flex items-center justify-center text-on-surface-variant hover:bg-surface-container transition-colors">
                    <span class="material-symbols-outlined text-[20px]">chevron_right</span>
                </button>
                <button type="button" class="px-space-sm py-1 rounded-full bg-surface-container-low font-label-sm text-label-sm text-primary font-semibold hover:bg-primary hover:text-on-primary transition-all border border-surface-container-high">
                    Hari Ini
                </button>
            </div>
        </div>
    </div>

    <!-- Weekly Timetable View (Mon-Sun Interactive Grid) -->
    <div class="w-full bg-surface-container-lowest rounded-2xl shadow-sm p-space-md border border-surface-container-high/60 overflow-x-auto">
        <div class="min-w-[1080px] grid grid-cols-7 gap-space-sm">
            <!-- COLUMN 1: SENIN -->
            <div class="flex flex-col gap-space-sm bg-surface-container-low/50 rounded-2xl p-space-xs">
                <div class="flex items-center justify-between px-space-xs py-1.5 bg-surface-container-lowest rounded-xl shadow-sm border border-surface-container-high/40">
                    <div class="flex items-center gap-space-xs">
                        <span class="w-7 h-7 rounded-lg bg-primary text-on-primary font-headline-sm text-headline-sm font-bold flex items-center justify-center text-[14px]">17</span>
                        <span class="font-label-sm text-label-sm text-on-surface font-bold uppercase tracking-wider">Senin</span>
                    </div>
                    <span class="px-1.5 py-0.5 rounded-full bg-primary-fixed text-on-primary-fixed font-label-sm text-[11px] font-semibold">3 Jadwal</span>
                </div>
                <div class="flex flex-col gap-space-xs flex-1">
                    <!-- Kuliah Pemrograman Web -->
                    <div class="group relative rounded-xl bg-surface-container-lowest p-space-sm shadow-sm border border-primary-fixed hover:border-primary hover:shadow-md transition-all">
                        <div class="flex items-center justify-between mb-1">
                            <span class="inline-flex items-center gap-1 font-label-sm text-label-sm px-2 py-0.5 rounded-md bg-primary-fixed text-on-primary-fixed font-semibold">
                                <span class="w-1.5 h-1.5 rounded-full bg-primary"></span>
                                08:00 - 11:30
                            </span>
                            <span class="material-symbols-outlined text-primary text-[18px]">school</span>
                        </div>
                        <h2 class="font-label-lg text-label-lg text-on-surface font-bold line-clamp-1">Pemrograman Web</h2>
                        <p class="font-body-sm text-body-sm text-on-surface-variant flex items-center gap-1 mt-0.5">
                            <span class="material-symbols-outlined text-[14px] text-secondary">location_on</span>
                            Lab Informatika 3 (IF-301)
                        </p>
                        <div class="mt-space-xs pt-space-xs border-t border-surface-container flex items-center justify-between text-on-surface-variant">
                            <span class="font-body-sm text-body-sm font-medium">3 SKS • Wajib</span>
                            <span class="font-label-sm text-label-sm text-tertiary font-semibold flex items-center gap-0.5"><span class="material-symbols-outlined text-[13px]">check_circle</span>Presensi 100%</span>
                        </div>
                    </div>
                    <!-- Slot Siap Kerja -->
                    <div class="group rounded-xl bg-primary-fixed/20 p-space-sm border border-primary-container/40 shadow-sm transition-all hover:bg-primary-fixed/30">
                        <div class="flex items-center justify-between mb-1">
                            <span class="font-label-sm text-label-sm px-2 py-0.5 rounded-md bg-surface-container-lowest text-primary font-bold shadow-sm">
                                11:30 - 15:30
                            </span>
                            <span class="material-symbols-outlined text-primary text-[18px]">bolt</span>
                        </div>
                        <h2 class="font-label-lg text-label-lg text-primary font-bold">Slot Siap Kerja (4 Jam)</h2>
                        <p class="font-body-sm text-body-sm text-on-surface-variant mt-0.5 leading-snug">
                            Terbuka untuk resto &amp; event area Sukolilo.
                        </p>
                        <a href="{{ route('mabu.lowongan') }}" class="w-full mt-space-xs py-1.5 rounded-lg bg-primary text-on-primary font-label-sm text-label-sm font-semibold hover:bg-primary-container transition-all flex items-center justify-center gap-1 shadow-sm">
                            <span class="material-symbols-outlined text-[14px]">send</span>
                            Tawarkan Slot Ini
                        </a>
                    </div>
                    <!-- Shift Barista -->
                    <div class="group rounded-xl bg-surface-container-lowest p-space-sm shadow-sm border border-tertiary-fixed hover:border-tertiary hover:shadow-md transition-all">
                        <div class="flex items-center justify-between mb-1">
                            <span class="inline-flex items-center gap-1 font-label-sm text-label-sm px-2 py-0.5 rounded-md bg-tertiary-fixed text-on-tertiary-fixed font-semibold">
                                <span class="w-1.5 h-1.5 rounded-full bg-tertiary"></span>
                                16:00 - 20:00
                            </span>
                            <span class="material-symbols-outlined text-tertiary text-[18px]">local_cafe</span>
                        </div>
                        <h2 class="font-label-lg text-label-lg text-on-surface font-bold line-clamp-1">Shift Barista Part-Time</h2>
                        <p class="font-body-sm text-body-sm text-on-surface-variant flex items-center gap-1 mt-0.5">
                            <span class="material-symbols-outlined text-[14px] text-secondary">store</span>
                            Kopi Kenangan Sukolilo
                        </p>
                        <div class="mt-space-xs flex items-center justify-between bg-surface-container-low px-2 py-1.5 rounded-lg">
                            <span class="font-label-sm text-label-sm text-tertiary font-bold">Rp 110.000</span>
                            <span class="font-body-sm text-body-sm text-on-surface-variant">4 Jam Shift</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- COLUMN 2: SELASA -->
            <div class="flex flex-col gap-space-sm bg-surface-container-low/50 rounded-2xl p-space-xs">
                <div class="flex items-center justify-between px-space-xs py-1.5 bg-surface-container-lowest rounded-xl shadow-sm border border-surface-container-high/40">
                    <div class="flex items-center gap-space-xs">
                        <span class="w-7 h-7 rounded-lg bg-surface-container-high text-on-surface font-headline-sm text-headline-sm font-bold flex items-center justify-center text-[14px]">18</span>
                        <span class="font-label-sm text-label-sm text-on-surface font-bold uppercase tracking-wider">Selasa</span>
                    </div>
                    <span class="px-1.5 py-0.5 rounded-full bg-primary-fixed text-on-primary-fixed font-label-sm text-[11px] font-semibold">3 Jadwal</span>
                </div>
                <div class="flex flex-col gap-space-xs flex-1">
                    <!-- Kuliah Basis Data Lanjut -->
                    <div class="group rounded-xl bg-surface-container-lowest p-space-sm shadow-sm border border-primary-fixed hover:border-primary hover:shadow-md transition-all">
                        <div class="flex items-center justify-between mb-1">
                            <span class="inline-flex items-center gap-1 font-label-sm text-label-sm px-2 py-0.5 rounded-md bg-primary-fixed text-on-primary-fixed font-semibold">
                                <span class="w-1.5 h-1.5 rounded-full bg-primary"></span>
                                09:00 - 12:00
                            </span>
                            <span class="material-symbols-outlined text-primary text-[18px]">school</span>
                        </div>
                        <h2 class="font-label-lg text-label-lg text-on-surface font-bold line-clamp-1">Basis Data Lanjut</h2>
                        <p class="font-body-sm text-body-sm text-on-surface-variant flex items-center gap-1 mt-0.5">
                            <span class="material-symbols-outlined text-[14px] text-secondary">meeting_room</span>
                            Ruang Sidang 2 IF
                        </p>
                        <div class="mt-space-xs pt-space-xs border-t border-surface-container flex items-center justify-between text-on-surface-variant">
                            <span class="font-body-sm text-body-sm font-medium">3 SKS</span>
                            <span class="font-label-sm text-label-sm text-on-surface-variant font-medium">Dr. Agus M.Kom</span>
                        </div>
                    </div>
                    <!-- Slot Mandiri Luang -->
                    <div class="group rounded-xl bg-primary-fixed/20 p-space-sm border border-primary-container/40 shadow-sm transition-all hover:bg-primary-fixed/30">
                        <div class="flex items-center justify-between mb-1">
                            <span class="font-label-sm text-label-sm px-2 py-0.5 rounded-md bg-surface-container-lowest text-primary font-bold shadow-sm">
                                13:00 - 18:00
                            </span>
                            <span class="material-symbols-outlined text-primary text-[18px]">laptop_chromebook</span>
                        </div>
                        <h2 class="font-label-lg text-label-lg text-primary font-bold">Slot Mandiri (5 Jam)</h2>
                        <p class="font-body-sm text-body-sm text-on-surface-variant mt-0.5 leading-snug">
                            Freelance web / data entry Perpustakaan ITS.
                        </p>
                        <div class="mt-space-xs flex items-center justify-between bg-surface-container-lowest px-2 py-1 rounded-lg border border-primary-fixed">
                            <span class="font-label-sm text-label-sm text-on-surface-variant">Estimasi:</span>
                            <span class="font-label-sm text-label-sm text-tertiary font-bold">Rp 125k - 175k</span>
                        </div>
                    </div>
                    <!-- Wawancara Online -->
                    <div class="group rounded-xl bg-surface-container-lowest p-space-sm shadow-sm border border-error-container hover:shadow-md transition-all">
                        <div class="flex items-center justify-between mb-1">
                            <span class="inline-flex items-center gap-1 font-label-sm text-label-sm px-2 py-0.5 rounded-md bg-error-container text-on-error-container font-semibold">
                                <span class="w-1.5 h-1.5 rounded-full bg-error"></span>
                                19:00 - 21:00
                            </span>
                            <span class="material-symbols-outlined text-error text-[18px]">videocam</span>
                        </div>
                        <h2 class="font-label-lg text-label-lg text-on-surface font-bold line-clamp-1">Wawancara Kasir Weekend</h2>
                        <p class="font-body-sm text-body-sm text-on-surface-variant flex items-center gap-1 mt-0.5">
                            <span class="material-symbols-outlined text-[14px] text-secondary">storefront</span>
                            Warkop Modern Klampis
                        </p>
                        <a class="mt-space-xs inline-flex items-center justify-center w-full py-1.5 rounded-lg bg-error text-on-error font-label-sm text-label-sm font-semibold shadow-sm hover:opacity-90 transition-all gap-1" href="{{ route('mabu.lamaran') }}">
                            <span class="material-symbols-outlined text-[14px]">video_call</span>
                            Buka Google Meet
                        </a>
                    </div>
                </div>
            </div>

            <!-- COLUMN 3: RABU -->
            <div class="flex flex-col gap-space-sm bg-surface-container-low/50 rounded-2xl p-space-xs">
                <div class="flex items-center justify-between px-space-xs py-1.5 bg-surface-container-lowest rounded-xl shadow-sm border border-surface-container-high/40">
                    <div class="flex items-center gap-space-xs">
                        <span class="w-7 h-7 rounded-lg bg-surface-container-high text-on-surface font-headline-sm text-headline-sm font-bold flex items-center justify-center text-[14px]">19</span>
                        <span class="font-label-sm text-label-sm text-on-surface font-bold uppercase tracking-wider">Rabu</span>
                    </div>
                    <span class="px-1.5 py-0.5 rounded-full bg-primary-fixed text-on-primary-fixed font-label-sm text-[11px] font-semibold">2 Jadwal</span>
                </div>
                <div class="flex flex-col gap-space-xs flex-1">
                    <!-- Kuliah Jarkom -->
                    <div class="group rounded-xl bg-surface-container-lowest p-space-sm shadow-sm border border-primary-fixed hover:border-primary hover:shadow-md transition-all">
                        <div class="flex items-center justify-between mb-1">
                            <span class="inline-flex items-center gap-1 font-label-sm text-label-sm px-2 py-0.5 rounded-md bg-primary-fixed text-on-primary-fixed font-semibold">
                                <span class="w-1.5 h-1.5 rounded-full bg-primary"></span>
                                08:00 - 10:30
                            </span>
                            <span class="material-symbols-outlined text-primary text-[18px]">school</span>
                        </div>
                        <h2 class="font-label-lg text-label-lg text-on-surface font-bold line-clamp-1">Jaringan Komputer</h2>
                        <p class="font-body-sm text-body-sm text-on-surface-variant flex items-center gap-1 mt-0.5">
                            <span class="material-symbols-outlined text-[14px] text-secondary">location_on</span>
                            Ruang 104 Gedung Tower ITS
                        </p>
                        <div class="mt-space-xs pt-space-xs border-t border-surface-container flex items-center justify-between text-on-surface-variant">
                            <span class="font-body-sm text-body-sm font-medium">3 SKS</span>
                            <span class="font-label-sm text-label-sm text-tertiary font-semibold flex items-center gap-0.5"><span class="material-symbols-outlined text-[13px]">file_download_done</span>Materi Siap</span>
                        </div>
                    </div>
                    <!-- Istirahat Kuliah -->
                    <div class="rounded-xl bg-surface-container-lowest/80 border border-surface-container-high p-space-xs flex items-center justify-between text-on-surface-variant">
                        <div class="flex items-center gap-1">
                            <span class="material-symbols-outlined text-[16px] text-secondary">restaurant</span>
                            <span class="font-label-sm text-[11px] font-medium">10:30 - 13:00 Jeda Makan &amp; Sholat</span>
                        </div>
                    </div>
                    <!-- Shift Barista Reguler -->
                    <div class="group rounded-xl bg-surface-container-lowest p-space-sm shadow-sm border border-tertiary-fixed hover:border-tertiary hover:shadow-md transition-all">
                        <div class="flex items-center justify-between mb-1">
                            <span class="inline-flex items-center gap-1 font-label-sm text-label-sm px-2 py-0.5 rounded-md bg-tertiary-fixed text-on-tertiary-fixed font-semibold">
                                <span class="w-1.5 h-1.5 rounded-full bg-tertiary"></span>
                                13:00 - 17:00
                            </span>
                            <span class="material-symbols-outlined text-tertiary text-[18px]">local_cafe</span>
                        </div>
                        <h2 class="font-label-lg text-label-lg text-on-surface font-bold line-clamp-1">Shift Barista Reguler</h2>
                        <p class="font-body-sm text-body-sm text-on-surface-variant flex items-center gap-1 mt-0.5">
                            <span class="material-symbols-outlined text-[14px] text-secondary">store</span>
                            Kopi Kenangan Sukolilo
                        </p>
                        <div class="mt-space-xs flex items-center justify-between bg-surface-container-low px-2 py-1.5 rounded-lg">
                            <span class="font-label-sm text-label-sm text-tertiary font-bold">Rp 110.000</span>
                            <span class="font-body-sm text-body-sm text-tertiary font-semibold flex items-center gap-0.5"><span class="material-symbols-outlined text-[13px]">verified</span>Terverifikasi</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- COLUMN 4: KAMIS -->
            <div class="flex flex-col gap-space-sm bg-surface-container-low/50 rounded-2xl p-space-xs">
                <div class="flex items-center justify-between px-space-xs py-1.5 bg-surface-container-lowest rounded-xl shadow-sm border border-surface-container-high/40">
                    <div class="flex items-center gap-space-xs">
                        <span class="w-7 h-7 rounded-lg bg-surface-container-high text-on-surface font-headline-sm text-headline-sm font-bold flex items-center justify-center text-[14px]">20</span>
                        <span class="font-label-sm text-label-sm text-on-surface font-bold uppercase tracking-wider">Kamis</span>
                    </div>
                    <span class="px-1.5 py-0.5 rounded-full bg-primary-fixed text-on-primary-fixed font-label-sm text-[11px] font-semibold">2 Jadwal</span>
                </div>
                <div class="flex flex-col gap-space-xs flex-1">
                    <!-- Praktikum Sistem Operasi -->
                    <div class="group rounded-xl bg-surface-container-lowest p-space-sm shadow-sm border border-primary-fixed hover:border-primary hover:shadow-md transition-all">
                        <div class="flex items-center justify-between mb-1">
                            <span class="inline-flex items-center gap-1 font-label-sm text-label-sm px-2 py-0.5 rounded-md bg-primary-fixed text-on-primary-fixed font-semibold">
                                <span class="w-1.5 h-1.5 rounded-full bg-primary"></span>
                                10:00 - 13:00
                            </span>
                            <span class="material-symbols-outlined text-primary text-[18px]">terminal</span>
                        </div>
                        <h2 class="font-label-lg text-label-lg text-on-surface font-bold line-clamp-1">Praktikum Sistem Operasi</h2>
                        <p class="font-body-sm text-body-sm text-on-surface-variant flex items-center gap-1 mt-0.5">
                            <span class="material-symbols-outlined text-[14px] text-secondary">location_on</span>
                            Lab Sistem Terdistribusi
                        </p>
                        <div class="mt-space-xs pt-space-xs border-t border-surface-container flex items-center justify-between text-on-surface-variant">
                            <span class="font-body-sm text-body-sm font-medium">Modul 3 (Demo)</span>
                            <span class="font-label-sm text-label-sm text-error font-bold">Wajib Hadir</span>
                        </div>
                    </div>
                    <!-- Slot Panjang Rekomendasi -->
                    <div class="group rounded-xl bg-primary-fixed/20 p-space-sm border border-primary-container/40 shadow-sm transition-all hover:bg-primary-fixed/30">
                        <div class="flex items-center justify-between mb-1">
                            <span class="font-label-sm text-label-sm px-2 py-0.5 rounded-md bg-surface-container-lowest text-primary font-bold shadow-sm">
                                14:00 - 21:00
                            </span>
                            <span class="material-symbols-outlined text-primary text-[18px]">recommend</span>
                        </div>
                        <div class="flex items-center gap-1">
                            <h2 class="font-label-lg text-label-lg text-primary font-bold">Slot Siap Kerja (7 Jam)</h2>
                        </div>
                        <p class="font-body-sm text-body-sm text-on-surface-variant mt-0.5 leading-snug">
                            Cocok untuk shift sore/malam resto Galaxy Mall.
                        </p>
                        <div class="mt-space-xs flex items-center justify-between bg-surface-container-lowest p-1.5 rounded-lg border border-primary-fixed">
                            <span class="font-body-sm text-body-sm text-on-surface-variant">Potensi:</span>
                            <span class="font-label-sm text-label-sm text-tertiary font-bold">Rp 175.000+</span>
                        </div>
                        <a href="{{ route('mabu.lowongan') }}" class="block text-center w-full mt-space-xs py-1.5 rounded-lg bg-primary text-on-primary font-label-sm text-label-sm font-semibold hover:bg-primary-container transition-all shadow-sm">
                            Lihat 4 Lowongan Pas
                        </a>
                    </div>
                </div>
            </div>

            <!-- COLUMN 5: JUMAT -->
            <div class="flex flex-col gap-space-sm bg-surface-container-low/50 rounded-2xl p-space-xs">
                <div class="flex items-center justify-between px-space-xs py-1.5 bg-surface-container-lowest rounded-xl shadow-sm border border-surface-container-high/40">
                    <div class="flex items-center gap-space-xs">
                        <span class="w-7 h-7 rounded-lg bg-surface-container-high text-on-surface font-headline-sm text-headline-sm font-bold flex items-center justify-center text-[14px]">21</span>
                        <span class="font-label-sm text-label-sm text-on-surface font-bold uppercase tracking-wider">Jumat</span>
                    </div>
                    <span class="px-1.5 py-0.5 rounded-full bg-primary-fixed text-on-primary-fixed font-label-sm text-[11px] font-semibold">2 Jadwal</span>
                </div>
                <div class="flex flex-col gap-space-xs flex-1">
                    <!-- Kuliah RPL -->
                    <div class="group rounded-xl bg-surface-container-lowest p-space-sm shadow-sm border border-primary-fixed hover:border-primary hover:shadow-md transition-all">
                        <div class="flex items-center justify-between mb-1">
                            <span class="inline-flex items-center gap-1 font-label-sm text-label-sm px-2 py-0.5 rounded-md bg-primary-fixed text-on-primary-fixed font-semibold">
                                <span class="w-1.5 h-1.5 rounded-full bg-primary"></span>
                                08:00 - 11:00
                            </span>
                            <span class="material-symbols-outlined text-primary text-[18px]">school</span>
                        </div>
                        <h2 class="font-label-lg text-label-lg text-on-surface font-bold line-clamp-1">Rekayasa Perangkat Lunak</h2>
                        <p class="font-body-sm text-body-sm text-on-surface-variant flex items-center gap-1 mt-0.5">
                            <span class="material-symbols-outlined text-[14px] text-secondary">location_on</span>
                            Ruang Teater IF
                        </p>
                        <div class="mt-space-xs pt-space-xs border-t border-surface-container flex items-center justify-between text-on-surface-variant">
                            <span class="font-body-sm text-body-sm font-medium">Sprint Review</span>
                            <span class="font-label-sm text-label-sm text-primary font-bold">Tugas Tim</span>
                        </div>
                    </div>
                    <!-- Istirahat Sholat Jumat -->
                    <div class="rounded-xl bg-surface-container-lowest/80 border border-surface-container-high p-space-xs flex items-center justify-between text-on-surface-variant">
                        <div class="flex items-center gap-1">
                            <span class="material-symbols-outlined text-[16px] text-secondary">mosque</span>
                            <span class="font-label-sm text-[11px] font-medium">11:00 - 13:30 Sholat Jumat Masjid ITS</span>
                        </div>
                    </div>
                    <!-- Slot Sore Santai -->
                    <div class="group rounded-xl bg-primary-fixed/20 p-space-sm border border-primary-container/40 shadow-sm transition-all hover:bg-primary-fixed/30">
                        <div class="flex items-center justify-between mb-1">
                            <span class="font-label-sm text-label-sm px-2 py-0.5 rounded-md bg-surface-container-lowest text-primary font-bold shadow-sm">
                                13:30 - 18:00
                            </span>
                            <span class="material-symbols-outlined text-primary text-[18px]">menu_book</span>
                        </div>
                        <h2 class="font-label-lg text-label-lg text-primary font-bold">Slot Sore Santai (4.5 Jam)</h2>
                        <p class="font-body-sm text-body-sm text-on-surface-variant mt-0.5 leading-snug">
                            Sangat pas untuk Les Privat SMA sekitar Manyar.
                        </p>
                        <div class="mt-space-xs flex items-center justify-between bg-surface-container-lowest px-2 py-1 rounded-lg border border-primary-fixed">
                            <span class="font-body-sm text-body-sm text-on-surface-variant">Status:</span>
                            <a href="{{ route('mabu.rekomendasi') }}" class="font-label-sm text-label-sm text-tertiary font-bold hover:underline">2 Rekomendasi</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- COLUMN 6: SABTU (WEEKEND) -->
            <div class="flex flex-col gap-space-sm bg-surface-container-low/50 rounded-2xl p-space-xs">
                <div class="flex items-center justify-between px-space-xs py-1.5 bg-surface-container-lowest rounded-xl shadow-sm border border-surface-container-high/40">
                    <div class="flex items-center gap-space-xs">
                        <span class="w-7 h-7 rounded-lg bg-tertiary-fixed text-on-tertiary-fixed font-headline-sm text-headline-sm font-bold flex items-center justify-center text-[14px]">22</span>
                        <span class="font-label-sm text-label-sm text-on-surface font-bold uppercase tracking-wider">Sabtu</span>
                    </div>
                    <span class="px-1.5 py-0.5 rounded-full bg-tertiary-fixed text-on-tertiary-fixed font-label-sm text-[11px] font-bold">Siap Kerja</span>
                </div>
                <div class="flex flex-col gap-space-xs flex-1">
                    <!-- Weekend Full-Day Shift -->
                    <div class="group rounded-xl bg-surface-container-lowest p-space-sm shadow-sm border border-tertiary-fixed hover:border-tertiary hover:shadow-md transition-all">
                        <div class="flex items-center justify-between mb-1">
                            <span class="inline-flex items-center gap-1 font-label-sm text-label-sm px-2 py-0.5 rounded-md bg-tertiary-fixed text-on-tertiary-fixed font-semibold">
                                <span class="w-1.5 h-1.5 rounded-full bg-tertiary"></span>
                                09:00 - 18:00
                            </span>
                            <span class="material-symbols-outlined text-tertiary text-[18px]">celebration</span>
                        </div>
                        <h2 class="font-label-lg text-label-lg text-on-surface font-bold line-clamp-1">Event Crew Bazar Surabaya</h2>
                        <p class="font-body-sm text-body-sm text-on-surface-variant flex items-center gap-1 mt-0.5">
                            <span class="material-symbols-outlined text-[14px] text-secondary">pin_drop</span>
                            Grand City Convex
                        </p>
                        <div class="mt-space-xs flex items-center justify-between bg-surface-container-low px-2 py-1.5 rounded-lg">
                            <span class="font-label-sm text-label-sm text-tertiary font-bold">Rp 200.000</span>
                            <span class="font-body-sm text-body-sm text-on-surface-variant font-medium">+ Uang Makan</span>
                        </div>
                    </div>
                    <!-- Slot Malam Luang -->
                    <div class="rounded-xl bg-surface-container-lowest/80 border border-surface-container-high p-space-xs flex items-center justify-between text-on-surface-variant">
                        <div class="flex items-center gap-1">
                            <span class="material-symbols-outlined text-[16px] text-secondary">bedtime</span>
                            <span class="font-label-sm text-[11px] font-medium">19:00 - 22:00 Waktu Nobar / Istirahat</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- COLUMN 7: MINGGU -->
            <div class="flex flex-col gap-space-sm bg-surface-container-low/50 rounded-2xl p-space-xs">
                <div class="flex items-center justify-between px-space-xs py-1.5 bg-surface-container-lowest rounded-xl shadow-sm border border-surface-container-high/40">
                    <div class="flex items-center gap-space-xs">
                        <span class="w-7 h-7 rounded-lg bg-surface-container-high text-on-surface font-headline-sm text-headline-sm font-bold flex items-center justify-center text-[14px]">23</span>
                        <span class="font-label-sm text-label-sm text-on-surface font-bold uppercase tracking-wider">Minggu</span>
                    </div>
                    <span class="px-1.5 py-0.5 rounded-full bg-secondary-container text-on-secondary-container font-label-sm text-[11px] font-semibold">Review</span>
                </div>
                <div class="flex flex-col gap-space-xs flex-1">
                    <!-- Belajar Santai & Review Matkul -->
                    <div class="group rounded-xl bg-surface-container-lowest p-space-sm shadow-sm border border-secondary-container hover:shadow-md transition-all">
                        <div class="flex items-center justify-between mb-1">
                            <span class="inline-flex items-center gap-1 font-label-sm text-label-sm px-2 py-0.5 rounded-md bg-secondary-container text-on-secondary-container font-semibold">
                                <span class="w-1.5 h-1.5 rounded-full bg-secondary"></span>
                                09:00 - 12:00
                            </span>
                            <span class="material-symbols-outlined text-secondary text-[18px]">menu_book</span>
                        </div>
                        <h2 class="font-label-lg text-label-lg text-on-surface font-bold line-clamp-1">Review Modul &amp; Coding</h2>
                        <p class="font-body-sm text-body-sm text-on-surface-variant flex items-center gap-1 mt-0.5">
                            <span class="material-symbols-outlined text-[14px] text-secondary">home</span>
                            Kost Sukolilo Gebang
                        </p>
                        <div class="mt-space-xs pt-space-xs border-t border-surface-container flex items-center justify-between text-on-surface-variant">
                            <span class="font-body-sm text-body-sm font-medium">Fokus Mandiri</span>
                            <span class="font-label-sm text-label-sm text-primary font-bold">Persiapan Demo</span>
                        </div>
                    </div>
                    <!-- Slot Cadangan -->
                    <div class="group rounded-xl bg-primary-fixed/20 p-space-sm border border-primary-container/40 shadow-sm transition-all hover:bg-primary-fixed/30">
                        <div class="flex items-center justify-between mb-1">
                            <span class="font-label-sm text-label-sm px-2 py-0.5 rounded-md bg-surface-container-lowest text-primary font-bold shadow-sm">
                                13:00 - 17:00
                            </span>
                            <span class="material-symbols-outlined text-primary text-[18px]">more_time</span>
                        </div>
                        <h2 class="font-label-lg text-label-lg text-primary font-bold">Slot Cadangan Part-Time</h2>
                        <p class="font-body-sm text-body-sm text-on-surface-variant mt-0.5 leading-snug">
                            Panggilan pengganti barista darurat / freelance online.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bottom Analytics & Quick Add Split Panel -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-space-lg">
        <!-- Panel 1: Distribusi Komitmen & Keseimbangan Hidup (7 Cols) -->
        <div class="lg:col-span-7 bg-surface-container-lowest rounded-2xl p-space-lg shadow-sm border border-surface-container-high/60 flex flex-col justify-between gap-space-md">
            <div class="flex flex-col gap-space-xs">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-space-xs">
                        <span class="material-symbols-outlined text-primary text-[26px]">donut_large</span>
                        <h3 class="font-headline-sm text-headline-sm text-on-surface font-bold">Distribusi Komitmen Mingguan</h3>
                    </div>
                    <span class="px-space-sm py-0.5 rounded-full bg-tertiary-fixed text-on-tertiary-fixed font-label-sm text-label-sm font-bold flex items-center gap-1">
                        <span class="w-1.5 h-1.5 rounded-full bg-tertiary"></span>
                        Optimal &amp; Aman
                    </span>
                </div>
                <p class="font-body-md text-body-md text-on-surface-variant leading-relaxed">
                    Perbandingan beban perkuliahan ITS dengan alokasi shift kerja paruh waktu untuk menjaga performa akademik dan kesehatan mental.
                </p>
            </div>
            <!-- Graphical Bar Ratio Visual -->
            <div class="flex flex-col gap-space-xs">
                <div class="flex justify-between font-label-md text-label-md">
                    <span class="text-on-surface font-semibold">Total Waktu Aktif: 54 Jam / Minggu</span>
                    <span class="text-tertiary font-bold">55% Terjadwal (Sangat Sehat)</span>
                </div>
                <!-- Stacked Progress Bar -->
                <div class="w-full h-3.5 rounded-full bg-surface-container overflow-hidden flex shadow-inner p-0.5">
                    <div class="h-full bg-primary rounded-l-full" style="width: 33.3%" title="Kuliah ITS: 18 Jam"></div>
                    <div class="h-full bg-tertiary ml-0.5" style="width: 22.2%" title="Shift Kerja Part-Time: 12 Jam"></div>
                    <div class="h-full bg-primary-container/40 rounded-r-full ml-0.5" style="width: 44.5%" title="Slot Siap Kerja: 24 Jam"></div>
                </div>
                <!-- Numeric Breakdowns -->
                <div class="grid grid-cols-3 gap-space-xs pt-space-xs">
                    <div class="flex flex-col p-space-xs rounded-xl bg-surface-container-low border border-primary-fixed/50">
                        <span class="flex items-center gap-1.5 font-label-sm text-label-sm text-primary font-bold">
                            <span class="w-2.5 h-2.5 rounded-full bg-primary"></span> 18 Jam (33%)
                        </span>
                        <span class="font-body-sm text-body-sm text-on-surface-variant mt-0.5 font-medium">Kuliah &amp; Praktikum</span>
                    </div>
                    <div class="flex flex-col p-space-xs rounded-xl bg-surface-container-low border border-tertiary-fixed/50">
                        <span class="flex items-center gap-1.5 font-label-sm text-label-sm text-tertiary font-bold">
                            <span class="w-2.5 h-2.5 rounded-full bg-tertiary"></span> 12 Jam (22%)
                        </span>
                        <span class="font-body-sm text-body-sm text-on-surface-variant mt-0.5 font-medium">Kerja Aktif Berbayar</span>
                    </div>
                    <div class="flex flex-col p-space-xs rounded-xl bg-surface-container-low border border-surface-container-high">
                        <span class="flex items-center gap-1.5 font-label-sm text-label-sm text-on-surface font-bold">
                            <span class="w-2.5 h-2.5 rounded-full bg-primary-container"></span> 24 Jam (45%)
                        </span>
                        <span class="font-body-sm text-body-sm text-on-surface-variant mt-0.5 font-medium">Siap Ditawarkan</span>
                    </div>
                </div>
            </div>
            <!-- Life Balance Insight Card -->
            <div class="flex items-start gap-space-sm p-space-md rounded-2xl bg-tertiary-fixed/20 border border-tertiary-fixed-dim/40">
                <div class="w-10 h-10 rounded-xl bg-tertiary-fixed flex items-center justify-center shrink-0">
                    <span class="material-symbols-outlined text-on-tertiary-fixed text-[22px]">health_and_safety</span>
                </div>
                <div class="flex flex-col">
                    <span class="font-label-lg text-label-lg text-on-surface font-bold">Jadwal Anda Sangat Seimbang &amp; Bebas Bentrok!</span>
                    <p class="font-body-sm text-body-sm text-on-surface-variant mt-0.5 leading-relaxed">
                        Beban kerja part-time Anda teralokasi tepat di luar jam praktikum dan kuliah inti. Anda masih memiliki rata-rata waktu istirahat 7.5 jam/hari serta 15 jam belajar mandiri mingguan.
                    </p>
                </div>
            </div>
        </div>

        <!-- Panel 2: Tambah Jadwal Cepat (5 Cols) -->
        <div class="lg:col-span-5 bg-surface-container-lowest rounded-2xl p-space-lg shadow-sm border border-surface-container-high/60 flex flex-col justify-between">
            <div class="flex items-center justify-between mb-space-sm">
                <div class="flex items-center gap-space-xs">
                    <span class="material-symbols-outlined text-primary text-[24px]">edit_calendar</span>
                    <h3 class="font-headline-sm text-headline-sm text-on-surface font-bold">Tambah Jadwal Cepat</h3>
                </div>
                <span class="font-body-sm text-body-sm text-primary font-semibold bg-primary-fixed/40 px-space-xs py-0.5 rounded-full">Formulir Instan</span>
            </div>
            <form class="flex flex-col gap-space-sm" id="quickAddForm">
                <div>
                    <label class="block font-label-sm text-label-sm text-on-surface-variant mb-1 font-semibold">Nama Mata Kuliah / Agenda / Shift</label>
                    <input class="w-full bg-surface-container-low rounded-xl p-space-xs px-space-sm font-body-sm text-body-sm text-on-surface placeholder:text-outline border border-surface-container-high focus:outline-none focus:border-primary transition-colors" placeholder="Cth: Praktikum Grafika Komputer / Shift Barista" required="" type="text"/>
                </div>
                <div class="grid grid-cols-2 gap-space-sm">
                    <div>
                        <label class="block font-label-sm text-label-sm text-on-surface-variant mb-1 font-semibold">Kategori Kegiatan</label>
                        <select class="w-full bg-surface-container-low rounded-xl p-space-xs px-space-sm font-body-sm text-body-sm text-on-surface border border-surface-container-high focus:outline-none focus:border-primary transition-colors">
                            <option value="kuliah">Kuliah ITS (Wajib)</option>
                            <option value="kerja">Shift Kerja Part-Time</option>
                            <option value="luang">Slot Siap Ditawarkan</option>
                            <option value="wawancara">Wawancara / Ujian</option>
                        </select>
                    </div>
                    <div>
                        <label class="block font-label-sm text-label-sm text-on-surface-variant mb-1 font-semibold">Pilih Hari</label>
                        <select class="w-full bg-surface-container-low rounded-xl p-space-xs px-space-sm font-body-sm text-body-sm text-on-surface border border-surface-container-high focus:outline-none focus:border-primary transition-colors">
                            <option value="senin">Senin</option>
                            <option value="selasa">Selasa</option>
                            <option value="rabu">Rabu</option>
                            <option value="kamis">Kamis</option>
                            <option value="jumat">Jumat</option>
                            <option value="sabtu">Sabtu</option>
                            <option value="minggu">Minggu</option>
                        </select>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-space-sm">
                    <div>
                        <label class="block font-label-sm text-label-sm text-on-surface-variant mb-1 font-semibold">Jam Mulai</label>
                        <input class="w-full bg-surface-container-low rounded-xl p-space-xs px-space-sm font-body-sm text-body-sm text-on-surface border border-surface-container-high focus:outline-none focus:border-primary transition-colors" type="time" value="08:00"/>
                    </div>
                    <div>
                        <label class="block font-label-sm text-label-sm text-on-surface-variant mb-1 font-semibold">Jam Selesai</label>
                        <input class="w-full bg-surface-container-low rounded-xl p-space-xs px-space-sm font-body-sm text-body-sm text-on-surface border border-surface-container-high focus:outline-none focus:border-primary transition-colors" type="time" value="10:30"/>
                    </div>
                </div>
                <div>
                    <label class="block font-label-sm text-label-sm text-on-surface-variant mb-1 font-semibold">Ruangan / Lokasi Gedung</label>
                    <input class="w-full bg-surface-container-low rounded-xl p-space-xs px-space-sm font-body-sm text-body-sm text-on-surface placeholder:text-outline border border-surface-container-high focus:outline-none focus:border-primary transition-colors" placeholder="Cth: Gedung Teknik Informatika IF-105" type="text"/>
                </div>
                <button class="mt-space-xs w-full py-space-sm rounded-xl bg-primary text-on-primary font-label-lg text-label-lg font-bold shadow-sm hover:bg-primary-container active:scale-[0.99] transition-all flex items-center justify-center gap-space-xs" type="submit">
                    <span class="material-symbols-outlined text-[18px]">save</span>
                    <span>Simpan ke Kalender</span>
                </button>
            </form>
        </div>
    </div>

    <!-- Interactive Modal: Input Jadwal Kuliah Baru -->
    <div class="fixed inset-0 z-50 flex items-center justify-center bg-inverse-surface/40 backdrop-blur-sm hidden opacity-0 transition-opacity duration-300" id="scheduleModal">
        <div class="relative w-full max-w-lg mx-space-md bg-surface-container-lowest rounded-2xl shadow-2xl p-space-lg transform scale-95 transition-transform duration-300 flex flex-col gap-space-md">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-space-xs">
                    <div class="w-10 h-10 rounded-xl bg-primary-fixed flex items-center justify-center">
                        <span class="material-symbols-outlined text-on-primary-fixed text-[22px]">calendar_add_on</span>
                    </div>
                    <div>
                        <h3 class="font-headline-sm text-headline-sm text-on-surface">Input Jadwal Kuliah Baru</h3>
                        <p class="font-body-sm text-body-sm text-on-surface-variant">Sistem ITS SIM-Akademik Terpadu</p>
                    </div>
                </div>
                <button type="button" class="w-8 h-8 rounded-full flex items-center justify-center text-on-surface-variant hover:bg-surface-container transition-colors" id="closeModalBtn">
                    <span class="material-symbols-outlined text-[20px]">close</span>
                </button>
            </div>
            <div class="flex flex-col gap-space-sm">
                <div>
                    <label class="block font-label-sm text-label-sm text-on-surface-variant mb-1">Mata Kuliah</label>
                    <input class="w-full bg-surface-container-low rounded-lg p-space-xs px-space-sm font-body-sm text-body-sm text-on-surface focus:outline-none focus:bg-surface-container shadow-sm" placeholder="Cth: Kecerdasan Buatan (Artificial Intelligence)" type="text"/>
                </div>
                <div class="grid grid-cols-2 gap-space-sm">
                    <div>
                        <label class="block font-label-sm text-label-sm text-on-surface-variant mb-1">Jumlah SKS</label>
                        <input class="w-full bg-surface-container-low rounded-lg p-space-xs px-space-sm font-body-sm text-body-sm text-on-surface focus:outline-none focus:bg-surface-container shadow-sm" max="6" min="1" type="number" value="3"/>
                    </div>
                    <div>
                        <label class="block font-label-sm text-label-sm text-on-surface-variant mb-1">Hari Perkuliahan</label>
                        <select class="w-full bg-surface-container-low rounded-lg p-space-xs px-space-sm font-body-sm text-body-sm text-on-surface focus:outline-none focus:bg-surface-container shadow-sm">
                            <option>Senin</option>
                            <option>Selasa</option>
                            <option>Rabu</option>
                            <option>Kamis</option>
                            <option>Jumat</option>
                        </select>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-space-sm">
                    <div>
                        <label class="block font-label-sm text-label-sm text-on-surface-variant mb-1">Waktu Mulai</label>
                        <input class="w-full bg-surface-container-low rounded-lg p-space-xs px-space-sm font-body-sm text-body-sm text-on-surface focus:outline-none focus:bg-surface-container shadow-sm" type="time" value="13:30"/>
                    </div>
                    <div>
                        <label class="block font-label-sm text-label-sm text-on-surface-variant mb-1">Waktu Selesai</label>
                        <input class="w-full bg-surface-container-low rounded-lg p-space-xs px-space-sm font-body-sm text-body-sm text-on-surface focus:outline-none focus:bg-surface-container shadow-sm" type="time" value="16:00"/>
                    </div>
                </div>
                <div class="p-space-xs rounded-xl bg-surface-container-high/60 flex items-center gap-space-xs">
                    <span class="material-symbols-outlined text-primary text-[20px]">info</span>
                    <span class="font-body-sm text-body-sm text-on-surface-variant">Slot waktu ini otomatis diproteksi agar tidak bentrok dengan tawaran kerja part-time.</span>
                </div>
            </div>
            <div class="flex items-center justify-end gap-space-xs mt-space-xs">
                <button type="button" class="px-space-md py-space-sm rounded-full bg-surface-container text-on-surface font-label-lg text-label-lg hover:bg-surface-container-high transition-colors" id="cancelModalBtn">
                    Batal
                </button>
                <button type="button" class="px-space-md py-space-sm rounded-full bg-primary text-on-primary font-label-lg text-label-lg hover:bg-primary-container shadow-sm transition-colors" id="saveModalBtn">
                    Tambahkan Jadwal
                </button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    (function () {
        const openModalBtn = document.getElementById('openModalBtn');
        const closeModalBtn = document.getElementById('closeModalBtn');
        const cancelModalBtn = document.getElementById('cancelModalBtn');
        const saveModalBtn = document.getElementById('saveModalBtn');
        const modal = document.getElementById('scheduleModal');
        const quickAddForm = document.getElementById('quickAddForm');

        function openModal() {
            modal.classList.remove('hidden');
            setTimeout(() => {
                modal.classList.remove('opacity-0');
                modal.children[0].classList.remove('scale-95');
                modal.children[0].classList.add('scale-100');
            }, 10);
        }

        function closeModal() {
            modal.classList.add('opacity-0');
            modal.children[0].classList.remove('scale-100');
            modal.children[0].classList.add('scale-95');
            setTimeout(() => {
                modal.classList.add('hidden');
            }, 200);
        }

        if (openModalBtn) openModalBtn.addEventListener('click', openModal);
        if (closeModalBtn) closeModalBtn.addEventListener('click', closeModal);
        if (cancelModalBtn) cancelModalBtn.addEventListener('click', closeModal);
        if (saveModalBtn) saveModalBtn.addEventListener('click', () => {
            closeModal();
        });

        if (quickAddForm) {
            quickAddForm.addEventListener('submit', (e) => {
                e.preventDefault();
                const btn = quickAddForm.querySelector('button[type="submit"]');
                const originalHTML = btn.innerHTML;
                btn.innerHTML = '<span class="material-symbols-outlined text-[18px]">check_circle</span><span>Tersimpan!</span>';
                btn.classList.add('bg-tertiary');
                btn.classList.remove('bg-primary');
                setTimeout(() => {
                    btn.innerHTML = originalHTML;
                    btn.classList.remove('bg-tertiary');
                    btn.classList.add('bg-primary');
                    quickAddForm.reset();
                }, 1800);
            });
        }
    })();
</script>
@endpush
