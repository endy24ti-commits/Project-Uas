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
            'nama_alat'   => 'required',
            'kategori'    => 'required',
            'status'      => 'required',
            'waktu_sewa'  => 'required|integer',
            'harga_sewa'  => 'required|integer',
        ]);

        Alat::create($request->all());

        return redirect()->route('alat.index')
            ->with('success', 'Data alat berhasil ditambahkan');
    }

    public function edit($id)
    {
        $alat = Alat::findOrFail($id);
        return view('alat.edit', compact('alat'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_alat'   => 'required',
            'kategori'    => 'required',
            'status'      => 'required',
            'waktu_sewa'  => 'required|integer',
            'harga_sewa'  => 'required|integer',
        ]);

        $alat = Alat::findOrFail($id);
        $alat->update($request->all());

        return redirect()->route('alat.index')
            ->with('success', 'Data alat berhasil diperbarui');
    }
}
