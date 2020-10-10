<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class BackendController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        return view('backend.dashboard');
    }
        
    public function jadwal()
    {
        $jadwal = DB::table('jadwal as jdw')
            ->join('tujuan as t', 't.kd_tujuan', '=', 'jdw.kd_tujuan')
            ->join('asal as a', 'a.kd_asal', '=', 'jdw.kd_asal')
            ->select('jdw.kd_tujuan as kd_tujuan', 't.kota_tujuan as kota_tujuan', 'jdw.kd_asal as kd_asal', 'a.kota_asal as kota_asal', 'a.nama_jalan as jalan_asal', 'jdw.kd_jadwal as kd_jadwal', 'jdw.jam_berangkat as kd_tujuan', 'jdw.kd_tujuan as kd_tujuan', 'jdw.jam_berangkat as berangkat', 'jdw.jam_tiba as tiba', 'jdw.harga as harga')
            ->get();     	
        return view('backend.jadwal', compact('jadwal'));
    }
}
