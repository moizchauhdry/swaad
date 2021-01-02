<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\PostalCode;
use Config;
use Illuminate\Http\Request;
use Storage;
use Validator;

class PostalCodeController extends Controller
{
    private $recordsPerPage = 10;
    private $responseConstants;
    private $generalConstants;
    private $postCodeConstants;


    public function __construct()
    {
        $this->responseConstants = Config::get('constants.RESPONSE_CONSTANTS');
        $this->postCodeConstants = Config::get('constants.POSTCODE_CONSTANTS');
        $this->generalConstants = Config::get('constants.GENERAL_CONSTANTS');
    }

    public function checkPostalCode(Request $request){
        $response = [];
        $rules = [
            $this->postCodeConstants['KEY_POSTCODE_ID'] => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'status' => $this->responseConstants['STATUS_ERROR'],
                'message' => $this->responseConstants['INVALID_PARAMETERS'],
                'errors' => $validator->errors()
            ]);
        }
        $postcode = PostalCode::where('postal_code', $request->get($this->postCodeConstants['KEY_POST_CODE']))->first();
        $response['status'] = $this->responseConstants['STATUS_SUCCESS'];
        $response['postcode'] = $postcode;
        $response['message'] = 'Success.';
        return response()->json($response);
    }
}
