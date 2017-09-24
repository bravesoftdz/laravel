<?php

Route::prefix('admin')->group(function () {

    Route::get('localization/{locale}', function ($locale) {
        Session::put('locale', $locale);
        return redirect()->back();
    })->name('admin.locale');

    Route::group(['middleware' => ['role:admin']], function () {

        Route::namespace('Admin')->group(function () {
            Route::resource('adminka', 'IndexController', ['only' => ['index']]);
            Route::resource('user', 'UserController', ['only' => ['index','destroy','update','edit']]);
            Route::get('login-user/{id}', 'UserController@loginById')->name('user.login');;

            // slider
            Route::get('slider', 'SliderController@slider')->name('admin.slider');
            Route::post('slider-upload', 'SliderController@sliderUpload')->name('admin.slider.upload');


//            Route::get('user', 'IndexController@user')->name('admin.user');
            Route::get('icons', 'IndexController@icons')->name('admin.icons');
            Route::get('notifications', 'IndexController@notifications')->name('admin.notifications');
            Route::get('table', 'IndexController@table')->name('admin.table');
            Route::get('maps', 'IndexController@maps')->name('admin.maps');
        });
    });
});