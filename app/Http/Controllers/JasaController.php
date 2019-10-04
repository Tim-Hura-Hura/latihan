<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;
use Alert;
class JasaController extends Controller
{

public function index()
	{

		$data = DB::table('jasa')->get();
		return view ('kasir/jasa',['data'=>$data]);   
 	}

	 public function store(Request $request)
    {	
    	$jenis_jasa		= $request->jenis_jasa;
    	$harga 			= $request->harga;

		$messages = [
    	'min' => 'Jenis Jasa Yang Anda Masukan Sudah Teradaftar',
    	'required' => ':attribute wajib diisi'
		];


    	$data = DB::table('jasa')->where([['jenis_jasa',$jenis_jasa]])->get();

    	if(count($data) > 0) {
    		$this->validate($request,[
           'jenis_jasa' => 'min:10000'
                ],$messages);

		return redirect('kasir_jasa'); 	
	
		}

		else {
	
		DB::table('jasa')->insert(['jenis_jasa' => $jenis_jasa,'harga' => $harga]);
		return redirect('kasir_jasa')->with(['info' => 'Data Berhasil Ditambahkan']); 	
		}


		 
	}
}
