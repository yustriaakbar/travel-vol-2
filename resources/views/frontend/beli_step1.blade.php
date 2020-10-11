@extends('layouts.ui')
@section('judul','Tiket Travel')
@section('content')

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
									<li>► Jurusan <b>Nganjuk</b></li>
									<li>► Armada  <b>NGK1</b></li>
									<li>► Plat BUS  <b>AG 1234 TRN</b></li>
									<li>► Berangkat dari <b>Nganjuk - Jl. Ahmad Yani</b></li>
									<li>► Turun di <b>Surabaya</b></li>
									<li>► Harga tiket: <b>Rp. 100.000</b></li>
									<li>► Berangkat hari <b>Senin, 20 Desember 2020</b></li>
									<li>► Jam keberangkatan <b>pukul 12:00:00 WIB</b></li>
									<li>► Jam Tiba <b>pukul 15:30:00 WIB</b></li>
									<li>► Silahkan pilih kursi</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-lg-4">
						<form action="" method="get">
							<input type="hidden" name="tgl" value="">
							<!-- Default Card Example -->
							<div class="card mb-5" >
								<div class="card-header">
									<i class="fa fa-bus"></i> Pilih Kursi
								</div>
								<center class="">
								<table class="">
									<tr>
										<td class='btn-group' width='139'>
											<!--=================================================START 3A=========================================================-->
											<label class='btn btn-default'>
												<input name='kursi[]' value='1' id='1' onclick='cer(this)' autocomplete='off' type='checkbox'>&nbsp;1
											</label>
											<!--=================================================START 3A=========================================================-->
											<label class='btn btn-default'>
												<input name='kursi[]' value='2' id='2' onclick='cer(this)' autocomplete='off' type='checkbox'>&nbsp;2
											</label>
										</td>
										<td class='btn-group' width='139'>
											<!--=================================================START 3C=========================================================-->
											<label class='btn btn-primary'>
												<a value='' autocomplete='off' disabled='disabled'>SUPIR</a>
											</label>
										</td>
									</tr>
									<tr>
										<td class='btn-group' width='139'>
											<!--=================================================START 3A=========================================================-->
											<label class='btn btn-default'>
												<input name='kursi[]' value='3' id='3' onclick='cer(this)' autocomplete='off' type='checkbox'>&nbsp;3
												</label>				<!--=================================================START 3B=========================================================-->
												<label class='btn btn-default'>
													<input name='kursi[]' value='4' id='4' onclick='cer(this)' autocomplete='off' type='checkbox'>&nbsp;4
												</label>
											</td>
											<td class='btn-group' width='139'>
												<!--=================================================START 3A=========================================================-->
												<label class='btn btn-default'>
													<input name='kursi[]' value='5' id='5' onclick='cer(this)' autocomplete='off' type='checkbox'>&nbsp;5
												</label>
											</td>
										</tr>
										<tr>
											<td class='btn-group' width='139'>
												<!--=================================================START 3A=========================================================-->
												<label class='btn btn-default'>
													<input name='kursi[]' value='6' id='6' onclick='cer(this)' autocomplete='off' type='checkbox'>&nbsp;6
													</label>				<!--=================================================START 3B=========================================================-->
													<label class='btn btn-default'>
														<input name='kursi[]' value='7' id='7' onclick='cer(this)' autocomplete='off' type='checkbox'>&nbsp;7
													</label>
												</td>
												<td class='btn-group' width='139'>
													<!--=================================================START 3A=========================================================-->
													<label class='btn btn-default'>
														<input name='kursi[]' value='8' id='8' onclick='cer(this)' autocomplete='off' type='checkbox'>&nbsp;8
													</label>
													<label class='btn btn-default'>
														<input name='kursi[]' value='9' id='9' onclick='cer(this)' autocomplete='off' type='checkbox'>&nbsp;9
													</label>
												</td>
											</tr>
											<tr>
												<td class='btn-group' width='139'>
													<!--=================================================START 3A=========================================================-->
													<label class='btn btn-default'>
														<input name='kursi[]' value='10' id='10' onclick='cer(this)' autocomplete='off' type='checkbox'>&nbsp;10
														</label>				<!--=================================================START 3B=========================================================-->
														<label class='btn btn-default'>
															<input name='kursi[]' value='11' id='11' onclick='cer(this)' autocomplete='off' type='checkbox'>&nbsp;11
														</label>
													</td>
													<td class='btn-group' width='139'>
														<!--=================================================START 3A=========================================================-->
														<label class='btn btn-default'>
															<input name='kursi[]' value='12' id='12' onclick='cer(this)' autocomplete='off' type='checkbox'>&nbsp;12
														</label>
													</td>
												</tr>
												<tr>
													<td class='btn-group' width='139'>
														<!--=================================================START 3A=========================================================-->
														<label class='btn btn-default'>
															<input name='kursi[]' value='13' id='13' onclick='cer(this)' autocomplete='off' type='checkbox'>&nbsp;13
															</label>				<!--=================================================START 3B=========================================================-->
															<label class='btn btn-default'>
																<input name='kursi[]' value='14' id='14' onclick='cer(this)' autocomplete='off' type='checkbox'>&nbsp;14
															</label>
														</td>
														<td class='btn-group' width='139'>
															<!--=================================================START 3A=========================================================-->
															<label class='btn btn-default'>
																<input name='kursi[]' value='15' id='15' onclick='cer(this)' autocomplete='off' type='checkbox'>&nbsp;15
															</label>
														</td>
													</tr>
													<tr>
														<td class='btn-group' width='139'>
															<!--=================================================START 3A=========================================================-->
															<label class='btn btn-default'>
																<input name='kursi[]' value='16' id='16' onclick='cer(this)' autocomplete='off' type='checkbox'>&nbsp;16
																</label>				<!--=================================================START 3B=========================================================-->
																<label class='btn btn-default'>
																	<input name='kursi[]' value='17' id='17' onclick='cer(this)' autocomplete='off' type='checkbox'>&nbsp;17
																</label>
															</td>
															<td class='btn-group' width='139'>
																<!--=================================================START 3A=========================================================-->
																<label class='btn btn-default'>
																	<input name='kursi[]' value='18' id='18' onclick='cer(this)' autocomplete='off' type='checkbox'>&nbsp;18
																</label>
																<label class='btn btn-default'>
																	<input name='kursi[]' value='19' id='19' onclick='cer(this)' autocomplete='off' type='checkbox'>&nbsp;19
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