@extends('layouts.admin')
@section('judul','Daftar Tiket')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
      <h1 class="h3 mb-2 text-gray-800">Daftar Tiket</h1>
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
                  <th>Tujuan</th>
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
                  <td>{{ $value->kota_tujuan }}</td>
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
@endsection
