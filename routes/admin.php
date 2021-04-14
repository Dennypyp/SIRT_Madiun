<?php

Route::group([
    'namespace' => 'Admin',
    'middleware' => ['auth'=>'CheckRole:admin']
], function () {
    Route::resource('rt_admin', 'AdminController');
    Route::get("dashboardchart","AdminController@chartku");
    Route::get("dashboardchart2","AdminController@chartku2");

    // Route KK
    Route::resource('kk', 'KKController');
    Route::get('kk/destroy/{id}', 'KKController@destroy');

    // Route Anggota KK
    Route::resource('anggota', 'AnggotaKKController');
    Route::get('anggota/destroy/{id}', 'AnggotaKKController@destroy');

    // Route Transaksi
    Route::resource('transaksi', 'TransaksiController');
    Route::get('transaksi/destroy/{id}', 'TransaksiController@destroy');


    // Route Jimpitan
    Route::resource('jimpitan', 'JimpitanController');
    Route::prefix('/jimpitan')->group(function ()
    {
        Route::get('/bayar/{id}', 'JimpitanController@bayar')->name('jimpitan.bayar');
    });

    // Route Surat
    Route::resource('surat_admin', 'SuratController');
    Route::get('/surat_pengantar/{id}', 'SuratController@surat');
    Route::get('/status_surat/{id}', 'SuratController@status_surat');

    // Route Saldo
    Route::resource('saldo', 'SaldoController');
    Route::get('saldo/destroy/{id}', 'SaldoController@destroy');

    // Route Laporan Keungan
    Route::resource('lapkeu', 'LaporanController');
    Route::get('/laporan_jimpitan', 'LaporanController@jimpitan');
    Route::get('/laporan_keuangan', 'LaporanController@keuangan');

    // Route Kegiatan
    //non Fisik
    Route::resource('kegiatan_nonfisik', 'Kegiatan_nonfisikController');
    Route::get('/nonfisik_detail_kegiatan', 'Kegiatan_nonfisikController@kegiatan_nonfisik');
    Route::get('/nonfisik_status_kegiatan/{id}', 'Kegiatan_nonfisikController@status_kegiatan');
    Route::get('kegiatan_nonfisik/destroy/{id}', 'Kegiatan_nonfisikController@destroy');

    //Fisik
    Route::resource('kegiatan_fisik', 'Kegiatan_fisikController');
    Route::get('/detail_kegiatan', 'Kegiatan_fisikController@kegiatan_fisik');
    Route::get('/status_kegiatan/{id}', 'Kegiatan_fisikController@status_kegiatan');
    Route::get('kegiatan_fisik/destroy/{id}', 'Kegiatan_fisikController@destroy');


    //Route Akun
    Route::resource('/akun', 'AkunController');
    Route::prefix('/akun')->group(function ()
    {
        Route::get('/destroy/{id}', 'AkunController@destroy');
        Route::get('/editnama/{id}', 'AkunController@editnama');
        Route::post('/updatenama/{id}', 'AkunController@updatenama');
    });

});


?>
