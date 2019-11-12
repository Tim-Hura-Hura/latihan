<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;
use Alert;
class KendaraanController extends Controller
{

public function index()
	{
	
        $data = DB::select( DB::raw("SELECT * FROM kendaraan GROUP BY nopol ORDER by id asc"));

		return view('kasir/kendaraan/detail_kendaraan',['data'=>$data]);
 	}

  public function kasir_kendaraan_histori()
	{

		$data = DB::select( DB::raw("SELECT kendaraan.id,kendaraan.status,kendaraan.nopol,kendaraan.no_mesin,kendaraan.merek,kendaraan.id_tempat_servis,kendaraan.tipe,kendaraan.warna,kendaraan.keluhan,pelanggan.hp,pelanggan.nama FROM kendaraan INNER JOIN pelanggan ON kendaraan.id_pelanggan = pelanggan.id"));
		
		return view('kasir/kendaraan/detail_kendaraan2',['data'=>$data]);
 	}	

 public function detail($id)
    {	
    	$data = DB::select( DB::raw("SELECT kendaraan.id,kendaraan.status,kendaraan.nopol,kendaraan.no_mesin,kendaraan.id_tempat_servis,kendaraan.merek,kendaraan.tipe,kendaraan.warna,kendaraan.keluhan,pelanggan.nama FROM kendaraan INNER JOIN pelanggan ON kendaraan.id_pelanggan = pelanggan.id where kendaraan.id='$id'"));
		return view ('kasir/kendaraan/detail',['data'=>$data]);   
    }
    public function edit($id)
    {
		$data = DB::table('kendaraan')->where('id',$id)->get();
		return view ('kasir/kendaraan/edit',['data'=>$data]);   
    }

  
public function update(Request $request, $id)
    {
		
		$nopol			= $request->nopol;
		$no_mesin 		= $request->no_mesin;
		$merek 			= $request->merek;
		$tipe 			= $request->tipe;
		$warna			= $request->warna;
		$keluhan		= $request->keluhan;
		$status			= $request->status;
		
		DB::table('kendaraan')->where('id',$id)->update(['nopol' => $nopol, 'no_mesin' => $no_mesin,  'status' => $status,'merek' => $merek, 'tipe' => $tipe, 'warna' => $warna, 'keluhan' => $keluhan]);
		return redirect('kasir_kendaraan')->with(['success' => 'Data Berhasil Dirubah']);  
    }
    public function admin_detail_kendaraan()
	{
		if(!Session::get('login'))
             {
            return redirect('login');
             }
			
		$data = DB::select( DB::raw("SELECT kendaraan.id,kendaraan.status,kendaraan.nopol,kendaraan.no_mesin,kendaraan.merek,kendaraan.id_tempat_servis,kendaraan.tipe,kendaraan.warna,kendaraan.keluhan,pelanggan.hp,pelanggan.nama FROM kendaraan INNER JOIN pelanggan ON kendaraan.id_pelanggan = pelanggan.id"));
		return view('admin/detail_kendaraan',['data'=>$data]);
 	}	

 	public function admin_detail_kendaraan_list($id)
	{
		if(!Session::get('login'))
             {
            return redirect('login');
             }
			
		$data = DB::select( DB::raw("SELECT kendaraan.id,kendaraan.status,kendaraan.nopol,kendaraan.no_mesin,kendaraan.id_tempat_servis,kendaraan.merek,kendaraan.tipe,kendaraan.warna,kendaraan.keluhan,pelanggan.nama FROM kendaraan INNER JOIN pelanggan ON kendaraan.id_pelanggan = pelanggan.id where kendaraan.id='$id'"));
		return view('admin/detail_kendaraan_list',['data'=>$data]);
 	}	

 public function admin_detail_kendaraan()
	{
		if(!Session::get('login'))
             {
            return redirect('login');
             }
			
		$data = DB::select( DB::raw("SELECT kendaraan.id,kendaraan.status,kendaraan.nopol,kendaraan.no_mesin,kendaraan.merek,kendaraan.id_tempat_servis,kendaraan.tipe,kendaraan.warna,kendaraan.keluhan,pelanggan.hp,pelanggan.nama FROM kendaraan INNER JOIN pelanggan ON kendaraan.id_pelanggan = pelanggan.id"));
		return view('admin/detail_kendaraan',['data'=>$data]);
 	}

  	public function admin_detail_kendaraan_list($id)
	{
		if(!Session::get('login'))
             {
            return redirect('login');
             }
			
		$data = DB::select( DB::raw("SELECT kendaraan.id,kendaraan.status,kendaraan.nopol,kendaraan.no_mesin,kendaraan.id_tempat_servis,kendaraan.merek,kendaraan.tipe,kendaraan.warna,kendaraan.keluhan,pelanggan.nama FROM kendaraan INNER JOIN pelanggan ON kendaraan.id_pelanggan = pelanggan.id where kendaraan.id='$id'"));
		return view('admin/detail_kendaraan_list',['data'=>$data]);
 	}		

}