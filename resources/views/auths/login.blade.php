<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <title>Login | Sistem Booking Alat</title>

  <!-- loader-->
  <link href="{{ asset('assets/css/pace.min.css') }}" rel="stylesheet" />
  <script src="{{ asset('assets/js/pace.min.js') }}"></script>

  <!--favicon-->
  <link rel="icon" href="{{ asset('assets/images/favicon.ico') }}" type="image/x-icon">

  <!-- Bootstrap core CSS-->
  <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />

  <!-- animate CSS-->
  <link href="{{ asset('assets/css/animate.css') }}" rel="stylesheet" />

  <!-- Icons CSS-->
  <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet" />

  <!-- Custom Style-->
  <link href="{{ asset('assets/css/app-style.css') }}" rel="stylesheet" />
</head>

<body class="bg-theme bg-theme1">

  <!-- start loader -->
  <div id="pageloader-overlay" class="visible incoming">
    <div class="loader-wrapper-outer">
      <div class="loader-wrapper-inner">
        <div class="loader"></div>
      </div>
    </div>
  </div>
  <!-- end loader -->

  <div id="wrapper">

    <div class="card card-authentication1 mx-auto my-5">
      <div class="card-body">
        <div class="card-content p-2">

          <!-- LOGO -->
          <div class="text-center">
            <img src="{{ asset('assets/images/logo-icon.png') }}" alt="logo icon">
          </div>

          <div class="card-title text-uppercase text-center py-3">
            Sign In
          </div>

          {{-- ALERT ERROR --}}
          @if(session('error'))
            <div class="alert alert-danger text-center">
              {{ session('error') }}
            </div>
          @endif

          {{-- ALERT SUCCESS --}}
          @if(session('success'))
            <div class="alert alert-success text-center">
              {{ session('success') }}
            </div>
          @endif

          {{-- FORM LOGIN --}}
          <form action="{{ route('login') }}" method="POST">
            @csrf

            <div class="form-group">
              <label class="sr-only">Email</label>
              <div class="position-relative has-icon-right">
                <input
                  type="email"
                  name="email"
                  class="form-control input-shadow"
                  placeholder="Masukkan Email"
                  required
                >
                <div class="form-control-position">
                  <i class="icon-envelope"></i>
                </div>
              </div>
            </div>

            <div class="form-group">
              <label class="sr-only">Password</label>
              <div class="position-relative has-icon-right">
                <input
                  type="password"
                  name="password"
                  class="form-control input-shadow"
                  placeholder="Masukkan Password"
                  required
                >
                <div class="form-control-position">
                  <i class="icon-lock"></i>
                </div>
              </div>
            </div>

            <div class="form-row mb-2">
              <div class="form-group col-6">
                <div class="icheck-material-white">
                  <input type="checkbox" id="remember" name="remember">
                  <label for="remember">Remember me</label>
                </div>
              </div>
              <div class="form-group col-6 text-right">
                <a href="#" class="text-white-50">Reset Password</a>
              </div>
            </div>

            <button type="submit" class="btn btn-light btn-block">
              Sign In
            </button>

            <!-- REGISTER LINK -->
            <div class="text-center mt-3">
              <span class="text-white-50">Belum punya akun?</span>
              <a href="{{ route('register.form') }}" class="text-warning font-weight-bold">
                Daftar sekarang
              </a>
            </div>

          </form>

        </div>
      </div>
    </div>

    <!-- Back To Top -->
    <a href="javaScript:void();" class="back-to-top">
      <i class="fa fa-angle-double-up"></i>
    </a>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/js/popper.min.js') }}"></script>
  <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

  <!-- sidebar-menu js -->
  <script src="{{ asset('assets/js/sidebar-menu.js') }}"></script>

  <!-- Custom scripts -->
  <script src="{{ asset('assets/js/app-script.js') }}"></script>

</body>
</html>
