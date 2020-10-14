<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $hari = date('l', strtotime($date ));
        $tanggal = date('d-m-Y', strtotime($date ));
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

        return view('frontend.cek-jadwal', ['jadwal' => $postsInRange, 'jadwal' => $postsInRange1,], compact('tanggal', 'hari'));
    }

    public function cektiket()
    {
        return view('frontend.cek-tiket');
    }        

    public function before_order(Request $request)
    {

        $date = $request->get('tanggal');
        $hari = date('l', strtotime($date ));
        $tanggal = date('d-m-Y', strtotime($date ));
        $jadwal = DB::table('jadwal as jdw')
            ->join('tujuan as t', 't.kd_tujuan', '=', 'jdw.kd_tujuan')
            ->join('asal as a', 'a.kd_asal', '=', 'jdw.kd_asal')
            ->join('mobil as m', 'm.kd_mobil', '=', 'jdw.kd_mobil')
            ->where('kd_jadwal', $request->jadwal)
            ->get();       
        return view('frontend.beli_step1', compact('tanggal', 'hari', 'jadwal'));
    }

    public function after_order(Request $request)
    { 
        if (Auth::user()){
        $bank = DB::table('bank')->get();
        return view('frontend.beli_step2', compact('bank'));
        }else{
        return view('auth.login');
        }
    }    
}
