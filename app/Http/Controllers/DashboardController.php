<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Alat;
use App\Models\Booking;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        // Statistik Utama
        $totalAlat = Alat::count();
        $totalBooking = Booking::count();
        $totalUser = User::count();
        
        // List Booking Terbaru
        $bookingList = Booking::latest()->take(5)->get();

        // FIX: Query Grafik agar kompatibel dengan sql_mode=only_full_group_by
        $grafikData = Booking::select(
            DB::raw('MONTHNAME(tanggal_sewa) as bulan'),
            DB::raw('COUNT(*) as jumlah'),
            DB::raw('MONTH(tanggal_sewa) as bulan_angka') // Ambil angka bulan untuk sorting
        )
        ->groupBy('bulan', 'bulan_angka') // Masukkan bulan_angka ke dalam group by
        ->orderBy('bulan_angka', 'ASC')   // Urutkan berdasarkan angka bulan (1-12)
        ->get();

        $labels = $grafikData->pluck('bulan'); 
        $data = $grafikData->pluck('jumlah');  

        return view('dashboard', compact(
            'totalAlat', 
            'totalBooking', 
            'totalUser', 
            'bookingList', 
            'labels', 
            'data'
        ));
    }
}