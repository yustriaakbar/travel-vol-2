@extends('layouts.admin')
@section('judul','Daftar Admin')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
      <h1 class="h3 mb-2 text-gray-800">Daftar Admin</h1>
      <!-- DataTales Example -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <a href="{{url('/tambah-admin')}}" class="btn btn-primary pull-right" >
          Tambah Admin
          </a>          
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="text-align: center;">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Nomor KTP</th>
                  <th>Email</th>
                  <th>Telepon</th>
                  <th>Alamat</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach($admin as $adm => $value)
                <tr>
                  <td>{{++$adm}}</td>
                  <td>{{ $value->name }}</td>
                  <td>{{ $value->no_ktp }}</td>
                  <td>{{ $value->email }}</td>
                  <td>{{ $value->tlp }}</td>
                  <td>{{ $value->alamat }}</td>
                  <td><a href="" class="btn btn-danger">Nonaktifkan Akun</a></td>
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