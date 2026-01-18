<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        //
        $middleware->appendToGroup('tenant', [
            \Stancl\Tenancy\Middleware\InitializeTenancyByDomainOrSubdomain::class,
            \Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains::class,
        ]);

        // 1. Where to send GUESTS (Unauthenticated) -> Login Page
        $middleware->redirectGuestsTo(function (Request $request) {
            if ($request->is('saas*')) {
                return route('saas.login');
            }
            return route('login');
        });

        // 2. Where to send AUTHENTICATED users -> Dashboard
        // (This runs if a logged-in user tries to hit /login)
        $middleware->redirectUsersTo(function (Request $request) {

            // Check if the user is logged in as a SaaS Admin
            if (Auth::guard('saas')->check()) {
                // Redirect to the SaaS Resource Index (Dashboard)
                return route('saas.index');
            }

            // Otherwise, assume they are a Tenant User
            return route('dashboard');
        });
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
