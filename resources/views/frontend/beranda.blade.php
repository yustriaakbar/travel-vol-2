@extends('layouts.ui')
@section('judul','Tiket Travel')
@section('content')
		<section class="service-area section-gap relative">
			<div class="overlay overlay-bg"></div>
			<div class="container">
				<!--<div class="row d-flex justify-content-center">
					<div class="col-md-8 pb-40 header-text">
						<h1>CARA PEMESANAN TIKET TRAVEL</h1>
					</div>
				</div>-->
				<h1><br><br></h1>
				<div class="row">
					<div class="col-lg-4 col-md-6">
						<div class="single-service">
							<a href="{{url('cektanggal')}}"><img class="img-fluid" src="{{ asset('frontend/img/a1.png') }}" width="100" height="100" alt="">
							<h4>Pilih rincian perjalanan
							</h4>
							<p>
								Masukkan tempat keberangkatan, tujuan, tanggal perjalanan dan kemudian klik 'Cari'
							</p></a>
						</div>
					</div>
					<div class="col-lg-4 col-md-6">
						<div class="single-service">
							<a href=""><img class="img-fluid" src="{{ asset('frontend/img/a3.png') }}" width="100" height="100" alt="">
							<h4>Pilih travel dan tempat duduk anda</h4>
							<p>
								Pilih travel, tempat duduk, tempat keberangkatan, tujuan, isi rincian penumpang dan klik 'Pembayaran'
							</p></a>
						</div>
					</div>
					<div class="col-lg-4 col-md-6">
						<div class="single-service">
							<img class="img-fluid" src="{{ asset('frontend/img/a2.png') }}" width="100" height="100" alt="">
							<h4>Cara Pembayaran yang Mudah</h4>
							<p>
								Pembayaran dapat dilakukan melalui transfer ATM, Internet banking.
							</p>
						</div>
					</div>
				</div>
			</div>
		</section>
@endsection