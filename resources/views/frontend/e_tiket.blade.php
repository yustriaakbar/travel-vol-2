  <table width="100%">
    <tr>
        <td valign="top"><img src="{{ asset('frontend/img/qr_code.png') }}" alt="" width="200"/></td>
        <td align="right">
            <h1>E-TICKET</h1>
            <pre>
                <b><span style='font-size:15px'>Detail Pesanan </span></b>
                </br>
                Kode Order : {{ $info_tiket->kd_order }}</br>
                Kode Jadwal : {{ $info_tiket->kd_jadwal }}</br>
                Beli : {{ $info_tiket->tgl_beli_order }}</br>
                Nama Pemesan : {{ $info_tiket->nama_pemesan_tiket }}</br>
                Jadwal : {{\Carbon\Carbon::parse($info_tiket->tgl_berangkat_order)->isoFormat('dddd, D MMMM Y') }}<br>
                Jam Berangkat : pukul {{ $info_tiket->jam_berangkat }} WIB
                Berangkat Dari : {{ $info_tiket->kota_asal }} - {{ $info_tiket->nama_jalan }}</br>
                Tujuan Ke : {{ $info_tiket->kota_tujuan }}
            </pre>
        </td>
    </tr>
  </table>
  <br/>
  <table width="100%">
    <thead style="background-color: lightgray;">
      <tr>
        <th>Nomor Tiket</th>
        <th>Nama Penumpang</th>
        <th>Umur </th>
        <th>Nomor Kursi</th>
        <th>Harga</th>
      </tr>
    </thead>
    <tbody>
      @foreach($tiket as $tk => $value)
        <tr>
           <td scope="row">{{ $value->kd_tiket }}</td>
           <td align="left">{{ $value->nama_tiket }}</td>
           <td align="center">{{ $value->umur_tiket }}</td>
            <td align="center">{{ $value->kursi_tiket }}</td>
           <td align="left">{{ $value->harga_tiket }}</td>
        <tr>
      @endforeach
    </tbody>
    <tfoot>
        <tr>
            <td colspan="3"></td>
            <td align="right">Total Rp</td>
            <td align="right" class="gray">Rp. 100.000</td>
        </tr>
    </tfoot>
  </table>
  <div id="container">
    <h1>Syarat dan ketentuan</h1>

    <div id="body">
        <ol type="1">
          <li>Tiket XTRANS * HANYA agen tiket bus. Ini tidak mengoperasikan layanan bus
            itu sendiri. Untuk menyediakan pilihan operator bus yang komprehensif,
            waktu keberangkatan dan harga untuk pelanggan, telah terikat dengan banyak bus
            operator.
            Saran Tiket XTRANS kepada pelanggan adalah memilih operator bus yang mereka ketahui
            dari dan yang layanannya mereka merasa nyaman.</li>
          <li>Waktu keberangkatan yang disebutkan di tiket hanyalah waktu tentatif. Namun
            bus tidak akan meninggalkan sumber sebelum waktu yang disebutkan pada tiket.
            Penumpang diwajibkan untuk memberikan yang berikut pada saat naik bus:
             (1) Salinan tiket (Cetak tiket atau cetak email tiket).
             (2) Bukti identitas yang valid
            Gagal melakukannya, mereka mungkin tidak diizinkan naik bus.</li>
           <li>Tanggung jawab Tiket XTRANS meliputi:
            (1) Mengeluarkan tiket yang valid (tiket yang akan diterima oleh bus)
            operator) untuk jaringan operator busnya
            (2) Memberikan pengembalian dana dan dukungan jika terjadi pembatalan
            (3) Memberikan dukungan dan informasi pelanggan jika ada penundaan /
            kerepotan
            Ganti bus: Jika operator bus mengubah jenis bus karena beberapa
            alasannya, Tiket XTRANS akan mengembalikan jumlah diferensial kepada pelanggan setelah menjadi
            diintimidasi oleh pelanggan dalam 24 jam perjalanan.</li>
            <li> Kebijakan Pembatalan: Untuk SVR Tours & Travels: Antara 0 jam hingga 7 jam sebelumnya
        perjalanan, biaya pembatalan adalah 100,0%. Antara 7 jam hingga 8 jam sebelumnya
        perjalanan, biaya pembatalan adalah 50,0%. Dan, biaya pembatalan di atas adalah
        10,0%.</li>
        <li>Tanggung jawab Tiket XTRANS TIDAK termasuk:
        (1) Bus operator bus tidak berangkat / mencapai tepat waktu
        (2) Karyawan operator bus bersikap kasar
        (3) Kursi bus operator dll tidak sesuai dengan pelanggan
        harapan
        (4) Operator bus membatalkan perjalanan karena alasan yang tidak dapat dihindari
        (5) Bagasi pelanggan hilang / dicuri / rusak
        (6) Operator bus mengubah kursi pelanggan pada menit terakhir
        mengakomodasi seorang wanita / anak
         (7) Pelanggan menunggu di titik keberangkatan yang salah (harap hubungi
        operator bus untuk mengetahui titik boarding yang tepat jika Anda bukan penumpang reguler
        traveler di bus tertentu)
        (8) Operator bus mengubah titik boarding dan / atau menggunakan pick-up
        Jika seseorang membutuhkan pengembalian dana untuk dikreditkan kembali ke rekening banknya, silakan
        tulis rincian kupon tunai Anda ke support@Tiket XTRANS.in
        * Biaya pengiriman ke rumah (jika ada), tidak akan dikembalikan dalam hal tiket
        pembatalan</li>
        <li>Jika email konfirmasi pemesanan dan sms tertunda atau gagal karena
        alasan teknis atau sebagai akibat dari ID / nomor telepon email yang salah diberikan
        oleh pengguna dll, tiket akan dianggap 'dipesan' selama tiket tersebut menunjukkan
        kendaraan di titik boarding untuk membawa pelanggan ke keberangkatan bus
        titik
        di halaman konfirmasi</li>
        </ol>  
    </div>
</div>