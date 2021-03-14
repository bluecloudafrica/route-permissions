<?php

namespace Bluecloud\RoutePermissions;

use Illuminate\Support\ServiceProvider;

class RoutePermissionsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/config/route_permissions.php', 'route_permissions'
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/config/route_permissions.php' => config_path('route_permissions.php'),
        ]);

        $this->publishes([
            __DIR__.'/database/migrations/' => database_path('migrations')
        ], 'migrations');
    }
}
