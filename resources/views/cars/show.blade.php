@extends('layout')

@section('title', 'Detail Penyewaan')

@section('content')
    <div class="flex justify-between fixed">
        <a href="{{ route('cars.index') }}"
            class="bg-gray-500 text-white py-2 px-4 rounded-md hover:bg-gray-600 transition duration-300 flex flex-row">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                <path fill="currentColor"
                    d="m7.825 13l4.9 4.9q.3.3.288.7t-.313.7q-.3.275-.7.288t-.7-.288l-6.6-6.6q-.15-.15-.213-.325T4.426 12t.063-.375t.212-.325l6.6-6.6q.275-.275.688-.275t.712.275q.3.3.3.713t-.3.712L7.825 11H19q.425 0 .713.288T20 12t-.288.713T19 13z" />
            </svg>
            Kembali
        </a>
    </div>

    <div class="max-w-lg mx-auto bg-white shadow-lg rounded-lg p-6 mt-10">
        <h1 class="text-2xl font-bold text-gray-800 mb-4 text-center">Detail Mobil</h1>

        <div class="space-y-4">
            {{-- Nama Mobil --}}
            <div>
                <label class="block text-gray-700 font-medium">Nama Mobil:</label>
                <input type="text" value="{{ $cars->name ?? '-' }}" readonly
                    class="w-full mt-1 p-2 border border-gray-300 rounded-md bg-gray-100">
            </div>

            {{-- Brand Mobil --}}
            <div>
                <label class="block text-gray-700 font-medium">Brand Mobil:</label>
                <input type="text" value="{{ $cars->brand ?? '-' }}" readonly
                    class="w-full mt-1 p-2 border border-gray-300 rounded-md bg-gray-100">
            </div>

            {{-- Tahun --}}
            <div>
                <label class="block text-gray-700 font-medium">Tahun:</label>
                <input type="number" value="{{ $cars->year }}" readonly
                    class="w-full mt-1 p-2 border border-gray-300 rounded-md bg-gray-100">
            </div>

            {{-- Harga per Hari --}}
            <label class="block text-gray-700 font-medium m-0">Harga per Hari:</label>
            <div class="flex items-center border border-gray-300 rounded-md p-2 bg-gray-100 w-full">
                <span class="text-gray-700 font-medium">Rp.</span>
                <input type="text" id="formatted_price" value="{{ $cars->price }}"
                    class="w-full ml-2 p-1 bg-transparent outline-none" readonly>
            </div>
        </div>
    </div>
@endsection
