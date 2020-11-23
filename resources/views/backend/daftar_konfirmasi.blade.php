@extends('layouts.admin')
@section('judul','Daftar Konfirmasi')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Daftar Konfirmasi</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Daftar Konfirmasi</li>
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
                  <th>Nama Pengirim</th>
                  <th>Nama Bank</th>
                  <th>Nomor Rekening</th>
                  <th>Total</th>
                  <th>Bukti Transfer</th>
                </tr>
              </thead>
              <tbody>
                @foreach($konfirmasi as $k => $value)
                <tr>
                  <td>{{++$k}}</td>
                  <td>{{ $value->kd_order }}</td>
                  <td>{{ $value->nama_pengirim }}</td>
                  <td>{{ $value->nama_bank }}</td>
                  <td>{{ $value->rekening }}</td>
                  <td>{{ $value->total }}</td>
                  <td><img width="150px" src="{{asset($value->bukti_transfer)}}"></td>
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