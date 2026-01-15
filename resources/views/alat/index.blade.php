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

                    <table class="table table-bordered table-non-interactive">
                        <thead class="table-light">
                            <tr>
                                <th>No</th>
                                <th>Nama Alat</th>
                                <th>Harga</th>
                                <th width="120">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($alats as $alat)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $alat->nama_alat }}</td>
                                    <td>
                                        Rp {{ number_format($alat->harga, 0, ',', '.') }}
                                    </td>
                                    <td>
                                        <span class="text-muted">—</span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center text-muted">
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
