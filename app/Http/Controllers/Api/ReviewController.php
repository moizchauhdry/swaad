<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Order;
use App\OrderDetail;
use App\Product;
use App\Review;
use App\User;
use Config;
use Illuminate\Http\Request;
use Storage;
use Validator;

class ReviewController extends Controller
{
    private $recordsPerPage = 10;
    private $responseConstants;
    private $generalConstants;
    private $reviewConstants;


    public function __construct()
    {
        $this->responseConstants = Config::get('constants.RESPONSE_CONSTANTS');
        $this->reviewConstants = Config::get('constants.REVIEW_CONSTANTS');
        $this->generalConstants = Config::get('constants.GENERAL_CONSTANTS');
    }


    public function addReview(Request $request)
    {
        $response = [];
        $rules = [
            $this->reviewConstants['KEY_PRODUCT_ID'] => 'required',
            $this->reviewConstants['KEY_RATING'] => 'required',
            $this->reviewConstants['KEY_COMMENT'] => 'required',
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

        $data = [
            'product_id' => $request->get($this->reviewConstants['KEY_PRODUCT_ID']),
            'rating' => $request->get($this->reviewConstants['KEY_RATING']),
            'comment' => $request->get($this->reviewConstants['KEY_COMMENT']),
            'user_id' => $user->id,
        ];

        Review::create($data);

        $response['status'] = $this->responseConstants['STATUS_SUCCESS'];
        $response['message'] = 'Review Is Added successfully.';
        return response()->json($response);
    }

    public function userReviewsOnPrducts(Request $request)
    {
        $response = [];

        $user = User::where('access_token', $request->header()['authorization'][0])->first();
        $reviews = Review::where('user_id', $user->id)->with('product')->get();

        $response['status'] = $this->responseConstants['STATUS_SUCCESS'];
        $response['reviews'] = $reviews;
        $response['message'] = 'Success.';
        return response()->json($response);
    }


    public function userGivenReviewsOnPrducts(Request $request)
    {
        $response = [];
        $user = User::where('access_token', $request->header()['authorization'][0])->first();
        $reviewIds = Review::where('user_id', $user->id)->pluck('product_id')->toArray();
        $orderIds = Order::where('user_id', $user->id)->pluck('id')->toArray();
        $orderDetailsIds = OrderDetail::whereIn('order_id', $orderIds)->pluck('product_id')->toArray();
        $reviewProducts = Product::whereIn('id', $orderDetailsIds)->whereNotIn('id', $reviewIds)->get();
        $response['status'] = $this->responseConstants['STATUS_SUCCESS'];
        $response['reviewProducts'] = $reviewProducts;
        $response['message'] = 'Success.';
        return response()->json($response);
    }
}
