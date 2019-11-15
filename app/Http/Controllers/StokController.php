<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;
use Alert;
class StokController extends Controller
{

public function index()
	{


		$nama_barang = DB::select( DB::raw("SELECT * FROM barang"));
		$data = DB::select( DB::raw("SELECT * FROM stok"));
        $stok = DB::select( DB::raw("SELECT * FROM stok WHERE jumlah <=5"));
    $stok2 = DB::select( DB::raw("SELECT * FROM stok WHERE jumlah <=5"));

		return view ('gudang/stok',['data'=>$data,'nama_barang'=>$nama_barang,'stok'=>$stok,'stok2'=>$stok2]);   
 	}
 	public function admin_detail_kendaraan()
	{
		if(!Session::get('login'))
             {
            return redirect('login');
             }
			
		$data = DB::select( DB::raw("SELECT kendaraan.id,kendaraan.status,kendaraan.nopol,kendaraan.no_mesin,kendaraan.merek,kendaraan.id_tempat_servis,kendaraan.tipe,kendaraan.warna,kendaraan.keluhan,pelanggan.hp,pelanggan.nama FROM kendaraan INNER JOIN pelanggan ON kendaraan.id_pelanggan = pelanggan.id"));
		return view('admin/detail_kendaraan',['data'=>$data]);
 	}	

 	public function admin_detail_kendaraan_list($id)
	{
		if(!Session::get('login'))
             {
            return redirect('login');
             }
			
		$data = DB::select( DB::raw("SELECT kendaraan.id,kendaraan.status,kendaraan.nopol,kendaraan.no_mesin,kendaraan.id_tempat_servis,kendaraan.merek,kendaraan.tipe,kendaraan.warna,kendaraan.keluhan,pelanggan.nama FROM kendaraan INNER JOIN pelanggan ON kendaraan.id_pelanggan = pelanggan.id where kendaraan.id='$id'"));
		return view('admin/detail_kendaraan_list',['data'=>$data]);
 	}	
 	public function admin_stok()
    {
        if(!Session::get('login'))
             {
            return redirect('login');
             }
        $nama_barang = DB::select( DB::raw("SELECT * FROM barang"));
        $data = DB::select( DB::raw("SELECT * FROM stok"));
        return view ('admin/stok',['data'=>$data],['nama_barang'=>$nama_barang]);   
	}

	public function store(Request $request)
    {	

        
    
    	$nama_barang	= $request->nama_barang; 
    	$jumlah			= $request->jumlah;
    	$harga_beli		= $request->harga_beli;
    	$harga_jual		= $request->harga_jual;
    	$suplier		= $request->suplier;

        $messages = [
        'min' => 'Stok Dengan Nama Barang Yang Anda Masukan Sudah Teradaftar',
        'required' => ':attribute wajib diisi'
        ];

		
        $data = DB::table('stok')->where([['nama_barang',$nama_barang]])->get();

        if(count($data) > 0) {
            $this->validate($request,[
           'nama_barang' => 'min:10000'
                ],$messages);

          return redirect('gudang_stok');     
    
        }

        else {
    
        DB::table('stok')->insert(['nama_barang' => $nama_barang,'jumlah' => $jumlah,'harga_beli' => $harga_beli,'harga_jual' => $harga_jual,'suplier' => $suplier]);
        return redirect('gudang_stok')->with(['info' => 'Data Berhasil Ditambah']);      
        }


		
	}
	
	public function edit($id)
    {	
    	$nama_barang = DB::select( DB::raw("SELECT * FROM barang"));
		$data = DB::table('stok')->where('id',$id)->get();
		return view ('gudang/stok/edit',['data'=>$data],['nama_barang'=>$nama_barang]);   
    }
  
public function update(Request $request, $id)
    {
		
		$nama_barang	= $request->nama_barang; 
    	$jumlah			= $request->jumlah;
    	$harga_beli		= $request->harga_beli;
    	$harga_jual		= $request->harga_jual;
    	$suplier		= $request->suplier;

		
		DB::table('stok')->where('id',$id)->update(['nama_barang' => $nama_barang,'jumlah' => $jumlah,'harga_beli' => $harga_beli,'harga_jual' => $harga_jual,'suplier' => $suplier]);
		return redirect('gudang_stok')->with(['success' => 'Data Berhasil Dirubah']);   
    }

public function destroy($id)
    {
       	Alert::error('Data Berhasil Dihapus');
        DB::table('stok')->where('id',$id)->delete();
		return redirect('gudang_stok')->with(['error' => 'Data Berhasil Dihapus']);     
    }
}
