<html>
<head>
  <title>E Tiket</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
  <style type="text/css">
    #rcorners1{
      border-radius: 50px 50px 50px 50px!important;
    }
    #rcorners2{
      border-radius: 50px 50px 0px 0px!important;
    }
    #rcorners3{
      border-radius: 0px 0px 50px 50px!important;
    }
    h6 {
      font-family: 'Roboto',sans-serif;
    }
  </style>
</head>
<body>
<div class="container">
  @foreach($tiket as $t => $value)
    <div class="row justify-content-center">
    <div class="col-auto mt-5">
      <div class="card" style="width: 43rem;" id="rcorners1">
        <div class="card-header bg-primary text-center" id="rcorners2">
          <h6>E-Tiket</h6>
        </div>
        <div class="row card-body">
          <div class="col-md-4">
            <label>Nama Penumpang</label>
            <h6>{{ $value->nama_penumpang }}</h6>
            <label>Nomor Identitas</label>
            <h6>{{ $value->ktp_penumpang }}</h6>
            <label>Mobil Travel</label>
            <h6>ELF2010 / AG 1313 JY</h6>
            <label>Jam Berangkat</label>
            <h6>{{ $value->jam_berangkat }} WIB</h6>
          </div>
          <div class="col-md-4">
            <label>Kode Booking</label>
            <h6>{{ $value->kd_order }}</h6>
            <label>Tipe Penumpang</label>
            <h6>Umum</h6>
            <label>Nomor Kursi</label>
            <h6>{{ $value->no_kursi_penumpang }}</h6>
            <label>Perkiraan Tiba</label>
            <h6>{{ $value->kota_tujuan }}, {{\Carbon\Carbon::parse($value->tgl_berangkat_order)->isoFormat('dddd, D MMMM Y') }} pukul {{ $value->jam_tiba }} WIB</h6>
          </div>
          <div class="col-md-4">
            <img src="{{ asset('frontend/img/code.png') }}" width="150">
          </div>
        </div>
        <div class="card-footer text-muted bg-primary" id="rcorners3">
          <br>
        </div>
      </div>
    </div>
  </div>
  @endforeach
  <div class="mb-5"></div>
</div>
</body>
</html>