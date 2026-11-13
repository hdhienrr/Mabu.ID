<header class="fixed top-0 w-full z-50 backdrop-blur-xl border-b border-border-light transition-colors duration-200"
    style="background-color: var(--nav-bg);">
    <div class="h-20 max-w-[1200px] mx-auto px-margin flex items-center justify-between gap-space-md">
        <div class="flex items-center gap-space-lg">
            <a class="flex items-center gap-space-xs group" href="{{ url('/') }}">
                <div
                    class="w-10 h-10 rounded-xl bg-primary-container flex items-center justify-center shadow-sm group-hover:bg-brand-700 transition-colors">
                    <span class="material-symbols-outlined text-white text-[24px]">school</span>
                </div>
                <div class="flex flex-col">
                    <span
                        class="font-headline-md text-headline-md text-on-surface tracking-tight group-hover:text-primary transition-colors">MABU</span>
                    <span
                        class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider -mt-1">MAHASISWA
                        BUTUH UANG</span>
                </div>
            </a>
            <div class="hidden sm:block h-6 w-[1px] bg-border-light"></div>
            <a class="inline-flex items-center gap-space-xxs text-on-surface-variant hover:text-primary font-label-md text-label-md transition-colors"
                href="{{ url('/') }}">
                <span class="material-symbols-outlined text-[18px]">arrow_back</span>
                <span>Kembali ke Beranda</span>
            </a>
        </div>
        <div class="flex items-center gap-space-md">
            <nav class="hidden md:flex items-center gap-space-sm">
                <a href="{{ route('login') }}"
                    class="px-space-md py-space-xs rounded-lg font-label-md text-label-md transition-colors {{ request()->routeIs('login') ? 'bg-surface-container-high text-on-surface font-semibold' : 'text-on-surface-variant hover:bg-surface-container-low hover:text-on-surface' }}">
                    Masuk
                </a>
                <a href="{{ route('register') }}"
                    class="px-space-md py-space-xs rounded-lg font-label-md text-label-md transition-colors {{ request()->routeIs('register') ? 'bg-surface-container-high text-on-surface font-semibold' : 'text-on-surface-variant hover:bg-surface-container-low hover:text-on-surface' }}">
                    Daftar
                </a>
                <a href="#"
                    class="px-space-md py-space-xs rounded-lg text-on-surface-variant hover:bg-surface-container-low hover:text-on-surface font-label-md text-label-md transition-colors">
                    Pusat Bantuan
                </a>
            </nav>
            <div class="flex items-center gap-space-xs">
                <!-- Theme Toggle Button -->
                <button aria-label="Ganti tema tampilan" id="theme-toggle"
                    class="w-9 h-9 rounded-lg flex items-center justify-center text-on-surface-variant hover:bg-surface-container-low hover:text-on-surface border border-border-light transition-colors"
                    type="button">
                    <svg class="w-4 h-4 hidden" fill="none" id="theme-sun-icon" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" stroke-linecap="round"></path>
                    </svg>
                    <svg class="w-4 h-4 hidden" fill="none" id="theme-moon-icon" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                </button>
                <div class="w-8 h-8 rounded-full bg-primary flex items-center justify-center shadow-sm">
                    <span class="material-symbols-outlined text-white text-[18px]">person</span>
                </div>
            </div>
        </div>
    </div>
</header>
