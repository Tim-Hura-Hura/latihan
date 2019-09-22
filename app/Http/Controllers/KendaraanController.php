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

   
}
