<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param Closure(Request): (Response) $next
     */
    public function handle($request, Closure $next, ...$roles)
    {
        if (!$request->user() || !$request->user()->roles()->whereIn('role', $roles)->exists()) {
            return response()->json(['error' => 'Unauthorized', "request" => $request], 403);
        }

        return $next($request);
    }

}
