@extends('layouts.ui')
@section('judul','Profile')
@section('content')
@foreach($user as $u => $value)
		<section class="generic-banner relative">
			<div class="container">
				<div class="section-top-border">
					<h3 class="mb-30" align="center">Profile Saya</h3>
					<div class="row d-flex justify-content-center">
						<div class="col-lg-6">
							<!-- Default Card Example -->
							<div class="card" align="left">
								<div class="card-header">
									<i class="fa fa-user"></i> Data Akun
								</div>
								<div class="card-body" align="left">
									<div class="row">
										<div class="col-sm-8">
											<h5 class="card-title">Nomor KTP</h5>
											<p class="card-text">{{ $value->no_ktp }}</p>
											<h5 class="card-title">Nama</h5>
											<p class="card-text">{{ $value->name }}</p>
											<h5 class="card-title">Email</h5>
											<p class="card-text">{{ $value->email }}</p>
											<h5 class="card-title">Alamat</h5>
											<p class="card-text">{{ $value->alamat }}</p>
										</div>
										<div class="col-sm-14">
											<h5 class="card-title">Nomor HP</h5>
											<p class="card-text">{{ $value->tlp }}</p>
											<h5 class="card-title">Photo Profile</h5>
											<p><img src="{{ asset('backend/img/default.png') }}" height="50" width="50" ></p>
											<p><a href="{{url('ganti-password')}}" class="btn btn-primary">Ganti Password</a></p>
											<p><a href="{{url('edit-profile')}}" class="btn btn-primary">Edit Akun</a></p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
@endforeach
@endsection