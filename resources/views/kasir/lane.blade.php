@extends ('master.kasir')


@section ('content')

    <div class="data-table-area mg-tb-15">
            <div class="container-fluid">

                         @if ($message = Session::get('success'))
                          <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button> 
                              <strong>{{ $message }}</strong>
                          </div>
                        @endif

                        @if ($message = Session::get('error'))
                          <div class="alert alert-danger alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button> 
                            <strong>{{ $message }}</strong>
                          </div>
                        @endif

                        @if ($message = Session::get('warning'))
                          <div class="alert alert-warning alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button> 
                            <strong>{{ $message }}</strong>
                        </div>
                        @endif

                        @if ($message = Session::get('info'))
                          <div class="alert alert-info alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button> 
                            <strong>{{ $message }}</strong>
                          </div>
                        @endif

                        @if ($errors->any())
                          <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert">×</button> 
                            Please check the form below for errors
                        </div>
                        @endif

                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd">
                                <div class="main-sparkline13-hd">
                                    <h1>Data <span class="table-project-n">Kendaraan</span></h1>
                                </div>
                            </div>
                            <div class="sparkline13-graph">
                                <div class="datatable-dashv1-list custom-datatable-overright">
                                    <div id="toolbar">
                                        <select class="form-control">
                                                <option value="">Export Satu Halaman</option>
                                                <option value="all">Export Semua</option>
                                                <option value="selected">Export Yang Ditandai</option>
                                            </select>
                                    </div>
                                    <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                        data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                        <thead>
                                            <tr>
                                                <th data-field="state" data-checkbox="true"></th>
                                                <th >Lane</th>
                                                <th >Nopol</th>
                                                <th >Keluhan</th>
                                                <th >Status</th>
                                                <th >Nama Pelanggan</th>
                                                <th >WA</th>
                                                <th >Opsi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($data as $dt)  
                                            <tr>
                                                <td></td>
                                                <td>{{$dt->id_tempat_servis}}</td>
                                                <td>{{$dt->nopol}}</td>
                                                <td>{{$dt->keluhan}}</td>
                                                <td>{{$dt->status}}</td>
                                                <td>{{$dt->nama}}</td>

                                                 
                                                                   

                                                <td><a  class="fa fa-whatsapp" href="https://api.whatsapp.com/send?phone={{$dt->hp}}&text=Halo%20{{$dt->nama}}"></a></td>
                                      
                                                    
            
                                                
                                                @php
                                                $display = "";

                                                if($dt->status!="PENDING"){
                                                    $display = "display: none;";
                                                }else{
                                                    $display = "";
                                                }

                                                
                                                @endphp

                                                @php
                                                $display2 = "";

                                                if($dt->status!="PENDING"){
                                                    $display2 = "";
                                                }else{
                                                    
                                                    $display2 = "display: none;";
                                                }

                                                
                                                @endphp

                                                <td class="datatable-ct">  
                                                    <a href="{{url('kasir_penjualan2_edit',$dt->nopol)}}"  class="btn btn-primary btn-block {{$display}}" style="color: #ffffff; {{$display}}">Update Trx</a>
                                                    <a href="{{url('kasir_penjualan')}}"  class="btn btn-success btn-block {{$display2}}" style="color: #ffffff; {{$display2}}">Nota Baru</a>
                                                </td>
                                            </tr>
                                         @endforeach   
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      

                    
                                                    <div id="myModal" class="modal fade" role="dialog" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                          
                                                            <!-- konten modal-->
                                                            <div class="modal-content">


                                                                <!-- heading modal -->
                                                                <div class="modal-header" style="background-color:#075e54;" >
                                                                    <button type="button" class="close" data-dismiss="modal" style="color: #ffffff;">&times;</button>
                                                                    <h4 class="modal-title" style="color: #ffffff;" >Pilih Pesan Yang Ingin Dikirimkan</h4>
                                                                </div>
<!--                                                                 height: 560px; overflow-y: auto;
 -->                                                                <!-- body modal -->
                                                                <div class="modal-body" style="background-color: #ece5dd;  ">
                                                                 @foreach ($data2 as $dt) 
                                                                 <div class="modal-body">
                                                                    <h5>{{$dt->id_tempat_servis}} Dengan Plat Nomer : {{$dt->nopol}}</h5>
                                                                  <div class="form-group">
                                                                      <div class="col-sm-10">
                                                                          <input id="jumlah" type="text" class="form-control" name="jumlah" readonly="" value="Terimakasih, Proses Servis Kendaraan Anda Sudah Selesai" />
                                                                      </div>
                                                                      <label class="col-sm-2 col-sm-2 control-label"><a class="btn btn-success" href="https://api.whatsapp.com/send?phone={{$dt->hp}}&text=Halo%20{{$dt->nama}}%20Proses%20Servis%20Kendaraan%20Anda%20Sudah%20Selesai">Kirim</a></label>
                                                                  </div>

                                                                  <div class="form-group">
                                                                    
                                                                      <div class="col-sm-10">
                                                                          <input id="jumlah" type="text" class="form-control" name="jumlah" readonly="" value="Kendaraan Anda Memerlukan Pergantian Suku Cadang Untuk Proses Servis" />
                                                                      </div>
                                                                      <label class="col-sm-2 col-sm-2 control-label"><a class="btn btn-success" href="https://api.whatsapp.com/send?phone={{$dt->hp}}&text=Halo%20{{$dt->nama}}%20Kendaraan%20Anda%20Memerlukan%20Pergantian%20Suku%20Cadang%20Untuk%20Proses%20Servis">Kirim</a></label>
                                                                  </div>

                                                                  <div class="form-group">
                                                                    
                                                                      <div class="col-sm-10">
                                                                          <input id="jumlah" type="text" class="form-control" name="jumlah" readonly="" value="Transaksi Dibatalkan" />
                                                                      </div>
                                                                      <label class="col-sm-2 col-sm-2 control-label"><a class="btn btn-success" href="https://api.whatsapp.com/send?phone={{$dt->hp}}&text=Halo%20{{$dt->nama}}%20Transaksi%20Dibatalkan">Kirim</a></label>
                                                                  </div>

                                                          
            

                                                                     <!-- <div class="form-group" style="table-layout: all;">
                                                                      <h5><a class="col-sm-12 col-sm-12 control-label" style="border: 1px solid #ccc; background-image: url({{asset('assets/img/hijau.jpg')}}); height:20px; margin-top:3px;
                                                                       href="https://api.whatsapp.com/send?phone={{$dt->hp}}&text=Halo%20{{$dt->nama}}"" > Terimakasih, Proses Servis Kendaraan Anda Sudah Selesai </a></h5>

                                                                      <h5><a class="col-sm-12 col-sm-12 control-label" style="border: 1px solid #ccc; background-color: #dcf8c6;" >Kendaraan Anda Memerlukan Pergantian Suku Cadang Untuk Proses Servis</a></h5>

                                                                      <h5><a class="col-sm-12 col-sm-12 control-label" style="border: 1px solid #ccc; background-color: #F08080;" >Transaksi Dibatalkan</a></h5>


                                                                    </div> -->
                                                                    <br><br><br><br>
                                                                    <br> 
                                                                </div>@endforeach
                                                                <!-- footer modal -->
                                                              <!--   <div class="modal-footer" style="">
                                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                                                                </div> -->
                                                               
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
        
    
        
 
@endsection
