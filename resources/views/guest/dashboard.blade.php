@extends('layouts.guest')

@section('content')
<h4 class="mb-4 text-center">
    Dashboard – Booking / Sewa Alat
</h4>

<!-- Search + Kategori Modern (icon di kanan) -->
<div class="d-flex justify-content-center mb-4 flex-wrap" style="gap: 10px;">
    <!-- WRAPPER SEARCH + ICON DI KANAN -->
    <div style="flex: 1; max-width: 500px; position: relative;">
        <input type="text" id="searchAlat" class="form-control rounded-3 pe-4" placeholder="Cari alat..." style="height:45px;">
        <i class="bi bi-search" style="position: absolute; right: 12px; top: 50%; transform: translateY(-50%); color: #888; font-size: 1.1rem;"></i>
    </div>

    <!-- KATEGORI DROPDOWN -->
    <select id="kategoriFilter" class="form-select rounded-3" style="max-width: 180px; height:45px;">
        <option value="Semua">Semua Kategori</option>
        <option value="Elektronik">Elektronik</option>
        <option value="Multimedia">Multimedia</option>
        <option value="Audio">Audio</option>
    </select>
</div>

@php
$alat = [
    ['nama' => 'Kamera DSLR', 'foto' => 'kamera.jpg', 'kategori' => 'Multimedia'],
    ['nama' => 'Laptop', 'foto' => 'laptop.jpg', 'kategori' => 'Elektronik'],
    ['nama' => 'Proyektor', 'foto' => 'proyektor.jpg', 'kategori' => 'Multimedia'],
    ['nama' => 'Microphone', 'foto' => 'mic.jpg', 'kategori' => 'Audio'],
    ['nama' => 'Speaker', 'foto' => 'speaker.jpg', 'kategori' => 'Audio'],
    ['nama' => 'Tripod', 'foto' => 'tripod.jpg', 'kategori' => 'Multimedia'],
];
@endphp

<div class="row justify-content-center g-5">
    @foreach ($alat as $item)
    <div class="col-md-4 alat-item mb-4" data-kategori="{{ $item['kategori'] }}" data-nama="{{ strtolower($item['nama']) }}">
        <div class="card guest-card shadow h-100 border-0 p-3" style="transition: transform 0.3s;">
            <!-- FOTO ALAT -->
            <div class="img-wrapper">
                <img src="{{ asset('assets/images/alat/'.$item['foto']) }}" alt="{{ $item['nama'] }}" class="img-fluid">
            </div>

            <!-- BODY -->
            <div class="card-body d-flex flex-column">
                <h5 class="card-title">{{ $item['nama'] }}</h5>

                <p class="price mb-1">
                    Harga / Hari: <span>Rp 50.000</span>
                </p>

                <p class="mb-2">Kategori: <strong>{{ $item['kategori'] }}</strong></p>

                <span class="status-badge mb-3">
                    <i class="bi bi-check-circle-fill"></i> Tersedia
                </span>

                <div class="mt-auto">
                    <a href="{{ url('/login') }}" class="btn btn-booking w-100">
                        Booking Sekarang
                    </a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

<!-- SCRIPT FILTER SEARCH + KATEGORI -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchAlat');
    const kategoriFilter = document.getElementById('kategoriFilter');
    const items = document.querySelectorAll('.alat-item');

    function filterAlat() {
        const keyword = searchInput.value.toLowerCase();
        const kategori = kategoriFilter.value;

        items.forEach(item => {
            const nama = item.getAttribute('data-nama');
            const itemKategori = item.getAttribute('data-kategori');

            const cocokNama = nama.includes(keyword);
            const cocokKategori = (kategori === 'Semua' || itemKategori === kategori);

            item.style.display = (cocokNama && cocokKategori) ? 'block' : 'none';
        });
    }

    searchInput.addEventListener('keyup', filterAlat);
    kategoriFilter.addEventListener('change', filterAlat);
});
</script>

<!-- CARD HOVER EFFECT -->
<style>
    .guest-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0,0,0,0.2);
    }

    /* Status badge */
    .status-badge {
        display: inline-block;
        background: linear-gradient(135deg, #28a745, #5ddf85);
        color: #fff;
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 13px;
        font-weight: 500;
    }

    /* Tombol booking */
    .btn-booking {
        background: linear-gradient(135deg, #0d6efd, #4dabf7);
        border: none;
        color: #fff;
        padding: 10px;
        font-weight: 600;
        border-radius: 8px;
        transition: all 0.3s ease;
    }

    .btn-booking:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 15px rgba(13, 110, 253, 0.4);
    }

    /* Img wrapper */
    .img-wrapper {
        height: 220px;
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: #fff;
    }

    .img-wrapper img {
        max-height: 100%;
        max-width: 100%;
        object-fit: contain;
    }
</style>
@endsection
