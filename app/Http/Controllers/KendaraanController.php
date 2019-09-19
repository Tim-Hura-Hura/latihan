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
		if(!Session::get('login'))
             {
            return redirect('login');
             }
	
        $data = DB::select( DB::raw("SELECT * FROM kendaraan GROUP BY nopol ORDER by id asc"));

		return view('kasir/kendaraan/detail_kendaraan',['data'=>$data]);
 	}

 	

   
}
