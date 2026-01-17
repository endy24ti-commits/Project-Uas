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
                    <i class="zmdi"></i> Tambah Booking
                </a>
            </div>

            <div class="card-body">

                {{-- NOTIFIKASI --}}
                @if(session('message'))
                @php
                $bgColor = match(session('type')) {
                'create' => '#16a34a', // hijau - tambah
                'update' => '#2563eb', // biru - update
                'delete' => '#dc2626', // merah - hapus
                default => '#0f766e',
                };
                @endphp

                <div class="alert mb-3"
                    style="color:#fff; border:none;"
                    data-bg="{{ $bgColor }}">

                    {{ session('message') }}
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
                                <th width="150">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($bookings as $booking)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $booking->nama }}</td>
                                <td>{{ $booking->nama_alat }}</td>
                                <td>{{ $booking->tanggal_sewa }}</td>
                                <td>{{ $booking->tanggal_kembali }}</td>
                                <td>
                                    <!-- Edit -->
                                    <a href="{{ route('booking.edit', $booking->id) }}"
                                        class="btn btn-sm btn-info">
                                        <i class="zmdi zmdi-edit"></i> Edit
                                    </a>

                                    <!-- Hapus -->
                                    <form action="{{ route('booking.destroy', $booking->id) }}"
                                        method="POST"
                                        style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="btn btn-sm btn-danger"
                                            onclick="return confirm('Yakin ingin hapus booking ini?')">
                                            <i class="zmdi zmdi-delete"></i> Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center text-white">
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