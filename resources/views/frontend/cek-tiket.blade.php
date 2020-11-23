@extends('layouts.ui')
@section('judul','Cek Pesanan')
@section('content')
<!-- Section -->
<div class="container">
    <div class="row">
        <div class="col-2 px-1 bg-secondary mt-5 bg-white" id="sticky-sidebar">
        <div class="bg-white ml-3 mt-4 mb-4">
          <h4>Cek Pesanan</h4>
        </div>
        <div class="ml-3">

        	<div class="form-group">
               <input type="text" class="form-control" name="email" placeholder="Alamat Email" style="max-width: 14rem;">
            </div>
        	<div class="form-group">
               <input type="text" class="form-control" name="kd_order" placeholder="Order ID" style="max-width: 14rem;">
            </div>
        	<div class="form-group ml-5">
               <button type="submit" class="btn btn-warning tombol">Cek Pesanan</button>
            </div>

        </div>
		</div> 
        <div class="col offset-3 mt-5" id="main">

	      <div class="card">
	        <div class="row card-body justify-content-center">
	        	<img src="{{ asset('frontend/img/fd8652d2.svg') }}" class="mb-5">
	              <!--<h6>Cek pesanan dengan mudah</h6>-->
	              <h6>Masukkan alamat email dan order ID di form cek pesanan.</h6>
	        </div>
	      </div>

      <div class="mb-5"></div>
      </div>
  </div>
</div>
<!-- End Section -->
@endsection