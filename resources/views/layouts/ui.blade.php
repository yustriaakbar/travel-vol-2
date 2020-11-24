<!DOCTYPE html>
<html>
<head>
  <title>@yield('judul')</title>
    <link rel="shortcut icon" href="{{ asset('frontend/img/icon.png') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/datepicker/dist/css/bootstrap-datepicker.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/style.css') }}">

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="{{ asset('frontend/datepicker/js/bootstrap-datepicker.js') }}"></script>
    <style type="text/css">
        .info-panel {
          box-shadow: 0 3px 20px rgba(0,0,0,0.5);
          border-radius: 12px;
          margin-top: -100px;
          background-color: white;
          padding: 30px;
        }
        footer {
          margin-top: 0!important;
        }

    </style>
    @yield('css')
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
      <a class="navbar-brand" href="#">
        <img src="{{ asset('frontend/img/logo.png') }}" width="160">
      </a>

      <div class="collapse navbar-collapse font-weight-bold" id="navbarNav">
        <ul class="navbar-nav ml-auto mr-5">

          @if(Request::is('/'))     
          <li class="nav-item active mr-2">
            <h6><a class="nav-link" href="{{ url('/') }}">Tiket Travel</a></h6>
          </li>
          @else
          <li class="nav-item mr-2">
            <h6><a class="nav-link" href="{{ url('/') }}">Tiket Travel</a></h6>
          </li>
          @endif

          @if(Request::is('cektiket'))     
          <li class="nav-item active mr-2">
            <h6><a class="nav-link" href="{{ url('/cektiket') }}">Cek Order</a></h6>
          </li>
          @else
          <li class="nav-item mr-2">
            <h6><a class="nav-link" href="{{ url('/cektiket') }}">Cek Order</a></h6>
          </li>
          @endif

          @if(Request::is('order'))     
          <li class="nav-item active mr-2">
            <h6><a class="nav-link" href="{{ url('/order') }}">My Order</a></h6>
          </li>
          @else
          <li class="nav-item mr-2">
            <h6><a class="nav-link" href="{{ url('/order') }}">My Order</a></h6>
          </li>
          @endif

          @if (Route::has('login'))
          <li class="nav-item mr-2">
            @auth
            <!--<h6><a class="nav-link" href="{{ url('/profile') }}">Hai, {{ Auth::user()->name }}</a></h6>-->
          <div class="btn-group">
              <a class="navbar-brand dropdown-toggle" href="#" id="bd-versions" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user-circle fa-lg"></i></a>
              <ul class="dropdown-menu">
                <li><a href="{{ url('/profile') }}" class="text-dark ml-3">My Profile</a><hr></li>
                <li>
                    <a class="text-dark ml-3" href="{{ route('logout') }}"onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                    </form>
              </li>
              </ul>
          </div>
          </li>
          @else
          <li class="nav-item mr-2">
            <h6><a class="nav-link" href="{{ url('/login') }}">Login</a></h6>
          </li>
          @if (Route::has('register'))
          <li class="nav-item mr-2">
            <h6><a class="nav-link" href="{{ url('/register') }}">Daftar</a></h6>
          @endif
          </li>
            @endauth
          @endif

        </ul>
      </div>
    </div>
</nav>
<!-- End Navbar -->

<div style="background-color: #E0E0E0;">
@yield('content')
</div>

<!-- Footer -->
            <footer class="page-footer" style="background-color:#50A0ff;  border-top : 2px solid #294AF9;">
                <div class="container text-center text-md-left">
                <div class="row text-center text-md-left pb-3">
                    <div class="col-md-4 " style="color: #424242; text-align:left;">
                    <br><br>
                    <p><div style="font-size:12pt; font-weight: bold; margin-top: -7%;" >Tiket Travel</div><hr></p>
                    <p>
                        <i class="fa fa-home mr-1"></i> Jl. Jend. Basuki Rachmat No. 01 Nganjuk</p>
                    <p>
                        <i class="fa fa-envelope mr-1"></i>admin@travel.com</p>
                    <p>
                        <i class="fa fa-phone mr-1"></i>082145672873
                    </p>
                    </div>

                    <!-- Grid column -->
                    <div class="col-md-8">
                        <br><br>
                    <div class="map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d253083.43912298148!2d111.88053073109214!3d-7.636956864313375!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7848eb63464de5%3A0xe1759fc633be1ec2!2sLintas%20Buana%20Tour%20%26%20Travel!5e0!3m2!1sid!2sid!4v1605382448804!5m2!1sid!2sid" width="100%" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                    </div>
                    </div>
                </div>
                <hr>

                <!-- Grid row -->
                <div class="row d-flex align-items-center">
                    <div class="col-md-12" style="color: #424242; ">
                    <p class="text-center">Copyright © 2020 Tiket Travel
                        <strong style="color: #424242; "></strong>
                    </p>
                    </div>
                </div>
                <br>
            </footer>
<!-- End Footer -->
</body>

@yield('js')

</html>