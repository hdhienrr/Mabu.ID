<!DOCTYPE html>
<html class="scroll-smooth" data-theme="light" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Autentikasi - MABU')</title>

    <!-- Theme Controller (Immediate execution avoids FOUC) -->
    <script src="{{ asset('js/theme.js') }}"></script>

    <!-- Google Fonts & Material Symbols -->
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect" />
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@600;700;800&display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"
        rel="stylesheet" />

    <!-- External Theme & Auth Stylesheets -->
    <link rel="stylesheet" href="{{ asset('css/theme.css') }}">
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">

    <!-- Tailwind CSS CDN & External Config -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script src="{{ asset('js/tailwind-config.js') }}"></script>

    @stack('styles')
</head>

<body
    class="auth-body font-body-md text-body-md min-h-screen flex flex-col justify-between antialiased selection:bg-brand-500 selection:text-white">

    @include('partials.auth-navbar')

    <main class="auth-main w-full pt-20 flex-1 flex flex-col justify-center bg-surface relative">
        @yield('content')
    </main>

    @include('partials.auth-footer')

    <!-- Authentication JavaScript -->
    <script src="{{ asset('js/auth.js') }}" defer></script>

    @stack('scripts')
</body>

</html>
