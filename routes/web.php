<?php

Auth::routes();
Route::get('/', 'IndexController@index')->name('home');
Route::get('login/facebook', 'Auth\LoginController@redirectToProvider')->name('login.facebook');
Route::get('login/facebook/callback', 'Auth\LoginController@handleProviderCallback');