<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;
use Alert;

class HistoriController extends Controller
{

public function gudang_histori_pembelian()
	{
        if(!Session::get('login'))
             {
            return redirect('login');
             }
		
		$data = DB::select( DB::raw("SELECT detail_pembelian.nama_barang,detail_pembelian.jumlah,pembelian.tgl_masuk FROM detail_pembelian INNER JOIN pembelian ON detail_pembelian.id_nota = pembelian.id_nota ORDER by tgl_masuk asc"));
		return view ('gudang/histori_pembelian',['data'=>$data]);   
 	}

public function gudang_histori_pembelian_sort(Request $request)
    {
        if(!Session::get('login'))
             {
            return redirect('login');
             }

        $tanggal1 = $request->tanggal1;
        $tanggal2 = $request->tanggal2;
        $data = DB::select( DB::raw("SELECT detail_pembelian.nama_barang,detail_pembelian.jumlah,pembelian.tgl_masuk FROM detail_pembelian INNER JOIN pembelian ON detail_pembelian.id_nota = pembelian.id_nota where tgl_masuk between '$tanggal1' and '$tanggal2' order by tgl_masuk ASC"));
        return view ('gudang/histori_pembelian',['data'=>$data]);   
    }
public function gudang_histori_penjualan()
    {
        if(!Session::get('login'))
             {
            return redirect('login');
             }
       
        $data = DB::select( DB::raw("SELECT detail_penjualan.nama_barang_jasa,detail_penjualan.jumlah,penjualan.tgl_masuk,barang.nama_barang FROM detail_penjualan INNER JOIN penjualan ON detail_penjualan.id_nota = penjualan.id_nota INNER JOIN barang on detail_penjualan.nama_barang_jasa = barang.nama_barang ORDER by tgl_masuk asc"));
        return view ('gudang/histori_penjualan',['data'=>$data]);   
    }

public function gudang_histori_penjualan_sort(Request $request)
    {
        if(!Session::get('login'))
             {
            return redirect('login');
             }

        $tanggal1 = $request->tanggal1;
        $tanggal2 = $request->tanggal2;
        $data = DB::select( DB::raw("SELECT detail_penjualan.nama_barang_jasa,detail_penjualan.jumlah,penjualan.tgl_masuk,barang.nama_barang FROM detail_penjualan INNER JOIN penjualan ON detail_penjualan.id_nota = penjualan.id_nota INNER JOIN barang on detail_penjualan.nama_barang_jasa = barang.nama_barang where tgl_masuk between '$tanggal1' and '$tanggal2' order by tgl_masuk ASC"));
        return view ('gudang/histori_penjualan',['data'=>$data]);   
    }



   
}
