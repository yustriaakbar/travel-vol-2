<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use File;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Rap2hpoutre\FastExcel\FastExcel;
use PDF;
use Illuminate\Support\Facades\Mail;

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
        $pending = DB::table('order')
                ->where('status_order', 1)
                ->count();
        $total = DB::table('tiket')
                ->count();
        $konfirmasi = DB::table('konfirmasi')
                ->count();
        return view('backend.dashboard', compact('pending', 'total', 'konfirmasi'));
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
        session()->flash('berhasil', "Berhasil Tambah Jadwal");
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
        session()->flash('berhasil', "Berhasil Update Jadwal");
        return redirect('jadwal');
    }

    public function delete_jdwl($id)
    {
        $delete_jadwal = DB::table('jadwal')
        ->where('kd_jadwal', $id)
        ->delete();
        session()->flash('berhasil', "Berhasil Hapus Jadwal");
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
        session()->flash('berhasil', "Berhasil Tambah Asal");
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
        session()->flash('berhasil', "Berhasil Update Asal");
        return redirect('asal-tujuan');
    }

    public function delete_asal($id)
    {
        $delete_asal = DB::table('asal')
        ->where('kd_asal', $id)
        ->delete();
        session()->flash('berhasil', "Berhasil Hapus Asal");
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
        session()->flash('berhasil', "Berhasil Tambah Tujuan");
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
        session()->flash('berhasil', "Berhasil Update Tujuan");
        return redirect('asal-tujuan');
    }

    public function delete_tujuan($id)
    {
        $delete_asal = DB::table('tujuan')
        ->where('kd_tujuan', $id)
        ->delete();
        session()->flash('berhasil', "Berhasil Hapus Tujuan");
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
        session()->flash('berhasil', "Berhasil Tambah Mobil");
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
        session()->flash('berhasil', "Berhasil Update Mobil");
        return redirect('mobil');
    }

    public function delete_mobil($id)
    {
        $mobil = DB::table('mobil')
        ->where('kd_mobil', $id)
        ->delete();
        session()->flash('berhasil', "Berhasil Hapus Mobil");
        return redirect('mobil');
    }

    public function bank()
    {
        $bank = DB::table('bank')->get();        
        return view('backend.bank', compact('bank'));
    }

    public function tambah_bank()
    {     
        return view('backend.tambah_bank');
    }

    public function create_bank(Request $request)
    {
        $file = $request->file('logo');
        $nama_file = time()."_".$file->getClientOriginalName();
        $tujuan_upload = 'frontend/img/bank';
        $file->move($tujuan_upload,$nama_file);
        $create_bank = DB::table('bank')
        ->insert([
            'nasabah_bank' => $request->input('an'),
            'nama_bank' => $request->input('nama'),
            'rekening_bank' => $request->input('rekening'),
            'photo' => $tujuan_upload . '/' . $nama_file,
        ]);
        session()->flash('berhasil', "Berhasil Tambah Rekening Bank");
        return redirect('daftarbank');
    }

    public function edit_bank($id)
    {
        $bank = DB::table('bank')->where('kd_bank', $id)->get();
        return view('backend.edit_bank', compact('bank'));
    }

    public function update_bank(Request $request)
    {
        $logo = DB::table('bank')
        ->where('kd_bank', $request->id)
        ->first();
        if ($request->hasFile('logo')) {
            File::delete(''.$logo->photo);
            $file = $request->file('logo');
            $nama_file = time()."_".$file->getClientOriginalName();
            $tujuan_upload = 'frontend/img/bank';
            $file->move($tujuan_upload,$nama_file);
            
            $bank = DB::table('bank')
            ->where('kd_bank', $request->id)
            ->update([
                'nasabah_bank' => $request->input('an'),
                'nama_bank' => $request->input('nama'),
                'rekening_bank' => $request->input('rekening'),
                'photo' => $tujuan_upload . '/' . $nama_file,
            ]);       
        }else{
            $bank = DB::table('bank')
            ->where('kd_bank', $request->id)
            ->update([
                'nasabah_bank' => $request->input('an'),
                'nama_bank' => $request->input('nama'),
                'rekening_bank' => $request->input('rekening'),
            ]);
        }        
        session()->flash('berhasil', "Berhasil Update Rekening Bank");
        return redirect('daftarbank');
    }

    public function delete_bank($id)
    {
        $logo = DB::table('bank')
        ->where('kd_bank', $id)
        ->first();
        File::delete(''.$logo->photo);        
        $bank = DB::table('bank')
        ->where('kd_bank', $id)
        ->delete();
        session()->flash('berhasil', "Berhasil Hapus Rekening Bank");
        return redirect('daftarbank');
    }

    public function list_order()
    {
        $order = DB::table('order as ord')
            ->join('jadwal as j', 'j.kd_jadwal', '=', 'ord.kd_jadwal')
            ->join('tujuan as t', 't.kd_tujuan', '=', 'j.kd_tujuan')
            ->select('ord.kd_order as kd_order', 'ord.kd_jadwal as kd_jadwal', 't.kota_tujuan as tujuan', 'ord.tgl_berangkat_order as tgl_berangkat_order', 'j.jam_berangkat as jam_berangkat', 'ord.nama_pemesan_tiket as nama_pemesan_tiket', 'ord.tgl_beli_order as tgl_beli_order', 'ord.status_order as status_order')
            ->selectRaw('count(kd_order) as tiket')
            ->groupBy('kd_order')
            ->get();
        //dd($order);        
        return view('backend.daftar_order', compact('order'));
    }

    public function view_order($id)
    {
        $order = DB::table('order')
            ->select('nama_penumpang', 'ktp_penumpang', 'no_kursi_penumpang')
            ->where('kd_order', $id)
            ->get();
        $order1 = DB::table('order as ord')
            ->join('jadwal as j', 'j.kd_jadwal', '=', 'ord.kd_jadwal')
            ->join('asal as a', 'a.kd_asal', '=', 'j.kd_asal')
            ->join('tujuan as t', 't.kd_tujuan', '=', 'j.kd_tujuan')
            ->join('users as u', 'u.id', '=', 'ord.id_user')
            ->select('ord.kd_order as kd_order', 'ord.kd_tiket as kd_tiket', 'ord.nama_pemesan_tiket as nama_pemesan', 't.kota_tujuan as tujuan', 'a.kota_asal as asal', 'ord.status_order as status', 'j.kd_jadwal as kd_jadwal', 'u.email as email')
            ->where('kd_order', $id)
            ->groupBy('kd_order')
            ->first();
        $total = DB::table('order as ord')
            ->join('jadwal as j', 'j.kd_jadwal', '=', 'ord.kd_jadwal')
            ->where('kd_order', $id)
            ->sum('j.harga');
        $konfirmasi = DB::table('konfirmasi')
            ->select('bukti_transfer')
            ->where('kd_order', $id)
            ->first();
        //dd($order1);        
        return view('backend.view_order', compact('order', 'order1', 'total', 'konfirmasi'));
    }

    public function update_order(Request $request)
    {
        $order = DB::table('order')
        ->where('kd_order', $request->kd_order)
        ->update([
            'status_order' => $request->input('status'),
        ]);
        $admin = Auth::user()->name;
        $data=$request->all();
        if ($request->status == 2){
            if(count($request->nama) > 0){
            foreach($request->nama as $item=>$v){
            $data2=array(
                'kd_order' => $request->input('kd_order'),
                'kd_tiket' => $request->input('kd_tiket'),
                'kd_jadwal' => $request->input('kd_jadwal'),
                'nama_tiket' => $request->nama[$item],
                'kursi_tiket' => $request->kursi[$item],
                'ktp_penumpang' => $request->ktp[$item],
                'harga_tiket' => $request->input('harga'),
                //'photo_tiket' => $request->input('photo'),
                'status_tiket' => $request->input('status'),
                'create_tgl_tiket' => Carbon::now(),
                'create_admin' => $admin,
            );
             DB::table('tiket')->insert($data2);
                }
            }
        }

        $tiket = DB::table('order as ord')
            ->join('jadwal as j', 'j.kd_jadwal', '=', 'ord.kd_jadwal')
            ->join('asal as a', 'a.kd_asal', '=', 'j.kd_asal')
            ->join('tujuan as t', 't.kd_tujuan', '=', 'j.kd_tujuan')
            ->join('mobil as m', 'm.kd_mobil', '=', 'j.kd_mobil')
            ->where('kd_tiket', $request->kd_tiket)
            ->where('status_order', 2)
            ->get();
        $pdf = PDF::loadView('frontend.etiket', compact('tiket'));
        $email = $request->email;

        // Kirim Email
        Mail::send('email_template', $data2, function($mail) use($email, $pdf) {
            $mail->to($email, 'no-reply')
                    ->subject("Tiket Travel")
                    ->attachData($pdf->output(), "tiket.pdf");
            $mail->from('lintastravel@gmail.com', 'Tiket Travel');
        });
        return redirect('daftarorder');
    }

    public function list_confirm()
    {
        $konfirmasi = DB::table('konfirmasi as konfirm')
            ->join('bank as b', 'b.kd_bank', '=', 'konfirm.nama_bank')
            ->get();
        //dd($order);        
        return view('backend.daftar_konfirmasi', compact('konfirmasi'));
    }

    public function list_pelanggan()
    {
        $pelanggan = DB::table('users')
            ->where('role', 'pelanggan')
            ->get();   
        return view('backend.daftar_pelanggan', compact('pelanggan'));
    }

    public function delete_pelanggan($id)
    {        
        DB::table('users')
        ->where('id', $id)
        ->delete();
        //session()->flash('berhasil', "Berhasil Hapus User Pelanggan");
        return redirect('pelanggan');
    }

    public function list_admin()
    {
        $admin = DB::table('users')
            ->where('role', 'admin')
            ->get();   
        return view('backend.daftar_admin', compact('admin'));
    }

    public function tambah_admin()
    {     
        return view('backend.tambah_admin');
    }

    public function create_admin(Request $request)
    {
        $validator = Validator::make(request()->all(), [
            'name'  => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);
        if ($validator->fails()) {
            return redirect('tambah-admin')
                ->withErrors($validator->errors());
        }
        $password = Hash::make($request->input('password'));
        DB::table('users')
        ->insert([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $password,
            'role' => $request->input('role'),
        ]);
        //session()->flash('berhasil', "Berhasil Tambah Admin");
        return redirect('admin');
    }

    public function view_jadwal($id)
    {
        $jadwal = DB::table('jadwal as jdw')
            ->join('tujuan as t', 't.kd_tujuan', '=', 'jdw.kd_tujuan')
            ->join('asal as a', 'a.kd_asal', '=', 'jdw.kd_asal')
            ->join('mobil as m', 'm.kd_mobil', '=', 'jdw.kd_mobil')
            ->where('kd_jadwal', $id)
            ->get();                
        return view('backend.view_jadwal', compact('jadwal'));
    }

    public function list_tiket()
    {
        $tiket = DB::table('tiket as tk')
            ->join('jadwal as j', 'j.kd_jadwal', '=', 'tk.kd_jadwal')
            ->join('tujuan as t', 't.kd_tujuan', '=', 'j.kd_tujuan')
            ->join('asal as a', 'a.kd_asal', '=', 'j.kd_asal')
            ->join('order as o', 'o.kd_order', '=', 'tk.kd_order')
            ->groupBy('o.kd_order')
            ->get();
               
        return view('backend.daftar_tiket', compact('tiket'));
    }

    public function cetak_admin($id)
    { 
        $tiket = DB::table('order as ord')
            ->join('jadwal as j', 'j.kd_jadwal', '=', 'ord.kd_jadwal')
            ->join('asal as a', 'a.kd_asal', '=', 'j.kd_asal')
            ->join('tujuan as t', 't.kd_tujuan', '=', 'j.kd_tujuan')
            ->join('mobil as m', 'm.kd_mobil', '=', 'j.kd_mobil')
            ->where('kd_tiket', $id)
            ->where('status_order', 2)
            ->get();
        //if info_tiket == null
        // return message "maaf tiket anda tidak ditemukan"
        $pdf = PDF::loadview('frontend.etiket', compact('tiket'))->setPaper('A4','potrait');
        return $pdf->stream();
        //return view('frontend.e_tiket', compact('tiket'));
    }

    public function manajemen_laporan()
    {
        $laporan = DB::table('tiket as tk')
            ->join('jadwal as j', 'j.kd_jadwal', '=', 'tk.kd_jadwal')
            ->join('tujuan as t', 't.kd_tujuan', '=', 'j.kd_tujuan')
            ->join('asal as a', 'a.kd_asal', '=', 'j.kd_asal')
            ->get();
        $tanggal_awal = new Carbon('first day of January 1970');
        $tanggal_akhir = Carbon::now();
        $kota_tujuan = "semua_tujuan";
        $tujuan = DB::table('tujuan')->get();   
        return view('backend.laporan', compact('laporan', 'tujuan', 'tanggal_awal', 'tanggal_akhir', 'kota_tujuan'));
    }

    public function manajemen_laporan_filter(Request $request)
    {
        $tujuan = DB::table('tujuan')->get();
        $tanggal_awal = $request->get('start_date');
        $tanggal_akhir = $request->get('end_date');
        $kota_tujuan = $request->get('tujuan');
        if ($tanggal_awal != null && $tanggal_akhir != null && $kota_tujuan != null) 
        {
            $laporan = DB::table('tiket as tk')
                ->join('jadwal as j', 'j.kd_jadwal', '=', 'tk.kd_jadwal')
                ->join('tujuan as t', 't.kd_tujuan', '=', 'j.kd_tujuan')
                ->join('asal as a', 'a.kd_asal', '=', 'j.kd_asal')
                ->whereBetween('tk.create_tgl_tiket', [$tanggal_awal, $tanggal_akhir])
                ->where('j.kd_tujuan', $kota_tujuan)
                ->get();           
        } 
        return view('backend.laporan', compact('laporan', 'tujuan', 'tanggal_awal', 'tanggal_akhir', 'kota_tujuan'));
    }

    public function download_laporan(Request $request)
    {
        $tanggal_awal = $request->get('start_date');
        $tanggal_akhir = $request->get('end_date');
        $kota_tujuan = $request->get('tujuan');
        if ($tanggal_awal != null && $tanggal_akhir != null && $kota_tujuan == "semua_tujuan") 
        {
            $laporan = DB::table('tiket as tk')
                ->join('jadwal as j', 'j.kd_jadwal', '=', 'tk.kd_jadwal')
                ->join('tujuan as t', 't.kd_tujuan', '=', 'j.kd_tujuan')
                ->join('asal as a', 'a.kd_asal', '=', 'j.kd_asal')
                ->whereBetween('tk.create_tgl_tiket', [$tanggal_awal, $tanggal_akhir])
                ->get();           
        }else if($tanggal_awal != null && $tanggal_akhir != null && $kota_tujuan != null)
        {
            $laporan = DB::table('tiket as tk')
                ->join('jadwal as j', 'j.kd_jadwal', '=', 'tk.kd_jadwal')
                ->join('tujuan as t', 't.kd_tujuan', '=', 'j.kd_tujuan')
                ->join('asal as a', 'a.kd_asal', '=', 'j.kd_asal')
                ->whereBetween('tk.create_tgl_tiket', [$tanggal_awal, $tanggal_akhir])
                ->where('j.kd_tujuan', $kota_tujuan)
                ->get();
        }

        return (new FastExcel($laporan))->download('DataLaporanTiketTravel.xlsx', function ($laporan){
            return [
                'Kode Order' => $laporan->kd_order,
                'Kode Tiket' => $laporan->kd_tiket,
                //'Nama Pemesan' => $laporan->nama_tiket,
                'Tanggal Konfirmasi Tiket' => $laporan->create_tgl_tiket,
                'Nama Penumpang' => $laporan->nama_tiket,
                'Identitas Penumpang' => $laporan->ktp_penumpang,
                'Nomor Kursi' => $laporan->kursi_tiket,
                'Asal' => $laporan->kota_asal,
                'Tujuan' => $laporan->kota_tujuan,
            ];
        });
    }

}
