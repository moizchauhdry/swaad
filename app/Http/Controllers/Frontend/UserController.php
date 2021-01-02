<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;

class UserController extends Controller
{
    public function profile() {
        return view ('frontend.users.profile');
    }
    
    public function orders() {
        $orders = Order::orderBy('id','DESC')->get();
        return view ('frontend.users.orders',compact('orders'));
    }
    
    public function getOrdersByStatus(Request $request) {

        $query = Order::orderBy('id','DESC');

        if ($request->has('order_status') && !empty($request->order_status)) {
            $query->where('order_status',$request->order_status);
        }

        $orders = $query->get();

        if (count($orders) > 0) {
            return view ('frontend.users._orders',compact('orders'));
        }
        else {
            return ' <div class="col-md-12 mt-4">
                        <div class="alert alert-danger text-center">
                            No Result(s) Found !
                        </div>
                    </div>'; 
        }

    }


    public function myReviews() {
        return view ('frontend.users.myReviews');
    }
   
    public function toReviews() {
        return view ('frontend.users.toReviews');
    }
}
