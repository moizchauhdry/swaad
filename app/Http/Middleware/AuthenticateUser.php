<?php

namespace App\Http\Middleware;

use App\Services\Helper;
use App\User;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthenticateUser
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
//        dd($request->header()['authorization'][0]);
//        $errorMessage = [
//            'token.required' => 'User Token is required',
//        ];
//        $validator = Validator::make($request->all(),
//            [
//                'token' => 'required|string',
//            ],$errorMessage
//        );
        if (!isset($request->header()['authorization'][0])) {
            return response()->json([
                'status' => 0,
                'message' => 'User Token is required'
            ]);
        }
        $user = User::where('access_token', $request->header()['authorization'][0])->first();
        if ($user) {
            if (Auth::loginUsingId($user->id)) {
                return $next($request);
            } else {
                return response()->json([
                    'status' => 0,
                    'message' => 'Authentication Fails'
                ]);
            }
        } else {
            return response()->json([
                'status' => 0,
                'message' => 'Invalid User token'
            ]);
        }

    }
}
