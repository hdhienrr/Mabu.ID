@extends('layouts.app')

@section('title', 'MABU - Portal Kerja Fleksibel & Part-Time')

@section('content')

    <!-- BEGIN: HeroSection -->
    <section class="relative pt-32 pb-24 lg:pt-40 lg:pb-32 overflow-hidden flex items-center justify-center min-h-[640px] lg:min-h-[720px] text-white" id="beranda">
        <div class="absolute inset-0 z-0">
            <img alt="Mahasiswa dan generasi muda belajar serta bekerja bersama laptop di kafe warkop" 
                 class="w-full h-full object-cover object-center" 
                 onerror="this.onerror=null; this.src='https://images.unsplash.com/photo-1522202176988-66273c2fd55f?auto=format&fit=crop&w=1920&q=80';" 
                 src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?auto=format&fit=crop&w=1920&q=80" 
                 style="filter: brightness(0.6) contrast(1.1);">
            <div class="absolute inset-0 bg-gradient-to-b from-black/80 via-black/60 to-black/90"></div>
            <div class="absolute inset-0 bg-blue-950/20 mix-blend-multiply"></div>
        </div>

        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[500px] h-[500px] bg-blue-600/15 blur-[120px] rounded-full pointer-events-none z-0"></div>

        <div class="max-w-4xl mx-auto px-6 relative z-10 text-center flex flex-col items-center justify-center">
            <div class="mb-6 flex items-center justify-center relative group">
                <div class="w-16 h-16 sm:w-20 sm:h-20 rounded-2xl flex items-center justify-center text-blue-400 drop-shadow-[0_0_24px_rgba(59,130,246,0.7)] transition-transform duration-300 group-hover:scale-105">
                    <svg class="w-14 h-14 sm:w-16 sm:h-16 stroke-current" fill="none" stroke-width="1.75" viewBox="0 0 24 24">
                        <path d="M12 3L1 9l11 6 9-4.91V17h2V9L12 3z" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M5 13.18v4C5 19.84 8.13 22 12 22s7-2.16 7-4.82v-4" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                </div>
            </div>

            <h1 class="text-3xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight sm:tracking-normal uppercase mb-5 text-white drop-shadow-md">
                PORTAL KARIER MAHASISWA
            </h1>

            <p class="text-base sm:text-lg lg:text-xl font-normal leading-relaxed text-slate-200 max-w-2xl mx-auto mb-9 drop-shadow-sm">
                Temukan pekerjaan part-time yang sesuai dengan jadwal kuliahmu. Mulai bangun pengalaman dan kemandirian finansial sejak di bangku kuliah.
            </p>

            <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                <a class="inline-flex items-center gap-2.5 px-8 py-3.5 rounded-full font-bold text-sm tracking-wide shadow-xl bg-blue-600 hover:bg-blue-700 text-white transition-all transform hover:scale-105 active:scale-95 duration-200 shadow-blue-600/30" href="{{ route('login') }}">
                    <span>MASUK APLIKASI</span>
                    <span class="text-base leading-none">→</span>
                </a>
            </div>
        </div>
    </section>
    <!-- END: HeroSection -->

    <!-- BEGIN: KeyMetricsSection -->
    <section class="border-y py-10 transition-colors" style="background-color: var(--bg-subtle); border-color: var(--border);">
        <div class="max-w-7xl mx-auto px-6 grid grid-cols-2 md:grid-cols-4 gap-6 text-center">
            <div class="p-3">
                <div class="text-3xl lg:text-4xl font-extrabold tracking-tight" style="color: var(--accent);">12.500+</div>
                <p class="text-xs uppercase tracking-wider font-semibold mt-1" style="color: var(--text-muted);">Pengguna Aktif</p>
            </div>
            <div class="p-3 border-l" style="border-color: var(--border);">
                <div class="text-3xl lg:text-4xl font-extrabold tracking-tight" style="color: var(--text);">450+</div>
                <p class="text-xs uppercase tracking-wider font-semibold mt-1" style="color: var(--text-muted);">Mitra Usaha & UMKM</p>
            </div>
            <div class="p-3 border-l-0 md:border-l" style="border-color: var(--border);">
                <div class="text-3xl lg:text-4xl font-extrabold tracking-tight" style="color: var(--accent);">100%</div>
                <p class="text-xs uppercase tracking-wider font-semibold mt-1" style="color: var(--text-muted);">Jadwal Kompatibel</p>
            </div>
            <div class="p-3 border-l" style="border-color: var(--border);">
                <div class="text-3xl lg:text-4xl font-extrabold tracking-tight" style="color: var(--text);">Rp 2,4M+</div>
                <p class="text-xs uppercase tracking-wider font-semibold mt-1" style="color: var(--text-muted);">Upah Tersalurkan</p>
            </div>
        </div>
    </section>
    <!-- END: KeyMetricsSection -->

    <!-- BEGIN: WhyChooseUsSection -->
    <section class="py-20 relative transition-colors" data-purpose="features" id="tentang" style="background-color: var(--bg);">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center max-w-3xl mx-auto mb-14">
                <span class="text-xs font-bold uppercase tracking-widest px-3 py-1 rounded-full border inline-block" style="background-color: var(--accent-soft); border-color: var(--accent-soft-border); color: var(--accent);">Keunggulan Kami</span>
                <h2 class="text-3xl md:text-4xl font-extrabold mt-3 tracking-tight" style="color: var(--text);">Mengapa Memilih MABU?</h2>
                <p class="text-sm md:text-base mt-3" style="color: var(--text-muted);">Platform yang dirancang khusus untuk kenyamanan dan kejelasan ritme hidup antara jam kuliah, sekolah, atau kesibukan harian tanpa rasa cemas.</p>
            </div>

            <!-- Audience Inclusivity Callout Banner -->
            <div class="mb-10 p-4 rounded-xl border flex flex-col md:flex-row items-center justify-between gap-4" style="background-color: var(--accent-soft); border-color: var(--accent-soft-border);">
                <div class="flex items-center gap-3">
                    <span class="text-2xl">🤝</span>
                    <div>
                        <h4 class="text-sm font-bold" style="color: var(--text);">Terbuka Untuk Semua Generasi Muda & Pencari Peluang</h4>
                        <p class="text-xs mt-0.5" style="color: var(--text-muted);">Khusus dirancang ramah bagi <strong>Mahasiswa Aktif</strong>, <strong>Pelajar SMA/SMK</strong>, dan <strong>Masyarakat Umum</strong> yang membutuhkan penghasilan tambahan.</p>
                    </div>
                </div>
                <a class="text-xs font-bold underline shrink-0 hover:opacity-80" href="#cara-kerja" style="color: var(--accent);">Pelajari Cara Kerja →</a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Feature 1 -->
                <div class="p-6 rounded-xl border transition-all duration-200 hover:-translate-y-1 theme-card" style="border-radius: 12px;">
                    <div class="w-11 h-11 rounded-lg flex items-center justify-center mb-5" style="background-color: var(--accent-soft); color: var(--accent);">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                    </div>
                    <h3 class="text-base font-bold mb-2" style="color: var(--text);">Fleksibel Sesuai Jadwalmu</h3>
                    <p class="text-xs leading-relaxed" style="color: var(--text-muted);">
                        Sesuaikan lowongan dengan jam senggangmu (hari libur, shift sore pulang sekolah/kuliah, atau akhir pekan) tanpa bentrok waktu aktivitas.
                    </p>
                </div>

                <!-- Feature 2 -->
                <div class="p-6 rounded-xl border transition-all duration-200 hover:-translate-y-1 theme-card" style="border-radius: 12px;">
                    <div class="w-11 h-11 rounded-lg flex items-center justify-center mb-5" style="background-color: var(--accent-soft); color: var(--accent);">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M9 12.75L11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 01-1.043 3.296 3.745 3.745 0 01-3.296 1.043A3.745 3.745 0 0112 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 01-3.296-1.043 3.745 3.745 0 01-1.043-3.296A3.745 3.745 0 013 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 011.043-3.296 3.746 3.746 0 013.296-1.043A3.746 3.746 0 0112 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 013.296 1.043 3.746 3.746 0 011.043 3.296A3.745 3.745 0 0121 12z" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                    </div>
                    <h3 class="text-base font-bold mb-2" style="color: var(--text);">Mitra & UMKM Terverifikasi</h3>
                    <p class="text-xs leading-relaxed" style="color: var(--text-muted);">
                        Lowongan dikurasi aman dari warung kopi, kafe, booth penjualan makanan-minuman, toko ritel, dan usaha rumahan terpercaya.
                    </p>
                </div>

                <!-- Feature 3 -->
                <div class="p-6 rounded-xl border transition-all duration-200 hover:-translate-y-1 theme-card" style="border-radius: 12px;">
                    <div class="w-11 h-11 rounded-lg flex items-center justify-center mb-5" style="background-color: var(--accent-soft); color: var(--accent);">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M2.25 18.75a60.07 60.07 0 0115.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 013 6H2.25m0 0H3m-1.5 6H3m0 0a.75.75 0 01.75.75v.75m17.25-6H21m0 0a.75.75 0 01.75.75v.75m0 6h-.75m.75 0a.75.75 0 01-.75.75v.75M12 9v6m3-3H9" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                    </div>
                    <h3 class="text-base font-bold mb-2" style="color: var(--text);">Upah Transparan</h3>
                    <p class="text-xs leading-relaxed" style="color: var(--text-muted);">
                        Rate pembayaran dicantumkan jelas di muka (harian, per shift, atau mingguan) dan langsung diterima tanpa potongan tersembunyi.
                    </p>
                </div>

                <!-- Feature 4 -->
                <div class="p-6 rounded-xl border transition-all duration-200 hover:-translate-y-1 theme-card" style="border-radius: 12px;">
                    <div class="w-11 h-11 rounded-lg flex items-center justify-center mb-5" style="background-color: var(--accent-soft); color: var(--accent);">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                    </div>
                    <h3 class="text-base font-bold mb-2" style="color: var(--text);">Portofolio & Pengalaman</h3>
                    <p class="text-xs leading-relaxed" style="color: var(--text-muted);">
                        Dapatkan surat referensi resmi dan pengalaman kerja nyata yang siap menambah nilai tawar CV saat lulus kelak.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- END: WhyChooseUsSection -->

    <!-- BEGIN: HowItWorksSection -->
    @php
        $steps = [
            ['num' => '01', 'title' => 'Daftar & Atur Jadwal Luang', 'desc' => 'Isi profil singkatmu dan tandai hari atau jam senggangmu agar rekomendasi lowongan tepat sasaran.'],
            ['num' => '02', 'title' => 'Pilih Lowongan Dekat & Cocok', 'desc' => 'Pilih pekerjaan part-time berdasarkan jarak terdekat dari rumah/kampus/sekolah dan kesesuaian upah.'],
            ['num' => '03', 'title' => 'Obrolan Cepat / Wawancara', 'desc' => 'Komunikasi praktis via chat atau wawancara singkat bersama pemilik usaha untuk briefing tugas kerja.'],
            ['num' => '04', 'title' => 'Bekerja Nyaman & Terima Gaji', 'desc' => 'Jalani shift dengan tenang, upah dicairkan tepat waktu serta dapatkan surat referensi berharga.'],
        ];
    @endphp
    <section class="py-20 border-t transition-colors" id="cara-kerja" style="background-color: var(--bg-subtle); border-color: var(--border);">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center max-w-2xl mx-auto mb-16">
                <span class="text-xs font-bold uppercase tracking-widest px-3 py-1 rounded-full border inline-block" style="background-color: var(--accent-soft); border-color: var(--accent-soft-border); color: var(--accent);">Langkah Mudah</span>
                <h2 class="text-3xl font-extrabold mt-3 tracking-tight" style="color: var(--text);">Cara Kerja di MABU</h2>
                <p class="text-sm mt-2" style="color: var(--text-muted);">Mulai dari registrasi hingga upah kerja pertamamu tanpa proses birokrasi berbelit.</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                @foreach($steps as $step)
                    <div class="text-center">
                        <div class="w-14 h-14 mx-auto rounded-2xl border flex items-center justify-center font-extrabold text-lg mb-4 shadow-sm" style="background-color: var(--surface); border-color: var(--border); color: var(--accent);">
                            {{ $step['num'] }}
                        </div>
                        <h3 class="font-bold text-sm mb-1.5" style="color: var(--text);">{{ $step['title'] }}</h3>
                        <p class="text-xs leading-relaxed" style="color: var(--text-muted);">{{ $step['desc'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- END: HowItWorksSection -->

    <!-- BEGIN: CTASection -->
    <section class="py-20 border-t transition-colors" style="background-color: var(--bg); border-color: var(--border);">
        <div class="max-w-4xl mx-auto px-6 text-center">
            <div class="border rounded-2xl p-10 md:p-14 shadow-lg relative overflow-hidden theme-card" style="border-radius: 16px;">
                <div class="absolute -top-24 -right-24 w-60 h-60 rounded-full opacity-20 filter blur-3xl" style="background-color: var(--accent);"></div>
                <div class="absolute -bottom-24 -left-24 w-60 h-60 rounded-full opacity-20 filter blur-3xl" style="background-color: var(--accent);"></div>
                <div class="relative z-10">
                    <h2 class="text-2xl md:text-4xl font-extrabold mb-4 tracking-tight" style="color: var(--text);">
                        Siap Mandiri Finansial Tanpa Mengorbankan Waktu Belajar & Kesibukan?
                    </h2>
                    <p class="text-sm md:text-base max-w-xl mx-auto mb-8" style="color: var(--text-muted);">
                        Bergabung bersama ribuan mahasiswa, pelajar, dan pencari kerja mandiri yang sudah produktif menghasilkan uang saku sendiri setiap bulan.
                    </p>
                    <a class="inline-flex items-center gap-2.5 px-8 py-4 rounded-full font-bold text-sm tracking-wide shadow-md hover:scale-105 active:scale-95 transition-all btn-accent-theme" href="{{ route('register') }}">
                        <span>Daftar Sekarang Secara Gratis →</span>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- END: CTASection -->

@endsection