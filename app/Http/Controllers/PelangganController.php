<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;
use Alert;
class PelangganController extends Controller
{

 


public function index()
	{

		$no_urut = DB::select( DB::raw("SELECT concat(nomor) AS no_urut from(select case  when nomor IS NULL THEN '1' ELSE  nomor end  AS nomor  from (SELECT MAX(id+1) as nomor FROM `pelanggan`) abc) bca"));		
		$data = DB::table('tempat_servis')->where('status','KOSONG')->get();
		return view('kasir/index',['data'=>$data],['no_urut'=>$no_urut]);
 	}



   
}
