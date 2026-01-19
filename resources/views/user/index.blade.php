@extends('layout.app')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Data User</h5>

        <a href="{{ route('user.create') }}" class="btn btn-primary btn-sm">
            + Tambah User
        </a>
    </div>

    <div class="card-body">

        {{-- Flash Message --}}
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-bordered table-hover text-white">
                <thead class="thead-light">
                    <tr class="text-center">
                        <th class="text-white" width="5%">No</th>
                        <th class="text-white">Nama</th>
                        <th class="text-white">Username</th>
                        <th class="text-white">Email</th>
                        <th class="text-white">Role</th>
                        <th class="text-white">Status</th>
                        <th class="text-white" width="20%">Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $u)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $u->name }}</td>
                            <td>{{ $u->username }}</td>
                            <td>{{ $u->email }}</td>

                            <td class="text-center">
                                <span class="badge 
                                    {{ $u->role == 'superadmin' ? 'bg-danger' : 
                                       ($u->role == 'staff' ? 'bg-warning' : 'bg-info') }}">
                                    {{ ucfirst($u->role) }}
                                </span>
                            </td>

                            <td class="text-center">
                                <span class="badge 
                                    {{ $u->status == 'aktif' ? 'bg-success' : 'bg-secondary' }}">
                                    {{ ucfirst($u->status) }}
                                </span>
                            </td>

                            <td class="text-center">
                                <a href="{{ route('user.edit', $u->id) }}" 
                                   class="btn btn-warning btn-sm">
                                    Edit
                                </a>

                                <form action="{{ route('user.destroy', $u->id) }}" 
                                      method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm"
                                        onclick="return confirm('Yakin ingin menghapus user ini?')">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">
                                Data user belum tersedia
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
</div>
@endsection
