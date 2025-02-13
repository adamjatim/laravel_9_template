@extends('layout')

@section('title', 'Edit Mobil')

@section('content')
    <div class="max-w-lg mx-auto bg-white shadow-lg rounded-lg p-6 mt-10">
        <h1 class="text-2xl font-bold text-gray-800 mb-4 text-center">Edit Mobil</h1>

        <form action="{{ route('cars.update', $cars->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            {{-- Nama Mobil --}}
            <div>
                <label for="name" class="block text-gray-700 font-medium">Nama Mobil:</label>
                <input type="text" name="name" value="{{ $cars->name }}" required
                    class="w-full mt-1 p-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            </div>

            {{-- Brand --}}
            <div>
                <label for="brand" class="block text-gray-700 font-medium">Brand Mobil:</label>
                <input type="text" name="brand" value="{{ $cars->brand }}" required
                    class="w-full mt-1 p-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            </div>

            {{-- Tahun --}}
            <div>
                <label for="year" class="block text-gray-700 font-medium">Tahun:</label>
                <input type="number" name="year" value="{{ $cars->year }}" required
                    class="w-full mt-1 p-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            </div>

            {{-- Harga per Hari --}}
            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-1">Harga per Hari:</label>
                <div class="flex items-center border border-gray-300 rounded-md p-2 ">
                    <span class="text-gray-700 font-medium">Rp</span>
                    <input type="text" id="formatted_price_car" class="w-full ml-2 p-1 bg-transparent outline-none"
                        placeholder="0" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                    <input type="hidden" id="price" name="price" value="{{ $cars->price }}">
                </div>
            </div>

            <div class="mt-6 flex justify-between">
                <a href="{{ route('cars.index') }}"
                    class="bg-gray-500 text-white py-2 px-4 rounded-md hover:bg-gray-600 transition duration-300">
                    Batal
                </a>

                <button type="submit"
                    class="bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 transition duration-300">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
@endsection
