<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>@yield('title', 'Sistem Booking')</title>

    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/sidebar-menu.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/app-style.css') }}" rel="stylesheet" />
</head>

<body class="bg-theme bg-theme1">
<div id="wrapper">

    <div id="sidebar-wrapper" data-simplebar>
        <div class="brand-logo">
            <a href="{{ url('/dashboard') }}">
                <img src="{{ asset('assets/images/logo-icon.png') }}" class="logo-icon">
                <h5 class="logo-text">Sistem Booking</h5>
            </a>
        </div>
        <ul class="sidebar-menu">
            <li class="sidebar-header">MENU UTAMA</li>
            <li><a href="{{ url('/dashboard') }}"><i class="zmdi zmdi-view-dashboard"></i> <span>Dashboard</span></a></li>
            
            {{-- Proteksi Menu Sidebar --}}
            @auth
                @if(in_array(auth()->user()->role, ['superadmin', 'staff']))
                <li><a href="{{ url('/alat') }}"><i class="zmdi zmdi-wrench"></i> <span>Alat</span></a></li>
                @endif

                <li><a href="{{ url('/booking') }}"><i class="zmdi zmdi-calendar-check"></i> <span>Booking</span></a></li>

                @if(auth()->user()->role == 'superadmin')
                <li class="sidebar-header">ADMINISTRATOR</li>
                <li><a href="{{ url('/user') }}"><i class="zmdi zmdi-accounts-list"></i> <span>User</span></a></li>
                @endif

                <li class="sidebar-header">AKUN</li>
                <li>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="zmdi zmdi-lock text-danger"></i> <span class="text-danger">Logout</span>
                    </a>
                </li>
            @endauth

            @guest
                <li><a href="{{ route('login') }}"><i class="zmdi zmdi-lock-open"></i> <span>Login Staff</span></a></li>
            @endguest
        </ul>
    </div>

    <header class="topbar-nav">
        <nav class="navbar navbar-expand fixed-top">
            <ul class="navbar-nav mr-auto align-items-center">
                <li class="nav-item">
                    <a class="nav-link toggle-menu" href="javascript:void(0);"><i class="icon-menu"></i></a>
                </li>
            </ul>
            <ul class="navbar-nav align-items-center right-nav-link text-white mr-3">
                {{-- Tampilkan nama user hanya jika sudah login --}}
                @auth
                    <li><i class="zmdi zmdi-account mr-2"></i> {{ auth()->user()->name }} ({{ strtoupper(auth()->user()->role) }})</li>
                @endauth
                
                @guest
                    <li><i class="zmdi zmdi-account mr-2"></i> Tamu</li>
                @endguest
            </ul>
        </nav>
    </header>

    <div class="content-wrapper">
        <div class="container-fluid">
            @yield('content')
        </div>
    </div>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
</div>

<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/sidebar-menu.js') }}"></script>
<script src="{{ asset('assets/js/app-script.js') }}"></script>
@stack('js')
</body>
</html>