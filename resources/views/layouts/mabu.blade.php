<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>@yield('title', 'MABU - Mahasiswa Butuh Uang')</title>
    <link href="https://fonts.googleapis.com" rel="preconnect"/>
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Plus+Jakarta+Sans:wght@500;600;700;800&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: "#004ac6",
                        "primary-container": "#2563eb",
                        "primary-light": "#eef3ff",
                        "primary-fixed": "#dbe1ff",
                        "tertiary-container": "#007d55",
                        "surface-container-low": "#f2f3ff",
                        "surface-container-high": "#e2e7ff",
                        "surface-container-lowest": "#ffffff",
                        surface: "#faf8ff",
                        ink: "#131b2e",
                        muted: "#64748b",
                        outline: "#737686"
                    },
                    fontFamily: {
                        heading: ["Plus Jakarta Sans", "sans-serif"],
                        sans: ["Inter", "sans-serif"]
                    }
                }
            }
        }
    </script>
    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 500, 'GRAD' 0, 'opsz' 24;
        }
    </style>
    @stack('styles')
</head>
<body class="bg-surface font-sans text-ink antialiased min-h-screen">

    <!-- SIDEBAR KIRI -->
    <aside class="fixed left-0 top-0 h-screen w-72 bg-surface-container-lowest z-50 hidden lg:flex flex-col justify-between border-r border-slate-200/80 shadow-[0_1px_8px_rgba(0,0,0,0.04)]">
        <div class="flex flex-col">
            <!-- Brand Logo -->
            <a href="{{ route('mabu.dashboard') }}" class="px-6 pt-6 pb-4 flex items-center gap-2.5">
                <div class="w-11 h-11 rounded-xl bg-primary flex items-center justify-center text-white shadow-sm">
                    <span class="material-symbols-outlined text-[24px]">school</span>
                </div>
                <div class="flex flex-col">
                    <div class="flex items-center gap-0.5">
                        <span class="font-heading text-lg font-extrabold text-ink tracking-tight">MABU</span>
                        <span class="font-heading text-lg font-extrabold text-primary">.</span>
                    </div>
                    <span class="font-heading text-[11px] font-bold uppercase tracking-wider text-outline">MAHASISWA BUTUH UANG</span>
                </div>
            </a>

            <!-- Menu Navigasi Sidebar -->
            <div class="px-4 py-2">
                <nav class="flex flex-col gap-1.5">
                    <a href="{{ route('mabu.dashboard') }}"
                       class="flex items-center gap-3 px-4 py-3 rounded-xl font-heading text-sm font-semibold transition-all {{ request()->routeIs('mabu.dashboard') ? 'bg-surface-container-high text-primary shadow-2xs' : 'text-slate-600 hover:bg-surface-container-high hover:text-ink' }}">
                        <span class="material-symbols-outlined text-[20px]">grid_view</span>
                        <span>Dashboard</span>
                    </a>

                    <a href="{{ route('mabu.lowongan') }}"
                       class="flex items-center gap-3 px-4 py-3 rounded-xl font-heading text-sm font-semibold transition-all {{ request()->routeIs('mabu.lowongan') ? 'bg-surface-container-high text-primary shadow-2xs' : 'text-slate-600 hover:bg-surface-container-high hover:text-ink' }}">
                        <span class="material-symbols-outlined text-[20px]">search</span>
                        <span>Cari Kerja</span>
                    </a>

                    <a href="{{ route('mabu.rekomendasi') }}"
                       class="flex items-center justify-between px-4 py-3 rounded-xl font-heading text-sm font-semibold transition-all {{ request()->routeIs('mabu.rekomendasi') ? 'bg-surface-container-high text-primary shadow-2xs' : 'text-slate-600 hover:bg-surface-container-high hover:text-ink' }}">
                        <div class="flex items-center gap-3">
                            <span class="material-symbols-outlined text-[20px]">auto_awesome</span>
                            <span>Rekomendasi</span>
                        </div>
                        <span class="px-2 py-0.5 rounded-full font-heading text-[10px] font-bold bg-tertiary-container text-white shadow-2xs">NEW</span>
                    </a>

                    <a href="{{ route('mabu.jadwal') }}"
                       class="flex items-center gap-3 px-4 py-3 rounded-xl font-heading text-sm font-semibold transition-all {{ request()->routeIs('mabu.jadwal') ? 'bg-surface-container-high text-primary shadow-2xs' : 'text-slate-600 hover:bg-surface-container-high hover:text-ink' }}">
                        <span class="material-symbols-outlined text-[20px]">calendar_today</span>
                        <span>Manajemen Jadwal</span>
                    </a>

                    <a href="{{ route('mabu.lamaran') }}"
                       class="flex items-center gap-3 px-4 py-3 rounded-xl font-heading text-sm font-semibold transition-all {{ request()->routeIs('mabu.lamaran') ? 'bg-surface-container-high text-primary shadow-2xs' : 'text-slate-600 hover:bg-surface-container-high hover:text-ink' }}">
                        <span class="material-symbols-outlined text-[20px]">work</span>
                        <span>Status Lamaran</span>
                    </a>

                    <a href="{{ route('mabu.cv') }}"
                       class="flex items-center gap-3 px-4 py-3 rounded-xl font-heading text-sm font-semibold transition-all {{ request()->routeIs('mabu.cv') ? 'bg-surface-container-high text-primary shadow-2xs' : 'text-slate-600 hover:bg-surface-container-high hover:text-ink' }}">
                        <span class="material-symbols-outlined text-[20px]">description</span>
                        <span>Generate CV</span>
                    </a>

                    <a href="{{ route('mabu.dokumen') }}"
                       class="flex items-center gap-3 px-4 py-3 rounded-xl font-heading text-sm font-semibold transition-all {{ request()->routeIs('mabu.dokumen') ? 'bg-surface-container-high text-primary shadow-2xs' : 'text-slate-600 hover:bg-surface-container-high hover:text-ink' }}">
                        <span class="material-symbols-outlined text-[20px]">folder_managed</span>
                        <span>Dokumen Saya</span>
                    </a>
                </nav>
            </div>
        </div>

        <!-- Card Profil & Logout di Bawah Sidebar -->
        <div class="p-3 mx-3 mb-3 rounded-xl bg-surface-container-low flex items-center justify-between gap-2">
            <a href="{{ route('mabu.profil') }}" class="flex items-center gap-2.5 min-w-0 flex-1 hover:opacity-80 transition">
                <div class="w-9 h-9 rounded-full bg-primary shrink-0 flex items-center justify-center text-white">
                    <span class="material-symbols-outlined text-[20px]">person</span>
                </div>
                <div class="flex flex-col min-w-0">
                    <span class="font-heading text-xs font-bold text-ink truncate">Andika Candra</span>
                    <span class="text-[11px] text-outline truncate">Mahasiswa ITS</span>
                </div>
            </a>
            <form method="POST" action="{{ route('logout') }}" onsubmit="return confirm('Yakin ingin keluar dari akun ini?')">
                @csrf
                <button type="submit" title="Keluar"
                        class="w-8 h-8 rounded-full flex items-center justify-center text-outline hover:text-red-600 hover:bg-red-50 transition-colors">
                    <span class="material-symbols-outlined text-[18px]">logout</span>
                </button>
            </form>
        </div>
    </aside>

    <!-- KONTEN KANAN (TOPBAR + MAIN) -->
    <div class="lg:pl-72 flex flex-col min-h-screen">
        <!-- TOPBAR -->
        <header class="sticky top-0 z-40 h-16 bg-surface-container-lowest/85 backdrop-blur-xl px-4 sm:px-8 flex items-center justify-between border-b border-slate-200/70">
            <div class="flex items-center gap-3">
                <!-- Logo untuk layar kecil (Mobile) -->
                <a href="{{ route('mabu.dashboard') }}" class="flex lg:hidden items-center gap-2">
                    <div class="w-8 h-8 rounded-lg bg-primary text-white flex items-center justify-center">
                        <span class="material-symbols-outlined text-[18px]">school</span>
                    </div>
                    <span class="font-heading font-extrabold text-base text-ink">MABU</span>
                </a>

                <div class="relative hidden sm:flex items-center w-80">
                    <span class="material-symbols-outlined absolute left-3 text-outline text-[18px]">search</span>
                    <input class="w-full pl-9 pr-4 py-2 bg-surface-container-low rounded-full text-xs text-ink placeholder:text-outline focus:outline-none focus:ring-2 focus:ring-primary/20"
                           placeholder="Cari lowongan, jadwal, atau perusahaan..." type="text">
                </div>
            </div>

            <div class="flex items-center gap-3">
                <a href="{{ route('mabu.dokumen') }}" title="Notifikasi"
                   class="relative p-2 rounded-full text-slate-600 hover:bg-surface-container-high hover:text-ink transition-colors">
                    <span class="material-symbols-outlined text-[20px]">notifications</span>
                    <span class="absolute top-1.5 right-1.5 w-2 h-2 rounded-full bg-red-600"></span>
                </a>
                <div class="h-6 w-px bg-slate-200"></div>
                <a href="{{ route('mabu.profil') }}"
                   class="flex items-center gap-2 px-2.5 py-1.5 rounded-full transition {{ request()->routeIs('mabu.profil*') ? 'bg-surface-container-high text-primary' : 'hover:bg-slate-100 text-ink' }}">
                    <div class="w-7 h-7 rounded-full bg-primary text-white font-heading font-bold text-[11px] flex items-center justify-center">
                        AC
                    </div>
                    <span class="text-xs font-semibold">Profil</span>
                </a>
            </div>
        </header>

        <!-- AREA KONTEN UTAMA -->
        <main class="flex-1 w-full px-4 sm:px-8 py-6">
            @yield('content')
        </main>
    </div>

    @stack('scripts')
</body>
</html>
