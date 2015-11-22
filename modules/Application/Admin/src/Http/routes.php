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
        // all Ajax Routes
        Route::post('language-form',['as'=>'change_form_language','uses'=>'AjaxController@postChangeLang']);


        // Routes Structure
        Route::get('structure','StructureController@getIndex');
        Route::get('structure/create',['as'=>'create_structure','uses'=>'StructureController@getCreate']);
        Route::post('structure/create','StructureController@postStore');
        Route::get('structure/edit/{id}',['as'=>'edit_structure','uses'=>'StructureController@getEdit']);
        Route::post('structure/edit/{id}',['as'=>'update_structure','uses'=>'StructureController@postUpdate']);
        Route::post('structure/rebuild','StructureController@postRebuild');
        Route::post('structure/active','StructureController@postActive');
        Route::post('structure/delete','StructureController@postDelete');

        // Routes Content
        Route::get('content','ContentController@getIndex');
        Route::get('content/structure/{id_structure}','ContentController@getList');
        Route::get('content/structure/{id_structure}/create',['as'=>'create_content','uses'=>'ContentController@getCreate']);
        Route::post('content/create',['as'=>'create_new_content','uses'=>'ContentController@postStore']);
        Route::get('content/edit/{id}',['as'=>'edit_content','uses'=>'ContentController@getEdit']);
        Route::post('content/edit/{id}',['as'=>'update_content','uses'=>'ContentController@postUpdate']);
        Route::post('content/active','ContentController@postActive');
        Route::post('content/delete','ContentController@postDelete');

    });

});
