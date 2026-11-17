@extends('layouts.mabu')

@section('title', 'Cari Lowongan Kerja - MABU')

@section('content')
<div class="space-y-6">

    <!-- Breadcrumb -->
    <div class="flex items-center gap-2 text-muted text-xs font-medium">
        <a class="hover:text-primary transition-colors" href="{{ route('mabu.dashboard') }}">Main Page</a>
        <span class="material-symbols-outlined text-[14px]">chevron_right</span>
        <span class="text-ink font-semibold">Cari Lowongan</span>
    </div>

    <!-- Header + Search -->
    <div class="flex flex-col md:flex-row md:items-end justify-between gap-4">
        <div class="space-y-0.5">
            <span class="text-[11px] uppercase tracking-wider text-primary font-bold">Portal Kerja Mahasiswa</span>
            <h1 class="font-heading text-2xl font-extrabold text-ink tracking-tight">Cari Lowongan Kerja</h1>
            <p class="text-sm text-muted">Pekerjaan paruh waktu, kasual, dan freelance yang ramah jadwal kuliah.</p>
        </div>
        <div
            class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-primary-light text-primary text-xs font-semibold self-start md:self-auto">
            <span class="w-2 h-2 rounded-full bg-tertiary-container animate-pulse"></span>
            <span class="text-ink">Jadwal semester ini: <strong class="font-semibold">Senin &amp; Kamis Luang
                    14:00+</strong></span>
        </div>
    </div>

    <!-- Search Bar -->
    <form method="GET" action="{{ route('mabu.lowongan.search') }}"
        class="bg-white p-2 rounded-full border border-slate-200/80 shadow-sm flex flex-col sm:flex-row items-center gap-3">
        <div class="flex items-center gap-3 pl-4 pr-2 w-full flex-1">
            <span class="material-symbols-outlined text-outline text-[22px] shrink-0">search</span>
            <input id="job-search-input" name="q"
                class="w-full bg-transparent border-0 outline-none text-sm text-ink placeholder:text-outline focus:ring-0"
                placeholder="Cari posisi, kafe, UMKM, atau kata kunci..." type="text">
        </div>
        <div class="hidden sm:block h-6 w-px bg-slate-200 shrink-0"></div>
        <div
            class="flex items-center gap-2 px-3 py-2 shrink-0 text-muted text-xs font-semibold cursor-pointer hover:text-primary transition-colors">
            <span class="material-symbols-outlined text-[18px] text-outline">location_on</span>
            <span>Sekitar Kampus ITS</span>
            <span class="material-symbols-outlined text-[18px]">expand_more</span>
        </div>
        <button
            class="w-full sm:w-auto px-6 py-3 rounded-full bg-primary-container hover:bg-primary text-white text-sm font-semibold transition-all shadow-xs flex items-center justify-center gap-2 shrink-0"
            type="submit">
            <span>Cari Pekerjaan</span>
            <span class="material-symbols-outlined text-[18px]">arrow_forward</span>
        </button>
    </form>

    <!-- Grid: hasil + filter -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-start">

        <!-- Kolom hasil -->
        <div class="lg:col-span-8 flex flex-col gap-4">
            <div class="flex items-center justify-between px-1">
                <div class="flex items-center gap-2 text-sm text-muted">
                    <span class="font-heading font-extrabold text-ink">24</span>
                    <span>lowongan cocok dengan preferensimu</span>
                </div>
                <div class="flex items-center gap-2 text-xs">
                    <span class="text-outline">Urutkan:</span>
                    <div class="relative inline-block">
                        <select name="sort"
                            class="bg-surface-container-high text-ink font-semibold rounded-full px-3.5 py-1.5 pr-7 text-xs outline-none cursor-pointer appearance-none">
                            <option value="match">Paling Sesuai Jadwal</option>
                            <option value="wage">Upah Tertinggi</option>
                            <option value="nearest">Terdekat dari Kampus</option>
                            <option value="newest">Terbaru Ditambahkan</option>
                        </select>
                        <span
                            class="material-symbols-outlined absolute right-2.5 top-2 text-[16px] text-outline pointer-events-none">expand_more</span>
                    </div>
                </div>
            </div>

            @php
                // ponytail: mockup statis — ganti $jobs dengan data dari LowonganController saat backend siap
                $jobs = [
                    [
                        'img' => 'https://images.unsplash.com/photo-1501339847302-ac426a4a7cbb?auto=format&fit=crop&w=1200&q=80',
                        'alt' => 'Kopi Kenangan Barista Atmosphere', 'initials' => 'KK',
                        'avatar' => 'bg-surface-container-high text-primary',
                        'title' => 'Barista Akhir Pekan',
                        'company' => 'Kopi Kenangan • Sukolilo, Surabaya',
                        'wage' => 'Rp 120.000', 'unit' => '/ shift (5 jam)',
                        'desc' => 'Menyiapkan pesanan minuman kopi, menjaga kebersihan area bar, dan melayani pelanggan dengan ramah di jam sibuk.',
                        'tags' => [
                            ['label' => 'Part-Time Weekend', 'class' => 'bg-primary-light text-primary'],
                            ['label' => '0.8 km dari ITS', 'class' => 'bg-surface-container-high text-muted', 'icon' => 'near_me'],
                            ['label' => 'Sore / Malam', 'class' => 'bg-emerald-50 text-tertiary-container'],
                        ],
                    ],
                    [
                        'img' => 'https://images.unsplash.com/photo-1509440159596-0249088772ff?auto=format&fit=crop&w=1200&q=80',
                        'alt' => 'Bakehouse Mulyosari atmosphere', 'initials' => 'BM',
                        'avatar' => 'bg-surface-container-high text-muted',
                        'title' => 'Crew Outlet & Kasir',
                        'company' => 'Bakehouse Mulyosari • Surabaya Timur',
                        'wage' => 'Rp 95.000', 'unit' => '/ shift (4 jam)',
                        'desc' => 'Operasional mesin POS, penataan display roti pagi, pengecekan inventaris rak, dan pencatatan kas harian.',
                        'tags' => [
                            ['label' => 'Shift Pagi (06:30 - 10:30)', 'class' => 'bg-primary-light text-primary'],
                            ['label' => '1.4 km dari ITS', 'class' => 'bg-surface-container-high text-muted', 'icon' => 'near_me'],
                            ['label' => '3 Hari/Minggu', 'class' => 'bg-surface-container-high text-muted'],
                        ],
                    ],
                    [
                        'img' => 'https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?auto=format&fit=crop&w=1200&q=80',
                        'alt' => 'Warehouse Packing and Shipping', 'initials' => 'TK',
                        'avatar' => 'bg-surface-container-high text-primary',
                        'title' => 'Admin Chat & Packing UMKM',
                        'company' => 'Toko Kreatif Gubeng • Surabaya Timur',
                        'wage' => 'Rp 110.000', 'unit' => '/ hari',
                        'desc' => 'Membalas chat marketplace (Shopee/Tokopedia), mencetak resi pengiriman, serta packing paket pesanan merchandise.',
                        'tags' => [
                            ['label' => 'Shift Fleksibel', 'class' => 'bg-primary-light text-primary'],
                            ['label' => '2.1 km dari ITS', 'class' => 'bg-surface-container-high text-muted', 'icon' => 'near_me'],
                            ['label' => 'Bisa Sambil Belajar', 'class' => 'bg-emerald-50 text-tertiary-container'],
                        ],
                    ],
                    [
                        'img' => 'https://images.unsplash.com/photo-1434030216411-0b793f4b4173?auto=format&fit=crop&w=1200&q=80',
                        'alt' => 'Tutoring Study Desk', 'initials' => 'BC',
                        'avatar' => 'bg-surface-container-high text-tertiary-container',
                        'title' => 'Tutor Privat Matematika SMP',
                        'company' => 'Bimbel Cerdas Mandiri • Mulyorejo, Surabaya',
                        'wage' => 'Rp 90.000', 'unit' => '/ sesi (90 mnt)',
                        'desc' => 'Mendampingi pemahaman konsep dasar aljabar & geometri siswa kelas 8, review PR harian, dan latihan soal PTS.',
                        'tags' => [
                            ['label' => 'Sore Hari (16:30 - 18:00)', 'class' => 'bg-primary-light text-primary'],
                            ['label' => '1.1 km dari ITS', 'class' => 'bg-surface-container-high text-muted', 'icon' => 'near_me'],
                            ['label' => '2x Seminggu', 'class' => 'bg-surface-container-high text-muted'],
                        ],
                    ],
                    [
                        'img' => 'https://images.unsplash.com/photo-1542744094-3a31f272c490?auto=format&fit=crop&w=1200&q=80',
                        'alt' => 'Creative Design Workspace', 'initials' => 'SM',
                        'avatar' => 'bg-surface-container-high text-primary',
                        'title' => 'Desain Grafis Konten Medsos',
                        'company' => 'Surabaya Media Hub • Remote / Hybrid',
                        'wage' => 'Rp 150.000', 'unit' => '/ project paket',
                        'desc' => 'Membuat 6 feed carousel Instagram dan cover video TikTok mingguan dengan template Canva/Figma yang sudah disiapkan.',
                        'tags' => [
                            ['label' => 'Work From Kost (Remote)', 'class' => 'bg-primary-light text-primary'],
                            ['label' => 'Fleksibel Waktu', 'class' => 'bg-surface-container-high text-muted', 'icon' => 'laptop_mac'],
                        ],
                    ],
                    [
                        'img' => 'https://images.unsplash.com/photo-1551024709-8f23befc6f87?auto=format&fit=crop&w=1200&q=80',
                        'alt' => 'Boba Beverage Booth', 'initials' => 'TB',
                        'avatar' => 'bg-surface-container-high text-muted',
                        'title' => 'Staff Booth Minuman Kekinian',
                        'company' => 'Teh Nusantara • East Coast Mall, Laguna',
                        'wage' => 'Rp 100.000', 'unit' => '/ shift (5 jam)',
                        'desc' => 'Menyajikan cup teh rasa, menerima transaksi QRIS, serta menjaga kebersihan booth selama event akhir pekan berlangsung.',
                        'tags' => [
                            ['label' => 'Event 3 Hari (Jumat-Minggu)', 'class' => 'bg-primary-light text-primary'],
                            ['label' => '2.5 km dari ITS', 'class' => 'bg-surface-container-high text-muted', 'icon' => 'near_me'],
                            ['label' => 'Makan Disediakan', 'class' => 'bg-emerald-50 text-tertiary-container'],
                        ],
                    ],
                ];
            @endphp

            @foreach ($jobs as $job)
                <article
                    class="group bg-white rounded-2xl border border-slate-200/80 shadow-xs hover:shadow-lg hover:shadow-blue-600/10 transition-all duration-200 overflow-hidden">
                    <div class="relative h-28 overflow-hidden">
                        <img src="{{ $job['img'] }}" alt="{{ $job['alt'] }}" class="w-full h-full object-cover"
                            style="filter: blur(1.5px); transform: scale(1.04);">
                        <div class="absolute inset-0 bg-gradient-to-t from-white via-white/40 to-transparent"></div>
                    </div>
                    <div class="p-6 pt-2 flex flex-col gap-4">
                        <div class="flex items-start justify-between gap-4">
                            <div class="flex items-start gap-3.5 min-w-0">
                                <div
                                    class="w-11 h-11 rounded-lg font-heading font-bold flex items-center justify-center shrink-0 {{ $job['avatar'] }}">
                                    {{ $job['initials'] }}</div>
                                <div class="min-w-0">
                                    <div class="flex items-center gap-2 flex-wrap">
                                        <h2
                                            class="font-heading font-bold text-ink group-hover:text-primary transition-colors truncate">
                                            {{ $job['title'] }}</h2>
                                        <span
                                            class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full bg-surface-container-high text-primary text-[11px] font-bold"><span
                                                class="material-symbols-outlined text-[13px]">verified</span>
                                            Terverifikasi</span>
                                    </div>
                                    <p class="text-xs text-muted truncate mt-1">{{ $job['company'] }}</p>
                                </div>
                            </div>
                            <div class="text-right shrink-0">
                                <span class="font-heading font-extrabold text-ink">{{ $job['wage'] }}</span>
                                <span class="block text-xs text-outline mt-0.5">{{ $job['unit'] }}</span>
                            </div>
                        </div>
                        <p class="text-xs text-muted line-clamp-1">{{ $job['desc'] }}</p>
                        <div class="flex items-center justify-between gap-4">
                            <div class="flex items-center gap-2 flex-wrap">
                                @foreach ($job['tags'] as $tag)
                                    <span
                                        class="inline-flex items-center gap-1 px-3 py-1 rounded-full text-[11px] font-semibold {{ $tag['class'] }}">
                                        @if (!empty($tag['icon']))<span
                                                class="material-symbols-outlined text-[13px]">{{ $tag['icon'] }}</span>@endif
                                        {{ $tag['label'] }}
                                    </span>
                                @endforeach
                            </div>
                            <div class="flex items-center gap-2 shrink-0">
                                <button
                                    class="w-9 h-9 rounded-full flex items-center justify-center text-outline hover:text-primary hover:bg-surface-container-low transition-colors"
                                    title="Simpan Lowongan" type="button"><span
                                        class="material-symbols-outlined text-[18px]">bookmark</span></button>
                                <button
                                    class="px-5 py-2 rounded-full bg-primary-container hover:bg-primary text-white text-xs font-semibold transition-all shadow-xs"
                                    type="button">Lamar</button>
                            </div>
                        </div>
                    </div>
                </article>
            @endforeach

            <!-- Pagination (statis) -->
            <div class="flex items-center justify-between pt-4 px-1">
                <span class="text-xs text-muted">Menampilkan 1-6 dari 24 lowongan</span>
                <div class="flex items-center gap-2">
                    <button
                        class="w-9 h-9 rounded-full bg-surface-container-low flex items-center justify-center text-muted hover:bg-surface-container-high transition-colors disabled:opacity-40"
                        disabled type="button"><span class="material-symbols-outlined text-[18px]">chevron_left</span></button>
                    <button class="w-9 h-9 rounded-full bg-primary-container text-white text-xs font-semibold"
                        type="button">1</button>
                    <button
                        class="w-9 h-9 rounded-full bg-surface-container-low text-ink text-xs font-semibold hover:bg-surface-container-high transition-colors"
                        type="button">2</button>
                    <button
                        class="w-9 h-9 rounded-full bg-surface-container-low text-ink text-xs font-semibold hover:bg-surface-container-high transition-colors"
                        type="button">3</button>
                    <button
                        class="w-9 h-9 rounded-full bg-surface-container-low flex items-center justify-center text-muted hover:bg-surface-container-high transition-colors"
                        type="button"><span class="material-symbols-outlined text-[18px]">chevron_right</span></button>
                </div>
            </div>
        </div>

        <!-- Panel filter -->
        <aside class="lg:col-span-4 bg-white rounded-2xl border border-slate-200/80 shadow-xs p-6 flex flex-col gap-6 sticky top-20">
            <div class="flex items-center justify-between pb-3 border-b border-slate-100">
                <div class="flex items-center gap-2.5">
                    <span class="material-symbols-outlined text-[20px] text-primary">tune</span>
                    <h3 class="font-heading font-bold text-ink">Filter</h3>
                </div>
                <button type="button"
                    class="text-xs text-primary font-semibold transition-colors flex items-center gap-1 py-1 px-2.5 rounded-lg hover:bg-surface-container-low">
                    <span class="material-symbols-outlined text-[16px]">restart_alt</span>
                    <span>Reset Filter</span>
                </button>
            </div>

            <div class="flex flex-col gap-3">
                <span class="text-[11px] uppercase tracking-wider text-outline font-bold">Bidang Pekerjaan</span>
                <div class="flex flex-col gap-2.5">
                    <label class="flex items-center justify-between cursor-pointer group py-0.5">
                        <div class="flex items-center gap-3"><input checked name="bidang[]" value="f-b"
                                class="w-4 h-4 rounded focus:ring-0 cursor-pointer accent-primary"
                                type="checkbox"><span
                                class="text-sm text-ink group-hover:text-primary transition-colors">F&B &amp;
                                Barista</span></div><span
                            class="text-[11px] text-outline px-2 py-0.5 rounded-full bg-surface-container-low">12</span>
                    </label>
                    <label class="flex items-center justify-between cursor-pointer group py-0.5">
                        <div class="flex items-center gap-3"><input checked name="bidang[]" value="admin-operasional"
                                class="w-4 h-4 rounded focus:ring-0 cursor-pointer accent-primary"
                                type="checkbox"><span
                                class="text-sm text-ink group-hover:text-primary transition-colors">Admin &amp;
                                Operasional</span></div><span
                            class="text-[11px] text-outline px-2 py-0.5 rounded-full bg-surface-container-low">8</span>
                    </label>
                    <label class="flex items-center justify-between cursor-pointer group py-0.5">
                        <div class="flex items-center gap-3"><input name="bidang[]" value="kasir-retail"
                                class="w-4 h-4 rounded focus:ring-0 cursor-pointer accent-primary"
                                type="checkbox"><span
                                class="text-sm text-ink group-hover:text-primary transition-colors">Kasir &amp;
                                Retail</span></div><span
                            class="text-[11px] text-outline px-2 py-0.5 rounded-full bg-surface-container-low">9</span>
                    </label>
                    <label class="flex items-center justify-between cursor-pointer group py-0.5">
                        <div class="flex items-center gap-3"><input name="bidang[]" value="tutor-edukasi"
                                class="w-4 h-4 rounded focus:ring-0 cursor-pointer accent-primary"
                                type="checkbox"><span
                                class="text-sm text-ink group-hover:text-primary transition-colors">Tutor &amp;
                                Edukasi</span></div><span
                            class="text-[11px] text-outline px-2 py-0.5 rounded-full bg-surface-container-low">5</span>
                    </label>
                    <label class="flex items-center justify-between cursor-pointer group py-0.5">
                        <div class="flex items-center gap-3"><input checked name="bidang[]" value="desain-media"
                                class="w-4 h-4 rounded focus:ring-0 cursor-pointer accent-primary"
                                type="checkbox"><span
                                class="text-sm text-ink group-hover:text-primary transition-colors">Desain &amp;
                                Media</span></div><span
                            class="text-[11px] text-outline px-2 py-0.5 rounded-full bg-surface-container-low">6</span>
                    </label>
                </div>
            </div>

            <div class="h-px w-full bg-slate-100"></div>

            <div class="flex flex-col gap-3">
                <div class="flex items-center justify-between">
                    <span class="text-[11px] uppercase tracking-wider text-outline font-bold">Waktu &amp; Jadwal
                        Kuliah</span>
                    <span class="text-[11px] text-tertiary-container font-bold">Sinkron KRS</span>
                </div>
                <div class="flex flex-col gap-2.5">
                    <label class="flex items-center gap-3 cursor-pointer group py-0.5"><input checked name="waktu[]"
                            value="sore" class="w-4 h-4 rounded focus:ring-0 cursor-pointer accent-primary"
                            type="checkbox"><span
                            class="text-sm text-ink group-hover:text-primary transition-colors">Shift Sore
                            (17:00+)</span></label>
                    <label class="flex items-center gap-3 cursor-pointer group py-0.5"><input checked name="waktu[]"
                            value="akhir-pekan" class="w-4 h-4 rounded focus:ring-0 cursor-pointer accent-primary"
                            type="checkbox"><span
                            class="text-sm text-ink group-hover:text-primary transition-colors">Akhir Pekan (Sabtu -
                            Minggu)</span></label>
                    <label class="flex items-center gap-3 cursor-pointer group py-0.5"><input name="waktu[]"
                            value="pagi" class="w-4 h-4 rounded focus:ring-0 cursor-pointer accent-primary"
                            type="checkbox"><span
                            class="text-sm text-ink group-hover:text-primary transition-colors">Pagi (Sebelum
                            Kelas)</span></label>
                    <label class="flex items-center gap-3 cursor-pointer group py-0.5"><input name="waktu[]"
                            value="fleksibel" class="w-4 h-4 rounded focus:ring-0 cursor-pointer accent-primary"
                            type="checkbox"><span
                            class="text-sm text-ink group-hover:text-primary transition-colors">Fleksibel / Jam
                            Bebas</span></label>
                </div>
            </div>

            <div class="h-px w-full bg-slate-100"></div>

            <div class="flex flex-col gap-3">
                <span class="text-[11px] uppercase tracking-wider text-outline font-bold">Tipe Kontrak</span>
                <div class="flex flex-col gap-2.5">
                    <label class="flex items-center gap-3 cursor-pointer group py-0.5"><input checked name="kontrak[]"
                            value="part-time" class="w-4 h-4 rounded focus:ring-0 cursor-pointer accent-primary"
                            type="checkbox"><span
                            class="text-sm text-ink group-hover:text-primary transition-colors">Paruh Waktu
                            (Part-Time)</span></label>
                    <label class="flex items-center gap-3 cursor-pointer group py-0.5"><input name="kontrak[]"
                            value="harian" class="w-4 h-4 rounded focus:ring-0 cursor-pointer accent-primary"
                            type="checkbox"><span
                            class="text-sm text-ink group-hover:text-primary transition-colors">Harian / Kasual
                            Event</span></label>
                    <label class="flex items-center gap-3 cursor-pointer group py-0.5"><input name="kontrak[]"
                            value="magang" class="w-4 h-4 rounded focus:ring-0 cursor-pointer accent-primary"
                            type="checkbox"><span
                            class="text-sm text-ink group-hover:text-primary transition-colors">Magang UMKM</span></label>
                </div>
            </div>

            <div class="h-px w-full bg-slate-100"></div>

            <div class="flex flex-col gap-3">
                <span class="text-[11px] uppercase tracking-wider text-outline font-bold">Kisaran Upah / Shift</span>
                <div class="flex flex-col gap-2.5">
                    <label class="flex items-center gap-3 cursor-pointer py-0.5"><input name="wage_range" value="semua"
                            class="w-4 h-4 focus:ring-0 cursor-pointer accent-primary" type="radio"><span
                            class="text-sm text-ink">Semua Besaran</span></label>
                    <label class="flex items-center gap-3 cursor-pointer py-0.5"><input checked name="wage_range"
                            value="80-150" class="w-4 h-4 focus:ring-0 cursor-pointer accent-primary"
                            type="radio"><span
                            class="text-sm text-ink">Rp 80.000 - Rp 150.000</span></label>
                    <label class="flex items-center gap-3 cursor-pointer py-0.5"><input name="wage_range" value="150+"
                            class="w-4 h-4 focus:ring-0 cursor-pointer accent-primary" type="radio"><span
                            class="text-sm text-ink">&gt; Rp 150.000 / shift</span></label>
                </div>
            </div>

            <div class="h-px w-full bg-slate-100"></div>

            <div class="flex flex-col gap-3">
                <span class="text-[11px] uppercase tracking-wider text-outline font-bold">Radius dari Kampus ITS</span>
                <div class="grid grid-cols-3 gap-2">
                    <button
                        class="py-2 px-2.5 rounded-lg bg-surface-container-high text-primary text-[11px] font-bold text-center"
                        type="button">&lt; 2 km</button>
                    <button
                        class="py-2 px-2.5 rounded-lg bg-surface-container-low text-muted text-[11px] font-semibold text-center hover:bg-surface-container-high transition-colors"
                        type="button">&lt; 5 km</button>
                    <button
                        class="py-2 px-2.5 rounded-lg bg-surface-container-low text-muted text-[11px] font-semibold text-center hover:bg-surface-container-high transition-colors"
                        type="button">Semua</button>
                </div>
            </div>

            <div class="p-4 rounded-xl bg-surface-container-low flex items-start gap-3">
                <span class="material-symbols-outlined text-primary text-[20px] shrink-0 mt-0.5">tips_and_updates</span>
                <div class="flex flex-col">
                    <span class="text-[11px] text-ink font-semibold">Tips Mahasiswa MABU</span>
                    <span class="text-xs text-muted mt-1 leading-normal">Pilihlah pekerjaan berjarak &lt; 2 km agar
                        hemat bensin dan waktu transit kuliah.</span>
                </div>
            </div>
        </aside>
    </div>
</div>
@endsection
