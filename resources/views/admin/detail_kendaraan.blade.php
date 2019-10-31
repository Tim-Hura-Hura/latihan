@extends ('master.admin')


@section ('content')

    <div class="data-table-area mg-tb-15">
            <div class="container-fluid">
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
                                                <th >ID</th>
                                                <th >Nopol</th>
                                                <th >Merek Kendaraan</th>
                                                <th >Tipe Kendaraan</th>
                                                <th >Warna Kendaraan</th>
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
                                                <td>{{$dt->id}}</td>
                                                <td>{{$dt->nopol}}</td>
                                                <td>{{$dt->merek}}</td>
                                                <td>{{$dt->tipe}}</td>
                                                <td>{{$dt->warna}}</td>
                                                <td>{{$dt->keluhan}}</td>
                                                <td>{{$dt->status}}</td>
                                                <td>{{$dt->nama}}</td>
                                                <td><a href="https://api.whatsapp.com/send?phone={{$dt->hp}}&text=Halo%20{{$dt->nama}}" class="fa fa-whatsapp"></a></td>
                                                
                                        
                                                <td class="datatable-ct">  
                                                    <a href="{{url('admin_detail_kendaraan_list',$dt->id)}}"  class="btn btn-warning btn-block" style="color: #ffffff">Detail</a>
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

                    

        
    
        

@endsection
