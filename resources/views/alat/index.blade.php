@extends('layout.app') 

@section('title', 'Data Alat')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card shadow-sm">

            <div class="card-header d-flex justify-content-between align-items-center bg-light">
                <h5 class="mb-0 text-secondary">Data Alat</h5>
                <a href="{{ route('alat.create') }}" class="btn btn-primary btn-sm">
                    <i class="zmdi zmdi-plus"></i> Tambah Alat
                </a>
            </div>

            <div class="card-body">
                <div class="table-responsive">

                    <table class="table table-bordered table-hover">
                        <thead class="table-light">
                            <tr>
                                <th>No</th>
                                <th>Nama Alat</th>
                                <th>Kategori</th>
                                <th>Status</th>
                                <th>Waktu Sewa</th>
                                <th>Harga Sewa</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($alats as $alat)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $alat->nama_alat }}</td>
                                    <td>{{ $alat->kategori }}</td>
                                    <td>
                                        <span class="badge 
                                            {{ $alat->status == 'Tersedia' ? 'badge-success' : 'badge-warning' }}">
                                            {{ $alat->status }}
                                        </span>
                                    </td>
                                    <td>{{ $alat->waktu_sewa }} hari</td>
                                    <td>
                                        Rp {{ number_format($alat->harga_sewa,0,',','.') }}
                                    </td>
                                    <td>
                                        <a href="{{ route('alat.edit', $alat->id) }}" 
                                           class="btn btn-warning btn-sm">
                                            <i class="zmdi zmdi-edit"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center text-white">
                                        Data alat belum tersedia
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
