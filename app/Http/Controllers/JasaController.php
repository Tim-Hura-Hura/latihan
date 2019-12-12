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

	public function edit($id_jasa)
    {
    	if(!Session::get('login'))
             {
            return redirect('login');
             }
		$data = DB::table('jasa')->where('id_jasa',$id_jasa)->get();
		return view ('kasir/jasa/edit',['data'=>$data]);   
    }
  
public function update(Request $request, $id_jasa)
    {
		
		$jenis_jasa	= $request->jenis_jasa;
		$harga 		= $request->harga;

		
		DB::table('jasa')->where('id_jasa',$id_jasa)->update(['jenis_jasa' => $jenis_jasa, 'harga' => $harga]);
		return redirect('kasir_jasa')->with(['success' => 'Data Berhasil Dirubah']);  
	}
	
	public function destroy($id_jasa)
    {
       	Alert::error('Data Berhasil Dihapus');
        DB::table('jasa')->where('id_jasa',$id_jasa)->delete();
		return redirect('kasir_jasa')->with(['error' => 'Data Berhasil Dihapus']);  
    }

    public function admin_jasa()
	{
		if(!Session::get('login'))
             {
            return redirect('login');
             }
		$data = DB::table('jasa')->get();
		return view ('admin/jasa',['data'=>$data]);   
 	}
}
