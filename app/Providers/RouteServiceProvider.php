<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Support\Facades\RateLimiter;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     */
    // public const HOME = '/dashboard';

    public function boot()
    {
        $this->configureRateLimiting();
        parent::boot();
    }

    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60);
        });
    }

    public function map()
    {
        $this->mapWebRoutes();
        $this->mapApiRoutes();
    }

    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace('App\\Http\\Controllers')
             ->group(base_path('routes/web.php'));
    }

    protected function mapApiRoutes()
    {
        Route::middleware('api')
             ->prefix('api')
             ->namespace('App\\Http\\Controllers')
             ->group(base_path('routes/api.php'));
    }

    public static function redirectPath()
    {
        if (Auth::guard('user')->check()) {
            return '/welcome';
        } elseif (Auth::guard('responsable')->check()) {
            return '/dashboards';
        }
        return '/';
    }
}






// protected function mapWebRoutes()
// {
//     Route::middleware('web')
//          ->group(base_path('routes/web.php'));

//     Route::middleware('web')
//          ->prefix('responsable')
//          ->group(base_path('routes/responsable.php'));
// }
