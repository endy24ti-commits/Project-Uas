<?php

namespace App\Http\Controllers;

use App\Models\Alat;
use Illuminate\Http\Request;

class AlatController extends Controller
{
    public function index()
    {
        $alats = Alat::all();
        return view('alat.index', compact('alats'));
    }

    public function create()
    {
        return view('alat.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_alat' => 'required|string|max:100',
            'harga'     => 'required|numeric|min:0',
            'foto'      => 'nullable|string|max:255', // 🔴 DITAMBAHKAN
        ]);

        Alat::create([
            'nama_alat' => $request->nama_alat,
            'harga'     => $request->harga,
            'foto'      => $request->foto, // 🔴 DITAMBAHKAN
        ]);

        return redirect()
            ->route('alat.index')
            ->with('success', 'Data berhasil disimpan');
    }

    public function edit(Alat $alat)
    {
        return view('alat.edit', compact('alat'));
    }

    public function update(Request $request, Alat $alat)
    {
        $request->validate([
            'nama_alat' => 'required|string|max:100',
            'harga'     => 'required|numeric|min:0',
            'foto'      => 'nullable|string|max:255', // 🔴 DITAMBAHKAN
        ]);

        $alat->update([
            'nama_alat' => $request->nama_alat,
            'harga'     => $request->harga,
            'foto'      => $request->foto, // 🔴 DITAMBAHKAN
        ]);

        return redirect()
            ->route('alat.index')
            ->with('success', 'Data berhasil diupdate');
    }
}
