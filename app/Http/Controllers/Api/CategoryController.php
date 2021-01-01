<?php

namespace App\Http\Controllers\Api;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use JWTAuth;
use Config;

class CategoryController extends Controller
{
    private $responseConstants;
    private $authConstants;
    private $userConstants;

    public function __construct()
    {
        $this->responseConstants = Config::get('constants.RESPONSE_CONSTANTS');
        $this->authConstants = Config::get('constants.CATEGORY_CONSTANTS');
    }

    public function allCategories(Request $request)
    {
        $response = [];
        if ($request->lan_type == 0) {
            $categories = Category::select('id','title', 'slug', 'image_url', 'status')->where('status', 1)->orderBy('id', 'DESC')->get();
            $response['status'] = $this->responseConstants['STATUS_SUCCESS'];
            $response['categories'] = $categories;
            $response['message'] = 'Success';
            return response()->json($response);
        } elseif ($request->lan_type == 1) {
            $categories = Category::select('id','title_gr as title', 'slug', 'image_url', 'status')->where('status', 1)->orderBy('id', 'DESC')->get();
            $response['status'] = $this->responseConstants['STATUS_SUCCESS'];
            $response['categories'] = $categories;
            $response['message'] = 'Success';
            return response()->json($response);
        } else {
            $response['status'] = $this->responseConstants['STATUS_SUCCESS'];
            $response['categories'] = [];
            $response['message'] = 'Please send Language type.';
            return response()->json($response);
        }
    }
}
