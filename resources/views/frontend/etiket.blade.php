<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>e-Ticket</title>
<style type="text/css">
  
body{
  margin: 0;
  padding: 0;
  background: #fff;
}

.ticket{
  width: 620px;
  height: 320px;
  background: #FFB300;
  border-radius: 3px;
  box-shadow: 0 0 100px #aaa;
  border-top: 1px solid #E89F3D;
  border-bottom: 1px solid #E89F3D;
  margin-bottom: 20px;
}

.ticket:after{
  content: '';
  position: absolute;
  right: 200px;
  top: 0px;
  width: 2px;
  height: 250px;
  box-shadow: inset 0 0 0 #FFB300,
    inset 0 -10px 0 #B56E0A,
    inset 0 -20px 0 #FFB300,
    inset 0 -30px 0 #B56E0A,
    inset 0 -40px 0 #FFB300,
    inset 0 -50px 0 #999999,
    inset 0 -60px 0 #E5E5E5,
    inset 0 -70px 0 #999999,
    inset 0 -80px 0 #E5E5E5,
    inset 0 -90px 0 #999999,
    inset 0 -100px 0 #E5E5E5,
    inset 0 -110px 0 #999999,
    inset 0 -120px 0 #E5E5E5,
    inset 0 -130px 0 #999999,
    inset 0 -140px 0 #E5E5E5,
    inset 0 -150px 0 #B0B0B0,
    inset 0 -160px 0 #EEEEEE,
    inset 0 -170px 0 #B0B0B0,
    inset 0 -180px 0 #EEEEEE,
    inset 0 -190px 0 #B0B0B0,
    inset 0 -200px 0 #EEEEEE,
    inset 0 -210px 0 #B0B0B0,
    inset 0 -220px 0 #FFB300,
    inset 0 -230px 0 #B56E0A,
    inset 0 -240px 0 #FFB300,
    inset 0 -250px 0 #B56E0A;
}

.ticket:before{
  content: '';
  position: absolute;
  z-index: 5;
  right: 199px;
  top: 0px;
  width: 1px;
  height: 250px;
  box-shadow: inset 0 0 0 #FFB300,
    inset 0 -10px 0 #F4D483,
    inset 0 -20px 0 #FFB300,
    inset 0 -30px 0 #F4D483,
    inset 0 -40px 0 #FFB300,
    inset 0 -50px 0 #FFFFFF,
    inset 0 -60px 0 #E5E5E5,
    inset 0 -70px 0 #FFFFFF,
    inset 0 -80px 0 #E5E5E5,
    inset 0 -90px 0 #FFFFFF,
    inset 0 -100px 0 #E5E5E5,
    inset 0 -110px 0 #FFFFFF,
    inset 0 -120px 0 #E5E5E5,
    inset 0 -130px 0 #FFFFFF,
    inset 0 -140px 0 #E5E5E5,
    inset 0 -150px 0 #FFFFFF,
    inset 0 -160px 0 #EEEEEE,
    inset 0 -170px 0 #FFFFFF,
    inset 0 -180px 0 #EEEEEE,
    inset 0 -190px 0 #FFFFFF,
    inset 0 -200px 0 #EEEEEE,
    inset 0 -210px 0 #FFFFFF,
    inset 0 -220px 0 #FFB300,
    inset 0 -230px 0 #F4D483,
    inset 0 -240px 0 #FFB300,
    inset 0 -250px 0 #F4D483;
}

.content{
  position: absolute;
  top: 40px;
  width: 100%;
  height: 170px;
  background: #eee;
}

.airline{
  position: absolute;
  left: 250px;
  font-family: Arial;
  font-size: 20px;
  font-weight: bold;
  color: rgba(0,0,102,1);
}

.boarding{
  position: absolute;
  top: 10px;
  right: 220px;
  font-family: Arial;
  font-size: 18px;
  color: rgba(255,255,255,0.6);
}

