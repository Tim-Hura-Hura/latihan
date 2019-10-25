 


@extends ('master.kasir')


@section ('content')

 	 <div class="product-cart-area mg-tb-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-cart-inner">
                        <form action="{{route('kasir_pelanggan.store')}}"  method="post" enctype="multipart/form-data">
                         {{csrf_field()}}

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
                                            
                        @if ($message = Session::get('success'))
                          <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button> 
                              <strong>{{ $message }}</strong>
                          </div>
                        @endif

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

                        @if ($message = Session::get('info'))
                          <div class="alert alert-info alert-block">
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



                         

             
                         
                            <div id="example-basic">
                                <h3>Data Kendaraan</h3>
                                <section>   
                                    <div class="product-delivary">
                                      <div class="form-group">
                                        @foreach ($no_urut as $no_urut)  
                                            <input id="id" name="id" type="hidden" class="form-control" value="{{$no_urut->no_urut}}">
                                         @endforeach
                                        </div>

                                <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <div class="review-content-section">
                                        <div class="form-group">
                                            <label for="card-number" class="form-label">Tempat Servis</label>
                                            <select id="tempat_servis" name="tempat_servis" type="text" class="form-control" style="float: right;" {{$cek}} >
                                               @foreach ($data as $dt)  
                                                <option >{{$dt->id}} </option>


                                               @endforeach
                                            </select>
                                        </div>
                                           </div>
                                        </div>



                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

                                            
                                             <div class="review-content-section">
                                             <label for="card-number" class="form-label">Nopol</label>
                                                <div class="row">
                                                <div class="col-md-4">
                                                    <input id="nopol1" name="nopol1" type="text" maxlength="2" class="form-control" required="" onchange="ajaxGenerateNopol()" onkeyup="this.value = this.value.toUpperCase()" {{$cek}} >
                                                </div>
                                                <div class="col-md-4">
                                                    <input id="nopol2" name="nopol2" type="text" class="form-control" maxlength="4" required="" onkeypress="return isNumberKey(event)" onchange="ajaxGenerateNopol()" {{$cek}}>
                                                </div>
                                                <div class="col-md-4">
                                                    <input id="nopol3" name="nopol3" type="text readonly" class="form-control" required="" maxlength="3" onchange="ajaxGenerateNopol()" onkeyup="this.value = this.value.toUpperCase()" {{$cek}}>
                                                </div>
                                                
                                                </div>                      
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <div class="review-content-section">
                                                <div class="form-group">
                                                    <label for="card-number" class="form-label">No Mesin</label>
                                                    <input id="no_mesin" name="no_mesin" type="text" class="form-control" {{$cek}}>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <div class="review-content-section">
                                                 <div class="form-group">
                                                    <label for="card-number" class="form-label">Merek Kendaraan</label>
                                                    
                                                    <select class="form-control" tabindex="-1" id="merek" name="merek" {{$cek}}>
                                                        <option> </option>
                                                        @foreach ($merek as $mk)             
                                                        <option>{{$mk -> merek}}</option>
                                                        @endforeach


                                                                      
                                                              
                                                    </select>
                                                        <!--<input id="merek" name="merek" type="text" class="form-control"> -->
                                                </div>
                                            </div>
                                    </div>                                  
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <div class="review-content-section">
                                        <div class="form-group">
                                            <label for="address" class="form-label">Tipe Kendaraan</label>
                                                <select class=" form-control" tabindex="-1" id="tipe" name="tipe" {{$cek}}>
                                                            <option> </option>
                                                    
                                                        @foreach ($tipe as $mk)             
                                                            <option>{{$mk -> tipe}}</option>
                                                        @endforeach          
                                                
                                                </select>

                                        </div>
                                    </div>
                                        </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <div class="review-content-section">
                                         <div class="form-group">
                                            <label for="phone-2" class="form-label">Warna</label>
                                            <select class="form-control" tabindex="-1" id="warna" name="warna" {{$cek}}>
                                                            <option> </option>
                                                    
                                                        @foreach ($warna as $mk)             
                                                            <option>{{$mk -> warna}}</option>
                                                        @endforeach          
                                                
                                                </select>
                                        </div>
                                    </div>
                                   </div>
                                   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                        <div class="form-group">
                                            <label for="city" class="form-label">Keluhan</label>
                                            <textarea id="keluhan" name="keluhan" type="text" class="form-control" {{$cek}}> </textarea>
                                            
                                        </div>
                                    </div>
                                        </div>

                                       
                                    </div>
                                </div>
                                </section>
                                <h3>Data Pelanggan</h3>
                                <section>
                              
                                    <div class="payment-details">
                                        <div class="form-group mg-t-15">
                                            <label for="card-number" class="form-label">Nama Pelanggan</label>
                                            <input id="nama" class="form-control" type="text" name="nama" {{$cek}}>
                                        </div>
                    
                                        <div class="form-group mg-t-15">
                                            <label for="card-number" class="form-label">No Telepon (62)</label>
                                            <input id="hp" class="form-control" type="text" name="hp" maxlength="13" required="" onkeypress="return isNumberKey(event)" {{$cek}}>
                                        </div>  

                                        <div class="form-group">
                                            <label for="promotional-code" class="control-label">Alamat</label>
                                             <textarea id="alamat" class="form-control" type="text" name="alamat" {{$cek}}> </textarea>
                                        </div>

                                       
                                        <button type="submit" id="miniInfoAnimation" class="btn btn-primary btn-block">Simpan</button> 

                                    </div>
                                        
                                </section>
                                                                    

                            </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

					

		
	
		

@endsection


<script type="text/javascript"> 
/*    $(document).ready(function() {     
    $('#merek').select2(); });*/
</script>

<script type="text/javascript">
        function ajaxGenerateMerek() {


            var id = document.getElementById('merek').value;

            var _token = $('input[name="_token"]').val();

            $.ajax({
                method: "GET",
                url: "ajax/pelgenerateMerek/" + id,
                dataType: "json",
                data: {_token: _token},
                success: function (data) 
                {
                    console.log();
                    if (data['data'].length > 0) {
                        $("#tipe").val(data['data'][0].tipe);
                   
                    } else {
                        $("#tipe").val('');
          
                    }

                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        }
        
    </script>


 <script type="text/javascript">
        function ajaxGenerateNopol() {


            var str1 = document.getElementById('nopol1').value;
            var str2 = document.getElementById('nopol2').value;
            var str3 = document.getElementById('nopol3').value;
            var link_id = str1 +" "+ str2 +" "+ str3;

            var _token = $('input[name="_token"]').val();

            $.ajax({
                method: "GET",
                url: "ajax/pelgenerateNopol/" + link_id,
                dataType: "json",
                data: {_token: _token},
                success: function (data) 
                {
                    console.log();
                    if (data['data'].length > 0) {
                        $("#merek").val(data['data'][0].merek);
                        $("#no_mesin").val(data['data'][0].no_mesin);
                        $("#tipe").val(data['data'][0].tipe);
                        $("#warna").val(data['data'][0].warna);
                        $("#nama").val(data['data'][0].nama);
                        $("#alamat").val(data['data'][0].alamat);
                        $("#hp").val(data['data'][0].hp);
                    } else {
                        $("#merek").val('');
                        $("#no_mesin").val('');
                        $("#tipe").val('');
                        $("#warna").val('');
                        $("#nama").val('');
                        $("#alamat").val('');
                        $("#hp").val('');
                    }

                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        }
        
    </script>

    <SCRIPT language=Javascript>
      <!--
      function isNumberKey(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

         return true;
      }
      //-->
   </SCRIPT>
