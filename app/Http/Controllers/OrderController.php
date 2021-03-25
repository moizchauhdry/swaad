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

        if ($order->order_status == 0) {
            $orderStatusEng = 'Pending';
        } elseif($order->order_status == 1) {
            $orderStatusEng = 'Processing';
        } elseif($order->order_status == 2) {
            $orderStatusEng = 'Shipped';
        } elseif($order->order_status == 3) {
            $orderStatusEng = 'Delivered';
        } elseif($order->order_status == 4) {
            $orderStatusEng = 'Cancelled';
        } else {
            $orderStatusEng = '';
        }

        if ($order->order_status == 0) {
            $orderStatusDe = 'Ausstehend';
        } elseif($order->order_status == 1) {
            $orderStatusDe = 'Verarbeitung';
        } elseif($order->order_status == 2) {
            $orderStatusDe = 'Versand ';
        } elseif($order->order_status == 3) {
            $orderStatusDe = 'Geliefert';
        } elseif($order->order_status == 4) {
            $orderStatusDe = 'Abgebrochen';
        } else {
            $orderStatusDe = '';
        }

        // PUSH NOTIFICATIONS
        $path_to_fcm = 'https://fcm.googleapis.com/fcm/send';
        $server_key="AAAAyQagDtc:APA91bF7Ed0IsRaOKquk3vS9p8GKdRi8X352hUdYQpVGuEZUwVLHugOPDvFwNogBaMXNJmYdhdwEzRxKaHrL9ok-3bGTb6v8HDmOwyRKpjswM-mPWuDDU0tPMxtfsHmvk3JH1TkC3Vw4";
        $key = $order->user->device_token;
        
        if($key != ""){
            $header = array (
                'Authorization:key='.$server_key,
                'Content-Type:application/json'
            );

            if ($order->order_lang == 1) {
                $fields = array(
                    'to'=>$key,
                    "notification" => [
                        "body" => "Ihre Bestellung ist " .$orderStatusDe,
                        "title" => "Swaad Foods Gmbh",
                    ],
                    'data'=>array(
                        'title'=>"Swaad Foods Gmbh",
                        'order_status'=>$order->order_status,
                        'order_id'=>$order->id,
                    )
                );
            } else {
                $fields = array(
                    'to'=>$key,
                    "notification" => [
                        "body" => "Your order status is " .$orderStatusEng,
                        "title" => "Swaad Foods Gmbh",
                    ],
                    'data'=>array(
                        'title'=>"Swaad Foods Gmbh",
                        'order_status'=>$order->order_status,
                        'order_id'=>$order->id,
                    )
                );
            }
            
            $payload = json_encode($fields);
            $curl_session = curl_init();
            curl_setopt($curl_session, CURLOPT_URL,$path_to_fcm);
            curl_setopt($curl_session, CURLOPT_POST,true);
            curl_setopt($curl_session, CURLOPT_HTTPHEADER,$header);
            curl_setopt($curl_session, CURLOPT_RETURNTRANSFER,true);
            curl_setopt($curl_session, CURLOPT_SSL_VERIFYPEER,false);
            curl_setopt($curl_session, CURLOPT_IPRESOLVE,CURL_IPRESOLVE_V4);
            curl_setopt($curl_session, CURLOPT_POSTFIELDS,$payload);
            echo $result = curl_exec($curl_session);	
            curl_close($curl_session);
        }

        return redirect()->back()->with('success','Status Updated Successfully');
    }

    public function check(Request $request) {
        $indexList = $request->indexList;

        $orders =  Order::orderBy('id','DESC')->get();
        if(count($orders) > $indexList)
        {

            $returnHTML = view('admin.orders._index',compact('orders'))->render();
            return response()->json(['status' => 1,'count' => count($orders), 'html'=> $returnHTML]);
        }
        else
        {
            return response()->json(['status' => 0]);
        }
    }
}
