
@extends ('master.gudang')


@section ('content')
<div class="product-cart-area mg-tb-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                                <div id="myTabContent" class="tab-content custom-product-edit">
                                    <div class="product-tab-list tab-pane fade active in" id="description">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="review-content-section">
                                                    
                                                      <div class="charts-single-pro responsive-mg-b-30">
                                                            <div class="alert-title">
                                                                <h2>Stok Hampir Habis</h2>
                                                            </div>
                                                            <br>
                                                             <div id="canvas-holder" style="width:40%">
                                                            <canvas id="myChart"></canvas>
                                                            </div>
                                                           
                                                          

                                                            <!-- <br><br>
                                                            <h4 style="float: left;">Pemasukan</h4> 
                                                            <h4 style="float: right;">Rp 10,000</h4><br>
                                                            
                                                            <h4 style="float: left;">Pemasukan</h4><span></span> 
                                                            <h4 style="float: right;">Rp 10,000</h4><br> -->

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
                       @if ($message = Session::get('success'))
                          <div class="alert alert-success alert-block">
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
                                <ul id="myTab3" class="tab-review-design">
                                    <li class="active"><a href="#description"><i class="fa fa-wrench" aria-hidden="true"></i> Data Stok</a></li>
                                </ul>
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
                                                <th data-field="id">ID</th>
                                                <th data-field="1">Nama Barang</th>
                                                <th data-field="2">Jumlah</th>
                                                <th data-field="3">Harga Beli</th>
                                                <th data-field="4">Harga Jual</th>
                                                <th data-field="action" class="col-sm-1" >Opsi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($data as $dt)  
                                            <tr>
                                                <td></td>
                                                <td>{{$dt->id}}</td>
                                                <td >{{$dt->nama_barang}}</td>
                                                <td>{{$dt->jumlah}}</td>
                                                <td>{{$dt->harga_beli}}</td>
                                                <td >{{$dt->harga_jual}}</td>
                                        
                                                <td class="datatable-ct">   
                                                                   
                                                    <a href="{{route('gudang_stok.edit',$dt->id)}}"  class="btn btn-success btn-block" style="color: #ffffff">Edit</a> 

                                                    <form action="{{route('gudang_stok.destroy',$dt->id) }}" method="post">
                                                        {{csrf_field()}}
                                                        {{ method_field('DELETE') }}
                                                    <button type="submit" class="btn btn-danger btn-block"  onclick="return confirm('Apakah Anda Yakin ?');"> Hapus 
                                                    </button>
                                                    </form>
                                                                                                  
                                                </td>
                                            </tr>
                                         @endforeach  
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<script>
        var ctx = document.getElementById("myChart").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'horizontalBar',
            data: {
                labels: [@foreach ($stok as $dt)"{{$dt->nama_barang}}",@endforeach],
                datasets: [{
                            label: "Sisa Stok",
                            fillColor: "rgba(220,220,220,0.5)", 
                            strokeColor: "rgba(220,220,220,0.8)", 
                            highlightFill: "rgba(220,220,220,0.75)",
                            highlightStroke: "rgba(220,220,220,1)",
                            data: [@foreach ($stok as $dt){{$dt->jumlah}},@endforeach]    
                          }]
            },
            options: {
                    scales: {
                        yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                    }
                }
            });
    </script>
@endsection

   
