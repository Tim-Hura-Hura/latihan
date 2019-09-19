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
		if(!Session::get('login'))
             {
            return redirect('login');
             }
		$data = DB::table('jasa')->get();
		return view ('kasir/jasa',['data'=>$data]);   
 	}

}