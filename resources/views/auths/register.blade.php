<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  <title>Register | Sistem Booking Alat</title>

  <!-- loader-->
  <link href="{{ asset('assets/css/pace.min.css') }}" rel="stylesheet"/>
  <script src="{{ asset('assets/js/pace.min.js') }}"></script>

  <!--favicon-->
  <link rel="icon" href="{{ asset('assets/images/favicon.ico') }}" type="image/x-icon">

  <!-- Bootstrap core CSS-->
  <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet"/>

  <!-- animate CSS-->
  <link href="{{ asset('assets/css/animate.css') }}" rel="stylesheet"/>

  <!-- Icons CSS-->
  <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet"/>

  <!-- Custom Style-->
  <link href="{{ asset('assets/css/app-style.css') }}" rel="stylesheet"/>
</head>

<body class="bg-theme bg-theme1">

<!-- loader -->
<div id="pageloader-overlay" class="visible incoming">
  <div class="loader-wrapper-outer">
    <div class="loader-wrapper-inner">
      <div class="loader"></div>
    </div>
  </div>
</div>

<div id="wrapper">

  <div class="card card-authentication1 mx-auto my-4">
    <div class="card-body">
      <div class="card-content p-2">

        <div class="text-center">
          <img src="{{ asset('assets/images/logo-icon.png') }}" alt="logo icon">
        </div>

        <div class="card-title text-uppercase text-center py-3">
          Sign Up
        </div>

        {{-- ERROR VALIDATION --}}
        @if ($errors->any())
          <div class="alert alert-danger">
            <ul class="mb-0">
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif

        {{-- FORM REGISTER --}}
        <form action="{{ route('register') }}" method="POST">
          @csrf

          <div class="form-group">
            <label class="sr-only">Nama</label>
            <div class="position-relative has-icon-right">
              <input
                type="text"
                name="name"
                class="form-control input-shadow"
                placeholder="Masukkan Nama Anda"
                required
              >
              <div class="form-control-position">
                <i class="icon-user"></i>
              </div>
            </div>
          </div>

          <div class="form-group">
            <label class="sr-only">Email</label>
            <div class="position-relative has-icon-right">
              <input
                type="email"
                name="email"
                class="form-control input-shadow"
                placeholder="Masukkan Email Anda"
                required
              >
              <div class="form-control-position">
                <i class="icon-envelope-open"></i>
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
                placeholder="Masukkan Password Anda"
                required
              >
              <div class="form-control-position">
                <i class="icon-lock"></i>
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="icheck-material-white">
              <input type="checkbox" id="agree" required>
              <label for="agree">I Agree With Terms & Conditions</label>
            </div>
          </div>

          <button type="submit" class="btn btn-light btn-block">
            Sign Up
          </button>

          <div class="text-center mt-3">
            <p class="mb-0">
              Sudah punya akun?
              <a href="{{ route('login') }}">Login</a>
            </p>
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

<!-- JS -->
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/sidebar-menu.js') }}"></script>
<script src="{{ asset('assets/js/app-script.js') }}"></script>

</body>
</html>
