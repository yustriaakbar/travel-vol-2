@extends('layouts.admin')
@section('judul','Edit Tujuan')
@section('content')
<div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Edit Kota Tujuan</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    @foreach($tujuan as $tj => $value)
                                    <form role="form" method="post" action="{{url('update_tujuan/'.$value->kd_tujuan)}}">
                                        {{ csrf_field() }}        
                                        <div class="form-group">
                                            <label>Kota tujuan</label>
                                            <input name="kota_tujuan" class="form-control" value="{{ $value->kota_tujuan }}">
                                        </div>
                                        <div class="form-group">
                                            <label>Nama Jalan</label>
                                            <input name="nama_jalan" class="form-control" value="{{ $value->nama_jalan}}">
                                        </div>
                                        <a href="{{url('/asal-tujuan')}}" class="btn btn-secondary">Kembali</a>
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
@endsection