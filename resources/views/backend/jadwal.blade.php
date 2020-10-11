@extends('layouts.admin')
@section('judul','Jadwal Travel')
@section('content')
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