@extends('layouts.ui')
@section('judul','CEK JADWAL')
@section('css')
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend/datepicker/dcalendar.picker.css') }}">
@endsection
@section('content')
		<section class="service-area section-gap relative">
			<div class="overlay overlay-bg"></div>
			<div class="container">
				<div class="row">
					<div class="col-lg-4">
						<!-- Default Card Example -->
						<div class="card mb-5">
							<div class="card-header">
								<i class="fa fa-search"></i> Cari Tiket
							</div>
							<div class="card-body">
								<div class="alert alert-primary" role="alert">
									<p><b>PENTING!!</b></p>
									<P>Sebelum Membeli Tiket Harap Baca terlebih Dahulu <b><i data-toggle="modal" data-target="#exampleModal" >Cara Pemesanan</i></b></P>
								</div>
								<form action="{{url('/cekjadwal')}}" method="get">
									<div class="form-group">
										<label for="exampleInputEmail1">Pilih Tanggal</label>
										<input placeholder="Masukkan tanggal" type="text" class="form-control datepicker" name="tanggal" required="">
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Asal</label>
										<!-- <div class="default-select" id="default-select"> -->
										<select name="asal" class="form-control js-example-basic-single" required >
											<option value="asal" selected disabled="">Pilih Asal</option>
											@foreach($jadwal as $jdwl => $value)
											<option value="{{ $value->kd_asal }}">{{ $value->kota_asal }} - {{ $value->jalan_asal }}</option>
											@endforeach
										</select>
										<!-- </div> -->
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Tujuan</label>
										<!-- <div class="default-select" id="default-select"> -->
										<select name="tujuan" class="form-control js-example-basic-single">
											<option value="tujuan" selected disabled="">Pilih Tujuan</option>
											@foreach($jadwal as $jdwl => $value)
											<option value="{{ $value->kd_tujuan }}">{{ $value->kota_tujuan }}</option>
											@endforeach
										</select>
										<!-- </div> -->
									</div>
									<a href="{{ url('/') }}" class="btn btn-primary pull-left">Kembali </a>
									<button type="submit" class="btn btn-primary pull-right">Cari </button>
								</form>
							</div>
						</div>
					</div>
					<div class="col-lg-8">
						<div class="card mb-10">
							<div class="card-header">
								<i class="fa fa-info"></i> Info Jadwal
							</div>
							<div class="card-body">
								<table class="table table-bordered table-condensed" style="font-size:12px;" id="mydata">
                <thead>
                    <tr>
                        <th style="text-align:center;width:150px;">Lokasi Asal</th>
                        <th style="text-align:center;width:100px;">Lokasi Tujuan</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($jadwal as $jdwl => $value)
                    <tr>
                        <td style="text-align:center;vertical-align:middle">{{ $value->kota_asal }} - {{ $value->jalan_asal }}</td>
                        <td style="text-align:center;vertical-align:middle;">{{ $value->kota_tujuan }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
							</div>
						</div>
					</div>
				</div>
			</section>

	<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Cara Pemesanan</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="table-responsive">
					<ol class="ordered-list" align="left"><span class="center_content2"><li>Cari tiket kemudian klik pada tombol <b>Pesan</b>&nbsp;pada tiket yang ingin Anda pesan.</li>
					<li style="font-weight: normal;">Tiket yang Anda pesan akan masuk ke dalam <span style="font-weight: bold">Tiket Keranjang</span>.</li>
					<li style="font-weight: normal;">Jika sudah selesai, klik tombol <span style="font-weight: bold">Selesai Pesan</span>, maka akan tampil form untuk pengisian data kustomer/pembeli.</li>
					<li style="font-weight: normal;">Setelah data pembeli selesai diisikan, klik tombol <span style="font-weight: bold">Proses</span>,
					maka akan tampil data pembeli beserta tiketyang dipesannya (jika
					diperlukan catat nomor ordernya). Dan juga ada total pembayaran serta
				nomor rekening pembayaran.</li>
				<li style="font-weight: normal;">Apabila telah melakukan pembayaran, bawalah bukti pembayaran pada saat keberangkatan dan dilakukan penukaran satu jam sebelum keberangkatan. </li></span></ol><w:worddocument></w:worddocument>
			</div>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		</div>
	</div>
</div>
</div>
@endsection
@section('js')
			<script type="text/javascript">
			 $(function(){
			 	var date = new Date();
				date.setDate(date.getDate());

			  $(".datepicker").datepicker({
			  		startDate: date,
			      format: 'yyyy-mm-dd',
			      autoclose: true,
			      todayHighlight: true,
			  });
			 });
			</script>
			<script type="text/javascript">
				$(document).ready(function() {
				$('.js-example-basic-single').select2();
				});
			</script>
@endsection