@extends ('master.kasir')


@section ('content')
            
     <div class="data-table-area mg-tb-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-graph">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="review-content-section">
                                            <div class="form-group">
                                                <h1>TOTAL</h1>
                                             </div>
                                        </div>
                                     </div>
                                     <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="review-content-section">
                                            <div class="form-group">
                                                   @foreach ($data2 as $dt)
                                                  <h1 style="float: right;">Rp. {{$dt->total_harga}}</h1>
                                                   @endforeach  
                                             </div>
                                        </div>
                                     </div>
                                 </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <div class="data-table-area mg-tb-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd">
                                <div class="main-sparkline13-hd">
                                    <h1>Detail <span class="table-project-n">Penjualan</span>
                                    </h1>
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
                                                <th >Id Nota</th>
                                                <th >Nama Barang / Jasa</th>
                                                <th >Harga Beli</th>
                                                <th >Harga Jual</th>
                                                <th >Jumlah</th>
                                                <th >Sub Total</th>
                                                <th >Laba</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                       @foreach ($data3 as $dt)
                                          <a href="{{url('nota',$dt->id_nota)}}"  class="btn btn-success" style="float: right;">Cetak Nota</a>
                                        @endforeach
                                        @foreach ($data as $dt)
                             
                                        <br>
                                            <tr>
                                            @php
                                            
                                                $harga_jual = $dt->harga_jual;
                                                $harga_beli = $dt->harga_beli;
                                                $jumlah = $dt->jumlah;
                                            
                                            $laba = "";
                                            $laba = ($harga_jual-$harga_beli)*$jumlah;
                                            @endphp

                                                <td></td>
                                                <td>{{$dt->id_nota}}</td>
                                                <td>{{$dt->nama_barang_jasa}}</td>
                                                <td>{{$dt->harga_beli}}</td>
                                                <td>{{$dt->harga_jual}}</td>
                                                <td>{{$dt->jumlah}}</td>
                                                <td>{{$dt->sub_total}}</td>
                                                <td>{{$laba}}</td>
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

                    

        
    
        

@endsection
