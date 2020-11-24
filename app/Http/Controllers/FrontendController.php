<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Carbon\Carbon;
use PDF;
use Illuminate\Support\Facades\Redirect;

class FrontendController extends Controller
{
    public function index()
    {
        $jadwal = DB::table('jadwal as jdw')
            ->join('tujuan as t', 't.kd_tujuan', '=', 'jdw.kd_tujuan')
            ->join('asal as a', 'a.kd_asal', '=', 'jdw.kd_asal')
            ->select('jdw.kd_tujuan as kd_tujuan', 't.kota_tujuan as kota_tujuan', 'jdw.kd_asal as kd_asal', 'a.kota_asal as kota_asal', 'a.nama_jalan as jalan_asal')
            ->get();
        $asal = DB::table('asal')->get(); 
        return view('frontend.beranda', compact('jadwal', 'asal'));
    }
/*
    public function cektanggal()
    {
        $jadwal = DB::table('jadwal as jdw')
            ->join('tujuan as t', 't.kd_tujuan', '=', 'jdw.kd_tujuan')
            ->join('asal as a', 'a.kd_asal', '=', 'jdw.kd_asal')
            ->select('jdw.kd_tujuan as kd_tujuan', 't.kota_tujuan as kota_tujuan', 'jdw.kd_asal as kd_asal', 'a.kota_asal as kota_asal', 'a.nama_jalan as jalan_asal')
            ->get();
        $asal = DB::table('asal')->get();           
        return view('frontend.cek-tanggal', compact('jadwal', 'asal'));
    }
*/
    public function cekjadwal(Request $request)
    {
        $date = $request->get('tanggal');
        $today = Carbon::now();
        $postsInRange = $request->has('asal')
        ? DB::table('jadwal')
        ->where('kd_asal', $request->asal)->get()
        : [];
        $postsInRange1 = $request->has('tujuan')
        ? DB::table('jadwal as jdw')
        ->join('tujuan as t', 't.kd_tujuan', '=', 'jdw.kd_tujuan')
        ->join('asal as a', 'a.kd_asal', '=', 'jdw.kd_asal')
        ->join('mobil as m', 'm.kd_mobil', '=', 'jdw.kd_mobil')
        ->where('t.kd_tujuan', $request->tujuan)->get()
        : [];
        $kursi1 = DB::table('order as ord')//kursi yang sudah di order
            ->join('jadwal as j', 'j.kd_jadwal', '=', 'ord.kd_jadwal')
            ->where('tgl_berangkat_order', $date)
            ->where('kd_tujuan', $request->get('tujuan'))
            ->where('kd_asal', $request->get('asal'))
            ->where('expired_order', '>=', $today)
            ->count();
        $kursi2 = DB::table('jadwal as jdw')//kapasitas mobil travel
            ->join('tujuan as t', 't.kd_tujuan', '=', 'jdw.kd_tujuan')
            ->join('asal as a', 'a.kd_asal', '=', 'jdw.kd_asal')
            ->join('mobil as m', 'm.kd_mobil', '=', 'jdw.kd_mobil')
            ->where('t.kd_tujuan', $request->tujuan)
            ->sum('kapasitas_mobil');
        $kursi_tersedia = $kursi2 - $kursi1;// kursi yang tersedia
        
        return view('frontend.cek-jadwal', ['jadwal' => $postsInRange, 'jadwal' => $postsInRange1,], compact('date', 'kursi_tersedia'));
    }

    public function cektiket()
    {
        return view('frontend.cek-tiket');
    }        

    public function before_order(Request $request)
    {
        if (Auth::user()){
        $date = $request->get('tanggal');
        $today = Carbon::now();
        $jadwal = DB::table('jadwal as jdw')
            ->join('tujuan as t', 't.kd_tujuan', '=', 'jdw.kd_tujuan')
            ->join('asal as a', 'a.kd_asal', '=', 'jdw.kd_asal')
            ->join('mobil as m', 'm.kd_mobil', '=', 'jdw.kd_mobil')
            ->where('kd_jadwal', $request->jadwal)
            ->get();
        $kursi = DB::table('order as ord')
            ->join('jadwal as j', 'j.kd_jadwal', '=', 'ord.kd_jadwal')
            ->select('no_kursi_penumpang')
            ->where('ord.kd_jadwal', $request->get('jadwal'))
            ->where('ord.tgl_berangkat_order', $date)
            ->where('ord.expired_order', '>=', $today)
            ->pluck('no_kursi_penumpang')
            ->toArray();
               
        return view('frontend.beli_step1', compact('date', 'jadwal', 'kursi'));
        }else{
        return view('auth.login');
        }        
    }

