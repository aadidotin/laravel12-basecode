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
            // 1. Load your allowed Central Domains from config
            // (Standard behavior in stancl/tenancy)
            $centralDomains = config('tenancy.central_domains', []);

            // 2. Check if the current Host is in that list
            if (in_array($request->getHost(), $centralDomains)) {
                // You are on the Central Domain (Admin side) -> Go to SaaS Login
                return route('saas.login');
            }

            // 3. Otherwise, you must be on a Tenant Subdomain -> Go to Tenant Login
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
