<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Alat;
use App\Models\Booking;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user(); // bisa null (guest)

        // Default (guest)
        $data = [
            'totalAlat'    => Alat::count(),
            'totalBooking' => Booking::count(),
        ];

        // User login
        if ($user) {
            // USER
            if ($user->role === 'user') {
                $data['totalBooking'] = Booking::where('user_id', $user->id)->count();
            }

            // STAFF
            if ($user->role === 'staff') {
                $data['totalAlat'] = Alat::count();
                $data['totalBooking'] = Booking::count();
            }

            // ADMIN / SUPERADMIN
            if ($user->role === 'superadmin') {
                $data['totalAlat'] = Alat::count();
                $data['totalBooking'] = Booking::count();
            }
        }

        return view('dashboard', $data);
    }
}
