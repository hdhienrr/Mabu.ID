<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>@yield('title', 'MABU - Mahasiswa Butuh Uang')</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@500;600;700&family=Inter:wght@400;500;600&display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"
        rel="stylesheet" />
    <style>
        @layer base {

            html,
            body {
                margin: 0;
                padding: 0;
            }

            body {
                overscroll-behavior: none;
            }

            main> :first-child {
                margin-top: 0 !important;
            }

            main> :last-child {
                margin-bottom: 0 !important;
            }
        }

        ::-webkit-scrollbar {
            display: none;
        }
    </style>
    <script src="https://cdn.tailwindcss.com"></script>
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "secondary": "#585f67", "primary": "#004ac6", "error": "#ba1a1a", "error-container": "#ffdad6",
                        "on-secondary": "#ffffff", "on-primary": "#ffffff", "surface-tint": "#0053db",
                        "on-tertiary-fixed-variant": "#005236", "tertiary": "#006242", "secondary-fixed": "#dce3ec",
                        "on-secondary-container": "#5e656d", "outline": "#737686", "on-tertiary-fixed": "#002113",
                        "surface-dim": "#d2d9f4", "surface-variant": "#dae2fd", "on-primary-fixed-variant": "#003ea8",
                        "tertiary-container": "#007d55", "surface-container-high": "#e2e7ff", "on-tertiary-container": "#bdffdb",
                        "primary-container": "#2563eb", "on-secondary-fixed-variant": "#40484f", "on-background": "#131b2e",
                        "on-surface": "#131b2e", "inverse-primary": "#b4c5ff", "outline-variant": "#c3c6d7",
                        "on-surface-variant": "#434655", "on-primary-container": "#eeefff", "surface-container": "#eaedff",
                        "secondary-container": "#dce3ec", "primary-fixed-dim": "#b4c5ff", "surface-bright": "#faf8ff",
                        "surface": "#faf8ff", "surface-container-low": "#f2f3ff", "tertiary-fixed": "#6ffbbe",
                        "tertiary-fixed-dim": "#4edea3", "surface-container-lowest": "#ffffff", "on-error": "#ffffff",
                        "primary-fixed": "#dbe1ff", "inverse-on-surface": "#eef0ff", "background": "#faf8ff",
                        "on-primary-fixed": "#00174b", "inverse-surface": "#283044", "on-tertiary": "#ffffff",
                        "on-secondary-fixed": "#151c23", "on-error-container": "#93000a", "surface-container-highest": "#dae2fd",
                        "secondary-fixed-dim": "#c0c7d0"
                    },
                    "borderRadius": { "DEFAULT": "0.25rem", "lg": "0.5rem", "xl": "0.75rem", "full": "9999px" },
                    "spacing": {
                        "space-xl": "2rem", "margin-mobile": "1rem", "gutter-sm": "1rem", "margin": "2rem",
                        "space-sm": "0.5rem", "space-lg": "1.5rem", "gutter": "1.5rem", "space-xs": "0.25rem", "space-md": "1rem"
                    },
                    "fontFamily": {
                        "headline-md": ["Plus Jakarta Sans"], "label-md": ["Plus Jakarta Sans"], "body-md": ["Inter"],
                        "label-sm": ["Plus Jakarta Sans"], "display-lg": ["Plus Jakarta Sans"], "headline-lg-mobile": ["Plus Jakarta Sans"],
                        "label-lg": ["Plus Jakarta Sans"], "body-sm": ["Inter"], "body-lg": ["Inter"],
                        "headline-sm": ["Plus Jakarta Sans"], "headline-lg": ["Plus Jakarta Sans"]
                    },
                    "fontSize": {
                        "headline-md": ["22px", { "lineHeight": "28px", "letterSpacing": "-0.01em", "fontWeight": "600" }],
                        "label-md": ["12px", { "lineHeight": "16px", "fontWeight": "600" }],
                        "body-md": ["14px", { "lineHeight": "20px", "fontWeight": "400" }],
                        "label-sm": ["11px", { "lineHeight": "14px", "letterSpacing": "0.04em", "fontWeight": "700" }],
                        "display-lg": ["36px", { "lineHeight": "44px", "letterSpacing": "-0.02em", "fontWeight": "700" }],
                        "headline-lg-mobile": ["24px", { "lineHeight": "32px", "letterSpacing": "-0.01em", "fontWeight": "700" }],
                        "label-lg": ["14px", { "lineHeight": "20px", "fontWeight": "600" }],
                        "body-sm": ["12px", { "lineHeight": "16px", "fontWeight": "400" }],
                        "body-lg": ["16px", { "lineHeight": "24px", "fontWeight": "400" }],
                        "headline-sm": ["18px", { "lineHeight": "24px", "fontWeight": "600" }],
                        "headline-lg": ["30px", { "lineHeight": "38px", "letterSpacing": "-0.015em", "fontWeight": "700" }]
                    }
                }
            }
        }
    </script>
