<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;
use Alert;
class StokController extends Controller
{

public function index()
	{


		$nama_barang = DB::select( DB::raw("SELECT * FROM barang"));
		$data = DB::select( DB::raw("SELECT * FROM stok"));
        $stok = DB::select( DB::raw("SELECT * FROM stok WHERE jumlah <=5"));
    $stok2 = DB::select( DB::raw("SELECT * FROM stok WHERE jumlah <=5"));

		return view ('gudang/stok',['data'=>$data,'nama_barang'=>$nama_barang,'stok'=>$stok,'stok2'=>$stok2]);   
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

/*	public function admin_detail_kendaraan()
	{

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
   */
}
