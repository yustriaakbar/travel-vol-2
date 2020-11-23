@extends('layouts.ui')
@section('judul','Profile')
@section('css')
<style type="text/css">
        i {
          margin-right: 5px;
        }
</style>
@endsection
@section('content')
<!-- Section -->
<div class="container">
    <div class="row">
        <div class="col-2 px-1 bg-secondary border mt-5 bg-white" id="sticky-sidebar">
        <div class="card-header bg-white">
          <h4>{{ Auth::user()->name }}</h4>
        </div>
          <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion ml-3">
            
            @if(Request::is('profile')) 
            <li class="nav-item active mb-2">
            <a class="nav-link" href="{{ url('/profile') }}" style="display: inline-block;">
              <i class="fa fa-user-circle-o"> </i>
              <span>Akun</span></a>
            </li>
            @else
            <li class="nav-item mb-2">
            <a class="nav-link" href="{{ url('/profile') }}" style="display: inline-block;">
              <i class="fa fa-user-circle-o"> </i>
              <span>Akun</span></a>
            </li>
            @endif
            
            <li class="nav-item mb-2">
            <a class="nav-link" href="{{ url('/order') }}" style="display: inline-block;">
              <i class="fa fa-ticket"></i>
              <span>My Order</span></a>
            </li>

            <li class="nav-item mb-2">
            <a class="nav-link" href="" style="display: inline-block;">
              <i class="fa fa-cog"></i>
              <span>Pengaturan</span></a>
            </li>

            <li class="nav-item mb-2">
            <a class="nav-link" href="" style="display: inline-block;">
              <i class="fa fa-commenting"></i>
              <span>Inbox</span></a>
            </li>

            <li class="nav-item mb-2">
            <a class="nav-link" href="{{ route('logout') }}"onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();" style="display: inline-block;">
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                  </form>
              <i class="fa fa-sign-out"></i>
              <span>Keluar</span></a>
            </li>

          </ul>
        </div>
        <div class="col offset-3 mt-5" id="main">

      <div class="card">
        <div class="card-header bg-white">
          <h4>Detail Akun</h4>
        </div>
        <div class="row card-body">
              <div class="col-md-4">
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
                      <div class="form-label">
                      <label for="nama" class="control-label">Email</label>
                      <input type="text" class="form-control" name="email" value="{{ $value->email}}">
                    </div>
                    </div>
                    <div class="form-group">
                      <div class="form-label">
                      <label for="nama" class="control-label">Alamat</label>
                      <input type="text" class="form-control" name="alamat" value="{{ $value->alamat}}">
                    </div>
                    </div>
                  <button type="submit" class="btn btn-primary mt-2" >Simpan Perubahan</button> 
              </div>
              <div class="col-md-4">
                    <div class="form-group">
                      <div class="form-label">
                      <label for="nama" class="control-label">Nama</label>
                      <input type="text" class="form-control" name="nama" value="{{ $value->name}}">
                    </div>
                    </div>
                    <div class="form-group">
                      <div class="form-label">
                      <label for="nama" class="control-label">Nomor HP</label>
                      <input type="text" class="form-control" name="no_hp" value="{{ $value->tlp}}">
                    </div>                    
                    </div>
              </div>
              <div class="col-md-4">
                  <div class="form-group">
                      <label class="control-label">Photo Profile</label>
                      <br>
 					  @if(empty(Auth::user()->img))
					  <img id="image" src="{{ asset('backend/img/default.png') }}" style="width:150px;height:150px">
					  @else
					  <img id="image" src="{{asset($value->img)}}" style="width:150px;height:150px">
					  @endif
                      <br><br>
                      <input type="file" name="photo" accept=".jpg,.jpeg,.png" onchange="readURL(this);">
                   </div>
              </div>
              </form>
              @endforeach
        </div>
      </div>

      <div class="card mt-3">
        <div class="card-header bg-white">
          <h4>Ganti Password</h4>
        </div>
        <div class="row card-body">
          <div class="col-md-4">
              <div class="form-group">
                  <div class="form-label-group">
                  <label for="password" class="control-label">Password Sebelumnya</label>
                  <input type="password" class="form-control" name="currentpassword" placeholder="Password Sebelumnya">
                  </div>
              </div>
              <button type="submit" class="btn btn-primary mt-2">Ganti Password</button> 
          </div>
          <div class="col-md-4">
              <div class="form-group">
                  <div class="form-label-group">
                  <label for="password" class="control-label">Password Baru</label>
                  <input type="password" class="form-control" required="" name="new_password1" placeholder="Password Baru">
                  </div>
              </div>
          </div>
          <div class="col-md-4">
              <div class="form-group">
                  <div class="form-label-group">
                  <label for="password" class="control-label">Ulangi Password</label>
                  <input type="password" class="form-control" required="" name="new_password2" placeholder="Ulangi Password">
                  </div>
              </div>
          </div>
        </div>
      </div>
      <div class="mb-5"></div>
      </div>
  </div>
<!-- End Section -->
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
