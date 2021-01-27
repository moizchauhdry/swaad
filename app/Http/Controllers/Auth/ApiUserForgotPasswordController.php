<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Password;

class ApiUserForgotPasswordController extends Controller
{
    use SendsPasswordResetEmails;

    public function __construct()
    {
        $this->middleware('guest:frontend');
    }

     protected function sendResetLinkResponse(Request $request, $response)
     {
         return response()->json(['status' => 1, 'message' => trans($response)]);
     }

     protected function sendResetLinkFailedResponse(Request $request, $response)
     {
         return  response()->json(['status' => 0, 'error' => trans($response)]);
     }

    protected function broker() {
        return Password::broker('users');
    }

    public function showLinkRequestForm()
    {
        return view('auth.passwords.email-user');
    }
}
