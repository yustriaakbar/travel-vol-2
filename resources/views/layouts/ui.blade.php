<!DOCTYPE html>
<html lang="zxx" class="no-js">
	<head>
		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Favicon-->
		<link rel="shortcut icon" href="">
		<!-- Author Meta -->
		<meta name="author" content="colorlib">
		<!-- Meta Description -->
		<meta name="description" content="">
		<!-- Meta Keyword -->
		<meta name="keywords" content="">
		<!-- meta character set -->
		<meta charset="UTF-8">
		<!-- Site Title -->
		<title>@yield('judul')</title>
		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
		<!--
		CSS
		============================================= -->
		<style type="text/css">
		.combined {
		-webkit-text-stroke: 1px black;
		color: white;
		text-shadow:
		2px  2px 0 #000,
		-1px -1px 0 #000,
		1px -1px 0 #000,
		-1px  1px 0 #000,
		1px  1px 0 #000;
		}
		.border-black{
		  color: blue;
		  /*border white with light shadow*/
		  text-shadow: 
		     2px   0  0   #000, 
		    -2px   0  0   #000, 
		     0    2px 0   #000, 
		     0   -2px 0   #000, 
		     1px  1px 0   #000, 
		    -1px -1px 0   #000, 
		     1px -1px 0   #000, 
		    -1px  1px 0   #000,
		     1px  1px 5px #000;
		}
		</style>
		<link rel="stylesheet" href="{{ asset('frontend/css/linearicons.css') }}">
		<link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.css') }}">
		<link rel="stylesheet" href="{{ asset('frontend/css/font-awesome.min.css') }}">
		<link rel="stylesheet" href="{{ asset('frontend/css/nice-select.css') }}">
		<link rel="stylesheet" href="{{ asset('frontend/css/magnific-popup.css') }}">
		<link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.css') }}">
		<link rel="stylesheet" href="{{ asset('frontend/css/main.css') }}">
		<link rel="stylesheet" href="http://anijs.github.io/lib/anicollection/anicollection.css">
		<link rel="stylesheet" type="text/css" href="{{ asset('datepicker/dist/css/bootstrap-datepicker.min.css') }}">
		<link href="{{ asset('frontend/select2/css/select2.min.css') }}" rel="stylesheet" />
		  <style type="text/css">
  	.preloader {
			position: fixed;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
			z-index: 9999;
			background-color: #fff;
		}
		.preloader .loading {
			position: absolute;
			left: 50%;
			top: 50%;
			transform: translate(-50%,-50%);
			font: 14px arial;
		}
  </style>
  		@yield('css')
	</head>
	<body>
		<header id="header" id="home">
		    <div class="container">
		    	<div class="row align-items-center justify-content-between d-flex">
			      <div id="logo">
			        <a href=""><h3><b>Tiket Travel</b></h3></a>
			      </div>
			      <nav id="nav-menu-container">
			        <ul class="nav-menu">
			          
			         @if(Request::is('/'))
			          <li class="menu-active"><a href="{{ url('/') }}">Home</a></li>
			         @else
			          <li class="menu"><a href="{{ url('/') }}">Home</a></li>
			         @endif

			         @if(Request::is('cektanggal'))
			          <li class="menu-active"><a href="{{ url('/cektanggal') }}">Lokasi & Jadwal Tiket</a></li>
			         @else
			          <li class="menu"><a href="{{ url('/cektanggal') }}">Lokasi & Jadwal Tiket</a></li>
					 @endif			          
			          
			         @if(Request::is('cektiket')) 
			          <li class="menu-active"><a href="{{ url('/cektiket') }}">Cek Tiket</a></li>
			         @else
			          <li class="menu"><a href="{{ url('/cektiket') }}">Cek Tiket</a></li>
			         @endif

			          @if (Route::has('login'))
				      	<li class="menu-has-children">
				      		@auth
				      		<a href="">Hai, {{ Auth::user()->name }}</a>
						<ul>
							<li><a href="{{ url('/profile') }}"><i class="fa fa-id-card"></i> Profile Saya</a></li>
							<li><a href="{{ url('/tiket') }}"><i class="fa fa-ticket"></i> Tiket Saya</a></li>
							<li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i> Keluar</a></li>
                           
                           <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                           </form>
						</ul>
						</li>
				      		@else
				      <li><a href="{{ route('login') }}">Login</a></li>
				      			@if (Route::has('register'))
				  	  <li class="menu wobble animated"><a href="{{ route('register') }}">Daftar</a>
				  	  			@endif
				  	  </li>
				  	  		@endauth
				  	  
			        </ul>
			        @endif
			      </nav><!-- #nav-menu-container -->		    		
		    	</div>
		    </div>
		  </header><!-- #header -->

		  @yield('content')

			<footer class="footer-area section-gap">
				<div class="container">
					<div class="row">
						<div class="col-lg-3  col-md-6 col-sm-6">
							<div class="single-footer-widget">
								<h4 class="text-white">Tiket TRAVEL</h4>
								<p>
									Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
									tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
									quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
									consequat.
								</p>
							</div>
						</div>
						<div class="col-lg-4  col-md-6 col-sm-6">
							<div class="single-footer-widget">
								<h4 class="text-white">Contact Us</h4>
								<p>
									Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore dolore magna aliqua.
								</p>
								<p class="number">
									012-6532-568-9746 <br>
									012-6532-569-9748
								</p>
							</div>
						</div>						
						<div class="col-lg-5  col-md-6 col-sm-6">
							<div class="single-footer-widget">
								<h4 class="text-white">Newsletter</h4>
								<p>You can trust us. we only send  offers, not a single spam.</p>
								<div class="d-flex flex-row" id="mc_embed_signup">
										<form class="navbar-form" novalidate="true" action="" method="post">
									    <div class="input-group add-on">
									      	<input class="form-control" placeholder="Email address"  type="email">
											<div style="position: absolute; left: -5000px;">
												<input name="" tabindex="-1" value="" type="text">
											</div>
									      <div class="input-group-btn">
									        <button class="genric-btn primary circle arrow"><span class="lnr lnr-arrow-right"></span></button>
									      </div>
									    </div>
									      <div class="info mt-20"></div>									    
									  </form>

								</div>
							</div>
						</div>						
					</div>
					<div class="footer-bottom d-flex justify-content-between align-items-center flex-wrap">
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            <p class="footer-text m-0">Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a></p>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						<div class="footer-social d-flex align-items-center">
							<a href="#"><i class="fa fa-facebook"></i></a>
							<a href="#"><i class="fa fa-twitter"></i></a>
							<a href="#"><i class="fa fa-dribbble"></i></a>
							<a href="#"><i class="fa fa-behance"></i></a>
						</div>
					</div>
				</div>
			</footer>
			<div class="preloader">
			<div class="loading">
				<img src="{{ asset('frontend/img/preloader.gif') }}" width="80">
				<p>Harap Tunggu</p>
			</div>
		</div>	
			<!-- End footer Area -->

  <script src="{{ asset('frontend/js/vendor/jquery-2.2.4.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="{{ asset('frontend/js/vendor/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
<script src="{{ asset('frontend/js/easing.min.js') }}"></script>
<script src="{{ asset('frontend/js/hoverIntent.js') }}"></script>
<script src="{{ asset('frontend/js/superfish.min.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.ajaxchimp.min.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.sticky.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.nice-select.min.js') }}"></script>
<script src="{{ asset('frontend/js/parallax.min.js') }}"></script>
<script src="{{ asset('frontend/js/waypoints.min.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.counterup.min.js') }}"></script>
<script src="{{ asset('frontend/js/mail-script.js') }}"></script>
<script src="{{ asset('frontend/js/main.js') }}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="{{ asset('frontend/select2/js/select2.min.js') }}"></script>
<script src="{{ asset('datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>

<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5c78e8c23341d22d9ce6c142/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
 <script type="text/javascript">
    $(document).ready(function(){
      $(".preloader").fadeOut();
    })
  </script>
  @yield('js')
<!--End of Tawk.to Script-->
	</body>
</html>