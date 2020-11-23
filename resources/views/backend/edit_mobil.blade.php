@extends('layouts.admin')
@section('judul','Edit Mobil Travel')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit Mobil Travel</h1>
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
                                    @foreach($mobil as $mbl => $value)
                                    <form role="form" method="post" action="{{url('update_mobil/'.$value->kd_mobil)}}">
                                        {{ csrf_field() }}        
                                        <div class="form-group">
                                            <label>Nama Mobil</label>
                                            <input name="nama_mobil" class="form-control" value="{{ $value->nama_mobil }}">
                                        </div>
                                        <div class="form-group">
                                            <label>Plat Mobil</label>
                                            <input name="plat_mobil" class="form-control" value="{{ $value->plat_mobil}}">
                                        </div>
                                        <div class="form-group">
                                            <label>Kapasitas Mobil</label>
                                            <input name="kapasitas_mobil" class="form-control" value="{{ $value->kapasitas_mobil }}">
                                        </div>
                                       <div class="form-group">
                                            <label>Status</label>
                                            <select class="form-control" name="status">
                                            <option {{old('status',$value->status)=="1"? 'selected':''}}  value="1">Online</option>
                                            <option {{old('status',$value->status)=="2"? 'selected':''}}  value="2">Offline</option>
                                            </select>
                                        </div>
                                        <a href="{{url('/mobil')}}" class="btn btn-secondary">Kembali</a>
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