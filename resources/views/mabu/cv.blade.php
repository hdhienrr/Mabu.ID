@extends('layouts.mabu')

@section('title', 'Pembuat CV Otomatis - MABU')

@section('content')
<div class="flex flex-col w-full">
    <!-- Top Command & Action Bar -->
    <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-space-md mb-space-lg">
        <div class="flex flex-col gap-space-xs">
            <div class="flex items-center gap-space-sm flex-wrap">
                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-primary/10 text-primary font-label-sm text-label-sm tracking-wide uppercase">
                    <span class="w-2 h-2 rounded-full bg-primary animate-pulse"></span>
                    MABU SMART CV V2.4 • Auto-Sync Aktif
                </span>
                <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full bg-tertiary-fixed text-on-tertiary-fixed font-label-sm text-label-sm">
                    <span class="material-symbols-outlined text-[14px]">verified</span> Terverifikasi ITS
                </span>
            </div>
            <h1 class="font-headline-lg text-headline-lg text-on-surface tracking-tight mt-1">
                Pembuat CV Otomatis MABU
            </h1>
            <p class="font-body-md text-body-md text-on-surface-variant max-w-2xl">
                CV profesional khusus kerja sampingan &amp; UMKM langsung terisi otomatis dari profil terverifikasi, jadwal perkuliahan, dan riwayat shift suksesmu.
            </p>
        </div>

        <!-- Action Group -->
        <div class="flex items-center gap-space-sm flex-wrap shrink-0">
            <a class="inline-flex items-center gap-1.5 px-4 py-2.5 rounded-full bg-surface-container-lowest text-on-surface font-label-lg text-label-lg shadow-sm hover:bg-surface-container transition-all" href="{{ route('mabu.profil') }}">
                <span class="material-symbols-outlined text-[18px]">edit_note</span>
                Edit Data Profil
            </a>
            <button type="button" class="inline-flex items-center gap-1.5 px-4 py-2.5 rounded-full bg-surface-container-lowest text-on-surface font-label-lg text-label-lg shadow-sm hover:bg-surface-container transition-all" onclick="window.print()">
                <span class="material-symbols-outlined text-[18px]">print</span>
                Cetak CV
            </button>
            <button type="button" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-full bg-primary-container text-on-primary font-label-lg text-label-lg shadow-md hover:bg-primary transition-all shadow-primary/20" id="downloadPdfBtn">
                <span class="material-symbols-outlined text-[20px]">download</span>
                Download PDF Resmi
            </button>
        </div>
    </div>

    <!-- Dual Pane Workspace -->
    <div class="grid grid-cols-1 xl:grid-cols-12 gap-space-lg items-start">
        <!-- LEFT PANEL: Controls, Sync & Customizer (5 cols on XL) -->
        <div class="xl:col-span-5 flex flex-col gap-space-lg">
            <!-- Sync Status Card -->
            <div class="p-space-md rounded-xl bg-surface-container-lowest shadow-sm flex flex-col gap-space-sm relative overflow-hidden">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-space-sm">
                        <div class="w-10 h-10 rounded-full bg-primary-fixed flex items-center justify-center text-primary font-headline-sm text-headline-sm">
                            AC
                        </div>
                        <div class="flex flex-col min-w-0">
                            <span class="font-label-lg text-label-lg text-on-surface truncate">Andika Candra</span>
                            <span class="font-body-sm text-body-sm text-on-surface-variant">Tersinkron profil aktif MABU</span>
                        </div>
                    </div>
                    <span class="font-label-md text-label-md px-2.5 py-1 rounded-full bg-primary-container/10 text-primary-container font-bold">
                        80% Lengkap
                    </span>
                </div>
                <!-- Progress Track -->
                <div class="w-full bg-surface-container h-2 rounded-full overflow-hidden mt-1">
                    <div class="bg-primary-container h-full rounded-full transition-all duration-500" style="width: 80%;"></div>
                </div>
                <div class="flex items-center justify-between text-on-surface-variant font-body-sm text-body-sm pt-1">
                    <span class="flex items-center gap-1">
                        <span class="material-symbols-outlined text-tertiary text-[16px]">check_circle</span>
                        Transkrip Shift &amp; Jadwal Terhubung
                    </span>
                    <a class="text-primary hover:underline font-label-sm text-label-sm" href="{{ route('mabu.profil') }}">+ Portofolio</a>
                </div>
            </div>

            <!-- Template Selector (Specifically for UMKM & Student side-jobs) -->
            <div class="p-space-md rounded-xl bg-surface-container-lowest shadow-sm flex flex-col gap-space-md">
                <div class="flex items-center justify-between">
                    <div class="flex flex-col">
                        <span class="font-headline-sm text-headline-sm text-on-surface">Template Khusus UMKM</span>
                        <span class="font-body-sm text-body-sm text-on-surface-variant">Dioptimalkan untuk membaca cepat &amp; kriteria pemilik usaha</span>
                    </div>
                    <span class="material-symbols-outlined text-primary text-[24px]">palette</span>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-space-sm">
                    <!-- Template 1: F&B Selected -->
                    <div class="p-3 rounded-xl bg-primary-container/10 flex flex-col justify-between gap-3 cursor-pointer transition-all shadow-sm">
                        <div class="flex items-start justify-between">
                            <div class="w-8 h-8 rounded-lg bg-primary-container text-on-primary flex items-center justify-center">
                                <span class="material-symbols-outlined text-[18px]">local_cafe</span>
                            </div>
                            <span class="inline-flex items-center px-2 py-0.5 rounded-full bg-primary text-on-primary font-label-sm text-label-sm">
                                Aktif
                            </span>
                        </div>
                        <div>
                            <span class="font-label-md text-label-md text-on-surface block">F&amp;B &amp; Barista Modern</span>
                            <p class="font-body-sm text-body-sm text-on-surface-variant leading-tight mt-0.5">Fokus racik kopi, sanitasi 5S, shift malam kafe.</p>
                        </div>
                    </div>

                    <!-- Template 2: Retail -->
                    <div class="p-3 rounded-xl bg-surface-container-low hover:bg-surface-container flex flex-col justify-between gap-3 cursor-pointer transition-all">
                        <div class="flex items-start justify-between">
                            <div class="w-8 h-8 rounded-lg bg-surface-container text-on-surface flex items-center justify-center">
                                <span class="material-symbols-outlined text-[18px]">point_of_sale</span>
                            </div>
                            <span class="text-on-surface-variant font-label-sm text-label-sm">UMKM</span>
                        </div>
                        <div>
                            <span class="font-label-md text-label-md text-on-surface block">Retail &amp; Kasir POS</span>
                            <p class="font-body-sm text-body-sm text-on-surface-variant leading-tight mt-0.5">Ketelitian kasir tablet, stok opname &amp; rekap kas.</p>
                        </div>
                    </div>

                    <!-- Template 3: Tutor -->
                    <div class="p-3 rounded-xl bg-surface-container-low hover:bg-surface-container flex flex-col justify-between gap-3 cursor-pointer transition-all">
                        <div class="flex items-start justify-between">
                            <div class="w-8 h-8 rounded-lg bg-surface-container text-on-surface flex items-center justify-center">
                                <span class="material-symbols-outlined text-[18px]">school</span>
                            </div>
                            <span class="text-on-surface-variant font-label-sm text-label-sm">Bimbel</span>
                        </div>
                        <div>
                            <span class="font-label-md text-label-md text-on-surface block">Akademik &amp; Tutor</span>
                            <p class="font-body-sm text-body-sm text-on-surface-variant leading-tight mt-0.5">Tonjolkan IPK ITS, matematika dasar, &amp; materi ajar.</p>
                        </div>
                    </div>

                    <!-- Template 4: Creative -->
                    <div class="p-3 rounded-xl bg-surface-container-low hover:bg-surface-container flex flex-col justify-between gap-3 cursor-pointer transition-all">
                        <div class="flex items-start justify-between">
                            <div class="w-8 h-8 rounded-lg bg-surface-container text-on-surface flex items-center justify-center">
                                <span class="material-symbols-outlined text-[18px]">movie_edit</span>
                            </div>
                            <span class="text-on-surface-variant font-label-sm text-label-sm">Digital</span>
                        </div>
                        <div>
                            <span class="font-label-md text-label-md text-on-surface block">Creative &amp; Social Media</span>
                            <p class="font-body-sm text-body-sm text-on-surface-variant leading-tight mt-0.5">Pengelolaan Instagram Reels, TikTok, Canva &amp; CapCut.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Live Customization & Smart Toggles -->
            <div class="p-space-md rounded-xl bg-surface-container-lowest shadow-sm flex flex-col gap-space-md">
                <span class="font-headline-sm text-headline-sm text-on-surface">Kustomisasi Cepat &amp; Visibilitas</span>

                <!-- Accent Color Picker -->
                <div class="flex flex-col gap-space-xs">
                    <label class="font-label-md text-label-md text-on-surface-variant">Pilihan Aksen Warna Dokumen</label>
                    <div class="flex items-center gap-space-sm pt-1">
                        <button type="button" class="w-8 h-8 rounded-full bg-primary flex items-center justify-center shadow-md shadow-primary/30" title="Royal Blue (MABU Default)">
                            <span class="material-symbols-outlined text-white text-[16px]">check</span>
                        </button>
                        <button type="button" class="w-8 h-8 rounded-full bg-inverse-surface flex items-center justify-center hover:opacity-90" title="Hitam Klasik"></button>
                        <button type="button" class="w-8 h-8 rounded-full bg-tertiary flex items-center justify-center hover:opacity-90" title="Emerald Fresh"></button>
                        <span class="font-body-sm text-body-sm text-on-surface-variant ml-2">Royal Blue (Paling disukai owner UMKM)</span>
                    </div>
                </div>

                <!-- Dynamic Toggles -->
                <div class="flex flex-col gap-3 pt-2">
                    <!-- Toggle 1: Shift Availability -->
                    <label class="flex items-start gap-space-sm p-3 rounded-lg bg-surface-container-low cursor-pointer hover:bg-surface-container transition-colors">
                        <input checked="" class="mt-1 w-4 h-4 rounded text-primary focus:ring-primary" id="toggleShift" type="checkbox"/>
                        <div class="flex flex-col min-w-0">
                            <span class="font-label-md text-label-md text-on-surface flex items-center gap-1.5">
                                Ketersediaan Shift Bebas Kuliah
                                <span class="bg-tertiary/10 text-tertiary text-[10px] px-1.5 py-0.2 rounded font-bold uppercase">Sangat Dianjurkan</span>
                            </span>
                            <p class="font-body-sm text-body-sm text-on-surface-variant">
                                Otomatis menampilkan jam kosong perkuliahan (Sore/Malam &amp; Weekend) agar owner langsung tahu kamu siap kerja.
                            </p>
                        </div>
                    </label>

                    <!-- Toggle 2: MABU Reputation Badge -->
                    <label class="flex items-start gap-space-sm p-3 rounded-lg bg-surface-container-low cursor-pointer hover:bg-surface-container transition-colors">
                        <input checked="" class="mt-1 w-4 h-4 rounded text-primary focus:ring-primary" id="toggleBadge" type="checkbox"/>
                        <div class="flex flex-col min-w-0">
                            <span class="font-label-md text-label-md text-on-surface">Badge Reputasi &amp; Ulasan MABU</span>
                            <p class="font-body-sm text-body-sm text-on-surface-variant">
                                Tampilkan rating <strong class="text-on-surface">4.9 / 5.0</strong> dari 12 shift kerja tuntas dan kehadiran 100%.
                            </p>
                        </div>
                    </label>

                    <!-- Toggle 3: WhatsApp Hyperlink -->
                    <label class="flex items-start gap-space-sm p-3 rounded-lg bg-surface-container-low cursor-pointer hover:bg-surface-container transition-colors">
                        <input checked="" class="mt-1 w-4 h-4 rounded text-primary focus:ring-primary" id="toggleWa" type="checkbox"/>
                        <div class="flex flex-col min-w-0">
                            <span class="font-label-md text-label-md text-on-surface">Tombol WhatsApp Langsung Aktif</span>
                            <p class="font-body-sm text-body-sm text-on-surface-variant">
                                Menyematkan tautan direct wa.me di PDF sehingga HR / Owner Kafe bisa klik untuk langsung wawancara.
                            </p>
                        </div>
                    </label>
                </div>
            </div>

            <!-- Quick Tips Card for F&B Job Applicants -->
            <div class="p-space-md rounded-xl bg-gradient-to-br from-primary/10 via-surface-container-low to-surface-container-lowest shadow-sm flex items-start gap-space-sm">
                <div class="w-10 h-10 rounded-full bg-primary/20 text-primary flex items-center justify-center shrink-0">
                    <span class="material-symbols-outlined text-[22px]">lightbulb</span>
                </div>
                <div class="flex flex-col">
                    <span class="font-label-md text-label-md text-primary">Tips Lamar Kerja Kafe &amp; Barista</span>
                    <p class="font-body-sm text-body-sm text-on-surface-variant mt-0.5">
                        Owner UMKM F&amp;B 87% lebih memilih mahasiswa yang mencantumkan jam bebas kuliah jelas dan pengalaman mesin espresso real daripada IPK teoritis.
                    </p>
                </div>
            </div>
        </div>

        <!-- RIGHT PANEL: Live A4 Realtime Sheet Preview (7 cols on XL) -->
        <div class="xl:col-span-7 flex flex-col items-center">
            <!-- Top Preview Hint -->
            <div class="w-full flex items-center justify-between mb-2 px-1">
                <span class="font-label-sm text-label-sm text-on-surface-variant flex items-center gap-1 uppercase tracking-wider">
                    <span class="w-2 h-2 rounded-full bg-tertiary"></span> Pratinjau Dokumen Cetak A4 (Skala Realtime 100%)
                </span>
                <span class="font-body-sm text-body-sm text-on-surface-variant bg-surface-container px-2 py-0.5 rounded">
                    Ukuran: A4 Standar HRD
                </span>
            </div>

            <!-- The Real A4 Sheet Container -->
            <div class="w-full bg-white text-[#1E293B] rounded-xl shadow-xl p-8 sm:p-10 flex flex-col gap-6 relative select-none font-body-md overflow-hidden" id="cvDocumentSheet">
                <!-- CV Header: Profile Photo, Name, Roles & MABU Badge -->
                <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-space-md pb-6 bg-gradient-to-r from-transparent via-transparent to-primary/5 rounded-lg">
                    <div class="flex items-center gap-space-md">
                        <!-- Profile Photo Placeholder -->
                        <div class="relative shrink-0">
                            <img class="w-20 h-20 sm:w-24 sm:h-24 rounded-2xl object-cover shadow-md shadow-slate-200" alt="Foto Profil Andika Candra" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBTWMmeeJMoK8yE9ICGiRXkCAO8noz-DkGAniauMTV__42DzDyDUMUftIMgG-Pb9ijV-4ovsZcnH20Vy6XAPAcofpIwbJm9-dIM_z4L_LpwzU0yVWbF5QffogV_bhNLhsXAullf46aDJhwCrPPZUVD8eUFSDD9W2DAhKdmsEvE_694OR27XsDa7MxrexmqeRKrKW1kyoxXnWKYAFsUT15n6WcNYcdNeEwWn6lOalok"/>
                            <span class="absolute -bottom-1.5 -right-1.5 w-6 h-6 rounded-full bg-tertiary text-white flex items-center justify-center text-[12px] shadow-sm" title="Profil Terverifikasi">
                                <span class="material-symbols-outlined text-[14px]">check</span>
                            </span>
                        </div>
                        <div class="flex flex-col min-w-0">
                            <h2 class="font-headline-lg text-headline-lg text-slate-900 leading-tight font-bold tracking-tight">
                                Andika Candra
                            </h2>
                            <span class="font-label-lg text-label-lg text-primary font-semibold mt-0.5">
                                Barista &amp; Mahasiswa S1 Teknik Informatika ITS
                            </span>
                            <!-- Badges Row -->
                            <div class="flex items-center gap-2 mt-2 flex-wrap" id="cvBadgeRating">
                                <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full bg-emerald-50 text-emerald-800 font-label-sm text-label-sm font-bold">
                                    <span class="material-symbols-outlined text-[14px] text-amber-500 fill-1">star</span>
                                    4.9 / 5.0 (12 Shift Sukses MABU)
                                </span>
                                <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full bg-blue-50 text-blue-700 font-label-sm text-label-sm font-medium">
                                    <span class="material-symbols-outlined text-[14px]">schedule</span> 100% Kehadiran Tepat Waktu
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Quick QR for Instant Verification -->
                    <div class="hidden sm:flex flex-col items-center bg-slate-50 p-2 rounded-xl shrink-0">
                        <svg class="w-14 h-14 text-slate-800" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M2 2h8v8H2V2zm2 2v4h4V4H4zm8-2h8v8h-8V2zm2 2v4h4V4h-4zM2 14h8v8H2v-8zm2 2v4h4v-4H4zm11 0h2v2h-2v-2zm3 0h3v5h-2v-3h-1v-2zm-3 3h2v3h-2v-3zm5 2h2v3h-2v-3zm-2 2h2v1h-2v-1z"></path>
                        </svg>
                        <span class="text-[9px] font-mono text-slate-500 mt-1 uppercase tracking-tighter">Scan Profil HR</span>
                    </div>
                </div>

                <!-- Contact Bar (Interactive / Hyperlink Ready) -->
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-2 py-3 px-4 rounded-xl bg-slate-50 text-slate-600 font-body-sm text-body-sm">
                    <div class="flex items-center gap-2 truncate">
                        <span class="material-symbols-outlined text-primary text-[18px]">chat</span>
                        <span class="truncate font-medium text-slate-800" id="cvWaContact">
                            <a href="https://wa.me/6281234567890" target="_blank" class="text-primary hover:underline font-medium">+62 812-3456-7890 (WA Aktif)</a>
                        </span>
                    </div>
                    <div class="flex items-center gap-2 truncate">
                        <span class="material-symbols-outlined text-primary text-[18px]">mail</span>
                        <span class="truncate">andika.candra@student.its.ac.id</span>
                    </div>
                    <div class="flex items-center gap-2 truncate">
                        <span class="material-symbols-outlined text-primary text-[18px]">location_on</span>
                        <span class="truncate">Sukolilo, Surabaya Timur</span>
                    </div>
                </div>

                <!-- Ringkasan Profil (Executive Summary) -->
                <div class="flex flex-col gap-1.5">
                    <div class="flex items-center gap-2">
                        <span class="w-2.5 h-2.5 rounded-full bg-primary"></span>
                        <h3 class="font-headline-sm text-headline-sm text-slate-900 tracking-tight font-bold">Ringkasan Profil</h3>
                    </div>
                    <p class="font-body-md text-body-md text-slate-600 leading-relaxed text-justify">
                        Mahasiswa aktif semester 5 Teknik Informatika ITS yang cekatan, jujur, dan memiliki etos kerja tinggi. Terbiasa mengelola ritme kerja kafe cepat dengan jam terbang <strong>100+ jam kerja riil</strong> di sektor Food &amp; Beverage. Memiliki keterampilan kalibrasi espresso, latte art dasar, dan pengoperasian mesin kasir POS modern, dengan riwayat shift yang terorganisir tanpa mengganggu jadwal akademik.
                    </p>
                </div>

                <!-- Ketersediaan Jam Shift (Special Key Selling Point for UMKM) -->
                <div class="p-4 rounded-xl bg-blue-50/70 flex flex-col gap-2" id="cvShiftSection">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <span class="material-symbols-outlined text-primary text-[20px]">calendar_clock</span>
                            <h3 class="font-headline-sm text-headline-sm text-primary font-bold">Jadwal Bebas Kuliah &amp; Kesiapan Shift</h3>
                        </div>
                        <span class="font-label-sm text-label-sm px-2 py-0.5 rounded-full bg-primary text-white uppercase font-bold">
                            Bebas Bentrok Kuliah
                        </span>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 pt-1">
                        <div class="bg-white p-2.5 rounded-lg shadow-sm flex items-center justify-between">
                            <span class="font-label-md text-label-md text-slate-700">Senin — Jumat (Hari Biasa):</span>
                            <span class="font-label-md text-label-md text-primary font-bold">16.30 - 23.00 WIB (Shift Sore / Malam)</span>
                        </div>
                        <div class="bg-white p-2.5 rounded-lg shadow-sm flex items-center justify-between">
                            <span class="font-label-md text-label-md text-slate-700">Sabtu &amp; Minggu (Akhir Pekan):</span>
                            <span class="font-label-md text-label-md text-emerald-700 font-bold">08.00 - 22.00 WIB (Full-Day Ready)</span>
                        </div>
                    </div>
                </div>

                <!-- Keahlian Praktis (Skills Chips) -->
                <div class="flex flex-col gap-2">
                    <div class="flex items-center gap-2">
                        <span class="w-2.5 h-2.5 rounded-full bg-primary"></span>
                        <h3 class="font-headline-sm text-headline-sm text-slate-900 tracking-tight font-bold">Keahlian Praktis Bar &amp; Operasional</h3>
                    </div>
                    <div class="flex flex-wrap gap-2 pt-1">
                        <span class="px-3 py-1 rounded-full bg-slate-100 text-slate-800 font-label-md text-label-md">
                            Espresso Brewing &amp; V60 Manual Brew
                        </span>
                        <span class="px-3 py-1 rounded-full bg-slate-100 text-slate-800 font-label-md text-label-md">
                            Kasir POS (Moka POS, Pawoon, Olsera)
                        </span>
                        <span class="px-3 py-1 rounded-full bg-slate-100 text-slate-800 font-label-md text-label-md">
                            Hospitality &amp; Pelayanan Ramah
                        </span>
                        <span class="px-3 py-1 rounded-full bg-slate-100 text-slate-800 font-label-md text-label-md">
                            Stock Opname Harian &amp; FIFO
                        </span>
                        <span class="px-3 py-1 rounded-full bg-slate-100 text-slate-800 font-label-md text-label-md">
                            Standar Sanitasi Bar 5S
                        </span>
                        <span class="px-3 py-1 rounded-full bg-slate-100 text-slate-800 font-label-md text-label-md">
                            Ketelitian Rekap Uang Tunai / QRIS
                        </span>
                    </div>
                </div>

                <!-- Riwayat Pengalaman Shift (MABU Verified & Historical) -->
                <div class="flex flex-col gap-3">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <span class="w-2.5 h-2.5 rounded-full bg-primary"></span>
                            <h3 class="font-headline-sm text-headline-sm text-slate-900 tracking-tight font-bold">Riwayat Pengalaman Shift Terverifikasi</h3>
                        </div>
                        <span class="font-label-sm text-label-sm text-slate-500 font-mono">Platform MABU Track</span>
                    </div>
                    <div class="flex flex-col gap-4 pl-3 border-l-2 border-primary/20">
                        <!-- Job 1 -->
                        <div class="flex flex-col gap-1 relative">
                            <div class="flex flex-col sm:flex-row sm:items-center justify-between">
                                <span class="font-label-lg text-label-lg text-slate-900 font-bold">
                                    Barista Shift Sore — Kopi Kenangan Surabaya (Gubeng)
                                </span>
                                <span class="font-label-sm text-label-sm text-primary font-semibold">Nov 2024 — Sekarang (8 Shift)</span>
                            </div>
                            <p class="font-body-sm text-body-sm text-slate-600">
                                • Bertanggung jawab atas peracikan 60+ cup minuman/jam pada jam sibuk sore-malam dengan standar resep konsisten.<br/>
                                • Mengoperasikan mesin espresso komersial, steam milk, dan pemeliharaan kebersihan meja bar setiap closing shift.<br/>
                                • Meraih rating kepuasan 5.0 dari supervisor shift atas keramahan customer service.
                            </p>
                        </div>

                        <!-- Job 2 -->
                        <div class="flex flex-col gap-1 relative">
                            <div class="flex flex-col sm:flex-row sm:items-center justify-between">
                                <span class="font-label-lg text-label-lg text-slate-900 font-bold">
                                    Kasir &amp; Staf Packaging — Dapur Bunda Cookies Surabaya
                                </span>
                                <span class="font-label-sm text-label-sm text-slate-500 font-semibold">Okt 2024 (4 Shift Khusus Event)</span>
                            </div>
                            <p class="font-body-sm text-body-sm text-slate-600">
                                • Menangani transaksi pembayaran tunai dan non-tunai mencapai nominal Rp 15.000.000/hari tanpa selisih kas.<br/>
                                • Mengemas pesanan bingkisan kue secara rapi dan melakukan penataan display etalase toko.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Riwayat Pendidikan -->
                <div class="flex flex-col gap-2">
                    <div class="flex items-center gap-2">
                        <span class="w-2.5 h-2.5 rounded-full bg-primary"></span>
                        <h3 class="font-headline-sm text-headline-sm text-slate-900 tracking-tight font-bold">Pendidikan</h3>
                    </div>
                    <div class="flex items-center justify-between pl-3 border-l-2 border-slate-200">
                        <div class="flex flex-col">
                            <span class="font-label-lg text-label-lg text-slate-900 font-semibold">S1 Teknik Informatika — Institut Teknologi Sepuluh Nopember (ITS)</span>
                            <span class="font-body-sm text-body-sm text-slate-500">Semester 5 Aktif • Surabaya, Jawa Timur</span>
                        </div>
                        <span class="font-label-md text-label-md text-slate-600 bg-slate-100 px-3 py-1 rounded-full">2022 — Sekarang</span>
                    </div>
                </div>

                <!-- Footer: Barcode & Digital Verification Security -->
                <div class="mt-4 pt-4 border-t border-slate-100 flex flex-col sm:flex-row items-center justify-between text-slate-400 font-body-sm text-[11px] gap-2">
                    <div class="flex items-center gap-2">
                        <span class="material-symbols-outlined text-[16px] text-tertiary">verified_user</span>
                        <span>Dokumen sah digital diterbitkan melalui sistem terenkripsi MABU Indonesia. ID: MABU-2025-ITS-AC998</span>
                    </div>
                    <span class="font-mono text-slate-500">Hash: 8f4a-2b7e-901d</span>
                </div>
            </div>

            <!-- Bottom Floating Helper Banner -->
            <div class="w-full mt-4 p-4 rounded-xl bg-surface-container-lowest shadow-sm flex items-center justify-between">
                <div class="flex items-center gap-space-sm">
                    <span class="material-symbols-outlined text-primary text-[24px]">save</span>
                    <div class="flex flex-col">
                        <span class="font-label-md text-label-md text-on-surface">Auto-Save Aktif</span>
                        <span class="font-body-sm text-body-sm text-on-surface-variant">Setiap penyesuaian langsung disimpan ke draft cloud akunmu.</span>
                    </div>
                </div>
                <button type="button" class="px-4 py-2 rounded-full bg-primary text-on-primary font-label-md text-label-md hover:bg-primary/90 transition-all flex items-center gap-1.5 shadow-sm" id="downloadPdfBtn2">
                    <span class="material-symbols-outlined text-[16px]">picture_as_pdf</span> Simpan PDF
                </button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const toggleShift = document.getElementById('toggleShift');
        const toggleBadge = document.getElementById('toggleBadge');
        const toggleWa = document.getElementById('toggleWa');

        const cvShiftSection = document.getElementById('cvShiftSection');
        const cvBadgeRating = document.getElementById('cvBadgeRating');
        const cvWaContact = document.getElementById('cvWaContact');

        const downloadBtn1 = document.getElementById('downloadPdfBtn');
        const downloadBtn2 = document.getElementById('downloadPdfBtn2');

        // Shift Availability Toggle
        if (toggleShift && cvShiftSection) {
            toggleShift.addEventListener('change', (e) => {
                cvShiftSection.style.display = e.target.checked ? 'flex' : 'none';
            });
        }

        // MABU Reputation Badge Toggle
        if (toggleBadge && cvBadgeRating) {
            toggleBadge.addEventListener('change', (e) => {
                cvBadgeRating.style.display = e.target.checked ? 'flex' : 'none';
            });
        }

        // WhatsApp Direct Link Toggle
        if (toggleWa && cvWaContact) {
            toggleWa.addEventListener('change', (e) => {
                if (e.target.checked) {
                    cvWaContact.innerHTML = '<a href="https://wa.me/6281234567890" target="_blank" class="text-primary hover:underline font-medium">+62 812-3456-7890 (WA Aktif)</a>';
                } else {
                    cvWaContact.textContent = '+62 812-3456-7890';
                }
            });
        }

        // Mock Download Trigger
        const handleDownload = () => {
            const originalText = downloadBtn1.innerHTML;
            downloadBtn1.innerHTML = '<span class="material-symbols-outlined animate-spin text-[20px]">progress_activity</span> Mengenerate PDF...';
            downloadBtn1.disabled = true;

            setTimeout(() => {
                downloadBtn1.innerHTML = '<span class="material-symbols-outlined text-[20px]">check</span> Berhasil Diunduh!';
                setTimeout(() => {
                    downloadBtn1.innerHTML = originalText;
                    downloadBtn1.disabled = false;
                }, 2000);
            }, 1200);
        };

        if (downloadBtn1) downloadBtn1.addEventListener('click', handleDownload);
        if (downloadBtn2) downloadBtn2.addEventListener('click', handleDownload);
    });
</script>
@endpush
