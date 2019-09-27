<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;
use Alert;
use PDF; 
class NotaController extends Controller
{

public function makePDF($id)
	{ 
		$data = DB::select( DB::raw("SELECT * FROM detail_penjualan where id_nota='".$id."'"));
		$data2 = 	DB::select( DB::raw("SELECT penjualan.*, kendaraan.* FROM penjualan  INNER JOIN kendaraan ON penjualan.nopol=kendaraan.nopol  where id_nota='".$id."' ORDER by kendaraan.id_pelanggan DESC LIMIT 1"));		
		$data3 = 	DB::select( DB::raw("SELECT * FROM penjualan where id_nota='".$id."'"));
		$data4 = 	DB::select( DB::raw("SELECT * FROM penjualan where id_nota='".$id."'"));		
		$tanggal = 	DB::select( DB::raw("SELECT * FROM penjualan where id_nota='".$id."'"));	

	 
		$pdf = PDF::loadView('kasir.nota', ['data'=>$data,'tanggal'=>$tanggal,'data2'=>$data2,'data3'=>$data3,'data4'=>$data4]);
		$pdf->setPaper([0, 0, 685.98, 396.85], 'landscape');
		return $pdf->download('nota.pdf');
	}

public function pending($id)
	{ 	
		
		$data = 	DB::select( DB::raw("SELECT * FROM penjualan where id_nota='".$id."'"));
		$tanggal = 	DB::select( DB::raw("SELECT * FROM penjualan where id_nota='".$id."'"));	
		$data2 = 	DB::select( DB::raw("SELECT * FROM penjualan where id_nota='".$id."'"));
		$data3 = 	DB::select( DB::raw("SELECT penjualan.*, kendaraan.* FROM penjualan  INNER JOIN kendaraan ON penjualan.nopol=kendaraan.nopol  where id_nota='".$id."'  ORDER by kendaraan.id_pelanggan DESC LIMIT 1"));		

		$pdf = PDF::loadView('kasir.pending', ['data'=>$data,'tanggal'=>$tanggal,'data2'=>$data2,'data3'=>$data3]);
		$pdf->setPaper([0, 0, 685.98, 396.85], 'landscape');
		return $pdf->download('pending.pdf');
	}

	public function nota_pembelian($id)
		{ 
		$data = DB::select( DB::raw("SELECT * FROM detail_pembelian where id_nota='".$id."'"));
		$data2 = 	DB::select( DB::raw("SELECT * FROM pembelian where id_nota='".$id."'"));	
		$data3 = 	DB::select( DB::raw("SELECT * FROM pembelian where id_nota='".$id."'"));	
		$tanggal = 	DB::select( DB::raw("SELECT * FROM pembelian where id_nota='".$id."'"));	

	
		$pdf = PDF::loadView('gudang.nota', ['data'=>$data,'tanggal'=>$tanggal,'data2'=>$data2,'data3'=>$data3]);
		$pdf->setPaper([0, 0, 685.98, 396.85], 'landscape');
		return $pdf->download('nota_pembelian.pdf');
	}


   
}
