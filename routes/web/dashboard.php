<?php

Route::get('/', 'DashboardController@index')->name('dashboard.index');

Route::get('/profile', function () {

});

Route::post('/profile', function () {

});

Route::get('/profile/edit', function () {

});

Route::get('/inbox', function () {

});

Route::get('/sign', 'MakeSignature')->name('make.signature');
