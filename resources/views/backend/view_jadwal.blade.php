@extends('layouts.admin')
@section('judul','View Jadwal')
@section('content')
@foreach($jadwal as $jdw => $value)
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Detail Jadwal Travel</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
<section class="content">
    <div class="container-fluid">
      <!-- Page Heading -->
      <!-- Basic Card Example -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Kode Jadwal  </h6>
        </div>
        <div class="card-body">             
            <div class="card-body">
              <div class="row">
                <div class="col-sm-6">
                  <p>Jurusan     : <b>{{ $value->kota_asal }} - {{ $value->kota_tujuan }} </b></p>
                  <p>Armada :  <b>{{ $value->nama_mobil }}</b></p>
                  <p>Plat Mobil  : <b>{{ $value->plat_mobil }}</b></p>
                  <p>Kapasitas Mobil  : <b>{{ $value->kapasitas_mobil }}</b></p>
                  <p>Jam Berangkat    : <b>pukul {{ $value->jam_berangkat }}</b></p>
                  <p>Jam Tiba : <b>pukul {{ $value->jam_tiba }}</b></p>
                  <p>Harga Tiket : <b>@currency($value->harga)</b></p>
                </div>
                <div class="col-sm-6">
                </div>
            </div>
            <hr>
            <a class="btn btn-secondary" href="{{url('/jadwal')}}"> Kembali</a>
          </div>
      </div>
    </div>
  </div>
</section>
  @endforeach
@endsection