.jfk{
  position: absolute;
  top: 10px;
  left: 20px;
  font-family: Arial;
  font-size: 30px;
  color: #222;
}

.sfo{
  position: absolute;
  top: 10px;
  left: 180px;
  font-family: Arial;
  font-size: 38px;
  color: #222;
}

.plane{
  position: absolute;
  left: 105px;
  top: 0px;
}

.sub-content{
  background: #e5e5e5;
  width: 100%;
  height: 130px;
  position: absolute;
  top: 110px;
}

.watermark{
  position: absolute;
  left: 5px;
  top: -10px;
  font-family: Arial;
  font-size: 110px;
  font-weight: bold;
  color: rgba(255,255,255,0.2);
}

.name{
  position: absolute;
  top: 10px;
  left: 10px;
  font-family: Arial Narrow, Arial;
  font-weight: bold;
  font-size: 14px;
  color: #999;
}

.name span{
  color: #555;
  font-size: 17px;
}

.flight{
  position: absolute;
  top: 10px;
  left: 180px;
  font-family: Arial Narrow, Arial;
  font-weight: bold;
  font-size: 14px;
  color: #999;
}

.flight span{
  color: #555;
  font-size: 17px;
}

.gate{
  position: absolute;
  top: 10px;
  left: 280px;
  font-family: Arial Narrow, Arial;
  font-weight: bold;
  font-size: 14px;
  color: #999;
}

.gate span{
  color: #555;
  font-size: 17px;
}


.seat{
  position: absolute;
  top: 10px;
  left: 315px;
  font-family: Arial Narrow, Arial;
  font-weight: bold;
  font-size: 14px;
  color: #999;
}

.seat span{
  color: #555;
  font-size: 17px;
}

.boardingtime{
  position: absolute;
  top: 60px;
  left: 10px;
  font-family: Arial Narrow, Arial;
  font-weight: bold;
  font-size: 14px;
  color: #999;
}

.boardingtime span{
  color: #555;
  font-size: 17px;
}

.slip{
  left: 455px;
}

.nameslip{
  top: 60px;
  left: 180px;
}

.flightslip{
  left: 380px;
}

.seatslip{
  left: 510px;
}

.jfkslip{
  font-size: 30px;
  top: 5px;
  left: 410px;
}

.sfoslip{
  font-size: 30px;
  top: 20px;
  left: 530px;
}

.planeslip{
  top: 10px;
  left: 475px;
}

.airlineslip{
  left: 455px;
}  

</style>
</head>
<body>
  
@foreach($tiket as $t => $value)
  <div class="ticket">
    <span class="airline">e-Ticket Travel</span>
    <div class="content">
      <span class="jfk">{{ $value->kota_asal }} - {{ $value->kota_tujuan }}</span>
      <span class="plane"></span>
      <span class="sfo"></span>

      <span class="jfk jfkslip"><img src="{{ public_path('frontend/img/code.png') }}" width="100"></span>
      
      <div class="sub-content">
        <span class="watermark">Developer</span>
        <span class="name">NAMA PENUMPANG<br><span>{{ $value->nama_penumpang }}</span></span>
        <span class="flight">KODE BOOKING<br><span>{{ $value->kd_order }}</span></span>
        
        <span class="seat">KURSI<br><span>{{ $value->no_kursi_penumpang }}</span></span>
        <span class="boardingtime">NOMOR IDENTITAS<br><span>{{ $value->ktp_penumpang }}</span></span>
            
         <span class="flight flightslip">MOBIL TRAVEL<br><span>{{ $value->nama_mobil }}</span></span>
          <span class="seat seatslip">PLAT<br><span>{{ $value->plat_mobil }}</span></span>
         <span class="name nameslip">JAM BERANGKAT<br><span>{{\Carbon\Carbon::parse($value->tgl_berangkat_order)->isoFormat('dddd, D MMMM Y') }} pukul {{ $value->jam_berangkat }} WIB</span></span>
      </div>
    </div>
  </div>
@endforeach

</body>
</html>