@extends('layouts.admin')
@section('judul','Mobil Travel')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
      <h1 class="h3 mb-2 text-gray-800">Mobil Travel</h1>
      <!-- DataTales Example -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <a href="{{url('/tambah-mobil')}}" class="btn btn-primary pull-right" >
          Tambah Mobil
          </a>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="text-align: center;">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Mobil</th>
                  <th>Plat Mobil</th>
                  <th>Kapasitas Kursi</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach($mobil as $mbl => $value)
                <tr>
                  <td>{{++$mbl}}</td>
                  <td>{{ $value->nama_mobil }}</td>
                  <td>{{ $value->plat_mobil }}</td>
                  <td>{{ $value->kapasitas_mobil }}</td>
                  @if($value->status =='1')
                  <td class="btn-success">Online</td>
                  @else($value->status =='2')
                  <td class="btn-danger">Offline</td>
                  @endif
                  <td><a href="{{url('edit-mobil/'.$value->kd_mobil)}}" class="btn btn-secondary">Edit</a>
                    <button delete-id="{{$value->kd_mobil}}" class="btn btn-danger btn-hapus">Hapus</button>
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
  
        {{--$(document).ready(function () {--}}

        {{--    $('.btn-hapus').click(function (e) {--}}
        {{--        e.preventDefault();--}}
        {{--        var id = $(this).attr('delete-id');--}}
        {{--        var url = "{{ url('delete_mobil') }}" + '/' + id;--}}
        {{--        $('#modal-notification').find('form').attr('action', url);--}}

        {{--        $('#modal-notification').modal();--}}
        {{--    })--}}

        {{--})--}}



            $('.btn-hapus').click(function (e) {

                var r = confirm("Apakah anda yakin ingin menghapus Mobil ?");
                var id = $(this).attr('delete-id');

                if(r== true)
                {
                    window.location.href = "{{ url('delete_mobil') }}" + '/' + id;
                } else{

                }
            })

</script>
@endsection