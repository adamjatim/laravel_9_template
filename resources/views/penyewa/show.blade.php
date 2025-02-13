@extends('layout')

@section('title', 'Detail Penyewa')

@section('content')
    <div class="flex justify-between fixed">
        <a href="{{ route('penyewa.index') }}"
            class="bg-gray-500 text-white py-2 px-4 rounded-md hover:bg-gray-600 transition duration-300 flex flex-row">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                <path fill="currentColor"
                    d="m7.825 13l4.9 4.9q.3.3.288.7t-.313.7q-.3.275-.7.288t-.7-.288l-6.6-6.6q-.15-.15-.213-.325T4.426 12t.063-.375t.212-.325l6.6-6.6q.275-.275.688-.275t.712.275q.3.3.3.713t-.3.712L7.825 11H19q.425 0 .713.288T20 12t-.288.713T19 13z" />
            </svg>
            Kembali
        </a>
    </div>

    <div class="max-w-lg mx-auto bg-white shadow-lg rounded-lg p-6 mt-10">
        <h1 class="text-2xl font-bold text-gray-800 mb-4 text-center">Detail Penyewa</h1>

        <div class="space-y-4">
            {{-- Nama Penyewa --}}
            <div>
                <label class="block text-gray-700 font-medium">Penyewa:</label>
                <input type="text" value="{{ $users->name }}" readonly
                    class="w-full mt-1 p-2 border border-gray-300 rounded-md bg-gray-100">
            </div>

            {{-- Email Penyewa --}}
            <div>
                <label class="block text-gray-700 font-medium">Email:</label>
                <input type="text" value="{{ $users->email }}" readonly
                    class="w-full mt-1 p-2 border border-gray-300 rounded-md bg-gray-100">
            </div>

            {{-- Password penyewa --}}
            <div>
                <label class="block text-gray-700 font-medium">Password penyewa:</label>
                <input type="text" value="{{ $users->password }}" readonly
                    class="w-full mt-1 p-2 border border-gray-300 rounded-md bg-gray-100">
            </div>
        </div>
    </div>
@endsection
