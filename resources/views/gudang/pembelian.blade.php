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
                            <li class="active"><a href="#description"><i class="fa fa-plus" aria-hidden="true"></i> Tambah Pembelian</a></li>
                        </ul>
                        <div id="myTabContent" class="tab-content custom-product-edit">
                            <div class="product-tab-list tab-pane fade active in" id="description">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="review-content-section">
                                            <div class="card-block">  

                                          
                                                <form action="{{route('gudang_pembelian.store')}}"  method="post" enctype="multipart/form-data">
                                                    {{csrf_field()}}
                                                    <div class="row">
                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                            <div class="review-content-section">
                                                                <div class="form-group" hidden="">
                                                                    @foreach($generatePMB as $records)
                                                                    <label for="card-number" class="form-label">ID NOTA</label>
                                                                    <input id="id_nota" name="id_nota" type="text" class="form-control" readonly="" value="{{$records->id_nota}}">
                                                                    @endforeach
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="card-number" class="form-label">Kode Barang</label>                                                          
                                                                    <input id="kode_barang" onkeyup="ajaxGenerateKodeBarang('kode')" name="kode" type="text" class="form-control" required="" readonly="">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="card-number" class="form-label">Nama Barang</label>
                                                                     <select id="nama_barang" onchange="ajaxGenerateKodeBarang('nama')" name="nama" type="text" data-placeholder=" "  class="chosen-select form-control" tabindex="-1">
                                                                                <option> </option>
                                                                               @foreach($barang as $records2)
                                                                                <option>{{$records2->nama_barang}}</option>
                                                                               @endforeach
                                                                    
                                                                        </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="card-number" class="form-label">Jumlah</label>
                                                                    <input id="jumlah" name="jumlah" type="number" value="0" min="0" class="form-control">
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                            <div class="review-content-section">
                                                                
                                                                 <div class="form-group">
                                                                    <label for="card-number" class="form-label">Harga Beli</label>
                                                                    <input id="harga_beli" name="harga_beli" type="number" class="form-control">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="card-number" class="form-label">Harga Jual</label>
                                                                    <input id="harga_jual" name="harga_jual" type="number" class="form-control">
                                                                </div>
                                                               
                                                                <div class="form-group">
                                                                    <label for="card-number" class="form-label">Suplier</label>
                                                                    <input id="suplier" name="suplier" type="text" class="form-control">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                            </div>
                                            <div class="text-center">
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
                                        <input type="text" id="total" value="{{$total}}"readonly="" class="form-control" placeholder="Total Bayar">

                                    </div>



                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="review-content-section">
                                    <div class="input-group mg-b-pro-edt">
                                        <label>Bayar</label>
                                        <input id="bayar" name="bayar" type="text" class="form-control">
                                        

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
                                <h1>Detail <span class="table-project-n">Pembelian</span></h1>
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
                                            <th data-field="name" data-editable="false">Nama Barang</th>
                                            <th data-field="company" data-editable="false">Jumlah</th>
                                            <th data-field="price" data-editable="false">Harga Beli</th>
                                            <th data-field="price2" data-editable="false">Harga Jual</th>
                                            <th data-field="date" data-editable="false">Subtotal</th>
                                            <th data-field="date2" data-editable="false">Suplier</th>
                                            <th data-field="action">Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tabelnya">
                                        @foreach($detail as $result)
                                        <tr>
                                            <td>{{$result->nama_barang}}</td>
                                            <td>{{$result->jumlah}}</td>
                                            <td>Rp {{$result->harga_beli}}</td>
                                            <td>Rp {{$result->harga_jual}}</td>
                                            <td>Rp {{$result->sub_total}}</td>
                                            <td>{{$result->suplier}}</td>
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
               function ajaxGenerateKodeBarang(status) {
                var kode = document.getElementById('kode_barang').value;
                var nama = document.getElementById('nama_barang').value;
                var harga_jual = document.getElementById('harga_jual').value;
               if (status=="kode") {
                    var link_id = kode;
                }
                else{
                        var link_id = nama;
                }

                var _token = $('input[name="_token"]').val();

                $.ajax({
                    method: "GET",
                    url: "ajax_pmb/generateKodeBarang/" + link_id,
                    dataType: "json",
                    data: {_token: _token},
                    success: function (data) {
                        if (!$.trim(data)) {
                            document.getElementById('nama_barang').value = "";
                            document.getElementById('kode_barang').value = "";
                            document.getElementById('harga_jual').value = "";
                        }
                        for (var i = 0; i < data.length; i++) {
                            $("#kode_barang").val(data[i].kode_barang);
                            $("#nama_barang").val(data[i].nama_barang);
                            $("#harga_jual").val(data[i].harga_jual);
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
            var id_nota     = document.getElementById('id_nota').value;
            var kodebarang  = document.getElementById('kode_barang').value;
            var namabarang  = document.getElementById('nama_barang').value;
            var harga_beli  = document.getElementById('harga_beli').value;
            var harga_jual  = document.getElementById('harga_jual').value;
            var suplier     = document.getElementById('suplier').value;
            var jumlah      = document.getElementById('jumlah').value;
            var nama = namabarang;
            var subtotal = harga_beli * jumlah;
            var total = parseInt(document.getElementById('total').value)+parseInt(subtotal);
            document.getElementById('total').value = total;
            $.ajax({
                method: "POST",
                url: "{{ url('ajax_pmb/tambahDetail') }}",
                data: {
                    nama: nama,
                    harga_beli: harga_beli,
                    harga_jual: harga_jual,
                    jumlah: jumlah,
                    subtotal: subtotal,
                    suplier: suplier,
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
                           $("#tabelnya").append("<tr><td>" + data[i].nama_barang + "</td> <td>" + data[i].jumlah + "</td><td>Rp " + data[i].harga_beli + "</td><td>Rp " + data[i].harga_jual + "</td> <td>Rp " + data[i].sub_total + "</td> <td>" + data[i].suplier + "</td><td><button class='fa fa-trash btn btn-danger' onclick=deletedetail('"+data[i].id+"')></button></td></tr>");
                        
                    }
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });

            link_id = document.getElementById('id_nota').value;


            $.ajax({
                method: "GET",
                url: "ajax_pmb/generateDetail/" + link_id,
                dataType: "json",
                data: {_token: _token},
                success: function (data) {
                    $('#tabelnya').find('tr').remove().end();
                    for (var i = 0; i < data.length; i++) {
                            $("#tabelnya").append("<tr><td>" + data[i].nama_barang + "</td> <td>Rp " + data[i].jumlah + "</td><td>" + data[i].harga_beli + "</td><td>Rp " + data[i].harga_jual + "</td> <td>Rp " + data[i].sub_total + "</td> <td>" + data[i].suplier + "</td><td><button class='fa fa-trash btn btn-danger' onclick=deletedetail('"+data[i].id+"')></button></td></tr>");
                        
                    }
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });

        }
    </script>

    <script type="text/javascript">
        function deletedetail(id) {
                var link_id = id;

                var _token = $('input[name="_token"]').val();
                $.ajax({
                    type: 'DELETE',
                    url: "gudang_pembelian/" + link_id,
                    dataType: "json",
                    data: {id : id,_token: _token},
                    success: function (data) {
                    $('#tabelnya').find('tr').remove().end();
                    for (var i = 0; i < data['detail'].length; i++) {
                             $("#tabelnya").append("<tr><td>" + data['detail'][i].nama_barang + "</td><td>Rp " + data['detail'][i].jumlah + "</td><td>" + data['detail'][i].harga_beli + "</td><td>Rp " + data['detail'][i].harga_jual + "</td> <td>Rp " + data['detail'][i].sub_total + "</td> <td>" + data['detail'][i].suplier + "</td><td><button class='fa fa-trash btn btn-danger' onclick=deletedetail('"+data['detail'][i].id+"')></button></td></tr>");
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
        function bayar() {
            var id_nota = document.getElementById('id_nota').value;
            var total = document.getElementById('total').value;
            var bayar = document.getElementById('bayar').value;
            var kembalian = bayar-total;
            $.ajax({
                type: "PUT",
                url: "gudang_pembelian/"+id_nota,
                data: {
                    id_nota: id_nota,
                    total: total,
                    bayar : bayar,
                    _token: $('meta[name="csrf-token"]').attr('content')
                },

                beforeSend: function () {
                },
                success: function (data) {
        
                    alert("Sukses menyelesaikan pembayaran. Pembayaran : Rp "+bayar+" & Kembalian : Rp "+kembalian);
                    // window.open('nota_pembelian/'+id_nota);
                    window.location = "{{route('gudang_pembelian.index')}}";





                  
                }
            });
        }


    </script>








    @endsection
