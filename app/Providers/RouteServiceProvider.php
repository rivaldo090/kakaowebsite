<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to your application's "home" route.
     *
     * @var string
     */
    public const HOME = '/dashboard';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     */
    public function boot(): void
    {
        // Tambahkan rute API
        Route::middleware('api')
            ->prefix('api')
            ->group(base_path('routes/api.php'));

        // Tambahkan rute web
        Route::middleware('web')
            ->group(base_path('routes/web.php'));
    }
}
