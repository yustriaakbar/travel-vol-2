@extends('layouts.admin')
@section('judul','Daftar Order')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Daftar Order</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Daftar Order</li>
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
                  <th>Tujuan</th>
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
                  <td>{{ $value->tujuan }}</td>
                  <td>{{\Carbon\Carbon::parse($value->tgl_berangkat_order)->isoFormat('dddd, D MMMM Y') }}, {{ $value->jam_berangkat }}</td>
                  <td>{{ $value->nama_pemesan_tiket }}</td>
                  <td>{{\Carbon\Carbon::parse($value->tgl_beli_order)->isoFormat('dddd, D MMMM Y') }}, {{\Carbon\Carbon::parse($value->tgl_beli_order)->toTimeString() }}</td>
                  <td>{{ $value->tiket }}</td>
                  @if($value->status_order =='1')
                  <td class="btn-danger">Belum Bayar</td>
                  @elseif($value->status_order =='2')
                  <td class="btn-success">Sudah Bayar</td>
                  @elseif($value->status_order =='3')
                  <td class="btn-primary">Menunggu Konfirmasi</td>
                  @elseif($value->status_order =='4')
                  <td class="btn-danger">Pembayaran Ditolak</td>
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
</section>
@endsection
