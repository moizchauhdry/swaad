<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Storage;
use Validator;
use Config;

class OrderController extends Controller
{
    private $recordsPerPage = 10;
    private $responseConstants;
    private $categoryConstants;
    private $generalConstants;
    private $productConstants;


    public function __construct()
    {
        $this->responseConstants = Config::get('constants.RESPONSE_CONSTANTS');
        $this->categoryConstants = Config::get('constants.CATEGORY_CONSTANTS');
        $this->productConstants = Config::get('constants.PRODUCT_CONSTANTS');
        $this->generalConstants = Config::get('constants.GENERAL_CONSTANTS');
    }

    public function placeOrder(Request $request)
    {
dd($request->all());

    }
}
