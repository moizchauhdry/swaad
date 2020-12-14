<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\Product;
use DB;
use Session;

class FrontendController extends Controller
{
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
}
