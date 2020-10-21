@extends('layouts.admin')
@section('judul','Daftar Konfirmasi')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
      <h1 class="h3 mb-2 text-gray-800">Daftar Konfirmasi</h1>
      <!-- DataTales Example -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="text-align: center;">
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
@endsection
@section('js')
@endsection