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
use Validator;

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
                    return view ('frontend.pages.checkout',compact('user'));
                }
            }
        } else {
            return back();
        }
    }

    public function store(Request $request) {
    
        $user = Auth::guard('frontend')->user();

        $rules = [
            // USER VALIDATIONS
            'chk_first_name' => 'required|max:150',
            'chk_last_name' => 'required|max:150',
            'chk_phone_no' => 'required|numeric',
            'chk_address' => 'required|max:150',
            'chk_house_no' => 'required|numeric',
            'chk_city' => 'required|max:150',
            // ORDER VALIDATIONS
            'delivery_address' => 'nullable|max:150',
            'delivery_phone' => 'nullable|max:150',
            'order_notes' => 'nullable|max:150',
        ];

        $customMessages = [
            // Required
            'chk_first_name.required' => 'The first name field is required.',
            'chk_last_name.required' => 'The last name field is required.',
            'chk_phone_no.required' => 'The phone field is required.',
            'chk_address.required' => 'The address field is required.',
            'chk_house_no.required' => 'The house # field is required.',
            'chk_city.required' => 'The city field is required.',
            // Numeric
            'chk_phone_no.numeric' => 'The phone must be a number.',
            'chk_house_no.numeric' => 'The house # must be a number.',
        ];
    
        $this->validate($request, $rules, $customMessages);
            
        $userData = [
            'first_name' => $request->chk_first_name,
            'last_name' => $request->chk_last_name,
            'phone_no' => $request->chk_phone_no,
            'address' => $request->chk_address,
            'home_no' => $request->chk_house_no,
            'city' => $request->chk_city,
        ];

        $user->update($userData);

        $grossTotal = number_format((float)Cart::getSubTotal(), 2, '.', '');
        $netTotal = number_format((float)Cart::getTotal(), 2, '.', '');
        
        if ($request->comments == NULL) {
            $orderNotes = "-";
        } else {
            $orderNotes = $request->comments;
        }

        $timestamp = strtotime(date("h:i")) + 60*50;
        $time = date('H:i', $timestamp);
        $currentDate = date("Y-m-d");

        if ($request->dlv_date == $currentDate) {
            if ($request->dlv_time >= $time) {
            } else {
                return redirect()->back()->withInput($request->input())->with('WARNING','Please select time with a gap of 50 minutes');
            }
        } else { 
            if ($request->dlv_date >= $currentDate) {
            } else {
                return redirect()->back()->withInput($request->input())->with('WARNING','Please select correct date');
            }
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
                    'RequestId' => "SWAAD",
                    'RetryIndicator' => 0,
                    'ClientInfo' => array(
                        'ShopInfo' => "SWAAD",
                        'OsInfo' => "SWAAD"
                    )
                ),
                'TerminalId' => env('PAYMENT_TERMINAL_ID'),
                'PaymentMethods' => array("DIRECTDEBIT","VISA","MASTERCARD","DINERS","MAESTRO"),
                'Payment' => array(
                'Amount' => array(
                    'Value' => (float)$order->net_total * 100,
                    'CurrencyCode' => env('PAYMENT_CURRENCY_CODE')
                ),
                'OrderId' => $order->id,
                'PayerNote' => "ONLINE FOOD ORDER",
                'Description' => $orderNotes
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
                return redirect()->route('index')->with('SUCCESS',session('lan') == 'en' ? 'Thankyou! Your order has been placed successfully.' : 'Dankeschön! Ihre Bestellung wurde erfolgreich aufgegeben.');
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