</head>

<body class="bg-surface font-body-md text-on-surface antialiased">

    @php
        $activeClass = 'bg-primary text-on-primary font-label-lg shadow-sm';
        $inactiveClass = 'font-label-lg text-label-lg text-on-surface-variant hover:bg-surface-container hover:text-on-surface';
    @endphp

    <!-- SIDEBAR -->
    <aside
        class="fixed left-0 top-0 h-screen w-64 bg-surface-container-lowest z-50 flex flex-col justify-between p-space-md shadow-[0_1px_8px_rgba(0,0,0,0.04)]">
        <div class="flex flex-col gap-space-lg">
            <!-- Brand Logo (klik kembali ke Landing Page) -->
            <a href="{{ url('/') }}" class="flex items-center gap-space-sm px-space-xs pt-space-xs group">
                <div
                    class="w-10 h-10 rounded-xl bg-primary flex items-center justify-center shrink-0 group-hover:scale-105 transition-transform">
                    <span class="material-symbols-outlined text-on-primary text-[22px]">school</span>
                </div>
                <div class="flex flex-col">
                    <span class="font-headline-sm text-headline-sm text-primary tracking-tight leading-none">MABU</span>
                    <span
                        class="font-label-sm text-label-sm text-on-surface-variant tracking-wider leading-tight uppercase">Mahasiswa
                        Butuh Uang</span>
                </div>
            </a>

            <!-- Navigation Menu -->
            <nav class="flex flex-col gap-space-xs">
                <a href="{{ route('mabu.profil') }}"
                    class="flex items-center gap-space-sm px-space-md py-space-sm rounded-xl transition-all {{ request()->routeIs('mabu.profil') ? $activeClass : $inactiveClass }}">
                    <span class="material-symbols-outlined text-[20px]">grid_view</span>
                    <span>Dashboard Profil</span>
                </a>

                <a href="{{ route('mabu.lowongan') }}"
                    class="flex items-center gap-space-sm px-space-md py-space-sm rounded-xl transition-all {{ request()->routeIs('mabu.lowongan') ? $activeClass : $inactiveClass }}">
                    <span class="material-symbols-outlined text-[20px]">work</span>
                    <span>Cari Lowongan</span>
                </a>

                <a href="{{ route('mabu.rekomendasi') }}"
                    class="flex items-center justify-between px-space-md py-space-sm rounded-xl transition-all {{ request()->routeIs('mabu.rekomendasi') ? $activeClass : $inactiveClass }}">
                    <div class="flex items-center gap-space-sm">
                        <span class="material-symbols-outlined text-[20px]">auto_awesome</span>
                        <span>Rekomendasi</span>
                    </div>
                    <span
                        class="bg-tertiary-fixed text-on-tertiary-fixed font-label-sm text-label-sm px-space-xs py-0.5 rounded-full">NEW</span>
                </a>

                <a href="{{ route('mabu.jadwal') }}"
                    class="flex items-center gap-space-sm px-space-md py-space-sm rounded-xl transition-all {{ request()->routeIs('mabu.jadwal') ? $activeClass : $inactiveClass }}">
                    <span class="material-symbols-outlined text-[20px]">calendar_month</span>
                    <span>Manajemen Jadwal</span>
                </a>

                <a href="{{ route('mabu.lamaran') }}"
                    class="flex items-center gap-space-sm px-space-md py-space-sm rounded-xl transition-all {{ request()->routeIs('mabu.lamaran') ? $activeClass : $inactiveClass }}">
                    <span class="material-symbols-outlined text-[20px]">fact_check</span>
                    <span>Status Lamaran</span>
                </a>

                <a href="{{ route('mabu.cv') }}"
                    class="flex items-center gap-space-sm px-space-md py-space-sm rounded-xl transition-all {{ request()->routeIs('mabu.cv') ? $activeClass : $inactiveClass }}">
                    <span class="material-symbols-outlined text-[20px]">description</span>
                    <span>Generate CV</span>
                </a>

                <a href="{{ route('mabu.dokumen') }}"
                    class="flex items-center gap-space-sm px-space-md py-space-sm rounded-xl transition-all {{ request()->routeIs('mabu.dokumen') ? $activeClass : $inactiveClass }}">
                    <span class="material-symbols-outlined text-[20px]">folder</span>
                    <span>Dokumen Saya</span>
                </a>
            </nav>
        </div>

        <!-- User Footer & Logout -->
        <div class="flex items-center justify-between p-space-sm rounded-xl bg-surface-container-low">
            <a href="{{ route('mabu.profil') }}" class="flex items-center gap-space-sm min-w-0">
                <div class="w-9 h-9 rounded-full bg-primary flex items-center justify-center shrink-0">
                    <span class="material-symbols-outlined text-on-primary text-[18px]">person</span>
                </div>
                <div class="flex flex-col min-w-0">
                    <span class="font-label-md text-label-md text-on-surface truncate">{{ auth()->user()->name }}</span>
                    <span
                        class="font-body-sm text-body-sm text-on-surface-variant truncate">{{ auth()->user()->role === 'employer' ? 'Mitra Usaha' : 'Mahasiswa' }}</span>
                </div>
            </a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" title="Keluar"
                    class="w-8 h-8 rounded-lg flex items-center justify-center text-on-surface-variant hover:bg-error-container hover:text-on-error-container transition-colors">
                    <span class="material-symbols-outlined text-[20px]">logout</span>
                </button>
            </form>
        </div>
    </aside>

    <!-- CONTENT WRAPPER -->
    <div class="pl-64">
        <!-- TOP HEADER -->
        <header
            class="fixed top-0 left-64 right-0 h-16 bg-surface/80 backdrop-blur-xl z-40 px-space-lg flex items-center justify-between shadow-[0_1px_8px_rgba(0,0,0,0.04)]">
            <form action="{{ route('mabu.lowongan') }}" method="GET" class="flex items-center flex-1 max-w-md">
                <div
                    class="flex items-center w-full bg-surface-container-lowest rounded-full px-space-md py-space-xs shadow-[0_1px_3px_rgba(0,0,0,0.03)]">
                    <span
                        class="material-symbols-outlined text-on-surface-variant text-[20px] mr-space-sm">search</span>
                    <input name="q"
                        class="w-full bg-transparent font-body-sm text-body-sm text-on-surface placeholder:text-outline focus:outline-none"
                        placeholder="Cari part-time, barista, freelance..." type="text" />
                    <kbd
                        class="hidden sm:inline-flex items-center font-label-sm text-label-sm text-on-surface-variant bg-surface-container px-space-xs py-0.5 rounded">⌘K</kbd>
                </div>
            </form>
            <div class="flex items-center gap-space-md">
                <button aria-label="Notifikasi"
                    class="relative p-space-sm rounded-full text-on-surface-variant hover:bg-surface-container hover:text-on-surface transition-colors">
                    <span class="material-symbols-outlined text-[22px]">notifications</span>
                    <span class="absolute top-1.5 right-1.5 w-2 h-2 rounded-full bg-primary"></span>
                </button>
                <a href="{{ route('mabu.profil') }}" aria-label="Profil Pengguna"
                    class="flex items-center gap-space-xs p-space-xs rounded-full hover:bg-surface-container transition-colors">
                    <div class="w-8 h-8 rounded-full bg-primary flex items-center justify-center">
                        <span class="material-symbols-outlined text-on-primary text-[18px]">person</span>
                    </div>
                </a>
            </div>
        </header>

        <!-- MAIN PAGE CONTENT -->
        <main class="relative w-full pt-24 pb-space-xl px-space-lg bg-surface min-h-screen">
            @yield('content')
        </main>
    </div>

    @stack('scripts')
</body>

</html>