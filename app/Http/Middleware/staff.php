<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class staff
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

        if (Auth::user()->role == 1) {
            return redirect()->route('owner.dashboard'); 
        }

        if (Auth::user()->role == 2) {
            return $next($request);  
        }
    }
}
