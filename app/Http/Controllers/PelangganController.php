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
		$merek = DB::table('merek')->get();
		$tipe = DB::table('tipe_kendaraan')->get();
		$warna = DB::table('warna')->get();
      

		$validasi = DB::select("SELECT *,COUNT(id)as total FROM `tempat_servis` WHERE STATUS = 'KOSONG'");

		foreach ($validasi as $value) {
            $cek = $value->total;
        }
  		
  		    if ($cek>=1) {
           	   $cek='';
           	}else{
           		$cek='disabled';
           	};
	return view('kasir/index',['data'=>$data,'merek'=>$merek,'cek'=>$cek,'no_urut'=>$no_urut,'tipe'=>$tipe,'warna'=>$warna]);
 	}

 public function ajaxGenerateDataMerek($id){
        //
        $data = DB::select("SELECT * FROM tipe_kendaraan WHERE merek = '$id'");
        $response = ['data' => $data];

        return json_encode($response);


	}
 public function ajaxGenerateDataTipe($id){
        //
        $data = DB::select("SELECT * FROM tipe_kendaraan WHERE tipe = '$id'");
        $response = ['data' => $data];

        return json_encode($response);


	}  	   	

public function ajaxGenerateDataNopol($id){
        //
        $data = DB::select("SELECT k.*,p.nama,p.alamat,p.hp FROM `kendaraan` k inner join pelanggan p on p.id = k.id_pelanggan where k.nopol =:nopol ORDER by k.id desc LIMIT 1", ['nopol' => $id]);
        $response = ['data' => $data];
        return json_encode($response);
    }




public function detail_pelanggan()
	{
		$data = DB::table('pelanggan')->get();
		return view('kasir/pelanggan/detail_pelanggan',['data'=>$data]);
	}

	public function store(Request $request)
    {	
    	$messages = [
    	'min' => 'Nopol Yang Anda Masukan Sudah Sidang Dilakukan Proses Servis',
    	'required' => ':attribute wajib diisi'
		];

  	  	$id 			= $request->id;
  	  	$tempat_servis 	= $request->tempat_servis;
		$nopol1			= $request->nopol1;
		$nopol2			= $request->nopol2;
		$nopol3			= $request->nopol3;
		$nopol			= $request->nopol1." ".$nopol2." ".$nopol3;
		$no_mesin 		= $request->no_mesin;
		$merek 			= $request->merek;
		$tipe 			= $request->tipe;
		$warna			= $request->warna;
		$keluhan		= $request->keluhan;
		$nama 			= $request->nama;
		$hp 			= $request->hp;
		$alamat 		= $request->alamat;
		
		$data = DB::select( DB::raw("SELECT * from kendaraan where nopol='$nopol1 $nopol2 $nopol3'"));
		// $data = DB::table('kendaraan')->where([['nopol',$nopol1 $nopol2 $nopol3]])->get();


			$this->validate($request,[
           'nopol1' => 'required',
           'nopol2' => 'required',
           'nopol3' => 'required',
           'merek' => 'required',
           'keluhan' => 'required',
           'nama' => 'required'
                ],$messages);
		

		$cek = DB::select( DB::raw("SELECT * FROM kendaraan WHERE STATUS !='SELESAI SERVIS' AND nopol='$nopol'"));
	
		if(count($cek) > 0) {
    		$this->validate($request,[
           'nopol' => 'min:10000'
                ],$messages);

          return redirect('kasir_pelanggan')->with(['error' => 'Nopol Yang Anda Masukan Masih Dalam Proses Servis']); 	
	
		}
		else {

		DB::table('kendaraan')->insert(['id_pelanggan' => $id,'nopol' => $nopol, 'no_mesin' => $no_mesin, 'merek' => $merek, 'tipe' => $tipe, 'warna' => $warna, 'keluhan' => $keluhan,'id_tempat_servis' => $tempat_servis]);
		DB::table('pelanggan')->insert(['id' => $id,'nama' => $nama, 'hp' => $hp, 'alamat' => $alamat]);
		DB::table('tempat_servis')->where('id',$tempat_servis)->update(['status' => 'SEDANG DIGUNAKAN']);

		return redirect('kasir_pelanggan')->with(['info' => 'Data Berhasil Ditambahkan']);		
		}		
	}

public function edit($id)
    {
		$data = DB::table('pelanggan')->where('id',$id)->get();
		return view ('kasir/pelanggan/edit',['data'=>$data]);   
    }
  
public function update(Request $request, $id)
    {
		
		$nama 			= $request->nama;
		$hp 			= $request->hp;
		$alamat 		= $request->alamat;
		
		DB::table('pelanggan')->where('id',$id)->update(['nama' => $nama, 'hp' => $hp, 'alamat' => $alamat]);
		return redirect('kasir_detail_pelanggan')->with(['success' => 'Data Berhasil Dirubah']);		
    }

    public function admin_detail_pelanggan()
	{
		if(!Session::get('login'))
             {
         return redirect('login');
             }
		$data = DB::table('pelanggan')->get();
		return view('admin/index',['data'=>$data]);
 	}	

}
