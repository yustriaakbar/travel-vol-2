@extends('layouts.ui')
@section('judul','Konfirmasi Pembayaran')
@section('content')
			<div class="container">
				<div class="row d-flex justify-content-center">
					<div class="col-lg-4 mt-5">
						<!-- Default Card Example -->
						<div class="card wobble animated">
					  <div class="card-header">
					    Konfirmasi Pembayaran
					  </div>
					  <div class="card-body">
					    <form action="{{url('create_confirm')}}" method="post" enctype="multipart/form-data">
					    	{{ csrf_field() }} 
									<div class="form-group">
										<label for="exampleInputEmail1">Kode Order</label>
										<input type="hidden" class="form-control" name="kd_order" value="{{ $order->kd_order }}">
										<input type="text" class="form-control" name="kd_order" value="{{ $order->kd_order }}" readonly>
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Nama BANK</label>
										<select class="form-control" name="nama_bank" required>
											<option value="" selected disabled="">Pilih Bank</option>
											@foreach($bank as $bnk => $value)
											<option value="{{ $value->kd_bank }}">{{ $value->nama_bank }}</option>
											@endforeach
										</select>
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Nomor Rekening</label>
										<input type="number" class="form-control" name="rek" value="" placeholder="Nomor Rekening">
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Nama Pengirim</label>
										<input type="text" class="form-control" name="nama" value="" placeholder="Nama Pengirim">
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Jumlah Pembayaran</label>
										<input type="text" class="form-control" name="total" value="@currency($total)" readonly>
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Upload Bukti Transfer</label>
										<input type="file" class="form-control" name="photo" required="">
									</div>
									<button type="submit" class="btn btn-primary pull-right">Konfirmasi </button>
								</form>
					  </div>

					</div>
					<div class="mb-5"></div>
				</div>
			</div>
	</div>
@endsection