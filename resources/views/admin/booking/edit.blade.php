@extends('layout.app')

@section('title', 'Edit Booking')

@section('content')
<div class="container mt-5">

    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">

            <div class="card shadow border-0">

                <div class="card-header text-center">
                    <h5 class="mb-0 fw-bold">Edit Booking</h5>
                </div>

                <div class="card-body px-4 py-4">
                    <form action="{{ route('booking.update', $booking->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-3">
                            <label class="form-label">Nama</label>
                            <input type="text"
                                   name="nama"
                                   class="form-control"
                                   value="{{ $booking->nama }}"
                                   required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Nama Alat</label>
                            <input type="text"
                                   name="nama_alat"
                                   class="form-control"
                                   value="{{ $booking->nama_alat }}"
                                   required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Tanggal Sewa</label>
                            <input type="date"
                                   name="tanggal_sewa"
                                   class="form-control"
                                   value="{{ $booking->tanggal_sewa }}"
                                   required>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Tanggal Pengembalian</label>
                            <input type="date"
                                   name="tanggal_kembali"
                                   class="form-control"
                                   value="{{ $booking->tanggal_kembali }}"
                                   required>
                        </div>
                        
                        <div class="d-flex justify-content-center gap-3">
                            <button class="btn btn-primary px-4">
                                <i class="zmdi zmdi-save"></i> Simpan
                            </button>

                            <a href="{{ url('/booking') }}" class="btn btn-secondary px-4">
                                Kembali
                            </a>
                        </div>
                    </form>
                </div>

            </div>

        </div>
    </div>

</div>
@endsection
