@extends('layouts.admin')
@section('judul','View Order')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Detail Order</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
<section class="content">
    <div class="container-fluid">
      <!-- Basic Card Example -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">KODE Order {{ $order1->kd_order}}</h6>
        </div>
        <div class="card-body">
          <form action="{{url('update-order/'.$order1->kd_order)}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" name="kd_order" value="{{ $order1->kd_order}}">
            <input type="hidden" name="kd_tiket" value="{{ $order1->kd_tiket}}">
            <input type="hidden" name="kd_jadwal" value="{{ $order1->kd_jadwal}}">
            <input type="hidden" name="harga" value="@currency($total)">
              <div class="row">
                <div class="col-sm-6">
                  <label >Kode Tiket        :<b> {{ $order1->kd_tiket}}</b></label><br>
                  <label >Nama Pemesan      :<b> {{ $order1->nama_pemesan}}</b></label><br>
                  <label >Asal dan Tujuan   :<b> {{ $order1->asal}} - {{ $order1->tujuan}}</b></label><br>
                  <label >Total Harga Tiket :<b> @currency($total)</b></label><br>
                  @if(empty($konfirmasi->bukti_transfer))
                  <button class="btn btn-primary" disabled="">Belum Ada Konfirmasi Pembayaran</button>
                  @else
                  <a class="btn btn-primary" href="" data-toggle="modal" data-target="#konfirmasi">Lihat Konfirmasi Pembayaran</a>
                      <!-- Modal -->
                      <div class="modal fade" id="konfirmasi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Bukti Transfer</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <img src="{{asset($konfirmasi->bukti_transfer)}}" width="1100">
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- End Modal -->
                  @endif 
              </div>
              </div>
          
             <hr>
            
            <div class="card-body">
              <div class="row">
                @foreach($order as $ord => $value)
                <div class="col-sm-6">
                  <div class="row form-group">
                    <label for="nama" class="col-sm-4 control-label">Nama Penumpang</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="nama[]" value="{{ $value->nama_penumpang}}" readonly>
                    </div>
                  </div>
                  <div class="row form-group">
                    <label for="" class="col-sm-4 control-label">Nomor Kursi</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="kursi[]" value="{{ $value->no_kursi_penumpang}}" readonly>
                    </div>
                  </div>
                  <div class="row form-group">
                    <label for="" class="col-sm-4 control-label">Identitas Penumpang</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="ktp[]" value="{{ $value->ktp_penumpang}}" readonly>
                    </div>
                  </div>
                </div>
                @endforeach
                <div class="col-sm-6">
                  <div class="row form-group">
                    <label for="nama" class="col-sm-4 control-label">Status</label>
                    <div class="col-sm-8">
                      <select class="form-control" name="status">
                        <option {{old('status',$order1->status)=="1"? 'selected':''}}  value="1">Belum Bayar</option>
                        <option {{old('status',$order1->status)=="2"? 'selected':''}}  value="2">Sudah Bayar</option>
                        <option value="3">Hapus Order</option>
                      </select>
                    </div>
                  </div>
                  <hr><a class="btn btn-secondary mr-3" href="{{url('/daftarorder')}}"> Kembali</a>
                  <button type="submit" class="btn btn-success">Proses</button>
              </div>      
            </div>
          </div>
          </form>
      </div>
    </div>
</section>
@endsection