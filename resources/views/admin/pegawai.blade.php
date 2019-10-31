@extends ('master.admin')


@section ('content')

 	 <div class="single-product-tab-area mg-tb-15">
            <!-- Single pro tab review Start-->
            <div class="single-pro-review-area">
                <div class="container-fluid">
                @if ($message = Session::get('info'))
                          <div class="alert alert-info alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button> 
                            <strong>{{ $message }}</strong>
                          </div>
                        @endif
                 {{-- menampilkan error validasi --}}
                                            @if (count($errors) > 0)
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                            @endif
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="review-tab-pro-inner">
                                <ul id="myTab3" class="tab-review-design">
                                    <li class="active"><a href="#description"><i class="fa fa-plus" aria-hidden="true"></i> Tambah Pegawai</a></li>
                                </ul>
                                <div id="myTabContent" class="tab-content custom-product-edit">
                                    <div class="product-tab-list tab-pane fade active in" id="description">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="review-content-section">
                                                    <div class="card-block">  

                                                   
                                                    <form action="{{route('admin_pegawai.store')}}"  method="post" enctype="multipart/form-data">
                                                         {{csrf_field()}}
                                                        <div class="row">
                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                <div class="review-content-section">
                                                                    <div class="form-group">
                                                                        <label for="card-number" class="form-label">Nama Pegawai</label>
                                                                        <input id="nama" name="nama" type="text" class="form-control" required="">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                <div class="review-content-section" id="pwd-container1">
                                                                    <div class="form-group">
                                                                        <label for="card-number" class="form-label">Password</label>
                                                                        <input id="password" name="password" type="password" class="form-control example1" value="Lancar Jaya">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="pwstrength_viewport_progress"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                <div class="review-content-section">
                                                                    <div class="form-group">
                                                                        <label for="card-number" class="form-label">Status</label>
                                                                        <select id="2" name="status" type="text" class="form-control">
                                                                            <option>KASIR</option>
                                                                            <option>ADMIN</option>
                                                                            <option>PEGAWAI GUDANG</option>
                                                                            <option>MEKANIK</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div> 
                                                        
             
                                                    </div>
                                                        <div class="text-center mg-b-pro-edt custom-pro-edt-ds">
                                                            <button type="submit" class="btn btn-primary waves-effect waves-light">Tambah</button>                                                        
                                                        </div>
                                                </form> 
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
                                    <li class="active"><a href="#description"><i class="fa fa-wrench" aria-hidden="true"></i> Master Pegawai</a></li>
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
                                                <th data-field="company">Nama Pegawai</th>
                                                <th data-field="3">Password</th>
                                                <th data-field="4">Status</th>
                                                <th data-field="action" class="col-sm-1" >Opsi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($data as $dt)  
                                            <tr>
                                                <td></td>
                                                <td>{{$dt->id}}</td>
                                                <td>{{$dt->nama}}</td>
                                                <td>{{$dt->password}}</td>
                                                <td>{{$dt->status}}</td>
                                        
                                                <td class="datatable-ct">   
                                                                   
                                                    <a href="{{route('admin_pegawai.edit',$dt->id)}}"  class="btn btn-success btn-block" style="color: #ffffff">Edit</a> 

                                                    <form action="{{route('admin_pegawai.destroy',$dt->id) }}" method="post">
                                                        {{csrf_field()}}
                                                        {{ method_field('DELETE') }}
                                                    <button type="submit" class="btn btn-danger btn-block"  onclick="return confirm('Apakah Anda Yakin ?');"> Hapus 
                                                    </button>
                                                    </form>
                                                                                                  
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
