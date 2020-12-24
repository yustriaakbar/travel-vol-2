@extends('layouts.admin')
@section('judul','Daftar Tiket')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Daftar Tiket</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Daftar Tiket</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
<section class="content">
<!-- Begin Page Content -->
<div class="container-fluid">
      <!-- DataTales Example -->
      <div class="card shadow mb-4">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="example1" width="100%" cellspacing="0" style="text-align: center;">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Kode Order</th>
                  <th>Kode Tiket</th>
                  <th>Asal - Tujuan</th>
                  <th>Tanggal Beli Tiket</th>
                  <th>Nama Pemesan</th>
                  <th>Jadwal Berangkat</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach($tiket as $tk => $value)
                <tr>
                  <td>{{++$tk}}</td>
                  <td>{{ $value->kd_order }}</td>
                  <td>{{ $value->kd_tiket }}</td>
                  <td>{{ $value->kota_asal }} - {{ $value->kota_tujuan }}</td>
                  <td>{{\Carbon\Carbon::parse($value->tgl_beli_order)->isoFormat('dddd, D MMMM Y') }}</td>
                  <td>{{ $value->nama_pemesan_tiket }}</td>
                  <td>{{\Carbon\Carbon::parse($value->tgl_berangkat_order)->isoFormat('dddd, D MMMM Y') }}</td>
                  <td><a class="btn btn-success" href="{{url('etiket/'.$value->kd_tiket)}}">Cetak Tiket</a></td>
              </tr>
                @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <!-- /.container-fluid -->
  </div>
  <!-- /.container-fluid -->
</section>
@endsection
