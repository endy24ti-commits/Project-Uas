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
</head>

<body class="bg-theme bg-theme1">

<div id="wrapper">

  <!-- SIDEBAR -->
  <div id="sidebar-wrapper">
    <div class="brand-logo text-center">
      <a href="{{ route('dashboard') }}">
        <h5 class="logo-text">Sistem Booking</h5>
      </a>
    </div>

    <ul class="sidebar-menu">
      <li class="sidebar-header">MENU</li>

      <li>
        <a href="{{ route('dashboard') }}">
          <i class="zmdi zmdi-view-dashboard"></i> Dashboard
        </a>
      </li>

      @auth
        <li>
          <a href="{{ route('alat.index') }}">
            <i class="zmdi zmdi-invert-colors"></i> Alat
          </a>
        </li>

        <li>
          <a href="{{ route('booking.index') }}">
            <i class="zmdi zmdi-calendar"></i> Booking
          </a>
        </li>

        @if(Auth::user()->role === 'superadmin')
          <li>
            <a href="{{ route('user.index') }}">
              <i class="zmdi zmdi-accounts"></i> User
            </a>
          </li>
        @endif

        <!-- LOGOUT -->
        <li>
          <a href="{{ route('logout') }}"
             onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="zmdi zmdi-power"></i> Logout
          </a>
        </li>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
          @csrf
        </form>

      @else
        <!-- GUEST -->
        <li>
          <a href="{{ route('login') }}">
            <i class="zmdi zmdi-sign-in"></i> Login
          </a>
        </li>
      @endauth
    </ul>
  </div>
  <!-- END SIDEBAR -->

  <!-- TOPBAR -->
  <header class="topbar-nav">
    <nav class="navbar navbar-expand fixed-top">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link toggle-menu"><i class="icon-menu"></i></a>
        </li>
      </ul>

      <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-toggle="dropdown">
            <i class="zmdi zmdi-account-circle" style="font-size:26px;"></i>
          </a>

          <ul class="dropdown-menu dropdown-menu-right">
            @auth
              <li class="dropdown-item text-center">
                <strong>{{ Auth::user()->name }}</strong><br>
                <small>{{ Auth::user()->role }}</small>
              </li>
              <li class="dropdown-divider"></li>
              <li class="dropdown-item">
                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form-top').submit();">
                  Logout
                </a>
              </li>

              <form id="logout-form-top" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
              </form>
            @else
              <li class="dropdown-item">
                <a href="{{ route('login') }}">Login</a>
              </li>
            @endauth
          </ul>
        </li>
      </ul>
    </nav>
  </header>
  <!-- END TOPBAR -->

  <!-- CONTENT -->
  <div class="content-wrapper">
    <div class="container-fluid">

      <h4 class="text-white mt-3">
        @auth
          Selamat datang, {{ Auth::user()->name }}
        @else
          Selamat datang, Guest
        @endauth
      </h4>

      <div class="row mt-4">

        <div class="col-md-6">
          <div class="card bg-primary text-white">
            <div class="card-body">
              <h6>Total Alat</h6>
              <h2>{{ $totalAlat ?? 0 }}</h2>
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="card bg-warning text-white">
            <div class="card-body">
              <h6>Total Booking</h6>
              <h2>{{ $totalBooking ?? 0 }}</h2>
            </div>
          </div>
        </div>

      </div>

    </div>
  </div>
  <!-- END CONTENT -->

</div>

<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/sidebar-menu.js') }}"></script>

</body>
</html>