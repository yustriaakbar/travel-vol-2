@extends('layouts.ui')
@section('judul','CEK JADWAL')
@section('css')
@endsection
@section('content')
@foreach($jadwal as $jdw => $value)
		<section class="service-area section-gap relative">
			<div class="overlay overlay-bg"></div>
			<div class="container">
				<div class="row d-flex justify-content-center">
						<div class="col-lg-15">
						<!-- Default Card Example -->
						<div class="card mb-5">
							<div class="card-header">
								<i class="fa fa-list-alt"></i> Daftar Berangkat
							</div>
							<div class="card-body">
								<div class="table-responsive">
								<table class="table table-striped">
									<thead>
										<tr>
											<th scope="col">Asal</th>
											<th>Tujuan</th>
											<th scope="col">Hari [jam]</th>
											<th scope="col">Kursi Tersedia</th>
											<th>Harga</th>
											<th scope="col">Tiket</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>{{ $value->kota_asal }} - {{ $value->nama_jalan }}</td>
											<td>{{ $value->kota_tujuan }}</td>
											<td>{{ $hari }}, {{ $tanggal }}[{{ $value->jam_berangkat }}]</td>
											<td>19</td>
											<td>Rp. {{ $value->harga }}</td>
											<td><a href="" class=" btn btn-primary">Pilih</a></td>
										</tr>
									</tbody>
								</table>
								</div>
								<a href="{{ url('/cektanggal') }}" class="btn btn-primary pull-left">Kembali </a>
									</div>
								</div>
							</div>
						</div>
					</div>
		</section>
@endforeach
@endsection
@section('js')
@endsection