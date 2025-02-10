<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    {{-- Load CSS (gunakan Vite jika Laravel 9 menggunakan Vite) --}}

    @yield('stylesheet')
</head>

<body class="flex flex-col min-h-screen">

    {{-- Navbar hanya muncul setelah login --}}
    @auth
        @include('navbar')
    @endauth

    {{-- Konten utama --}}
    <main class="flex-grow w-full mx-auto px-4 py-6">
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer class="w-full bg-gray-800 text-gray-200 text-center py-4">
        <p>&copy; {{ date('Y') }} ASLAB SISFOKOM ITATS</p>
    </footer>

    <script src="{{ asset('js/mobile-hamburger.js') }}"></script>
    <script src="{{ asset('js/formater.js') }}"></script>
</body>

</html>
