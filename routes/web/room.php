<?php

Route::get('/', 'RoomController@index')->name('rooms.index');

Route::post('/', function () {

});

Route::get('/r/add', function () {

});

Route::get('/r/{id}', function () {

});

Route::get('/r/{id}/edit', function () {

});

Route::put('/r/{id}', function () {

});

Route::delete('/r/{id}', function () {

});
