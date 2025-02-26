<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Session;
use Hash;
use Validator;

use App\Admin;
use App\User;
use App\Category;
use App\Product;
use App\Order;

class AdminController extends Controller
{
    public function dashboard()
    {   
        $users = User::all();
        $categories = Category::all();
        $products = Product::all();
        $orders = Order::all();
        return view ('admin.dashboard',compact('users','categories','products','orders'));
    }

    public function login(Request $request)
    {
        if($request->isMethod('post')){
            $data = $request->all();
            if(Auth::guard('admin')->attempt(['email'=>$data['email'],'password' => $data['password'],'status' => 1])){
                return redirect()->route('admin.dashboard');
            }
            else{
                Session::flash('error_message','Invalid Email or Password');
                return redirect()->back();
            }
        }
        if(Auth::guard('admin')->check()){
            return redirect()->route('admin.dashboard');
        }
        return view('admin.login');
    }
    
    public function logout ()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
