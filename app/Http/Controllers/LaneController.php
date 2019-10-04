<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;
use Alert;
class LaneController extends Controller
{

public function index()
	{
		
		$data = DB::select( DB::raw("SELECT kendaraan.id,kendaraan.status,kendaraan.nopol,kendaraan.no_mesin,kendaraan.merek,kendaraan.id_tempat_servis,kendaraan.tipe,kendaraan.warna,kendaraan.keluhan,pelanggan.hp,pelanggan.nama FROM kendaraan INNER JOIN pelanggan ON kendaraan.id_pelanggan = pelanggan.id where status != 'SELESAI SERVIS' ORDER BY id_tempat_servis ASC"));
		$data2 = DB::select( DB::raw("SELECT kendaraan.id,kendaraan.status,kendaraan.nopol,kendaraan.no_mesin,kendaraan.merek,kendaraan.id_tempat_servis,kendaraan.tipe,kendaraan.warna,kendaraan.keluhan,pelanggan.hp,pelanggan.nama FROM kendaraan INNER JOIN pelanggan ON kendaraan.id_pelanggan = pelanggan.id where status != 'SELESAI SERVIS' ORDER BY id_tempat_servis ASC"));
		return view('kasir/lane',['data'=>$data,'data2'=>$data2]);
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


   
}
