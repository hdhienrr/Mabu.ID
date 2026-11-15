<!DOCTYPE html>
<html class="scroll-smooth" data-theme="light" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'MABU - Portal Kerja Fleksibel & Part-Time')</title>

    <!-- Theme Controller (Immediate execution avoids FOUC) -->
    <script src="{{ asset('js/theme.js') }}"></script>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@500;600;700;800&display=swap"
        rel="stylesheet">

    <!-- Global Theme Stylesheet -->
    <link rel="stylesheet" href="{{ asset('css/theme.css') }}">

    <!-- Tailwind CSS CDN & External Config -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script src="{{ asset('js/tailwind-config.js') }}"></script>

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

    @stack('scripts')
</body>

</html>
