<?php
/**
 * Test
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'Test'], function () {
        Route::resource('tests', 'TestsController');
        //For Datatable
        Route::post('tests/get', 'TestsTableController')->name('tests.get');
    });
    
});