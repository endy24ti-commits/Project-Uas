<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    // TAMPILAN LOGIN
    public function showLogin()
    {
        return view('auth.login');
    }

    // PROSES LOGIN
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();

            // ❌ Jika akun nonaktif
            if ($user->status !== 'aktif') {
                Auth::logout();
                return back()->with('error', 'Akun tidak aktif');
            }

            // ✅ Semua role ke dashboard
            return redirect()->route('dashboard');
        }

        return back()->with('error', 'Email atau password salah');
    }

    // TAMPILAN REGISTER
    public function showRegister()
    {
        return view('auth.register');
    }

    // PROSES REGISTER
    public function register(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:100',
            'email'    => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        User::create([
            'name'     => $request->name,
            'username' => explode('@', $request->email)[0], // 🔥 FIX UTAMA
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => 'superadmin',
            'status'   => 'aktif',
        ]);

        return redirect()->route('login')
            ->with('success', 'Registrasi berhasil, silakan login');
    }

    // ======================
    // LOGOUT
    // ======================
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
