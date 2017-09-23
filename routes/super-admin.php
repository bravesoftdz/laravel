<?php

Route::group(['middleware' => ['role:super-admin']], function () {

    Route::prefix('admin')->group(function () {

        Route::namespace('Admin')->group(function () {
            Route::resource('admins', 'AdminsController', ['except' => ['show']]);
            Route::get('login/{id}', 'AdminsController@loginById')->name('admin.login');;
        });
    });
});