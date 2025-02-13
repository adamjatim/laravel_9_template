<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rental;
use App\Models\User;
use App\Models\Car;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PenyewaController extends Controller
{
    // 📌 Tampilkan daftar rental (hanya user dengan role 'user')
    public function index()
    {
        $users = User::all()->where('role', 'user');

        return view('penyewa.index', compact('users'));
    }

    // 📌 Tampilkan detail rental
    public function show($id)
    {
        $users = User::findOrFail($id);
        // dd($users);
        return view('penyewa.show', compact('users'));
    }

    // 📌 Tampilkan form tambah rental
    public function create()
    {
        // $users = User::where('role', 'user')->get();

        return view('penyewa.create');
    }

    // 📌 Simpan rental baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'role' => 'required',
            'password' => 'required|min:6',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => Hash::make($request->password), // Hash password sebelum menyimpan
        ]);

        return redirect()->route('penyewa.index')->with('success', 'Penyewa berhasil ditambahkan!');
    }

    // 📌 Tampilkan form edit rental
    public function edit($id)
    {
        $users = User::findOrFail($id);

        // dd($users);

        return view('penyewa.edit', compact('users'));
    }


    // 📌 Update data rental
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);

        $users = User::findOrFail($id);
        $users->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return redirect()->route('penyewa.index')->with('success', 'Penyewaan berhasil diperbarui.');
    }



    // 📌 Hapus rental
    public function destroy($id)
    {
        $users = User::findOrFail($id);
        $users->delete();

        return redirect()->route('penyewa.index')->with('success', 'Penyewaan berhasil dihapus.');
    }
}
