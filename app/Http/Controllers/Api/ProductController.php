<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use DB;
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
        if ($request->lan_type == 0) {
            $popularProducts = Product::select('id', 'category_id', 'title', 'image_url', 'price', 'description', 'status', 'view_count', 'spice_level')->orderBy('view_count', 'DESC')
                ->take(24)
                ->get();
        } elseif ($request->lan_type == 1) {
            $popularProducts = Product::select('id', 'category_id', 'title_gr as title', 'image_url', 'price', 'description_gr as description', 'status', 'view_count', 'spice_level')->orderBy('view_count', 'DESC')
                ->take(24)
                ->get();
        } else {
            return response()->json([
                'status' => $this->responseConstants['STATUS_SUCCESS'],
                'message' => 'Please send Language type.',
                'products' => [],
            ]);
        }
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
                'error' => $validator->errors()
            ]);
        }

        $offset = 0;
        if ($request->filled($this->generalConstants['KEY_COUNT'])) {
            $offset = $request->get($this->generalConstants['KEY_COUNT']);
        }

        if ($request->lan_type == 0) {
            $categoryProducts = Product::select('id', 'category_id', 'title', 'image_url', 'price', 'description', 'status', 'view_count', 'spice_level')->where('category_id', $request->get($this->categoryConstants['KEY_CATEGORY_ID']))
                ->skip($offset)
                ->take($this->recordsPerPage)
                ->get();
            if (count($categoryProducts) == 0) {
                return response()->json([
                    'status' => $this->responseConstants['STATUS_ERROR'],
                    'message' => "No Product Found Against This Category",
                ]);
            }
        } elseif ($request->lan_type == 1) {
            $categoryProducts = Product::select('id', 'category_id', 'title_gr as title', 'image_url', 'price', 'description_gr as description', 'status', 'view_count', 'spice_level')->where('category_id', $request->get($this->categoryConstants['KEY_CATEGORY_ID']))
                ->skip($offset)
                ->take($this->recordsPerPage)
                ->get();
            if (count($categoryProducts) == 0) {
                return response()->json([
                    'status' => $this->responseConstants['STATUS_ERROR'],
                    'message' => "No Product Found Against This Category",
                ]);
            }
        } else {
            return response()->json([
                'status' => $this->responseConstants['STATUS_SUCCESS'],
                'message' => 'Please send Language type.',
                'products' => [],
                'product_count' => 0,
            ]);
        }
        return response()->json([
            'status' => $this->responseConstants['STATUS_SUCCESS'],
            'message' => 'Success',
            'products' => $categoryProducts,
            'product_count' => count($categoryProducts),
        ]);

    }

    public function addViewCount(Request $request)
    {
        $rules = [
            $this->productConstants['KEY_PRODUCT_ID'] => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'status' => $this->responseConstants['STATUS_ERROR'],
                'message' => $this->responseConstants['INVALID_PARAMETERS'],
                'error' => $validator->errors()
            ]);
        }

        $product = Product::find($request->get($this->productConstants['KEY_PRODUCT_ID']));

        if ($product == null) {
            return response()->json([
                'status' => $this->responseConstants['STATUS_ERROR'],
                'message' => "No Product Found",
            ]);
        }
        $product->increment('view_count');

        return response()->json([
            'status' => $this->responseConstants['STATUS_SUCCESS'],
            'message' => 'Success',
            'products' => $product,
        ]);
    }

    public function productDetails(Request $request)
    {
        $rules = [
            $this->productConstants['KEY_PRODUCT_ID'] => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'status' => $this->responseConstants['STATUS_ERROR'],
                'message' => $this->responseConstants['INVALID_PARAMETERS'],
                'error' => $validator->errors()
            ]);
        }
        $offset = 0;
        if ($request->filled($this->generalConstants['KEY_COUNT'])) {
            $offset = $request->get($this->generalConstants['KEY_COUNT']);
        }
        $product = Product::find($request->get($this->productConstants['KEY_PRODUCT_ID']));

        if ($product == null) {
            return response()->json([
                'status' => $this->responseConstants['STATUS_ERROR'],
                'message' => "No Product Found",
            ]);
        }
        if ($request->lan_type == 0) {
            $productDetails = Product::select('id', 'category_id', 'title', 'image_url', 'price', 'description', 'status', 'view_count', 'spice_level')->with(['reviews' => function ($query) use($offset) {
                $query->select(['id', 'user_id', 'product_id', 'rating', 'comment','is_approved'])->where('is_approved',1)->skip($offset)->take($this->recordsPerPage);
            },'reviews.user'=> function($query){
                $query->select(['id', 'name','image_url']);
            }])->where('id', $request->get($this->productConstants['KEY_PRODUCT_ID']))->first();
        } elseif ($request->lan_type == 1) {
            $productDetails = Product::select('id', 'category_id', 'title_gr as title', 'image_url', 'price', 'description_gr as description', 'status', 'view_count', 'spice_level')->with(['reviews' => function ($query) use($offset) {
                $query->select(['id', 'user_id', 'product_id', 'rating', 'comment','is_approved'])->where('is_approved',1)->skip($offset)->take($this->recordsPerPage);
            },'reviews.user'=> function($query){
                $query->select(['id', 'name','image_url']);
            }])->where('id', $request->get($this->productConstants['KEY_PRODUCT_ID']))->first();
        }
        return response()->json([
            'status' => $this->responseConstants['STATUS_SUCCESS'],
            'message' => 'Success',
            'productDetails' => $productDetails,
        ]);
    }
}
