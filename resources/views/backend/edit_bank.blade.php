@extends('layouts.admin')
@section('judul','Edit Bank')
@section('css')
    <link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Edit Rekening Bank</h1>
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
                                    @foreach($bank as $b => $value)
                                    <form role="form" method="post" action="{{url('update_bank/'.$value->kd_bank)}}" enctype="multipart/form-data">
                                        {{ csrf_field() }}        
                                        <div class="form-group">
                                            <label>Nama Bank</label>
                                            <input name="nama" class="form-control" value="{{ $value->nama_bank}}">
                                        </div>
                                        <div class="form-group">
                                            <label>Rekening</label>
                                            <input name="rekening" class="form-control" value="{{ $value->rekening_bank}}">
                                        </div>
                                        <div class="form-group">
                                            <label>Atas Nama</label>
                                            <input name="an" class="form-control" value="{{ $value->nasabah_bank}}">
                                        </div>
                                        <div class="form-group">
                                            <label>Logo Bank</label>
                                            <br>
                                            <input type="file" name="logo" accept=".jpg,.jpeg,.png" onchange="readURL(this);">
                                            <img id="image" src="{{asset($value->photo)}}" alt="your image" class="border mt-2" width="209" height="121"/>
                                        </div>
                                        <a href="{{url('/daftarbank')}}" class="btn btn-secondary">Kembali</a>
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
@section('js')
        <script>
        function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#image')
                    .attr('src', e.target.result)
                    .width(209)
                    .height(121);
            };

            reader.readAsDataURL(input.files[0]);
                }
            }
        </script>

        <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
        <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
@endsection