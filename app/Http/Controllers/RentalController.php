<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rental;
use App\Models\User;
use App\Models\Car;
use Illuminate\Support\Facades\DB;

class RentalController extends Controller
{
    // 📌 Tampilkan daftar rental (hanya user dengan role 'user')

    public function index()
    {
        $rentals = Rental::with(['user', 'car'])
            ->whereHas('user', function ($query) {
                $query->where('role', 'user');
            })
            ->get();
        $users = User::all();

        return view('rentals.index', compact('rentals'));
    }

    // 📌 Tampilkan detail rental
    public function show($id)
    {
        $rental = Rental::with(['user', 'car'])->findOrFail($id);
        return view('rentals.show', compact('rental'));
    }

    // 📌 Tampilkan form tambah rental
    public function create()
    {
        $users = User::where('role', 'user')->get();
        $cars = Car::all();

        return view('rentals.create', compact('users', 'cars'));
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

        return redirect()->route('rentals.index')->with('success', 'Rental berhasil ditambahkan!');
    }

    // 📌 Tampilkan form edit rental
    public function edit($id)
    {
        $rental = Rental::findOrFail($id);
        $cars = Car::all(); // Mengambil semua mobil untuk opsi dropdown

        return view('rentals.edit', compact('rental',  'cars'));
    }


    // 📌 Update data rental
    public function update(Request $request, $id)
    {
        $request->validate([
            'car_id' => 'required',
            'rental_date' => 'required',
            'end_date' => 'required',
            'total_price' => 'required',
            'status' => 'required',
        ]);

        $rental = Rental::findOrFail($id);
        $rental->update([
            'car_id' => $request->car_id,
            'rental_date' => $request->rental_date,
            'end_date' => $request->end_date,
            'total_price' => $request->total_price,
            'status' => $request->status,
        ]);

        return redirect()->route('rentals.index')->with('success', 'Penyewaan berhasil diperbarui.');
    }



    // 📌 Hapus rental
    public function destroy($id)
    {
        $rental = Rental::findOrFail($id);
        $rental->delete();

        return redirect()->route('rentals.index')->with('success', 'Penyewaan berhasil dihapus.');
    }
}
