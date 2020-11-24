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
        @include('layouts.sidebar_ui')
        
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
					  <img id="image" src="{{ asset('admin/dist/img/default.png') }}" style="width:150px;height:150px">
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
