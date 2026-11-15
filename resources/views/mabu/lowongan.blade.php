@extends('layouts.mabu')

@section('title', 'Cari Lowongan - MABU')

@section('content')
<div class="flex flex-col w-full gap-space-xl">
    <!-- Top Banner: SIAKAD Sync & Smart Matching Intelligence -->
    <section class="relative overflow-hidden rounded-2xl bg-gradient-to-r from-primary to-primary-container p-space-lg md:p-space-xl text-on-primary shadow-xl">
        <div class="absolute -right-16 -top-16 w-80 h-80 rounded-full bg-white/10 blur-2xl pointer-events-none"></div>
        <div class="absolute right-32 -bottom-20 w-64 h-64 rounded-full bg-tertiary-fixed/20 blur-xl pointer-events-none"></div>
        <div class="relative z-10 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-space-lg">
            <div class="flex flex-col gap-space-xs max-w-2xl">
                <div class="inline-flex items-center gap-space-xs px-3 py-1 rounded-full bg-white/15 backdrop-blur-md w-fit">
                    <span class="w-2 h-2 rounded-full bg-tertiary-fixed animate-ping"></span>
                    <span class="font-label-sm text-label-sm text-tertiary-fixed tracking-wide uppercase">SIAKAD ITS Terhubung (Genap 2024/2025)</span>
                </div>
                <h1 class="font-headline-lg text-headline-lg tracking-tight text-white mt-1">
                    34 Lowongan Bebas Bentrok Jadwal Kampus
                </h1>
                <p class="font-body-md text-body-md text-on-primary-container leading-relaxed">
                    Algoritma MABU telah memfilter ribuan shift berdasarkan KRS terbaru Anda di Teknik Informatika ITS. <span class="font-bold text-white">0 jadwal bentrok</span> dengan praktikum fisika &amp; lab komputasi!
                </p>
            </div>
            <!-- Quick Metrics & Actions -->
            <div class="flex flex-wrap items-center gap-space-sm sm:gap-space-md shrink-0">
                <div class="flex items-center gap-space-sm bg-white/10 backdrop-blur-md px-space-md py-space-sm rounded-xl">
                    <span class="material-symbols-outlined text-tertiary-fixed text-[26px]">near_me</span>
                    <div class="flex flex-col">
                        <span class="font-label-sm text-label-sm uppercase tracking-wider text-on-primary-container">Area Terfokus</span>
                        <span class="font-label-lg text-label-lg text-white">Radius Sukolilo &lt; 2.5 km</span>
                    </div>
                </div>
                <button class="flex items-center gap-space-xs px-space-md py-space-sm bg-surface-container-lowest text-primary rounded-full font-label-lg text-label-lg shadow-md hover:bg-surface-container-low transition-all active:scale-95" id="btn-sync" onclick="syncSchedule()">
                    <span class="material-symbols-outlined text-[18px]" id="sync-icon">sync</span>
                    <span id="sync-text">Sinkron Ulang KRS</span>
                </button>
            </div>
        </div>
    </section>

    <!-- Filter & Search Command Center -->
    <section class="flex flex-col gap-space-md bg-surface-container-lowest p-space-md md:p-space-lg rounded-2xl shadow-sm">
        <!-- Top Search and Dynamic Dropdowns -->
        <div class="grid grid-cols-1 md:grid-cols-12 gap-space-sm md:gap-space-md items-center">
            <!-- Search Field -->
            <div class="md:col-span-5 relative">
                <div class="flex items-center w-full bg-surface-container-low rounded-full px-space-md py-space-xs focus-within:ring-2 focus-within:ring-primary/40 transition-all">
                    <span class="material-symbols-outlined text-outline text-[20px] mr-space-sm">search</span>
                    <input class="w-full bg-transparent font-body-md text-body-md text-on-surface placeholder:text-outline focus:outline-none" id="job-search-input" oninput="handleSearch(this.value)" placeholder="Cari posisi, toko, barista, admin olshop..." type="text"/>
                    <button class="text-outline hover:text-on-surface p-1" onclick="document.getElementById('job-search-input').value=''; handleSearch('')" title="Hapus pencarian" type="button">
                        <span class="material-symbols-outlined text-[18px]">close</span>
                    </button>
                </div>
            </div>
            <!-- Filters Pill Controls -->
            <div class="md:col-span-7 flex flex-wrap items-center justify-start md:justify-end gap-space-xs sm:gap-space-sm">
                <!-- Radius Filter -->
                <div class="relative">
                    <button class="flex items-center gap-space-xs px-3.5 py-2 rounded-full bg-surface-container text-on-surface-variant font-label-md text-label-md hover:bg-surface-container-high transition-colors" onclick="toggleDropdown('dropdown-radius')" type="button">
                        <span class="material-symbols-outlined text-[18px] text-primary">distance</span>
                        <span>&lt; 2 km dari ITS</span>
                        <span class="material-symbols-outlined text-[16px]">expand_more</span>
                    </button>
                    <div class="hidden absolute right-0 mt-2 w-48 bg-surface-container-lowest rounded-xl shadow-xl z-30 p-2 border-none" id="dropdown-radius">
                        <button class="w-full text-left px-3 py-1.5 rounded-lg text-body-sm font-body-sm hover:bg-surface-container" onclick="selectRadius('&lt; 1 km (Jalan Kaki)')" type="button">&lt; 1 km (Jalan Kaki)</button>
                        <button class="w-full text-left px-3 py-1.5 rounded-lg text-body-sm font-body-sm font-semibold text-primary bg-surface-container" onclick="selectRadius('&lt; 2 km dari ITS')" type="button">&lt; 2 km (Radius Utama)</button>
                        <button class="w-full text-left px-3 py-1.5 rounded-lg text-body-sm font-body-sm hover:bg-surface-container" onclick="selectRadius('&lt; 5 km (Surabaya Timur)')" type="button">&lt; 5 km (Surabaya Timur)</button>
                    </div>
                </div>
                <!-- Shift Type Filter -->
                <div class="relative">
                    <button class="flex items-center gap-space-xs px-3.5 py-2 rounded-full bg-surface-container text-on-surface-variant font-label-md text-label-md hover:bg-surface-container-high transition-colors" onclick="toggleDropdown('dropdown-shift')" type="button">
                        <span class="material-symbols-outlined text-[18px] text-primary">schedule</span>
                        <span>Shift Sore / Fleksibel</span>
                        <span class="material-symbols-outlined text-[16px]">expand_more</span>
                    </button>
                    <div class="hidden absolute right-0 mt-2 w-52 bg-surface-container-lowest rounded-xl shadow-xl z-30 p-2" id="dropdown-shift">
                        <button class="w-full text-left px-3 py-1.5 rounded-lg text-body-sm font-body-sm hover:bg-surface-container" type="button">Semua Jadwal Shift</button>
                        <button class="w-full text-left px-3 py-1.5 rounded-lg text-body-sm font-body-sm font-semibold text-primary bg-surface-container" type="button">Shift Sore (16.00+)</button>
                        <button class="w-full text-left px-3 py-1.5 rounded-lg text-body-sm font-body-sm hover:bg-surface-container" type="button">Shift Malam (19.00+)</button>
                        <button class="w-full text-left px-3 py-1.5 rounded-lg text-body-sm font-body-sm hover:bg-surface-container" type="button">Hanya Akhir Pekan (Weekend)</button>
                    </div>
                </div>
                <!-- Salary Filter -->
                <div class="relative">
                    <button class="flex items-center gap-space-xs px-3.5 py-2 rounded-full bg-surface-container text-on-surface-variant font-label-md text-label-md hover:bg-surface-container-high transition-colors" onclick="toggleDropdown('dropdown-salary')" type="button">
                        <span class="material-symbols-outlined text-[18px] text-primary">payments</span>
                        <span>Gaji Harian / Shift</span>
                        <span class="material-symbols-outlined text-[16px]">expand_more</span>
                    </button>
                    <div class="hidden absolute right-0 mt-2 w-48 bg-surface-container-lowest rounded-xl shadow-xl z-30 p-2" id="dropdown-salary">
                        <button class="w-full text-left px-3 py-1.5 rounded-lg text-body-sm font-body-sm font-semibold text-primary bg-surface-container" type="button">Semua Rentang Gaji</button>
                        <button class="w-full text-left px-3 py-1.5 rounded-lg text-body-sm font-body-sm hover:bg-surface-container" type="button">&gt; Rp 80.000 / shift</button>
                        <button class="w-full text-left px-3 py-1.5 rounded-lg text-body-sm font-body-sm hover:bg-surface-container" type="button">&gt; Rp 120.000 / shift</button>
                        <button class="w-full text-left px-3 py-1.5 rounded-lg text-body-sm font-body-sm hover:bg-surface-container" type="button">&gt; Rp 1.5 Jt / bulan</button>
                    </div>
                </div>
                <!-- Sorting -->
                <div class="relative">
                    <button class="flex items-center gap-space-xs px-3.5 py-2 rounded-full bg-primary-fixed text-on-primary-fixed font-label-md text-label-md shadow-sm" type="button">
                        <span class="material-symbols-outlined text-[18px]">tune</span>
                        <span>Paling Cocok Jadwal</span>
                    </button>
                </div>
            </div>
        </div>

        <!-- Quick Category Badges Bar -->
        <div class="flex items-center gap-space-xs sm:gap-space-sm overflow-x-auto pb-1 scrollbar-none pt-space-xs">
            <button class="category-pill shrink-0 flex items-center gap-1.5 px-4 py-1.5 rounded-full bg-primary text-on-primary font-label-md text-label-md transition-all shadow-sm" onclick="filterCategory('all', this)" type="button">
                <span>Semua Lowongan</span>
                <span class="bg-white/25 px-1.5 py-0.2 rounded-full text-label-sm">34</span>
            </button>
            <button class="category-pill shrink-0 flex items-center gap-1.5 px-4 py-1.5 rounded-full bg-surface-container-low text-on-surface-variant font-label-md text-label-md hover:bg-surface-container transition-all" onclick="filterCategory('warkop', this)" type="button">
                <span>☕ Warkop &amp; Kafe</span>
                <span class="bg-surface-variant text-on-surface px-1.5 py-0.2 rounded-full text-label-sm">14</span>
            </button>
            <button class="category-pill shrink-0 flex items-center gap-1.5 px-4 py-1.5 rounded-full bg-surface-container-low text-on-surface-variant font-label-md text-label-md hover:bg-surface-container transition-all" onclick="filterCategory('booth', this)" type="button">
                <span>🧋 Booth &amp; Minuman Es</span>
                <span class="bg-surface-variant text-on-surface px-1.5 py-0.2 rounded-full text-label-sm">8</span>
            </button>
            <button class="category-pill shrink-0 flex items-center gap-1.5 px-4 py-1.5 rounded-full bg-surface-container-low text-on-surface-variant font-label-md text-label-md hover:bg-surface-container transition-all" onclick="filterCategory('admin', this)" type="button">
                <span>📦 Admin &amp; Olshop Rumahan</span>
                <span class="bg-surface-variant text-on-surface px-1.5 py-0.2 rounded-full text-label-sm">5</span>
            </button>
            <button class="category-pill shrink-0 flex items-center gap-1.5 px-4 py-1.5 rounded-full bg-surface-container-low text-on-surface-variant font-label-md text-label-md hover:bg-surface-container transition-all" onclick="filterCategory('tutor', this)" type="button">
                <span>📚 Tutor &amp; Guru Les</span>
                <span class="bg-surface-variant text-on-surface px-1.5 py-0.2 rounded-full text-label-sm">4</span>
            </button>
            <button class="category-pill shrink-0 flex items-center gap-1.5 px-4 py-1.5 rounded-full bg-surface-container-low text-on-surface-variant font-label-md text-label-md hover:bg-surface-container transition-all" onclick="filterCategory('event', this)" type="button">
                <span>🎪 Event Crew</span>
                <span class="bg-surface-variant text-on-surface px-1.5 py-0.2 rounded-full text-label-sm">3</span>
            </button>
        </div>
    </section>

    <!-- Job Cards 3-Column Grid -->
    <section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-space-lg w-full" id="job-cards-grid">
        <!-- Card 1: Warkop Kopi Titik Gebang -->
        <article class="job-card group flex flex-col justify-between bg-surface-container-lowest rounded-2xl p-space-lg shadow-sm hover:shadow-xl transition-all duration-300 relative overflow-hidden" data-category="warkop">
            <div class="absolute top-0 left-0 right-0 h-1.5 bg-primary"></div>
            <div class="flex flex-col gap-space-md">
                <div class="flex items-start justify-between gap-space-sm">
                    <div class="flex items-center gap-space-sm">
                        <div class="w-12 h-12 rounded-xl bg-surface-container-high flex items-center justify-center shrink-0 overflow-hidden text-primary">
                            <span class="material-symbols-outlined text-[26px]">coffee</span>
                        </div>
                        <div class="flex flex-col min-w-0">
                            <span class="font-headline-sm text-headline-sm text-on-surface truncate">Warkop Kopi Titik</span>
                            <div class="flex items-center gap-1 text-on-surface-variant font-body-sm text-body-sm">
                                <span class="material-symbols-outlined text-[15px] text-error">pin_drop</span>
                                <span class="truncate">Gebang Putih • 450m dari ITS</span>
                            </div>
                        </div>
                    </div>
                    <button class="text-outline hover:text-primary transition-colors p-1 rounded-full hover:bg-surface-container-low" onclick="toggleBookmark(this)" title="Simpan lowongan" type="button">
                        <span class="material-symbols-outlined text-[20px]">bookmark</span>
                    </button>
                </div>
                <div class="flex flex-col gap-1">
                    <h2 class="font-headline-sm text-headline-sm text-primary group-hover:text-primary-container transition-colors">
                        Barista &amp; Kasir Shift Sore
                    </h2>
                    <div class="flex items-center gap-2 text-on-surface-variant font-label-md text-label-md">
                        <span class="material-symbols-outlined text-[16px]">schedule</span>
                        <span>16.30 - 21.30 WIB (5 Jam/Shift)</span>
                        <span>•</span>
                        <span>4 Hari/Minggu</span>
                    </div>
                </div>
                <div class="flex items-center gap-2 px-3 py-1.5 rounded-xl bg-tertiary-fixed/30 text-on-tertiary-fixed-variant font-label-sm text-label-sm">
                    <span class="material-symbols-outlined text-[16px] text-tertiary">verified</span>
                    <span class="truncate">100% Bebas Kuliah • Selesai 1.5 jam pasca praktikum</span>
                </div>
                <div class="flex items-baseline justify-between bg-surface-container-low px-space-md py-2.5 rounded-xl">
                    <span class="font-body-sm text-body-sm text-on-surface-variant">Estimasi Upah</span>
                    <div class="flex items-baseline gap-1">
                        <span class="font-headline-sm text-headline-sm text-tertiary font-bold">Rp 125.000</span>
                        <span class="font-body-sm text-body-sm text-on-surface-variant">/ shift</span>
                    </div>
                </div>
                <div class="flex flex-wrap gap-1.5">
                    <span class="px-2.5 py-1 rounded-lg bg-surface-container font-body-sm text-body-sm text-on-surface-variant">🍜 Makan malam gratis</span>
                    <span class="px-2.5 py-1 rounded-lg bg-surface-container font-body-sm text-body-sm text-on-surface-variant">⚡ WiFi 100Mbps (nugas)</span>
                    <span class="px-2.5 py-1 rounded-lg bg-surface-container font-body-sm text-body-sm text-on-surface-variant">☕ Kopi saring bebas ambil</span>
                </div>
            </div>
            <div class="flex items-center gap-space-sm pt-space-lg mt-space-md">
                <button class="w-1/2 py-2.5 px-3 rounded-full bg-surface-container-high text-primary hover:bg-surface-variant font-label-lg text-label-lg transition-colors text-center" onclick="showScheduleModal('Warkop Kopi Titik', 'Barista &amp; Kasir', '16.30 - 21.30 WIB')" type="button">
                    Detail Jadwal
                </button>
                <button class="w-1/2 py-2.5 px-3 rounded-full bg-primary text-on-primary hover:bg-primary-container font-label-lg text-label-lg shadow-sm transition-all text-center" onclick="quickApply('Warkop Kopi Titik', 'Barista &amp; Kasir')" type="button">
                    Lamar Cepat
                </button>
            </div>
        </article>

        <!-- Card 2: Es Teh Nusantara Manyar -->
        <article class="job-card group flex flex-col justify-between bg-surface-container-lowest rounded-2xl p-space-lg shadow-sm hover:shadow-xl transition-all duration-300 relative overflow-hidden" data-category="booth">
            <div class="absolute top-0 left-0 right-0 h-1.5 bg-tertiary"></div>
            <div class="flex flex-col gap-space-md">
                <div class="flex items-start justify-between gap-space-sm">
                    <div class="flex items-center gap-space-sm">
                        <div class="w-12 h-12 rounded-xl bg-surface-container-high flex items-center justify-center shrink-0 overflow-hidden text-tertiary">
                            <span class="material-symbols-outlined text-[26px]">local_drink</span>
                        </div>
                        <div class="flex flex-col min-w-0">
                            <span class="font-headline-sm text-headline-sm text-on-surface truncate">Es Teh Nusantara</span>
                            <div class="flex items-center gap-1 text-on-surface-variant font-body-sm text-body-sm">
                                <span class="material-symbols-outlined text-[15px] text-error">pin_drop</span>
                                <span class="truncate">Jl. Manyar Sabrangan • 1.1 km</span>
                            </div>
                        </div>
                    </div>
                    <button class="text-outline hover:text-primary transition-colors p-1 rounded-full hover:bg-surface-container-low" onclick="toggleBookmark(this)" title="Simpan lowongan" type="button">
                        <span class="material-symbols-outlined text-[20px]">bookmark</span>
                    </button>
                </div>
                <div class="flex flex-col gap-1">
                    <h2 class="font-headline-sm text-headline-sm text-primary group-hover:text-primary-container transition-colors">
                        Crew Booth Es Teh &amp; Snack
                    </h2>
                    <div class="flex items-center gap-2 text-on-surface-variant font-label-md text-label-md">
                        <span class="material-symbols-outlined text-[16px]">schedule</span>
                        <span>12.00 - 17.00 WIB (Shift Siang)</span>
                        <span>•</span>
                        <span>3 Hari/Minggu</span>
                    </div>
                </div>
                <div class="flex items-center gap-2 px-3 py-1.5 rounded-xl bg-secondary-fixed text-on-secondary-fixed-variant font-label-sm text-label-sm">
                    <span class="material-symbols-outlined text-[16px] text-primary">timelapse</span>
                    <span class="truncate">Jeda 45 Menit • Pas selesai kuliah pagi</span>
                </div>
                <div class="flex items-baseline justify-between bg-surface-container-low px-space-md py-2.5 rounded-xl">
                    <span class="font-body-sm text-body-sm text-on-surface-variant">Estimasi Upah</span>
                    <div class="flex items-baseline gap-1">
                        <span class="font-headline-sm text-headline-sm text-tertiary font-bold">Rp 110.000</span>
                        <span class="font-body-sm text-body-sm text-on-surface-variant">/ hari + bonus</span>
                    </div>
                </div>
                <div class="flex flex-wrap gap-1.5">
                    <span class="px-2.5 py-1 rounded-lg bg-surface-container font-body-sm text-body-sm text-on-surface-variant">🎯 Bonus cup terjual</span>
                    <span class="px-2.5 py-1 rounded-lg bg-surface-container font-body-sm text-body-sm text-on-surface-variant">👶 Tanpa pengalaman</span>
                    <span class="px-2.5 py-1 rounded-lg bg-surface-container font-body-sm text-body-sm text-on-surface-variant">🛵 Parkir motor gratis</span>
                </div>
            </div>
            <div class="flex items-center gap-space-sm pt-space-lg mt-space-md">
                <button class="w-1/2 py-2.5 px-3 rounded-full bg-surface-container-high text-primary hover:bg-surface-variant font-label-lg text-label-lg transition-colors text-center" onclick="showScheduleModal('Es Teh Nusantara Manyar', 'Crew Booth Es Teh', '12.00 - 17.00 WIB')" type="button">
                    Detail Jadwal
                </button>
                <button class="w-1/2 py-2.5 px-3 rounded-full bg-primary text-on-primary hover:bg-primary-container font-label-lg text-label-lg shadow-sm transition-all text-center" onclick="quickApply('Es Teh Nusantara Manyar', 'Crew Booth Es Teh')" type="button">
                    Lamar Cepat
                </button>
            </div>
        </article>

        <!-- Card 3: Kripik Makaroni Barokah UMKM -->
        <article class="job-card group flex flex-col justify-between bg-surface-container-lowest rounded-2xl p-space-lg shadow-sm hover:shadow-xl transition-all duration-300 relative overflow-hidden" data-category="admin">
            <div class="absolute top-0 left-0 right-0 h-1.5 bg-primary"></div>
            <div class="flex flex-col gap-space-md">
                <div class="flex items-start justify-between gap-space-sm">
                    <div class="flex items-center gap-space-sm">
                        <div class="w-12 h-12 rounded-xl bg-surface-container-high flex items-center justify-center shrink-0 overflow-hidden text-primary">
                            <span class="material-symbols-outlined text-[26px]">inventory_2</span>
                        </div>
                        <div class="flex flex-col min-w-0">
                            <span class="font-headline-sm text-headline-sm text-on-surface truncate">Makaroni Barokah</span>
                            <div class="flex items-center gap-1 text-on-surface-variant font-body-sm text-body-sm">
                                <span class="material-symbols-outlined text-[15px] text-error">pin_drop</span>
                                <span class="truncate">Keputih Perintis • 800m dari ITS</span>
                            </div>
                        </div>
                    </div>
                    <button class="text-outline hover:text-primary transition-colors p-1 rounded-full hover:bg-surface-container-low" onclick="toggleBookmark(this)" title="Simpan lowongan" type="button">
                        <span class="material-symbols-outlined text-[20px]">bookmark</span>
                    </button>
                </div>
                <div class="flex flex-col gap-1">
                    <h2 class="font-headline-sm text-headline-sm text-primary group-hover:text-primary-container transition-colors">
                        Admin Packing Snack UMKM
                    </h2>
                    <div class="flex items-center gap-2 text-on-surface-variant font-label-md text-label-md">
                        <span class="material-symbols-outlined text-[16px]">schedule</span>
                        <span>19.00 - 22.00 WIB (3 Jam Saja)</span>
                        <span>•</span>
                        <span>Fleksibel 3-5 Hari</span>
                    </div>
                </div>
                <div class="flex items-center gap-2 px-3 py-1.5 rounded-xl bg-tertiary-fixed/30 text-on-tertiary-fixed-variant font-label-sm text-label-sm">
                    <span class="material-symbols-outlined text-[16px] text-tertiary">nightlight</span>
                    <span class="truncate">100% Bebas Kuliah • Jam malam santai</span>
                </div>
                <div class="flex items-baseline justify-between bg-surface-container-low px-space-md py-2.5 rounded-xl">
                    <span class="font-body-sm text-body-sm text-on-surface-variant">Estimasi Upah</span>
                    <div class="flex items-baseline gap-1">
                        <span class="font-headline-sm text-headline-sm text-tertiary font-bold">Rp 80.000</span>
                        <span class="font-body-sm text-body-sm text-on-surface-variant">/ shift (3 jam)</span>
                    </div>
                </div>
                <div class="flex flex-wrap gap-1.5">
                    <span class="px-2.5 py-1 rounded-lg bg-surface-container font-body-sm text-body-sm text-on-surface-variant">🎧 Boleh stel musik/podcast</span>
                    <span class="px-2.5 py-1 rounded-lg bg-surface-container font-body-sm text-body-sm text-on-surface-variant">🍿 Cemilan melimpah</span>
                    <span class="px-2.5 py-1 rounded-lg bg-surface-container font-body-sm text-body-sm text-on-surface-variant">💵 Cair per minggu</span>
                </div>
            </div>
            <div class="flex items-center gap-space-sm pt-space-lg mt-space-md">
                <button class="w-1/2 py-2.5 px-3 rounded-full bg-surface-container-high text-primary hover:bg-surface-variant font-label-lg text-label-lg transition-colors text-center" onclick="showScheduleModal('Makaroni Barokah UMKM', 'Admin Packing', '19.00 - 22.00 WIB')" type="button">
                    Detail Jadwal
                </button>
                <button class="w-1/2 py-2.5 px-3 rounded-full bg-primary text-on-primary hover:bg-primary-container font-label-lg text-label-lg shadow-sm transition-all text-center" onclick="quickApply('Makaroni Barokah UMKM', 'Admin Packing')" type="button">
                    Lamar Cepat
                </button>
            </div>
        </article>

        <!-- Card 4: Bimbel Sahabat Prestasi -->
        <article class="job-card group flex flex-col justify-between bg-surface-container-lowest rounded-2xl p-space-lg shadow-sm hover:shadow-xl transition-all duration-300 relative overflow-hidden" data-category="tutor">
            <div class="absolute top-0 left-0 right-0 h-1.5 bg-primary"></div>
            <div class="flex flex-col gap-space-md">
                <div class="flex items-start justify-between gap-space-sm">
                    <div class="flex items-center gap-space-sm">
                        <div class="w-12 h-12 rounded-xl bg-surface-container-high flex items-center justify-center shrink-0 overflow-hidden text-primary">
                            <span class="material-symbols-outlined text-[26px]">menu_book</span>
                        </div>
                        <div class="flex flex-col min-w-0">
                            <span class="font-headline-sm text-headline-sm text-on-surface truncate">Bimbel Sahabat Prestasi</span>
                            <div class="flex items-center gap-1 text-on-surface-variant font-body-sm text-body-sm">
                                <span class="material-symbols-outlined text-[15px] text-error">pin_drop</span>
                                <span class="truncate">Kertajaya Indah • 1.4 km</span>
                            </div>
                        </div>
                    </div>
                    <button class="text-outline hover:text-primary transition-colors p-1 rounded-full hover:bg-surface-container-low" onclick="toggleBookmark(this)" title="Simpan lowongan" type="button">
                        <span class="material-symbols-outlined text-[20px]">bookmark</span>
                    </button>
                </div>
                <div class="flex flex-col gap-1">
                    <h2 class="font-headline-sm text-headline-sm text-primary group-hover:text-primary-container transition-colors">
                        Tutor Matematika &amp; IPA SMP
                    </h2>
                    <div class="flex items-center gap-2 text-on-surface-variant font-label-md text-label-md">
                        <span class="material-symbols-outlined text-[16px]">schedule</span>
                        <span>16.00 - 18.00 WIB (2 Sesi)</span>
                        <span>•</span>
                        <span>Selasa &amp; Kamis</span>
                    </div>
                </div>
                <div class="flex items-center gap-2 px-3 py-1.5 rounded-xl bg-tertiary-fixed/30 text-on-tertiary-fixed-variant font-label-sm text-label-sm">
                    <span class="material-symbols-outlined text-[16px] text-tertiary">psychology</span>
                    <span class="truncate">100% Bebas Kuliah • Klop keahlian teknik</span>
                </div>
                <div class="flex items-baseline justify-between bg-surface-container-low px-space-md py-2.5 rounded-xl">
                    <span class="font-body-sm text-body-sm text-on-surface-variant">Estimasi Upah</span>
                    <div class="flex items-baseline gap-1">
                        <span class="font-headline-sm text-headline-sm text-tertiary font-bold">Rp 160.000</span>
                        <span class="font-body-sm text-body-sm text-on-surface-variant">/ sesi (2 jam)</span>
                    </div>
                </div>
                <div class="flex flex-wrap gap-1.5">
                    <span class="px-2.5 py-1 rounded-lg bg-surface-container font-body-sm text-body-sm text-on-surface-variant">📖 Bahan ajar sudah siap</span>
                    <span class="px-2.5 py-1 rounded-lg bg-surface-container font-body-sm text-body-sm text-on-surface-variant">❄️ Ruang ber-AC sejuk</span>
                    <span class="px-2.5 py-1 rounded-lg bg-surface-container font-body-sm text-body-sm text-on-surface-variant">📜 Sertifikat tutor resmi</span>
                </div>
            </div>
            <div class="flex items-center gap-space-sm pt-space-lg mt-space-md">
                <button class="w-1/2 py-2.5 px-3 rounded-full bg-surface-container-high text-primary hover:bg-surface-variant font-label-lg text-label-lg transition-colors text-center" onclick="showScheduleModal('Bimbel Sahabat Prestasi', 'Tutor Matematika &amp; IPA', '16.00 - 18.00 WIB')" type="button">
                    Detail Jadwal
                </button>
                <button class="w-1/2 py-2.5 px-3 rounded-full bg-primary text-on-primary hover:bg-primary-container font-label-lg text-label-lg shadow-sm transition-all text-center" onclick="quickApply('Bimbel Sahabat Prestasi', 'Tutor Matematika &amp; IPA')" type="button">
                    Lamar Cepat
                </button>
            </div>
        </article>

        <!-- Card 5: EastJava Creative Expo -->
        <article class="job-card group flex flex-col justify-between bg-surface-container-lowest rounded-2xl p-space-lg shadow-sm hover:shadow-xl transition-all duration-300 relative overflow-hidden" data-category="event">
            <div class="absolute top-0 left-0 right-0 h-1.5 bg-primary-container"></div>
            <div class="flex flex-col gap-space-md">
                <div class="flex items-start justify-between gap-space-sm">
                    <div class="flex items-center gap-space-sm">
                        <div class="w-12 h-12 rounded-xl bg-surface-container-high flex items-center justify-center shrink-0 overflow-hidden text-primary">
                            <span class="material-symbols-outlined text-[26px]">festival</span>
                        </div>
                        <div class="flex flex-col min-w-0">
                            <span class="font-headline-sm text-headline-sm text-on-surface truncate">EastJava Creative Expo</span>
                            <div class="flex items-center gap-1 text-on-surface-variant font-body-sm text-body-sm">
                                <span class="material-symbols-outlined text-[15px] text-error">pin_drop</span>
                                <span class="truncate">Grand City Convex • Shuttle PP</span>
                            </div>
                        </div>
                    </div>
                    <button class="text-outline hover:text-primary transition-colors p-1 rounded-full hover:bg-surface-container-low" onclick="toggleBookmark(this)" title="Simpan lowongan" type="button">
                        <span class="material-symbols-outlined text-[20px]">bookmark</span>
                    </button>
                </div>
                <div class="flex flex-col gap-1">
                    <h2 class="font-headline-sm text-headline-sm text-primary group-hover:text-primary-container transition-colors">
                        Crew Ticketing &amp; Floor Event
                    </h2>
                    <div class="flex items-center gap-2 text-on-surface-variant font-label-md text-label-md">
                        <span class="material-symbols-outlined text-[16px]">schedule</span>
                        <span>09.00 - 18.00 WIB (Full Day)</span>
                        <span>•</span>
                        <span>Sabtu &amp; Minggu Saja</span>
                    </div>
                </div>
                <div class="flex items-center gap-2 px-3 py-1.5 rounded-xl bg-tertiary-fixed/30 text-on-tertiary-fixed-variant font-label-sm text-label-sm">
                    <span class="material-symbols-outlined text-[16px] text-tertiary">weekend</span>
                    <span class="truncate">100% Bebas Kuliah • Khusus Akhir Pekan</span>
                </div>
                <div class="flex items-baseline justify-between bg-surface-container-low px-space-md py-2.5 rounded-xl">
                    <span class="font-body-sm text-body-sm text-on-surface-variant">Estimasi Upah</span>
                    <div class="flex items-baseline gap-1">
                        <span class="font-headline-sm text-headline-sm text-tertiary font-bold">Rp 220.000</span>
                        <span class="font-body-sm text-body-sm text-on-surface-variant">/ hari + makan 2x</span>
                    </div>
                </div>
                <div class="flex flex-wrap gap-1.5">
                    <span class="px-2.5 py-1 rounded-lg bg-surface-container font-body-sm text-body-sm text-on-surface-variant">🍱 Konsumsi 2x + snack</span>
                    <span class="px-2.5 py-1 rounded-lg bg-surface-container font-body-sm text-body-sm text-on-surface-variant">👕 Official crew tee</span>
                    <span class="px-2.5 py-1 rounded-lg bg-surface-container font-body-sm text-body-sm text-on-surface-variant">🤝 Networking industri kreatif</span>
                </div>
            </div>
            <div class="flex items-center gap-space-sm pt-space-lg mt-space-md">
                <button class="w-1/2 py-2.5 px-3 rounded-full bg-surface-container-high text-primary hover:bg-surface-variant font-label-lg text-label-lg transition-colors text-center" onclick="showScheduleModal('EastJava Creative Expo', 'Crew Ticketing &amp; Floor', '09.00 - 18.00 WIB (Weekend)')" type="button">
                    Detail Jadwal
                </button>
                <button class="w-1/2 py-2.5 px-3 rounded-full bg-primary text-on-primary hover:bg-primary-container font-label-lg text-label-lg shadow-sm transition-all text-center" onclick="quickApply('EastJava Creative Expo', 'Crew Ticketing')" type="button">
                    Lamar Cepat
                </button>
            </div>
        </article>

        <!-- Card 6: Mulia Bakery & Cake -->
        <article class="job-card group flex flex-col justify-between bg-surface-container-lowest rounded-2xl p-space-lg shadow-sm hover:shadow-xl transition-all duration-300 relative overflow-hidden" data-category="warkop">
            <div class="absolute top-0 left-0 right-0 h-1.5 bg-primary"></div>
            <div class="flex flex-col gap-space-md">
                <div class="flex items-start justify-between gap-space-sm">
                    <div class="flex items-center gap-space-sm">
                        <div class="w-12 h-12 rounded-xl bg-surface-container-high flex items-center justify-center shrink-0 overflow-hidden text-primary">
                            <span class="material-symbols-outlined text-[26px]">bakery_dining</span>
                        </div>
                        <div class="flex flex-col min-w-0">
                            <span class="font-headline-sm text-headline-sm text-on-surface truncate">Mulia Bakery &amp; Cake</span>
                            <div class="flex items-center gap-1 text-on-surface-variant font-body-sm text-body-sm">
                                <span class="material-symbols-outlined text-[15px] text-error">pin_drop</span>
                                <span class="truncate">Semolowaru Elok • 1.8 km</span>
                            </div>
                        </div>
                    </div>
                    <button class="text-outline hover:text-primary transition-colors p-1 rounded-full hover:bg-surface-container-low" onclick="toggleBookmark(this)" title="Simpan lowongan" type="button">
                        <span class="material-symbols-outlined text-[20px]">bookmark</span>
                    </button>
                </div>
                <div class="flex flex-col gap-1">
                    <h2 class="font-headline-sm text-headline-sm text-primary group-hover:text-primary-container transition-colors">
                        Kasir Toko Roti &amp; Etalase
                    </h2>
                    <div class="flex items-center gap-2 text-on-surface-variant font-label-md text-label-md">
                        <span class="material-symbols-outlined text-[16px]">schedule</span>
                        <span>06.30 - 11.00 WIB (Pagi)</span>
                        <span>•</span>
                        <span>Rabu &amp; Jumat</span>
                    </div>
                </div>
                <div class="flex items-center gap-2 px-3 py-1.5 rounded-xl bg-secondary-fixed text-on-secondary-fixed-variant font-label-sm text-label-sm">
                    <span class="material-symbols-outlined text-[16px] text-primary">hourglass_top</span>
                    <span class="truncate">Jeda 1 Jam • Kuliah Anda mulai 12.30 WIB</span>
                </div>
                <div class="flex items-baseline justify-between bg-surface-container-low px-space-md py-2.5 rounded-xl">
                    <span class="font-body-sm text-body-sm text-on-surface-variant">Estimasi Upah</span>
                    <div class="flex items-baseline gap-1">
                        <span class="font-headline-sm text-headline-sm text-tertiary font-bold">Rp 95.000</span>
                        <span class="font-body-sm text-body-sm text-on-surface-variant">/ shift + bonus roti</span>
                    </div>
                </div>
                <div class="flex flex-wrap gap-1.5">
                    <span class="px-2.5 py-1 rounded-lg bg-surface-container font-body-sm text-body-sm text-on-surface-variant">🥖 Bawa pulang roti fresh</span>
                    <span class="px-2.5 py-1 rounded-lg bg-surface-container font-body-sm text-body-sm text-on-surface-variant">🏷️ Diskon karyawan 30%</span>
                    <span class="px-2.5 py-1 rounded-lg bg-surface-container font-body-sm text-body-sm text-on-surface-variant">📱 Sistem kasir tablet praktis</span>
                </div>
            </div>
            <div class="flex items-center gap-space-sm pt-space-lg mt-space-md">
                <button class="w-1/2 py-2.5 px-3 rounded-full bg-surface-container-high text-primary hover:bg-surface-variant font-label-lg text-label-lg transition-colors text-center" onclick="showScheduleModal('Mulia Bakery &amp; Cake', 'Kasir Toko Roti', '06.30 - 11.00 WIB')" type="button">
                    Detail Jadwal
                </button>
                <button class="w-1/2 py-2.5 px-3 rounded-full bg-primary text-on-primary hover:bg-primary-container font-label-lg text-label-lg shadow-sm transition-all text-center" onclick="quickApply('Mulia Bakery &amp; Cake', 'Kasir Toko Roti')" type="button">
                    Lamar Cepat
                </button>
            </div>
        </article>
    </section>

    <!-- Clean Pagination & Results Summary -->
    <section class="flex flex-col sm:flex-row items-center justify-between gap-space-md pt-space-sm">
        <span class="font-body-sm text-body-sm text-on-surface-variant">
            Menampilkan <span class="font-semibold text-on-surface">1 - 6</span> dari <span class="font-semibold text-on-surface">34</span> lowongan kerja ramah mahasiswa
        </span>
        <div class="inline-flex items-center gap-1.5 bg-surface-container-lowest p-1.5 rounded-full shadow-sm">
            <button class="w-8 h-8 rounded-full flex items-center justify-center text-outline hover:text-on-surface transition-colors disabled:opacity-40" disabled="" type="button">
                <span class="material-symbols-outlined text-[18px]">chevron_left</span>
            </button>
            <button class="w-8 h-8 rounded-full bg-primary text-on-primary font-label-md text-label-md flex items-center justify-center shadow-sm" type="button">1</button>
            <button class="w-8 h-8 rounded-full text-on-surface-variant hover:bg-surface-container font-label-md text-label-md flex items-center justify-center transition-colors" type="button">2</button>
            <button class="w-8 h-8 rounded-full text-on-surface-variant hover:bg-surface-container font-label-md text-label-md flex items-center justify-center transition-colors" type="button">3</button>
            <span class="px-1 text-outline font-label-md text-label-md">...</span>
            <button class="w-8 h-8 rounded-full text-on-surface-variant hover:bg-surface-container font-label-md text-label-md flex items-center justify-center transition-colors" type="button">6</button>
            <button class="w-8 h-8 rounded-full flex items-center justify-center text-on-surface hover:text-primary transition-colors" type="button">
                <span class="material-symbols-outlined text-[18px]">chevron_right</span>
            </button>
        </div>
    </section>

    <!-- Mitra UMKM Surabaya Promo Banner -->
    <section class="relative overflow-hidden rounded-2xl bg-surface-container-low p-space-lg md:p-space-xl shadow-sm">
        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-space-lg relative z-10">
            <div class="flex items-center gap-space-lg">
                <div class="w-16 h-16 rounded-2xl bg-primary flex items-center justify-center text-on-primary shrink-0 shadow-md">
                    <span class="material-symbols-outlined text-[36px]">storefront</span>
                </div>
                <div class="flex flex-col gap-1 max-w-xl">
                    <div class="flex items-center gap-2">
                        <span class="bg-tertiary-fixed text-on-tertiary-fixed font-label-sm text-label-sm px-2.5 py-0.5 rounded-full uppercase">100% Gratis untuk UMKM</span>
                        <span class="text-on-surface-variant font-body-sm text-body-sm">• Area Sukolilo &amp; Sekitarnya</span>
                    </div>
                    <h3 class="font-headline-sm text-headline-sm text-on-surface">Punya Usaha Sekitar Kampus ITS &amp; Butuh Tenaga Tambahan?</h3>
                    <p class="font-body-md text-body-md text-on-surface-variant">
                        Pasang lowongan shift part-time atau freelance secara cuma-cuma. Dapatkan talenta mahasiswa ITS yang disiplin dengan jadwal yang sudah tersinkron otomatis.
                    </p>
                </div>
            </div>
            <div class="flex items-center gap-space-sm shrink-0">
                <button class="px-space-lg py-3 rounded-full bg-primary text-on-primary font-label-lg text-label-lg hover:bg-primary-container shadow-md transition-all active:scale-95 flex items-center gap-2" type="button">
                    <span>Pasang Lowongan Gratis</span>
                    <span class="material-symbols-outlined text-[18px]">arrow_forward</span>
                </button>
            </div>
        </div>
    </section>

    <!-- Interactive Modal: Jadwal Comparison / Quick Detail Preview -->
    <div class="fixed inset-0 bg-inverse-surface/40 backdrop-blur-sm z-50 hidden flex items-center justify-center p-4" id="schedule-modal">
        <div class="bg-surface-container-lowest rounded-2xl max-w-lg w-full p-space-lg shadow-2xl flex flex-col gap-space-md animate-in fade-in zoom-in-95 duration-200">
            <div class="flex items-start justify-between">
                <div class="flex flex-col">
                    <span class="font-label-sm text-label-sm text-primary uppercase tracking-wide">Analisis Kecocokan SIAKAD</span>
                    <h4 class="font-headline-sm text-headline-sm text-on-surface" id="modal-title">Detail Komparasi Jadwal</h4>
                    <span class="font-body-sm text-body-sm text-on-surface-variant" id="modal-subtitle">Shift Kerja vs Jam Kuliah Anda</span>
                </div>
                <button class="w-8 h-8 rounded-full bg-surface-container flex items-center justify-center text-outline hover:text-on-surface transition-colors" onclick="closeScheduleModal()" type="button">
                    <span class="material-symbols-outlined text-[18px]">close</span>
                </button>
            </div>
            <div class="bg-surface-container-low p-space-md rounded-xl flex flex-col gap-space-sm">
                <div class="flex items-center justify-between text-body-sm font-body-sm">
                    <span class="text-on-surface-variant">Mata Kuliah Terakhir:</span>
                    <span class="font-semibold text-on-surface">Pemrograman Web (Selesai 15.00 WIB)</span>
                </div>
                <div class="flex items-center justify-between text-body-sm font-body-sm">
                    <span class="text-on-surface-variant">Mulai Shift Pekerjaan:</span>
                    <span class="font-semibold text-primary" id="modal-shift-time">16.30 WIB</span>
                </div>
                <div class="h-2 w-full bg-surface-container-high rounded-full overflow-hidden flex">
                    <div class="h-full bg-primary/40 w-3/5" title="Jam Kuliah"></div>
                    <div class="h-full bg-tertiary w-1/5" title="Waktu Tempuh &amp; Istirahat (1.5 Jam)"></div>
                    <div class="h-full bg-primary w-1/5" title="Shift Kerja"></div>
                </div>
                <p class="font-body-sm text-body-sm text-tertiary flex items-center gap-1.5 mt-1">
                    <span class="material-symbols-outlined text-[16px]">check_circle</span>
                    <span>Aman! Tersedia jeda santai 90 menit untuk mandi &amp; perjalanan.</span>
                </p>
            </div>
            <div class="text-body-sm font-body-sm text-on-surface-variant bg-surface-variant/40 p-space-sm rounded-xl">
                💡 <strong>Tips MABU:</strong> Mitra ini sangat toleran terhadap jadwal ujian UTS/UAS mahasiswa ITS bila diajukan H-3.
            </div>
            <div class="flex items-center justify-end gap-space-sm pt-space-xs">
                <button class="px-space-md py-2 rounded-full font-label-lg text-label-lg text-on-surface-variant hover:bg-surface-container transition-colors" onclick="closeScheduleModal()" type="button">
                    Tutup
                </button>
                <button class="px-space-lg py-2 rounded-full bg-primary text-on-primary font-label-lg text-label-lg hover:bg-primary-container shadow-sm transition-all" onclick="applyFromModal()" type="button">
                    Lanjut Lamar Posisi Ini
                </button>
            </div>
        </div>
    </div>

    <!-- Interactive Toast Notification -->
    <div class="fixed bottom-6 right-6 bg-inverse-surface text-inverse-on-surface px-space-lg py-3 rounded-full shadow-2xl flex items-center gap-space-sm transform translate-y-24 opacity-0 transition-all duration-300 z-50" id="toast-notify">
        <span class="material-symbols-outlined text-tertiary-fixed text-[20px]" id="toast-icon">check_circle</span>
        <span class="font-label-lg text-label-lg" id="toast-message">Lamaran berhasil dikirim ke mitra!</span>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Simple Dropdown Toggle Utility
    function toggleDropdown(id) {
        const el = document.getElementById(id);
        const isHidden = el.classList.contains('hidden');
        document.querySelectorAll('[id^="dropdown-"]').forEach(d => d.classList.add('hidden'));
        if (isHidden) {
            el.classList.remove('hidden');
        }
    }

    // Close dropdowns on outside click
    window.addEventListener('click', (e) => {
        if (!e.target.closest('[onclick^="toggleDropdown"]') && !e.target.closest('[id^="dropdown-"]')) {
            document.querySelectorAll('[id^="dropdown-"]').forEach(d => d.classList.add('hidden'));
        }
    });

    // Bookmark toggler
    function toggleBookmark(btn) {
        const icon = btn.querySelector('.material-symbols-outlined');
        const isSaved = icon.style.fontVariationSettings.includes("'FILL' 1");
        if (isSaved) {
            icon.style.fontVariationSettings = "'FILL' 0";
            icon.classList.remove('text-primary');
            icon.classList.add('text-outline');
            showToast('Lowongan dihapus dari daftar tersimpan');
        } else {
            icon.style.fontVariationSettings = "'FILL' 1";
            icon.classList.add('text-primary');
            icon.classList.remove('text-outline');
            showToast('Lowongan tersimpan di Dokumen Saya!');
        }
    }

    // Category filter simulation
    function filterCategory(category, buttonEl) {
        document.querySelectorAll('.category-pill').forEach(btn => {
            btn.classList.remove('bg-primary', 'text-on-primary');
            btn.classList.add('bg-surface-container-low', 'text-on-surface-variant');
        });

        buttonEl.classList.remove('bg-surface-container-low', 'text-on-surface-variant');
        buttonEl.classList.add('bg-primary', 'text-on-primary');

        const cards = document.querySelectorAll('#job-cards-grid article');
        cards.forEach(card => {
            if (category === 'all' || card.getAttribute('data-category') === category) {
                card.style.display = 'flex';
            } else {
                card.style.display = 'none';
            }
        });
    }

    // Live client-side search
    function handleSearch(term) {
        const val = term.toLowerCase().trim();
        const cards = document.querySelectorAll('#job-cards-grid article');
        cards.forEach(card => {
            const text = card.innerText.toLowerCase();
            if (text.includes(val)) {
                card.style.display = 'flex';
            } else {
                card.style.display = 'none';
            }
        });
    }

    // Modal logic
    let activeJobApply = '';
    function showScheduleModal(company, role, shift) {
        activeJobApply = role + ' @ ' + company;
        document.getElementById('modal-title').textContent = company;
        document.getElementById('modal-subtitle').textContent = role;
        document.getElementById('modal-shift-time').textContent = shift;
        document.getElementById('schedule-modal').classList.remove('hidden');
    }

    function closeScheduleModal() {
        document.getElementById('schedule-modal').classList.add('hidden');
    }

    function applyFromModal() {
        closeScheduleModal();
        showToast('Profil & Portofolio MABU Anda berhasil dikirim ke ' + activeJobApply);
    }

    function quickApply(company, role) {
        showToast('Berhasil melamar ' + role + ' di ' + company + '!');
    }

    // Toast feedback
    function showToast(msg) {
        const toast = document.getElementById('toast-notify');
        document.getElementById('toast-message').textContent = msg;
        toast.classList.remove('translate-y-24', 'opacity-0');
        toast.classList.add('translate-y-0', 'opacity-100');
        setTimeout(() => {
            toast.classList.add('translate-y-24', 'opacity-0');
            toast.classList.remove('translate-y-0', 'opacity-100');
        }, 3200);
    }

    // KRS Sync simulation
    function syncSchedule() {
        const icon = document.getElementById('sync-icon');
        const text = document.getElementById('sync-text');
        icon.classList.add('animate-spin');
        text.textContent = 'Menghubungkan SIAKAD...';
        setTimeout(() => {
            icon.classList.remove('animate-spin');
            text.textContent = 'Tersinkron Baru Saja';
            showToast('Jadwal kuliah diperbarui! Seluruh lowongan disesuaikan kembali.');
        }, 1200);
    }

    function selectRadius(val) {
        toggleDropdown('dropdown-radius');
        showToast('Area filter diperbarui: ' + val);
    }
</script>
@endpush
