@extends('layouts.mabu')

@section('title', 'Status Lamaran & Kontrak - MABU')

@section('content')
<div class="flex flex-col w-full">
    <!-- Top Headline & Motivational Banner -->
    <div class="relative overflow-hidden rounded-xl bg-surface-container-lowest p-space-lg shadow-sm mb-space-lg">
        <div class="absolute -right-16 -top-16 w-64 h-64 rounded-full bg-primary-fixed opacity-40 blur-3xl pointer-events-none"></div>
        <div class="absolute right-48 -bottom-20 w-48 h-48 rounded-full bg-tertiary-fixed opacity-30 blur-2xl pointer-events-none"></div>
        <div class="relative z-10 flex flex-col lg:flex-row lg:items-center justify-between gap-space-md">
            <div class="space-y-space-xs max-w-2xl">
                <div class="inline-flex items-center gap-space-xs px-space-sm py-0.5 rounded-full bg-primary-fixed text-on-primary-fixed font-label-sm text-label-sm tracking-wider uppercase">
                    <span class="w-2 h-2 rounded-full bg-primary animate-pulse"></span>
                    Live Pipeline Pelamar
                </div>
                <h1 class="font-headline-lg text-headline-lg text-on-surface tracking-tight">Status Lamaran &amp; Kontrak</h1>
                <p class="font-body-md text-body-md text-on-surface-variant">
                    Pantau perkembangan seleksi kerja paruh waktu, konfirmasi jadwal wawancara, serta kelola bukti kontrak aktif kamu tanpa mengorbankan waktu kuliah.
                </p>
            </div>
            <!-- Alert Card: Tomorrow's Interview Priority Callout -->
            <div class="flex items-center gap-space-md p-space-md rounded-xl bg-primary text-on-primary shadow-md shrink-0 lg:max-w-md">
                <div class="w-12 h-12 rounded-xl bg-white/20 flex items-center justify-center shrink-0">
                    <span class="material-symbols-outlined text-[28px] text-on-primary" style="font-variation-settings: 'FILL' 1;">notifications_active</span>
                </div>
                <div class="min-w-0 flex-1">
                    <div class="flex items-center justify-between">
                        <span class="font-label-sm text-label-sm uppercase tracking-wider text-primary-fixed">Penting • Besok Malam</span>
                        <span class="font-label-sm text-label-sm bg-white/20 px-space-xs py-0.5 rounded-full">19:00 WIB</span>
                    </div>
                    <p class="font-headline-sm text-headline-sm truncate text-on-primary">Wawancara Warkop Sahabat</p>
                    <p class="font-body-sm text-body-sm text-primary-fixed truncate">Konfirmasi kehadiran • Siapkan KTM &amp; KTP</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Horizontal Metrics Grid (5 KPI Cards) -->
    <div class="grid grid-cols-2 md:grid-cols-3 xl:grid-cols-5 gap-space-md mb-space-lg">
        <!-- Total Lamaran -->
        <div class="p-space-md rounded-xl bg-surface-container-lowest shadow-sm flex flex-col justify-between transition-transform hover:-translate-y-0.5">
            <div class="flex items-center justify-between text-on-surface-variant">
                <span class="font-label-sm text-label-sm uppercase tracking-wider">Total Lamaran</span>
                <span class="material-symbols-outlined text-[20px] text-secondary">send</span>
            </div>
            <div class="mt-space-md">
                <div class="font-display-lg text-display-lg text-on-surface font-bold leading-none">6</div>
                <span class="font-body-sm text-body-sm text-on-surface-variant mt-1 inline-block">Diajukan semester ini</span>
            </div>
        </div>

        <!-- Dalam Seleksi -->
        <div class="p-space-md rounded-xl bg-surface-container-lowest shadow-sm flex flex-col justify-between transition-transform hover:-translate-y-0.5">
            <div class="flex items-center justify-between text-on-surface-variant">
                <span class="font-label-sm text-label-sm uppercase tracking-wider">Dalam Seleksi</span>
                <span class="material-symbols-outlined text-[20px] text-primary">hourglass_top</span>
            </div>
            <div class="mt-space-md">
                <div class="font-display-lg text-display-lg text-on-surface font-bold leading-none">2</div>
                <span class="font-body-sm text-body-sm text-primary mt-1 inline-block font-medium">Dalam peninjauan</span>
            </div>
        </div>

        <!-- Tahap Wawancara (Highlight Biru) -->
        <div class="p-space-md rounded-xl bg-primary-container text-on-primary shadow-md flex flex-col justify-between transition-transform hover:-translate-y-0.5 relative overflow-hidden">
            <div class="absolute -right-4 -bottom-4 w-20 h-20 rounded-full bg-white/10 blur-xl"></div>
            <div class="flex items-center justify-between text-on-primary-container">
                <span class="font-label-sm text-label-sm uppercase tracking-wider">Wawancara</span>
                <span class="material-symbols-outlined text-[20px]" style="font-variation-settings: 'FILL' 1;">event_available</span>
            </div>
            <div class="mt-space-md relative z-10">
                <div class="font-display-lg text-display-lg font-bold leading-none text-white">1</div>
                <span class="font-body-sm text-body-sm text-primary-fixed mt-1 inline-block truncate w-full">Warkop Sahabat (19:00)</span>
            </div>
        </div>

        <!-- Kontrak Bekerja (Highlight Hijau) -->
        <div class="p-space-md rounded-xl bg-tertiary-container text-on-tertiary shadow-md flex flex-col justify-between transition-transform hover:-translate-y-0.5 relative overflow-hidden">
            <div class="absolute -right-4 -bottom-4 w-20 h-20 rounded-full bg-white/10 blur-xl"></div>
            <div class="flex items-center justify-between text-on-tertiary-container">
                <span class="font-label-sm text-label-sm uppercase tracking-wider">Kontrak Aktif</span>
                <span class="material-symbols-outlined text-[20px]" style="font-variation-settings: 'FILL' 1;">badge</span>
            </div>
            <div class="mt-space-md relative z-10">
                <div class="font-display-lg text-display-lg font-bold leading-none text-white">1</div>
                <span class="font-body-sm text-body-sm text-on-tertiary-container mt-1 inline-block truncate w-full">Kopi Kenangan (12 Shift)</span>
            </div>
        </div>

        <!-- Riwayat Selesai -->
        <div class="col-span-2 md:col-span-1 p-space-md rounded-xl bg-surface-container-lowest shadow-sm flex flex-col justify-between transition-transform hover:-translate-y-0.5">
            <div class="flex items-center justify-between text-on-surface-variant">
                <span class="font-label-sm text-label-sm uppercase tracking-wider">Riwayat Kerja</span>
                <span class="material-symbols-outlined text-[20px] text-tertiary">check_circle</span>
            </div>
            <div class="mt-space-md">
                <div class="font-display-lg text-display-lg text-on-surface font-bold leading-none">2</div>
                <span class="font-body-sm text-body-sm text-tertiary mt-1 inline-block font-medium">Honor tersalurkan 100%</span>
            </div>
        </div>
    </div>

    <!-- Filter Pills Bar -->
    <div class="flex items-center gap-space-xs overflow-x-auto pb-space-sm mb-space-lg no-scrollbar">
        <button type="button" class="px-space-md py-space-xs rounded-full bg-primary text-on-primary font-label-md text-label-md shadow-sm shrink-0">
            Semua Status (6)
        </button>
        <button type="button" class="px-space-md py-space-xs rounded-full bg-surface-container-lowest hover:bg-surface-container text-on-surface-variant hover:text-on-surface font-label-md text-label-md transition-colors shrink-0">
            Menunggu Respon (1)
        </button>
        <button type="button" class="px-space-md py-space-xs rounded-full bg-surface-container-lowest hover:bg-surface-container text-on-surface-variant hover:text-on-surface font-label-md text-label-md transition-colors shrink-0 flex items-center gap-1.5">
            <span class="w-2 h-2 rounded-full bg-primary"></span>
            Wawancara (1)
        </button>
        <button type="button" class="px-space-md py-space-xs rounded-full bg-surface-container-lowest hover:bg-surface-container text-on-surface-variant hover:text-on-surface font-label-md text-label-md transition-colors shrink-0 flex items-center gap-1.5">
            <span class="w-2 h-2 rounded-full bg-tertiary"></span>
            Diterima / Kontrak (1)
        </button>
        <button type="button" class="px-space-md py-space-xs rounded-full bg-surface-container-lowest hover:bg-surface-container text-on-surface-variant hover:text-on-surface font-label-md text-label-md transition-colors shrink-0">
            Selesai (2)
        </button>
        <button type="button" class="px-space-md py-space-xs rounded-full bg-surface-container-lowest hover:bg-surface-container text-on-surface-variant hover:text-on-surface font-label-md text-label-md transition-colors shrink-0">
            Ditolak (1)
        </button>
    </div>

    <!-- 2 Column Layout (Left: Applications & Steppers | Right: Checklist & Guides) -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-space-lg">
        <!-- LEFT COLUMN (Span 8) -->
        <div class="lg:col-span-8 flex flex-col gap-space-lg">
            <!-- ITEM 1: SEDANG WAWANCARA (SPECIAL HIGHLIGHT CARD) -->
            <div class="rounded-xl bg-surface-container-lowest p-space-lg shadow-sm hover:shadow-md transition-shadow relative overflow-hidden">
                <!-- Accent indicator bar -->
                <div class="absolute left-0 top-0 bottom-0 w-2 bg-primary"></div>
                <div class="pl-space-xs">
                    <!-- Card Header Meta -->
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-space-xs pb-space-md">
                        <div class="flex items-center gap-space-md">
                            <div class="w-14 h-14 rounded-xl bg-surface-container flex items-center justify-center shrink-0 overflow-hidden shadow-inner">
                                <img class="w-full h-full object-cover" alt="Logo Warkop Kopi Sahabat" src="https://lh3.googleusercontent.com/aida-public/AB6AXuD-LM290IR0sLlFvCP32cxJWcsFyTCgVLEcPmrruQgcCVYuYJ5JPhvwhD7B_V-ENlOkSl9eS6qs4bg3bs-2a48J-2aEq9KSL9IBbFu7UhdugWBDZC7X1oEuOlzdI9lOGiLk2SiQ44aezBogE3k-uEcYe9aaetSCO8gtrpOvvdnCpyJpoe6JCNVokpzjyu85Kuwm_17GZmzIk3stzaP0kXCFtUTW28xx6TWNt9Wz99A"/>
                            </div>
                            <div>
                                <div class="flex items-center gap-space-xs flex-wrap">
                                    <span class="font-headline-sm text-headline-sm text-on-surface">Barista &amp; Kasir Shift Malam</span>
                                    <span class="px-2 py-0.5 rounded-full bg-primary-fixed text-on-primary-fixed font-label-sm text-label-sm">Shift Fleksibel</span>
                                </div>
                                <p class="font-body-md text-body-md text-on-surface-variant flex items-center gap-1">
                                    <span>Warkop Kopi Sahabat Sukolilo</span>
                                    <span>•</span>
                                    <span class="text-tertiary font-semibold">Rp 175.000 / shift</span>
                                </p>
                            </div>
                        </div>
                        <!-- Urgency Tag -->
                        <div class="flex sm:flex-col items-end justify-between sm:justify-center">
                            <span class="px-space-sm py-1 rounded-full bg-error-container text-on-error-container font-label-sm text-label-sm flex items-center gap-1 font-bold">
                                <span class="material-symbols-outlined text-[14px]">timer</span>
                                Tenggat: 23 jam lagi
                            </span>
                            <span class="text-on-surface-variant font-body-sm text-body-sm mt-0.5">Diajukan 15 Nov 2024</span>
                        </div>
                    </div>

                    <!-- Stepper Visual Pipeline (4 Stages) -->
                    <div class="py-space-md px-space-xs">
                        <div class="relative flex items-center justify-between">
                            <!-- Background Connector Line -->
                            <div class="absolute left-4 right-4 top-1/2 -translate-y-1/2 h-1 bg-surface-container-high z-0"></div>
                            <!-- Completed Progress Fill (66%) -->
                            <div class="absolute left-4 w-2/3 top-1/2 -translate-y-1/2 h-1 bg-primary z-0"></div>
                            <!-- Step 1: Terkirim (Done) -->
                            <div class="relative z-10 flex flex-col items-center text-center">
                                <div class="w-9 h-9 rounded-full bg-primary text-on-primary flex items-center justify-center shadow-sm">
                                    <span class="material-symbols-outlined text-[18px]">check</span>
                                </div>
                                <span class="font-label-sm text-label-sm text-on-surface mt-2">Terkirim</span>
                                <span class="font-body-sm text-body-sm text-on-surface-variant text-[11px]">15 Nov</span>
                            </div>
                            <!-- Step 2: Berkas Ditinjau (Done) -->
                            <div class="relative z-10 flex flex-col items-center text-center">
                                <div class="w-9 h-9 rounded-full bg-primary text-on-primary flex items-center justify-center shadow-sm">
                                    <span class="material-symbols-outlined text-[18px]">check</span>
                                </div>
                                <span class="font-label-sm text-label-sm text-on-surface mt-2">Berkas Lolos</span>
                                <span class="font-body-sm text-body-sm text-on-surface-variant text-[11px]">16 Nov</span>
                            </div>
                            <!-- Step 3: Wawancara (ACTIVE) -->
                            <div class="relative z-10 flex flex-col items-center text-center">
                                <div class="w-9 h-9 rounded-full bg-primary text-on-primary ring-4 ring-primary-fixed flex items-center justify-center shadow-md animate-pulse">
                                    <span class="material-symbols-outlined text-[18px]" style="font-variation-settings: 'FILL' 1;">groups</span>
                                </div>
                                <span class="font-label-sm text-label-sm text-primary font-bold mt-2">Wawancara</span>
                                <span class="font-body-sm text-body-sm text-primary font-medium text-[11px]">Besok 19:00 WIB</span>
                            </div>
                            <!-- Step 4: Tawaran Kerja (Upcoming) -->
                            <div class="relative z-10 flex flex-col items-center text-center">
                                <div class="w-9 h-9 rounded-full bg-surface-container-high text-on-surface-variant flex items-center justify-center">
                                    <span class="material-symbols-outlined text-[18px]">assignment_turned_in</span>
                                </div>
                                <span class="font-label-sm text-label-sm text-on-surface-variant mt-2">Tawaran Kerja</span>
                                <span class="font-body-sm text-body-sm text-on-surface-variant text-[11px]">Menunggu</span>
                            </div>
                        </div>
                    </div>

                    <!-- Highlight Location & Requirements Detail Box -->
                    <div class="my-space-sm p-space-md rounded-xl bg-surface-container-low flex flex-col sm:flex-row items-start sm:items-center justify-between gap-space-sm">
                        <div class="flex items-start gap-space-sm">
                            <span class="material-symbols-outlined text-primary text-[22px] mt-0.5">location_on</span>
                            <div>
                                <p class="font-label-lg text-label-lg text-on-surface">Jl. Gebang Wetan No. 12, Sukolilo (1.2 km dari Kampus ITS)</p>
                                <p class="font-body-sm text-body-sm text-on-surface-variant">Bawa KTM asli, KTP, dan jadwal kuliah FRS semester ini untuk pencocokan shift.</p>
                            </div>
                        </div>
                        <span class="shrink-0 px-space-sm py-1 rounded-full bg-surface-container-highest text-on-surface font-label-sm text-label-sm">
                            Bertemu Mas Danang (Owner)
                        </span>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex flex-wrap items-center justify-end gap-space-sm pt-space-sm">
                        <button type="button" class="px-space-md py-space-xs rounded-full bg-surface-container hover:bg-surface-variant text-on-surface font-label-md text-label-md transition-colors flex items-center gap-1.5">
                            <span class="material-symbols-outlined text-[18px]">chat</span>
                            Hubungi WhatsApp Pemilik
                        </button>
                        <a href="{{ route('mabu.jadwal') }}" class="px-space-lg py-space-xs rounded-full bg-primary hover:bg-primary-container text-on-primary font-label-md text-label-md shadow-sm transition-all flex items-center gap-1.5">
                            <span class="material-symbols-outlined text-[18px]">event</span>
                            Lihat Detail &amp; Kalender
                        </a>
                    </div>
                </div>
            </div>

            <!-- ITEM 2: KONTRAK AKTIF (KOPI KENANGAN) -->
            <div class="rounded-xl bg-surface-container-lowest p-space-lg shadow-sm hover:shadow-md transition-shadow relative overflow-hidden">
                <div class="absolute left-0 top-0 bottom-0 w-2 bg-tertiary"></div>
                <div class="pl-space-xs">
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-space-xs pb-space-md">
                        <div class="flex items-center gap-space-md">
                            <div class="w-14 h-14 rounded-xl bg-surface-container flex items-center justify-center shrink-0 overflow-hidden shadow-inner">
                                <img class="w-full h-full object-cover" alt="Logo Kopi Kenangan" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDbbpI0rfWf1hJ-ZFG0Z7uV_jXAV8v7DEwCmx0C97l5rT1OCy3MqVS8G9RPA-JyWwWhRD7vF5dTDkUcpg-nEVQIdDMx6w5ETOUyDkcfFVrlCFKDg6vWsF8i437JwROuWfV0hAy5CZ7Thwm3YYqwoDqiUeVHXBLVFYs94BgGQIJdjuviBy-NJZjxv7sh7NLI34AY0baYSkszvXzHng2LvwPbxM2_Nyxi9hVYygkbg_A"/>
                            </div>
                            <div>
                                <div class="flex items-center gap-space-xs flex-wrap">
                                    <span class="font-headline-sm text-headline-sm text-on-surface">Barista Part-Time</span>
                                    <span class="px-2 py-0.5 rounded-full bg-tertiary-fixed text-on-tertiary-fixed font-label-sm text-label-sm font-semibold">
                                        Kontrak Aktif
                                    </span>
                                </div>
                                <p class="font-body-md text-body-md text-on-surface-variant">Kopi Kenangan Sukolilo • ID Kontrak #MABU-KK-089</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <div class="font-headline-sm text-headline-sm text-tertiary font-bold">Rp 2.100.000</div>
                            <span class="font-body-sm text-body-sm text-on-surface-variant">Honor Tersalurkan</span>
                        </div>
                    </div>

                    <!-- Progress / Stats Row for Active Job -->
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-space-sm my-space-xs p-space-md rounded-xl bg-surface-container-low">
                        <div class="flex items-center gap-space-sm">
                            <span class="material-symbols-outlined text-tertiary text-[20px]">calendar_today</span>
                            <div>
                                <p class="font-label-sm text-label-sm text-on-surface-variant">Realisasi Shift</p>
                                <p class="font-label-lg text-label-lg text-on-surface font-semibold">12 dari 16 Shift Tuntas</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-space-sm">
                            <span class="material-symbols-outlined text-primary text-[20px]">star</span>
                            <div>
                                <p class="font-label-sm text-label-sm text-on-surface-variant">Presensi &amp; Rating</p>
                                <p class="font-label-lg text-label-lg text-on-surface font-semibold">5.0 / 5.0 (Tepat Waktu)</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-space-sm">
                            <span class="material-symbols-outlined text-secondary text-[20px]">schedule</span>
                            <div>
                                <p class="font-label-sm text-label-sm text-on-surface-variant">Jadwal Shift Dekat</p>
                                <p class="font-label-lg text-label-lg text-on-surface font-semibold">Jumat, 16:00 - 21:00</p>
                            </div>
                        </div>
                    </div>

                    <!-- Actions -->
                    <div class="flex flex-wrap items-center justify-end gap-space-sm pt-space-sm">
                        <a href="{{ route('mabu.dokumen') }}" class="px-space-md py-space-xs rounded-full bg-surface-container hover:bg-surface-variant text-on-surface font-label-md text-label-md transition-colors flex items-center gap-1.5">
                            <span class="material-symbols-outlined text-[18px]">description</span>
                            Lihat Kontrak Digital
                        </a>
                        <button type="button" class="px-space-md py-space-xs rounded-full bg-tertiary text-on-tertiary hover:opacity-95 font-label-md text-label-md shadow-sm transition-all flex items-center gap-1.5">
                            <span class="material-symbols-outlined text-[18px]">how_to_reg</span>
                            Lapor Presensi Shift
                        </button>
                    </div>
                </div>
            </div>

            <!-- ITEM 3: MENUNGGU REVIEW (TEH SOLO MAKMUR) -->
            <div class="rounded-xl bg-surface-container-lowest p-space-lg shadow-sm hover:shadow-md transition-shadow relative overflow-hidden">
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-space-xs pb-space-sm">
                    <div class="flex items-center gap-space-md">
                        <div class="w-14 h-14 rounded-xl bg-surface-container flex items-center justify-center shrink-0 overflow-hidden shadow-inner">
                            <img class="w-full h-full object-cover" alt="Logo Teh Solo Makmur" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBZdJP9TB9MoiGIlfwTDMdVHdF9cAlUYNmuLNV0Tu7PhfvGOfiRbp16tCsGUyym_EQPzrRCUatgioCIi4VURf-fEFslchIsbYQSTaiZ0owD-fcRSl76tPVlE8DfrB8kaY3N6CR1VgC12S7S4O0Bodsb6uCleduYhbWvKjHjxRyHgOs_q3VnJ9YbCLFfLH2hmQgPpk9mm8iulUa1VF5svA1YX_mkiiZZ6eLtfxjGRPk"/>
                        </div>
                        <div>
                            <div class="flex items-center gap-space-xs flex-wrap">
                                <span class="font-headline-sm text-headline-sm text-on-surface">Penjaga Booth Minuman</span>
                                <span class="px-2 py-0.5 rounded-full bg-secondary-fixed text-on-secondary-fixed-variant font-label-sm text-label-sm font-semibold">
                                    Menunggu Review
                                </span>
                            </div>
                            <p class="font-body-md text-body-md text-on-surface-variant">Teh Solo Makmur Gebang • Shift Siang (11:00 - 16:00)</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="text-on-surface-variant font-body-sm text-body-sm flex items-center gap-1">
                            <span class="material-symbols-outlined text-[16px] text-primary">update</span>
                            Estimasi review 24 jam
                        </span>
                    </div>
                </div>
                <p class="font-body-md text-body-md text-on-surface-variant my-space-xs">
                    Lamaran kamu telah diterima pengelola gerai dan saat ini sedang disaring bersama 5 berkas mahasiswa lainnya. Tidak ada bentrok dengan jadwal kuliah kamu di hari Selasa &amp; Kamis.
                </p>
                <div class="flex items-center justify-between pt-space-sm">
                    <button type="button" class="text-error hover:underline font-label-md text-label-md flex items-center gap-1 transition-colors">
                        <span class="material-symbols-outlined text-[18px]">cancel</span>
                        Tarik Lamaran
                    </button>
                    <a href="{{ route('mabu.lowongan') }}" class="px-space-md py-space-xs rounded-full bg-surface-container hover:bg-surface-variant text-on-surface font-label-md text-label-md transition-colors">
                        Detail Lowongan
                    </a>
                </div>
            </div>

            <!-- ITEM 4: RIWAYAT SELESAI (DAPUR BUNDA COOKIES) -->
            <div class="rounded-xl bg-surface-container-lowest p-space-lg shadow-sm hover:shadow-md transition-shadow relative overflow-hidden opacity-90 hover:opacity-100">
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-space-xs pb-space-sm">
                    <div class="flex items-center gap-space-md">
                        <div class="w-14 h-14 rounded-xl bg-surface-container flex items-center justify-center shrink-0 overflow-hidden shadow-inner">
                            <img class="w-full h-full object-cover" alt="Logo Dapur Bunda Cookies" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDTGFd6i0xHdXqDjRjJfjKOPWzwg2vCk-NmIDwRx7a3lsIN9xTaZ1_TPFXdo0ANA3e3gMbKFPiArThUja_9n97SvFoR8JydT4-vO3H4_4xiphhh2VHtb7QS2HjQNcFb2jLhXkS6_3NMqbnC63m3RFsiv2kIjB05ZS_d7TdP9ia64UOEaZNipENNQmRphOc5ARD-Fha1g1Opuf4bz89bp4Dzb7rrBEY_rj9Vz_VIkOU"/>
                        </div>
                        <div>
                            <div class="flex items-center gap-space-xs flex-wrap">
                                <span class="font-headline-sm text-headline-sm text-on-surface">Admin Chat &amp; Packing Olshop</span>
                                <span class="px-2 py-0.5 rounded-full bg-surface-container text-on-surface-variant font-label-sm text-label-sm font-semibold">
                                    Selesai
                                </span>
                            </div>
                            <p class="font-body-md text-body-md text-on-surface-variant">Dapur Bunda Cookies • Kontrak 1 Bulan (Musim Wisuda)</p>
                        </div>
                    </div>
                    <div class="text-right">
                        <span class="font-label-lg text-label-lg text-tertiary font-bold">Lunas Rp 1.850.000</span>
                        <div class="font-body-sm text-body-sm text-on-surface-variant">20 Okt - 20 Nov 2024</div>
                    </div>
                </div>
                <div class="p-space-sm rounded-xl bg-surface-container-low flex items-center justify-between my-space-xs">
                    <div class="flex items-center gap-space-sm">
                        <span class="material-symbols-outlined text-tertiary text-[20px]">verified</span>
                        <span class="font-body-sm text-body-sm text-on-surface">Review Pemilik: <span class="font-medium italic">"Andika sangat teliti, ramah membalas chat customer, dan packing rapi."</span></span>
                    </div>
                    <span class="font-label-md text-label-md text-primary font-bold shrink-0">Bintang 5.0 ★</span>
                </div>
                <div class="flex items-center justify-end gap-space-sm pt-space-sm">
                    <button type="button" class="px-space-md py-space-xs rounded-full bg-surface-container hover:bg-surface-variant text-on-surface font-label-md text-label-md transition-colors flex items-center gap-1.5">
                        <span class="material-symbols-outlined text-[18px]">rate_review</span>
                        Beri Ulasan Pemilik
                    </button>
                    <a href="{{ route('mabu.dokumen') }}" class="px-space-md py-space-xs rounded-full bg-surface-container-high hover:bg-primary-fixed text-primary font-label-md text-label-md transition-colors flex items-center gap-1.5 font-semibold">
                        <span class="material-symbols-outlined text-[18px]">download</span>
                        Download Bukti Kerja (e-Paklaring)
                    </a>
                </div>
            </div>
        </div>

        <!-- RIGHT COLUMN (Span 4): Preparation, Checklist, & FAQ -->
        <div class="lg:col-span-4 flex flex-col gap-space-lg">
            <!-- Interactive Checklist: Persiapan Wawancara Besok -->
            <div class="rounded-xl bg-surface-container-lowest p-space-lg shadow-sm">
                <div class="flex items-center justify-between pb-space-sm mb-space-sm">
                    <div class="flex items-center gap-space-xs">
                        <span class="material-symbols-outlined text-primary text-[22px]">checklist</span>
                        <h2 class="font-headline-sm text-headline-sm text-on-surface">Checklist Wawancara</h2>
                    </div>
                    <span class="font-label-sm text-label-sm text-primary bg-primary-fixed px-space-xs py-0.5 rounded-full" id="checklist-counter">2/4 Siap</span>
                </div>
                <p class="font-body-sm text-body-sm text-on-surface-variant mb-space-md">
                    Pastikan item berikut siap sebelum berangkat ke Warkop Kopi Sahabat besok malam:
                </p>
                <div class="flex flex-col gap-space-sm" id="interview-checklist">
                    <!-- Item 1 -->
                    <label class="flex items-start gap-space-sm p-space-sm rounded-xl bg-surface-container-low hover:bg-surface-container transition-colors cursor-pointer">
                        <input checked="" class="mt-1 w-4 h-4 text-primary rounded accent-primary cursor-pointer checklist-item" type="checkbox"/>
                        <div class="min-w-0 flex-1">
                            <span class="font-label-md text-label-md text-on-surface line-through opacity-75">Bawa KTM &amp; KTP Fisik Asli</span>
                            <p class="font-body-sm text-body-sm text-on-surface-variant">Sebagai verifikasi identitas resmi mahasiswa aktif.</p>
                        </div>
                    </label>
                    <!-- Item 2 -->
                    <label class="flex items-start gap-space-sm p-space-sm rounded-xl bg-surface-container-low hover:bg-surface-container transition-colors cursor-pointer">
                        <input checked="" class="mt-1 w-4 h-4 text-primary rounded accent-primary cursor-pointer checklist-item" type="checkbox"/>
                        <div class="min-w-0 flex-1">
                            <span class="font-label-md text-label-md text-on-surface line-through opacity-75">Cetak Jadwal Kuliah (FRS)</span>
                            <p class="font-body-sm text-body-sm text-on-surface-variant">Buktikan ketersediaan shift malam tanpa bentrok praktikum.</p>
                        </div>
                    </label>
                    <!-- Item 3 -->
                    <label class="flex items-start gap-space-sm p-space-sm rounded-xl bg-surface-container-low hover:bg-surface-container transition-colors cursor-pointer">
                        <input class="mt-1 w-4 h-4 text-primary rounded accent-primary cursor-pointer checklist-item" type="checkbox"/>
                        <div class="min-w-0 flex-1">
                            <span class="font-label-md text-label-md text-on-surface">Pakaian Rapi Kasual (Polo / Kemeja)</span>
                            <p class="font-body-sm text-body-sm text-on-surface-variant">Gunakan sepatu tertutup dan berpenampilan bersih.</p>
                        </div>
                    </label>
                    <!-- Item 4 -->
                    <label class="flex items-start gap-space-sm p-space-sm rounded-xl bg-surface-container-low hover:bg-surface-container transition-colors cursor-pointer">
                        <input class="mt-1 w-4 h-4 text-primary rounded accent-primary cursor-pointer checklist-item" type="checkbox"/>
                        <div class="min-w-0 flex-1">
                            <span class="font-label-md text-label-md text-on-surface">Hadir 15 Menit Lebih Awal (18:45 WIB)</span>
                            <p class="font-body-sm text-body-sm text-on-surface-variant">Waktu buffer mengantisipasi macet sekitar bundaran ITS.</p>
                        </div>
                    </label>
                </div>
            </div>

            <!-- Quick Tips Card: Trik Lolos Kerja Kafe & F&B -->
            <div class="rounded-xl bg-gradient-to-br from-primary-fixed to-surface-container-low p-space-lg shadow-sm">
                <div class="flex items-center gap-space-xs text-primary mb-space-xs">
                    <span class="material-symbols-outlined text-[24px]">tips_and_updates</span>
                    <span class="font-label-sm text-label-sm uppercase tracking-wider font-bold">Tips Cepat MABU</span>
                </div>
                <h3 class="font-headline-sm text-headline-sm text-on-surface mb-space-xs">Wawancara Kafe &amp; Warkop</h3>
                <p class="font-body-sm text-body-sm text-on-surface-variant mb-space-md">
                    Pemilik usaha lokal lebih memprioritaskan kejujuran, komitmen jam kerja, dan sikap ramah melayani ketimbang sertifikasi barista formal.
                </p>
                <ul class="space-y-space-xs text-on-surface font-body-sm text-body-sm">
                    <li class="flex items-start gap-space-xs">
                        <span class="material-symbols-outlined text-primary text-[18px] shrink-0">check_circle</span>
                        <span>Tunjukkan antusiasme belajar mesin espresso rumahan / POS kasir.</span>
                    </li>
                    <li class="flex items-start gap-space-xs">
                        <span class="material-symbols-outlined text-primary text-[18px] shrink-0">check_circle</span>
                        <span>Jelaskan solusi bila ada minggu UTS/UAS (misal: sistem tukar shift rekan).</span>
                    </li>
                </ul>
            </div>

            <!-- Accordion FAQ Mahasiswa Bekerja -->
            <div class="rounded-xl bg-surface-container-lowest p-space-lg shadow-sm">
                <div class="flex items-center gap-space-xs mb-space-md">
                    <span class="material-symbols-outlined text-secondary text-[22px]">help_outline</span>
                    <h2 class="font-headline-sm text-headline-sm text-on-surface">Bantuan &amp; FAQ Kerja</h2>
                </div>
                <div class="divide-y divide-transparent flex flex-col gap-space-sm" id="faq-container">
                    <!-- FAQ 1 -->
                    <div class="rounded-xl bg-surface-container-low overflow-hidden">
                        <button type="button" class="w-full p-space-md text-left flex items-center justify-between gap-2 font-label-md text-label-md text-on-surface faq-trigger">
                            <span>Bagaimana jika jadwal ujian bentrok shift?</span>
                            <span class="material-symbols-outlined text-[18px] transition-transform faq-icon">expand_more</span>
                        </button>
                        <div class="px-space-md pb-space-md font-body-sm text-body-sm text-on-surface-variant hidden faq-content">
                            Platform MABU menyediakan fitur 'Tukar Shift Rekan' maksimal H-2 sebelum jadwal. Pemilik mitra sudah menyetujui fleksibilitas akademik saat bermitra di MABU.
                        </div>
                    </div>
                    <!-- FAQ 2 -->
                    <div class="rounded-xl bg-surface-container-low overflow-hidden">
                        <button type="button" class="w-full p-space-md text-left flex items-center justify-between gap-2 font-label-md text-label-md text-on-surface faq-trigger">
                            <span>Kapan upah shift ditransfer?</span>
                            <span class="material-symbols-outlined text-[18px] transition-transform faq-icon">expand_more</span>
                        </button>
                        <div class="px-space-md pb-space-md font-body-sm text-body-sm text-on-surface-variant hidden faq-content">
                            Sistem MABU menerapkan rekonsiliasi harian dan mingguan via dompet saldo MABU (bisa ditarik ke BCA, Mandiri, GoPay, OVO) maksimal 1x24 jam setelah shift tuntas divalidasi QR code presensi.
                        </div>
                    </div>
                    <!-- FAQ 3 -->
                    <div class="rounded-xl bg-surface-container-low overflow-hidden">
                        <button type="button" class="w-full p-space-md text-left flex items-center justify-between gap-2 font-label-md text-label-md text-on-surface faq-trigger">
                            <span>Apakah paklaring MABU diakui kampus?</span>
                            <span class="material-symbols-outlined text-[18px] transition-transform faq-icon">expand_more</span>
                        </button>
                        <div class="px-space-md pb-space-md font-body-sm text-body-sm text-on-surface-variant hidden faq-content">
                            Ya! Surat Keterangan Kerja (e-Paklaring) MABU dilengkapi QR code verifikasi digital dan tanda tangan pemilik usaha yang valid untuk lampiran portofolio SKEM / MBKM mandiri.
                        </div>
                    </div>
                </div>
                <div class="mt-space-md pt-space-sm flex justify-center">
                    <a class="font-label-sm text-label-sm text-primary hover:underline flex items-center gap-1" href="#">
                        Hubungi Student Support MABU
                        <span class="material-symbols-outlined text-[16px]">arrow_forward</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Simple micro-interactions for checklist & accordions
    document.querySelectorAll('.checklist-item').forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            const labelText = this.closest('label').querySelector('.font-label-md');
            if (this.checked) {
                labelText.classList.add('line-through', 'opacity-75');
            } else {
                labelText.classList.remove('line-through', 'opacity-75');
            }

            // Update Counter
            const total = document.querySelectorAll('.checklist-item').length;
            const checked = document.querySelectorAll('.checklist-item:checked').length;
            const counter = document.getElementById('checklist-counter');
            if (counter) {
                counter.textContent = `${checked}/${total} Siap`;
            }
        });
    });

    // Accordion Toggle Behavior
    document.querySelectorAll('.faq-trigger').forEach(trigger => {
        trigger.addEventListener('click', function() {
            const content = this.nextElementSibling;
            const icon = this.querySelector('.faq-icon');
            const isHidden = content.classList.contains('hidden');

            // Close others
            document.querySelectorAll('.faq-content').forEach(c => c.classList.add('hidden'));
            document.querySelectorAll('.faq-icon').forEach(i => i.style.transform = 'rotate(0deg)');

            if (isHidden) {
                content.classList.remove('hidden');
                icon.style.transform = 'rotate(180deg)';
            }
        });
    });
</script>
@endpush
