<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Alert;

class PembelianController extends Controller {

    public function index() {

        DB::table('pembelian')->get();
        $generatePMB = DB::select("SELECT concat('PMB','_',DATE_FORMAT(NOW(), '%d%m%Y'),'_',nomor) AS id_nota from (select case  when nomor IS NULL THEN '001' ELSE  nomor end  AS nomor  from (SELECT right(1000+(max(RIGHT(id_nota,3))+1),3) as nomor FROM `pembelian` where tgl_masuk = CURRENT_DATE) abc) bca");
        foreach ($generatePMB as $value) {
            $kode = $value->id_nota;
        }
        $detail = \App\detail_pembelian::where('id_nota',$kode)->get();

         $total = DB::select("SELECT sum(sub_total) as total FROM `detail_pembelian` where id_nota=:id_nota",['id_nota'=>$kode]);
        foreach ($total as $value) {
            $total_harga = $value->total;
        }
        if ($total_harga=="") {
            # code...
            $total_harga=0;
        }
        $barang = DB::select( DB::raw("SELECT nama_barang FROM `barang`"));
        return view('gudang.pembelian',['generatePMB'=>$generatePMB,'detail'=>$detail,'total'=>$total_harga,'barang'=>$barang]);
    }

    public function create() {
        //
    }
 

    public function store(Request $request) {
        //
       
        $id_nota = $request->id_nota;
        $total = $request->total;
        $bayar = $request->bayar;
        $kembalian = $request->kembalian;
        
        $insert = DB::table('pembelian')->insert([
            'id_nota' => $id_nota,
            'tgl_masuk'=>DB::raw('now()'),
            'total_harga'=>$total,
            'bayar'=>$bayar,
            'kembalian'=>$kembalian
        ]);
        return 'ok';
    }

    public function edit($kode_barang) {
        //  
    }

    public function update(Request $request) {

        //

        $id_nota     = $request->id_nota;
        $total       = $request->total;
        $bayar       = $request->bayar;
        $nama_barang = $request->nama_barang;
        $kembalian   = $bayar-$total;

    
         $insert = DB::table('pembelian')->insert([
            'id_nota' => $id_nota,
            'tgl_masuk'=>DB::raw('now()'),
            'total_harga'=>$total,
            'bayar'=>$bayar,
            'kembalian'=>$kembalian]);

        //DB::table('stok')->where('nama_barang',$nama_barang)->update(['harga_beli' => $harga_beli, 'harga_jual' => $harga_jual]);


    }

    public function generateDetail($id){
        $detail = DB::select("SELECT * FROM `detail_pembelian` WHERE id_nota=:id",['id'=>$id]);
        return json_encode($detail);
    }


    public function ajaxGenerateDataKodeBarang($id) {

        $data = DB::select("SELECT b.*,s.harga_jual,s.jumlah FROM `barang` b inner join stok s on s.nama_barang=b.nama_barang where b.kode_barang =:kode_barang or b.nama_barang=:nama_barang", ['kode_barang' => $id,'nama_barang'=>$id]);
        return json_encode($data);
    }
    
    
    public function ajaxTambahDetail(Request $request) 
    {

        $id_nota    = $request->id_nota;
        $nama       = $request->nama;
        $harga_beli = $request->harga_beli;
        $harga_jual = $request->harga_jual;
        $jumlah     = $request->jumlah;
        $subtotal   = $request->subtotal;
        $suplier    = $request->suplier;


        $cek = DB::select("SELECT COUNT(nama_barang) AS nmbr  FROM detail_pembelian WHERE id_nota =:id AND nama_barang =:nama",['id'=>$id_nota,'nama'=>$nama]);
        foreach ($cek as $value) {
            $ck = $value->nmbr;
        }   

        if ($ck > 0) {

        $getval = DB::select("SELECT jumlah,sub_total FROM detail_pembelian WHERE id_nota = '$id_nota' AND nama_barang = '$nama'");
        foreach ($getval as $jj ) {
            $jmlx = $jj->jumlah;
            $sub_total2 = $jj->sub_total;
        }

        $jumlah_baru = $jmlx+$jumlah;
        $sub_total_baru = $sub_total2+$subtotal;
           


        $update = DB::table('detail_pembelian')->where('id_nota','=',$id_nota)->where('nama_barang','=',$nama)->update([
            'jumlah'       =>$jumlah_baru,
            'sub_total'    =>$sub_total_baru

        ]);


        $detail = DB::select("SELECT k.*,(select sum(sub_total) from detail_pembelian where id_nota=k.id_nota) as total FROM `detail_pembelian` k WHERE k.id_nota=:id",['id'=>$id_nota]);
        return json_encode($detail);
        }
        elseif ($ck == 0) {
            
            $insert = DB::table('detail_pembelian')->insert([
            'id_nota'       =>$id_nota,
            'nama_barang'   =>$nama,
            'harga_beli'    =>$harga_beli,
            'harga_jual'    =>$harga_jual,
            'jumlah'        =>$jumlah,
            'sub_total'     =>$subtotal,
            'suplier'       =>$suplier

        ]);
             $detail = DB::select("SELECT k.*,(select sum(sub_total) from detail_pembelian where id_nota=k.id_nota) as total FROM `detail_pembelian` k WHERE k.id_nota=:id",['id'=>$id_nota]);
             return json_encode($detail);

        }
     }

