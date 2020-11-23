@extends('layouts.ui')
@section('judul','Cek Jadwal')
@section('content')
<div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-15">
            <!-- Default Card Example -->
            <div class="card mb-5 mt-5">
              <div class="card-header">
                <i class="fa fa-list-alt"></i> Daftar Berangkat
              </div>
              <div class="card-body">
                <div class="table-responsive">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th scope="col">Asal</th>
                      <th>Tujuan</th>
                      <th scope="col">Hari [jam]</th>
                      <th scope="col">Kursi Tersedia</th>
                      <th>Harga</th>
                      <th scope="col">Tiket</th>
                    </tr>
                  </thead>
                  <tbody>
                  	@foreach($jadwal as $jdw => $value)
                    <tr>
          						@if($kursi_tersedia == '0')
          						<td>Maaf, jadwal tidak ditemukan atau kursi sudah penuh</td>
          						@else
          						<td>{{ $value->kota_asal }} - {{ $value->nama_jalan }}</td>
          						<td>{{ $value->kota_tujuan }}</td>
          						<td>{{\Carbon\Carbon::parse($date)->isoFormat('dddd, D MMMM Y') }} [{{ $value->jam_berangkat }}]</td>
          						<td>{{ $kursi_tersedia }}</td>
          						<td>@currency($value->harga)</td>
          						<form action="{{url('before-order')}}" method="get">
          						<input type="hidden" name="jadwal" value="{{ $value->kd_jadwal }}">
          						<input type="hidden" name="tanggal" value="{{ $date }}">
          						<td><button type="submit" class=" btn btn-warning tombol">Pilih</button></td>
          						@endif
          						</form>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                </div>
                <a href="{{ url('/') }}" class="btn btn-warning tombol pull-left">Kembali </a>
                  </div>
                </div>
              </div>
</div>
@endsection
