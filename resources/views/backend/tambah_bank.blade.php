@extends('layouts.admin')
@section('judul','Tambah Bank')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Tambah Rekening Bank</h1>
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
                                    <form role="form" method="post" action="{{url('create_bank')}}" enctype="multipart/form-data">
                                        {{ csrf_field() }}                                
                                        <div class="form-group">
                                            <label>Nama Bank</label>
                                            <input name="nama" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Rekening</label>
                                            <input name="rekening" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Atas Nama</label>
                                            <input name="an" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Logo Bank</label>
                                            <br>
                                            <input type="file" accept=".jpg,.jpeg,.png" name="logo" required>
                                        </div>
                                        <a href="{{url('/daftarbank')}}" class="btn btn-secondary">Kembali</a>
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