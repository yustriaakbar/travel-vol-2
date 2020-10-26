@extends('layouts.ui')
@section('judul','Pilih Kursi')
@section('content')
@foreach($jadwal as $jdw => $value)
		<section class="service-area section-gap relative">
			<div class="overlay overlay-bg"></div>
			<div class="container">
				<div class="row">
					<div class="col-lg-4">
						<!-- Default Card Example -->
						<div class="card mb-5">
							<div class="card-header">
								<i class="fa fa-info-circle"></i> Keterengan Tiket
							</div>
						
							<div class="card-body">
								<ul>
									<li>► Jurusan <b>{{ $value->kota_asal }} - {{ $value->kota_tujuan }}</b></li>
									<li>► Armada  <b>{{ $value->nama_mobil }}</b></li>
									<li>► Plat Mobil  <b>{{ $value->plat_mobil }}</b></li>
									<li>► Berangkat dari <b>{{ $value->kota_asal }} - {{ $value->nama_jalan }}</b></li>
									<li>► Turun di <b>{{ $value->kota_tujuan }}</b></li>
									<li>► Harga tiket: <b>@currency($value->harga)</b></li>
									<li>► Berangkat hari <b>{{\Carbon\Carbon::parse($date)->isoFormat('dddd, D MMMM Y') }}</b></li>
									<li>► Jam keberangkatan <b>pukul {{ $value->jam_berangkat }}</b></li>
									<li>► Jam Tiba <b>pukul {{ $value->jam_tiba }}</b></li>
								</ul>
							</div>
							
						</div>
					</div>
					<div class="col-lg-4">
						<form action="{{url('after-order')}}" method="get">
							<input type="hidden" name="jadwal" value="{{ $value->kd_jadwal }}">
							<input type="hidden" name="tanggal" value="{{ $date }}">
							<!-- Default Card Example -->
							<div class="card mb-5" >
								<div class="card-header">
									<i class="fa fa-bus"></i> Pilih Kursi
								</div>
								<center class="">
								<table class="">
									<tr>
										<td class='btn-group' width='139'>
											<label class='btn btn-default'>
												<input name='kursi[]' value='1' id='1' onclick='cer(this)' autocomplete='off' type='checkbox' {{in_array("1",$kursi)?"disabled checked":""}}>&nbsp;1
											</label>
											<label class='btn btn-default'>
												<input name='kursi[]' value='2' id='2' onclick='cer(this)' autocomplete='off' type='checkbox' {{in_array("2",$kursi)?"disabled checked":""}}>&nbsp;2
											</label>
										</td>
										<td class='btn-group' width='139'>
											<label class='btn btn-primary'>
												<a value='' autocomplete='off' disabled='disabled'>SUPIR</a>
											</label>
										</td>
									</tr>
									<tr>
										<td class='btn-group' width='139'>
											<label class='btn btn-default'>
												<input name='kursi[]' value='3' id='3' onclick='cer(this)' autocomplete='off' type='checkbox' {{in_array("3",$kursi)?"disabled checked":""}}>&nbsp;3
												</label>
												<label class='btn btn-default'>
													<input name='kursi[]' value='4' id='4' onclick='cer(this)' autocomplete='off' type='checkbox' {{in_array("4",$kursi)?"disabled checked":""}}>&nbsp;4
												</label>
											</td>
											<td class='btn-group' width='139'>
												<label class='btn btn-default'>
													<input name='kursi[]' value='5' id='5' onclick='cer(this)' autocomplete='off' type='checkbox' {{in_array("5",$kursi)?"disabled checked":""}}>&nbsp;5
												</label>
											</td>
										</tr>
										<tr>
											<td class='btn-group' width='139'>
												<label class='btn btn-default'>
													<input name='kursi[]' value='6' id='6' onclick='cer(this)' autocomplete='off' type='checkbox' {{in_array("6",$kursi)?"disabled checked":""}}>&nbsp;6
													</label>
													<label class='btn btn-default'>
														<input name='kursi[]' value='7' id='7' onclick='cer(this)' autocomplete='off' type='checkbox' {{in_array("7",$kursi)?"disabled checked":""}}>&nbsp;7
													</label>
												</td>
												<td class='btn-group' width='139'>
													<label class='btn btn-default'>
														<input name='kursi[]' value='8' id='8' onclick='cer(this)' autocomplete='off' type='checkbox' {{in_array("8",$kursi)?"disabled checked":""}}>&nbsp;8
													</label>
												</td>
											</tr>
											<tr>
												<td class='btn-group' width='139'>
													<label class='btn btn-default'>
														<input name='kursi[]' value='9' id='9' onclick='cer(this)' autocomplete='off' type='checkbox' {{in_array("9",$kursi)?"disabled checked":""}}>&nbsp;9
														</label>
														<label class='btn btn-default'>
															<input name='kursi[]' value='10' id='10' onclick='cer(this)' autocomplete='off' type='checkbox' {{in_array("10",$kursi)?"disabled checked":""}}>&nbsp;10
														</label>
													</td>
													<td class='btn-group' width='139'>
														<label class='btn btn-default'>
															<input name='kursi[]' value='11' id='11' onclick='cer(this)' autocomplete='off' type='checkbox' {{in_array("11",$kursi)?"disabled checked":""}}>&nbsp;11
														</label>
													</td>
												</tr>
												<tr>
													<td class='btn-group' width='139'>
														<label class='btn btn-default'>
															<input name='kursi[]' value='12' id='12' onclick='cer(this)' autocomplete='off' type='checkbox' {{in_array("12",$kursi)?"disabled checked":""}}>&nbsp;12
															</label>
															<label class='btn btn-default'>
																<input name='kursi[]' value='13' id='13' onclick='cer(this)' autocomplete='off' type='checkbox' {{in_array("13",$kursi)?"disabled checked":""}}>&nbsp;13
															</label>
														</td>
														<td class='btn-group' width='139'>
															<label class='btn btn-default'>
																<input name='kursi[]' value='14' id='14' onclick='cer(this)' autocomplete='off' type='checkbox' {{in_array("14",$kursi)?"disabled checked":""}}>&nbsp;14
															</label>
														</td>
													</tr>
													</table>
													</center>
												</div>
											</div>
											<div class="col-lg-4">
												<!-- Default Card Example -->
												<div class="card mb-5">
													<div class="card-header">
														<i class="fa fa-user"></i> Konfirmasi Pemesanan
													</div>
													<div class="alert alert-primary" role="alert">
														<p>Setelah memilih kursi, silahkan klik tombol 'selanjutnya' dibawah ini !</p>
														<div class='btn-group'>
															<a href="" class='btn btn-default'>Kembali</a>
															<input class="btn btn-primary pull-right" disabled="disabled" type="submit" value="Selanjutnya">
															
														</div>
													</div>
													<form>
													</div>
												</div>
											</section>
@endforeach
@endsection
@section('js')
<script type="text/javascript">
	jQuery(document).ready(function(){
									    
	var checkboxes = $("input[type='checkbox']"),
	submitButt = $("input[type='submit']");

	checkboxes.click(function() {
	submitButt.attr("disabled", !checkboxes.is(":checked"));
												  
	});

	})
									                                                  
																					                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                     
	</script>
	<script type="text/javascript">
	var count=0
	function cer(elem){
	if (elem.checked) {
	count = count + 1;
	if (count>4) {
	count = 4;
	swal("Maaf", "Maaf anda hanya boleh memilih 4 kursi !", "error");
	elem.checked = false;
	}
	}else{
	count = count-1;
	}
	}
	</script>
@endsection