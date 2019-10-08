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

