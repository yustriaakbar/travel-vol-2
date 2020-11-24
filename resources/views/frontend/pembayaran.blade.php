@extends('layouts.ui')
@section('judul','Pembayaran')
@section('css')
    <link rel="stylesheet" href="{{asset('css/homepage.css')}}">
@endsection
@section('content')
@if(session()->has('gagal'))
        <div class="modal fade" id="modal-notification" tabindex="-1" role="dialog"
             aria-labelledby="modal-notification" aria-hidden="true">
            <div class="modal-dialog modal-gradient-danger  modal-dialog-centered modal-"
                 role="document">
                <div class="modal-content bg-gradient-danger">

                    <div class="modal-body">

                        <div class="swal2-icon swal2-error swal2-animate-error-icon" style="display: flex;"><span
                                class="swal2-x-mark"><span class="swal2-x-mark-line-left"></span><span
                                    class="swal2-x-mark-line-right"></span></span></div>


                        <div class="py-3 text-center">
                            <h4 class="heading">{{session('gagal')}}</h4>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">
                            Close
                        </button>

                    </div>

                </div>
            </div>
        </div>
@endif
<!-- Section -->
<div class="container">
				<div class="row d-flex justify-content-center">
					<div class="col-lg-8 mt-5">
						<!-- Default Card Example -->
						<div class="card mb-4">
							<div class="card-header" align="center">
								<b><i class="fa fa-ticket"></i> KODE ORDER {{ $order1->kd_order }}</b>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table class="table table-striped">
										<thead>
											<tr>
												<th scope="col">No Tiket</th>
												<th scope="col">No jadwal [Plat Mobil]</th>
												<th scope="col">Berangkat</th>
												<th scope="col">No. Kursi</th>
												<th scope="col">Harga</th>
											</tr>
										</thead>
										<tbody>
											@foreach($order as $ord => $value)
											<tr>
												<th scope="row">{{ $value->kd_tiket }}</th>
												<td>{{ $value->kd_jadwal }} - {{ $value->plat_mobil }}</td>
												<td>{{\Carbon\Carbon::parse($value->tgl_berangkat_order)->isoFormat('dddd, D MMMM Y') }}, {{ $value->jam_berangkat }} </td>
												<td>{{ $value->no_kursi_penumpang }}</td>
												<td>@currency($value->harga)</td>
											</tr>
											@endforeach
											<td colspan="5"> <b class="pull-right">Total @currency($total)</b></td>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					
					<div class="col-lg-8">
						<!-- Default Card Example -->
						<div class="card">
							<div class="card-header" align="center">
								<i class="fa fa-ticket"></i> Proses Pembayaran
							</div>
							<div class="card-body" align="center">
								@if($order1->expired_order >= $today)
								<h4>Segera Menyelesaikan Pembayaran Anda</h4><br>
								<p>Batas waktu pembayaran Anda akan berakhir pada</p>
								<h1><p id="expired">
								<script>
								// Set the date we're counting down to
								var countDownDate = new Date("{{ $order1->expired_order }}").getTime();
								// Update the count down every 1 second
								var x = setInterval(function() {
								// Get todays date and time
								var now = new Date().getTime();
								// Find the distance between now and the count down date
								var distance = countDownDate - now;
								// Time calculations for days, hours, minutes and seconds
								var days = Math.floor(distance / (1000 * 60 * 60 * 24));
								var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
								var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
								var seconds = Math.floor((distance % (1000 * 60)) / 1000);
								// Output the result in an element with id="demo"
								document.getElementById("expired").innerHTML = hours + " Jam : "
								+ minutes + " Menit : " + seconds + " Detik ";
								// If the count down is over, write some text
								if (distance < 0) {
								clearInterval(x);
								document.getElementById("expired").innerHTML =  "Waktu Pembayaran Selesai";
								}
								}, 1000);
								</script>									
								</p></h1>
								<p>Sebelum {{\Carbon\Carbon::parse($order1->expired_order)->isoFormat('dddd, D MMMM Y') }}, {{\Carbon\Carbon::parse($order1->expired_order)->toTimeString() }} </p>
								@else
								<h1><p>Waktu Pembayaran Selesai</p></h1>
								<br>
								@endif
								<hr>
								<div class="medium-title col-12 mb-20">
									<h5><p>Silahkan transfer pembayaran ke nomor rekening berikut ini</p></h5>
								</div>
								<div class="offset-lg-1 col-lg-10 offset-sm-0 col-sm-12">
									<div class="row">
									@if($order1->kd_bank =='1') 
										<div class="col-md-3 col-4 mb-xs-10 pr-xs-0">
											<img src="{{ asset('frontend/img/bank/bni-icon.jpg') }}" height="50" width="100" alt="Icon Bank" />
										</div>
										<div class="col-md-6 col-8 mb-xs-10 rekening-text">
											<p ><input type="hidden" name="" id="myInput" value=""><h4 id="myInput">{{ $order1->rekening_bank }} an {{ $order1->nasabah_bank }}</h4></p>
										</div>
									@elseif($order1->kd_bank =='2')
										<div class="col-md-3 col-4 mb-xs-10 pr-xs-0">
											<img src="{{ asset('frontend/img/bank/mandiri-icon.jpg') }}" height="50" width="100" alt="Icon Bank" />
										</div>
										<div class="col-md-6 col-8 mb-xs-10 rekening-text">
											<p ><input type="hidden" name="" id="myInput" value=""><h4 id="myInput">{{ $order1->rekening_bank }} an {{ $order1->nasabah_bank }}</h4></p>
										</div>
									@elseif($order1->kd_bank =='3')
										<div class="col-md-3 col-4 mb-xs-10 pr-xs-0">
											<img src="{{ asset('frontend/img/bank/bca-icon.jpg') }}" height="50" width="100" alt="Icon Bank" />
										</div>
										<div class="col-md-6 col-8 mb-xs-10 rekening-text">
											<p ><input type="hidden" name="" id="myInput" value=""><h4 id="myInput">{{ $order1->rekening_bank }} an {{ $order1->nasabah_bank }}</h4></p>
										</div>
									@elseif($order1->kd_bank =='4')
										<div class="col-md-3 col-4 mb-xs-10 pr-xs-0">
											<img src="{{ asset('frontend/img/bank/bri-icon.jpg') }}" height="50" width="100" alt="Icon Bank" />
										</div>
										<div class="col-md-6 col-8 mb-xs-10 rekening-text">
											<p ><input type="hidden" name="" id="myInput" value=""><h4 id="myInput">{{ $order1->rekening_bank }} an {{ $order1->nasabah_bank }}</h4></p>
										</div>
									@endif
										<div class="col-md-3 copy-link">
											<button onclick="myFunction()" class="btn">Salin No Rek</button>
										</div>
									</div>
								</div>
								<div class="col-12 mb-20">
									<h5><p>Sebesar @currency($total)</p></h5>
								</div>
								<div class="col-14 mt-15 mb-15">
									<hr>
									<div class="col-md-8 mt-sm-30">
										<h4 class="mb-20">PANDUAN PEMBAYARAN</h4>
										<div class="">
											<ol class="ordered-list" align="left">
												<li>Masukkan Kartu ATM Anda</li>
												<li>Masukan PIN ATM Anda</li>
												<li>Pilih Menu Transaksi Lainnya</li>
												<li>Pilih menu Transfer dan Ke Rek</li>
												<li>Masukkan no rekening yang dituju</li>
												<li>Masukkan Nominal Jumlah Uang yang akan di transfer</li>
												<li>Layar ATM akan menampilkan data transaksi anda ,</li>
												<li>Jika data sudah benar pilih “YA” (OK)</li>
												<li>Selesai (struk akan keluar dari mesin ATM)</li>
												<li>Ambil Kartu ATM anda</li>
											</ol>
										</div>
									</div>
								</div>
								@if($order1->expired_order >= $today)
								<a href="{{ url('/konfirmasi/'.$order1->kd_order) }}" class="btn btn-primary pull-center">Konfirmasi Pembayaran </a>
								@else
								<button href="" class="btn btn-primary pull-center" disabled="">Konfirmasi Pembayaran </button>
								@endif
							</div>
					</div>
  				<div class="mb-5"></div>        
  				</div>
  			</div>
</div>        
<!-- End Section -->
@endsection
@section('js')
    <script type="text/javascript">
        $(window).on('load', function () {
            $('#modal-notification').modal('show');
        });
    </script>
@endsection
