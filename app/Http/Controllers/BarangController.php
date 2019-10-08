<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;
use Alert;
class BarangController extends Controller
{

public function index()
	{
		$data = DB::table('barang')->get();
    $stok = DB::select( DB::raw("SELECT * FROM stok WHERE jumlah <=5"));
    $stok2 = DB::select( DB::raw("SELECT * FROM stok WHERE jumlah <=5"));
		return view ('gudang/barang',['data'=>$data,'stok'=>$stok,'stok2'=>$stok2]);   
 	}


   
}
