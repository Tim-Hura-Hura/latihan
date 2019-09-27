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

   
}
