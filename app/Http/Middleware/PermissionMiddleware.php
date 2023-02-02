<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PermissionMiddleware
{
    public function handle(Request $request, Closure $next, $permission)
    {
        if ($permission !== null && !$request->user()->can($permission)) {
            abort(403);
        }

        return $next($request);
    }
}
