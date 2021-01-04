<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;
use App\OrderDetail;
use App\User;
use Auth;

class UserController extends Controller
{
    public function profile() {
        $user = Auth::guard('frontend')->user();
        return view ('frontend.users.profile',compact('user'));
    }

    public function updateProfile() {
        $user = Auth::guard('frontend')->user();
        return redirect()->back();
    }
    
    public function orders() {
        $user = Auth::guard('frontend')->user();
        $orders = Order::orderBy('id','DESC')->where('user_id',$user->id)->get();
        return view ('frontend.users.orders',compact('orders'));
    }
    
    public function getOrdersByStatus(Request $request) {
        $user = Auth::guard('frontend')->user();
        $orders = Order::orderBy('id','DESC')->where('order_status',$request->order_status)->where('user_id',$user->id)->get();

        if (count($orders) > 0) {
            return view ('frontend.users._orders',compact('orders'));
        }
        else {
            return ' <div class="col-md-8 offset-md-2 p-4">
                        <div class="text-dark text-center">
                        <p>There are no orders placed yet.</p>
                        </div>
                    </div>'; 
        }

    }

    public function orderDetail($id) {
        $order = Order::findOrFail($id);
        $orderItems = OrderDetail::where('order_id', $id)->get();
        $orderProductsCount = OrderDetail::where('order_id', $id)->get()->count();        
        return view('frontend.users.orderDetail',compact('order','orderItems','orderProductsCount'));
    }

    public function myReviews() {
        return view ('frontend.users.myReviews');
    }
   
    public function toReviews() {
        return view ('frontend.users.toReviews');
    }
}
