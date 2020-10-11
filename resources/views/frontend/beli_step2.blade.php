@extends('layouts.ui')
@section('judul','Proses Tiket')
@section('content')
		<section class="service-area section-gap relative">
			<div class="overlay overlay-bg"></div>
			<div class="container">
				<div class="row">
					<div class="col-lg-4">
						<!-- Default Card Example -->
						<form action="" method="post">
						<input type="hidden" name="tgl" value="">

							
							<div class="card mb-5">
								<div class="card-header">
									<i class="fa fa-id-card-o"></i> Kursi Nomor 1
								</div>
								<div class="card-body">
									<div class="form-group">
										<input type="text" id="" class="form-control" id="" name="nama[]" placeholder="Kursi nomor 13 Atas Nama" required>
										<input type="hidden" name="kursi[]" value="">
									</div>
									<div class="form-group">
										<select name="tahun[]" class="form-control js-example-basic-single" required>
											<option value="" selected disabled="">Umur Penumpang</option>
											
											<option value="">20 Tahun</option>
											
										</select>
									</div>
								</div>
							</div>
							
						</div>
						<div class="col-lg-5">
							<!-- Default Card Example -->
							<!-- Default Card Example -->
							<div class="card mb-5">
								<div class="card-header">
									<i class="fa fa-user"></i> Identitas Pemesan
								</div>
								<div class="card-body">
									<div class='form-group'>
										<div class='col-sm-12'>
											<input name='no_ktp' required="" maxlength='64' class='form-control required' placeholder='Nomor KTP' type='text' title='Nomor ktp harus diisi.' value=""></div>
										</div>
										<div class='form-group'>
											<div class='col-sm-12'>
												<input name='nama_pemesan' required="" maxlength='64' class='form-control required' placeholder='Nama Pemesan' type='text' title='Nama Pemesan harus diisi.' value=""></div>
											</div>
											<div class='form-group'>
												<div class='col-sm-12'>
													<input name='hp' required="" maxlength='16' class='form-control required' placeholder='Handphone' type='text' title='Handphone harus diisi.' value=""></div>
												</div>
												<div class='form-group'>
													<div class='col-sm-12'>
													<textarea name='alamat' cols='20' rows='3' id='alamat' required="" maxlength='256' class='form-control required' placeholder='Alamat' title='Alamat harus diisi.' ></textarea></div>
												</div>
												<div class='form-group'>
													<div class='col-sm-12'>
														<input name='email' required="" maxlength='64' class='form-control' placeholder='Email' type='text' value=""></div>
													</div>
												</div>
											</div>
										</div>
										<div class="col">
											<div class="card">
												<div class="card-header">
													<i class="fa fa-usd"></i> Metode Pembayaran
												</div>
												<div class="card-body">
													<form action="" method="post">
														<div class="form-group">
															<label for="exampleInputEmail1">Pilih Bank </label>
															<select class="form-control" name="bank" required>
																<option value="" selected disabled="">Pilih Bank</option>
																
																<option value="">BNI</option>
																
															</select>
														</div>
														<hr>
														<div class='form-group'>
														<a href='javascript:history.back()' class='btn btn-default pull-left'>Kembali</a>
														<button class="btn btn-primary pull-right">Proses Tiket</button>
													</div>
												</form>
													</div>

											</div>
										</div>
									</div>
								</section>
@endsection
@section('js')
		<script type="text/javascript">
			$(document).ready(function() {
			$('.js-example-basic-single').select2();
			});
		</script>
@endsection