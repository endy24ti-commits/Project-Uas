<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Tampilkan data user
    public function index()
    {
        // Mengambil semua user dari database
        $users = User::latest()->get();
        return view('user.index', compact('users'));
    }

    // Form tambah user
    public function create()
    {
        // Menyiapkan pilihan untuk view
        $roles = ['superadmin', 'staff', 'user'];
        $statuses = ['aktif', 'nonaktif'];
        return view('user.create', compact('roles', 'statuses'));
    }

    // Simpan user baru
    public function store(Request $request)
    {
        // Validasi input sesuai kolom tabel user
        $request->validate([
            'name'     => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'email'    => 'required|email|unique:users',
            'password' => 'required|min:6',
            'role'     => 'required|in:superadmin,staff,user',
            'status'   => 'required|in:aktif,nonaktif'
        ]);

        // Create data ke database
        User::create([
            'name'     => $request->name,
            'username' => $request->username,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => $request->role,
            'status'   => $request->status
        ]);

        return redirect()->route('user.index')->with('success', 'User berhasil ditambahkan');
    }

    // Form edit user
    public function edit(User $user)
    {
        $roles = ['superadmin', 'staff', 'user'];
        $statuses = ['aktif', 'nonaktif'];
        return view('user.edit', compact('user', 'roles', 'statuses'));
    }

    // Update data user
    public function update(Request $request, User $user)
    {
        // Validasi pembaruan data
        $request->validate([
            'name'     => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . $user->id,
            'email'    => 'required|email|unique:users,email,' . $user->id,
            'role'     => 'required|in:superadmin,staff,user',
            'status'   => 'required|in:aktif,nonaktif'
        ]);

        $data = $request->only('name', 'username', 'email', 'role', 'status');

        // Update password hanya jika kolom password diisi
        if($request->password){
            $request->validate(['password' => 'min:6']);
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect()->route('user.index')->with('success', 'Data user berhasil diperbarui');
    }

    // Hapus user
    public function destroy(User $user)
    {
        $user->delete(); //
        return redirect()->route('user.index')->with('success', 'User berhasil dihapus');
    }
}