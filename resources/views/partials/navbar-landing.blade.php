<!-- BEGIN: MainHeader -->
<header class="fixed top-0 left-0 right-0 z-50 transition-colors duration-200 border-b"
    data-purpose="primary-navigation"
    style="background-color: var(--nav-bg); border-color: var(--border); backdrop-filter: blur(12px); -webkit-backdrop-filter: blur(12px);">
    <div class="max-w-7xl mx-auto px-6 h-16 flex items-center justify-between">
        <!-- Brand Logo -->
        <a class="flex items-center gap-3 group" href="{{ url('/') }}#beranda">
            <div class="w-10 h-10 rounded-lg flex items-center justify-center text-white shadow-sm transition-transform group-hover:scale-105"
                style="background-color: var(--accent);">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24">
                    <path d="M12 14l9-5-9-5-9 5 9 5z" stroke-linecap="round" stroke-linejoin="round"></path>
                    <path
                        d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"
                        stroke-linecap="round" stroke-linejoin="round"></path>
                    <path d="M12 14l-4.5 2.5v3" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
            </div>
            <div class="flex flex-col">
                <span class="text-xl font-extrabold tracking-wider leading-none" style="color: var(--text);">MABU</span>
                <span class="text-[10px] font-semibold tracking-wider uppercase mt-1"
                    style="color: var(--text-faint);">MAHASISWA BUTUH UANG</span>
            </div>
        </a>

        <!-- Center Navigation Links -->
        <nav class="hidden md:flex items-center space-x-7 text-xs font-bold tracking-wider">
            <a class="transition-colors pb-1 border-b-2" href="#beranda"
                style="color: var(--accent); border-color: var(--accent);">BERANDA</a>
            <a class="transition-colors pb-1 border-b-2 border-transparent hover:text-blue-600" href="#tentang"
                style="color: var(--text-muted);">TENTANG KAMI</a>
            <a class="transition-colors pb-1 border-b-2 border-transparent hover:text-blue-600" href="#cara-kerja"
                style="color: var(--text-muted);">CARA KERJA</a>
            <a class="transition-colors pb-1 border-b-2 border-transparent hover:text-blue-600" href="#kontak"
                style="color: var(--text-muted);">KONTAK</a>
        </nav>

        <!-- Right Controls: Theme Toggle & Auth Buttons -->
        <div class="flex items-center gap-3">
            <!-- Dark/Light Mode Toggle Button -->
            <button aria-label="Ubah tema"
                class="w-9 h-9 rounded-full flex items-center justify-center border transition-all duration-200 hover:scale-105 active:scale-95"
                id="theme-toggle"
                style="border-color: var(--border); background-color: var(--surface); color: var(--text-muted);">
                <!-- Sun Icon -->
                <svg class="w-4 h-4 hidden" fill="none" id="theme-sun-icon" stroke="currentColor" stroke-width="2"
                    viewBox="0 0 24 24">
                    <circle cx="12" cy="12" r="5"></circle>
                    <path
                        d="M12 1v2m0 18v2M4.22 4.22l1.42 1.42m12.72 12.72l1.42 1.42M1 12h2m18 0h2M4.22 19.78l1.42-1.42M18.36 5.64l1.42-1.42"
                        stroke-linecap="round"></path>
                </svg>
                <!-- Moon Icon -->
                <svg class="w-4 h-4" fill="none" id="theme-moon-icon" stroke="currentColor" stroke-width="2"
                    viewBox="0 0 24 24">
                    <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z" stroke-linecap="round"
                        stroke-linejoin="round"></path>
                </svg>
            </button>

            @guest
            <a class="hidden sm:inline-flex items-center justify-center text-xs font-semibold px-4 py-2 rounded-full border transition-all hover:border-blue-600 hover:text-blue-600 btn-outline-theme"
                href="{{ route('login') }}">
                Sign In
            </a>
            <a class="inline-flex items-center justify-center text-xs font-semibold px-4 sm:px-5 py-2 rounded-full shadow-sm hover:opacity-95 transition-all btn-accent-theme"
                href="{{ route('register') }}">
                Sign Up
            </a>
            @else
            <a class="inline-flex items-center justify-center text-xs font-semibold px-4 sm:px-5 py-2 rounded-full shadow-sm hover:opacity-95 transition-all btn-accent-theme"
                href="{{ url('/dashboard') }}">
                Dashboard
            </a>
            @endguest
        </div>
    </div>
</header>
<!-- END: MainHeader -->