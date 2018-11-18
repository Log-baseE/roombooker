<?php

Route::get('/', function () {
    return response('Booking route', 200);
});

Route::post('/', function () {

});

Route::get('/b/new', 'BookingController@create')->name('booking.create.empty');

Route::post('/b/new', 'BookingController@create')->name('booking.create.filled');

Route::get('/b/{id}', function () {

});

Route::get('/b/{id}/edit', function () {

});

Route::put('/b/{id}', function () {

});

Route::delete('/b/{id}', function () {

});
