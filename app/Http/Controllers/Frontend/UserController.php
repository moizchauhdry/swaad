<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;
use App\OrderDetail;
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
        $orders = Order::orderBy('id','DESC')->get();
        return view ('frontend.users.orders',compact('orders'));
    }
    
    public function getOrdersByStatus(Request $request) {

        $orders = Order::orderBy('id','DESC')->where('order_status',$request->order_status)->get();

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
