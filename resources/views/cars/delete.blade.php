@extends('layout')

@section('title', 'Hapus Penyewaan')

@section('content')
<div class="max-w-lg mx-auto bg-white shadow-lg rounded-lg p-6 mt-10">
    <h1 class="text-2xl font-bold text-red-600 mb-4 text-center">Konfirmasi Hapus</h1>

    <p class="text-gray-700 text-center">
        Apakah Anda yakin ingin menghapus penyewaan ini?
    </p>

    <div class="mt-6 flex justify-between">
        <a href="{{ route('rentals.index') }}"
            class="bg-gray-500 text-white py-2 px-4 rounded-md hover:bg-gray-600 transition duration-300">
            Batal
        </a>

        <form action="{{ route('rentals.destroy', $rental->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit"
                class="bg-red-500 text-white py-2 px-4 rounded-md hover:bg-red-600 transition duration-300">
                Hapus
            </button>
        </form>
    </div>
</div>
@endsection
