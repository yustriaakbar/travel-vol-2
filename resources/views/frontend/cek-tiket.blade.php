@extends('layouts.ui')
@section('judul','Cek Tiket')
@section('content')
		<section class="service-area section-gap relative">
			<div class="overlay overlay-bg"></div>
			<div class="container">
				<div class="row d-flex justify-content-center">
					<div class="col-lg-4">
						<!-- Default Card Example -->
						<div class="card wobble animated">
					  <div class="card-header">
					   <i class="fa fa-ticket"></i> Cari Tiket
					  </div>
					  <div class="card-body">
					    <form action="" method="post">
									<div class="form-group">
										<label for="exampleInputEmail1">Masukan Kode order</label>
										<input type="text" id="" class="form-control" id="" name="kodetiket" placeholder="Kode Tiket" required="">
									</div>
									<button type="submit" class="btn btn-primary pull-right">Cari </button>
								</form>
					  </div>
					</div>
					</div>
			</section>
@endsection