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

    public function asal_tujuan()
    {
        $asal = DB::table('asal')->get();
        $tujuan = DB::table('tujuan')->get();        
        return view('backend.asal_tujuan', compact('asal', 'tujuan'));
    }

    public function tambah_asal()
    {
        $asal = DB::table('asal')->get();       
        return view('backend.tambah_asal', compact('asal'));
    }

    public function create_asal(Request $request)
    {
        $create_asal = DB::table('asal')
        ->insert([
            'kota_asal' => $request->input('kota_asal'),
            'nama_jalan' => $request->input('nama_jalan'),
        ]);
        //session()->flash('berhasil', "Berhasil Tambah Asal");
        return redirect('asal-tujuan');
    }

    public function edit_asal($id)
    {
        $asal = DB::table('asal')->where('kd_asal', $id)->get();
        return view('backend.edit_asal', compact('asal'));
    }

    public function update_asal(Request $request)
    {
        $asal = DB::table('asal')
        ->where('kd_asal', $request->id)
        ->update([
            'kota_asal' => $request->input('kota_asal'),
            'nama_jalan' => $request->input('nama_jalan'),
        ]);
        //session()->flash('berhasil', "Berhasil Update Asal");
        return redirect('asal-tujuan');
    }

    public function delete_asal($id)
    {
        $delete_asal = DB::table('asal')
        ->where('kd_asal', $id)
        ->delete();
        //session()->flash('berhasil', "Berhasil Hapus Asal");
        return redirect('asal-tujuan');
    }

    public function tambah_tujuan()
    {
        $tujuan = DB::table('tujuan')->get();       
        return view('backend.tambah_tujuan', compact('tujuan'));
    }

    public function create_tujuan(Request $request)
    {
        $create_tujuan = DB::table('tujuan')
        ->insert([
            'kota_tujuan' => $request->input('kota_tujuan'),
            'nama_jalan' => $request->input('nama_jalan'),
        ]);
        //session()->flash('berhasil', "Berhasil Tambah Tujuan");
        return redirect('asal-tujuan');
    }

    public function edit_tujuan($id)
    {
        $tujuan = DB::table('tujuan')->where('kd_tujuan', $id)->get();
        return view('backend.edit_tujuan', compact('tujuan'));
    }

    public function update_tujuan(Request $request)
    {
        $tujuan = DB::table('tujuan')
        ->where('kd_tujuan', $request->id)
        ->update([
            'kota_tujuan' => $request->input('kota_tujuan'),
            'nama_jalan' => $request->input('nama_jalan'),
        ]);
        //session()->flash('berhasil', "Berhasil Update Tujuan");
        return redirect('asal-tujuan');
    }

    public function delete_tujuan($id)
    {
        $delete_asal = DB::table('tujuan')
        ->where('kd_tujuan', $id)
        ->delete();
        //session()->flash('berhasil', "Berhasil Hapus Tujuan");
        return redirect('asal-tujuan');
    }

    public function mobil_travel()
    {
        $mobil = DB::table('mobil')->get();        
        return view('backend.mobil', compact('mobil'));
    }

    public function tambah_mobil()
    {
        $mobil = DB::table('mobil')->get();       
        return view('backend.tambah_mobil', compact('mobil'));
    }

    public function create_mobil(Request $request)
    {
        $create_mobil = DB::table('mobil')
        ->insert([
            'nama_mobil' => $request->input('nama_mobil'),
            'plat_mobil' => $request->input('plat_mobil'),
            'kapasitas_mobil' => $request->input('kapasitas_mobil'),
            'status' => $request->input('status'),
        ]);
        //session()->flash('berhasil', "Berhasil Tambah Tujuan");
        return redirect('mobil');
    }

    public function edit_mobil($id)
    {
        $mobil = DB::table('mobil')->where('kd_mobil', $id)->get();
        return view('backend.edit_mobil', compact('mobil'));
    }

    public function update_mobil(Request $request)
    {
        $mobil = DB::table('mobil')
        ->where('kd_mobil', $request->id)
        ->update([
            'nama_mobil' => $request->input('nama_mobil'),
            'plat_mobil' => $request->input('plat_mobil'),
            'kapasitas_mobil' => $request->input('kapasitas_mobil'),
            'status' => $request->input('status'),
        ]);
        //session()->flash('berhasil', "Berhasil Update Tujuan");
        return redirect('mobil');
    }

    public function delete_mobil($id)
    {
        $mobil = DB::table('mobil')
        ->where('kd_mobil', $id)
        ->delete();
        //session()->flash('berhasil', "Berhasil Hapus Tujuan");
        return redirect('mobil');
    }
}
