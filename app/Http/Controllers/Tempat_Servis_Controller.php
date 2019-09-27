<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;
use Alert;


class Tempat_Servis_Controller extends Controller
{

public function index()
	{
		
		$data = DB::table('tempat_servis')->get();
		return view ('kasir/tempat_servis',['data'=>$data]);   
 	}


   
}
