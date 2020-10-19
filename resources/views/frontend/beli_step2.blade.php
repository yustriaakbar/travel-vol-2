@extends('layouts.ui')
@section('judul','Proses Tiket')
@section('content')
		<section class="service-area section-gap relative">
			<div class="overlay overlay-bg"></div>
			<div class="container">
				<div class="row">
					<div class="col-lg-4">
						<!-- Default Card Example -->
						<form action="{{url('checkout')}}" method="post">
							{{ csrf_field() }}
						<input type="hidden" name="tgl" value="{{ $date }}">
						<input type="hidden" name="expired" value="{{date('Y-m-d H:i:s', strtotime('+1 day'))}}">
						<input type="hidden" name="tgl_beli" value="{{ date('Y-m-d H:i:s') }}">
						@foreach($jadwal as $j => $value)
						<input type="hidden" name="kd_jadwal" value="{{ $value->kd_jadwal }}">
						@endforeach
							@foreach($kursi as $k)
							<div class="card mb-5">
								<div class="card-header">
									<i class="fa fa-id-card-o"></i> Kursi Nomor {{ $k }}
								</div>
								<div class="card-body">
									<div class="form-group">
										<input type="text" id="" class="form-control" id="" name="nama" placeholder="Kursi Nomor {{ $k }} Atas Nama" required>
										<input type="hidden" name="kursi" value="{{ $k }}">
									</div>
									<div class="form-group">
										<select name="umur" class="form-control js-example-basic-single" required>
											<option value="" selected disabled="">Umur Penumpang</option>
											@for ($i = 1; $i < 70; $i++)
											<option value="{{ $i }}">{{ $i }} Tahun</option>
											@endfor
										</select>
									</div>
								</div>
							</div>
							@endforeach
						</div>
						@foreach($user as $u => $value)
						<div class="col-lg-5">
							<!-- Default Card Example -->
							<!-- Default Card Example -->
							<div class="card mb-5">
								<div class="card-header">
									<i class="fa fa-user"></i> Identitas Pemesan
								</div>
								<div class="card-body">
									<input type="hidden" name="user" value="{{ $value->id }}">
									<div class='form-group'>
										<div class='col-sm-12'>
											<input name='no_ktp' required="" maxlength='64' class='form-control required' placeholder='Nomor KTP' type='text' title='Nomor ktp harus diisi.'></div>
										</div>
										<div class='form-group'>
											<div class='col-sm-12'>
												<input name='nama_pemesan' required="" maxlength='64' class='form-control required' placeholder='Nama Pemesan' type='text' title='Nama Pemesan harus diisi.' value="{{ $value->name }}"></div>
											</div>
											<div class='form-group'>
												<div class='col-sm-12'>
													<input name='hp' required="" maxlength='16' class='form-control required' placeholder='Handphone' type='text' title='Handphone harus diisi.' value="{{ $value->tlp }}"></div>
												</div>
												<div class='form-group'>
													<div class='col-sm-12'>
													<textarea name='alamat' cols='20' rows='3' id='alamat' required="" maxlength='256' class='form-control required' placeholder='Alamat' title='Alamat harus diisi.'>{{ $value->alamat }}</textarea></div>
												</div>
												<div class='form-group'>
													<div class='col-sm-12'>
														<input name='email' required="" maxlength='64' class='form-control' placeholder='Email' type='text' value="{{ $value->email }}"></div>
													</div>
												</div>
											</div>
										</div>
									@endforeach
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
															@foreach($bank as $bnk => $value)
															<option value="{{ $value->kd_bank }}">{{ $value->nama_bank }}</option>
															@endforeach
															</select>
														</div>
														<hr>

														<div class='form-group'>
														<a href='javascript:history.back()' class='btn btn-default pull-left'>Kembali</a>							
														<button type="submit" class="btn btn-primary pull-right">Proses Tiket</button>
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