@extends('layouts.admin')
@section('judul','Daftar Order')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
      <h1 class="h3 mb-2 text-gray-800">Daftar Order</h1>
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
                  <th>Kode Jadwal</th>
                  <th>Tanggal Berangkat</th>
                  <th>Nama Pemesan</th>
                  <th>Tanggal Beli</th>
                  <th>Jumlah Tiket</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach($order as $ord => $value)
                <tr>
                  <td>{{++$ord}}</td>
                  <td>{{ $value->kd_order }}</td>
                  <td>{{ $value->kd_jadwal }}</td>
                  <td>{{\Carbon\Carbon::parse($value->tgl_berangkat_order)->isoFormat('dddd, D MMMM Y') }}, {{ $value->jam_berangkat }}</td>
                  <td>{{ $value->nama_pemesan_tiket }}</td>
                  <td>{{\Carbon\Carbon::parse($value->tgl_beli_order)->isoFormat('dddd, D MMMM Y') }}, {{\Carbon\Carbon::parse($value->tgl_beli_order)->toTimeString() }}</td>
                  <td>{{ $value->tiket }}</td>
                  @if($value->status_order =='1')
                  <td class="btn-danger">Belum Bayar</td>
                  @else($value->status_order =='2')
                  <td class="btn-success">Sudah Bayar</td>
                  @endif
                  <td><a class="btn btn-primary" href="{{url('vieworder/'.$value->kd_order)}}">View</a>
                  </td>
                </td>
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
