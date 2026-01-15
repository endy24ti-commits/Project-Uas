@extends('layout.app')

@section('title', 'Tambah Alat')

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card shadow-sm">
            <div class="card-header bg-light">
                <h5 class="mb-0 text-secondary">Tambah Alat</h5>
            </div>

            <div class="card-body">
                <form action="{{ route('alat.store') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label>Nama Alat</label>
                        <input type="text" name="nama_alat" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Harga</label>
                        <input type="number" name="harga" class="form-control" required>
                    </div>

                    {{-- 🔴 DITAMBAHKAN --}}
                    <div class="form-group">
                        <label>Link Foto Produk</label>
                        <input type="text"
                               name="foto"
                               class="form-control"
                               placeholder="https://example.com/foto.jpg">
                    </div>
                    {{-- 🔴 END --}}

                    <button class="btn btn-primary btn-sm">
                        <i class="zmdi zmdi-save"></i> Simpan
                    </button>

                    <a href="{{ route('alat.index') }}" class="btn btn-secondary btn-sm">
                        Kembali
                    </a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
