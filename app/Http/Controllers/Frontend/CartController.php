<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\Product;
use Cart;

class CartController extends Controller
{
    public function index()
    {
        return view ('frontend.pages.cart');
    }

    public function store(Request $request)
    {
        $product = Product::where('id',$request->product_id)->first();
        $cart = Cart::add(array('id' => $product->id,'name' => $product->title, 'quantity' => 1, 'price' => $product->price,'image' => $product->image_url));
    }

    public function destroy($id)
    {
        Cart::remove($id);
        return redirect()->back()->with('success_message','Item has been removed!');
    }
}
