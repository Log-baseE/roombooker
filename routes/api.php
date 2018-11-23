<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('contact', function (Request $request) {

});

Route::post('/roomsInBuilding', 'API\APIController@roomsInBuilding');

Route::post('/roomDetail', 'API\APIController@roomDetail');

Route::post('/accessCode', 'API\APIController@generateAccessCode');

Route::post('/accessBooking', 'API\APIController@accessBooking');

Route::post('/sign', 'API\APIController@sign');

Route::post('/checkSignature', 'API\APIController@checkSignature');

Route::post('/accept', 'API\APIController@accept');

Route::post('/reject', 'API\APIController@reject');

Route::post('/contact', 'API\MailController');
