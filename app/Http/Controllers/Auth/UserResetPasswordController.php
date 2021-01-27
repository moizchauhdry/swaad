<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\ResetsPasswords;
use App\Providers\RouteServiceProvider;

use Password;
use Auth;

class UserResetPasswordController extends Controller
{
    use ResetsPasswords;

    protected $redirectTo = '/';

    public function __construct()
    {
        $this->middleware('guest:frontend');
    }

    protected function guard()
    {
        return Auth::guard('frontend');
    }

    protected function broker() {
        return Password::broker('users');
    }

    public function showResetForm(Request $request, $token = null) {
        return view('auth.passwords.reset-user')
            ->with(['token' => $token, 'email' => $request->email]
            );
    }

}
