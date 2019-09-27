<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Alert;

class PenjualanController extends Controller {

    public function index() {



        DB::table('penjualan')->get();
        $generatePNJ = DB::select("SELECT concat('PNJ','_',DATE_FORMAT(NOW(), '%d%m%Y'),'_',nomor) AS id_nota from (select case  when nomor IS NULL THEN '001' ELSE  nomor end  AS nomor  from (SELECT right(1000+(max(RIGHT(id_nota,3))+1),3) as nomor FROM `penjualan` where tgl_masuk = CURRENT_DATE) abc) bca");
        foreach ($generatePNJ as $value) {
            $kode = $value->id_nota;
        }
        DB::table('penjualan')->get();
        $generatePNJ2 = DB::select("SELECT concat('PNJ','_',DATE_FORMAT(NOW(), '%d%m%Y'),'_',nomor) AS id_nota from (select case  when nomor IS NULL THEN '001' ELSE  nomor end  AS nomor  from (SELECT right(1000+(max(RIGHT(id_nota,3))+1),3) as nomor FROM `penjualan` where tgl_masuk = CURRENT_DATE) abc) bca");
        foreach ($generatePNJ2 as $value) {
            $kode = $value->id_nota;
        }
        $detail = \App\detail_penjualan::where('id_nota',$kode)->get();
        
        $total = DB::select("SELECT DISTINCT sum(sub_total) as total FROM `detail_penjualan` where id_nota=:id_nota",['id_nota'=>$kode]);
        foreach ($total as $value) {
            $total_harga = $value->total;
        }
        if ($total_harga=="") {
            # code...
            $total_harga=0;
        }
         $listnopol = DB::select( DB::raw("SELECT nopol as listnopol FROM `kendaraan`  WHERE status !='SELESAI SERVIS'"));
         $mekanik = DB::select( DB::raw("SELECT nama FROM `pegawai` as mekanik WHERE status= 'MEKANIK'"));
         $barang = DB::select( DB::raw("SELECT nama_barang FROM `stok`"));
         $jasa = DB::select( DB::raw("SELECT jenis_jasa FROM `jasa`"));
        return view('kasir.penjualan',['generatePNJ'=>$generatePNJ,'generatePNJ2'=>$generatePNJ2,'detail'=>$detail,'total'=>$total_harga,'listnopol'=>$listnopol,'mekanik'=>$mekanik,'barang'=>$barang,'jasa'=>$jasa]);
    }

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

    public function ajaxGenerateDataNopol($id) {
        //
        $data = DB::select("SELECT k.*,p.nama,(select id_nota from penjualan where nopol = k.nopol and status='PENDING') as id_nota FROM `kendaraan` k inner join pelanggan p on p.id = k.id_pelanggan where k.nopol =:nopol ORDER by k.id_pelanggan desc LIMIT 1", ['nopol' => $id]);
        $total = DB::select("select sum(sub_total) as total from detail_penjualan where id_nota=:nota", ['nota' => $data[0]->id_nota]);
        $response = ['data' => $data, 'total' => $total];
        return json_encode($response);
    }

    public function ajaxGenerateDataKodeBarang($id) {
        //
        $data = DB::select("SELECT b.*,s.harga_jual,s.harga_beli,s.jumlah FROM `barang` b inner join stok s on s.nama_barang=b.nama_barang where b.kode_barang =:kode_barang or b.nama_barang=:nama_barang", ['kode_barang' => $id,'nama_barang'=>$id]);
        return json_encode($data);
    }
    
    public function ajaxGenerateDataKodeJasa($id) 
    {
        //
        $data = DB::select("SELECT * FROM `jasa` b where b.id_jasa =:kode_barang or b.jenis_jasa=:nama_barang", ['kode_barang' => $id,'nama_barang'=>$id]);
        return json_encode($data);
    }
    
    public function ajaxTambahDetail(Request $request) 
    {
//       return $request->input('id_nota');
        //
        $messages = [
        'required' => ':attribute wajib diisi'
        ];

        $id_nota = $request->id_nota;
        $kode = $request->kode;
        $nama = $request->nama;
        $harga = $request->harga;
        $jumlah = $request->jumlah;
        $subtotal = $request->subtotal;
        $hargabeli = $request->hargabeli;

        $cek = DB::select("SELECT COUNT(nama_barang_jasa) AS nmbr  FROM detail_penjualan WHERE id_nota =:id AND nama_barang_jasa =:nama",['id'=>$id_nota,'nama'=>$nama]);
        foreach ($cek as $value) {
            $ck = $value->nmbr;
        }   

        if ($ck > 0) {

        $getval = DB::select("SELECT jumlah,sub_total FROM detail_penjualan WHERE id_nota = '$id_nota' AND nama_barang_jasa = '$nama'");
        foreach ($getval as $jj ) {
            $jmlx = $jj->jumlah;
            $sub_total2 = $jj->sub_total;
        }

        $jumlah_baru = $jmlx+$jumlah;
        $sub_total_baru = $sub_total2+$subtotal;
           
        // DB::table('detail_pembelian')->where('id_nota',$id_nota)->where('nama_barang',$nama)->update(['jumlah' => $jumlah_baru, 'sub_total' => $sub_total_baru]);

         // $update2 = DB::select("UPDATE detail_pembelian SET jumlah ='$jumlah_baru', sub_total='$sub_total_baru' WHERE id_nota=:id_nota and nama_barang=:nama",['id_nota'=>$id_nota,'nama'=>$nama]);

        $update = DB::table('detail_penjualan')->where('id_nota','=',$id_nota)->where('nama_barang_jasa','=',$nama)->update([
            'jumlah'       =>$jumlah_baru,
            'sub_total'    =>$sub_total_baru

        ]);


       $detail = DB::select("SELECT k.*,(select sum(sub_total) from detail_penjualan where id_nota=k.id_nota) as total FROM `detail_penjualan` k WHERE k.id_nota=:id",['id'=>$id_nota]);
        return json_encode($detail);
        }

        elseif ($ck == 0) {
    

        $insert = DB::table('detail_penjualan')->insert([
            'id_nota' => $id_nota,
            'nama_barang_jasa'=>$nama,
            'harga_beli'=>$hargabeli,
            'harga_jual'=>$harga,
            'jumlah'=>$jumlah,
            'sub_total'=>$subtotal
        ]);
       
        $detail = DB::select("SELECT k.*,(select sum(sub_total) from detail_penjualan where id_nota=k.id_nota) as total FROM `detail_penjualan` k WHERE k.id_nota=:id",['id'=>$id_nota]);
        return json_encode($detail);

  
        }

    }

    
}
