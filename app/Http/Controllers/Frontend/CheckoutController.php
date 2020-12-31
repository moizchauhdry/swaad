<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Order;
use App\OrderDetail;
use Cart;

class CheckoutController extends Controller
{
    public function index() {
        $cart = Cart::getContent();

        if ($cart->count() > 0) {
            return view ('frontend.pages.checkout');
        } else {
            return back();
        }
        
    }

    public function store(Request $request) {

        $grossTotal = number_format((float)Cart::getSubTotal(), 2, '.', '');
        $netTotal = number_format((float)Cart::getTotal(), 2, '.', '');
        
        $orderData = [
            'user_id' => '1',
            'gross_total' => $grossTotal,
            'net_total' => $netTotal,
        ];

        $order = Order::create($orderData);

        foreach(Cart::getContent() as $item) {

            $orderDetail = OrderDetail::create([
                'order_id' => $order->id,
                'product_id' => $item->id,
                'quantity' => $item->quantity,
            ]);
        }

        Cart::clear();

        return redirect()->route('index')->with('SUCCESS','Your Order Placed Successfully!');

    }
}
