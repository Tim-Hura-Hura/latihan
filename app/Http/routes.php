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
Route::resource('kasir_kendaraan_histori', 'KendaraanController@kasir_kendaraan_histori');

