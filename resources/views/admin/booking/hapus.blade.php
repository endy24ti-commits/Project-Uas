@extends('layout.app')

@section('title', 'Hapus Booking')

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card border-danger">
            <div class="card-header bg-danger text-white">
                <h5 class="mb-0">
                    <i class="zmdi zmdi-delete"></i> Konfirmasi Hapus Booking
                </h5>
            </div>

            <div class="card-body">
                <p>Apakah Anda yakin ingin menghapus data booking berikut?</p>

                <table class="table table-bordered">
                    <tr>
                        <th>Nama Alat</th>
                        <td>{{ $booking->nama_alat }}</td>
                    </tr>
                    <tr>
                        <th>Tanggal Sewa</th>
                        <td>{{ $booking->tanggal_sewa }}</td>
                    </tr>
                    <tr>
                        <th>Tanggal Pengembalian</th>
                        <td>{{ $booking->tanggal_kembali }}</td>
                    </tr>
                </table>

                <form action="{{ url('/booking/'.$booking->id) }}" method="POST">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">
                        <i class="zmdi zmdi-delete"></i> Ya, Hapus
                    </button>

                    <a href="{{ url('/booking') }}" class="btn btn-secondary">
                        Batal
                    </a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
