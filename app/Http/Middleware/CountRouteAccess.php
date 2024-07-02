<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Response;

class CountRouteAccess
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        $route = $request->route()->uri();

        if (Auth::check()) {
            Log::info("Route [" . Route::current()->uri() . "] was accessed by user id: " . Auth::id());
        } else {
            Log::info("Route [" . Route::current()->uri() . "] was accessed by a guest");
        }

        return $response;
    }
}
