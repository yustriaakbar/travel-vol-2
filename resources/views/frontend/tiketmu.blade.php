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
								<h5 class="card-title">Kode Order : {{ $value->kd_order }}</h5>
								<p>Nama : {{ $value->nama_pemesan_tiket }}
								<br>Tanggal Pesan : {{\Carbon\Carbon::parse($value->tgl_beli_order)->isoFormat('dddd, D MMMM Y') }}, {{\Carbon\Carbon::parse($value->tgl_beli_order)->toTimeString() }}</br>
									Status Pembayaran :
									@if($value->status_order =='1') 
									<i class='btn-danger'>Belum bayar</i>
									<hr>
									<a href="{{url('payment/'.$value->kd_order)}}" class="btn btn-primary">Cek Pembayaran</a>
									@else($value->status_order =='2')
									<i class='btn-success'>Lunas bayar</i>
									<hr>
									<a href="{{url('etiket/'.$value->kd_tiket)}}" class="btn btn-success pull-right" download>Cetak Tiket</a>
									@endif
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