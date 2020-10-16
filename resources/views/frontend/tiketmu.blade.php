@extends('layouts.ui')
@section('judul','Tiket')
@section('content')
		<div class="generic-banner">
			<br>
			<h2 class="text-white" align="center">Tiket Saya</h2>
			<div class="container ">
				<div class="row d-flex justify-content-center">
				@foreach($order as $ord => $value)
					<div class="col-sm-3">
						&nbsp;
						<div class="card " style="width: 18rem;">
							<img class="card-img-top" src="{{ asset('frontend/img/qr_code.png') }}" alt="Card image cap" >
							<div class="card-body" align="left">
								<a href="{{ asset('frontend/img/qr_code.png') }}" class="card-link" download>Download QrCode</a>
								<h5 class="card-title">Kode Order : 123456</h5>
								<p>Nama : Yustria Akbar
								 <br>Tanggal Pesan : 20 Desember 1998</br>
									Status Pembayaran : 
									<i class='btn-danger'>Belum bayar</i>

									
									<hr>
									
									<a href="{{url('payment/'.$value->id_order)}}" class="btn btn-primary">Cek Pembayaran</a>
									<!--
									<a href="" class="btn btn-success pull-right" download>Cetak Tiket</a>
									-->
								</div>
							</div>
						</div>
						&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
					@endforeach	
					</div>
				</div>
				<br><br>
				</div>
@endsection