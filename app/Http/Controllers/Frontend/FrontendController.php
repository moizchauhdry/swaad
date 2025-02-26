<?php

namespace App\Http\Controllers\Frontend;

use App\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\User;
use App\Reservation;
use App\Contact;
use App\Banner;
use App\Review;
use App\Gallery;
use App\Notifications\ReservationNotification;
use Validator;
use Session;
use Auth;
use Hash;
use DB;
use Illuminate\Support\Facades\Notification;
use Str;

class FrontendController extends Controller
{
    public function login(Request $request) {

        if($request->isMethod('post')){
            $data = $request->all();
            if(Auth::guard('frontend')->attempt(['email'=>$data['email'],'password' => $data['password']])) {
                if (Auth::guard('frontend')->user()->status == 0) {
                    Auth::guard('frontend')->logout();
                    return redirect()->back()->with('WARNING','Your account is suspended. Please contact with Swaad for futher information.');
                } else {
                    User::where('id',Auth::guard('frontend')->user()->id)->update(['device_token' => NULL]);
                    return redirect()->route('checkout');
                }
            } else {
                return redirect()->back()->with('WARNING','The email or password you entered is incorrect.');
            }
        }
        if(Auth::guard('frontend')->check()){
            User::where('id',Auth::guard('frontend')->user()->id)->update(['device_token' => NULL]);
            return redirect()->route('checkout');
        }
    }

    public function logout () {
        Auth::guard('frontend')->logout();
        return redirect()->route('index');
    }

    public function register(Request $request) {

        $this->validate($request, [
            'post_code' => 'required|numeric',
            'city' => 'required|max:255',
            'house_no' => 'required|numeric',
            'address' => 'required|max:255',
            'phone' => 'required|max:20',
            'password' => 'required|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'lastname' => 'required|max:255',
            'firstname' => 'required|max:255',
            ]);

        $data = [
            'first_name' => $request->input('firstname'),
            'last_name' => $request->input('lastname'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'phone_no' => $request->input('phone'),
            'address' => $request->input('address'),
            'home_no' => $request->input('house_no'),
            'city' => $request->input('city'),
            'zip_code' => $request->input('post_code'),
        ];

        $user = User::create($data);

        if($request->isMethod('post')){
            $data = $request->all();
            if(Auth::guard('frontend')->attempt(['email'=>$data['email'],'password' => $data['password']])){
                return TRUE;
            }
            else{
                return FALSE;
            }
        }
        if(Auth::guard('frontend')->check()){
            return TRUE;
        }

    }

    public function index() {
        $categories = Category::where('status','1')->inRandomOrder()->get();
        $popularProducts = Product::where('status','1')->orderBy('view_count','DESC')->take(12)->get();
        $banners = Banner::where('status','1')->where('status','1')->take(3)->get();
        $reviews = Review::where('rating','5')->whereRaw('LENGTH(comment) > 25')->get()->take(6);
        return view ('frontend.pages.index',compact('categories','popularProducts','banners','reviews'));
    }

    public function addToCart(Request $request) {
        $product = Product::where('id',$request->product_id)->first();
        Session::push('product', $product);
    }

    public function viewCart() {
        $products = Session::get('product');
        return view ('frontend.pages.cart',compact('products'));
    }

    public function categories() {
        $categories = Category::where('status','1')->paginate(24);
        return view ('frontend.pages.categories',compact('categories'));
    }

    public function getProductsByCategory($id) {
        $category = Category::find($id);
        $products = Product::where('status','1')->orderBy('id','DESC')->where('category_id',$id)->paginate(24);
        return view ('frontend.pages.getProductsByCategory',compact('products','category'));
    }

    public function products() {
        $products = Product::where('status','1')->orderBy('id','DESC')->paginate(24);
        return view ('frontend.pages.products',compact('products'));
    }

    public function productDetail($id) {
        $product = Product::find($id);
        $products = Product::where('status','1')->get();
        $relatedProducts = Product::where('status','1')->where('category_id',$product->category->id)->where('id','!=',$product->id)->take(8)->inRandomOrder()->get();
        $reviews = Review::orderBy('created_at','DESC')->where('product_id',$product->id)->where('is_approved',1)->get();

        $reviewStarCount = Review::where('product_id',$product->id)->get();

        return view ('frontend.pages.product-detail',compact('product','products','relatedProducts','reviews','reviewStarCount'));
    }

    public function reservation() {
        return view ('frontend.pages.reservation');
    }

    public function storeReservation(Request $request) {

        $rules = [
            'rsv_name' => 'required|string|max:255',
            'rsv_email' => 'required|string|email|max:255',
            'rsv_phone' => 'required|numeric',
            'rsv_people' => 'required|string|max:255',
            'rsv_date' => 'required|string|max:255',
            'rsv_time' => 'required|string|max:255',
            'rsv_message' => 'required|string|max:1000',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return Redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $data = [
            'name' => $request->input('rsv_name'),
            'email' => $request->input('rsv_email'),
            'phone' => $request->input('rsv_phone'),
            'people' => $request->input('rsv_people'),
            'date' => $request->input('rsv_date'),
            'time_of_day' => $request->input('rsv_time'),
            'message' => $request->input('rsv_message'),
            'user_id' => NULL,
        ];

        $rsv = Reservation::create($data);

        try {
            $users = Admin::where('status',1)->get();
            Notification::send($users, new ReservationNotification($rsv));

        } catch (\Throwable $th) {
            // throw $th;
        }

        return redirect()->back()->with('SUCCESS','Reservation Submitted Successfully.');

    }

    public function contact() {
        return view ('frontend.pages.contact');
    }

    public function storeContact(Request $request) {

        $rules = [
            'ct_name' => 'required|max:255',
            'ct_email' => 'required|email|max:255',
            'ct_subject' => 'required|max:255',
            'ct_message' => 'required|max:255',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return Redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $data = [
            'name' => $request->input('ct_name'),
            'email' => $request->input('ct_email'),
            'subject' => $request->input('ct_subject'),
            'message' => $request->input('ct_message'),
        ];

        $contact = Contact::create($data);

        return redirect()->back()->with('SUCCESS','Thankyou for getting in touch!');

    }

    public function about() {
        return view ('frontend.pages.about');
    }

    public function mission() {
        return view ('frontend.pages.mission');
    }

    public function serve() {
        return view ('frontend.pages.serve');
    }

    public function privacy() {
        return view ('frontend.pages.privacy');
    }

    public function termsCondition() {
        return view ('frontend.pages.termsCondition');

    }

    public function catering() {
        return view ('frontend.pages.catering');
    }

    public function changeLanguage(Request $request) {
        $lan = $request->language;
        session(['lan' => $lan]);
        $sessionLan = session('lan');
        return redirect()->back();
    }

    public function gallery() {
        $gallery = Gallery::all();
        return view ('frontend.pages.gallery',compact('gallery'));
    }
}
