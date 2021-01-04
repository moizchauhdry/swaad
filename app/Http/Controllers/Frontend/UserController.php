<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;
use App\OrderDetail;
use App\User;
use App\Review;
use App\Product;

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

        $user = User::where('id', Auth::guard('frontend')->user()->id)->first();
        $reviews = Review::where('user_id', $user->id)->with(['product' => function ($query) {
            $query->select('id','category_id', 'title', 'image_url', 'price', 'description', 'status', 'view_count','spice_level');
        }])->get();
        

        return view ('frontend.users.myReviews',compact('reviews'));
    }
   
    public function toReviews() {
        $user = User::where('id', Auth::guard('frontend')->user()->id)->first();
        $reviewIds = Review::where('user_id', $user->id)->pluck('product_id')->toArray();
        $orderIds = Order::where('user_id', $user->id)->pluck('id')->toArray();
        $orderDetailsIds = OrderDetail::whereIn('order_id', $orderIds)->pluck('product_id')->toArray();
        $products = Product::whereIn('id', $orderDetailsIds)->whereNotIn('id', $reviewIds)->get();
        return view ('frontend.users.toReviews',compact('products'));
    }

    public function storeToReviews(Request $request) {
        
        $rules = [
            'rating' => 'required',
            'product_id' => 'required',
            'comment' => 'required|max:255',
        ];

        $data = [
            'user_id' => Auth::guard('frontend')->user()->id,
            'rating' => $request->rating,
            'comment' => $request->comment,
            'product_id' => $request->product_id,
        ];

        if ($data['rating'] == NULL) {
            return redirect()->back()->with('ERROR', 'Rating is Required');
        }

        Review::create($data);
        return redirect()->back()->with('SUCCESS', 'Successfully submitted review, Wait for approval.');
    }
}
