<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Password;   

class UserForgotPasswordController extends Controller
{
    use SendsPasswordResetEmails;

    public function __construct()
    {
        $this->middleware('guest:frontend');
    }
    
    protected function broker() {
        return Password::broker('users');
    }

    public function showLinkRequestForm()
    {
        return view('auth.passwords.email-user');
    }
}
