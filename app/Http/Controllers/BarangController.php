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

 public function store(Request $request)
    {	
    	$messages = [
    	'min' => 'Nama Barang Yang Anda Masukan Sudah Teradaftar',
    	'required' => ':attribute wajib diisi'
		];


    	$nama_barang	= $request->nama_barang;
    	$jumlah			= $request->jumlah;
    	$harga_beli		= $request->harga_beli;
    	$harga_jual		= $request->harga_jual;
    	$suplier		= $request->suplier;

		
    	$data = DB::table('barang')->where([['nama_barang',$nama_barang]])->get();

    	if(count($data) > 0) {
    		$this->validate($request,[
           'nama_barang' => 'min:10000'
                ],$messages);

          return redirect('gudang_barang'); 	
	
		}

		else {
		
		DB::table('barang')->insert(['nama_barang' => $nama_barang]);
		DB::table('stok')->insert(['nama_barang' => $nama_barang,'jumlah' => $jumlah,'harga_beli' => $harga_beli,'harga_jual' => $harga_jual,'suplier' => $suplier]);
		return redirect('gudang_barang')->with(['info' => 'Data Berhasil Ditambah']); 	
		}

	}



   
}
