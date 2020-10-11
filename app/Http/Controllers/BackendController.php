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

    public function tambah_jdwl()
    {
        $tujuan = DB::table('tujuan')->get();
        $asal = DB::table('asal')->get();
        $mobil = DB::table('mobil')->get();       
        return view('backend.tambah_jadwal', compact('asal', 'tujuan','mobil'));
    }

    public function create_jdwl(Request $request)
    {
        $create_jdw = DB::table('jadwal')
        ->insert([
            'kd_mobil' => $request->input('kd_mobil'),
            'kd_asal' => $request->input('kd_asal'),
            'kd_tujuan' => $request->input('kd_tujuan'),
            'jam_berangkat' => $request->input('jam_berangkat'),
            'jam_tiba' => $request->input('jam_tiba'),
            'harga' => $request->input('harga'),
        ]);
        //session()->flash('berhasil', "Berhasil Tambah Jadwal");
        return redirect('jadwal');
    }

    public function edit_jdwl($id)
    {
        $jadwal = DB::table('jadwal')->where('kd_jadwal', $id)->get();
        $mobil = DB::table('mobil')->get();
        $tujuan = DB::table('tujuan')->get();
        $asal = DB::table('asal')->get();
        return view('backend.edit_jadwal', compact('jadwal','mobil', 'tujuan', 'asal'));
    }

    public function update_jdwl(Request $request)
    {
        $jadwal = DB::table('jadwal')
        ->where('kd_jadwal', $request->id)
        ->update([
            'kd_mobil' => $request->input('kd_mobil'),
            'kd_asal' => $request->input('kd_asal'),
            'kd_tujuan' => $request->input('kd_tujuan'),
            'jam_berangkat' => $request->input('jam_berangkat'),
            'jam_tiba' => $request->input('jam_tiba'),
            'harga' => $request->input('harga'),
        ]);
        //dd($request->all());
        //session()->flash('berhasil', "Berhasil Update Jadwal");
        return redirect('jadwal');
    }

    public function delete_jdwl($id)
    {
        $delete_jadwal = DB::table('jadwal')
        ->where('kd_jadwal', $id)
        ->delete();
        //session()->flash('berhasil', "Berhasil Hapus Jadwal");
        return redirect('jadwal');
    }

}