    public function destroy($id) {
        //

        $detail = DB::select("SELECT * FROM `detail_pembelian` WHERE id=:id",['id'=>$id]);
        $id_nota = "";
        foreach ($detail as $key => $result) {
            # code...
            $id_nota = $result->id_nota;
        }
        $delete = DB::select("DELETE FROM `detail_pembelian` WHERE id=:id",['id'=>$id]);
        $detail = DB::select("SELECT k.*,('') as total FROM `detail_pembelian` k WHERE k.id_nota=:id",['id'=>$id_nota]);
        $total = DB::select("select sum(sub_total) as total from detail_pembelian where id_nota=:nota", ['nota' => $id_nota]);
        $response = ['detail' => $detail, 'total' => $total];

        return json_encode($response);

      

    }


    public function gudang_detail()

    {

        
        $data = DB::select( DB::raw("SELECT * from pembelian order by tgl_masuk desc")); 
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
        return view ('gudang/detail',['data'=>$data,'pemasukan'=>$pemasukan,'pengeluaran'=>$pengeluaran,'hasil'=>$hasil,'pemasukan2'=>$pemasukan2,'pengeluaran2'=>$pengeluaran2,'tgl1'=>$tgl1,'tgl2'=>$tgl2]); 
    }

    public function gudang_detail_sort(Request $request)
    {
        if(!Session::get('login'))
             {
            return redirect('login');
             }
        $tanggal1 = $request->tanggal1;
        $tanggal2 = $request->tanggal2;
        $data = DB::select( DB::raw("SELECT * from pembelian where tgl_masuk between '$tanggal1' and '$tanggal2' order by tgl_masuk ASC"));


         $pemasukan = DB::select( DB::raw("SELECT sum(total_harga)as pemasukan FROM penjualan where tgl_masuk between '$tanggal1' and '$tanggal2'"));

        $pemasukan3 = DB::select( DB::raw("SELECT SUM(total_harga)AS pemasukan FROM penjualan WHERE tgl_keluar BETWEEN '$tanggal1' and '$tanggal2'"));

        $pengeluaran = DB::select( DB::raw("SELECT sum(total_harga)as pengeluaran FROM pembelian where tgl_masuk between '$tanggal1' and '$tanggal2'"));
        
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

return view ('gudang/detail',['data'=>$data,'pemasukan'=>$pemasukan,'pengeluaran'=>$pengeluaran,'hasil'=>$hasil,'pemasukan2'=>$pemasukan2,'pengeluaran2'=>$pengeluaran2,'tgl1'=>$tgl1,'tgl2'=>$tgl2]); 
     }

    public function gudang_detail_list($id_nota)
    {
        $data = DB::select( DB::raw("SELECT * from detail_pembelian where id_nota ='$id_nota'"));
        $data2 = DB::select( DB::raw("SELECT total_harga from pembelian where id_nota ='$id_nota'"));
        return view ('gudang/pembelian/detail',['data'=>$data,'data2'=>$data2]);   
    }
}
