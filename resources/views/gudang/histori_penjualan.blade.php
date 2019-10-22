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
                                                    <form method="POST" enctype="multipart/form-data" action="{{url('gudang_histori_penjualan_sort')}}">
                                                        {{csrf_field()}}

                                                        <table class="table ">
                                                            <div class="control-group">
                                                                        <ul id="myTab3" class="tab-review-design">
                                                                            <li class="active"><a href="#description"><i class="fa fa-check" aria-hidden="true"></i> Histori Transaksi</a></li>
                                                                        </ul>                                                                        
                                                            </div> <br> <br> 
                                                        <tr>
                                                             <th> 
                                                                <div class="form-group data-custon-pick data-custom-mg" id="data_5">
                                                                    <label>Pilih Tanggal</label>
                                                                    <div class="input-daterange input-group" id="datepicker">
                                                                        <input type="text" readonly="" class="form-control" name="tanggal1"  id="tanggal1">
                                                                        <span class="input-group-addon">Sampai</span>
                                                                        <input type="text" readonly="" class="form-control" name="tanggal2" id="tanggal2">

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


 	<div class="data-table-area mg-tb-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd">
                                <div class="main-sparkline13-hd">
                                    <h1>Histori <span class="table-project-n">Pembelian</span></h1>
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
                                                <th data-field="id">Tanggal Keluar</th>
                                                <th data-field="nopol">Nama Barang</th>
                                                <th data-field="name" >Jumlah</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                             @foreach ($data as $dt)  
                                            <tr>
                                                <td></td>
                                                <td>{{$dt->tgl_masuk}}</td>
                                                <td>{{$dt->nama_barang}}</td>
                                                <td >{{$dt->jumlah}}</td>
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

					

		
	
		

@endsection
