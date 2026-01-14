<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // tampilkan data user
    public function index()
    {
        $users = User::latest()->get();
        return view('user.index', compact('users'));
    }

    // form tambah user
    public function create()
    {
        return view('user.create');
    }

    // simpan user baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return redirect()->route('user.index')->with('success','User berhasil ditambahkan');
    }

    // form edit user
    public function edit(User $user)
    {
        return view('user.edit', compact('user'));
    }

    // update user
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id
        ]);

        $data = $request->only('name','email');

        if($request->password){
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect()->route('user.index')->with('success','User berhasil diupdate');
    }

    // hapus user
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('user.index')->with('success','User berhasil dihapus');
    }
}
