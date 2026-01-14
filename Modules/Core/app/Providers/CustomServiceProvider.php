<?php

namespace Modules\Core\Providers;

use Illuminate\Support\ServiceProvider;
use Inertia\Inertia;
use Modules\Core\Services\NavMenuService;

class CustomServiceProvider extends ServiceProvider
{
    /**
     * Boot the application provider.
     */
    public function boot(): void
    {
        Inertia::share('menu', fn() => NavMenuService::get()?->value);
    }

    /**
     * Register the service provider.
     */
    public function register(): void {}

    /**
     * Get the services provided by the provider.
     */
    /* public function provides(): array
    {
        return [];
    } */
}
