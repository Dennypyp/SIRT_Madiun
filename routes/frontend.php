<?php 

Route::name('frontend.')->group(function(){
    Route::group(['namespace' => 'Frontend'], function () {
        
        Route::resource('/', 'FrontendController');
        Route::group([  'middleware' => ['auth'=>'CheckRole:admin,warga']], function () {
            Route::resource('surat', 'SuratController');
            Route::resource('jimpitan_warga', 'JimpitanController');
        });


    });
});



?>