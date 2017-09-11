<?php

Route::group(['middleware' => ['role:admin']], function () {
    Route::prefix('admin')->group(function () {
        Route::resource('admin', 'AdminController', ['only' => ['index']]);

        Route::get('user', 'AdminController@user')->name('admin.user');
        Route::get('icons', 'AdminController@icons')->name('admin.icons');
        Route::get('notifications', 'AdminController@notifications')->name('admin.notifications');
        Route::get('table', 'AdminController@table')->name('admin.table');
        Route::get('maps', 'AdminController@maps')->name('admin.maps');
    });
});