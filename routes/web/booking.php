<?php

Route::get('/', function () {
    return response('Booking route', 200);
})->name('bookings.index');

Route::post('/', function () {

})->name('bookings.store');

Route::get('/new', 'BookingController@create')->name('bookings.create.empty');

Route::post('/new', 'BookingController@create')->name('bookings.create.filled');

Route::get('/b/{id}', function () {

});

Route::get('/b/{id}/edit', function () {

});

Route::put('/b/{id}', function () {

});

Route::delete('/b/{id}', function () {

});
