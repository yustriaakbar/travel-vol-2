@extends('layouts.ui')
@section('judul','Biodata Penumpang')
@section('css')
<style type="text/css">
        ul {
          margin: 0;
          padding: 0;
          list-style: none
        }
        i {
          margin-right: 5px;
        }
</style>
@endsection
@section('content')
<!-- Section -->
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mt-5">
              <!-- Default Card Example -->
              <!-- Default Card Example -->
              <form action="{{url('checkout')}}" method="post">
			         {{ csrf_field() }}
              @foreach($user as $u => $value)
              <div class="card mb-3">
                <div class="card-header">
                  <i class="fa fa-user"></i> Detail Pemesan
                </div>
                <div class="row card-body">
                	<input type="hidden" name="user" value="{{ $value->id }}">
                      <div class="form-group col-md-3">
                          <label for="exampleFormControlSelect1">Titel</label>
                          <select class="form-control" id="exampleFormControlSelect1">
                            <option>Tuan</option>
                            <option>Nyonya</option>
                          </select>                 
                      </div>
                          <div class="form-group col-md-9">
                            <label>Nama</label>
                            <input name='nama_pemesan' required="" type="text" class="form-control" value="{{ $value->name }}">
                          </div>
                          <div class="form-group col-md-6">
                            <label>Email</label>
                            <input name='email' required="" type="text" class="form-control" value="{{ $value->email }}">
                          </div>
                          <div class="form-group col-md-6">
                            <label>Nomor Ponsel</label>
                            <input name='hp' required="" type="text" class="form-control" value="{{ $value->tlp }}">
                          </div>
                  </div>
                </div>
                @endforeach
          </div>
          
          <div class="col mt-5">
                      <div class="card">
                        <div class="card-header">
                          <i class="fa fa-bus"></i> Detail Travel
                        </div>
                        <div class="card-body">
                          <ul>
                            <li>► <b>NGK - SBY</b></li>
                            <li>► Plat Mobil <b>AG 1026 TRL</b></li>
                            <li>► Berangkat hari <b>Sabtu, 28 Nov 2020</b></li>
                            <li>► Jam keberangkatan pukul <b>08:30:00</b></li>
                            <li>► Perkiraan Tiba pukul <b>13:00:00</b></li>
                            <li>► Total Pembayaran <b>Rp. 100.000</b></li>
                          </ul>
                          </div>
                      </div>
                  </div>
              </div>

        <div class="row">
          <div class="col-lg-8">
              <!-- Default Card Example -->
              <!-- Default Card Example -->
              <div class="card mb-3">
                <div class="card-header">
                  <i class="fa fa-list-alt"></i> Detail Penumpang 
                </div>
						<input type="hidden" name="tgl" value="{{ $date }}">
						<input type="hidden" name="expired" value="{{date('Y-m-d H:i:s', strtotime('+1 day'))}}">
						<input type="hidden" name="tgl_beli" value="{{ date('Y-m-d H:i:s') }}">
						@foreach($jadwal as $j => $value)
						<input type="hidden" name="kd_jadwal" value="{{ $value->kd_jadwal }}">
						@endforeach
                <div class="row card-body">
                @foreach($kursi as $k)
                      <div class="form-group col-md-12">
                          <input type="text" class="form-control bg-light" value="Penumpang Dengan Kursi Nomor {{ $k }}" disabled="">
                          <input type="hidden" name="kursi[]" value="{{ $k }}">
                      </div>
                      <div class="form-group col-md-3">
                          <label for="exampleFormControlSelect1">Titel</label>
                          <select class="form-control" id="exampleFormControlSelect1">
                            <option>Tuan</option>
                            <option>Nyonya</option>
                          </select>                 
                      </div>
                      <div class="form-group col-md-9">
                          <label>Nama Lengkap</label>
                          <input type="text" class="form-control" name="nama[]" required="">
                      </div>
                      <div class="form-group col-md-12">
                          <label>KTP</label>
                          <input type="text" class="form-control" name="ktp[]" required="">
                      </div>
                @endforeach
                  </div><hr>
                      <div class="form-group col-md-5">
                          <label for="">Pilih Bank</label>
                            <select class="form-control" name="bank" required>
								<option value="" selected disabled="">Pilih Bank</option>
								@foreach($bank as $bnk => $value)
								<option value="{{ $value->kd_bank }}">{{ $value->nama_bank }}</option>
								@endforeach
                            </select>
                      </div>
                </div>
                <button type="submit" class="btn btn-warning mb-5 tombol float-right ml-3">Proses Tiket</button>
                <a href='javascript:history.back()' class="btn btn-secondary mb-5 tombol float-right text-light">Kembali</a>
                </form>
                </div>
              </div>
  </div>


<!-- End Section -->
@endsection
