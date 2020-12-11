<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use Storage;
use Validator;
use Config;

class ProductController extends Controller
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

    public function getPopularProducts(Request $request)
    {
        $popularProducts = Product::orderBy('view_count','DESC')
            ->take(24)
            ->get();

        return response()->json([
            'status' => $this->responseConstants['STATUS_SUCCESS'],
            'message' => 'Success',
            'products' => $popularProducts,
        ]);

    }

    public function getProductByCategory(Request $request)
    {
        $rules = [
            $this->categoryConstants['KEY_CATEGORY_ID'] => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'status' => $this->responseConstants['STATUS_ERROR'],
                'message' => $this->responseConstants['INVALID_PARAMETERS'],
            ]);
        }

        $offset = 0;
        if ($request->filled($this->generalConstants['KEY_COUNT'])) {
            $offset = $request->get($this->generalConstants['KEY_COUNT']);
        }

        $categoryProducts = Product::where('category_id',$request->get($this->categoryConstants['KEY_CATEGORY_ID']))
            ->skip($offset)
            ->take($this->recordsPerPage)
            ->get();


        return response()->json([
            'status' => $this->responseConstants['STATUS_SUCCESS'],
            'message' => 'Success',
            'products' => $categoryProducts,
        ]);

    }
}
