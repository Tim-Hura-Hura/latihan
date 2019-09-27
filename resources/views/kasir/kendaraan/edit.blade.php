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
                                    <li class="active"><a href="#description"><i class="fa fa-pencil" aria-hidden="true"></i> Product Edit</a></li>
                                </ul>
                                <div id="myTabContent" class="tab-content custom-product-edit">
                                    <div class="product-tab-list tab-pane fade active in" id="description">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="review-content-section">
                                                    <div class="card-block">  

  													@foreach($data as $dt)
													<form enctype="multipart/form-data" action="{{ route('kasir_kendaraan.update',$dt->id) }}" method="post" >
															{{csrf_field()}}
															{{ method_field('PUT') }}	

                                                     	<div class="form-group mg-t-15">
				                                            <label for="card-number" class="form-label">Nopol</label>
				                                            <input id="nopol" class="form-control" type="text" name="nopol"  value="{{$dt->nopol}}" required="">
				                                        </div>
				                    
				                                        <div class="form-group mg-t-15">
				                                            <label for="card-number" class="form-label">Nomer Mesin</label>
				                                            <input id="no_mesin" class="form-control" type="text" name="no_mesin"  value="{{$dt->no_mesin}}">
				                                        </div> 

                                                        <div class="form-group mg-t-15">
                                                            <label for="card-number" class="form-label">Merek Kendaraan</label>
                                                            <input id="merek" class="form-control" type="text" name="merek"  value="{{$dt->merek}}" required="">
                                                        </div>  

                                                        <div class="form-group mg-t-15">
                                                            <label for="card-number" class="form-label">Tipe Kendaraan</label>
                                                            <input id="tipe" class="form-control" type="text" name="tipe"  value="{{$dt->tipe}}">
                                                        </div>  

                                                        <div class="form-group mg-t-15">
                                                            <label for="card-number" class="form-label">Warna Kendaraan</label>
                                                            <input id="warna" class="form-control" type="text" name="warna"  value="{{$dt->warna}}">
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
