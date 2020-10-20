@extends('layouts.admin')
@section('judul','Daftar Bank')
@section('content')
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