    public function after_order(Request $request)
    { 
        if (Auth::user()){
        $date = $request->get('tanggal');
        $jadwal = DB::table('jadwal')
            ->where('kd_jadwal', $request->jadwal)
            ->get();        
        $id = Auth::id();
        $user = DB::table('users')
        ->where('id', $id)->get();
        $bank = DB::table('bank')->get();
        $kursi = $request->get('kursi');
        //dd($request->all());
        return view('frontend.beli_step2', compact('bank', 'user', 'kursi', 'jadwal', 'date'));
        }else{
        return view('auth.login');
        }
    }

    public function order(Request $request)
    { 
        if (Auth::user()){
        $id = Auth::id();
        $user = DB::table('users')
        ->where('id', $id)->get();
        $random1 = Str::random(6);
        $random2 = Str::random(6);
        $data=$request->all();
      
        if(count($request->nama) > 0)
        {
        foreach($request->nama as $item=>$v){
            $data2=array(
            'kd_order' => $random1,
            'kd_tiket' => $random2,
            'kd_jadwal' => $request->input('kd_jadwal'),
            'id_user' => $request->input('user'),
            'kd_bank' => $request->input('bank'),
            'nama_pemesan_tiket' => $request->input('nama_pemesan'),
            'tgl_beli_order' => $request->input('tgl_beli'),
            'tgl_berangkat_order' => $request->input('tgl'),
                'nama_penumpang'=>$request->nama[$item],
                'ktp_penumpang'=>$request->ktp[$item],
                'no_kursi_penumpang'=>$request->kursi[$item],
            'expired_order' => $request->input('expired'),
            'status_order' => '1',
            );
           
        DB::table('order')->insert($data2);
            }
        }
        //dd($request->all());
        return redirect('payment/'.$random1);
        }else{
        return view('auth.login');
        }
    }    

    public function pay($id)
    { 
        if (Auth::user()){
        $id_user = Auth::id();
        $order = DB::table('order as ord')
            ->join('jadwal as j', 'j.kd_jadwal', '=', 'ord.kd_jadwal')
            ->leftjoin('mobil as m', 'm.kd_mobil', '=', 'ord.kd_jadwal')
            ->where('kd_order', $id)
            ->where('id_user', $id_user)
            ->get();
        $order1 = DB::table('order as ord')
            ->join('bank as b', 'b.kd_bank', '=', 'ord.kd_bank')
            ->where('kd_order', $id)
            ->where('id_user', $id_user)
            ->first();
        $total = DB::table('order as ord')
            ->join('jadwal as j', 'j.kd_jadwal', '=', 'ord.kd_jadwal')
            ->where('kd_order', $id)
            ->where('id_user', $id_user)
            ->sum('j.harga');

        //$today = Carbon::now()->isoFormat('dddd, D MMMM Y');
        $today = Carbon::now();
        return view('frontend.pembayaran', compact('order', 'order1', 'total', 'today'));
        }else{
        return view('auth.login');
        }
    }

    public function confirm($id)
    { 
        if (Auth::user()){
        $id_user = Auth::id();
        $total = DB::table('order as ord')
            ->join('jadwal as j', 'j.kd_jadwal', '=', 'ord.kd_jadwal')
            ->where('kd_order', $id)
            ->where('id_user', $id_user)
            ->sum('j.harga');
        $order = DB::table('order')
            ->where('kd_order', $id)
            ->where('id_user', $id_user)
            ->first();
        $bank = DB::table('bank')->get();
            if($order->status_order == '3'){
                session()->flash('gagal', "Anda sudah konfirmasi pembayaran");
                return Redirect::back();
            }
        //dd($request->all());
        return view('frontend.konfirmasi', compact('total', 'order', 'bank'));
        }else{
        return view('auth.login');
        }
    }

    public function create_cfrm(Request $request)
    {
        $file = $request->file('photo');
        $nama_file = time()."_".$file->getClientOriginalName();
        $tujuan_upload = 'frontend/img/bukti_transfer';
        $file->move($tujuan_upload,$nama_file);
        
        DB::table('konfirmasi')
        ->insert([
            'kd_order' => $request->input('kd_order'),
            'nama_pengirim' => $request->input('nama'),
            'nama_bank' => $request->input('nama_bank'),
            'rekening' => $request->input('rek'),
            'total' => $request->input('total'),
            'bukti_transfer' => $tujuan_upload . '/' . $nama_file,
        ]);
        
        DB::table('order')
        ->where('kd_order', $request->kd_order)
        ->update([
            'status_order' => '3',
        ]);
        //session()->flash('berhasil', "Berhasil Tambah Rekening Bank");
        return redirect('order');
    }

