<?php
/**
 * Abc
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'Abc'], function () {
        Route::resource('abcs', 'AbcsController');
        //For Datatable
        Route::post('abcs/get', 'AbcsTableController')->name('abcs.get');
    });
    
});