<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Order;
use App\OrderDetail;
use App\User;
use App\PostalCode;
use Cart;
use Auth;

class CheckoutController extends Controller
{
    public function index() {
        $cart = Cart::getContent();

        $user = User::where('id',Auth::guard('frontend')->user()->id)->first();
        $postcode = PostalCode::where('postal_code', $user->zip_code)->first();

        $cartTotal = floatval(Cart::getSubTotal());

        if ($cart->count() > 0) {
            if ($postcode == NULL) {
                return back()->with('WARNING','Sorry we not delivered in your area.');
            } else {
                if ($postcode->net_total > $cartTotal ) {
                    return back()->with('WARNING','Your cart total is not enough. Minimum cart total of CHF '.$postcode->net_total.' require to place this order.');
                } else {
                    return view ('frontend.pages.checkout');
                }
            }
        } else {
            return back()->with('WARNING','Your cart is empty.');
        }
    }

    public function store(Request $request) {

        $user = Auth::guard('frontend')->user();
        $grossTotal = number_format((float)Cart::getSubTotal(), 2, '.', '');
        $netTotal = number_format((float)Cart::getTotal(), 2, '.', '');
        
        if ($request->comments == NULL) {
            $orderNotes = "-";
        } else {
            $orderNotes = $request->comments;
        }
        
        $orderData = [
            'user_id' => $user->id,
            'gross_total' => $grossTotal,
            'net_total' => $netTotal,
            'delivery_date' => $request->dlv_date,
            'delivery_time' => $request->dlv_time,
            'delivery_address' => $request->dlv_address,
            'delivery_phone' => $request->dlv_phone,
            'order_notes' => $orderNotes,
            'payment_method' => $request->chk_payment_method,
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
        
        /**
        *****************************************************************************
        ************************** SIX PAYMENT SERVICE *******************************
        *****************************************************************************
        */

        $url = 'https://www.saferpay.com/api/Payment/v1/PaymentPage/Initialize';
        // $url = 'https://test.saferpay.com/api/Payment/v1/PaymentPage/Initialize';

        $payload = array(
                'RequestHeader' => array(
                    'SpecVersion' => "1.7",
                    'CustomerId' => env('PAYMENT_CUSTOMER_ID'),
                    'RequestId' => "TEST",
                    'RetryIndicator' => 0,
                    'ClientInfo' => array(
                        'ShopInfo' => "TEST",
                        'OsInfo' => "TEST"
                    )
                ),
                'TerminalId' => env('PAYMENT_TERMINAL_ID'),
                'PaymentMethods' => array("DIRECTDEBIT","VISA","MASTERCARD","DINERS","MAESTRO"),
                'Payment' => array(
                'Amount' => array(
                    'Value' => (int)$order->net_total * 100,
                    'CurrencyCode' => env('PAYMENT_CURRENCY_CODE')
                ),
                'OrderId' => $order->id,
                'PayerNote' => "TEST",
                'Description' => "TEST"
                ),
                'Payer' => array(
                    'IpAddress' => "192.168.178.1",
                    'LanguageCode' => "en"
                ),
                'ReturnUrls' => array(
                    'Success' => url('/payment-success'),
                    'Fail' => url('/payment-fail')
                ),
                'Notification' => array(
                    'PayerEmail' => $user->email,
                    'MerchantEmail' => env('PAYMENT_MERCHANT_EMAIL'),
                    'NotifyUrl' => "https://myshop/callback"
                ),
            );

            $curl = curl_init($url);
            curl_setopt($curl, CURLOPT_HEADER, false);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_HTTPHEADER,array("Content-type: application/json","Accept: application/json; charset=utf-8"));
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($payload));
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2);
            curl_setopt($curl, CURLOPT_USERPWD, "".env('PAYMENT_USERNAME').":".env('PAYMENT_PASSWORD')."");

            $jsonResponse = curl_exec($curl);
            $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);

            if ($status != 200) {
                $body = json_decode(curl_multi_getcontent($curl), true);
                $response = array(
                    "status" => $status . " <|> " . curl_error($curl),
                    "body" => $body
                );
            } else {
                $body = json_decode($jsonResponse, true);
                $response = array(
                    "status" => $status,
                    "body" => $body
                );
            }

            curl_close($curl);
            
            if ($request->chk_payment_method == 1) {
                if ($response['status'] == 200) {
                    $body = $response['body'];
                    $Redirect = $body['RedirectUrl'];

                    return redirect($Redirect);
                } else {
                    return redirect()->route('index')->with('ERROR','Something Went Wrong. Please Try Again Later.');
                }
            } else {
                return redirect()->route('index')->with('SUCCESS','Thankyou! Your order placed successfully.');
            }
    }

    public function paymentSuccess(Request $request) {

        $user = Auth::guard('frontend')->user();
        $order = Order::where('user_id',$user->id)->first();
        $order->update(['payment_status'=> 1]);
        
        $paymentStatus = 1 ;
        // $paymentStatus = "Successfull Transaction" ;
        return view('frontend.pages.payment',compact('paymentStatus'));
    }

    public function paymentFail(Request $request) {
        $paymentStatus = 0 ;
        // $paymentStatus = "Transaction cancel or fail. Please try again later." ;
        return view('frontend.pages.payment',compact('paymentStatus'));
    }
}
