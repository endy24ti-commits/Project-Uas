@extends('layout.app')

@section('title', 'Edit Alat')

@section('content')
<div class="container mt-5">

    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">

            <div class="card shadow border-0">

                <div class="card-header text-center">
                    <h5 class="mb-0 fw-bold">Edit Alat</h5>
                </div>

                <div class="card-body px-4 py-4">
                    <form action="{{ route('alat.update', $alat->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label">Nama Alat</label>
                            <input type="text"
                                   name="nama_alat"
                                   value="{{ $alat->nama_alat }}"
                                   class="form-control"
                                   required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Harga</label>
                            <input type="number"
                                   name="harga"
                                   value="{{ $alat->harga }}"
                                   class="form-control"
                                   required>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Link Foto Produk</label>
                            <input type="text"
                                   id="foto"
                                   name="foto"
                                   value="{{ $alat->foto }}"
                                   class="form-control"
                                   placeholder="https://picsum.photos/300"
                                   oninput="previewFoto()">
                        </div>

                        {{-- PREVIEW --}}
                        <div class="mb-4 text-center">
                            <img id="preview"
                                 src="{{ $alat->foto }}"
                                 style="max-width:150px; border-radius:8px;">
                        </div>

                        <div class="d-flex justify-content-center gap-3">
                            <button class="btn btn-warning px-4">
                                <i class="zmdi zmdi-edit"></i> Update
                            </button>

                            <a href="{{ route('alat.index') }}" class="btn btn-secondary px-4">
                                Kembali
                            </a>
                        </div>
                    </form>
                </div>

            </div>

        </div>
    </div>

</div>

<script>
function previewFoto() {
    const url = document.getElementById('foto').value;
    const img = document.getElementById('preview');

    if (url) {
        img.src = url;
    }
}
</script>
@endsection
