<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Alert;

class PenjualanController extends Controller {

     public function kasir_detail()
    {

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
        return view ('kasir/detail',['data'=>$data,'pemasukan'=>$pemasukan,'pengeluaran'=>$pengeluaran,'hasil'=>$hasil,'pemasukan2'=>$pemasukan2,'pengeluaran2'=>$pengeluaran2,'tgl1'=>$tgl1,'tgl2'=>$tgl2]);  
    }

    
}
