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
                <h5 style="text-align: right;">{{$tanggal->tgl_masuk}}  ({{$tanggal->id_nota}})</h5>
                </td>               
            @endforeach           
            
            </tr>
			     </table>

            <table width="318">
            <tr>
               @foreach ($data3 as $dt)
                 <td width="180">
                <h5 style="text-align: left; ">Motor {{$dt->merek}} - {{$dt->nopol}} - {{$dt->tipe}} - {{$dt->warna}} </h5>
                </td>
              @endforeach 
            
              @foreach ($data as $dt)
               <td width="114">  
                <h5 style="text-align: right; ">PENDING</h5>
                </td>
               @endforeach 
             </td>
             </tr>
            </table>
      <table border="0.1" class ="table table-striped" >
                  <thead style="background-color:orange">
                     <tr >
                     <th style="text-align: center; font-size: 12px;">Nama Barang / Jasa</th>
                     <th style="text-align: center; font-size: 12px;">Qty</th> 
                     <th style="text-align: center; font-size: 12px;">Harga</th>
                     <th style="text-align: center; font-size: 12px;">Subtotal</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr >
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
                    </tr> 
                      <tr>
                      <td> </td> 
                      <td> </td> 
                      <td> </td> 
                      <td> </td> 
                    </tr>  
                    <tr>
                      <td colspan="3" style="text-align: center;font-size: 10px">TOTAL</td>
                      <td  style="font-size: 10px">Rp.-</td>  
                    </tr>
                     <tr>
                      <td colspan="3" style="text-align: center;font-size: 10px">BAYAR</td>
                      <td  style="font-size: 10px">Rp.-</td>  
                    </tr>
                     <tr>
                      <td colspan="3" style="text-align: center;font-size: 10px">KEMBALIAN</td> 
                      <td  style="font-size: 10px">Rp.-</td> 
                    </tr>
                     <tr>
                      <td colspan="3" style="text-align: center;font-size: 10px">NAMA MEKANIK</td> 
                      <td  style="font-size: 10px"></td> 
                    </tr> 
                    <tr>
                      <td colspan="3" style="text-align: center;font-size: 10px">NAMA PENERIMA</td> 
                            @foreach($data as $records2)                                                               
                      <td  style="font-size: 10px">{{$records2->penerima}}</td> 
                            @endforeach   
                    </tr>  

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