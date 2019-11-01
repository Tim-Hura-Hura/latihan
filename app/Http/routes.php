<?php

//route untuk kasir
Route::resource('kasir_pelanggan', 'PelangganController');
Route::resource('kasir_detail_pelanggan', 'PelangganController@detail_pelanggan');
Route::resource('kasir_kendaraan', 'KendaraanController');
Route::resource('kasir_kendaraan_detail', 'KendaraanController@detail');
Route::resource('admin_detail_kendaraan_list', 'KendaraanController@admin_detail_kendaraan_list');
Route::resource('kasir_jasa', 'JasaController');
Route::resource('kasir_tempat_servis', 'Tempat_Servis_Controller');
Route::resource('kasir_detail', 'PenjualanController@kasir_detail');
Route::resource('kasir_lane', 'LaneController');
Route::resource('kasir_penjualan', 'PenjualanController');
Route::resource('kasir_detail_sort', 'PenjualanController@kasir_detail_sort');
Route::resource('kasir_detail_list', 'PenjualanController@kasir_detail_list');
Route::resource('kasir_kendaraan_histori', 'KendaraanController@kasir_kendaraan_histori');

//penjualan2
Route::resource('kasir_penjualan2_edit', 'Penjualan2Controller@kasir_penjualan2_edit');
Route::resource('kasir_penjualan2_bayar', 'Penjualan2Controller@kasir_penjualan2_bayar');

//lane 
Route::resource('kasir_lane', 'LaneController');


//ajak penjualan
Route::get('ajax/generateNopol/{id}', 'PenjualanController@ajaxGenerateDataNopol');
Route::get('ajax/generateKodeBarang/{id}', 'PenjualanController@ajaxGenerateDataKodeBarang');
Route::get('ajax/generateKodeJasa/{id}', 'PenjualanController@ajaxGenerateDataKodeJasa');
Route::post('ajax/tambahDetail', 'PenjualanController@ajaxTambahDetail');

//ajak pelanggan
Route::get('ajax/pelgenerateNopol/{id}', 'PelangganController@ajaxGenerateDataNopol');
Route::get('ajax/pelgenerateMerek/{id}', 'PelangganController@ajaxGenerateDataMerek');

//ajak penjualan2
Route::get('ajax/generateKodeBarang2/{id}', 'Penjualan2Controller@ajaxGenerateDataKodeBarang');
Route::get('ajax/generateKodeJasa2/{id}', 'Penjualan2Controller@ajaxGenerateDataKodeJasa');
Route::post('ajax/tambahDetail2', 'Penjualan2Controller@ajaxTambahDetail');
Route::get('ajax/generateDetail2/{id}', 'Penjualan2Controller@generateDetail');

//nota	
Route::get('nota/{id}',  'NotaController@makePDF');
Route::get('pending/{id}',  'NotaController@pending');
Route::get('nota_pembelian/{id}',  'NotaController@nota_pembelian');


//Gudang
Route::resource('gudang_barang', 'BarangController');
Route::resource('gudang_stok', 'StokController');
Route::resource('gudang_pembelian', 'PembelianController');
Route::resource('gudang_detail', 'PembelianController@gudang_detail');
Route::resource('gudang_detail_sort', 'PembelianController@gudang_detail_sort');
Route::resource('gudang_detail_list', 'PembelianController@gudang_detail_list');
Route::resource('gudang_histori_pembelian', 'HistoriController@gudang_histori_pembelian');
Route::resource('gudang_histori_pembelian_sort', 'HistoriController@gudang_histori_pembelian_sort');
Route::resource('gudang_histori_penjualan', 'HistoriController@gudang_histori_penjualan');
Route::resource('gudang_histori_penjualan_sort', 'HistoriController@gudang_histori_penjualan_sort');


//ajak pembelian
Route::get('ajax_pmb/generateKodeBarang/{id}', 'PembelianController@ajaxGenerateDataKodeBarang');
Route::post('ajax_pmb/tambahDetail', 'PembelianController@ajaxTambahDetail');
Route::get('ajax_pmb/generateDetail/{id}', 'PembelianController@generateDetail')->where('id', '(.*)');

//login
Route::post('/logindata', 'LoginController@masuk');
Route::resource('login', 'LoginController@index');
Route::resource('logout', 'LoginController@logout');

//admin
Route::resource('admin_detail_pelanggan', 'PelangganController@admin_detail_pelanggan');
Route::resource('admin_detail_kendaraan', 'KendaraanController@admin_detail_kendaraan');
Route::resource('admin_barang', 'BarangController@admin_barang');
Route::resource('admin_stok', 'StokController@admin_stok');
Route::resource('admin_jasa', 'JasaController@admin_jasa');
Route::resource('admin_tempat_servis', 'Tempat_Servis_Controller@admin_tempat_servis');
Route::resource('admin_pegawai', 'PegawaiController');
Route::resource('admin_laporan_pembelian', 'LaporanPembelianController');
Route::resource('admin_penjualan_detail_list', 'LaporanPenjualanController@admin_penjualan_detail_list');
Route::resource('admin_pembelian_detail_list', 'LaporanPembelianController@admin_pembelian_detail_list');
Route::resource('admin_laporan_pembelian_sort', 'LaporanPembelianController@admin_laporan_pembelian_sort');
Route::resource('admin_laporan_penjualan', 'LaporanPenjualanController');
Route::resource('admin_laporan_penjualan_sort', 'LaporanPenjualanController@admin_laporan_penjualan_sort');