<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Dashboard | Sistem Booking</title>
  <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/css/animate.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/css/sidebar-menu.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/css/app-style.css') }}" rel="stylesheet" />
  <style>
    /* CSS Tambahan untuk membuat Logout berada di bawah sidebar */
    #sidebar-wrapper {
      display: flex;
      flex-direction: column;
    }
    .sidebar-menu {
      flex: 1; /* Mengisi ruang yang tersedia */
      display: flex;
      flex-direction: column;
    }
    .logout-item {
      margin-top: auto; /* Memaksa item ini ke paling bawah */
      border-top: 1px solid rgba(255, 255, 255, 0.1);
      margin-bottom: 20px;
    }
    .brand-logo img {
      width: 30px;
      margin-right: 10px;
    }
  </style>
</head>

<body class="bg-theme bg-theme1">
<div id="wrapper">

  <div id="sidebar-wrapper">
    <div class="brand-logo text-center">
      <a href="{{ route('dashboard') }}">
        <img src="{{ asset('assets/images/logo-icon.png') }}" alt="logo icon">
        <h5 class="logo-text">SISTEM BOOKING</h5>
      </a>
    </div>
    
    <ul class="sidebar-menu">
      <li class="sidebar-header">MENU</li>
      
      <li>
        <a href="{{ route('dashboard') }}">
          <i class="zmdi zmdi-view-dashboard"></i> <span>Dashboard</span>
        </a>
      </li>

      @auth
        {{-- Menu Alat: Hanya Superadmin/Staff --}}
        @if(Auth::user()->role === 'superadmin' || Auth::user()->role === 'staff')
          <li>
            <a href="{{ route('alat.index') }}">
              <i class="zmdi zmdi-invert-colors"></i> <span>Alat</span>
            </a>
          </li>
        @endif

        {{-- Menu Booking: Semua Role --}}
        <li>
          <a href="{{ route('booking.index') }}">
            <i class="zmdi zmdi-calendar-check"></i> <span>Booking</span>
          </a>
        </li>

        {{-- Menu User: Hanya Superadmin --}}
        @if(Auth::user()->role === 'superadmin')
          <li>
            <a href="{{ route('user.index') }}">
              <i class="zmdi zmdi-accounts"></i> <span>User</span>
            </a>
          </li>
        @endif

        <li class="logout-item">
          <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="zmdi zmdi-power"></i> <span>Logout</span>
          </a>
        </li>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
      @endauth
    </ul>
  </div>
  <header class="topbar-nav">
    <nav class="navbar navbar-expand fixed-top">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item"><a class="nav-link toggle-menu"><i class="icon-menu"></i></a></li>
      </ul>
      <ul class="navbar-nav align-items-center right-nav-link">
        <li class="nav-item">
          <a class="nav-link dropdown-toggle-nocaret" data-toggle="dropdown" href="#">
            <span class="user-profile"><i class="zmdi zmdi-account-circle" style="font-size:30px;"></i></span>
          </a>
        </li>
      </ul>
    </nav>
  </header>

  <div class="content-wrapper">
    <div class="container-fluid">
      
      <h4 class="text-white mt-3">Selamat datang, {{ Auth::user()->name }}</h4>

      <div class="row mt-4">
        <div class="col-12 col-lg-6">
          <div class="card bg-theme bg-theme9 border-0">
            <div class="card-body">
              <h5 class="text-white mb-0">{{ $totalAlat }} <span class="float-right"><i class="zmdi zmdi-shopping-cart"></i></span></h5>
              <div class="progress my-3" style="height:3px;">
                <div class="progress-bar" style="width:100%"></div>
              </div>
              <p class="mb-0 text-white small-font">Total Alat</p>
            </div>
          </div>
        </div>
        <div class="col-12 col-lg-6">
          <div class="card bg-theme bg-theme11 border-0">
            <div class="card-body">
              <h5 class="text-white mb-0">{{ $totalBooking }} <span class="float-right"><i class="zmdi zmdi-calendar"></i></span></h5>
              <div class="progress my-3" style="height:3px;">
                <div class="progress-bar" style="width:100%"></div>
              </div>
              <p class="mb-0 text-white small-font">Total Booking</p>
            </div>
          </div>
        </div>
      </div>

      <div class="row mt-4">
        <div class="col-12">
          <div class="card bg-transparent border-0 shadow-none">
            <div class="card-header bg-transparent border-0">
              <h6 class="text-white">Daftar Booking Terbaru</h6>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-flush table-borderless text-white" style="background: rgba(255,255,255,0.05); border-radius: 10px;">
                <thead>
                  <tr style="background: rgba(255,255,255,0.1);">
                    <th>NO</th>
                    <th>NAMA ALAT</th>
                    <th>PENYEWA</th>
                    <th>TANGGAL SEWA</th>
                    <th>TANGGAL KEMBALI</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse($bookingList as $key => $booking)
                  <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $booking->nama_alat }}</td>
                    <td>{{ $booking->nama }}</td>
                    <td>{{ $booking->tanggal_sewa }}</td>
                    <td>{{ $booking->tanggal_kembali }}</td>
                  </tr>
                  @empty
                  <tr>
                    <td colspan="5" class="text-center">Belum ada data booking.</td>
                  </tr>
                  @endforelse
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>

<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/sidebar-menu.js') }}"></script>
</body>
</html>