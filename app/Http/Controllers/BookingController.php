<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bookings = Booking::all();
        return view('admin.booking.index', compact('bookings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.booking.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)

    {
        Booking::create([
            'nama' => $request->nama,
            'nama_alat' => $request->nama_alat,
            'tanggal_sewa' => $request->tanggal_sewa,
            'tanggal_kembali' => $request->tanggal_kembali,
        ]);

        return redirect('/booking')->with([
            'message' => 'Booking berhasil disimpan',
            'type' => 'create'
        ]);
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $booking = Booking::findOrFail($id);
        return view('admin.booking.edit', compact('booking'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $booking = Booking::findOrFail($id);

        $booking->update([
            'nama'            => $request->nama,
            'nama_alat'       => $request->nama_alat,
            'tanggal_sewa'    => $request->tanggal_sewa,
            'tanggal_kembali' => $request->tanggal_kembali,
        ]);

        return redirect('/booking')->with([
            'message' => 'Booking berhasil diupdate',
            'type' => 'update'
        ]);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();

        return redirect('/booking')->with([
            'message' => 'Booking berhasil dihapus',
            'type' => 'delete'
        ]);
    }
}
