@extends('layout.app')

@section('title', 'Data Booking')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card shadow-sm">
            <div class="card-header d-flex justify-content-between align-items-center bg-light">
                <h5 class="mb-0 text-white">
                    Data Booking
                </h5>

                <a href="{{ route('booking.create') }}" class="btn btn-primary btn-sm">
                    <i class="zmdi zmdi-plus"></i> Tambah Booking
                </a>
            </div>

            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="table-responsive">
                    <table class="table table-bordered table-non-interactive">
                        <thead class="table-light">
                            <tr>
                                <th>No</th>
                                <th>Nama Peminjam</th>
                                <th>Nama Alat</th>
                                <th>Tanggal Booking</th>
                                <th>Tanggal Kembali</th>
                                <th>Status</th>
                                <th width="150">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($bookings as $booking)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $booking->user->name ?? '-' }}</td>
                                    <td>{{ $booking->alat->nama_alat ?? '-' }}</td>
                                    <td>{{ $booking->tanggal_booking }}</td>
                                    <td>{{ $booking->tanggal_kembali }}</td>
                                    <td>
                                        @if ($booking->status == 'dipinjam')
                                            <span class="badge badge-warning">Dipinjam</span>
                                        @elseif ($booking->status == 'selesai')
                                            <span class="badge badge-success">Selesai</span>
                                        @else
                                            <span class="badge badge-secondary">
                                                {{ ucfirst($booking->status) }}
                                            </span>
                                        @endif
                                    </td>
                                    <td>
                                        <span class="text-muted">—</span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center text-white">
                                        Data booking belum tersedia
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
