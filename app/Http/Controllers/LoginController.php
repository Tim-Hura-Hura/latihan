<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;
use Alert;

class LoginController extends Controller
{

    public function index()
	{

		return view ('login/index'); 


 	}

    function masuk(Request $kiriman)

    {
        $data1 = DB::table('pegawai')->where('nama',$kiriman->username)->where('password',$kiriman->password)->get();
        foreach ($data1 as $key ) 
            {
                $b = $key->status;
            }

        $username = $kiriman->username;
        $password = $kiriman->password;

        if (count($data1)>0) {

            
            Session::put('login',TRUE);
            Session::put('username',$username);
            Session::put('password',$password);
            Alert::success('Selamat Datang');
            switch ($b) 
            {
                case "KASIR":
                    return redirect('kasir_pelanggan');
                break;
                case "ADMIN":
                    return redirect('admin_detail_pelanggan');
                break;
                case "PEGAWAI GUDANG":
                    return redirect('gudang_barang');
                break;
            }

        }else {
            Alert::error('Username atau Password Salah');
                return redirect('login');
              }
    }

    public function logout()
    {
        Session::flush();
           return redirect('login');
    }

   
}
