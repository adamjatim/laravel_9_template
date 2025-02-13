<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rental;
use App\Models\User;
use App\Models\Car;
use Illuminate\Support\Facades\DB;

class SewaController extends Controller
{
    // 📌 Tampilkan daftar rental (hanya user dengan role 'user')
    public function index()
    {
        $cars = Car::all();
        $rentals = Rental::all()->where('user_id', auth()->user()->id);
        return view('user.index', compact('cars', 'rentals'));
    }

    // 📌 Tampilkan detail rental
    public function show($id)
    {
        $rental = Rental::with(['user', 'car'])->findOrFail($id);
        return view('user.show', compact('rental'));
    }

    // 📌 Tampilkan form tambah rental
    public function create()
    {
        $users = User::where('role', 'user')->get();
        $cars = Car::all();

        return view('user.create', compact('users', 'cars'));
    }

    // 📌 Simpan rental baru
    public function store(Request $request)
    {
        $request->validate([
            'car_id' => 'required',
            'user_id' => 'required',
            'rental_date' => 'required',
            'end_date' => 'required',
            'total_price' => 'required',
            'status' => 'required',
        ]);

        Rental::create($request->all());

        return redirect()->route('user.index')->with('success', 'Rental berhasil ditambahkan!');
    }

    // 📌 Tampilkan form edit rental
    public function edit($id)
    {
        $rental = Rental::findOrFail($id);
        $cars = Car::all(); // Mengambil semua mobil untuk opsi dropdown

        return view('user.edit', compact('rental',  'cars'));
    }


    // 📌 Update data rental
    public function update(Request $request, $id)
    {
        $request->validate([
            'car_id' => 'required',
            'user_id' => 'required',
            'rental_date' => 'required',
            'end_date' => 'required',
            'total_price' => 'required',
            'status' => 'required',
        ]);

        $rental = Rental::findOrFail($id);
        $rental->update([
            'car_id' => $request->car_id,
            'user_id' => $request->user_id,
            'rental_date' => $request->rental_date,
            'end_date' => $request->end_date,
            'total_price' => $request->total_price,
            'status' => $request->status,
        ]);

        return redirect()->route('user.index')->with('success', 'Penyewaan berhasil diperbarui.');
    }



    // 📌 Hapus rental
    public function destroy($id)
    {
        $rental = Rental::findOrFail($id);
        $rental->delete();

        return redirect()->route('user.index')->with('success', 'Penyewaan berhasil dihapus.');
    }
}
