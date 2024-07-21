<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SelfProfileOrAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if($request->route('user.id') !== auth('web')->id() && auth('web')->id() !== 1) {
            return redirect()->back()->withErrors('Code 401. User unauthorized');
        }
        return $next($request);
    }
}
