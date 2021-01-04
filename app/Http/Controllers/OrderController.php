<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\OrderDetail;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::orderBy('id','DESC')->get();
        return view('admin.orders.index',compact('orders'));
    }

    public function detail($id)
    {
        $order = Order::findOrFail($id);
        $orderItems = OrderDetail::where('order_id', $id)->get();
        $orderProductsCount = OrderDetail::where('order_id', $id)->get()->count();

        return view ('admin.orders.detail',compact('order','orderItems','orderProductsCount'));
    }

    public function updateOrderStatus(Request $request, $id) {
        
        $order = Order::findOrFail($id);
        $data = [
            'order_status' => $request->order_status,
            'payment_status' => $request->payment_status,
        ];
        $order->update($data);

        return redirect()->back()->with('success','Status Updated Successfully');
    }
}
