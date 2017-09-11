<?php

Auth::routes();
Route::get('/', 'IndexController@index')->name('home');

Route::get('login/facebook', 'Auth\LoginController@redirectToProvider')->name('login.facebook');
Route::get('login/facebook/callback', 'Auth\LoginController@handleProviderCallback');

Route::group(['middleware' => ['role:super-admin']], function () {
    Route::get('admin', 'AdminController@index')->name('admin');
    Route::get('admin/index', 'AdminController@index')->name('admin.index');

    Route::prefix('admin')->group(function () {
        Route::resource('admins', 'AdminController', ['except' => ['show']]);

        Route::get('user', 'AdminController@user')->name('admin.user');
        Route::get('icons', 'AdminController@icons')->name('admin.icons');
        Route::get('notifications', 'AdminController@notifications')->name('admin.notifications');
        Route::get('table', 'AdminController@table')->name('admin.table');
        Route::get('maps', 'AdminController@maps')->name('admin.maps');
    });
});