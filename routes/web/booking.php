<?php

Route::get('/', function () {
    return response('Booking route', 200);
})->name('bookings.index');

Route::post('/', 'BookingController@store')->name('bookings.store');

Route::get('/b/{id}', 'BookingController@show')->name('bookings.show');

Route::get('/b/{id}/edit', function () {

});

Route::put('/b/{id}', function () {

});

Route::delete('/b/{id}', function () {

});


