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

Route::get('/', function () {
    return view('index');
});

Route::get('/about', function () {

});

Route::get('/support', function () {

});

Route::get('/support/faq', function () {

});

Route::get('/support/contact', function () {

});

Route::post('/support/contact', function () {

});

Route::get('/signup', function () {

});

Route::post('/signup', function () {

});

Route::get('/login', function () {

});

Route::post('/login', function () {

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
