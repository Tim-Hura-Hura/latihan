@extends ('master.kasir')


@section ('content')

 	

 <div class="single-product-tab-area mg-tb-15">
            <!-- Single pro tab review Start-->
            <div class="single-pro-review-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="review-tab-pro-inner">
                                <ul id="myTab3" class="tab-review-design">
                                    <li class="active"><a href="#description"><i class="fa fa-pencil" aria-hidden="true"></i> Tempat Servis</a></li>
                                </ul>
                                <div id="myTabContent" class="tab-content custom-product-edit">
                                    <div class="product-tab-list tab-pane fade active in" id="description">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="review-content-section">
                                                    <div class="card-block">  

  													@foreach($data as $dt)
													<form enctype="multipart/form-data" action="{{ route('kasir_tempat_servis.update',$dt->id) }}" method="post" >
															{{csrf_field()}}
															{{ method_field('PUT') }}	

                                                     <div class="form-group">
                                                        <label for="card-number" class="form-label">Tempat Servis</label>
                                                        
                                                        <select id="" name="status" type="text" class="form-control" style="float: right;">
                                                    
                                                            <option >{{$dt->status}}</option>
                                                            <option >KOSONG</option>
                                                            <option >SEDANG DIGUNAKAN</option>
                                                       
                                                        </select>   
                                                    </div>

													@endforeach
			 
                                                    </div>
                                                 <br><br><br>
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
