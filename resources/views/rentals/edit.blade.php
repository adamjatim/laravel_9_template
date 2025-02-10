@extends('layout')

@section('title', 'Edit Penyewaan')

@section('content')
    {{-- Flash Message --}}
    @if (session('success'))
        <div class="bg-green-100 text-green-700 px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif
{{-- Pilih Mobil --}}
            <div>
                <label for="car_id" class="block text-gray-700 font-medium">Pilih Mobil:</label>
                <select name="car_id" id="car_id" required
                    class="w-full mt-1 p-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    @foreach ($cars as $car)
                        <option value="{{ $car->id }}" {{ $car->id == $rental->car_id ? 'selected' : '' }}>
                            {{ $car->name }} ({{ $car->brand }})
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Nama Penyewa --}}
            <div>
                <label for="user_id" class="block text-gray-700 font-medium">Nama Penyewa:</label>
                <input type="text" name="user_id" value="{{ $rental->user->name }}" required
                    class="w-full mt-1 p-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            </div>

            {{-- Tanggal Sewa --}}
            <div>
                <label for="rental_date" class="block text-gray-700 font-medium">Tanggal Sewa:</label>
                <input type="date" name="rental_date" value="{{ $rental->rental_date }}" required
                    class="w-full mt-1 p-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            </div>

    <div class="flex justify-between fixed">
        <a href="{{ route('rentals.index') }}"
            class="bg-gray-500 text-white py-2 px-4 rounded-md hover:bg-gray-600 transition duration-300 flex flex-row">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                <path fill="currentColor"
                    d="m7.825 13l4.9 4.9q.3.3.288.7t-.313.7q-.3.275-.7.288t-.7-.288l-6.6-6.6q-.15-.15-.213-.325T4.426 12t.063-.375t.212-.325l6.6-6.6q.275-.275.688-.275t.712.275q.3.3.3.713t-.3.712L7.825 11H19q.425 0 .713.288T20 12t-.288.713T19 13z" />
            </svg>
            Kembali
        </a>
    </div>

    <div class="max-w-lg mx-auto bg-white shadow-lg rounded-lg p-6 mt-10">
        <h1 class="text-2xl font-bold text-gray-800 mb-4 text-center">Edit Penyewaan</h1>

        <form action="{{ route('rentals.update', $rental->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            
            {{-- Tanggal Kembali  --}}
            <div>
                <label for="end_date" class="block text-gray-700 font-medium">Tanggal Kembali:</label>
                <input type="date" name="end_date" value="{{ $rental->end_date }}" required
                    class="w-full mt-1 p-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            </div>

            {{-- Total Price  --}}
            <label for="total_price" class="m-0 block text-gray-700 font-medium">Total Price:</label>
            <div class="flex items-center border border-gray-300 rounded-md p-2 bg-gray-100 w-full">
                <span class="text-gray-700 font-medium">Rp.</span>
                <input type="text" id="formatted_price" value="{{ $rental->total_price }}"
                    class="w-full ml-2 p-1 bg-transparent outline-none" min="0">
            </div>

            {{-- Status  --}}
            <div>
                <label for="status" class="block text-gray-700 font-medium">Status:</label>
                <select name="status" id="status" required
                    class="w-full mt-1 p-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    <option class="bg-yellow-400/50" value="active" {{ $rental->status == 'active' ? 'selected' : '' }}>
                        Active</option>
                    <option class="bg-green-400/50" value="completed"
                        {{ $rental->status == 'completed' ? 'selected' : '' }}>Completed</option>
                    <option class="bg-red-400/50" value="cancelled" {{ $rental->status == 'cancelled' ? 'selected' : '' }}>
                        Cancelled</option>

                </select>
            </div>

            <div class="mt-6 flex justify-end">
                <button type="submit"
                    class="bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 transition duration-300">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
@endsection
