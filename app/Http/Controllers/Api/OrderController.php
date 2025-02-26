<?php

namespace App\Http\Controllers\Api;

use App\Banner;
use App\Http\Controllers\Controller;
use App\Order;
use App\OrderDetail;
use App\Product;
use App\User;
use Config;
use Egulias\EmailValidator\EmailLexer;
use Illuminate\Http\Request;
use Storage;
use Validator;

class OrderController extends Controller
{
    private $recordsPerPage = 10;
    private $responseConstants;
    private $generalConstants;
    private $orderConstants;
    private $userConstants;


    public function __construct()
    {
        $this->responseConstants = Config::get('constants.RESPONSE_CONSTANTS');
        $this->orderConstants = Config::get('constants.ORDER_CONSTANTS');
        $this->generalConstants = Config::get('constants.GENERAL_CONSTANTS');
        $this->userConstants = Config::get('constants.USER_CONSTANTS');
    }

    public function placeOrder(Request $request)
    {        
        $response = [];
        $rules = [
            // USER RULES
            $this->userConstants['KEY_FIRST_NAME'] => 'required',
            $this->userConstants['KEY_LAST_NAME'] => 'required',
            $this->userConstants['KEY_PHONE_NO'] => 'required',
            $this->userConstants['KEY_HOME_NO'] => 'required',
            $this->userConstants['KEY_CITY'] => 'required',
            $this->userConstants['KEY_ADDRESS'] => 'required',
            // ORDER RULES
            $this->orderConstants['KEY_GROSS_TOTAL'] => 'required',
            $this->orderConstants['KEY_NET_TOTAL'] => 'required',
            $this->orderConstants['KEY_COUPON_CODE'] => 'nullable',
            $this->orderConstants['KEY_COUPON_DISCOUNT_AMOUNT'] => 'nullable',
            $this->orderConstants['KEY_DELIVERY_TIME'] => 'required',
            $this->orderConstants['KEY_DELIVERY_DATE'] => 'required',
            $this->orderConstants['KEY_PAYMENT_METHOD'] => 'required',
            $this->orderConstants['KEY_ORDER_NOTES'] => 'required',
            $this->orderConstants['KEY_IP_ADDRESS'] => 'required',
            $this->orderConstants['KEY_PRODUCTS'] => 'required|array',
            $this->orderConstants['KEY_PRODUCTS'] . '.*.' . $this->orderConstants['KEY_PRODUCT_ID'] => 'required',
            $this->orderConstants['KEY_PRODUCTS'] . '.*.' . $this->orderConstants['KEY_PRODUCT_QUANTITY'] => 'required',
            $this->orderConstants['KEY_ORDER_LANG'] => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'status' => $this->responseConstants['STATUS_ERROR'],
                'message' => $this->responseConstants['INVALID_PARAMETERS'],
                'errors' => $validator->errors()
            ]);
        }

        $user = User::where('access_token', $request->header()['authorization'][0])->first();


        if (!$request->has($this->orderConstants['KEY_PRODUCTS']) || count($request->get($this->orderConstants['KEY_PRODUCTS'])) <= 0) {
            return response()->json([
                'status' => $this->responseConstants['STATUS_ERROR'],
                'message' => 'Order is empty.',
            ]);
        }

        foreach ($request->get($this->orderConstants['KEY_PRODUCTS']) as $orderItem) {
            $product = Product::find($orderItem[$this->orderConstants['KEY_PRODUCT_ID']]);
            if (empty($orderItem[$this->orderConstants['KEY_PRODUCT_QUANTITY']])) {
                return response()->json([
                    'status' => $this->responseConstants['STATUS_ERROR'],
                    'message' => 'Invalid product qunatity.',
                ]);
            }
        }

        $userData = [
            'first_name' => $request->get($this->userConstants['KEY_FIRST_NAME']),
            'last_name' => $request->get($this->userConstants['KEY_LAST_NAME']),
            'phone_no' => $request->get($this->userConstants['KEY_PHONE_NO']),
            'home_no' => $request->get($this->userConstants['KEY_HOME_NO']),
            'city' => $request->get($this->userConstants['KEY_CITY']),
            'address' => $request->get($this->userConstants['KEY_ADDRESS']),
        ];
        
        $user->update($userData);
        $userCheckoutData = User::select('first_name','last_name','phone_no','home_no','city','address')->where('id',$user->id)->first();

        $orderData = [
            'net_total' => $request->get($this->orderConstants['KEY_NET_TOTAL']),
            'gross_total' => $request->get($this->orderConstants['KEY_GROSS_TOTAL']),
            'delivery_time' => $request->get($this->orderConstants['KEY_DELIVERY_TIME']),
            'delivery_date' => $request->get($this->orderConstants['KEY_DELIVERY_DATE']),
            'order_notes' => $request->get($this->orderConstants['KEY_ORDER_NOTES']),
            'payment_method' => $request->get($this->orderConstants['KEY_PAYMENT_METHOD']),
            'order_lang' => $request->get($this->orderConstants['KEY_ORDER_LANG']),
        ];

        $orderData["user_id"] = $user->id;
        $order = Order::create($orderData);
        
        if ($order) {
            foreach ($request->get($this->orderConstants['KEY_PRODUCTS']) as $product) {
                $productDB = Product::find($product[$this->orderConstants['KEY_PRODUCT_ID']]);

                $dataOrderDetail = [
                    "order_id" => $order->id,
                    "product_id" => $product[$this->orderConstants['KEY_PRODUCT_ID']],
                    "quantity" => $product[$this->orderConstants['KEY_PRODUCT_QUANTITY']],
                    "total" => $productDB->price * (int)$product[$this->orderConstants['KEY_PRODUCT_QUANTITY']],
                ];
                OrderDetail::create($dataOrderDetail);
            }
        }

        if ($request->get($this->orderConstants['KEY_PAYMENT_METHOD']) == 1) {

            $url = 'https://www.saferpay.com/api/Payment/v1/PaymentPage/Initialize';
            $payload = array(
                'RequestHeader' => array(
                    'SpecVersion' => "1.7",
                    'CustomerId' => env('PAYMENT_CUSTOMER_ID'),
                    'RequestId' => "ABC",
                    'RetryIndicator' => 0,
                    'ClientInfo' => array(
                        'ShopInfo' => env('APP_NAME'),
                        'OsInfo' => "SWAAD"
                    )
                ),
                'TerminalId' => env('PAYMENT_TERMINAL_ID'),
                'PaymentMethods' => array("DIRECTDEBIT", "VISA", "MASTERCARD", "DINERS", "MAESTRO"),
                'Payment' => array(
                    'Amount' => array(
                        'Value' => (float)$order->net_total * 100,
                        'CurrencyCode' => env('PAYMENT_CURRENCY_CODE')
                    ),
                    'OrderId' => $order->id,
                    'PayerNote' => "ONLINE FOOD ORDER",
                    'Description' => $request->get($this->orderConstants['KEY_ORDER_NOTES'])
                ),
                'Payer' => array(
                    'IpAddress' => $request->get($this->orderConstants['KEY_IP_ADDRESS']),
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
                'DeliveryAddressForm' => array(
                    'Display' => false,
                    'MandatoryFields' => array("CITY", "COMPANY", "COUNTRY", "EMAIL", "FIRSTNAME", "LASTNAME", "PHONE", "SALUTATION", "STATE", "STREET", "ZIP")
                )
            );

            $curl = curl_init($url);
            curl_setopt($curl, CURLOPT_HEADER, false);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_HTTPHEADER, array("Content-type: application/json", "Accept: application/json; charset=utf-8"));
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($payload));
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2);
            curl_setopt($curl, CURLOPT_USERPWD, "" . env('PAYMENT_USERNAME') . ":" . env('PAYMENT_PASSWORD') . "");
            $jsonResponse = curl_exec($curl);
            $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
            if ($status != 200) {
                $body = json_decode(curl_multi_getcontent($curl), true);
                $response1 = array(
                    "status" => $status . " <|> " . curl_error($curl),
                    "body" => $body
                );
            } else {
                $body = json_decode($jsonResponse, true);
                $response1 = array(
                    "status" => $status,
                    "body" => $body
                );
            }
            curl_close($curl);
            $body = $response1['body'];
            $RedirectUrl = $body['RedirectUrl'];
            $response['status'] = $this->responseConstants['STATUS_SUCCESS'];
            
            if ($request->lan_type == 0) {
                $response['message'] = 'Thankyou! Your order has been placed successfully.';
            } else {
                $response['message'] = 'Dankeschön! Ihre Bestellung wurde erfolgreich aufgegeben.';
            }
            
            $response['RedirectUrl'] = $RedirectUrl;
            $response['user'] = $userCheckoutData;
            return response()->json($response);

        } else {
            $response['user'] = $userCheckoutData;
            $response['status'] = $this->responseConstants['STATUS_SUCCESS'];
            
            if ($request->lan_type == 0) {
                $response['message'] = 'Thankyou! Your order has been placed successfully.';
            } else {
                $response['message'] = 'Dankeschön! Ihre Bestellung wurde erfolgreich aufgegeben.';
            }
            
            return response()->json($response);
        }
    }

    public function getMyOrders(Request $request)
    {
        $response = [];
        $rules = [
            $this->orderConstants['KEY_STATUS'] => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'status' => $this->responseConstants['STATUS_ERROR'],
                'message' => $this->responseConstants['INVALID_PARAMETERS'],
                'errors' => $validator->errors()
            ]);
        }
        $user = User::where('access_token', $request->header()['authorization'][0])->first();
        $orders = Order::orderBy('id','DESC')->where(['user_id' => $user->id, 'order_status' => $request->get($this->orderConstants['KEY_STATUS'])])->get();
        $response['status'] = $this->responseConstants['STATUS_SUCCESS'];
        $response['message'] = 'Success';
        $response['orders'] = $orders;
        return response()->json($response);
    }

    public function orderDetails(Request $request)
    {
        $response = [];
        $rules = [
            $this->orderConstants['KEY_ORDER_ID'] => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'status' => $this->responseConstants['STATUS_ERROR'],
                'message' => $this->responseConstants['INVALID_PARAMETERS'],
                'errors' => $validator->errors()
            ]);
        }
        $user = User::where('access_token', $request->header()['authorization'][0])->first();
        if ($request->lan_type == 0) {
            $orderDetails = Order::where(['id' => $request->get($this->orderConstants['KEY_ORDER_ID']), 'user_id' => $user->id])->with(['orderDetails.product' => function ($query) {
                $query->select('id','category_id', 'title', 'image_url', 'price', 'description', 'status', 'view_count','spice_level');
            }, 'user'])->first();
        } elseif ($request->lan_type == 1) {
            $orderDetails = Order::where(['id' => $request->get($this->orderConstants['KEY_ORDER_ID']), 'user_id' => $user->id])->with(['orderDetails.product' => function ($query) {
                $query->select('id','category_id', 'title_gr as title', 'image_url', 'price', 'description_gr as description', 'status', 'view_count','spice_level');
            }, 'user'])->first();
        }
        $bannerImage = $banners = Banner::where(['status' => 1, 'type' => 1])->inRandomOrder()->pluck('image_url')->first();
        $response['status'] = $this->responseConstants['STATUS_SUCCESS'];
        $response['message'] = 'Success';
        $response['orderDetails'] = $orderDetails;
        $response['bannerImage'] = $bannerImage;
        return response()->json($response);
    }

}
