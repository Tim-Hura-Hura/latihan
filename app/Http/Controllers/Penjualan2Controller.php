<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Alert;

class Penjualan2Controller extends Controller {


    public function kasir_penjualan2_edit($nopol) {

        if(!Session::get('login'))
             {
            return redirect('login');
             }
        $data = DB::select("SELECT penjualan.id_nota, penjualan.nopol, penjualan.mekanik, penjualan.penerima from penjualan left JOIN kendaraan on kendaraan.nopol=penjualan.nopol WHERE kendaraan.status='PENDING' AND  penjualan.nopol ='$nopol' AND penjualan.status='PENDING'");

        $anu = "";
        foreach ($data as $key) {
            $anu = $key->id_nota;
        }

        $barang = DB::select( DB::raw("SELECT nama_barang FROM `stok`"));
        $jasa = DB::select( DB::raw("SELECT jenis_jasa FROM `jasa`"));
        $detail = DB::select("SELECT * FROM `detail_penjualan` WHERE id_nota='$anu'");
        $total = DB::select("select sum(sub_total) as total from detail_penjualan where id_nota='$anu'");

        foreach ($total as $value) {
            $total_harga = $value->total;
        }
        if ($total_harga=="") {
            # code...
            $total_harga=0;
        }
            // return view($data);
            return view ('kasir/penjualan2',['data'=>$data,'barang'=>$barang,'jasa'=>$jasa,'total'=>$total_harga,'detail'=>$detail]);
        // dd($total);
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

public function destroy($id) {
        //

        $detail = DB::select("SELECT * FROM `detail_penjualan` WHERE id=:id",['id'=>$id]);
        $id_nota = "";
        foreach ($detail as $key => $result) {
            # code...
            $id_nota = $result->id_nota;
        }
        $delete = DB::select("DELETE FROM `detail_penjualan` WHERE id=:id",['id'=>$id]);
        $detail = DB::select("SELECT k.*,('') as total FROM `detail_penjualan` k WHERE k.id_nota=:id",['id'=>$id_nota]);
        $total = DB::select("select sum(sub_total) as total from detail_penjualan where id_nota=:nota", ['nota' => $id_nota]);
        $response = ['detail' => $detail, 'total' => $total];
        // $detail = DB::select("SELECT k.*,(select round(sum(sub_total)/count(id)) from detail_penjualan where id_nota=k.id_nota) as total FROM `detail_penjualan` k WHERE k.id_nota=:id",['id'=>$id_nota]);

        return json_encode($response);
    }

    public function kasir_penjualan2_bayar(Request $request, $id_nota) {

        //

        $id_nota    = $request->id_nota;
        $penerima   = $request->penerima;
        $mekanik    = $request->mekanik;
        $nopol      = $request->nopol;
        $total      = $request->total;
        $bayar      = $request->bayar;
        $kembalian  = $bayar-$total;


        $update = DB::select("UPDATE penjualan set total_harga=:total, penerima=:penerima, mekanik=:mekanik, bayar=:bayar, kembalian=:kembalian, tgl_keluar=NOW(), status='LUNAS' where id_nota=:id",['id'=>$id_nota,'bayar'=>$bayar,'kembalian'=>$kembalian,'total'=>$total,'penerima'=>$penerima,'mekanik'=>$mekanik]);

        $update2 = DB::select("UPDATE kendaraan SET status = 'SELESAI SERVIS' WHERE nopol=:nopol",['nopol'=>$nopol]);
        $update12 = DB::select("UPDATE tempat_servis INNER JOIN kendaraan ON tempat_servis.id = kendaraan.id_tempat_servis SET tempat_servis.status = 'KOSONG' WHERE kendaraan.nopol=:nopol",['nopol'=>$nopol]);

        return 'ok';
        
    }
    
}
