<?php 

Route::group([
    'namespace' => 'Admin',
    'middleware' => ['auth'=>'CheckRole:admin']
], function () {
    Route::resource('rt_admin', 'AdminController');

    Route::resource('kk', 'KKController');
    Route::get('kk/destroy/{id}', 'KKController@destroy');
    
    Route::resource('anggota', 'AnggotaKKController');
    Route::get('anggota/destroy/{id}', 'AnggotaKKController@destroy');
    
    Route::resource('pemasukan', 'PemasukanController');
    Route::get('pemasukan/destroy/{id}', 'PemasukanController@destroy');
    
    Route::resource('pengeluaran', 'PengeluaranController');
    Route::get('pengeluaran/destroy/{id}', 'PengeluaranController@destroy');
    
    Route::resource('jimpitan', 'JimpitanController');
    
    Route::prefix('/jimpitan')->group(function ()
    {
        Route::get('/bayar/{id}', 'JimpitanController@bayar')->name('jimpitan.bayar');
    });
    
    Route::resource('lapkeu', 'LaporanController');
    
    Route::get('/laporan_jimpitan', 'LaporanController@jimpitan');
});

?>