@extends('layouts.ui')
@section('judul','TRAVEL')
@section('content')
		<section class="banner-area relative section-gap relative" id="home">
			<div class="container">
				<div class="row fullscreen d-flex align-items-center justify-content-end">
					<div class="banner-content col-lg-7 col-md-12">
						<h4  class="combined">Jaminan Tiket Resmi</h4>
							<h2 class="combined" >
						Tiket Travel dijamin resmi, pastikan Anda bisa pergi!				
							</h2>
						<p class="border-black" >
							Sekarang cari tiket travel semakin mudah, bisa pesan online. Tak perlu repot ke terminal atau kantor agen, sekarang Anda bisa beli tiket dengan mudah. Booking Cepat dan Mudah. Bebas Pilih Kursi. Termurah Setiap Hari. Customer Service 24/7. Semua Kelas dan Rute.
						</p>
						<a href="{{ url('/cektanggal') }}" class="primary-btn header-btn text-uppercase">Cari Tiket</a>
					</div>
				</div>
			</div>
		</section>

		<section class="service-area section-gap relative">
			<div class="overlay overlay-bg"></div>
			<div class="container">
				<div class="row d-flex justify-content-center">
					<div class="col-md-8 pb-40 header-text">
						<h1>CARA PEMESANAN TIKET TRAVEL</h1>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-4 col-md-6">
						<div class="single-service">
							<img class="img-fluid" src="{{ asset('frontend/img/a1.png') }}" width="100" height="100" alt="">
							<h4>Pilih rincian perjalanan
							</h4>
							<p>
								Masukkan tempat keberangkatan, tujuan, tanggal perjalanan dan kemudian klik 'Cari'
							</p>
						</div>
					</div>
					<div class="col-lg-4 col-md-6">
						<div class="single-service">
							<img class="img-fluid" src="{{ asset('frontend/img/a3.png') }}" width="100" height="100" alt="">
							<h4>Pilih travel dan tempat duduk anda</h4>
							<p>
								Pilih travel, tempat duduk, tempat keberangkatan, tujuan, isi rincian penumpang dan klik 'Pembayaran'
							</p>
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