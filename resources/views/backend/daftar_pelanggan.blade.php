@extends('layouts.admin')
@section('judul','Daftar Pelanggan')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Daftar Pelanggan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Daftar Pelanggan</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
<section class="content">
<!-- Begin Page Content -->
<div class="container-fluid">
      <!-- DataTales Example -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="example1" width="100%" cellspacing="0" style="text-align: center;">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Pelanggan</th>
                  <th>Nomor KTP</th>
                  <th>Alamat</th>
                  <th>Email</th>
                  <th>Telepon</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach($pelanggan as $p => $value)
                <tr>
                  <td>{{++$p}}</td>
                  <td>{{ $value->name }}</td>
                  <td>{{ $value->no_ktp }}</td>
                  <td>{{ $value->alamat }}</td>
                  <td>{{ $value->email }}</td>
                  <td>{{ $value->tlp }}</td>
                  <td><button delete-id="{{$value->id}}" class="btn btn-danger btn-hapus">Hapus</button></td>
              </tr>
                @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <!-- /.container-fluid -->
  </div>
  <!-- /.container-fluid -->
</section>
@endsection
@section('js')
<script type="text/javascript">
  
        {{--$(document).ready(function () {--}}

        {{--    $('.btn-hapus').click(function (e) {--}}
        {{--        e.preventDefault();--}}
        {{--        var id = $(this).attr('delete-id');--}}
        {{--        var url = "{{ url('delete_pelanggan') }}" + '/' + id;--}}
        {{--        $('#modal-notification').find('form').attr('action', url);--}}

        {{--        $('#modal-notification').modal();--}}
        {{--    })--}}

        {{--})--}}



            $('.btn-hapus').click(function (e) {

                var r = confirm("Apakah anda yakin ingin menghapus Bank ?");
                var id = $(this).attr('delete-id');

                if(r== true)
                {
                    window.location.href = "{{ url('delete_pelanggan') }}" + '/' + id;
                } else{

                }
            })

</script>
@endsection