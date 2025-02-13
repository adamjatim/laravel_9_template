<nav class="bg-gray-800 sticky top-0 z-50 w-full">
    <div class="container mx-auto px-4">
        <div class="flex h-16 items-center justify-between">
            {{-- Logo --}}
            <div class="flex items-center gap-2">
                {{-- <img class="h-8 w-auto" src="https://tailwindui.com/plus-assets/img/logos/mark.svg?color=indigo&shade=500"
                    alt="Logo"> --}}
                <a href="/" class="text-xl font-bold text-white">Halo, {{ auth()->user()->name }} 👋</a>
            </div>

            {{-- Tombol Mobile Menu --}}
            <button id="mobile-menu-button" class="sm:hidden text-gray-400 hover:text-white focus:outline-none">
                <svg id="menu-icon" class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 6h16M4 12h16m-16 6h16" />
                </svg>
                <svg id="close-icon" class="w-6 h-6 hidden" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>

            {{-- Menu Navigasi Desktop --}}
            <div class="hidden sm:flex space-x-4">
                <a href="/rentals"
                    class="rounded-md px-3 py-2 text-sm font-medium @if (Route::is('rentals.*')) text-white bg-gray-900
                @else
                    text-gray-300 hover:bg-gray-700 hover:text-white @endif">Daftar
                    Penyewa</a>
                <a href="/penyewa"
                    class="rounded-md px-3 py-2 text-sm font-medium @if (Route::is('penyewa.*')) text-white bg-gray-900
                    @else
                        text-gray-300 hover:bg-gray-700 hover:text-white @endif">Daftar
                    Penyewa</a>
                <a href="/cars"
                    class="rounded-md px-3 py-2 text-sm font-medium @if (Route::is('cars.*')) text-white bg-gray-900
                @else
                    text-gray-300 hover:bg-gray-700 hover:text-white @endif">Daftar
                    Mobil</a>
            </div>

            {{-- Profil & Logout --}}
            <div class="hidden sm:flex items-center space-x-4">
                {{-- <span class="text-white text-sm">{{ Auth::user()->name }}</span> --}}
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit"
                        class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </div>

    {{-- Mobile Menu --}}
    <div id="mobile-menu" class="hidden sm:hidden bg-gray-900 text-white p-4 space-y-2">
        <a href="/rentals"
            class="block rounded-md px-3 py-2 text-sm font-medium
                @if (Route::is('rentals.*')) text-white bg-gray-800
                @else
                    text-gray-300 hover:bg-gray-700 hover:text-white @endif">Daftar
            Penyewa
        </a>
        <a href="/cars"
            class="block rounded-md px-3 py-2 text-sm font-medium
                @if (Route::is('cars.*')) text-white bg-gray-900
                @else
                    text-gray-300 hover:bg-gray-700 hover:text-white @endif">Daftar
            Mobil
        </a>
        {{-- Profil & Logout --}}
        <div class=" block sm:flex items-center space-x-4">
            {{-- <span class="text-white text-sm">{{ Auth::user()->name }}</span> --}}
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit"
                    class="w-full text-start rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">
                    Logout
                </button>
            </form>
        </div>
    </div>
</nav>
