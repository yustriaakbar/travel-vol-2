@extends('layouts.admin')
@section('judul','Daftar Bank')
@section('css')
    <link rel="stylesheet" href="{{asset('css/homepage.css')}}">
@endsection
@section('content')
   @if(session()->has('berhasil'))

        <div class="modal fade" id="modal-notification" tabindex="-1" role="dialog"
             aria-labelledby="modal-notification" aria-hidden="true">
            <div class="modal-dialog modal-gradient-success  modal-dialog-centered modal-"
                 role="document">
                <div class="modal-content bg-gradient-success">

                    <div class="modal-body">

                        <div class="swal2-icon swal2-success swal2-animate-success-icon" style="display: flex;">
{{--                            <div class="swal2-success-circular-line-left"--}}
{{--                                 style="background-color: rgb(255, 255, 255);"></div>--}}
                            <span class="swal2-success-line-tip"></span>
                            <span class="swal2-success-line-long"></span>
                            <div class="swal2-success-ring"></div>
{{--                            <div class="swal2-success-circular-line-right"--}}
{{--                                 style="background-color: rgb(255, 255, 255);"></div>--}}
                        </div>


                        <div class="py-3 text-center">
                            <h4 class="heading text-light">{{session('berhasil')}}</h4>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">
                            Close
                        </button>

                    </div>

                </div>
            </div>
        </div>
@endif
<!-- Begin Page Content -->
<div class="container-fluid">
      <h1 class="h3 mb-2 text-gray-800">Daftar Bank</h1>
      <!-- DataTales Example -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <a href="{{url('/tambah-bank')}}" class="btn btn-primary pull-right" >
          Tambah Bank
          </a>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="text-align: center;">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Bank</th>
                  <th>Rekening</th>
                  <th>Atas Nama</th>
                  <th>Photo Bank</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach($bank as $b => $value)
                <tr>
                  <td>{{++$b}}</td>
                  <td>{{ $value->nama_bank }}</td>
                  <td>{{ $value->rekening_bank }}</td>
                  <td>{{ $value->nasabah_bank }}</td>
                  <td><img width="150px" src="{{asset($value->photo)}}"></td>
                  <td><a href="{{url('edit-bank/'.$value->kd_bank)}}" class="btn btn-secondary">Edit</a>
                    <button delete-id="{{$value->kd_bank}}" class="btn btn-danger btn-hapus">Hapus</button>
                  </td>
                </td>
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
@endsection
@section('js')
    <script type="text/javascript">
        $(window).on('load', function () {
            $('#modal-notification').modal('show');
        });
    </script>
<script type="text/javascript">
  
        {{--$(document).ready(function () {--}}

        {{--    $('.btn-hapus').click(function (e) {--}}
        {{--        e.preventDefault();--}}
        {{--        var id = $(this).attr('delete-id');--}}
        {{--        var url = "{{ url('delete_bank') }}" + '/' + id;--}}
        {{--        $('#modal-notification').find('form').attr('action', url);--}}

        {{--        $('#modal-notification').modal();--}}
        {{--    })--}}

        {{--})--}}



            $('.btn-hapus').click(function (e) {

                var r = confirm("Apakah anda yakin ingin menghapus Bank ?");
                var id = $(this).attr('delete-id');

                if(r== true)
                {
                    window.location.href = "{{ url('delete_bank') }}" + '/' + id;
                } else{

                }
            })

</script>
@endsection