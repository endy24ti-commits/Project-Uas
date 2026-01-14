@extends('layout.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h5>Data User</h5>
        <a href="{{ route('user.create') }}" class="btn btn-primary btn-sm float-right">
            Tambah User
        </a>
    </div>

    <div class="card-body">
        <table class="table table-bordered text-white">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $u)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $u->name }}</td>
                    <td>{{ $u->email }}</td>
                    <td>
                        <a href="{{ route('user.edit',$u->id) }}" class="btn btn-warning btn-sm">Edit</a>

                        <form action="{{ route('user.destroy',$u->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Hapus user?')" class="btn btn-danger btn-sm">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
