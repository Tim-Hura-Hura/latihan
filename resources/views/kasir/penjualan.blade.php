@extends ('master.kasir')


@section ('content')
<div class="single-product-tab-area mg-tb-15">
    <!-- Single pro tab review Start-->
    <div class="single-pro-review-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="review-tab-pro-inner">

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
                    
                        <ul id="myTab3" class="tab-review-design">
                            <li class="active"><a href="#description"><i class="fa fa-plus" aria-hidden="true"></i> Tambah Penjualan</a></li>
                        </ul>
                        <div id="myTabContent" class="tab-content custom-product-edit">
                            <div class="product-tab-list tab-pane fade active in" id="description">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="review-content-section">
                                            <div class="card-block">  

                                          
                                                <form action="{{route('kasir_penjualan.store')}}"  method="post" enctype="multipart/form-data">
                                                    {{csrf_field()}}
                                                    <div class="row">
                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                            <div class="review-content-section">
                                                                <div class="form-group">
                                                                    @foreach($generatePNJ as $records)
                                                                    <label for="card-number" class="form-label">ID NOTA</label>
                                                                    <input id="id_nota" name="id_nota" type="text" class="form-control" readonly="" value="{{$records->id_nota}}">
                                                                    @endforeach
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="card-number"erateNop class="form-label">Nopol</label>
                                                                    <!-- <select id="nopol" name="nopol" type="text" class="form-control" onchange="ajaxGenerateNopol()" >
                                                                        <option> </option>
                                                                       @foreach($listnopol as $records)
                                                                        <option>{{$records->listnopol}}</option>
                                                                       @endforeach
                                                                    </select> -->
                                                                  <!--   <input id="nopol" name="nopol" type="text" class="form-control" onkeyup="ajaxGenerateNopol()" ></input> -->
                                     
                             
                                                                    <select data-placeholder=" "  class="chosen-select form-control" tabindex="-1" id="nopol" name="nopol" onchange="ajaxGenerateNopol()" >
                                                                        
                                                                            <option> </option>
                                                                           @foreach($listnopol as $records)
                                                                            <option>{{$records->listnopol}}</option>
                                                                           @endforeach
                                                                    
                                                                    
                                                                        </select>
                                  
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="card-number" class="form-label">Nama Mekanik</label>
                                                                     <select id="mekanik" name="mekanik" type="text" class="form-control" >
                                                                        <option> </option>
                                                                       @foreach($mekanik as $records2)
                                                                        <option>{{$records2->nama}}</option>
                                                                       @endforeach
                                                                    </select>
                                                            
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="card-number" class="form-label">Nama Penerima</label>
                                                                    <input id="penerima" name="penerima" type="text" class="form-control">
                                                                </div>
                                                  
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                            <div class="review-content-section">
                                                                <div class="form-group">  
                                                                    <label for="card-number" class="form-label">Kode Barang / Nama Barang</label>
                                                                    <div class="row">                                
                                                                    <div class="form-group form-inline">
                                                                        <div class="col-sm-6">                       
                                                                            <input id="kode_barang" onkeyup="ajaxGenerateKodeBarang('kode')" name="kode" type="text" class="form-control" readonly="">
                                                                        </div>
                                                                        <div class="col-sm-6">
                                                                            <select id="nama_barang" onchange="ajaxGenerateKodeBarang('nama')" name="nama" type="text" class="form-control" style="width:222px">
                                                                                    <option> </option>
                                                                                   @foreach($barang as $records2)
                                                                                    <option>{{$records2->nama_barang}}</option>
                                                                                   @endforeach

