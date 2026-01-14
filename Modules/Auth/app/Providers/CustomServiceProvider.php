<?php

namespace Modules\Auth\Providers;

use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;
use Modules\Auth\Http\Middleware\AssignMenuItems;

class CustomServiceProvider extends ServiceProvider
{
    /**
     * Boot the application provider.
     */
    public function boot(Router $router): void {
        
        $this->registerMiddleware($router);
    }

    /**
     * Register the service provider.
     */
    public function register(): void {}

    protected function registerMiddleware(Router $router): void
    {
        $router->aliasMiddleware('assign.menu', AssignMenuItems::class);
    }

    /**
     * Get the services provided by the provider.
     */
    /* public function provides(): array
    {
        return [];
    } */
}
