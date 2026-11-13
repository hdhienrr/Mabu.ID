<!DOCTYPE html>
<html class="scroll-smooth" data-theme="light" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Autentikasi - MABU')</title>

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

    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect" />
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@600;700;800&display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap"
        rel="stylesheet" />

    <style>
        :root,
        [data-theme="light"] {
            --bg-surface: #faf8ff;
            --bg-surface-lowest: #ffffff;
            --bg-surface-low: #f2f3ff;
            --bg-surface-container: #eaedff;
            --bg-surface-high: #e2e7ff;
            --bg-surface-highest: #dae2fd;
            --text-on-surface: #131b2e;
            --text-on-surface-variant: #434655;
            --color-primary: #2563eb;
            --color-primary-fixed: #dbe1ff;
            --color-border: #E2E8F0;
            --color-text-faint: #94A3B8;
            --color-brand-50: #EFF6FF;
            --color-brand-100: #DBEAFE;
            --nav-bg: rgba(250, 248, 255, 0.85);
            --card-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.05), 0 8px 10px -6px rgba(0, 0, 0, 0.04);
        }

        [data-theme="dark"],
        .dark {
            --bg-surface: #060B16;
            --bg-surface-lowest: #0E1626;
            --bg-surface-low: #0A1220;
            --bg-surface-container: #131D31;
            --bg-surface-high: #1E2A40;
            --bg-surface-highest: #283044;
            --text-on-surface: #F1F5F9;
            --text-on-surface-variant: #9FB0C8;
            --color-primary: #60A5FA;
            --color-primary-fixed: rgba(96, 165, 250, 0.2);
            --color-border: #1E2A40;
            --color-text-faint: #6B7C96;
            --color-brand-50: rgba(59, 130, 246, 0.15);
            --color-brand-100: rgba(59, 130, 246, 0.2);
            --nav-bg: rgba(6, 11, 22, 0.88);
            --card-shadow: 0 0 0 1px rgba(96, 165, 250, 0.12), 0 12px 30px rgba(0, 0, 0, 0.6);
        }

        @layer base {
            html,
            body {
                margin: 0;
                padding: 0;
            }

            body {
                background-color: var(--bg-surface);
                color: var(--text-on-surface);
                overscroll-behavior: none;
                transition: background-color 0.25s ease, color 0.25s ease, border-color 0.25s ease;
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
            darkMode: ['selector', '[data-theme="dark"]'],
            theme: {
                extend: {
                    colors: {
                        "surface": "var(--bg-surface)",
                        "surface-container-lowest": "var(--bg-surface-lowest)",
                        "surface-container-low": "var(--bg-surface-low)",
                        "surface-container": "var(--bg-surface-container)",
                        "surface-container-high": "var(--bg-surface-high)",
                        "surface-container-highest": "var(--bg-surface-highest)",
                        "on-surface": "var(--text-on-surface)",
                        "on-surface-variant": "var(--text-on-surface-variant)",
                        "primary": "var(--color-primary)",
                        "primary-fixed": "var(--color-primary-fixed)",
                        "border-light": "var(--color-border)",
                        "border-dark": "#1E2A40",
                        "text-faint-light": "var(--color-text-faint)",
                        "brand-50": "var(--color-brand-50)",
                        "brand-100": "var(--color-brand-100)",
                        "brand-400": "#60A5FA",
                        "brand-500": "#3B82F6",
                        "brand-600": "#2563EB",
                        "brand-700": "#1D4ED8",
                        "brand-900": "#1E3A8A",
                        "on-primary": "#ffffff",
                        "primary-container": "#2563eb",
                        "success": "#10B981",
                        "warning": "#F59E0B",
                        "error": "#EF4444",
                        "danger": "#EF4444",
                        "info": "#06B6D4",
                        "purple": "#8B5CF6",
                        "outline": "var(--color-text-faint)",
                        "outline-variant": "var(--color-border)",
                        "background": "var(--bg-surface)"
                    },
                    borderRadius: {
                        DEFAULT: "0.25rem",
                        lg: "0.5rem",
                        xl: "0.75rem",
                        full: "9999px"
                    },
                    spacing: {
                        "gutter-mobile": "0.75rem",
                        "space-sm": "0.75rem",
                        "space-xs": "0.5rem",
                        "space-2xl": "3rem",
                        "space-xl": "2rem",
                        "space-md": "1rem",
                        "space-xxs": "0.25rem",
                        "space-lg": "1.5rem",
                        "margin": "1.5rem",
                        "space-3xl": "4rem",
                        "margin-mobile": "1rem",
                        "gutter": "1rem"
                    },
                    fontFamily: {
                        "body-xs": ["Inter"],
                        "stat-metric": ["Plus Jakarta Sans"],
                        "label-lg": ["Inter"],
                        "headline-xl": ["Plus Jakarta Sans"],
                        "headline-md": ["Plus Jakarta Sans"],
                        "headline-sm": ["Plus Jakarta Sans"],
                        "display-hero": ["Plus Jakarta Sans"],
                        "label-md": ["Inter"],
                        "body-lg": ["Inter"],
                        "body-sm": ["Inter"],
                        "display-hero-mobile": ["Plus Jakarta Sans"],
                        "headline-lg": ["Plus Jakarta Sans"],
                        "body-md": ["Inter"],
                        "label-sm": ["Inter"]
                    },
                    fontSize: {
                        "body-xs": ["12px", { "lineHeight": "16px", "fontWeight": "400" }],
                        "stat-metric": ["36px", { "lineHeight": "44px", "letterSpacing": "-0.02em", "fontWeight": "800" }],
                        "label-lg": ["16px", { "lineHeight": "24px", "fontWeight": "600" }],
                        "headline-xl": ["32px", { "lineHeight": "40px", "letterSpacing": "-0.02em", "fontWeight": "700" }],
                        "headline-md": ["20px", { "lineHeight": "28px", "letterSpacing": "-0.01em", "fontWeight": "700" }],
                        "headline-sm": ["16px", { "lineHeight": "24px", "fontWeight": "700" }],
                        "display-hero": ["44px", { "lineHeight": "52px", "letterSpacing": "-0.02em", "fontWeight": "800" }],
                        "label-md": ["14px", { "lineHeight": "20px", "fontWeight": "600" }],
                        "body-lg": ["18px", { "lineHeight": "28px", "fontWeight": "400" }],
                        "body-sm": ["14px", { "lineHeight": "20px", "fontWeight": "400" }],
                        "display-hero-mobile": ["32px", { "lineHeight": "40px", "letterSpacing": "-0.015em", "fontWeight": "800" }],
                        "headline-lg": ["24px", { "lineHeight": "32px", "letterSpacing": "-0.015em", "fontWeight": "700" }],
                        "body-md": ["16px", { "lineHeight": "24px", "fontWeight": "400" }],
                        "label-sm": ["12px", { "lineHeight": "16px", "fontWeight": "600" }]
                    }
                }
            }
        };
    </script>
    @stack('styles')
</head>

<body
    class="bg-surface font-body-md text-body-md text-on-surface min-h-screen flex flex-col justify-between antialiased selection:bg-brand-500 selection:text-white">

    @include('partials.auth-navbar')

    <main class="w-full pt-20 flex-1 flex flex-col justify-center bg-surface relative">
        @yield('content')
    </main>

    @include('partials.auth-footer')

    <!-- Theme Switching Script -->
    <script>
        (function () {
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

            const savedTheme = localStorage.getItem('mabu-theme') || (window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light');
            applyTheme(savedTheme);

            themeToggleBtn?.addEventListener('click', () => {
                const currentTheme = document.documentElement.getAttribute('data-theme') || 'light';
                const nextTheme = currentTheme === 'light' ? 'dark' : 'light';
                applyTheme(nextTheme);
            });
        })();
    </script>

    @stack('scripts')
</body>

</html>
