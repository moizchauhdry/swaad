<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Order;
use App\OrderDetail;
use Cart;

class CheckoutController extends Controller
{
    public function index() {
        $cart = Cart::getContent();

        if ($cart->count() > 0) {
            return view ('frontend.pages.checkout');
        } else {
            return back();
        }
        
    }

    public function store(Request $request) {

        $grossTotal = number_format((float)Cart::getSubTotal(), 2, '.', '');
        $netTotal = number_format((float)Cart::getTotal(), 2, '.', '');
        
        $orderData = [
            'user_id' => '1',
            'gross_total' => $grossTotal,
            'net_total' => $netTotal,
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
       
        // SIX PAYMENT METHOD

        $username = 'API_255842_89186473';
        $password = 'Swaad_001Swaad_001';
        // $url = 'https://www.saferpay.com/api/Payment/v1/PaymentPage/Initialize';
        $url = 'https://test.saferpay.com/api/Payment/v1/Transaction/Initialize';

        //This is an EXAMPLE of the payload-Array.
        $payload = array(
            'RequestHeader' => array(
            'SpecVersion' => "1.7",
            'CustomerId' => "255842",
            'RequestId' => "ABC",
            'RetryIndicator' => 0,
            'ClientInfo' => array(
            'ShopInfo' => "My Shop",
            'OsInfo' => "Windows Server 2013"
            )
            ),
            'TerminalId' => "17729405",
            'PaymentMethods' => array("DIRECTDEBIT","VISA"),
            'Payment' => array(
            'Amount' => array(
            'Value' => (int) "100",
            'CurrencyCode' => "CHF"
            ),
            'OrderId' => "123test",
            'PayerNote' => "A Note",
            'Description' => "Test_Order_123test"
            ),
            'Payer' => array(
            'IpAddress' => "192.168.178.1",
            'LanguageCode' => "en"
            ),
            'ReturnUrls' => array(
            'Success' => url('/success'),
            'Fail' => url('/fail')
            ),
            'Notification' => array(
            'PayerEmail' => "moizchauhdry@gmail.com",
            'MerchantEmail' => "fawad@gmail.com",
            'NotifyUrl' => "https://myshop/callback"
            ),
            'DeliveryAddressForm' => array(
            'Display' => true,
            'MandatoryFields' => array("CITY","COMPANY","COUNTRY","EMAIL","FIRSTNAME","LASTNAME","PHONE","SALUTATION","STATE","STREET","ZIP")
            )
            );
            //$username and $password for the http-Basic Authentication
            //$url is the SaferpayURL eg. https://www.saferpay.com/api/Payment/v1/PaymentPage/Initialize
            //$payload is a multidimensional array, that assembles the JSON structure. Example see above

            //Set Options for CURL
            $curl = curl_init($url);
            curl_setopt($curl, CURLOPT_HEADER, false);
            //Return Response to Application
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            //Set Content-Headers to JSON
            curl_setopt($curl, CURLOPT_HTTPHEADER,array("Content-type: application/json","Accept: application/json; charset=utf-8"));
            //Execute call via http-POST
            curl_setopt($curl, CURLOPT_POST, true);
            //Set POST-Body
            //convert DATA-Array into a JSON-Object
            curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($payload));
            //WARNING!!!!!
            //This option should NOT be "false", otherwise the connection is not secured
            //You can turn it of if you're working on the test-system with no vital data
            //PLEASE NOTE:
            //Under Windows (using WAMP or XAMP) it is necessary to manually download and save the necessary SSL-Root certificates!
            //To do so, please visit: http://curl.haxx.se/docs/caextract.html and Download the .pem-file
            //Then save it to a folder where PHP has write privileges (e.g. the WAMP/XAMP-Folder itself)
            //and then put the following line into your php.ini:
            //curl.cainfo=c:\path\to\file\cacert.pem
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2);
            //HTTP-Basic Authentication for the Saferpay JSON-API.
            //This will set the authentication header and encode the password & username in Base64 for you
            curl_setopt($curl, CURLOPT_USERPWD, 'API_255842_89186473:JsonApiPwd1_AFwhe2bq');
            //CURL-Execute & catch response
            $jsonResponse = curl_exec($curl);
            //Get HTTP-Status
            //Abort if Status != 200
            $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
            if ($status != 200) {
            //IF ERROR
            //Get http-Body (if aplicable) from CURL-response
            $body = json_decode(curl_multi_getcontent($curl), true);
            //Build array, containing the body (Response data, like Error-messages etc.) and the http-status-code
            $response = array(
            "status" => $status . " <|> " . curl_error($curl),
            "body" => $body
            );
            } else {
            //IF OK
            //Convert response into an Array
            $body = json_decode($jsonResponse, true);
            //Build array, containing the body (Response-data) and the http-status-code
            $response = array(
            "status" => $status,
            "body" => $body
            );
            }
            //IMPORTANT!!!
            //Close connection!
            curl_close($curl);
            //$response, again, is a multi-dimensional Array, containing the status-code ($response["status"]) and the API-response (if available) itself ($response["body"])

        $body = $response['body'];
        $Redirect = $body['Redirect'];
        $RedirectUrl = $Redirect['RedirectUrl'];

        return redirect($RedirectUrl);

        // return redirect()->route('index')->with('SUCCESS','Your Order Placed Successfully!');

    }

    public function success(Request $request) {
        dd('PAYMENT SUCCESS');
    }

    public function fail(Request $request) {
        dd('PAYMENT FAIL. PLEASE TRY AGAIN LATER');
    }
}
