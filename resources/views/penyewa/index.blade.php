@extends('layout')

@section('title', 'Daftar Mobil')

@section('content')
    <div class="flex flex-col items-center w-full">
        {{-- Header --}}
        <div class="flex flex-row justify-between w-full">
            <h1 class="text-3xl font-bold text-gray-800 mb-6">Daftar Penyewaan</h1>
        </div>

        {{-- Flash Message --}}
        @if (session('success'))
            <div class="bg-green-100 text-green-700 px-4 py-2 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        {{-- Table --}}
        <div class="bg-white rounded-lg w-full overflow-x-auto shadow-md">
            <div class="py-3 flex flex-row w-full justify-between px-4">

                {{-- Tambah Penyewaan --}}
                <a href="{{ route('penyewa.create') }}"
                    class="flex flex-row items-center bg-blue-500 text-white font-bold py-2 px-4 rounded shadow hover:bg-blue-600">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        class="mr-2">
                        <path fill="currentColor"
                            d="M10.5 20a1.5 1.5 0 0 0 3 0v-6.5H20a1.5 1.5 0 0 0 0-3h-6.5V4a1.5 1.5 0 0 0-3 0v6.5H4a1.5 1.5 0 0 0 0 3h6.5z" />
                    </svg>
                    Tambah User
                </a>
            </div>

            <div class="overflow-auto">
                <table class="w-full divide-y divide-gray-200" id="table">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase w-16">No</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nama User</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase w-xl">Email</th>
                            <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase w-32">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse ($users as $index => $user)
                            <tr class="{{ $index % 2 === 0 ? 'bg-white' : 'bg-gray-100' }}">
                                <td class="px-4 py-3 text-center text-sm text-gray-700">{{ $index + 1 }}</td>
                                <td class="px-6 py-3 text-sm text-gray-700">{{ $user->name ?? '-' }}</td>
                                <td class="px-6 py-3 text-sm text-gray-700">{{ $user->email ?? '-' }}</td>
                                <td class="px-4 py-2 flex flex-row justify-center space-x-2">
                                    {{-- <a href="{{ route('penyewa.show', $user->id) }}"
                                        class="bg-blue-500 text-white text-xs font-bold py-1 px-3 rounded hover:bg-blue-600 flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            viewBox="0 0 24 24" class="mr-1">
                                            <path fill="currentColor"
                                                d="M20 3H4c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2h16c1.103 0 2-.897 2-2V5c0-1.103-.897-2-2-2M4 19V5h16l.002 14z" />
                                            <path fill="currentColor" d="M6 7h12v2H6zm0 4h12v2H6zm0 4h6v2H6z" />
                                        </svg>
                                        Detail
                                    </a> --}}
                                    <a href="{{ route('penyewa.edit', $user->id) }}"
                                        class="bg-yellow-500 text-white text-xs font-bold py-1 px-3 rounded hover:bg-yellow-600 flex items-center flex flex-row">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            viewBox="0 0 24 24">
                                            <g fill="none" stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2">
                                                <path d="M7 7H6a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2-2v-1" />
                                                <path d="M20.385 6.585a2.1 2.1 0 0 0-2.97-2.97L9 12v3h3zM16 5l3 3" />
                                            </g>
                                        </svg>
                                        Edit
                                    </a>
                                    <form action="{{ route('penyewa.destroy', $user->id) }}" method="POST"
                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus penyewaan ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="bg-red-500 text-white text-xs py-2 px-4 rounded-md hover:bg-red-600 transition duration-300 flex flex-row">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                viewBox="0 0 24 24">
                                                <g fill="none">
                                                    <path
                                                        d="m12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035q-.016-.005-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427q-.004-.016-.017-.018m.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093q.019.005.029-.008l.004-.014l-.034-.614q-.005-.018-.02-.022m-.715.002a.02.02 0 0 0-.027.006l-.006.014l-.034.614q.001.018.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01z" />
                                                    <path fill="currentColor"
                                                        d="M20 5a1 1 0 1 1 0 2h-1l-.003.071l-.933 13.071A2 2 0 0 1 16.069 22H7.93a2 2 0 0 1-1.995-1.858l-.933-13.07L5 7H4a1 1 0 0 1 0-2zm-3.003 2H7.003l.928 13h8.138zM14 2a1 1 0 1 1 0 2h-4a1 1 0 0 1 0-2z" />
                                                </g>
                                            </svg>
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-4 py-3 text-center text-gray-500">Tidak ada data penyewaan.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
