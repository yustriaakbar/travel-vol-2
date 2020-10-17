@extends('layouts.admin')
@section('judul','Asal dan Tujuan')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
      <h1 class="h3 mb-2 text-gray-800">Asal</h1>
      <!-- DataTales Example -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <a href="{{url('/tambah-asal')}}" class="btn btn-primary pull-right" >
          Tambah Asal
          </a>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="text-align: center;">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Kota Asal</th>
                  <th>Nama Jalan</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach($asal as $asl => $value)
                <tr>
                  <td>{{++$asl}}</td>
                  <td>{{ $value->kota_asal }}</td>
                  <td>{{ $value->nama_jalan }}</td>
                  <td><a href="{{url('edit-asal/'.$value->kd_asal)}}" class="btn btn-secondary">Edit</a>
                    <button delete-id="{{$value->kd_asal}}" class="btn btn-danger btn-asal">Hapus</button></td>
              </tr>
                @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <!-- /.container-fluid -->

      <h1 class="h3 mb-2 text-gray-800">Tujuan</h1>
      <!-- DataTales Example -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <a href="{{url('/tambah-tujuan')}}" class="btn btn-primary pull-right" >
          Tambah Tujuan
          </a>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="text-align: center;">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Kota Tujuan</th>
                  <th>Nama Jalan</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach($tujuan as $tj => $value)
                <tr>
                  <td>{{++$tj}}</td>
                  <td>{{ $value->kota_tujuan }}</td>
                  <td>{{ $value->nama_jalan }}</td>
                  <td><a href="{{url('edit-tujuan/'.$value->kd_tujuan)}}" class="btn btn-secondary">Edit</a>
                    <button delete-id="{{$value->kd_tujuan}}" class="btn btn-danger btn-tujuan">Hapus</button></td>
              </tr>
                @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>

  </div>
  <!-- /.container-fluid -->
@endsection
@section('js')
<script type="text/javascript">
  
        {{--$(document).ready(function () {--}}

        {{--    $('.btn-asal').click(function (e) {--}}
        {{--        e.preventDefault();--}}
        {{--        var id = $(this).attr('delete-id');--}}
        {{--        var url = "{{ url('delete_asal') }}" + '/' + id;--}}
        {{--        $('#modal-notification').find('form').attr('action', url);--}}

        {{--        $('#modal-notification').modal();--}}
        {{--    })--}}

        {{--})--}}



            $('.btn-asal').click(function (e) {

                var r = confirm("Apakah anda yakin ingin menghapus Asal ?");
                var id = $(this).attr('delete-id');

                if(r== true)
                {
                    window.location.href = "{{ url('delete_asal') }}" + '/' + id;
                } else{

                }
            })

        {{--$(document).ready(function () {--}}

        {{--    $('.btn-tujuan').click(function (e) {--}}
        {{--        e.preventDefault();--}}
        {{--        var id = $(this).attr('delete-id');--}}
        {{--        var url = "{{ url('delete_tujuan') }}" + '/' + id;--}}
        {{--        $('#modal-notification').find('form').attr('action', url);--}}

        {{--        $('#modal-notification').modal();--}}
        {{--    })--}}

        {{--})--}}



            $('.btn-tujuan').click(function (e) {

                var r = confirm("Apakah anda yakin ingin menghapus Tujuan ?");
                var id = $(this).attr('delete-id');

                if(r== true)
                {
                    window.location.href = "{{ url('delete_tujuan') }}" + '/' + id;
                } else{

                }
            })

</script>
@endsection