@extends('layouts.admin')
@section('judul','Tambah Mobil')
@section('content')
<div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Tambah Mobil Travel</h1>
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
                                    <form role="form" method="post" action="{{url('create_mobil')}}">
                                        {{ csrf_field() }}                
                                        <div class="form-group">
                                            <label>Nama Mobil</label>
                                            <input name="nama_mobil" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Plat Mobil</label>
                                            <input name="plat_mobil" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Kapasitas</label>
                                            <input name="kapasitas_mobil" class="form-control" required>
                                        </div>
                                       <div class="form-group">
                                            <label>Status</label>
                                            <select class="form-control" name="status" required="">
                                            <option value="" disabled="" selected>Pilih Status</option>
                                            <option value="1">Online</option>
                                            <option value="2">Offline</option>
                                            </select>
                                        </div>
                                        <a href="{{url('/mobil')}}" class="btn btn-secondary">Kembali</a>
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