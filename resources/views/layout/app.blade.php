<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <title>@yield('title','Dashboard')</title>

    <!-- loader -->
    <link href="{{ asset('assets/css/pace.min.css') }}" rel="stylesheet"/>
    <script src="{{ asset('assets/js/pace.min.js') }}"></script>

    <!-- favicon -->
    <link rel="icon" href="{{ asset('assets/images/favicon.ico') }}" type="image/x-icon">

    <!-- favicon -->
    <link rel="icon" href="{{ asset('assets/images/favicon.ico') }}" type="image/x-icon">

    <!-- CSS -->
    <link href="{{ asset('assets/plugins/vectormap/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/css/animate.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/css/sidebar-menu.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/css/app-style.css') }}" rel="stylesheet"/>

    @stack('css')
</head>

<body class="bg-theme bg-theme1">

<div id="wrapper">

    @stack('css')
</head>


<body class="bg-theme bg-theme1">


<div id="wrapper">

    <!-- SIDEBAR -->
    <div id="sidebar-wrapper" data-simplebar data-simplebar-auto-hide="true">
        <div class="brand-logo">
            <a href="{{ url('/dashboard') }}">
                <img src="{{ asset('assets/images/logo-icon.png') }}" class="logo-icon">
                <h5 class="logo-text">Sistem Booking</h5>
            </a>
        </div>

        <ul class="sidebar-menu do-nicescrol">
            <li class="sidebar-header">Sidebar</li>


        <ul class="sidebar-menu do-nicescrol">
            <li class="sidebar-header">Sidebar</li>

            <li>
                <a href="{{ url('/dashboard') }}">
                    <i class="zmdi zmdi-view-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>

            <li>
                <a href="{{ url('/alat') }}">
                    <i class="zmdi zmdi-invert-colors"></i> <span>Alat</span>
                </a>
            </li>

            <li>
                <a href="{{ url('/booking') }}">
                    <i class="zmdi zmdi-format-list-bulleted"></i> <span>Booking</span>
                </a>
            </li>

            <li>
                <a href="{{ url('/user') }}">
                    <i class="zmdi zmdi-face"></i> <span>User</span>
                </a>
            </li>
        </ul>
    </div>
    <!-- END SIDEBAR -->

    <!-- TOPBAR -->
    <header class="topbar-nav">
        <nav class="navbar navbar-expand fixed-top">
            <ul class="navbar-nav mr-auto align-items-center">
                <li class="nav-item">
                    <a class="nav-link toggle-menu" href="javascript:void();">
                        <i class="icon-menu menu-icon"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <form class="search-bar">
                        <input type="text" class="form-control" placeholder="Search">
                        <a href="#"><i class="icon-magnifier"></i></a>
                    </form>
                </li>
            </ul>

            <ul class="navbar-nav align-items-center right-nav-link">
                <li class="nav-item">
                    <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown">
                        <span class="user-profile">
                            <img src="https://via.placeholder.com/110x110" class="img-circle">
                        </span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-right">
                        <li class="dropdown-item user-details">
                            <div class="media">
                                <div class="avatar">
                                    <img src="https://via.placeholder.com/110x110">
                                </div>
                                <div class="media-body">
                                    <h6 class="mt-2 user-title">{{ auth()->user()->name ?? 'Admin' }}</h6>
                                    <p class="user-subtitle">{{ auth()->user()->email ?? '-' }}</p>
                                </div>
                            </div>
                        </li>
                        <li class="dropdown-divider"></li>
                        <li class="dropdown-item">
                            <i class="icon-power mr-2"></i> Logout
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </header>
    <!-- END TOPBAR -->

    <div class="clearfix"></div>

    <div class="clearfix"></div>

    <!-- CONTENT -->
    <div class="content-wrapper">
        <div class="container-fluid">
            @yield('content')
        </div>
    </div>
    <!-- END CONTENT -->

    <!-- FOOTER -->
    <footer class="footer">
        <div class="container text-center">
            Copyright © {{ date('Y') }}
        </div>
    </footer>

</div>

</div>

<!-- JS -->
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/plugins/simplebar/js/simplebar.js') }}"></script>
<script src="{{ asset('assets/js/sidebar-menu.js') }}"></script>
<script src="{{ asset('assets/js/jquery.loading-indicator.js') }}"></script>
<script src="{{ asset('assets/js/app-script.js') }}"></script>
<script src="{{ asset('assets/plugins/Chart.js/Chart.min.js') }}"></script>

@stack('js')
</body>
</html>

@stack('js')
</body>
</html>
