<!DOCTYPE html>
<html lang="en" x-data>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Arold Mina Reyes — IT Student & Technical Instructor portfolio showcasing skills, projects, certifications, and experience.">
    <meta name="author" content="Arold Mina Reyes">
    <meta name="color-scheme" content="light dark">
    <meta name="theme-color" content="#0f172a" media="(prefers-color-scheme: dark)">
    <meta name="theme-color" content="#f8fafc" media="(prefers-color-scheme: light)">
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <link rel="apple-touch-icon" href="{{ asset('favicon.ico') }}">
    <title>@yield('title', 'Arold Mina Reyes | IT Student & Technical Instructor')</title>

    {{-- Apply theme class immediately to prevent FOUC / bright flash
         Priority: saved preference > system preference > dark (default) --}}
    <script>
        (function () {
            try {
                var storedTheme = localStorage.getItem('theme');
                var dark;
                if (storedTheme === 'light') {
                    dark = false;
                } else if (storedTheme === 'dark') {
                    dark = true;
                } else {
                    // No saved preference: follow the OS. The catch below defaults to dark.
                    dark = window.matchMedia('(prefers-color-scheme: dark)').matches;
                }
                document.documentElement.classList.remove('light', 'dark');
                document.documentElement.classList.add(dark ? 'dark' : 'light');
            } catch (e) {
                document.documentElement.classList.add('dark');
            }
        })();
    </script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Syne:wght@400;500;600;700;800&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet"
    >

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('head')
</head>
<body class="font-sans antialiased theme-transition">
    {{-- Skip to main content link for keyboard / screen reader users --}}
    <a href="#main-content" class="skip-link">Skip to main content</a>

    @php
        $navLinks = [
            ['name' => 'Home', 'id' => 'home'],
            ['name' => 'About', 'id' => 'about'],
            ['name' => 'Skills', 'id' => 'skills'],
            ['name' => 'Projects', 'id' => 'projects'],
            ['name' => 'Experience & Education', 'short' => 'Experience', 'id' => 'education-experience'],
            ['name' => 'Certifications', 'id' => 'certifications'],
            ['name' => 'Contact', 'id' => 'contact'],
        ];
    @endphp

    @include('partials.navbar')

    <main id="main-content" role="main" tabindex="-1">
        @yield('content')
    </main>

    @include('partials.footer')
    @include('partials.back-to-top')

    {{-- Scroll progress bar (full-width bar under the navbar) --}}
    <div id="scroll-progress" class="fixed top-0 left-0 h-0.5 w-0 bg-gradient-to-r from-blue-600 to-cyan-400 z-[60]" aria-hidden="true"></div>
</body>
</html>
