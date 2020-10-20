@extends('layouts.admin')
@section('judul','View Order')
@section('content')
    <div class="container-fluid">
      <!-- Page Heading -->
      <h1 class="h3 mb-4 text-gray-800">View Order</h1>
      <!-- Basic Card Example -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">KODE Order  </h6>
        </div>
        <div class="card-body">
          <form action="" method="post" enctype="multipart/form-data">
             
            <div class="card-body">
              <div class="row">
                
                <input type="hidden" class="form-control" name="kd_pelanggan" value="" readonly>
                <input type="hidden" class="form-control" name="kd_order" value="" readonly>
                <input type="hidden" class="form-control" name="asal_beli" value="" readonly>
                <input type="hidden" class="form-control" name="kd_tiket[]" value="" readonly>
                <div class="col-sm-6">
                  <label >Kode Tiket <b>TORD00001J0004TJ002201904254</b></label>
                  <p>Nama Pemesan <b>Yustria Akbar</b></p>
                  <hr>
                  <div class="row form-group">
                    <label for="nama" class="col-sm-4 control-label">Kode Jadwal</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="kd_jadwal" value="" readonly>
                    </div>
                  </div>
                  <div class="row form-group">
                    <label for="nama" class="col-sm-4 control-label">Nama Penumpang</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="nama[]" value="" readonly>
                    </div>
                  </div>
                  <div class="row form-group">
                    <label for="" class="col-sm-4 control-label">Nomor Kursi</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="no_kursi[]" value="" readonly>
                    </div>
                  </div>
                  <div class="row form-group">
                    <label for="" class="col-sm-4 control-label">Umur Penumpang</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="umur_kursi[]>" value=" Tahun" readonly>
                    </div>
                  </div>
                  <div class="row form-group">
                    <label for="" class="col-sm-4 control-label">Harga Tiket</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="harga" value="" readonly>
                    </div>
                  </div>
                  <div class="row form-group">
                    <label for="" class="col-sm-4 control-label">Batas Pembayaran</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="tgl_beli" value="" readonly>
                    </div>
                  </div>
                  <div class="row form-group">
                    <label for="" class="col-sm-4 control-label">Cek Konfirmasi Pembayaran</label>
                    <div class="col-sm-8">
                      <a href="" class="btn btn-primary">Lihat</a>
                    </div>
                  </div>
                </div>
                

                <div class="col-sm-6">
                  <label >Kode Tiket <b>TORD00001J0004TJ002201904254</b></label>
                  <p>Nama Penumpang <b>Bahyu Sanciko</b></p>
                  <hr>
                  <div class="row form-group">
                    <label for="nama" class="col-sm-4 control-label">Kode Jadwal</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="kd_jadwal" value="J0004" readonly>
                    </div>
                  </div>
                  <div class="row form-group">
                    <label for="nama" class="col-sm-4 control-label">Kode Jadwal</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="kd_jadwal" value="J0004" readonly>
                    </div>
                  </div>
                  <div class="row form-group">
                    <label for="nama" class="col-sm-4 control-label">Kode Jadwal</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="kd_jadwal" value="J0004" readonly>
                    </div>
                  </div>
                  <div class="row form-group">
                    <label for="nama" class="col-sm-4 control-label">Kode Jadwal</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="kd_jadwal" value="J0004" readonly>
                    </div>
                  </div>
                  <div class="row form-group">
                    <label for="nama" class="col-sm-4 control-label">Kode Jadwal</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="kd_jadwal" value="J0004" readonly>
                    </div>
                  </div>
                  <div class="row form-group">
                    <label for="" class="col-sm-4 control-label">Status</label>
                    <div class="col-sm-8">
                       
                      <select class="form-control" name="status" required>
                          <option value='' selected disabled>Belum Bayar</option>
                          <option value='2'>Sudah Bayar</option>
                          <option value='3'>Hapus Order</option>
                           </select>
                        <!--  
                            <p class="btn "><b class="btn btn-default">Sudah Bayar</b> <a href="" class="btn btn-danger">Refund Tiket</a></p> -->

                        
                     
                    </div>
                  </div>

                  <div class="row form-group">
                    <label for="" class="col-sm-4 control-label">Total Pembayaran</label>
                    <div class="col-sm-8">
                      <p><b></b></p>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              <hr><a class="btn btn-secondary" href=""> Kembali</a>
              &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" class="btn btn-info">Proses</button>
            <!--
              <a class="btn btn-success" href=""> Cetak Eticket</a>
              <a class="btn btn-success" href=""> Kirim Eticket</a>
             -->           
            </div>
            </form>
          </div>
      </div>
    </div>

@endsection