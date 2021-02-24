<?php 
Route::resource('rt_admin', 'admin\AdminController');

Route::resource('kk', 'admin\KKController');
Route::get('kk/destroy/{id}', 'admin\KKController@destroy');

Route::resource('anggota', 'admin\AnggotaKKController');
Route::get('anggota/destroy/{id}', 'admin\AnggotaKKController@destroy');

Route::resource('pemasukan', 'admin\PemasukanController');
Route::get('pemasukan/destroy/{id}', 'admin\PemasukanController@destroy');

Route::resource('pengeluaran', 'admin\PengeluaranController');
Route::get('pengeluaran/destroy/{id}', 'admin\PengeluaranController@destroy');

Route::resource('jimpitan', 'admin\JimpitanController');

Route::prefix('/jimpitan')->group(function ()
{
    Route::get('/bayar/{id}', 'admin\JimpitanController@bayar')->name('jimpitan.bayar');
});

Route::resource('lapkeu', 'admin\LaporanController');

Route::get('/laporan_jimpitan', 'admin\LaporanController@jimpitan');
?>