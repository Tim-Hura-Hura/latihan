<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;
use Alert;

class PegawaiController extends Controller
{

public function index()
	{
		if(!Session::get('login'))
             {
            return redirect('login');
             }
		$data = DB::table('pegawai')->get();
		return view ('admin/pegawai',['data'=>$data]);   
 	}

public function create()
    {
	//
    }

public function store(Request $request)
    {	
    	$nama			= $request->nama;
    	$password		= $request->password;
    	$status			= $request->status;

		
		DB::table('pegawai')->insert(['nama' => $nama,'password' => $password,'status' => $status]);
		return redirect('admin_pegawai')->with(['info' => 'Data Berhasil Ditambahkan']);   
	}


	
public function edit($id)
    {
        if(!Session::get('login'))
             {
            return redirect('login');
             }
		$data = DB::table('pegawai')->where('id',$id)->get();
		return view ('admin/pegawai/edit',['data'=>$data]);   
    }
  
public function update(Request $request, $id)
    {
		
		$nama			= $request->nama;
    	$password		= $request->password;
    	$status			= $request->status;
		
		DB::table('pegawai')->where('id',$id)->update(['nama' => $nama, 'status' => $status,'password' => $password]);
		return redirect('admin_pegawai')->with(['success' => 'Data Berhasil Dirubah']);  

    }

public function destroy($id)
    {
       	Alert::error('Data Berhasil Dihapus');
        DB::table('pegawai')->where('id',$id)->delete();
		return redirect('admin_pegawai')->with(['error' => 'Data Berhasil Dihapus']);    
    }

   
}
