<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;
use Alert;
class LaporanPenjualanController extends Controller
{

public function index()
	{
		if(!Session::get('login'))
             {
            return redirect('login');
             }
		$data = DB::select( DB::raw("SELECT * from penjualan order by tgl_masuk desc")); 
        $pemasukan = DB::select( DB::raw("SELECT sum(total_harga)as pemasukan FROM penjualan"));
        $pengeluaran = DB::select( DB::raw("SELECT sum(total_harga)as pengeluaran FROM pembelian"));
        $tgl_pemasukan = DB::select( DB::raw("SELECT '2019-05-01' as tgl_masuk"));
        $tgl_pengeluaran = DB::select( DB::raw("SELECT CURDATE() AS tgl_keluar"));

        $laba1=DB::select(DB::raw("SELECT SUM(detail_penjualan.harga_jual*detail_penjualan.`jumlah`)AS pemasukan FROM detail_penjualan INNER JOIN penjualan ON detail_penjualan.`id_nota` = penjualan.`id_nota`  WHERE tgl_masuk BETWEEN '2017-00-01' AND CURDATE();
        "));

        $laba2=DB::select(DB::raw("SELECT SUM(detail_penjualan.harga_beli*detail_penjualan.`jumlah`)AS pemasukan FROM detail_penjualan INNER JOIN penjualan ON detail_penjualan.`id_nota` = penjualan.`id_nota`  WHERE tgl_masuk BETWEEN '2019-00-01' AND CURDATE();
        "));


        $pemasukan2 = "";
        $pemasukan4 = "";
        $pengeluaran2 = "";
        $tgl1 = "";
        $tgl2 = "";
        $laba11 = "";
        $laba22 = "";

        foreach ($pemasukan as $key1) {
            $pemasukan2 = $key1->pemasukan;
        };
        foreach ($pengeluaran as $key2) {
            $pengeluaran2 = $key2->pengeluaran;
        };

        foreach ($tgl_pemasukan as $key3) {
            $tgl1 = $key3->tgl_masuk;
        };
        foreach ($tgl_pengeluaran as $key4) {
            $tgl2 = $key4->tgl_keluar;
        };
         
        foreach ($laba1 as $key5) {
            $laba11 = $key5->pemasukan;
        };
        foreach ($laba2 as $key6) {
            $laba22 = $key6->pemasukan;
        };
        

        $hasil = $laba11-$laba22;
		return view ('admin/laporan_penjualan',['data'=>$data,'pemasukan'=>$pemasukan,'pengeluaran'=>$pengeluaran,'hasil'=>$hasil,'pemasukan2'=>$pemasukan2,'pengeluaran2'=>$pengeluaran2,'tgl1'=>$tgl1,'tgl2'=>$tgl2]); 
 	}

public function create()
    {
	//
    }


public function admin_laporan_penjualan_sort(Request $request)
 {
 	if(!Session::get('login'))
             {
            return redirect('login');
             }
	    $tanggal1 = $request->tanggal1;
        $tanggal2 = $request->tanggal2;

        
        $pemasukan = DB::select( DB::raw("SELECT sum(total_harga)as pemasukan FROM penjualan where tgl_masuk between '$tanggal1' and '$tanggal2'"));

        $pemasukan3 = DB::select( DB::raw("SELECT SUM(total_harga)AS pemasukan FROM penjualan WHERE tgl_keluar BETWEEN '$tanggal1' and '$tanggal2'"));

        $pengeluaran = DB::select( DB::raw("SELECT sum(total_harga)as pengeluaran FROM pembelian where tgl_masuk between '$tanggal1' and '$tanggal2'"));
        
        $data = DB::select( DB::raw("SELECT * from penjualan where tgl_masuk between '$tanggal1' and '$tanggal2' order by tgl_masuk ASC"));

        $laba1=DB::select(DB::raw("SELECT SUM(detail_penjualan.harga_jual*detail_penjualan.`jumlah`)AS pemasukan FROM detail_penjualan INNER JOIN penjualan ON detail_penjualan.`id_nota` = penjualan.`id_nota`  WHERE tgl_masuk between '$tanggal1' and '$tanggal2';
        "));

        $laba2=DB::select(DB::raw("SELECT SUM(detail_penjualan.harga_beli*detail_penjualan.`jumlah`)AS pemasukan FROM detail_penjualan INNER JOIN penjualan ON detail_penjualan.`id_nota` = penjualan.`id_nota`  WHERE tgl_masuk between '$tanggal1' and '$tanggal2';
        "));

        $pemasukan2 = "";
        $pemasukan4 = "";
        $pengeluaran2 = "";
        $laba11 = "";
        $laba22 = "";
        
        $tgl1 = $tanggal1;
        $tgl2 = $tanggal2;

        foreach ($pemasukan as $key1) {
            $pemasukan2 = $key1->pemasukan;
        };
        foreach ($pemasukan3 as $key3) {
            $pemasukan4 = $key3->pemasukan;
        };
        foreach ($pengeluaran as $key2) {
            $pengeluaran2 = $key2->pengeluaran;
        };

        foreach ($laba1 as $key5) {
            $laba11 = $key5->pemasukan;
        };
        foreach ($laba2 as $key6) {
            $laba22 = $key6->pemasukan;
        };
        

        $hasil = $laba11-$laba22;


		return view ('admin/laporan_penjualan',['data'=>$data,'pemasukan'=>$pemasukan,'pengeluaran'=>$pengeluaran,'hasil'=>$hasil,'pemasukan2'=>$pemasukan2,'pengeluaran2'=>$pengeluaran2,'tgl1'=>$tgl1,'tgl2'=>$tgl2]); 
 }

public function edit($id_nota)
    {
        if(!Session::get('login'))
             {
            return redirect('login');
             }
		$data = DB::select( DB::raw("SELECT * from detail_penjualan where id_nota ='$id_nota'"));
        $data2 = DB::select( DB::raw("SELECT total_harga from penjualan where id_nota ='$id_nota'"));   
		return view ('admin/penjualan/detail',['data'=>$data,'data2'=>$data2]); 

	}
  
public function admin_penjualan_detail_list($id_nota)
    {
        if(!Session::get('login'))
             {
            return redirect('login');
             }
        $data = DB::select( DB::raw("SELECT * from detail_penjualan where id_nota ='$id_nota'"));
        $data2 = DB::select( DB::raw("SELECT total_harga from penjualan where id_nota ='$id_nota'"));
        $data3 = DB::select( DB::raw("SELECT id_nota from penjualan where id_nota ='$id_nota'"));

         
        // dd($laba);
        return view ('admin/penjualan/detail',['data'=>$data,'data2'=>$data2,'data3'=>$data3]);     
    }

   
}
