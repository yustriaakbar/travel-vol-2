@extends('layouts.admin')
@section('judul','Tambah Asal')
@section('content')
<div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Tambah Kota Asal</h1>
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
                                    <form role="form" method="post" action="{{url('create_asal')}}">
                                        {{ csrf_field() }}                
                                        <div class="form-group">
                                            <label>Kota Asal</label>
                                            <input name="kota_asal" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Nama Jalan</label>
                                            <input name="nama_jalan" class="form-control">
                                        </div>
                                        <a href="{{url('/asal-tujuan')}}" class="btn btn-secondary">Kembali</a>
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
@endsection