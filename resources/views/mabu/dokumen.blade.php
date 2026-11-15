@extends('layouts.mabu')

@section('title', 'Dokumen & Persuratan Resmi - MABU')

@section('content')
<div class="flex flex-col w-full gap-space-lg">
    <!-- Top Banner & Actions -->
    <section class="flex flex-col lg:flex-row lg:items-end justify-between gap-space-md pb-space-xs">
        <div class="flex flex-col gap-space-xs max-w-3xl">
            <div class="inline-flex items-center gap-space-xs px-space-md py-1 rounded-full bg-surface-container text-primary w-fit shadow-sm">
                <span class="material-symbols-outlined text-[16px] text-tertiary" style="font-variation-settings: 'FILL' 1;">verified_user</span>
                <span class="font-label-sm text-label-sm tracking-wider uppercase text-on-surface-variant">REPOSITORI ARSIP MAHASISWA • Terenkripsi 256-bit e-Meterai</span>
            </div>
            <h1 class="font-headline-lg text-headline-lg text-on-surface tracking-tight">Dokumen &amp; Persuratan Resmi</h1>
            <p class="font-body-md text-body-md text-on-surface-variant">
                Semua surat perjanjian kerja part-time, surat keterangan kerja (paklaring), dan sertifikat verifikasi tersimpan aman di satu tempat dengan jaminan perlindungan hak akademik mahasiswa.
            </p>
        </div>

        <!-- Actions -->
        <div class="flex flex-wrap items-center gap-space-sm shrink-0">
            <button type="button" class="inline-flex items-center gap-space-xs px-space-md py-2.5 rounded-full bg-surface-container-lowest text-on-surface font-label-lg text-label-lg shadow-sm hover:bg-surface-container transition-all">
                <span class="material-symbols-outlined text-[18px] text-primary">qr_code_2</span>
                <span>QR Verifikasi Publik</span>
            </button>
            <button type="button" class="inline-flex items-center gap-space-xs px-space-lg py-2.5 rounded-full bg-primary-container text-on-primary font-label-lg text-label-lg shadow-md hover:bg-primary transition-all">
                <span class="material-symbols-outlined text-[18px]">add_circle</span>
                <span>Upload Dokumen Baru</span>
            </button>
        </div>
    </section>

    <!-- Filter & Search Toolbar -->
    <div class="flex flex-col md:flex-row items-stretch md:items-center justify-between gap-space-md p-space-sm rounded-xl bg-surface-container-lowest shadow-sm">
        <!-- Category Pills -->
        <div class="flex items-center gap-space-xs overflow-x-auto py-1 scrollbar-none">
            <button type="button" class="shrink-0 px-space-md py-1.5 rounded-full font-label-md text-label-md bg-primary text-on-primary shadow-sm">
                Semua Dokumen (5)
            </button>
            <button type="button" class="shrink-0 px-space-md py-1.5 rounded-full font-label-md text-label-md bg-surface-container text-on-surface-variant hover:text-on-surface transition-colors">
                Kontrak Kerja / SPK (2)
            </button>
            <button type="button" class="shrink-0 px-space-md py-1.5 rounded-full font-label-md text-label-md bg-surface-container text-on-surface-variant hover:text-on-surface transition-colors">
                Paklaring Resmi (2)
            </button>
            <button type="button" class="shrink-0 px-space-md py-1.5 rounded-full font-label-md text-label-md bg-surface-container text-on-surface-variant hover:text-on-surface transition-colors">
                Sertifikat Pelatihan (1)
            </button>
        </div>

        <!-- Search Input -->
        <div class="relative min-w-[280px]">
            <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-on-surface-variant text-[18px]">search</span>
            <input class="w-full pl-9 pr-space-md py-1.5 rounded-full bg-surface-container-low font-body-sm text-body-sm text-on-surface placeholder:text-outline focus:outline-none focus:bg-surface-container-lowest focus:ring-2 focus:ring-primary/20 transition-all" placeholder="Cari nama dokumen atau nomor surat..." type="text"/>
        </div>
    </div>

    <!-- 2-Column Core Layout -->
    <div class="grid grid-cols-1 xl:grid-cols-12 gap-space-lg items-start">
        <!-- LEFT COLUMN: Daftar Dokumen Resmi (7 Cols) -->
        <div class="xl:col-span-7 flex flex-col gap-space-md">
            <!-- Dokumen 1 (SPK Sah - Highlight Card) -->
            <article class="relative flex flex-col gap-space-md p-space-lg rounded-xl bg-surface-container-lowest shadow-md hover:shadow-lg transition-all overflow-hidden group">
                <div class="absolute left-0 top-0 bottom-0 w-1.5 bg-primary"></div>
                <div class="flex flex-col sm:flex-row sm:items-start justify-between gap-space-sm pl-space-xs">
                    <div class="flex items-start gap-space-md">
                        <div class="w-12 h-12 rounded-xl bg-surface-container flex items-center justify-center shrink-0">
                            <span class="material-symbols-outlined text-[26px] text-primary" style="font-variation-settings: 'FILL' 1;">gavel</span>
                        </div>
                        <div class="flex flex-col">
                            <div class="flex flex-wrap items-center gap-space-xs mb-1">
                                <span class="inline-flex items-center gap-1 px-space-xs py-0.5 rounded-full bg-tertiary-fixed text-on-tertiary-fixed font-label-sm text-label-sm">
                                    <span class="material-symbols-outlined text-[13px]" style="font-variation-settings: 'FILL' 1;">check_circle</span>
                                    Kontrak Resmi Sah
                                </span>
                                <span class="inline-flex items-center gap-1 px-space-xs py-0.5 rounded-full bg-surface-container-high text-primary font-label-sm text-label-sm">
                                    <span class="material-symbols-outlined text-[13px]">workspace_premium</span>
                                    e-Meterai Ditjen Pajak
                                </span>
                            </div>
                            <h2 class="font-headline-sm text-headline-sm text-on-surface">Surat Perjanjian Kerja Part-Time (SPK) - Kopi Kenangan Sukolilo</h2>
                            <span class="font-body-sm text-body-sm text-on-surface-variant font-mono mt-0.5">No: 488/SPK-MABU/KOP-SUK/XI/2024</span>
                        </div>
                    </div>
                    <span class="font-label-sm text-label-sm text-on-tertiary-container bg-tertiary-container/20 px-space-sm py-1 rounded-full whitespace-nowrap self-start">
                        Aktif Berjalan
                    </span>
                </div>

                <!-- Detail Meta Grid -->
                <div class="grid grid-cols-2 sm:grid-cols-3 gap-space-sm p-space-sm rounded-xl bg-surface-container-low font-body-sm text-body-sm text-on-surface pl-space-sm">
                    <div class="flex flex-col">
                        <span class="font-label-sm text-label-sm text-on-surface-variant">Periode Kontrak</span>
                        <span class="font-label-md text-label-md">1 Nov 2024 - 31 Des 2024</span>
                    </div>
                    <div class="flex flex-col">
                        <span class="font-label-sm text-label-sm text-on-surface-variant">Ukuran Arsip</span>
                        <span class="font-label-md text-label-md">PDF • 1.2 MB</span>
                    </div>
                    <div class="flex flex-col col-span-2 sm:col-span-1">
                        <span class="font-label-sm text-label-sm text-on-surface-variant">Klausul Kuliah</span>
                        <span class="font-label-md text-label-md text-tertiary flex items-center gap-1">
                            <span class="material-symbols-outlined text-[14px]">shield</span> Terlindungi
                        </span>
                    </div>
                </div>

                <!-- Card Footer -->
                <div class="flex items-center justify-between pt-space-xs pl-space-xs">
                    <div class="flex items-center gap-1.5 text-on-surface-variant font-body-sm text-body-sm">
                        <span class="material-symbols-outlined text-[16px] text-tertiary">lock</span>
                        <span>Digital Signature Verified (Peruri)</span>
                    </div>
                    <div class="flex items-center gap-space-xs">
                        <button type="button" class="px-space-md py-1.5 rounded-full font-label-md text-label-md text-primary bg-surface-container hover:bg-surface-container-high transition-colors">
                            Lihat Dokumen
                        </button>
                        <button type="button" class="px-space-md py-1.5 rounded-full font-label-md text-label-md text-on-primary bg-primary hover:bg-primary-container transition-colors inline-flex items-center gap-1">
                            <span class="material-symbols-outlined text-[16px]">download</span>
                            <span>Download PDF</span>
                        </button>
                    </div>
                </div>
            </article>

            <!-- Dokumen 2 (Paklaring Resmi) -->
            <article class="flex flex-col gap-space-md p-space-lg rounded-xl bg-surface-container-lowest shadow-sm hover:shadow-md transition-all">
                <div class="flex flex-col sm:flex-row sm:items-start justify-between gap-space-sm">
                    <div class="flex items-start gap-space-md">
                        <div class="w-12 h-12 rounded-xl bg-tertiary-fixed flex items-center justify-center shrink-0">
                            <span class="material-symbols-outlined text-[26px] text-on-tertiary-fixed" style="font-variation-settings: 'FILL' 1;">badge</span>
                        </div>
                        <div class="flex flex-col">
                            <div class="flex flex-wrap items-center gap-space-xs mb-1">
                                <span class="inline-flex items-center gap-1 px-space-xs py-0.5 rounded-full bg-tertiary-fixed-dim text-on-tertiary-fixed font-label-sm text-label-sm">
                                    <span class="material-symbols-outlined text-[13px]" style="font-variation-settings: 'FILL' 1;">stars</span>
                                    Predikat: Sangat Baik (A)
                                </span>
                                <span class="inline-flex items-center px-space-xs py-0.5 rounded-full bg-secondary-fixed text-on-secondary-fixed font-label-sm text-label-sm">
                                    Paklaring Kerja
                                </span>
                            </div>
                            <h2 class="font-headline-sm text-headline-sm text-on-surface">Surat Keterangan Kerja &amp; Rekomendasi - Snack Surabaya UMKM</h2>
                            <span class="font-body-sm text-body-sm text-on-surface-variant font-mono mt-0.5">No: 014/PKL-SNK/IX/2024</span>
                        </div>
                    </div>
                    <span class="font-label-sm text-label-sm text-tertiary bg-surface-container px-space-sm py-1 rounded-full whitespace-nowrap self-start">
                        Selesai Dinilai
                    </span>
                </div>
                <p class="font-body-sm text-body-sm text-on-surface-variant">
                    Bukti otentik 1 bulan pengalaman part-time sebagai <span class="font-label-md text-on-surface">Admin Packing</span>. Total presensi terverifikasi 64 jam kerja nyata tanpa rekam jejak indisipliner, disahkan pimpinan UMKM dengan Tanda Tangan Elektronik resmi.
                </p>
                <div class="flex items-center justify-between pt-space-xs">
                    <span class="font-body-sm text-body-sm text-on-surface-variant font-mono">Diterbitkan: 30 Sep 2024</span>
                    <div class="flex items-center gap-space-xs">
                        <button type="button" class="px-space-md py-1.5 rounded-full font-label-md text-label-md text-primary bg-surface-container hover:bg-surface-container-high transition-colors">
                            Lihat Dokumen
                        </button>
                        <button type="button" class="px-space-md py-1.5 rounded-full font-label-md text-label-md text-on-primary bg-primary hover:bg-primary-container transition-colors inline-flex items-center gap-1">
                            <span class="material-symbols-outlined text-[16px]">download</span>
                            <span>Download PDF</span>
                        </button>
                    </div>
                </div>
            </article>

            <!-- Dokumen 3 (Draft Percobaan Probation) -->
            <article class="flex flex-col gap-space-sm p-space-md rounded-xl bg-surface-container-lowest shadow-sm hover:shadow-md transition-all">
                <div class="flex flex-col sm:flex-row sm:items-start justify-between gap-space-sm">
                    <div class="flex items-start gap-space-md">
                        <div class="w-10 h-10 rounded-xl bg-secondary-fixed flex items-center justify-center shrink-0">
                            <span class="material-symbols-outlined text-[22px] text-on-secondary-fixed">pending_actions</span>
                        </div>
                        <div class="flex flex-col">
                            <div class="flex items-center gap-space-xs">
                                <span class="px-space-xs py-0.5 rounded-full bg-secondary-container text-on-secondary-fixed-variant font-label-sm text-label-sm">Draft Percobaan</span>
                                <span class="font-body-sm text-body-sm text-on-surface-variant">Estimasi Mulai: Des 2024</span>
                            </div>
                            <h3 class="font-label-lg text-label-lg text-on-surface mt-1">Draf Kontrak Kerja Percobaan (Probation) - Warkop Kopi Sahabat</h3>
                            <p class="font-body-sm text-body-sm text-on-surface-variant mt-0.5">Kompensasi: Rp 65.000 / Shift 4 Jam • Kuota 3 shift/minggu.</p>
                        </div>
                    </div>
                    <button type="button" class="px-space-md py-1.5 rounded-full font-label-md text-label-md text-primary bg-surface-container hover:bg-surface-container-high transition-colors whitespace-nowrap self-start">
                        Preview Persyaratan
                    </button>
                </div>
            </article>

            <!-- Dokumen 4 & 5 (Grid Mini Cards) -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-space-md">
                <!-- Dokumen 4: KTM ITS -->
                <article class="flex flex-col justify-between gap-space-sm p-space-md rounded-xl bg-surface-container-lowest shadow-sm">
                    <div class="flex items-start gap-space-sm">
                        <div class="w-9 h-9 rounded-lg bg-surface-container-high flex items-center justify-center shrink-0">
                            <span class="material-symbols-outlined text-[20px] text-primary">credit_card</span>
                        </div>
                        <div class="flex flex-col min-w-0">
                            <span class="font-label-sm text-label-sm text-tertiary flex items-center gap-1">
                                <span class="material-symbols-outlined text-[13px]" style="font-variation-settings: 'FILL' 1;">check_circle</span>
                                PDDIKTI Aktif
                            </span>
                            <h4 class="font-label-lg text-label-lg text-on-surface truncate">Kartu Tanda Mahasiswa (KTM)</h4>
                            <span class="font-body-sm text-body-sm text-on-surface-variant font-mono">NRP: 5026211099</span>
                        </div>
                    </div>
                    <button type="button" class="w-full mt-2 py-1.5 rounded-full font-label-md text-label-md text-primary bg-surface-container hover:bg-surface-container-high transition-colors">
                        Cek Kartu
                    </button>
                </article>

                <!-- Dokumen 5: Sertifikat Pelatihan -->
                <article class="flex flex-col justify-between gap-space-sm p-space-md rounded-xl bg-surface-container-lowest shadow-sm">
                    <div class="flex items-start gap-space-sm">
                        <div class="w-9 h-9 rounded-lg bg-tertiary-fixed flex items-center justify-center shrink-0">
                            <span class="material-symbols-outlined text-[20px] text-on-tertiary-fixed">verified</span>
                        </div>
                        <div class="flex flex-col min-w-0">
                            <span class="font-label-sm text-label-sm text-on-surface-variant">Sertifikat Resmi MABU</span>
                            <h4 class="font-label-lg text-label-lg text-on-surface truncate">Food Safety &amp; Pelayanan Kafe</h4>
                            <span class="font-body-sm text-body-sm text-on-surface-variant">F&amp;B Jatim Assc.</span>
                        </div>
                    </div>
                    <button type="button" class="w-full mt-2 py-1.5 rounded-full font-label-md text-label-md text-on-primary bg-primary hover:bg-primary-container transition-colors inline-flex items-center justify-center gap-1">
                        <span class="material-symbols-outlined text-[16px]">download</span>
                        <span>Unduh PDF</span>
                    </button>
                </article>
            </div>
        </div>

        <!-- RIGHT COLUMN: Inspektur Surat & Piagam Hak Mahasiswa (5 Cols) -->
        <div class="xl:col-span-5 flex flex-col gap-space-lg">
            <!-- Panel Inspektur Surat Terpilih -->
            <section class="flex flex-col p-space-lg rounded-xl bg-surface-container-lowest shadow-sm gap-space-md">
                <!-- Inspector Header -->
                <div class="flex items-center justify-between pb-space-sm border-b-0">
                    <div class="flex items-center gap-space-xs">
                        <span class="material-symbols-outlined text-[20px] text-primary">find_in_page</span>
                        <span class="font-headline-sm text-headline-sm text-on-surface">Inspektur Surat</span>
                    </div>
                    <div class="inline-flex items-center gap-1 px-space-xs py-0.5 rounded bg-tertiary-container/15 text-tertiary font-label-sm text-label-sm tracking-wider uppercase">
                        <span class="material-symbols-outlined text-[14px]">verified</span>
                        <span>SAH HUKUM</span>
                    </div>
                </div>

                <!-- Selected Document Header -->
                <div class="flex flex-col gap-1 p-space-sm rounded-xl bg-surface-container-low">
                    <span class="font-label-sm text-label-sm text-primary uppercase tracking-wide">Fokus Pratinjau Dokumen</span>
                    <span class="font-label-lg text-label-lg text-on-surface">SPK Part-Time Barista — Kopi Kenangan Sukolilo</span>
                    <span class="font-body-sm text-body-sm text-on-surface-variant font-mono">Hash SHA-256: 8a7c...4f09</span>
                </div>

                <!-- Key Legal Safeguards (Visual Breakdown) -->
                <div class="flex flex-col gap-space-xs">
                    <span class="font-label-md text-label-md text-on-surface">Klausul Perlindungan Mahasiswa:</span>
                    <div class="flex flex-col gap-space-xs">
                        <!-- Metric 1 -->
                        <div class="flex items-center justify-between p-space-sm rounded-lg bg-surface-container-lowest hover:bg-surface-container-low transition-colors">
                            <div class="flex items-center gap-space-xs">
                                <span class="material-symbols-outlined text-[18px] text-tertiary">payments</span>
                                <span class="font-body-sm text-body-sm text-on-surface">Upah per Shift (4 Jam)</span>
                            </div>
                            <span class="font-label-md text-label-md text-primary">Rp 80.000 / Shift</span>
                        </div>

                        <!-- Metric 2 -->
                        <div class="flex items-center justify-between p-space-sm rounded-lg bg-surface-container-lowest hover:bg-surface-container-low transition-colors">
                            <div class="flex items-center gap-space-xs">
                                <span class="material-symbols-outlined text-[18px] text-tertiary">event_busy</span>
                                <span class="font-body-sm text-body-sm text-on-surface">Penalti Batal Shift (UTS/UAS)</span>
                            </div>
                            <span class="font-label-md text-label-md text-tertiary">0% (Bebas Denda)</span>
                        </div>

                        <!-- Metric 3 -->
                        <div class="flex items-center justify-between p-space-sm rounded-lg bg-surface-container-lowest hover:bg-surface-container-low transition-colors">
                            <div class="flex items-center gap-space-xs">
                                <span class="material-symbols-outlined text-[18px] text-primary">schedule</span>
                                <span class="font-body-sm text-body-sm text-on-surface">Maksimal Beban Kerja</span>
                            </div>
                            <span class="font-label-md text-label-md text-on-surface">20 Jam / Minggu</span>
                        </div>
                    </div>
                </div>

                <!-- Digital Signature Seal -->
                <div class="p-space-sm rounded-xl bg-surface-container flex items-center gap-space-sm">
                    <div class="w-10 h-10 rounded-full bg-surface-container-lowest flex items-center justify-center shrink-0 shadow-sm">
                        <span class="material-symbols-outlined text-primary text-[20px]">draw</span>
                    </div>
                    <div class="flex flex-col min-w-0">
                        <span class="font-label-md text-label-md text-on-surface truncate">Andika Candra • PT Kenangan Abadi Mitra</span>
                        <span class="font-body-sm text-body-sm text-on-surface-variant truncate">Tersertifikasi Perum Peruri • Timestamp 01/11/2024</span>
                    </div>
                </div>

                <button type="button" class="w-full py-2.5 rounded-full font-label-lg text-label-lg text-primary bg-surface-container hover:bg-surface-container-high transition-colors text-center">
                    Baca Dokumen Lengkap (6 Halaman)
                </button>
            </section>

            <!-- Panel Piagam Hak Pekerja Part-Time MABU -->
            <section class="flex flex-col p-space-lg rounded-xl bg-surface-container-lowest shadow-sm gap-space-md">
                <div class="flex items-center gap-space-xs">
                    <span class="material-symbols-outlined text-[22px] text-tertiary" style="font-variation-settings: 'FILL' 1;">policy</span>
                    <div>
                        <h2 class="font-headline-sm text-headline-sm text-on-surface">Piagam Hak Mahasiswa</h2>
                        <p class="font-body-sm text-body-sm text-on-surface-variant">Standar integritas legal bagi seluruh mitra kerja terdaftar.</p>
                    </div>
                </div>

                <!-- Hak 1 -->
                <div class="flex items-start gap-space-sm">
                    <div class="w-7 h-7 rounded-full bg-surface-container-high text-primary flex items-center justify-center shrink-0 font-label-md text-label-md">
                        1
                    </div>
                    <div class="flex flex-col">
                        <span class="font-label-md text-label-md text-on-surface">Hak Izin Ujian Semester (UTS/UAS)</span>
                        <p class="font-body-sm text-body-sm text-on-surface-variant mt-0.5">
                            Mitra dilarang memotong kompensasi atau memberi penalti apabila mahasiswa mengajukan dispensasi shift H-3 sebelum jadwal evaluasi akademik.
                        </p>
                    </div>
                </div>

                <!-- Hak 2 -->
                <div class="flex items-start gap-space-sm">
                    <div class="w-7 h-7 rounded-full bg-surface-container-high text-primary flex items-center justify-center shrink-0 font-label-md text-label-md">
                        2
                    </div>
                    <div class="flex flex-col">
                        <span class="font-label-md text-label-md text-on-surface">Pencairan Upah Pasti (1x24 Jam)</span>
                        <p class="font-body-sm text-body-sm text-on-surface-variant mt-0.5">
                            Upah shift kerja ditransfer otomatis ke dompet digital mahasiswa maksimal 24 jam setelah presensi checkout dikonfirmasi manajer outlet.
                        </p>
                    </div>
                </div>

                <!-- Hak 3 -->
                <div class="flex items-start gap-space-sm">
                    <div class="w-7 h-7 rounded-full bg-surface-container-high text-primary flex items-center justify-center shrink-0 font-label-md text-label-md">
                        3
                    </div>
                    <div class="flex flex-col">
                        <span class="font-label-md text-label-md text-on-surface">Anti-Lembur Paksa (Max 5 Jam/Hari)</span>
                        <p class="font-body-sm text-body-sm text-on-surface-variant mt-0.5">
                            Part-time dirancang mendampingi kuliah, bukan menggantikannya. Sistem menolak penugasan shift melebihi batas 5 jam per hari.
                        </p>
                    </div>
                </div>

                <!-- Link Out -->
                <a class="inline-flex items-center gap-1 font-label-md text-label-md text-primary hover:text-primary-container transition-colors pt-space-xs" href="#">
                    <span>Pelajari Piagam Perlindungan Mahasiswa MABU</span>
                    <span class="material-symbols-outlined text-[16px]">arrow_forward</span>
                </a>
            </section>
        </div>
    </div>
</div>
@endsection
