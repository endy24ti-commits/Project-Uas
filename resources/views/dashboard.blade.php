@extends('layout.app')

@section('title', 'Dashboard Utama')

@section('content')
<div class="row mt-3">
    <div class="col-12">
        <h4 class="text-white mb-3">
            Halo, Selamat Datang{{ auth()->check() ? ', ' . auth()->user()->name : '' }}
        </h4>
        <div class="card bg-transparent border-light shadow-none">
            <div class="card-body p-0">
                <div class="d-flex flex-wrap gap-3">
                    {{-- Tombol Lihat Booking (Bisa dilihat siapa saja) --}}
                    <a href="{{ url('/booking') }}" class="btn btn-light btn-round px-4 m-1">
                        <i class="zmdi zmdi-calendar-check mr-2"></i> Lihat Booking
                    </a>

                    {{-- Bagian ini hanya muncul jika sudah LOGIN --}}
                    @auth
                        @if(in_array(auth()->user()->role, ['superadmin', 'staff']))
                        <a href="{{ url('/alat') }}" class="btn btn-outline-white btn-round px-4 m-1">
                            <i class="zmdi zmdi-wrench mr-2"></i> Kelola Alat
                        </a>
                        @endif

                        @if(auth()->user()->role == 'superadmin')
                        <a href="{{ url('/user') }}" class="btn btn-warning btn-round px-4 m-1 text-dark">
                            <i class="zmdi zmdi-accounts-list mr-2"></i> Manajemen User
                        </a>
                        @endif

                        <a href="{{ route('logout') }}" 
                           class="btn btn-danger btn-round px-4 m-1"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="zmdi zmdi-power mr-2"></i> Keluar
                        </a>
                    @endauth

                    {{-- Bagian ini hanya muncul jika BELUM LOGIN --}}
                    @guest
                        <a href="{{ route('login') }}" class="btn btn-primary btn-round px-4 m-1">
                            <i class="zmdi zmdi-lock-open mr-2"></i> Login Staff/Admin
                        </a>
                    @endguest
                </div>
            </div>
        </div>
    </div>
</div>

<hr class="border-light">

<div class="row">
    <div class="col-12 col-lg-6 col-xl-4">
        <div class="card bg-theme bg-theme9 gradient-ohman border-0 shadow-sm">
            <div class="card-body">
                <h5 class="text-white mb-0">{{ $totalAlat }} <span class="float-right"><i class="zmdi zmdi-settings"></i></span></h5>
                <div class="progress my-3" style="height:3px;"><div class="progress-bar" style="width:100%"></div></div>
                <p class="mb-0 text-white small-font">Total Koleksi Alat</p>
            </div>
        </div>
    </div>
    <div class="col-12 col-lg-6 col-xl-4">
        <div class="card bg-theme bg-theme11 gradient-ibiza border-0 shadow-sm">
            <div class="card-body">
                <h5 class="text-white mb-0">{{ $totalBooking }} <span class="float-right"><i class="zmdi zmdi-shopping-cart"></i></span></h5>
                <div class="progress my-3" style="height:3px;"><div class="progress-bar" style="width:100%"></div></div>
                <p class="mb-0 text-white small-font">Transaksi Booking</p>
            </div>
        </div>
    </div>
    <div class="col-12 col-lg-6 col-xl-4">
        <div class="card bg-theme bg-theme14 gradient-scooter border-0 shadow-sm">
            <div class="card-body">
                <h5 class="text-white mb-0">{{ $totalUser ?? 0 }} <span class="float-right"><i class="zmdi zmdi-accounts-alt"></i></span></h5>
                <div class="progress my-3" style="height:3px;"><div class="progress-bar" style="width:100%"></div></div>
                <p class="mb-0 text-white small-font">Total User</p>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12 col-lg-8">
        <div class="card bg-theme bg-theme1 shadow-sm border-light">
            <div class="card-header border-0">Aktivitas Penyewaan Alat</div>
            <div class="card-body">
                <div class="chart-container-1">
                    <canvas id="bookingChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-lg-4">
        <div class="card bg-theme bg-theme1 shadow-sm border-light">
            <div class="card-header border-0">Booking Terbaru</div>
            <div class="table-responsive">
                <table class="table align-items-center table-flush">
                    <thead>
                        <tr>
                            <th>Peminjam</th>
                            <th>Alat</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($bookingList as $b)
                        <tr>
                            <td>{{ $b->nama }}</td>
                            <td><span class="badge badge-outline-light badge-pill">{{ $b->nama_alat }}</span></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>
@endsection

@push('js')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    $(function() {
        var ctx = document.getElementById('bookingChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: @json($labels), 
                datasets: [{
                    label: 'Jumlah Booking',
                    data: @json($data), 
                    borderColor: '#ffffff',
                    backgroundColor: 'rgba(255, 255, 255, 0.14)',
                    borderWidth: 3,
                    fill: true,
                    tension: 0.4,
                    pointRadius: 4,
                    pointBackgroundColor: '#ffffff'
                }]
            },
            options: {
                maintainAspectRatio: false,
                scales: {
                    y: { 
                        beginAtZero: true,
                        ticks: { color: '#ffffff' },
                        grid: { color: 'rgba(255,255,255,0.1)' }
                    },
                    x: { 
                        ticks: { color: '#ffffff' },
                        grid: { display: false }
                    }
                },
                plugins: {
                    legend: { display: false }
                }
            }
        });
    });
</script>
@endpush