<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Dashtreme Admin - Free Dashboard for Bootstrap 4 by Codervent</title>
  <!-- loader-->
  <link href="assets/css/pace.min.css" rel="stylesheet" />
  <script src="assets/js/pace.min.js"></script>
  <!--favicon-->
  <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
  <!-- Vector CSS -->
  <link href="assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
  <!-- simplebar CSS-->
  <link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
  <!-- Bootstrap core CSS-->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
  <!-- animate CSS-->
  <link href="assets/css/animate.css" rel="stylesheet" type="text/css" />
  <!-- Icons CSS-->
  <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
  <!-- Sidebar CSS-->
  <link href="assets/css/sidebar-menu.css" rel="stylesheet" />
  <!-- Custom Style-->
  <link href="assets/css/app-style.css" rel="stylesheet" />

</head>

<body class="bg-theme bg-theme1">

  <!-- Start wrapper-->
  <div id="wrapper">

    <!--Start sidebar-wrapper-->
    <div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
      <div class="brand-logo">
        <a href="dashboard.blade.php">
          <img src="assets/images/logo-icon.png" class="logo-icon" alt="logo icon">
          <h5 class="logo-text">Sistem Booking</h5>
        </a>
      </div>
      <ul class="sidebar-menu do-nicescrol">
        <li class="sidebar-header">Sidebar</li>
        <li>
          <a href="dashboard.blade.php">
            <i class="zmdi zmdi-view-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>

        <li>
          <a href="{{ route('alat.index') }}">
            <i class="zmdi zmdi-invert-colors"></i> <span>Alat</span>
          </a>
        </li>

        <li>
          <a href="{{ route('booking.index') }}">
            <i class="zmdi zmdi-format-list-bulleted"></i> <span>Booking</span>
          </a>
        </li>

        <li>
          <a href="{{ route('user.index') }}">
            <i class="zmdi zmdi-face"></i> <span>User</span>
          </a>
        </li>
      </ul>

    </div>
    <!--End sidebar-wrapper-->

    <!--Start topbar header-->
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
              <input type="text" class="form-control" placeholder="Cari">
              <a href="javascript:void();"><i class="icon-magnifier"></i></a>
            </form>
          </li>
        </ul>

        <ul class="navbar-nav align-items-center right-nav-link">
          <li class="nav-item">
            <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown" href="#">
              <span class="user-profile"><img src="https://via.placeholder.com/110x110" class="img-circle" alt="Profile"></span>
            </a>
            <ul class="dropdown-menu dropdown-menu-right">
              <li class="dropdown-item user-details">
                <a href="javaScript:void();">
                  <div class="media">
                    <div class="avatar"><img class="align-self-start mr-3" src="https://via.placeholder.com/110x110" alt="Profile"></div>
                    <div class="media-body">
                      <h6 class="mt-2 user-title">Sarajhon Mccoy</h6>
                      <p class="user-subtitle">mccoy@example.com</p>
                    </div>
                  </div>
                </a>
              </li>
              <li class="dropdown-divider"></li>
              <li class="dropdown-item"><i class="icon-envelope mr-2"></i> Inbox</li>
              <li class="dropdown-divider"></li>
              <li class="dropdown-item"><i class="icon-wallet mr-2"></i> Account</li>
              <li class="dropdown-divider"></li>
              <li class="dropdown-item"><i class="icon-settings mr-2"></i> Setting</li>
              <li class="dropdown-divider"></li>
              <li class="dropdown-item"><i class="icon-power mr-2"></i> Logout</li>
            </ul>
          </li>
        </ul>
      </nav>
    </header>
    <!--End topbar header-->

    <div class="clearfix"></div>

    <div class="content-wrapper">
      <div class="container-fluid">

        <!--Start Dashboard Content-->

        <div class="row mt-3">
          <div class="col-12 col-lg-4">
            <div class="card gradient-deepblue">
              <div class="card-body text-center text-white">
                <i class="fa fa-shopping-cart fa-2x mb-2"></i>
                <h4 class="mb-0">9.526</h4>
                <small>Alat Yang Di Booking</small>
              </div>
            </div>
          </div>

          <div class="col-12 col-lg-4">
            <div class="card gradient-orange">
              <div class="card-body text-center text-white">
                <i class="fa fa-usd fa-2x mb-2"></i>
                <h4 class="mb-0">8.323</h4>
                <small>Jumlah Booking</small>
              </div>
            </div>
          </div>

          <div class="col-12 col-lg-4">
            <div class="card gradient-green">
              <div class="card-body text-center text-white">
                <i class="fa fa-eye fa-2x mb-2"></i>
                <h4 class="mb-0">6.200</h4>
                <small>Kategori</small>
              </div>
            </div>
          </div>
        </div>


        <div class="row">
          <div class="col-12 col-lg-12">
            <div class="card">
              <div class="card-header">Daftar Tabel Sewa Alat
                <div class="card-action">
                  <div class="dropdown">
                    <a href="javascript:void();" class="dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown">
                      <i class="icon-options"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                      <a class="dropdown-item" href="javascript:void();">Action</a>
                      <a class="dropdown-item" href="javascript:void();">Another action</a>
                      <a class="dropdown-item" href="javascript:void();">Something else here</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="javascript:void();">Separated link</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="table-responsive">
                <table class="table align-items-center table-flush table-borderless">
                  <thead>
                    <tr>
                      <th>Jenis Produk</th>
                      <th>Foto Produk</th>
                      <th>ID Produk</th>
                      <th>Harga Sewa</th>
                      <th>Tanggal Sewa</th>

                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Iphone X</td>
                      <td>
                        <img src="https://media.karousell.com/media/photos/products/2023/iphone_x.jpg"
                          class="product-img"
                          alt="product img">
                      </td>
                      <td>#9405822</td>
                      <td>Rp 250.000</td>
                      <td>08 Aug 2017</td>
                      <td>
                        <div class="progress shadow" style="height: 3px;">
                          <div class="progress-bar" role="progressbar" style="width: 90%"></div>
                        </div>
                      </td>
                    </tr>

                    <tr>
                      <td>Earphone GL</td>
                      <td><img src="https://via.placeholder.com/110x110" class="product-img" alt="product img"></td>
                      <td>#9405820</td>
                      <td>Rp 50.000</td>
                      <td>15 Aug 2017</td>
                      <td>
                        <div class="progress shadow" style="height: 3px;">
                          <div class="progress-bar" role="progressbar" style="width: 60%"></div>
                        </div>
                      </td>
                    </tr>

                    <tr>
                      <td>Camera Canon 3000D</td>
                      <td><img src="https://via.placeholder.com/110x110" class="product-img" alt="product img"></td>
                      <td>#9405830</td>
                      <td>Rp 120.000</td>
                      <td>28 Aug 2017</td>
                      <td>
                        <div class="progress shadow" style="height: 3px;">
                          <div class="progress-bar" role="progressbar" style="width: 70%"></div>
                        </div>
                      </td>
                    </tr>

                    <tr>
                      <td>Sepatu Nike</td>
                      <td><img src="https://via.placeholder.com/110x110" class="product-img" alt="product img"></td>
                      <td>#9405825</td>
                      <td>Rp 180.000</td>
                      <td>09 Sep 2017</td>
                      <td>
                        <div class="progress shadow" style="height: 3px;">
                          <div class="progress-bar" role="progressbar" style="width: 100%"></div>
                        </div>
                      </td>
                    </tr>

                    <tr>
                      <td>Hand Watch</td>
                      <td><img src="https://via.placeholder.com/110x110" class="product-img" alt="product img"></td>
                      <td>#9405840</td>
                      <td>Rp 80.000</td>
                      <td>17 Sep 2017</td>
                      <td>
                        <div class="progress shadow" style="height: 3px;">
                          <div class="progress-bar" role="progressbar" style="width: 40%"></div>
                        </div>
                      </td>
                    </tr>

                    <tr>
                      <td>Sepatu Adidas</td>
                      <td><img src="https://via.placeholder.com/110x110" class="product-img" alt="product img"></td>
                      <td>#9405825</td>
                      <td>Rp 190.000</td>
                      <td>23 Aug 2017</td>
                      <td>
                        <div class="progress shadow" style="height: 3px;">
                          <div class="progress-bar" role="progressbar" style="width: 100%"></div>
                        </div>
                      </td>
                    </tr>

                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div><!--End Row-->

        <!--End Dashboard Content-->

        <!--start overlay-->
        <div class="overlay toggle-menu"></div>
        <!--end overlay-->

      </div>
      <!-- End container-fluid-->

    </div><!--End content-wrapper-->
    <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->

    <!--Start footer-->
    <footer class="footer">
      <div class="container">
        <div class="text-center">
          Copyright © 2018 Dashtreme Admin
        </div>
      </div>
    </footer>
    <!--End footer-->

    <!--start color switcher-->
    <div class="right-sidebar">
      <div class="switcher-icon">
        <i class="zmdi zmdi-settings zmdi-hc-spin"></i>
      </div>
      <div class="right-sidebar-content">

        <p class="mb-0">Gaussion Texture</p>
        <hr>

        <ul class="switcher">
          <li id="theme1"></li>
          <li id="theme2"></li>
          <li id="theme3"></li>
          <li id="theme4"></li>
          <li id="theme5"></li>
          <li id="theme6"></li>
        </ul>

        <p class="mb-0">Gradient Background</p>
        <hr>

        <ul class="switcher">
          <li id="theme7"></li>
          <li id="theme8"></li>
          <li id="theme9"></li>
          <li id="theme10"></li>
          <li id="theme11"></li>
          <li id="theme12"></li>
          <li id="theme13"></li>
          <li id="theme14"></li>
          <li id="theme15"></li>
        </ul>

      </div>
    </div>
    <!--end color switcher-->

    <!-- LOGIN & REGISTER BUTTON (BOTTOM LEFT) -->
    <div style="
  position: fixed;
  bottom: 20px;
  left: 20px;
  z-index: 9999;
">
      <a href="{{ url('/login') }}" class="btn btn-light btn-sm mb-2 w-100 text-white">
        Login
      </a>
      <a href="{{ url('/register') }}" class="btn btn-light btn-sm w-100 btn-text-white">
        Daftar
      </a>
    </div>


  </div><!--End wrapper-->

  <!-- Bootstrap core JavaScript-->
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/popper.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>

  <!-- simplebar js -->
  <script src="assets/plugins/simplebar/js/simplebar.js"></script>
  <!-- sidebar-menu js -->
  <script src="assets/js/sidebar-menu.js"></script>
  <!-- loader scripts -->
  <script src="assets/js/jquery.loading-indicator.js"></script>
  <!-- Custom scripts -->
  <script src="assets/js/app-script.js"></script>
  <!-- Chart js -->

  <script src="assets/plugins/Chart.js/Chart.min.js"></script>

  <!-- Index js -->
  <script src="assets/js/index.js"></script>


</body>

</html>
