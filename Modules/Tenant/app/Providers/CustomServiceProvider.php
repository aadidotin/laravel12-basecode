<?php

namespace Modules\Tenant\Providers;

use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;
use Modules\Tenant\Http\Middleware\EnsureTenantIsActive;
use Modules\Tenant\Services\TenantResolver;

class CustomServiceProvider extends ServiceProvider
{
    /**
     * Boot the application provider.
     */
    public function boot(Router $router): void
    {
        $this->registerMiddleware($router);
    }

    /**
     * Register the service provider.
     */
    public function register(): void
    {
        $this->app->singleton(TenantResolver::class);
    }

    protected function registerMiddleware(Router $router): void
    {
        $router->aliasMiddleware('tenant.active', EnsureTenantIsActive::class);
    }

    /**
     * Get the services provided by the provider.
     */
    /* public function provides(): array
    {
        return [];
    } */
}
