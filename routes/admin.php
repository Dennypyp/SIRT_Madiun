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

    Route::resource('surat_admin', 'SuratController');

    Route::prefix('/jimpitan')->group(function ()
    {
        Route::get('/bayar/{id}', 'JimpitanController@bayar')->name('jimpitan.bayar');
    });

    Route::resource('lapkeu', 'LaporanController');
    Route::get('/laporan_jimpitan', 'LaporanController@jimpitan');

    Route::resource('saldo', 'SaldoController');


    Route::get('/surat_pengantar/{id}', 'SuratController@surat');

    Route::resource('kegiatan_nonfisik', 'Kegiatan_nonfisikController');
    Route::get('kegiatan_nonfisik/destroy/{id}', 'Kegiatan_nonfisikController@destroy');
    Route::resource('kegiatan_fisik', 'Kegiatan_fisikController');
    Route::get('kegiatan_fisik/destroy/{id}', 'Kegiatan_fisikController@destroy');

    Route::get('/status_surat/{id}', 'SuratController@status_surat');

});


?>
