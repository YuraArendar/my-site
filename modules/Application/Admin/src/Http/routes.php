<?php
Route::group(['prefix' => 'admin','namespace'=>'Application\Admin\Http\Controllers'], function () {
    // Authentication routes...
    Route::get('auth/login', 'Auth\AdminAuthController@getLogin');
    Route::post('auth/login', 'Auth\AdminAuthController@postSign');
    Route::get('auth/logout', 'Auth\AdminAuthController@getLogout');

    // Registration routes...
    Route::get('auth/register', 'Auth\AdminAuthController@getRegister');
    Route::post('auth/register', 'Auth\AdminAuthController@postRegister');

    Route::group(['middleware' => 'auth.admin'], function () {
        Route::get('structure','StructureController@getIndex');
        Route::get('structure/create','StructureController@getCreate');
        Route::post('structure/create','StructureController@postStore');
        Route::post('structure/edit/{id}','StructureController@getEdit');
        Route::post('structure/rebuild','StructureController@postRebuild');
    });

});
