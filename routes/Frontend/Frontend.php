<?php

/**
 * Frontend Controllers
 * All route names are prefixed with 'frontend.'.
 */
Route::get('/', 'FrontendController@index')->name('index');
Route::post('/get/states', 'FrontendController@getStates')->name('get.states');
Route::post('/get/cities', 'FrontendController@getCities')->name('get.cities');
Route::get('aboutus', 'FrontendController@aboutus')->name('aboutus');
Route::get('services', 'FrontendController@services')->name('services');
/*
 * These frontend controllers require the user to be logged in
 * All route names are prefixed with 'frontend.'
 */
Route::group(['middleware' => 'auth'], function () {
    Route::group(['namespace' => 'User', 'as' => 'user.'], function () {
        /*
         * User Dashboard Specific
         */
        Route::get('dashboard', 'DashboardController@index')->name('dashboard');

        /*
         * User Account Specific
         */
        Route::get('account', 'AccountController@index')->name('account');

        /*
         * User Profile Specific
         */
        Route::patch('profile/update', 'ProfileController@update')->name('profile.update');

        /*
         * Packages List
         */
        Route::get('package', 'PackageController@index')->name('package');
		//Route::get('package/purchase/{packageid}', 'PackageController@purchasePackage')->name('package.purchase');
		Route::post('package/purchase', 'PackageController@purchasePackage')->name('package.purchase');
		
		Route::group( ['namespace' => 'Ticket'], function () {
		Route::resource('tickets', 'TicketsController');
        Route::post('tickets/storereply', 'TicketsController@storereply')->name('tickets.storereply');
        //For Datatable
        Route::post('tickets/get', 'TicketsTableController')->name('tickets.get');
		});
        /*
         * User Profile Picture
         */
        Route::patch('profile-picture/update', 'ProfileController@updateProfilePicture')->name('profile-picture.update');
    });
});

/*
* Show pages
*/
Route::get('pages/{slug}', 'FrontendController@showPage')->name('pages.show');
