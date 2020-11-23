@extends('layouts.ui')
@section('judul','Beranda')
@section('content')
<!-- Jumbotron -->
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators" style="margin-bottom: -35px;">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" style="margin-top: -40px;">
        <div class="carousel-item active">
          <img src="{{ asset('frontend/img/slide1.jpg') }}" class="mx-auto d-block">     
        </div>
        <div class="carousel-item">
          <img src="{{ asset('frontend/img/slide2.jpg') }}" class="mx-auto d-block">
        </div>
        <div class="carousel-item">
          <img src="{{ asset('frontend/img/slide3.jpg') }}" class="mx-auto d-block">
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div>
</div>
<!-- End Jumbotron -->

<!-- Container -->
<div class="container mb-5">
    <!-- Info Panel -->
    <div class="row justify-content-center">
      <div class="col-10 info-panel">
        <h4><i class="fa fa-bus mr-2"> </i>  Cari, Reservasi & Pesan Tiket Travel Online</h4>
        <div class="row mt-5 mb-2 border-top border-bottom">
          <div class="col-lg-3 mt-3">
          	<form action="{{url('/cekjadwal')}}" method="get">
            <div class="form-group">
                <label>Pilih Tanggal</label>
                <input class="form-control transparent-input datepicker" type='text' name='tanggal' placeholder="Masukkan Tanggal"  required>
            </div>
          </div>

          <div class="col-lg-4 border-right border-left">
            <div class="form-group mt-3">
                <label for="exampleFormControlSelect1">Asal</label>
                <select name="asal" class="form-control transparent-input" id="exampleFormControlSelect1" required="">
					<option value="" selected disabled="">Pilih Asal</option>
					@foreach($asal as $asl => $value)
					<option value="{{ $value->kd_asal }}">{{ $value->kota_asal }} - {{ $value->nama_jalan }}</option>
					@endforeach
                </select>
            </div>
          </div>

          <div class="col-lg-4 mt-3">
            <div class="form-group">
                <label for="exampleFormControlSelect1">Tujuan</label>
                <select name="tujuan" class="form-control transparent-input" id="exampleFormControlSelect1" required="">
					<option value="" selected disabled="">Pilih Tujuan</option>
					@foreach($jadwal as $jdwl => $value)
					<option value="{{ $value->kd_tujuan }}">{{ $value->kota_tujuan }}</option>
					@endforeach
                </select>
            </div>
          </div>

        </div>
        <div class="row float-right">
            <button type="submit" class="btn btn-warning mr-5 tombol">Cari Tiket</button>
        </div>
    	</form>
      </div> 
    </div>
  <!-- Akhir Panel -->
</div>
<!-- End Container -->

<!-- Container -->
<div class="container">
  <div class="row justify-content-center">
    <div class="col-10 mb-5">
    <div class="row vertical-align">
        <div class="col-lg-2"><img src="{{ asset('frontend/img/simple-profile.webp') }}" height="80" /></div>
        <div class="col-lg-4"><h5>Simple Profile</h5><p>Pesan lebih cepat, isi data penumpang dengan sekali klik.</p></div>
        <div class="col-lg-2"><img src="{{ asset('frontend/img/simple-reschedule.webp') }}" height="80" /></div>
        <div class="col-lg-4"><h5>Simple Reschedule</h5><p>Memudahkan kamu mengatur ulang keberangkatan.</p></div>
    </div>
    <div class="row vertical-align mt-3">
        <div class="col-lg-2"><img src="{{ asset('frontend/img/easy-ticket.webp') }}" height="80" /></div>
        <div class="col-lg-4"><h5>Simple Booking Process</h5><p>Pemesanan tanpa ribet di mana pun dan kapan pun.</p></div>
        <div class="col-lg-2"><img src="{{ asset('frontend/img/simple-refund.webp') }}" height="80" /></div>
        <div class="col-lg-4"><h5>Simple Refund</h5><p>Refund tiket tanpa ribet dari aplikasi maupun website.</p></div>
    </div>
    </div>
  </div>
</div>
<!-- End Container -->
@endsection
@section('js')
<script type="text/javascript">
       $(function(){
        var date = new Date();
        date.setDate(date.getDate());

        $(".datepicker").datepicker({
            startDate: date,
            format: 'yyyy-mm-dd',
            autoclose: true,
            todayHighlight: true,
        });
       });
</script>
@endsection
