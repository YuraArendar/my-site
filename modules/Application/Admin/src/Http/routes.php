<?php



Route::group(['prefix' => 'admin','namespace'=>'Application\Admin\Http'], function () {
    // Authentication routes...
    Route::get('auth/login', 'Controllers\Auth\AdminAuthController@getLogin');
    Route::post('auth/login', 'Controllers\Auth\AdminAuthController@postSign');
    Route::get('auth/logout', 'Controllers\Auth\AdminAuthController@getLogout');

    // Registration routes...
    Route::get('auth/register', 'Controllers\Auth\AdminAuthController@getRegister');
    Route::post('auth/register', 'Controllers\Auth\AdminAuthController@postRegister');

    Route::group(['middleware' => 'auth.admin'], function () {
        Route::get('/',function(){
            dd(\Auth::getUser());
        });
    });

});
