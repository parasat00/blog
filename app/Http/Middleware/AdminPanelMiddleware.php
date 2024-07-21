<?php

namespace App\Http\Middleware;

use App\Http\Library\ApiHelpers;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminPanelMiddleware
{
    use ApiHelpers;
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(auth('web')->user()->role !== 1) {
            return redirect()->back()->withErrors('Code 401. User unauthorized.');
        }
        return $next($request);
    }
}
