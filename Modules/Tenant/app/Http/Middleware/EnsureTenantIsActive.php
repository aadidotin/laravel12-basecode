<?php

namespace Modules\Tenant\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Modules\Tenant\Services\TenantResolver;

class EnsureTenantIsActive
{
    /**
     * Initializing Middleware
     */
    public function __construct(protected TenantResolver $resolver)
    {
        $this->resolver = $resolver;
    }

    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        $domain = $request->getHost();
        $tenant = $this->resolver->resolve($domain);

        if (! $tenant) {
            abort(403, 'Tenant not found or inactive.');
        }

        return $next($request);
    }
}
