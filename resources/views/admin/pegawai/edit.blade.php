@extends ('master.admin')


@section ('content')

 	

 <div class="single-product-tab-area mg-tb-15">
            <!-- Single pro tab review Start-->
            <div class="single-pro-review-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="review-tab-pro-inner">
                                <ul id="myTab3" class="tab-review-design">
                                    <li class="active"><a href="#description"><i class="fa fa-pencil" aria-hidden="true"></i> Pegawai</a></li>
                                </ul>
                                <div id="myTabContent" class="tab-content custom-product-edit">
                                    <div class="product-tab-list tab-pane fade active in" id="description">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="review-content-section">
                                                    <div class="card-block">  

  													@foreach($data as $dt)
													<form enctype="multipart/form-data" action="{{ route('admin_pegawai.update',$dt->id) }}" method="post" >
															{{csrf_field()}}
															{{ method_field('PUT') }}	

                                                     	<div class="form-group mg-t-15">
				                                            <label for="card-number" class="form-label">Nama</label>
				                                            <input id="nama" class="form-control" type="text" name="nama"  value="{{$dt->nama}}" required="">
				                                        </div>
				                    
				                                        <div class="form-group mg-t-15">
				                                            <label for="card-number" class="form-label">Password</label>
				                                            <input id="password" class="form-control example1" type="text" name="password"  value="{{$dt->password}}" required="">
                                                            <div class="form-group">
                                                                        <div class="pwstrength_viewport_progress"></div>
                                                            </div>  
				                                        </div> 
                                                         <div class="form-group">
                                                                        <div class="pwstrength_viewport_progress"></div>
                                                                    </div>
                                                        <div class="form-group mg-t-15">
                                                            <label for="card-number" class="form-label">Status</label>
                                                            <select id="2" name="status" type="text" class="form-control">
                                                            
                                                                    <option>{{$dt->status}}</option>
                                                                    <option>KASIR</option>
                                                                    <option>ADMIN</option>
                                                                    <option>PEGAWAI GUDANG</option>
                                                                    <option>MEKANIK</option>
                                                            
                                                            </select>

                                                        </div> 

                               

													@endforeach
			 
                                                    </div>
                                                <div class="text-center mg-b-pro-edt custom-pro-edt-ds">
                                                    <button type="submit" class="btn btn-primary waves-effect waves-light">Simpan</button>														  
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

		
	
		

@endsection
