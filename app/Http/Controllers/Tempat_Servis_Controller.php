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
		if(!Session::get('login'))
             {
            return redirect('login');
             }
		$data = DB::table('tempat_servis')->get();
		return view ('kasir/tempat_servis',['data'=>$data]);   
 	}

public function create()
    {
	//
    }

public function store(Request $request)
    {	
    //
	}

public function admin_tempat_servis()
	{
		
        if(!Session::get('login'))
             {
            return redirect('login');
             }  
		$data = DB::table('tempat_servis')->get();
		return view ('admin/tempat_servis',['data'=>$data]);   
 	}

	
public function edit($id)
    {
    	if(!Session::get('login'))
             {
            return redirect('login');
             }
		$data = DB::table('tempat_servis')->where('id',$id)->get();
		return view ('kasir/tempat servis/edit',['data'=>$data]);   
    }
  
public function update(Request $request, $id)
    {
		
		$status	= $request->status;

		
		DB::table('tempat_servis')->where('id',$id)->update(['status' => $status]);
		return redirect('kasir_tempat_servis')->with(['success' => 'Data Berhasil Dirubah']); 	
    }

public function destroy($id_jasa)
    {
       	//  
    }

   
}
