@extends('layout')

@section('title', 'Create Penyewaan')

@section('content')
    <div class="max-w-lg mx-auto bg-white shadow-lg rounded-lg p-6 mt-10">
        <h1 class="text-2xl font-bold text-gray-800 mb-4 text-center">Tambah Penyewaan</h1>

        <form action="{{ route('rentals.store') }}" method="POST" class="space-y-4">
            @csrf

            {{-- Pilih Mobil --}}
            <div>
                <label for="car_id" class="block text-gray-700 font-medium">Pilih Mobil:</label>
                <select name="car_id" id="car_id" required
                    class="w-full mt-1 p-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    @foreach ($cars as $car)
                        <option value="{{ $car->id }}">
                            {{ $car->name }} ({{ $car->brand }})
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Nama Penyewa --}}
            <div>
                <label for="user_id" class="block text-gray-700 font-medium">Nama Penyewa:</label>
                <select name="user_id" id="user_id" required
                    class="w-full mt-1 p-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    <option class="text-gray-300" value="" disabled selected hidden>Please Choose...</option>
                    @foreach ($users as $index => $user)
                        <option value="{{ $user->id }}">
                            {{ $index + 1 }}. {{ $user->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Tanggal Sewa --}}
            <div>
                <label for="rental_date" class="block text-gray-700 font-medium">Tanggal Sewa:</label>
                <input type="date" name="rental_date" value="" required
                    class="w-full mt-1 p-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            </div>

            {{-- Tanggal Kembali  --}}
            <div>
                <label for="end_date" class="block text-gray-700 font-medium">Tanggal Kembali:</label>
                <input type="date" name="end_date" value="" required
                    class="w-full mt-1 p-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            </div>

            {{-- Total Price  --}}
            <label for="total_price" class="m-0 block text-gray-700 font-medium">Total Price:</label>
            <div class="flex items-center border border-gray-300 rounded-md p-2 bg-gray-100 w-full">
                <span class="text-gray-700 font-medium">Rp.</span>
                <input type="text" id="formatted_price_car" class="w-full ml-2 p-1 bg-transparent outline-none"
                    placeholder="0" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                <input type="hidden" id="price" name="total_price">
            </div>

            {{-- Status  --}}
            <div>
                <label for="status" class="block text-gray-700 font-medium">Status:</label>
                <select name="status" id="status" required
                    class="w-full mt-1 p-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    <option class="bg-yellow-400/50" value="active">Active</option>
                    <option class="bg-green-400/50" value="completed">Completed</option>
                    <option class="bg-red-400/50" value="cancelled">Cancelled</option>

                </select>
            </div>

            <button type="submit"
                class="w-full bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 transition duration-300">
                Sewa Mobil
            </button>
        </form>
    </div>
@endsection
