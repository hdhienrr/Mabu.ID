<!DOCTYPE html>
<html class="scroll-smooth" data-theme="light" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'MABU - Portal Kerja Fleksibel & Part-Time')</title>

    <!-- Theme check script to avoid FOUC -->
    <script>
        (function() {
            const savedTheme = localStorage.getItem('mabu-theme') || (window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light');
            document.documentElement.setAttribute('data-theme', savedTheme);
            if (savedTheme === 'dark') {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark');
            }
        })();
    </script>

    <!-- Tailwind CSS CDN with forms and container queries -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@500;600;700;800&display=swap"
        rel="stylesheet">

    <style>
        :root,
        [data-theme="light"] {
            --bg: #FFFFFF;
            --bg-subtle: #F8FAFC;
            --surface: #FFFFFF;
            --surface-hover: #F1F5F9;
            --border: #E2E8F0;
            --text: #0F172A;
            --text-muted: #475569;
            --text-faint: #94A3B8;
            --accent: #2563EB;
            --accent-hover: #1D4ED8;
            --accent-contrast: #FFFFFF;
            --accent-soft: #EFF6FF;
            --accent-soft-border: #DBEAFE;
            --shadow-card: 0 1px 3px rgba(15, 23, 42, .06), 0 4px 16px rgba(37, 99, 235, .04);
            --nav-bg: rgba(255, 255, 255, 0.9);
            --card-bg: #FFFFFF;
        }

        [data-theme="dark"] {
            --bg: #060B16;
            --bg-subtle: #0A1220;
            --surface: #0E1626;
            --surface-hover: #131D31;
            --border: #1E2A40;
            --text: #F1F5F9;
            --text-muted: #9FB0C8;
            --text-faint: #6B7C96;
            --accent: #60A5FA;
            --accent-hover: #3B82F6;
            --accent-contrast: #06142E;
            --accent-soft: rgba(59, 130, 246, .12);
            --accent-soft-border: rgba(96, 165, 250, .24);
            --shadow-card: 0 0 0 1px rgba(96, 165, 250, .1), 0 8px 24px rgba(0, 0, 0, .45);
            --nav-bg: rgba(6, 11, 22, 0.88);
            --card-bg: #0E1626;
        }

        body {
            background-color: var(--bg);
            color: var(--text);
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
            transition: background-color 0.25s ease, color 0.25s ease, border-color 0.25s ease;
        }

        h1,
        h2,
        h3,
        h4,
        .font-heading {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .theme-card {
            background-color: var(--surface);
            border-color: var(--border);
            box-shadow: var(--shadow-card);
        }
    </style>

    <script>
        tailwind.config = {
            darkMode: ['selector', '[data-theme="dark"]'],
            theme: {
                extend: {
                    colors: {
                        brand: {
                            50: '#EFF6FF',
                            100: '#DBEAFE',
                            400: '#60A5FA',
                            500: '#3B82F6',
                            600: '#2563EB',
                            700: '#1D4ED8',
                            900: '#1E3A8A',
                        }
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        heading: ['Plus Jakarta Sans', 'sans-serif'],
                    }
                }
            }
        }
    </script>

    @stack('styles')
</head>

<body class="selection:bg-blue-600 selection:text-white min-h-screen flex flex-col justify-between">

    <!-- Navbar Partial -->
    @include('partials.navbar-landing')

    <!-- Main Content -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- Footer Partial -->
    @include('partials.footer-landing')

    <!-- Interactive Theme Switching & Cookie Script -->
    <script>
        const themeToggleBtn = document.getElementById('theme-toggle');
        const sunIcon = document.getElementById('theme-sun-icon');
        const moonIcon = document.getElementById('theme-moon-icon');

        function applyTheme(theme) {
            document.documentElement.setAttribute('data-theme', theme);
            if (theme === 'dark') {
                document.documentElement.classList.add('dark');
                sunIcon?.classList.remove('hidden');
                moonIcon?.classList.add('hidden');
            } else {
                document.documentElement.classList.remove('dark');
                sunIcon?.classList.add('hidden');
                moonIcon?.classList.remove('hidden');
            }
            localStorage.setItem('mabu-theme', theme);
        }

        const savedTheme = localStorage.getItem('mabu-theme') || 'light';
        applyTheme(savedTheme);

        themeToggleBtn?.addEventListener('click', () => {
            const currentTheme = document.documentElement.getAttribute('data-theme') || 'light';
            const nextTheme = currentTheme === 'light' ? 'dark' : 'light';
            applyTheme(nextTheme);
        });
    </script>

    @stack('scripts')
</body>

</html>