<?php
/**
 * TicketList
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'Ticket'], function () {
        Route::resource('tickets', 'TicketsController');
        //For Datatable
        Route::post('tickets/get', 'TicketsTableController')->name('tickets.get');
		Route::post('tickets/storereply', 'TicketsController@storereply')->name('tickets.storereply');
    });
    
});