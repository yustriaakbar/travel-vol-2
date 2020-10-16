@extends('layouts.ui')
@section('judul','Konfirmasi Pembayaran')
@section('content')
		<section class="service-area section-gap relative">
			<div class="overlay overlay-bg"></div>
			<div class="container">
				<div class="row d-flex justify-content-center">
					<div class="col-lg-4">
						<!-- Default Card Example -->
						<div class="card wobble animated">
					  <div class="card-header">
					    Konfirmasi Pembayaran
					  </div>
					  <div class="card-body">
					    <form action="" method="post" enctype="multipart/form-data">
									<div class="form-group">
										<label for="exampleInputEmail1">Kode Order</label>
										<input type="text" id="" class="form-control" id="" name="kd_order" value="" placeholder="Kode Tiket">
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">BANK Kamu</label>
										<select class="form-control" name="bank_km">
											<option value="" selected disabled="">Pilih Bank</option>
											<option value="BCA" >BCA</option>
											<option value="Mandiri">Mandiri</option>
											<option value="BNI">BNI</option>
											<option value="BRI">BRI</option>
										</select>
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Nomor Rekening</label>
										<input type="number" class="form-control" name="nomrek" value="" placeholder="Nomor Rekening">
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Nama Pengirim</label>
										<input type="text" class="form-control" name="nama" value="" placeholder="Nama Pengirim">
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Jumlah Pembayaran</label>
										<input type="number" class="form-control" name="total" value="" placeholder="Total Harga" readonly>
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Upload Poto Transaksi</label>
										<input type="file" class="form-control" name="userfile" required="">
									</div>
									<button type="submit" class="btn btn-primary pull-right">Konfirmasi </button>
								</form>
					  </div>
					</div>
					</div>
			</section>
@endsection