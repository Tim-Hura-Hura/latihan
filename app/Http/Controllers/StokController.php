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



   
}
