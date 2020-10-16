@extends('layouts.ui')
@section('judul','Pembayaran')
@section('content')
@foreach($order as $ord => $value)
		<section class="service-area section-gap relative">
			<div class="overlay overlay-bg"></div>
			<div class="container">
				<div class="row d-flex justify-content-center">
					<div class="col-lg-8">
						<!-- Default Card Example -->
						<div class="card mb-5">
							<div class="card-header" align="center">
								<b><i class="fa fa-ticket"></i> KODE ORDER {{ $value->kd_order }}</b>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table class="table table-striped">
										<thead>
											<tr>
												<th scope="col">No Tiket</th>
												<th scope="col">No jadwal [Plat Mobil]</th>
												<th scope="col">Berangkat</th>
												<th scope="col">No. Kursi</th>
												<th scope="col">Harga</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<th scope="row">{{ $value->kd_tiket }}</th>
												<td>{{ $value->kd_jadwal }} - {{ $value->plat_mobil }}</td>
												<td>{{date('l', strtotime($value->tgl_berangkat_order ))}}, {{ $value->tgl_berangkat_order }}, {{ $value->jam_berangkat }}</td>
												<td>{{ $value->no_kursi_penumpang }}</td>
												<td>Rp. {{ $value->harga }}</td>
											</tr>
										
											<td colspan="5"> <b class="pull-right">Total Rp {{ $value->harga }}</b></td>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-8">
						<!-- Default Card Example -->
						<div class="card">
							<div class="card-header" align="center">
								<i class="fa fa-ticket"></i> Proses Pembayaran
							</div>
							<div class="card-body" align="center">
								<h4>Segera Menyelesaikan Pembayaran Anda</h4><br>
								<p>Batas waktu pembayaran Anda akan berakhir pada</p>
								<h1><p id="expired"></p></h1>
								<p>Sebelum {{ $value->expired_order }}</p>
								<hr>
								<div class="medium-title col-12 mb-20">
									<h4><p>Silahkan transfer pembayaran ke nomor rekening berikut ini</p></h4>
								</div>
								<div class="offset-lg-1 col-lg-10 offset-sm-0 col-sm-12">
									<div class="row">
									@if($value->kd_bank =='1') 
										<div class="col-md-3 col-4 mb-xs-10 pr-xs-0">
											<img src="{{ asset('frontend/img/bank/bni-icon.jpg') }}" height="50" width="100" alt="Icon Bank" />
										</div>
										<div class="col-md-6 col-8 mb-xs-10 rekening-text">
											<p ><input type="hidden" name="" id="myInput" value=""><h4 id="myInput">{{ $value->rekening_bank }} an {{ $value->nasabah_bank }}</h4></p>
										</div>
									@elseif($value->kd_bank =='2')
										<div class="col-md-3 col-4 mb-xs-10 pr-xs-0">
											<img src="{{ asset('frontend/img/bank/mandiri-icon.jpg') }}" height="50" width="100" alt="Icon Bank" />
										</div>
										<div class="col-md-6 col-8 mb-xs-10 rekening-text">
											<p ><input type="hidden" name="" id="myInput" value=""><h4 id="myInput">{{ $value->rekening_bank }} an {{ $value->nasabah_bank }}</h4></p>
										</div>
									@elseif($value->kd_bank =='3')
										<div class="col-md-3 col-4 mb-xs-10 pr-xs-0">
											<img src="{{ asset('frontend/img/bank/bca-icon.jpg') }}" height="50" width="100" alt="Icon Bank" />
										</div>
										<div class="col-md-6 col-8 mb-xs-10 rekening-text">
											<p ><input type="hidden" name="" id="myInput" value=""><h4 id="myInput">{{ $value->rekening_bank }} an {{ $value->nasabah_bank }}</h4></p>
										</div>
									@elseif($value->kd_bank =='4')
										<div class="col-md-3 col-4 mb-xs-10 pr-xs-0">
											<img src="{{ asset('frontend/img/bank/bri-icon.jpg') }}" height="50" width="100" alt="Icon Bank" />
										</div>
										<div class="col-md-6 col-8 mb-xs-10 rekening-text">
											<p ><input type="hidden" name="" id="myInput" value=""><h4 id="myInput">{{ $value->rekening_bank }} an {{ $value->nasabah_bank }}</h4></p>
										</div>
									@endif
										<div class="col-md-3 copy-link">
											<button onclick="myFunction()" class="btn">Salin No Rek</button>
										</div>
									</div>
								</div>
								<div class="col-12 medium-title regular-text mt-20">
									<h4><b> <p>Sebesar</p></b></h4>
								</div>
								<div class="col-12 bigger-title text-orange">
									<h3 ><p >Rp {{ $value->harga }}</p></h3>
								</div>
								<div class="col-14 mt-15 mb-15">
									<hr>
									<div class="col-md-8 mt-sm-30">
										<h3 class="mb-20">PANDUAN PEMBAYARAN</h3>
										<div class="">
											<ol class="ordered-list" align="left">
												<li>Masukkan Kartu ATM Anda</li>
												<li>Masukan PIN ATM Anda</li>
												<li>Pilih Menu Transaksi Lainnya</li>
												<li>Pilih menu Transfer dan Ke Rek</li>
												<li>Masukkan no rekening yang dituju</li>
												<li>Masukkan Nominal Jumlah Uang yang akan di transfer</li>
												<li>Layar ATM akan menampilkan data transaksi anda ,</li>
												<li>Jika data sudah benar pilih “YA” (OK)</li>
												<li>Selesai (struk akan keluar dari mesin ATM)</li>
												<li>Ambil Kartu ATM anda</li>
											</ol>
										</div>
									</div>
								</div>
								<a href="{{ url('/konfirmasi') }}" class="btn btn-primary pull-center">Konfirmasi Pembayaran </a>
							</div>
						</div>
					</div>
				</section>
	@endforeach
@endsection
@section('js')
				<script>
				function myFunction() {
				var copyText = document.getElementById("myInput");
				copyText.select();
				document.execCommand("copy");
				swal("Copy", "Berhasil Copy Nomo Rekening", "info");
				}
				</script>
				<script>
				// Set the date we're counting down to
				var countDownDate = new Date("Oct 18, 2020 15:37:25").getTime();
				// Update the count down every 1 second
				var x = setInterval(function() {
				// Get todays date and time
				var now = new Date().getTime();
				// Find the distance between now and the count down date
				var distance = countDownDate - now;
				// Time calculations for days, hours, minutes and seconds
				var days = Math.floor(distance / (1000 * 60 * 60 * 24));
				var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
				var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
				var seconds = Math.floor((distance % (1000 * 60)) / 1000);
				// Output the result in an element with id="demo"
				document.getElementById("expired").innerHTML = hours + " Jam : "
				+ minutes + " Menit : " + seconds + " Detik ";
				// If the count down is over, write some text
				if (distance < 0) {
				clearInterval(x);
				document.getElementById("expired").innerHTML =  "Waktu Pembayaran Selesai";
				}
				}, 1000);
				</script>
@endsection