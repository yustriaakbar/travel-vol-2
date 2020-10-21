@extends('layouts.ui')
@section('judul','Edit Profile')
@section('content')
		<section class="generic-banner relative">
			<div class="container">
				<div class="section-top-border">
					<h3 class="mb-30" align="center">Edit Profile</h3>
					<div class="row d-flex justify-content-center">
						<div class="col-lg-6">
							<!-- Default Card Example -->
							<div class="card" align="left">
								<div class="card-header">
									<i class="fa fa-user"></i> Edit Profile
								</div>
								<div class="card-body">
								@foreach($user as $u => $value)
									<form action="{{url('update_profile')}}" method="post" enctype="multipart/form-data">
									 {{ csrf_field() }}
									  <div class="form-group">
									  	<div class="form-label-group">
									  	<label for="nama" class="control-label">Nomor KTP</label>
									    <input type="text" class="form-control" name="no_ktp" value="{{ $value->no_ktp}}">
										</div>
									  </div>
									  <div class="form-group">
									  	<div class="form-label md-5">
									  	<label for="nama" class="control-label">Nama</label>
									    <input type="text" class="form-control" name="nama" value="{{ $value->name}}">
										</div>
									    
									  </div>
									  <div class="form-group">
									  	<div class="form-label md-5">
									  	<label for="nama" class="control-label">Email</label>
									    <input type="text" class="form-control" name="email" value="{{ $value->email}}">
										</div>
									  </div>
									  <div class="form-group">
									  	<div class="form-label md-5">
									  	<label for="nama" class="control-label">Nomor HP</label>
									    <input type="text" class="form-control" name="no_hp" value="{{ $value->tlp}}">
										</div>								    
									  </div>
									  <div class="form-group">
									  	<div class="form-label md-5">
									  	<label for="nama" class="control-label">Alamat</label>
									    <input type="text" class="form-control" name="alamat" value="{{ $value->alamat}}">
										</div>
									  </div>
										<div class="form-group">
											<label class="control-label">Photo Profile</label>
											<br>
											@if(empty(Auth::user()->img))
											<img id="image" src="{{ asset('backend/img/default.png') }}" style="width:150px;height:150px">
											@else
											<img id="image" src="{{asset($value->img)}}" style="width:150px;height:150px">
											@endif
											<br><br>
											<input type="file" class="form-control" name="photo" accept=".jpg,.jpeg,.png" onchange="readURL(this);">
										</div>
									<a class="btn btn-secondary" href="{{url('profile')}}">Kembali</a>
									<button type="submit" class="btn btn-primary pull-right" >Simpan Perubahan</button>
									</form>
									@endforeach
								</div>
							</div>
						</div>
					</div>
				</section>
@endsection
@section('js')
        <script>
        function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#image')
                    .attr('src', e.target.result)
                    .width(209)
                    .height(121);
            };

            reader.readAsDataURL(input.files[0]);
                }
            }
        </script>
@endsection