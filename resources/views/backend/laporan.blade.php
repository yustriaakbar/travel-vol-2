@extends('layouts.admin')
@section('judul','Manajemen Laporan')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
      <h1 class="h3 mb-2 text-gray-800">Manajemen Laporan</h1>
        <form action="" method="get">
        <div class="row mb-4">
            <div class="col-md-3">
                <label>Tanggal Awal Laporan</label>
                <input type="date" name="start_date" class="form-control">
            </div>
            <div class="col-md-3">
                <label>Tanggal Akhir Laporan</label>
                <input type="date" name="end_date" class="form-control">
            </div>
            <div class="col-md-2">
                <label>Tujuan</label>
                <select id="daftar_tr" name="tr" class="form-control">
                    <option value="semuaTR">Semua Tujuan</option>
  
                    <option value="">Surabaya</option>
                    
                </select>
            </div>
            <div class="col-md-2">
              <label><br></label>
                <input type="submit" class="form-control btn btn-primary" value="Filter Laporan">
            </div>
            <div class="col-md-2">
              <label><br></label>
                <input type="submit" class="form-control btn btn-success" value="Download Excel">
            </div>
        </div>
        </form>

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
                  <th>Kode Tiket</th>
                  <th>Nama Pemesan</th>
                  <th>Tanggal Pesan</th>
                  <th>Nama Penumpang</th>
                  <th>Umur</th>
                  <th>Kursi</th>
                  <th>Tujuan</th>
                </tr>
              </thead>
              <tbody>
                @foreach($laporan as $l => $value)
                <tr>
                  <td>{{++$l}}</td>
                  <td>{{ $value->kd_order }}</td>
                  <td>{{ $value->kd_tiket }}</td>
                  <td>{{ $value->nama_tiket }}</td>
                  <td>{{\Carbon\Carbon::parse($value->tgl_beli_order)->isoFormat('dddd, D MMMM Y') }}</td>
                  <td>{{ $value->nama_tiket }}</td>
                  <td>{{ $value->umur_tiket }}</td>
                  <td>{{ $value->kursi_tiket }}</td>
                  <td>{{ $value->kota_tujuan }}</td>
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
