<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\Product;
use Cart;

class CartController extends Controller
{
    public function index() {
        return view ('frontend.pages.cart');
    }

    public function store(Request $request) {
        $product = Product::where('id',$request->product_id)->first();
        $cart = Cart::add(array('id' => $product->id,'name' => $product->title, 'quantity' => 1, 'price' => $product->price,'image' => $product->image_url));

        $cartCount = Cart::getContent()->count();

        return $cartCount;
    }

    public function destroy(Request $request) {
        $id = $request->product_id;
        Cart::remove($id);
    }
    
    public function increment(Request $request) {

        $id = $request->product_id;
        $cart = Cart::update($id, array('quantity' => 1));
        $quantity = Cart::get($id)->quantity;
        return $quantity;
    }

    public function decrement(Request $request) {   
        $id = $request->product_id;
        Cart::update($id, array('quantity' => -1));
        $quantity = Cart::get($id)->quantity;
        return $quantity;
    }


}
