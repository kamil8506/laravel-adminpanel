<?php
/**
 * Abcd
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'Abcd'], function () {
        Route::resource('abcds', 'AbcdsController');
        //For Datatable
        Route::post('abcds/get', 'AbcdsTableController')->name('abcds.get');
    });
    
});