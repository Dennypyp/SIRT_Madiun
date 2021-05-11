<?php

Route::name('frontend.')->group(function(){
    Route::group(['namespace' => 'Frontend'], function () {

        Route::resource('/', 'FrontendController');
        Route::group([  'middleware' => ['auth'=>'CheckRole:admin,bendahara,warga']], function () {
            Route::resource('surat', 'SuratController');
            Route::resource('jimpitan_warga', 'JimpitanController');
            Route::resource('kegiatan_nonfisik_warga', 'Kegiatan_nonfisikwargaController');
            Route::resource('kegiatan_fisik_warga', 'Kegiatan_fisikwargaController');
        });



    });

});



?>
