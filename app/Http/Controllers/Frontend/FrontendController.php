<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\User;

use Validator;
use Session;
use Auth;
use Hash;
use DB;

class FrontendController extends Controller
{   
    public function login(Request $request) {
        
        if($request->isMethod('post')){
            $data = $request->all();
            if(Auth::guard('frontend')->attempt(['email'=>$data['email'],'password' => $data['password']])){
                return redirect()->route('index')->with('SUCCESS','LOGIN SUCESSFULLY');
            }
            else{
                return redirect()->back()->with('ERROR','INVALID CREDENTIALS');
            }
        }
        if(Auth::guard('frontend')->check()){
            return redirect()->route('index')->with('SUCCESS','LOGIN SUCESSFULLY');
        }
    }

    public function logout ()
    {
        Auth::guard('frontend')->logout();
        return redirect()->back();
    }
    
    public function register(Request $request) {

        // $rules = [
        //     'username' => 'required|max:255',
        //     'email' => 'required|string|email|max:255|unique:users',
        //     'password' => 'required|max:255',
        //     'phone' => 'required|numeric',
        //     'address' => 'required|max:255',
        //     'house_no' => 'required|max:255',
        //     'post_code' => 'required|numeric',
        // ];

        // $validator = Validator::make($request->all(), $rules);

        // if ($validator->fails()) {
        //     return Redirect()->back()->withErrors($validator)->withInput($request->all());
        // }

        $data = [
            'name' => $request->input('username'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'phone_no' => $request->input('phone_no'),
            'address' => $request->input('street'),
            'home_no' => $request->input('house_no'),
            'post_code' => $request->input('post_code'),
        ];

        $user = User::create($data);

        if($request->isMethod('post')){
            $data = $request->all();
            if(Auth::guard('frontend')->attempt(['email'=>$data['email'],'password' => $data['password']])){
                return redirect()->route('index')->with('SUCCESS','LOGIN SUCESSFULLY');
            }
            else{
                return redirect()->back()->with('ERROR','INVALID CREDENTIALS');
            }
        }
        if(Auth::guard('frontend')->check()){
            return redirect()->route('index')->with('SUCCESS','LOGIN SUCESSFULLY');
        }
        
    }

    public function index() {   
        $categories = Category::where('status','1')->inRandomOrder()->get();
        $popularProducts = Product::where('status','1')->orderBy('view_count','DESC')->get();
        return view ('frontend.pages.index',compact('categories','popularProducts'));
    }

    public function addToCart(Request $request) {
        $product = Product::where('id',$request->product_id)->first();
        Session::push('product', $product);
    }

    public function viewCart() {
        $products = Session::get('product');
        return view ('frontend.pages.cart',compact('products'));
    }

    public function reservation() {
        return view ('frontend.pages.reservation');
    }
}
