<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <link rel="manifest" href="{{ asset('manifest.json') }}">
    <meta name="theme-color" content="#000000"> {{-- samain sama theme_color di manifest --}}
    <link rel="apple-touch-icon" href="{{ asset('images/favicon.svg') }}">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'PT Kontragtor Indonesia Tbk.') | Sewa Alat Berat Konstruksi</title>
    <meta name="description" content="@yield('meta_description', 'PT Kontragtor Indonesia Tbk. — Penyedia jasa sewa alat berat konstruksi terpercaya.')">
    <meta property="og:title" content="@yield('title', 'PT Kontragtor Indonesia Tbk.')">
    <meta property="og:description" content="@yield('meta_description', 'Sewa alat berat konstruksi profesional di Indonesia.')">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="@yield('og_image', asset('images/og-default.jpg'))">

    <link rel="icon" type="image/svg+xml" href="{{ asset('images/favicon.svg') }}">
    <link rel="alternate icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/favicon.svg') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700;800;900&family=Barlow+Condensed:wght@600;700;800;900&display=swap" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: { DEFAULT: '#F59E0B', dark: '#D97706', light: '#FEF3C7' },
                    },
                    fontFamily: {
                        sans: ['Barlow', 'sans-serif'],
                        display: ['Barlow Condensed', 'sans-serif'],
                    },
                }
            }
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    @stack('styles')

    <style>
        * { font-family: 'Barlow', sans-serif; }
        .font-display { font-family: 'Barlow Condensed', sans-serif; }

        /* Navbar */
        .nav-link { @apply text-gray-900 hover:text-yellow-600 transition-colors duration-200 font-semibold text-sm; }
        .nav-link.active { @apply text-yellow-600; }

        /* Buttons */
        .btn-primary { @apply bg-yellow-500 hover:bg-yellow-600 text-black font-bold px-6 py-3 rounded-lg transition-all duration-200 inline-flex items-center gap-2 shadow-sm; }
        .btn-outline { @apply border-2 border-yellow-500 text-yellow-600 hover:bg-yellow-500 hover:text-black font-bold px-6 py-3 rounded-lg transition-all duration-200 inline-flex items-center gap-2; }
        .btn-white { @apply bg-white hover:bg-yellow-50 text-gray-900 font-bold px-6 py-3 rounded-lg transition-all duration-200 inline-flex items-center gap-2 shadow-sm border border-gray-200; }

        /* Badges */
        .badge-available { @apply bg-green-100 text-green-700 text-xs font-semibold px-2.5 py-1 rounded-full; }
        .badge-unavailable { @apply bg-red-100 text-red-600 text-xs font-semibold px-2.5 py-1 rounded-full; }

        /* Section title */
        .section-title { font-family: 'Barlow Condensed', sans-serif; @apply text-4xl font-bold uppercase tracking-wide; }

        /* Hero animated gradient bg */
        @keyframes gradientShift {
            0%   { background-position: 0% 50%; }
            50%  { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        @keyframes floatUp {
            0%, 100% { transform: translateY(0px) rotate(0deg); opacity: .15; }
            50%       { transform: translateY(-30px) rotate(5deg); opacity: .3; }
        }
        @keyframes floatDown {
            0%, 100% { transform: translateY(0px) rotate(0deg); opacity: .1; }
            50%       { transform: translateY(20px) rotate(-5deg); opacity: .25; }
        }
        @keyframes scanLine {
            0%   { transform: translateY(-100%); }
            100% { transform: translateY(100vh); }
        }
        @keyframes pulse-ring {
            0%   { transform: scale(.95); box-shadow: 0 0 0 0 rgba(245,158,11,.4); }
            70%  { transform: scale(1); box-shadow: 0 0 0 20px rgba(245,158,11,0); }
            100% { transform: scale(.95); box-shadow: 0 0 0 0 rgba(245,158,11,0); }
        }
        @keyframes counterUp {
            from { opacity: 0; transform: translateY(20px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        .hero-particle { position: absolute; border-radius: 50%; animation: floatUp 6s ease-in-out infinite; }
        .hero-particle:nth-child(even) { animation-name: floatDown; }

        /* CTA section */
        .cta-glow { box-shadow: 0 0 60px rgba(245,158,11,.35), 0 0 120px rgba(245,158,11,.15); }

        /* Card hover */
        .eq-card:hover .eq-img { transform: scale(1.05); }
        .eq-img { transition: transform .5s ease; }

        /* Pagination style */
        .pagination { @apply flex gap-1 flex-wrap; }
        .pagination li a, .pagination li span {
            @apply px-3 py-1.5 rounded-lg text-sm font-medium transition-colors;
        }
        .pagination li a { @apply bg-white border border-gray-200 text-gray-600 hover:bg-yellow-500 hover:text-black hover:border-yellow-500; }
        .pagination li.active span { @apply bg-yellow-500 text-black border border-yellow-500; }
        .pagination li.disabled span { @apply bg-gray-100 text-gray-400 border border-gray-100 cursor-not-allowed; }

        /* Form inputs */
        .form-input { @apply w-full border border-gray-200 rounded-xl px-4 py-3 text-gray-900 text-sm focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-transparent transition bg-white; }
        .form-label { @apply block text-sm font-semibold text-gray-700 mb-1.5; }
    </style>
</head>
<body class="bg-white text-gray-900 antialiased">

    @include('partials.navbar')

    <main>
        @yield('content')
    </main>

    @include('partials.footer')

    {{-- Flash Messages via SweetAlert --}}
    @if(session('success'))
    <script>
    document.addEventListener('DOMContentLoaded', () => {
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: @json(session('success')),
            confirmButtonColor: '#F59E0B',
            confirmButtonText: 'OK',
            timer: 5000,
            timerProgressBar: true,
        });
    });
    </script>
    @endif

    @if(session('error'))
    <script>
    document.addEventListener('DOMContentLoaded', () => {
        Swal.fire({
            icon: 'error',
            title: 'Gagal!',
            text: @json(session('error')),
            confirmButtonColor: '#F59E0B',
        });
    });
    </script>
    @endif

    @if($errors->any())
    <script>
    document.addEventListener('DOMContentLoaded', () => {
        Swal.fire({
            icon: 'warning',
            title: 'Perhatian',
            html: `{!! implode('<br>', $errors->all()) !!}`,
            confirmButtonColor: '#F59E0B',
        });
    });
    </script>
    @endif

    @stack('scripts')

    {{-- PWA Service Worker --}}
    <script>
        if ('serviceWorker' in navigator) {
            navigator.serviceWorker.register('/sw.js')
            .then(reg => console.log('SW registered:', reg.scope))
            .catch(err => console.error('SW error:', err));
        }
    </script>

</body>
</html>
