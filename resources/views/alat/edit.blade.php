@extends('layout.app')

@section('title', 'Edit Alat')

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card shadow-sm">
            <div class="card-header bg-light">
                <h5 class="mb-0 text-secondary">Edit Alat</h5>
            </div>

            <div class="card-body">
                <form action="{{ route('alat.update', $alat->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label>Nama Alat</label>
                        <input type="text" name="nama_alat"
                               value="{{ $alat->nama_alat }}"
                               class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Harga</label>
                        <input type="number" name="harga"
                               value="{{ $alat->harga }}"
                               class="form-control" required>
                    </div>

                    <button class="btn btn-warning btn-sm">
                        <i class="zmdi zmdi-edit"></i> Update
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
