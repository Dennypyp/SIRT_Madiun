<?php 
Route::resource('test_admin', 'admin\AdminController');

Route::resource('kk', 'admin\KKController');
Route::get('kk/destroy/{id}', 'admin\KKController@destroy');

Route::resource('anggota', 'admin\AnggotaKKController');
Route::get('anggota/destroy/{id}', 'admin\AnggotaKKController@destroy');

?>