<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Alat;
use App\Models\Booking;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Data default untuk Admin/Staff (Melihat semua)
        $totalAlat = Alat::count();
        $totalBooking = Booking::count();
        $bookingList = Booking::latest()->take(10)->get();

        // Jika yang login adalah USER, filter data hanya miliknya
        if ($user && $user->role === 'user') {
            // Statistik khusus user: total booking atas namanya
            $totalBooking = Booking::where('nama', $user->name)->count();
            
            // Tabel khusus user: hanya menampilkan booking miliknya
            $bookingList = Booking::where('nama', $user->name)
                                  ->latest()
                                  ->take(10)
                                  ->get();
        }

        return view('dashboard', compact('totalAlat', 'totalBooking', 'bookingList'));
    }
}