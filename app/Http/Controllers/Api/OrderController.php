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


    public function __construct()
    {
        $this->responseConstants = Config::get('constants.RESPONSE_CONSTANTS');
        $this->orderConstants = Config::get('constants.ORDER_CONSTANTS');
        $this->generalConstants = Config::get('constants.GENERAL_CONSTANTS');
    }

    public function placeOrder(Request $request)
    {
        $response = [];
        $rules = [
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

        $orderData = [
            'net_total' => $request->get($this->orderConstants['KEY_NET_TOTAL']),
            'gross_total' => $request->get($this->orderConstants['KEY_GROSS_TOTAL']),
            'delivery_time' => $request->get($this->orderConstants['KEY_DELIVERY_TIME']),
            'delivery_date' => $request->get($this->orderConstants['KEY_DELIVERY_DATE']),
            'order_notes' => $request->get($this->orderConstants['KEY_ORDER_NOTES']),
            'payment_method' => $request->get($this->orderConstants['KEY_PAYMENT_METHOD']),
        ];

        $orderData["user_id"] = $user->id;

//        $coupon = null;
//        $couponDiscount = 0;
//        $slabDiscount = 0;
//        $fixUserDiscount = 0;
//        // check coupon data
//        if ($request->has($this->orderConstants['KEY_COUPON_CODE']) && $request->get($this->orderConstants['KEY_COUPON_CODE']) != null) {
//            $coupon = Coupon::where('coupon_code', $request->get($this->orderConstants['KEY_COUPON_CODE']))->first();
//
//            if (!$this->_validCoupon($coupon)) {
//                return response()->json([
//                    'status' => $this->responseConstants['STATUS_INVALID_COUPON_CODE'],
//                    'message' => $this->responseConstants['ERROR_INVALID_COUPON_CODE'],
//                ]);
//
//            } else {
//                $couponDiscount = $request->get($this->orderConstants['KEY_COUPON_DISCOUNT_AMOUNT']);
//                $orderData['coupon_code'] = $request->get($this->orderConstants['KEY_COUPON_CODE']);
//                $orderData['coupon_discount_amount'] = $request->get($this->orderConstants['KEY_COUPON_DISCOUNT_AMOUNT']);
//                $coupon->update(['is_used' => 1]);
//            }
//        }
//
//        if ($request->has($this->orderConstants['KEY_DISCOUNT_SLAB_ID']) && $request->get($this->orderConstants['KEY_DISCOUNT_AMOUNT']) != null) {
//            $orderData['discount_id'] = $request->get($this->orderConstants['KEY_DISCOUNT_SLAB_ID']);
//            $orderData['discount_amount'] = $request->get($this->orderConstants['KEY_DISCOUNT_AMOUNT']);
//            $slabDiscount = $request->get($this->orderConstants['KEY_DISCOUNT_AMOUNT']);
//        }
//
//        if ($request->has($this->orderConstants['KEY_FIX_DISCOUNT']) && $request->get($this->orderConstants['KEY_FIX_DISCOUNT']) != null) {
//            $orderData['fix_discount'] = $request->get($this->orderConstants['KEY_FIX_DISCOUNT']);
//            $fixUserDiscount = $request->get($this->orderConstants['KEY_FIX_DISCOUNT']);
//        }
//
//        if (!empty($couponDiscount) && $couponDiscount > $slabDiscount && $couponDiscount > $fixUserDiscount) {
//            $orderData['discount_id'] = NULL;
//            $orderData['discount_amount'] = 0.00;
//            $orderData['fix_discount'] = 0.00;
//
//        } else if (!empty($slabDiscount) && $slabDiscount > $couponDiscount && $slabDiscount > $fixUserDiscount) {
//            $orderData['coupon_code'] = NULL;
//            $orderData['coupon_discount_amount'] = 0.00;
//            $orderData['fix_discount'] = 0.00;
//
//        } else if (!empty($fixUserDiscount) && $fixUserDiscount > $couponDiscount && $fixUserDiscount > $slabDiscount) {
//            $orderData['coupon_code'] = NULL;
//            $orderData['coupon_discount_amount'] = 0.00;
//            $orderData['discount_id'] = NULL;
//            $orderData['discount_amount'] = 0.00;
//        }
//
//        if ($request->has($this->orderConstants['KEY_DELIVERY_CHARGES']) && $request->get($this->orderConstants['KEY_DELIVERY_CHARGES']) != null) {
//            $orderData['delivery_charges'] = $request->get($this->orderConstants['KEY_DELIVERY_CHARGES']);
//        }

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
            // $url = 'https://test.saferpay.com/api/Payment/v1/PaymentPage/Initialize';

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
            $response['message'] = 'Order placed successfully.';
            $response['RedirectUrl'] = $RedirectUrl;
            return response()->json($response);
        } else {
            $response['status'] = $this->responseConstants['STATUS_SUCCESS'];
            $response['message'] = 'Order placed successfully.';
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
        $orders = Order::where(['user_id' => $user->id, 'order_status' => $request->get($this->orderConstants['KEY_STATUS'])])->get();
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
