<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Car;
use Illuminate\Support\Facades\Storage;

class CarController extends Controller
{
    public function index()
    {
        $search = request('search'); // Mengambil nilai parameter 'search' dari query string

        if ($search) {
            // Jika ada pencarian, filter data mobil berdasarkan nama atau brand
            $cars = Car::where('name', 'like', '%' . $search . '%')
                ->orWhere('brand', 'like', '%' . $search . '%')
                ->get();
        } else {
            // Jika tidak ada parameter search, ambil semua data mobil
            $cars = Car::all();
        }

        return view('cars.index', compact('cars'));

        // $cars = DB::table('cars')->get();
        // return view('cars.index', compact('cars'));
    }

    public function show($id)
    {
        $cars = DB::table('cars')->where('id', $id)->first();
        return view('cars.show', compact('cars'));
    }

    public function create()
    {
        return view('cars.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'price' => 'required',
            'name' => 'required',
            'brand' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif',
            'year' => 'required',
        ]);

        // Berikan nilai default untuk $imagePath
        // $imagePath = null;
        $imagePath = $request->file('image')->storeAs('cars', 'public'); // Simpan di folder 'public/storage/cars'

        // Simpan gambar ke storage
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->storeAs('cars', 'public'); // Simpan di folder 'public/storage/cars'
        }

        Car::create([
            'name' => $request->name,
            'brand' => $request->brand,
            'year' => $request->year,
            'image' => $imagePath, // Simpan path gambar
            'price' => $request->price,
        ]);

        return redirect()->route('cars.index')->with('success', 'Mobil berhasil ditambahkan');
    }

    public function edit($id)
    {
        $cars = DB::table('cars')->where('id', $id)->first();
        return view('cars.edit', compact('cars'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'brand' => 'required',
            'year' => 'required',
            'price' => 'required',
        ]);

        $car = Car::findOrFail($id);
        $car->update([
            'name' => $request->name,
            'brand' => $request->brand,
            'year' => $request->year,
            'price' => $request->price, // Update harga
        ]);

        return redirect()->route('cars.index')->with('success', 'Data mobil berhasil diperbarui');
    }

    public function destroy($id)
    {
        DB::table('cars')->where('id', $id)->delete();
        return redirect()->route('cars.index')->with('success', 'Mobil berhasil dihapus!');
    }
}
