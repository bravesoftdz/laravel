<?php

Auth::routes();
Route::get('/', 'IndexController@index')->name('home');

Route::group(['middleware' => ['role:super-admin']], function () {
    Route::get('/admin', 'AdminController@index')->name('admin');
});