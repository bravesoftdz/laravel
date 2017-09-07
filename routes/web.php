<?php

Auth::routes();
Route::get('/', 'IndexController@index')->name('home');

Route::group(['middleware' => ['role:super-admin']], function () {
    Route::get('admin', 'AdminController@index')->name('admin');
    Route::get('admin/index', 'AdminController@index')->name('admin.index');


    Route::get('admin/user', 'AdminController@user')->name('admin.user');
    Route::get('admin/icons', 'AdminController@icons')->name('admin.icons');
    Route::get('admin/notifications', 'AdminController@notifications')->name('admin.notifications');
    Route::get('admin/table', 'AdminController@table')->name('admin.table');
    Route::get('admin/maps', 'AdminController@maps')->name('admin.maps');
});