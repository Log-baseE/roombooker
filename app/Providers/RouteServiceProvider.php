<?php

namespace roombooker\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'roombooker\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        $this->mapDashboardWebRoutes();

        $this->mapRoomWebRoutes();

        $this->mapUserWebRoutes();

        $this->mapBookingWebRoutes();
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
    }

    /**
     * Define dashboard routes
     *
     * @return void
     */
    protected function mapDashboardWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->prefix('dashboard')
             ->group(base_path('routes/web/dashboard.php'));
    }

    /**
     * Define booking routes
     *
     * @return void
     */
    protected function mapBookingWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->prefix('dashboard/bookings')
             ->group(base_path('routes/web/booking.php'));
    }

    /**
     * Define room routes
     *
     * @return void
     */
    protected function mapRoomWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->prefix('dashboard/rooms')
             ->group(base_path('routes/web/room.php'));
    }

    /**
     * Define user routes
     *
     * @return void
     */
    protected function mapUserWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->prefix('dashboard/users')
             ->group(base_path('routes/web/user.php'));
    }
}
