@extends('layouts.admin')
@section('judul','Tambah Jadwal')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Tambah Jadwal</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
<section class="content">
<div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" method="post" action="{{url('create_jdwl')}}">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <label>Pilih Mobil Travel</label>
                                            <select name="kd_mobil" class="form-control" required="">
                                            <option value="" selected disabled="">Pilih Mobil Travel</option>
                                            @foreach($mobil as $mbl => $value)
                                            <option value="{{ $value->kd_mobil }}">{{ $value->nama_mobil }} - {{ $value->plat_mobil }}</option>
                                            @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Pilih Asal</label>
                                            <select name="kd_asal" class="form-control" required>
                                            <option value="" selected disabled="">Pilih Asal</option>
                                            @foreach($asal as $asl => $value)
                                            <option value="{{ $value->kd_asal }}">{{ $value->kota_asal }} - {{ $value->nama_jalan }}</option>
                                            @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Pilih Tujuan</label>
                                            <select name="kd_tujuan" class="form-control" required>
                                            <option value="" selected disabled="">Pilih Tujuan</option>
                                            @foreach($tujuan as $tj => $value)
                                            <option value="{{ $value->kd_tujuan }}">{{ $value->kota_tujuan }}</option>
                                            @endforeach
                                            </select>
                                        </div>                                                                         
                                        <div class="form-group">
                                            <label>Jam Berangkat</label>
                                            <input name="jam_berangkat" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Jam Tiba</label>
                                            <input name="jam_tiba" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Harga</label>
                                            <input name="harga" class="form-control" required>
                                        </div>
                                        <a href="{{url('/jadwal')}}" class="btn btn-secondary">Kembali</a>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </form>
                                </div>
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
</section>
@endsection