<?php

namespace Modules\Auth\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Modules\Core\Services\NavMenuService;

class AssignMenuItems
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        NavMenuService::set([]);
        
        return $next($request);
    }
}
