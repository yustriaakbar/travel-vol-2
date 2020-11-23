@extends('layouts.admin')
@section('judul','Edit Jadwal')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit Jadwal</h1>
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
                                    @foreach($jadwal as $jdw => $value)
                                    <form role="form" method="post" action="{{url('update_jdwl/'.$value->kd_jadwal)}}">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <label>Pilih Mobil Travel</label>
                                            <select class="form-control" name="kd_mobil">
                                            @foreach($mobil as $mbl)
                                            <option value="{{ $value->kd_mobil }}" {{ $mbl->kd_mobil == $value->kd_mobil ? 'selected':'' }}>{{ $mbl->nama_mobil }} - {{ $mbl->plat_mobil }}</option>
                                            @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Pilih Asal</label>
                                            <select class="form-control" name="kd_asal">
                                            @foreach($asal as $sl)
                                            <option value="{{ $value->kd_asal }}" {{ $sl->kd_asal == $value->kd_asal ? 'selected':'' }}>{{ $sl->kota_asal }}</option>
                                            @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Pilih Tujuan</label>
                                            <select class="form-control" name="kd_tujuan">
                                            @foreach($tujuan as $tj)
                                            <option value="{{ $value->kd_tujuan }}" {{ $tj->kd_tujuan == $value->kd_tujuan ? 'selected':'' }}>{{ $tj->kota_tujuan }}</option>
                                            @endforeach
                                            </select>
                                        </div>                                                                         
                                        <div class="form-group">
                                            <label>Jam Berangkat</label>
                                            <input name="jam_berangkat" class="form-control" value="{{ $value->jam_berangkat }}">
                                        </div>
                                        <div class="form-group">
                                            <label>Jam Tiba</label>
                                            <input name="jam_tiba" class="form-control" value="{{ $value->jam_tiba }}">
                                        </div>
                                        <div class="form-group">
                                            <label>Harga</label>
                                            <input name="harga" class="form-control" value="{{ $value->harga }}">
                                        </div>
                                        <a href="{{url('/jadwal')}}" class="btn btn-secondary">Kembali</a>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </form>
                                    @endforeach
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