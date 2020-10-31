<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>E-Tiket</title>
<style type="text/css">
    * {
        font-family: Verdana, Arial, sans-serif;
    }
    table{
        font-size: x-small;
    }
    .gray {
        background-color: lightgray
    }

    ::selection { background-color: #E13300; color: white; }
    ::-moz-selection { background-color: #E13300; color: white; }

    body {
        background-color: #fff;
        margin: 40px;
        font: 13px/20px normal Helvetica, Arial, sans-serif;
        color: #4F5155;
    }

    a {
        color: #003399;
        background-color: transparent;
        font-weight: normal;
    }

    h1 {
        color: #444;
        background-color: transparent;
        border-bottom: 1px solid #D0D0D0;
        font-size: 19px;
        font-weight: normal;
        margin: 0 0 14px 0;
        padding: 14px 15px 10px 15px;
    }

    code {
        font-family: Consolas, Monaco, Courier New, Courier, monospace;
        font-size: 12px;
        background-color: #f9f9f9;
        border: 1px solid #D0D0D0;
        color: #002166;
        display: block;
        margin: 14px 0 14px 0;
        padding: 12px 10px 12px 10px;
    }

    #body {
        margin: 0 15px 0 15px;
    }

    p.footer {
        text-align: right;
        font-size: 11px;
        border-top: 1px solid #D0D0D0;
        line-height: 32px;
        padding: 0 10px 0 10px;
        margin: 20px 0 0 0;
    }

    #container {
        margin: 10px;
        border: 1px solid #D0D0D0;
        box-shadow: 0 0 8px #D0D0D0;
    }
    
    img{float:left;padding-right:10px;}
</style>
</head>
<body>
 <table width="100%">
    <tr>
        <td valign="top"><img src="{{ public_path('frontend/img/qr_code.png') }}" alt="" width="200"/></td>
        <td align="right">
            <h1>E-TICKET</h1>
            <pre>
                <b><span style='font-size:15px'>Detail Pesanan </span></b>
                </br>
                Kode Order : {{ $info_tiket->kd_order }}</br>
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
  </table>
  <br>
  <div id="container">
    <h1>Syarat dan ketentuan</h1>

    <div id="body">
        <ol type="1">
          <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
          tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
          quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
          consequat.</li>
          <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
          tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
          quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
          consequat.</li>
           <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
           tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
           quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
           consequat.</li>
            <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
           tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
           quis nostrud exercitation ullamco laboris nisi ut aliquip.</li>
        </ol>  
    </div>
</div>
</body>
</html>