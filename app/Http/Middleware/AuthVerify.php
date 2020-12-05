<?php

namespace App\Http\Middleware;

use Closure;
use JWTAuth;

class AuthVerify
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
        $lastLogin = JWTAuth::payload($request->token)['login'];
        $user = JWTAuth::toUser($request->token);

        if ($user->last_login == $lastLogin) {
            return $next($request);
        }else{
            return response()->json(['status' => 401 ,'message' => 'Invalid Token']);
        }
    }
}
