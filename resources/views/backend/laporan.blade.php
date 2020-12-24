@extends('layouts.admin')
@section('judul','Manajemen Laporan')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manajemen Laporan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Manajemen Laporan</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
<section class="content">
<!-- Begin Page Content -->
<div class="container-fluid">
        <form action="{{url('/laporan/filter')}}" method="get">
        <div class="row mb-4">
            <div class="col-md-3">
                <label>Tanggal Awal Laporan</label>
                <input type="date" name="start_date" class="form-control" required>
            </div>
            <div class="col-md-3">
                <label>Tanggal Akhir Laporan</label>
                <input type="date" name="end_date" class="form-control" required>
            </div>
            <div class="col-md-2">
                <label>Tujuan</label>
                <select name="tujuan" class="form-control" required>
                    <option value="" selected disabled="">Pilih Tujuan</option>
                    @foreach($tujuan as $tj => $value)
                    <option value="{{ $value->kd_tujuan }}">{{ $value->kota_tujuan }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
              <label><br></label>
                <input type="submit" class="form-control btn btn-primary" value="Filter Laporan">
            </div>
        </div>
        </form>

      <!-- DataTales Example -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <form action="{{url('/laporan/download')}}" method="get">
            <input type="hidden" name="start_date" value="{{ $tanggal_awal }}">
            <input type="hidden" name="end_date" value="{{ $tanggal_akhir }}">
            <input type="hidden" name="tujuan" value="{{ $kota_tujuan }}">
            <input type="submit" class="btn btn-success pull-right" value="Download Excel">
          </form>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="example1" width="100%" cellspacing="0" style="text-align: center;">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Kode Order</th>
                  <th>Kode Tiket</th>
                  <th>Tanggal Konfirmasi Admin</th>
                  <th>Nama Penumpang</th>
                  <th>Identias Penumpang</th>
                  <th>Kursi</th>
                  <th>Asal - Tujuan</th>
                </tr>
              </thead>
              <tbody>
                @foreach($laporan as $l => $value)
                <tr>
                  <td>{{++$l}}</td>
                  <td>{{ $value->kd_order }}</td>
                  <td>{{ $value->kd_tiket }}</td>
                  <td>{{\Carbon\Carbon::parse($value->create_tgl_tiket)->isoFormat('dddd, D MMMM Y') }}</td>
                  <td>{{ $value->nama_tiket }}</td>
                  <td>{{ $value->ktp_penumpang }}</td>
                  <td>{{ $value->kursi_tiket }}</td>
                  <td>{{ $value->kota_asal }} - {{ $value->kota_tujuan }}</td>
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
