@extends('layouts.ui')
@section('judul','My Order')
@section('css')
<style type="text/css">
        i {
          margin-right: 5px;
        }
</style>
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-2 px-1 bg-secondary border mt-5 bg-white" id="sticky-sidebar">
        <div class="card-header bg-white">
          <h4>{{ Auth::user()->name }}</h4>
        </div>
          <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion ml-3">
            <li class="nav-item mb-2">
            <a class="nav-link" href="{{ url('/profile') }}" style="display: inline-block;">
              <i class="fa fa-user-circle-o"> </i>
              <span>Akun</span></a>
            </li>

            @if(Request::is('order'))
            <li class="nav-item active mb-2">
            <a class="nav-link" href="{{ url('/order') }}" style="display: inline-block;">
              <i class="fa fa-ticket"></i>
              <span>My Order</span></a>
            </li>
            @else
            <li class="nav-item mb-2">
            <a class="nav-link" href="{{ url('/order') }}" style="display: inline-block;">
              <i class="fa fa-ticket"></i>
              <span>My Order</span></a>
            </li>
            @endif

            <li class="nav-item mb-2">
            <a class="nav-link" href="" style="display: inline-block;">
              <i class="fa fa-cog"></i>
              <span>Pengaturan</span></a>
            </li>

            <li class="nav-item mb-2">
            <a class="nav-link" href="" style="display: inline-block;">
              <i class="fa fa-commenting"></i>
              <span>Inbox</span></a>
            </li>

            <li class="nav-item mb-2">
            <a class="nav-link" href="{{ route('logout') }}"onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();" style="display: inline-block;">
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                  </form>
              <i class="fa fa-sign-out"></i>
              <span>Keluar</span></a>
            </li>

          </ul>
        </div>

        @if(empty($cek_data->kd_order))
        <div class="col offset-3 mt-5" id="main">
        <div class="card">
          <div class="row card-body justify-content-center">
            <img src="{{ asset('frontend/img/fd8652d2.svg') }}" class="mb-5">
                <!--<h6>Cek pesanan dengan mudah</h6>-->
                <h6>Anda belum order tiket travel.</h6>
          </div>
        </div>
      <div class="mb-5"></div>
      </div>
        @else
        <div class="col offset-3 mt-5" id="main">
      <div class="card">
        <div class="card-header bg-white">
          <h4>My Order</h4>
        </div>
        <div class="row card-body">
              <div class="col-md-3">
            <label for="exampleFormControlSelect1">Filter</label>
            <select class="form-control" id="exampleFormControlSelect1">
              <option>Bulan Ini</option>
              <option>Bulan Lalu</option>
              <option>Tentukan Periode</option>
            </select>                 
              </div>
              <div class="col-md-2">
                <label><br></label>
                <input type="submit" class="form-control btn btn-primary" value="Terapkan">
              </div>
        </div>
      </div>

      @foreach($order as $ord => $value)
      <div class="card mt-3">
        <div class="card-header bg-white">
          Travel
        </div>
        <div class="card-body">
          <h6>Order : {{ $value->kd_order }}</h6>
          <h6>{{ $value->asal }} - {{ $value->tujuan }} ({{ $value->tiket }} Penumpang)</h6>
          <p><small>{{\Carbon\Carbon::parse($value->tgl_beli_order)->isoFormat('dddd, D MMMM Y') }}, {{\Carbon\Carbon::parse($value->tgl_beli_order)->toTimeString() }}</small></p>
          <div class="row col">
          @if($value->status_order =='1')
          <i class='btn-danger'>Belum bayar</i>
          <h6 class="ml-auto"><a href="{{url('payment/'.$value->kd_order)}}">Lihat Detail</a></h6>
          @elseif($value->status_order =='2')
		      <i class='btn-success'>Lunas bayar</i>
          <h6 class="ml-auto"><a href="{{url('etiket/'.$value->kd_tiket)}}" target="_blank">Cetak Tiket</a></h6>
		      @else($value->status_order =='3')
		      <i class='btn-primary'>Menunggu Konfirmasi Admin</i>
          <h6 class="ml-auto"><a href="{{url('payment/'.$value->kd_order)}}">Lihat Detail</a></h6>
		      @endif

          </div>
        </div>
      </div>
      @endforeach
        <div class="mb-5"></div>
      </div>
      @endif
  </div>
</div>
@endsection
