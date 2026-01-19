@extends('layout.app')

@section('title', 'Data Alat')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card shadow-sm">

            <div class="card-header d-flex justify-content-between align-items-center bg-light">
                <h5 class="mb-0 text-white">
                    Data Alat
                </h5>

                <a href="{{ route('alat.create') }}" class="btn btn-primary btn-sm">
                    <i class="zmdi"></i> Tambah Alat
                </a>
            </div>

            <div class="card-body">

                @if(session('message'))
                @php
                $bgColor = match(session('type')) {
                'create' => '#16a34a',
                'update' => '#2563eb',
                'delete' => '#dc2626',
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
                                <th width="50">No</th>
                                <th>Nama Alat</th>
                                <th>Foto</th>
                                <th>Harga</th>
                                <th width="170">Opsi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($alats as $alat)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $alat->nama_alat }}</td>

                                {{-- FOTO --}}
                                <td>
                                    @if($alat->foto)
                                    <img src="{{ $alat->foto }}"
                                        alt="Foto {{ $alat->nama_alat }}"
                                        width="80"
                                        height="60"
                                        style="object-fit:cover; border-radius:6px;">
                                    @else
                                    <span class="text-muted">No Image</span>
                                    @endif
                                </td>

                                <td>
                                    Rp {{ number_format($alat->harga, 0, ',', '.') }}
                                </td>

                                <td>
                                    <!-- Edit -->
                                    <a href="{{ route('alat.edit', $alat->id) }}"
                                        class="btn btn-sm btn-info mb-1">
                                        <i class="zmdi zmdi-edit"></i> Edit
                                    </a>

                                    <!-- Hapus -->
                                    <form action="{{ route('alat.destroy', $alat->id) }}"
                                        method="POST"
                                        style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="btn btn-sm btn-danger"
                                            onclick="return confirm('Yakin ingin menghapus alat ini?')">
                                            <i class="zmdi zmdi-delete"></i> Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center text-white">
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