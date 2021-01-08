<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class FrontendMiddleware
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
        if (!Auth::guard('frontend')->check()) {
            return redirect()->back()->with('WARNING','You must be logged into your account.');
        }
        return $next($request);
    }
}