<!--                                                                                    chosen-select 
 -->                                                                        
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group ">
                                                                    <label for="card-number" class="form-label">Kode Jasa / Nama Jasa</label>
                                                                    <div class="row">
                                                                    <div class="form-group form-inline  ">
                                                                       
                                                                        <div class="col-sm-6">
                                                                            
                                                                            <input id="kode_jasa" onkeyup="ajaxGenerateKodeJasa('kode')" name="kode_jasa" type="text" class="form-control" readonly="">

                                                                        </div>
                                                                        
                                                                         <div class="col-sm-6">
                                                                        <select id="nama_jasa" onchange="ajaxGenerateKodeJasa('nama')" name="nama_jasa" type="text" data-placeholder=" "  class="form-control" style="width:222px">
                                                                               <option> </option>
                                                                               @foreach($jasa as $records2)
                                                                                <option>{{$records2->jenis_jasa}}</option>
                                                                               @endforeach
                                                                    
                                                                        </select>
                                                                        <!--                                                                                    chosen-select 
 -->                                                                        
                                                                        </div>
                                                                    </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="card-number" class="form-label">Jumlah</label>
                                                                    <input id="jumlah" name="jumlah" type="number" value="0" min="0"  class="form-control">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="card-number" class="form-label">Harga</label>
                                                                    <input id="harga" name="harga" type="text" class="form-control" readonly="">
                                                                    <input id="harga_beli" name="hargabeli" type="hidden" class="form-control">
                                                                  
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                            </div>
                                            <div class="text-center">
                                               
                                                
                                                <button type="button" onclick="pending()"  class="btn btn-warning" >Pending
                                                </button>                                                
                                                
                                                <button type="button" onclick="tambahDetail()" class="btn btn-primary waves-effect waves-light" style="float: right;">Tambah</button>
                                                
                                                                                                       
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
<div class="product-cart-area mg-tb-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div id="myTabContent" class="tab-content custom-product-edit">
                    <div class="product-tab-list tab-pane fade active in" id="description">
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="review-content-section">
                                    <div class="input-group mg-b-pro-edt">
                                     <label>Total Biaya</label>

                                        <input type="text" id="total" value="{{$total}}" readonly="" class="form-control" placeholder="Total Bayar">

                                    </div>



                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="review-content-section">
                                    <div class="input-group mg-b-pro-edt">
                                        <label>Bayar</label>
                                        
                                                @foreach($generatePNJ2 as $generatePNJ2)
                                        <form enctype="multipart/form-data" action="{{ route('kasir_penjualan.update',$generatePNJ2->id_nota) }}" method="post" >
                                        {{csrf_field()}}
                                        {{ method_field('PUT')}} 

                                        <input id="bayar" name="bayar" type="number"  class="form-control">
                                        
                                        <input id="pending" name="penidng" type="hidden" value="false"  class="form-control">
                                        
                                       
                                        @endforeach
                                        </form>
                                    </div>


                                </div>
                            </div>
                                 <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" style="float: right;">
                                <div class="review-content-section">
                                    <div class="input-group mg-b-pro-edt custom-pro-edt-ds">
                                        <button type="button" onclick="bayar()" class="btn btn-primary waves-effect waves-light m-r-10">Bayar
                                        </button>
                                        


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
                                <h1>Detail <span class="table-project-n">Penjualan</span></h1>
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
                                            <th data-field="name" data-editable="false">Nama Barang/Jasa</th>
                                            <th data-field="company" data-editable="false">Jumlah</th>
                                            <th data-field="price" data-editable="false">Harga</th>
                                            <th data-field="date" data-editable="false">Subtotal</th>
                                            <th data-field="action">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tabelnya">
                                        @foreach($detail as $result)
                                        <tr>
                                            <td>{{$result->nama_barang_jasa}}</td>
                                            <td>{{$result->jumlah}}</td>
                                            <td>Rp {{$result->harga}}</td>
                                            <td>Rp {{$result->sub_total}}</td>
                                            <td><button class='fa fa-trash btn btn-danger' onclick="deletedetail('{{$result->id}}')"></button>
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

    
    <script type="text/javascript">
        function deletedetail(id) {
                var link_id = id;

                var _token = $('input[name="_token"]').val();
                $.ajax({
                    type: 'DELETE',
                    url: "kasir_penjualan/" + link_id,
                    dataType: "json",
                    data: {id : id,_token: _token},
                    success: function (data) {                        
                    $('#tabelnya').find('tr').remove().end();
                    for (var i = 0; i < data['detail'].length; i++) {
                            $("#tabelnya").append("<tr><td>" + data['detail'][i].nama_barang_jasa + "</td><td>" + data['detail'][i].jumlah + "</td><td>Rp " + data['detail'][i].harga_jual + "</td> <td>Rp " + data['detail'][i].sub_total + "</td><td><button class='fa fa-trash btn btn-danger' onclick=deletedetail('"+data['detail'][i].id+"')></button></td></tr>");
                            document.getElementById('total').value = data['total'][0].total;
                        
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
            var link_id = document.getElementById('nopol').value;
            var _token = $('input[name="_token"]').val();

            $.ajax({
                method: "GET",
                url: "ajax/generateNopol/" + link_id,
                dataType: "json",
                data: {_token: _token},
                success: function (data) {
                    $("#penerima").val(data['data'][0].nama);
                    if (data['data'][0].id_nota!=null) {
                        document.getElementById('id_nota').value = data['data'][0].id_nota;
                        document.getElementById('total').value = data['total'][0].total;
                        document.getElementById('pending').value = "true";
                    }
                    else{
                        document.getElementById('total').value = 0;

                    }
                    $.ajax({
                        method: "GET",
                        url: "ajax/generateDetail/" + data['data'][0].id_nota,
                        dataType: "json",
                        data: {_token: _token},
                        success: function (data) {
                            $('#tabelnya').find('tr').remove().end();
                            for (var i = 0; i < data.length; i++) {
                                    $("#tabelnya").append("<tr><td>" + data[i].nama_barang_jasa + "</td><td>" + data[i].jumlah + "</td><td>Rp " + data[i].harga_jual + "</td> <td>Rp " + data[i].sub_total + "</td><td><button class='fa fa-trash btn btn-danger' onclick=deletedetail('"+data[i].id+"')></button></td></tr>");
                                
                            }
                        },
                        error: function (data) {
                            console.log('Error:', data);
                        }
                    });
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        }
    </script>

    <script type="text/javascript">
        function ajaxGenerateKodeBarang(status) {
                var kode = document.getElementById('kode_barang').value;
                var nama = document.getElementById('nama_barang').value;
                
                document.getElementById('nama_jasa').value = "";
                document.getElementById('kode_jasa').value = "";
                document.getElementById('harga').value = "";
                document.getElementById('harga_beli').value = "";

                
            if (status=="kode") {
                    var link_id = kode;
            }
            else{
                    var link_id = nama;
            }

                var _token = $('input[name="_token"]').val();

                $.ajax({
                    method: "GET",
                    url: "ajax/generateKodeBarang/" + link_id,
                    dataType: "json",
                    data: {_token: _token},
                    success: function (data) {
                        if (!$.trim(data)) {
                            document.getElementById('nama_barang').value = "";
                            document.getElementById('kode_barang').value = "";
                        }
                        for (var i = 0; i < data.length; i++) {

                            $("#kode_barang").val(data[i].kode_barang);
                            $("#nama_barang").val(data[i].nama_barang);
                            $("#harga").val(data[i].harga_jual);
                            $("#harga_beli").val(data[i].harga_beli);
                       
                            document.getElementById('jumlah').max = data[i].jumlah;
                        }
                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
                });
            
        }
    </script>
    <script type="text/javascript">
        function ajaxGenerateKodeJasa(status) {

                var kode = document.getElementById('kode_jasa').value;
                document.getElementById('kode_barang').value = "";
                var nama = document.getElementById('nama_jasa').value;
                document.getElementById('nama_barang').value = "";
                document.getElementById('harga').value = "";
                document.getElementById('harga_beli').value = "";
                   
            if (status=="kode") {
                    var link_id = kode;
            }
            else{
                    var link_id = nama;
            }

                var _token = $('input[name="_token"]').val();

                $.ajax({
                    method: "GET",
                    url: "ajax/generateKodeJasa/" + link_id,
                    dataType: "json",
                    data: {_token: _token},
                    success: function (data) {
                        if (!$.trim(data)) {
                            document.getElementById('kode_jasa').value = "";
                            document.getElementById('nama_jasa').value = "";
                        }
                        for (var i = 0; i < data.length; i++) {
                            $("#kode_jasa").val(data[i].id_jasa);
                            $("#nama_jasa").val(data[i].jenis_jasa);
                            $("#harga").val(data[i].harga);
                            $("#harga_beli").val(0);
                            document.getElementById('jumlah').max = 99;
                        }
                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
                });
            
        }
    </script>

    <script type="text/javascript">
        function tambahDetail() {
            var id_nota = document.getElementById('id_nota').value;
            var kodejasa = document.getElementById('kode_jasa').value;
            var namajasa = document.getElementById('nama_jasa').value;
            var kodebarang = document.getElementById('kode_barang').value;
            var namabarang = document.getElementById('nama_barang').value;
            var harga_beli = document.getElementById('harga_beli').value;
            if (kodejasa == "") {
                var kode = kodebarang;
                var nama = namabarang;
            } else if (kodebarang == "") {
                var kode = kodejasa;
                var nama = namajasa;
            }
            var harga = document.getElementById('harga').value;
            var jumlah = document.getElementById('jumlah').value;
            var subtotal = harga * jumlah;
            var total = parseInt(document.getElementById('total').value)+parseInt(subtotal);
            document.getElementById('total').value = total;
            $.ajax({
                method: "POST",
                url: "{{ url('ajax/tambahDetail') }}",
                data: {
                    nama: nama,
                    harga: harga,
                    jumlah: jumlah,
                    subtotal: subtotal,
                    hargabeli: harga_beli,
                    id_nota: id_nota,
                    _token: $('meta[name="csrf-token"]').attr('content')
                },

                dataType: "json",
                beforeSend: function () {
                    console.log(this.data);
                },
                success: function (data) {
                    $('#tabelnya').find('tr').remove().end();
                    for (var i = 0; i < data.length; i++) {
                           $("#tabelnya").append("<tr><td>" + data[i].nama_barang_jasa + "</td><td>" + data[i].jumlah + "</td><td>Rp " + data[i].harga_jual + "</td> <td>Rp " + data[i].sub_total + "</td><td><button class='fa fa-trash btn btn-danger' onclick=deletedetail('"+data[i].id+"')></button></td></tr>");
                        
                    }
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        }


    </script>

    <script type="text/javascript">
        function pending() {
            var id_nota = document.getElementById('id_nota').value;
            var nopol = document.getElementById('nopol').value;
            var mekanik = document.getElementById('mekanik').value;
            var penerima = document.getElementById('penerima').value;
            var total = document.getElementById('total').value;
            var pending = document.getElementById('pending').value;
            $.ajax({
                method: "POST",
                url: "{{ route('kasir_penjualan.store') }}",
                data: {
                    id_nota: id_nota,
                    nopol: nopol,
                    mekanik: mekanik,
                    penerima: penerima,
                    total: total,
                    pending: pending,
                    _token: $('meta[name="csrf-token"]').attr('content')
                },

                beforeSend: function () {
                },

                success: function (data) {
        
                    alert("Sukses menambahkan pending penjualan");
                    // window.open('pending/'+id_nota);

                  window.location = "{{route('kasir_lane.index')}}";
                }

                


            });
        }


    </script>


    <script type="text/javascript">
        function bayar() {
            var id_nota = document.getElementById('id_nota').value;
            var nopol = document.getElementById('nopol').value;
            var mekanik = document.getElementById('mekanik').value;
            var penerima = document.getElementById('penerima').value;
            var total = document.getElementById('total').value;
            var bayar = document.getElementById('bayar').value;
            var kembalian = bayar-total;
            var pending = document.getElementById('pending').value;
            $.ajax({
                type: "PUT",
                url: "kasir_penjualan/"+id_nota,
                data: {
                    id_nota: id_nota,
                    nopol: nopol,
                    mekanik: mekanik,
                    penerima: penerima,
                    total: total,
                    bayar : bayar,
                    pending: pending,
                    _token: $('meta[name="csrf-token"]').attr('content')
                },

                beforeSend: function () {
                },
                success: function (data) {
        
                    alert("Sukses menyelesaikan pembayaran. Pembayaran : Rp "+bayar+" & Kembalian : Rp "+kembalian);
                    window.open('nota/'+id_nota);
                    window.location = "{{route('kasir_penjualan.index')}}";





                  
                }
            });
        }


    </script>






    @endsection
