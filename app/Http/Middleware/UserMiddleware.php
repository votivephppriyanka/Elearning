<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        if (Auth::user()->role_id == 1) {
            return redirect()->route('admin');
        }

        if (Auth::user()->role_id == 3) {
            return $next($request);
        }

        if (Auth::user()->role_id == 2) {
            return redirect()->route('tutor');
        }
    }

}
