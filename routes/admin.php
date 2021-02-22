<?php 
Route::resource('test_admin', 'admin\AdminController');

Route::resource('kk', 'admin\KKController');
Route::get('kk/destroy/{id}', 'admin\KKController@destroy');

Route::resource('anggota', 'admin\AnggotaKKController');
Route::get('anggota/destroy/{id}', 'admin\AnggotaKKController@destroy');

Route::resource('pemasukan', 'admin\PemasukanController');
Route::get('pemasukan/destroy/{id}', 'admin\PemasukanController@destroy');

Route::resource('pengeluaran', 'admin\PengeluaranController');
Route::get('pengeluaran/destroy/{id}', 'admin\PengeluaranController@destroy');

?>