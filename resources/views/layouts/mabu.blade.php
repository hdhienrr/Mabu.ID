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
                        surface: "#faf8ff",
                        ink: "#131b2e",
                        muted: "#64748b"
                    },
                    fontFamily: {
                        heading: ["Plus Jakarta Sans", "sans-serif"],
                        sans: ["Inter", "sans-serif"]
                    }
                }
            }
        }
    </script>
    @stack('styles')
</head>
<body class="bg-surface font-sans text-ink antialiased min-h-screen flex flex-col">

    <!-- SHELL TOP NAVBAR -->
    <header class="sticky top-0 z-40 bg-white/95 backdrop-blur-md border-b border-slate-200/80">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 h-16 flex items-center justify-between gap-4">
            <!-- Logo MABU -->
            <a href="{{ route('mabu.dashboard') }}" class="flex items-center gap-2.5 shrink-0">
                <div class="w-9 h-9 rounded-xl bg-primary text-white flex items-center justify-center shadow-xs">
                    <span class="material-symbols-outlined text-[20px]">school</span>
                </div>
                <div>
                    <span class="font-heading font-extrabold text-lg text-primary tracking-tight block leading-none">MABU</span>
                    <span class="text-[10px] font-medium text-muted hidden sm:block">Mahasiswa Butuh Uang</span>
                </div>
            </a>

            <!-- Navigasi Utama (Desktop) -->
            <nav class="hidden md:flex items-center gap-1">
                <a href="{{ route('mabu.dashboard') }}"
                   class="px-3.5 py-2 rounded-xl text-sm font-semibold transition {{ request()->routeIs('mabu.dashboard') ? 'bg-primary-light text-primary' : 'text-muted hover:text-ink hover:bg-slate-100' }}">
                    Main Page
                </a>
                <a href="{{ route('mabu.jadwal') }}"
                   class="px-3.5 py-2 rounded-xl text-sm font-semibold transition {{ request()->routeIs('mabu.jadwal') ? 'bg-primary-light text-primary' : 'text-muted hover:text-ink hover:bg-slate-100' }}">
                    Jadwal Kuliah
                </a>
                <a href="{{ route('mabu.lamaran') }}"
                   class="px-3.5 py-2 rounded-xl text-sm font-semibold transition {{ request()->routeIs('mabu.lamaran') ? 'bg-primary-light text-primary' : 'text-muted hover:text-ink hover:bg-slate-100' }}">
                    Status Pekerjaan
                </a>
            </nav>

            <!-- Ikon Kanan: Notifikasi & Profil -->
            <div class="flex items-center gap-2">
                <a href="{{ route('mabu.dokumen') }}" title="Inbox & Notifikasi"
                   class="relative w-10 h-10 rounded-full flex items-center justify-center text-muted hover:bg-slate-100 hover:text-ink transition">
                    <span class="material-symbols-outlined text-[22px]">notifications</span>
                    <span class="absolute top-2.5 right-2.5 w-2 h-2 rounded-full bg-red-500"></span>
                </a>
                <div class="h-5 w-px bg-slate-200"></div>
                <a href="{{ route('mabu.profil') }}"
                   class="flex items-center gap-2 pl-1.5 pr-3 py-1.5 rounded-full transition {{ request()->routeIs('mabu.profil*') ? 'bg-primary-light text-primary' : 'hover:bg-slate-100 text-ink' }}">
                    <div class="w-8 h-8 rounded-full bg-primary text-white font-heading font-bold text-xs flex items-center justify-center">
                        AC
                    </div>
                    <span class="hidden sm:block text-sm font-semibold">Andika</span>
                </a>
            </div>
        </div>

        <!-- Navigasi Mobile (HP) -->
        <nav class="flex md:hidden items-center justify-around border-t border-slate-100 px-2 py-1.5 bg-white">
            <a href="{{ route('mabu.dashboard') }}"
               class="px-3 py-1.5 rounded-lg text-xs font-semibold {{ request()->routeIs('mabu.dashboard') ? 'bg-primary-light text-primary' : 'text-muted' }}">
                Main Page
            </a>
            <a href="{{ route('mabu.jadwal') }}"
               class="px-3 py-1.5 rounded-lg text-xs font-semibold {{ request()->routeIs('mabu.jadwal') ? 'bg-primary-light text-primary' : 'text-muted' }}">
                Jadwal Kuliah
            </a>
            <a href="{{ route('mabu.lamaran') }}"
               class="px-3 py-1.5 rounded-lg text-xs font-semibold {{ request()->routeIs('mabu.lamaran') ? 'bg-primary-light text-primary' : 'text-muted' }}">
                Status Pekerjaan
            </a>
        </nav>
    </header>

    <!-- KONTEN HALAMAN -->
    <main class="flex-1 max-w-7xl w-full mx-auto px-4 sm:px-6 py-6">
        @yield('content')
    </main>

    @stack('scripts')
</body>
</html>
