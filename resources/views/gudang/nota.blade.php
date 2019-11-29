<:DOCTYPE html>
<html>
<head>
    <link rel="stylesheet"  href="{{asset('assets/css/bootstrap.min.css')}}">
</head>
<body>
    <div class="panel panel - default">
            <table width="319" border="0">
            <tr>
              <td width="179">
                        <img src="{{asset('assets/img/logo/logo.png')}}">
                    </td>
                    @foreach ($tanggal as $tanggal)
                      <td width="105">
                        <h5 style="text-align: right;">{{$tanggal->tgl_masuk}}</h5>
                        </td>               
                    @endforeach           
                    
                    </tr>
            </table>
            <table width="318">
                    <tr>
                    <td width="180">
                     @foreach ($data2 as $data2)
                        <h5 style="text-align: left; "></h5>
                        </td>
                    <td width="114">
                       <h5 style="text-align: right; font-weight: bold; ">{{$data2->id_nota}}</h5>
                     </td>
                     @endforeach 
            </tr>
            </table>

              <table border="0.1" class ="table table-striped" >
                  <thead style="background-color:red">
                     <tr >
                     <th style="text-align: center; font-size: 12px;">Nama Barang</th>
                     <th style="text-align: center; font-size: 12px;">Qty</th> 
                     <th style="text-align: center; font-size: 12px;">Harga Beli</th>
					           <th style="text-align: center; font-size: 12px;">Harga Jual</th>
                     <th style="text-align: center; font-size: 12px;">Subtotal</th>
					           <th style="text-align: center; font-size: 12px;">Suplier</th>
                    </tr>
                  </thead>
                  <tbody>
                  
                  @foreach ($data as $dt)
                    <tr>
                      <td style="font-size: 10px">{{$dt->nama_barang}}</td> 
                      <td style="font-size: 10px"> {{$dt->jumlah}}</td>
					             <td style="font-size: 10px">Rp. {{$dt->harga_beli}}</td> 					  
                      <td style="font-size: 10px">Rp. {{$dt->harga_jual}}</td> 
                      <td style="font-size: 10px">Rp. {{$dt->sub_total}}</td> 
					             <td style="font-size: 10px">{{$dt->suplier}}</td> 
                    </tr> 
                  @endforeach
                    <tr >
                      <td> </td> 
                      <td> </td> 
                      <td> </td> 
                      <td> </td>
                      <td> </td> 
                      <td> </td> 
                    </tr>
                      <tr>
                      <td> </td> 
                      <td> </td> 
                      <td> </td> 
                      <td> </td> 
                      <td> </td> 
                      <td> </td>
                    </tr> 
                      <tr>
                      <td> </td> 
                      <td> </td> 
                      <td> </td> 
                      <td> </td> 
                      <td> </td> 
                      <td> </td>
                    </tr> 
                     @foreach ($data3 as $data3) 
                    <tr>
                      <td colspan="5" style="text-align: center;font-size: 10px">TOTAL</td>
                      <td  style="font-size: 10px">Rp. {{$data3->total_harga}}</td>  
                    </tr>
                     <tr>
                      <td colspan="5" style="text-align: center;font-size: 10px">BAYAR</td>
                      <td  style="font-size: 10px">Rp. {{$data3->bayar}}</td>  
                    </tr>
                     <tr>
                      <td colspan="5" style="text-align: center;font-size: 10px">KEMBALIAN</td> 
                      <td  style="font-size: 10px">Rp. {{$data3->kembalian}}</td> 
                    </tr>
                    @endforeach
                </tbody>
              </table>
              <br><br><br>

              <table >
                 <thead style="background-color:#6EB482">
                     <tr >
                     <th style="text-align: center; font-size: 12px;"></th>
                     <th style="text-align: center; font-size: 12px;"></th> 
                     <th style="text-align: center; font-size: 12px;"></th>
                     <th style="text-align: center; font-size: 12px;"></th>
                    </tr>
                  </thead>
                  <tbody>
 
                    <tr>
                      <td colspan="3" style="text-align: left;font-size: 10px">HORMAT KAMI</td>
                      <td  style="font-size: 10px"></td>  
                    </tr>
 

                </tbody>
              </table>

    </div>
</body>
</html>