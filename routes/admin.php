<?php

Route::prefix('admin')->group(function () {

    Route::get('localization/{locale}', function ($locale) {
        Session::put('locale', $locale);
        return redirect()->back();
    })->name('admin.locale');

    Route::group(['middleware' => ['role:admin']], function () {
        Route::resource('admin', 'AdminController', ['only' => ['index']]);
        Route::get('slider', 'SliderController@slider')->name('admin.slider');
        Route::post('slider-upload', 'SliderController@sliderUpload')->name('admin.slider.upload');



        Route::get('user', 'AdminController@user')->name('admin.user');
        Route::get('icons', 'AdminController@icons')->name('admin.icons');
        Route::get('notifications', 'AdminController@notifications')->name('admin.notifications');
        Route::get('table', 'AdminController@table')->name('admin.table');
        Route::get('maps', 'AdminController@maps')->name('admin.maps');
    });
});