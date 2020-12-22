<?php

namespace App\Http\Controllers\Api;

use App\Banner;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    private $recordsPerPage = 10;
    private $responseConstants;
    private $generalConstants;

    public function __construct()
    {
        $this->responseConstants = Config::get('constants.RESPONSE_CONSTANTS');
        $this->generalConstants = Config::get('constants.GENERAL_CONSTANTS');
    }

    public function getHomeBanner(Request $request)
    {
        $banners = Banner::where(['status' => 1, 'type' => 1])
            ->take(24)
            ->get();

        return response()->json([
            'status' => $this->responseConstants['STATUS_SUCCESS'],
            'message' => 'Success',
            'banners' => $banners,
        ]);

    }

    public function getReservationBanner(Request $request)
    {
        $banners = Banner::where(['status' => 1, 'type' => 2])
            ->take(24)
            ->get();

        return response()->json([
            'status' => $this->responseConstants['STATUS_SUCCESS'],
            'message' => 'Success',
            'banners' => $banners,
        ]);

    }
}
