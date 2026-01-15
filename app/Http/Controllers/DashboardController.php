<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alat;

class DashboardController extends Controller
{
       /**
     * Menampilkan halaman dashboard
     */
    public function index()
    {
        $alats = Alat::latest()->get();
    return view('dashboard', compact('alats'));
    }
}
