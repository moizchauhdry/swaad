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
        return view ('frontend.pages.checkout');
    }

    public function store(Request $request) {
        $grosssTotal = number_format((float)Cart::getSubTotal(), 2, '.', '');
        $netTotal = number_format((float)Cart::getTotal(), 2, '.', '');
        
        $orderData = [
            'user_id' => '1',
            'gross_total' => $grosssTotal,
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

        return "ORDER PLACE SUCCESSFULLY";

    }
}
