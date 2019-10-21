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
                                                    <form method="POST" enctype="multipart/form-data" action="{{url('gudang_detail_sort')}}">
                                                        {{csrf_field()}}

                                                        <table class="table ">
                                                            <div class="control-group">
                                                                        <ul id="myTab3" class="tab-review-design">
                                                                            <li class="active"><a href="#description"><i class="fa fa-check" aria-hidden="true"></i> Laporan Pembelian</a></li>
                                                                        </ul>                                                                        
                                                            </div> <br> <br> 
                                                        <tr>
                                                             <th> 
                                                                <div class="form-group data-custon-pick data-custom-mg" id="data_5">
                                                                    <label>Pilih Tanggal</label>
                                                                    <div class="input-daterange input-group" id="datepicker">
                                                                        <input type="text" readonly="" class="form-control" name="tanggal1" value="{{$tgl1}}"  id="tanggal1">
                                                                        <span class="input-group-addon">Sampai</span>
                                                                        <input type="text" readonly="" class="form-control" name="tanggal2" id="tanggal2" value="{{$tgl2}}" >

                                                                    </div><br>
                                                                     <button type="submit" class="btn btn-warning pull-right">Cari</button>
                                                                </div>
                                                            </th>
                                                        </tr>

                                                        </table>
                                                    </form> 
                                                </div>
                                            </div>
                                           
                                        </div>  
                            </div>
                    </div>
                </div>
            </div>
        </div>

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
                                                                <h2>Laporan Laba Penjualan </h2>
                                                            </div>
                                                            <center><div id="canvas-holder" style="width:40%">
                                                            <canvas id="myChart"></canvas>
                                                            </div></center>
                                                            <br>
                                                           <!--  @foreach ($pemasukan as $pemasukan) 
                                                             <label>Pemasukan</label> 
                                                            <input value="{{$pemasukan->pemasukan}}"class="form-control"></input><br>

                                                            @endforeach
                                                             <label>Penge luaran</label>
                                                            @foreach ($pengeluaran as $pengeluaran)  
                                                            <input value="{{$pengeluaran->pengeluaran}}" class="form-control"></input>
                                                            @endforeach -->
                                                          



                                                             <div class="review-content-section">
                                                                <div class="form-group">
                                                                      <h1 style="float: left;">Total Laba</h1>
                                                                      <h1 style="float: right;">Rp. {{$hasil}}</h1>
                                                                      
                                                                 </div>
                                                            </div>
                                                            <br>

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
</div>

 	<div class="data-table-area mg-tb-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd">
                                <div class="main-sparkline13-hd">
                                    <h1>Laporan <span class="table-project-n">Pembelian</span></h1>
                                </div>
                            </div>
                            <div class="sparkline13-graph">
                                <div class="datatable-dashv1-list custom-datatable-overright">
                                    <div id="toolbar">
                                        <select class="form-control">
                                                <option value="">Export Basic</option>
                                                <option value="all">Export All</option>
                                                <option value="selected">Export Selected</option>
                                            </select>
                                    </div>
                                    <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                        data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                        <thead>
                                            <tr>
                                                <th data-field="state" data-checkbox="true"></th>
                                                <th data-field="id">Id Nota</th>
                                                <th data-field="name" >Tanggal Masuk</th>
                                                <th data-field="company" >Total Harga</th>
                                 <!--                <th data-field="price">Bayar</th>
                                                <th data-field="date">Kembalian</th> -->
                                                <th data-field="action">Opsi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                             @foreach ($data as $dt)  
                                            <tr>
                                                <td></td>
                                                <td>{{$dt->id_nota}}</td>
                                                <td >{{$dt->tgl_masuk}}</td>
                                                <td>{{$dt->total_harga}}</td>
                                               <!--  <td>{{$dt->bayar}}</td>
                                                <td>{{$dt->kembalian}}</td> -->
                                                <td class="datatable-ct">   
                                                    <a href="{{url('gudang_detail_list',$dt->id_nota)}}" class="btn btn-success btn-block" style="color: #ffffff">Detail</a> 
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
            type: 'bar',
            data: {
                labels: ["Pemasukan", "Pengeluaran", "Laba"],
                datasets: [{
                    label: 'Grafik Laba',
                    data: [{{$pemasukan2}},{{$pengeluaran2}},{{$hasil}}],
                    backgroundColor: [
                    'rgba(255, 99, 132)',
                    'rgba(19, 100, 0)'
                    ],
                    borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(85, 107, 47,1)'
                    ]
                }]
            },
            options: {
                responsive: true
            }
        });
    </script>   
@endsection

       
           
