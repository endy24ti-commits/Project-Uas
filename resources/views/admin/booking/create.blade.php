@extends('layout.app')

@section('title', 'Tambah Booking')

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5>Tambah Booking</h5>
            </div>

            <div class="card-body">
                <form action="{{ url('/booking') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label>Nama Alat</label>
                        <input type="text" name="nama_alat" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Tanggal Sewa</label>
                        <input type="date" name="tanggal_sewa" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Tanggal Pengembalian</label>
                        <input type="date" name="tanggal_kembali" class="form-control" required>
                    </div>

                    <button class="btn btn-primary">
                        <i class="zmdi zmdi-save"></i> Simpan
                    </button>

                    <a href="{{ url('/booking') }}" class="btn btn-secondary">
                        Kembali
                    </a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
