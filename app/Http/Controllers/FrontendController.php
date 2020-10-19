<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Carbon\Carbon;

class FrontendController extends Controller
{
    public function index()
    {
        return view('frontend.beranda');
    }

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

    public function cekjadwal(Request $request)
    {
        $date = $request->get('tanggal');
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

        return view('frontend.cek-jadwal', ['jadwal' => $postsInRange, 'jadwal' => $postsInRange1,], compact('date'));
    }

    public function cektiket()
    {
        return view('frontend.cek-tiket');
    }        

    public function before_order(Request $request)
    {
        if (Auth::user()){
        $date = $request->get('tanggal');
        $jadwal = DB::table('jadwal as jdw')
            ->join('tujuan as t', 't.kd_tujuan', '=', 'jdw.kd_tujuan')
            ->join('asal as a', 'a.kd_asal', '=', 'jdw.kd_asal')
            ->join('mobil as m', 'm.kd_mobil', '=', 'jdw.kd_mobil')
            ->where('kd_jadwal', $request->jadwal)
            ->get();       
        return view('frontend.beli_step1', compact('date', 'jadwal'));
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
        $order = DB::table('order')
        ->insert([
            'kd_order' => $random1,
            'kd_tiket' => $random2,
            'kd_jadwal' => $request->input('kd_jadwal'),
            'id_user' => $request->input('user'),
            'kd_bank' => $request->input('bank'),
            'nama_pemesan_tiket' => $request->input('nama_pemesan'),
            'tgl_beli_order' => $request->input('tgl_beli'),
            'tgl_berangkat_order' => $request->input('tgl'),
            'nama_penumpang' => $request->input('nama'),
            'umur_penumpang' => $request->input('umur'),
            'no_kursi_penumpang' => $request->input('kursi'),
            'no_ktp_order' => $request->input('no_ktp'),
            'no_tlp_order' => $request->input('hp'),
            'alamat_order' => $request->input('alamat'),
            'expired_order' => $request->input('expired'),
            'status_order' => '1',          
        ]);        
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
            ->join('bank as b', 'b.kd_bank', '=', 'ord.kd_bank')
            ->where('kd_order', $id)
            ->where('id_user', $id_user)
            ->get();
        //$today = Carbon::now()->isoFormat('dddd, D MMMM Y');
        return view('frontend.pembayaran', compact('order'));
        }else{
        return view('auth.login');
        }
    }

    public function confirm(Request $request)
    { 
        if (Auth::user()){
        $id = Auth::id();
        $user = DB::table('users')
        ->where('id', $id)->get();
        $bank = DB::table('bank')->get();
        $kursi = $request->get('kursi');
        //dd($request->all());
        return view('frontend.konfirmasi', compact('bank', 'user', 'kursi'));
        }else{
        return view('auth.login');
        }
    }

    public function tiket()
    { 
        if (Auth::user()){
        $id_user = Auth::id();
        $order = DB::table('order as ord')
            ->join('jadwal as j', 'j.kd_jadwal', '=', 'ord.kd_jadwal')
            ->leftjoin('tujuan as t', 't.kd_tujuan', '=', 'ord.kd_jadwal')
            ->leftjoin('asal as a', 'a.kd_asal', '=', 'ord.kd_jadwal')
            ->where('id_user', $id_user)
            ->get();
        return view('frontend.tiketmu', compact('order'));
        }else{
        return view('auth.login');
        }
    }

    public function cetak(Request $request)
    { 
        if (Auth::user()){
        //dd($request->all());
        return view('frontend.e_tiket');
        }else{
        return view('auth.login');
        }
    }    

}
