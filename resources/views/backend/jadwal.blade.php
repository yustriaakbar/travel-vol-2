@extends('layouts.admin')
@section('judul','Jadwal Travel')
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
      <h1 class="h3 mb-2 text-gray-800">Jadwal Travel</h1>
      <!-- DataTales Example -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <a href="{{url('/tambah-jadwal')}}" class="btn btn-primary pull-right" >
          Tambah Jadwal
          </a>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Kota Asal</th>
                  <th>Kota Tujuan</th>
                  <th>Jam Berangkat</th>
                  <th>Jam Sampai</th>
                  <th>Harga</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach($jadwal as $jdwl => $value)
                <tr>
                  <td>{{++$jdwl}}</td>
                  <td>{{ $value->kota_asal }}</td>
                  <td>{{ $value->kota_tujuan }}</td>
                  <td>{{ $value->berangkat }}</td>
                  <td>{{ $value->tiba }}</td>
                  <td>{{ $value->harga }}</td>
                  <td><a href="{{url('edit-jadwal/'.$value->kd_jadwal)}}" class="btn btn-secondary">Edit</a>
                    <button delete-id="{{$value->kd_jadwal}}" class="btn btn-danger btn-hapus">Hapus</button>
                    <a href="" class="btn btn-primary">View</a></td>
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
        {{--        var url = "{{ url('delete_jdwl') }}" + '/' + id;--}}
        {{--        $('#modal-notification').find('form').attr('action', url);--}}

        {{--        $('#modal-notification').modal();--}}
        {{--    })--}}

        {{--})--}}



            $('.btn-hapus').click(function (e) {

                var r = confirm("Apakah anda yakin ingin menghapus Jadwal ?");
                var id = $(this).attr('delete-id');

                if(r== true)
                {
                    window.location.href = "{{ url('delete_jdwl') }}" + '/' + id;
                } else{

                }
            })

</script>
@endsection