@extends('layouts.ui')
@section('judul','Ganti Password')
@section('content')
		<section class="generic-banner relative">
			<div class="container">
				<div class="section-top-border">
					<h3 class="mb-30" align="center">Ganti Password</h3>
					<div class="row d-flex justify-content-center">
						<div class="col-lg-6">
							<!-- Default Card Example -->
							<div class="card" align="left">
								<div class="card-header">
									<i class="fa fa-key"></i> Password
								</div>
								<div class="card-body">
									<form ction="" method="post">
									 
									  <div class="form-group">
									  	<div class="form-label-group">
									    <input type="password" class="form-control"  name="currentpassword" placeholder="Password Sebelumnya">
										</div>
									   
									  </div>
									  <div class="form-group">
									  	<div class="form-label md-5">
									    <input type="password" class="form-control" required="" name="new_password1" placeholder="Password Baru">
										</div>
									    
									  </div>
									  <div class="form-group">
									  	<div class="form-label md-5">
									    <input type="password" class="form-control" required="" name="new_password2" placeholder="Ulangi Password">
										</div>
									  </div>
									<a class="btn btn-secondary" href="{{url('profile')}}">Kembali</a>
									<button type="submit" class="btn btn-primary pull-right" >Ganti Password</button>
									</form>
								</div>
							</div>
						</div>
					</div>
				</section>
@endsection