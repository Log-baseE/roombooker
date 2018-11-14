<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/adminator', function () {
    return view('adminator');
});

Route::get('/', 'FrontController@index');

Route::get('/rooms', function () {

});

Route::get('/support', function () {

});

Route::get('/support/faq', function () {

});

Route::get('/support/contact', function () {

});

Route::get('/signup', function () {

});

Route::post('/signup', function () {

});

Route::prefix('dashboard')->group(function () {

    Route::get('/', function () {

    });

    Route::get('/profile', function () {

    });

    Route::get('/profile/edit', function () {

    });

    Route::get('/inbox', function () {

    });

    Route::prefix('rooms')->group(function () {
        Route::get('/', function () {

        });

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
    });

    Route::prefix('reservations')->group(function () {
        Route::get('/', function () {

        });

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
    });

    Route::prefix('users')->group(function () {
        Route::get('/', function () {

        });

        Route::get('/u/{id}', function () {

        });

        Route::post('/u/{id}/verify', function () {

        });

        Route::delete('/u/{id}', function () {

        });
    });
});

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');

Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup');
Route::post('signup', 'Auth\RegisterController@register');

Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
Route::get('email/verify/{id}', 'Auth\VerificationController@verify')->name('verification.verify');
Route::get('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');

Route::get('/home', 'HomeController@index')->name('home');
