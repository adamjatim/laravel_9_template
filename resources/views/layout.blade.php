<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="{{ asset('DataTables/datatables.css') }}">
    <link rel="stylesheet" href="{{ asset('DataTables/datatables.min.css') }}">
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

    <script src="{{ asset('jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('js/mobile-hamburger.js') }}"></script>
    <script src="{{ asset('js/formater.js') }}"></script>
    <script src="{{ asset('DataTables/datatables.js') }}"></script>
    <script src="{{ asset('DataTables/datatables.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#table').DataTable(); // Pastikan ID tabel benar
        });
    </script>

    <script>
        $(document).ready(function() {
            // Fungsi untuk update input
            function updateCarDetails() {
                // Ambil teks dari opsi yang dipilih
                const selectedText = $('#car_id option:selected').text();

                // Pisahkan nama dan merek mobil
                const [carName, carBrand] = selectedText.split(' - ');

                // Update nilai input
                $('#car_name').val(carName || '');
                $('#car_brand').val(carBrand || '');
            }

            // Jalankan fungsi saat dropdown berubah
            $('#car_id').on('change', updateCarDetails);

            // Jalankan fungsi saat halaman dimuat (untuk mengisi nilai awal)
            updateCarDetails();
        });
    </script>

    @yield('scripts')
</body>

</html>