    public function tiket()
    { 
        if (Auth::user()){
        $id_user = Auth::id();
        $order = DB::table('order as ord')
            ->join('jadwal as j', 'j.kd_jadwal', '=', 'ord.kd_jadwal')
            ->join('asal as a', 'a.kd_asal', '=', 'j.kd_asal')
            ->join('tujuan as t', 't.kd_tujuan', '=', 'j.kd_tujuan')
            ->select('ord.kd_order as kd_order', 'ord.kd_tiket as kd_tiket', 'ord.kd_jadwal as kd_jadwal', 't.kota_tujuan as tujuan', 'a.kota_asal as asal','ord.tgl_berangkat_order as tgl_berangkat_order', 'j.jam_berangkat as jam_berangkat', 'ord.nama_pemesan_tiket as nama_pemesan_tiket', 'ord.tgl_beli_order as tgl_beli_order', 'ord.status_order as status_order')
            ->selectRaw('count(kd_order) as tiket')
            ->where('id_user', $id_user)
            ->groupBy('kd_order')
            ->get();
        $cek_data = DB::table('order')
            ->where('id_user', $id_user)
            ->first();

        return view('frontend.tiketmu', compact('order', 'cek_data'));
        }else{
        return view('auth.login');
        }
    }

    public function cetak($id)
    { 
        if (Auth::user()){
        $id_user = Auth::id();
        $tiket = DB::table('order as ord')
            ->join('jadwal as j', 'j.kd_jadwal', '=', 'ord.kd_jadwal')
            ->join('asal as a', 'a.kd_asal', '=', 'j.kd_asal')
            ->join('tujuan as t', 't.kd_tujuan', '=', 'j.kd_tujuan')
            ->where('kd_tiket', $id)
            ->where('id_user', $id_user)
            ->where('status_order', 2)
            ->get();
        
        //if info_tiket == null
        // return message "maaf tiket anda tidak ditemukan"
        return view('frontend.e_tiket', compact('tiket'));
        }else{
        return view('auth.login');
        }
    }

    public function profil()
    {
        if (Auth::user()){
        $id_user = Auth::id();
        $user = DB::table('users')
            ->where('id', $id_user)
            ->get();

        return view('frontend.profile', compact('user'));
        }else{
        return view('auth.login');
        }
    }
/*
    public function change_password()
    {
        if (Auth::user()){
        $id_user = Auth::id();
        $user = DB::table('users')
            ->where('id', $id_user)
            ->get();
            
        return view('frontend.ganti_password', compact('user'));
        }else{
        return view('auth.login');
        }
    }

    public function change_account()
    {
        if (Auth::user()){
        $id_user = Auth::id();
        $user = DB::table('users')
            ->where('id', $id_user)
            ->get();
        return view('frontend.edit_profile', compact('user'));
        }else{
        return view('auth.login');
        }
    }
*/
    public function updateprofile(Request $request)
    {
        if (Auth::user()){
        $id_user = Auth::id();
        $user = DB::table('users')
            ->where('id', $id_user)
            ->get();
       
        if ($request->hasFile('photo')) {
            
            $file = $request->file('photo');
            $nama_file = time()."_".$file->getClientOriginalName();
            $tujuan_upload = 'frontend/img/profile';
            $file->move($tujuan_upload,$nama_file);
            
            DB::table('users')
            ->where('id', $id_user)
            ->update([
                'no_ktp' => $request->input('no_ktp'),
                'name' => $request->input('nama'),
                'email' => $request->input('email'),
                'tlp' => $request->input('no_hp'),
                'alamat' => $request->input('alamat'),                
                'img' => $tujuan_upload . '/' . $nama_file,
            ]);       
        }else{
            DB::table('users')
            ->where('id', $id_user)
            ->update([
                'no_ktp' => $request->input('no_ktp'),
                'name' => $request->input('nama'),
                'email' => $request->input('email'),
                'tlp' => $request->input('no_hp'),
                'alamat' => $request->input('alamat'), 
            ]);
        }
        return redirect('profile');
        }else{
        return view('auth.login');
        }
    } 

}
