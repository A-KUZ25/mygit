<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminPanelMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $isAuthorized = auth()->user();

        if ($isAuthorized) {

            $role = auth()->user()->role;

            if ($role == 'admin') {
                return $next($request);
            }
        }
        return redirect()->route('main.index');
    }
}
