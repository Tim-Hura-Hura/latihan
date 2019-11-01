@extends ('master.gudang')


@section ('content')

 	

 <div class="single-product-tab-area mg-tb-15">
            <!-- Single pro tab review Start-->
            <div class="single-pro-review-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="review-tab-pro-inner">
                                <ul id="myTab3" class="tab-review-design">
                                    <li class="active"><a href="#description"><i class="fa fa-pencil" aria-hidden="true"></i> Master Stok</a></li>
                                </ul>
                                <div id="myTabContent" class="tab-content custom-product-edit">
                                    <div class="product-tab-list tab-pane fade active in" id="description">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="review-content-section">
                                                    <div class="card-block">  

  													@foreach($data as $dt)
													<form enctype="multipart/form-data" action="{{ route('gudang_stok.update',$dt->id) }}" method="post" >
															{{csrf_field()}}
															{{ method_field('PUT') }}	

                                                     	<div class="form-group mg-t-15">
				                                            <label for="card-number" class="form-label">Nama Barang</label>
                                                            <input id="nama_barang" name="nama_barang" type="text" class="form-control" readonly value="{{$dt->nama_barang}}">
				                                        </div>
                                                        <div class="form-group mg-t-15 ">
                                                            <label for="card-number" class="form-label">Jumlah</label>
                                                            <div class="touchspin-inner">
                                                            <input id="jumlah" class="form-control touchspin1" type="number" name="jumlah"  value="{{$dt->jumlah}}" >
                                                            </div>                                                        
                                                        </div>
                                                        <div class="form-group mg-t-15 ">
                                                            <label for="card-number" class="form-label">Harga Beli</label>
                                                            <div class="touchspin-inner">
                                                            <input id="harga_beli" class="form-control touchspin1"  type="number" name="harga_beli"  value="{{$dt->harga_beli}}">
                                                            </div>
                                                        </div>
                                                        <div class="form-group mg-t-15 ">
                                                            <label for="card-number" class="form-label">Harga Jual</label>
                                                            <div class="touchspin-inner">
                                                            <input id="harga_jual" class="form-control touchspin1"  type="number" name="harga_jual"  value="{{$dt->harga_jual}}">
                                                            </div>
                                                        </div>
                                                        <div class="form-group mg-t-15">
                                                            <label for="card-number" class="form-label">Nama Suplier</label>
                                                            <input id="suplier" class="form-control" type="text" name="suplier"  value="{{$dt->suplier}}" required="">
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
