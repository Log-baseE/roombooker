<?php

Route::get('/', function () {
    return response('Booking route', 200);
})->name('drafts.index');

Route::post('/', 'BookingDraftController@store')->name('drafts.store');

Route::get('/new', 'BookingDraftController@create')->name('drafts.create.empty');

Route::post('/new', 'BookingDraftController@create')->name('drafts.create.filled');

Route::get('/d/{id}', 'BookingDraftController@show')->name('drafts.show');

Route::get('/d/{id}/edit', function () {

});

Route::put('/d/{id}', function () {

});

Route::delete('/d/{id}', function () {

});


