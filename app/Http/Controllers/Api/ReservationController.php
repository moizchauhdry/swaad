<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Reservation;
use Illuminate\Http\Request;
use Config;
use Storage;
use Validator;

class ReservationController extends Controller
{
    private $responseConstants;
    private $reservationConstants;
    private $generalConstants;


    public function __construct()
    {
        $this->responseConstants = Config::get('constants.RESPONSE_CONSTANTS');
        $this->generalConstants = Config::get('constants.GENERAL_CONSTANTS');
        $this->reservationConstants = Config::get('constants.RESERVATION_CONSTANTS');
    }

    public function addReservation(Request $request)
    {
        $rules = [
            $this->reservationConstants['KEY_NAME'] => 'required',
            $this->reservationConstants['KEY_EMAIL'] => 'required|email',
            $this->reservationConstants['KEY_PHONE'] => 'required',
            $this->reservationConstants['KEY_DATE'] => 'required',
            $this->reservationConstants['KEY_DAYTIME'] => 'required',
            $this->reservationConstants['KEY_PEOPLE'] => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'status' => $this->responseConstants['STATUS_ERROR'],
                'message' => $this->responseConstants['INVALID_PARAMETERS'],
            ]);
        }


        $data =[
            "name"=> $request->get($this->reservationConstants['KEY_NAME']),
            "email"=> $request->get($this->reservationConstants['KEY_EMAIL']),
            "phone"=> $request->get($this->reservationConstants['KEY_PHONE']),
            "people"=> $request->get($this->reservationConstants['KEY_PEOPLE']),
            "date"=> $request->get($this->reservationConstants['KEY_DATE']),
            "time_of_day"=> $request->get($this->reservationConstants['KEY_DAYTIME']),
        ];

        $reservation = Reservation::create($data);

        $response['status'] = $this->responseConstants['STATUS_SUCCESS'];
        $response['message'] = 'Your Reservation Is Submit.';
        return response()->json($response);
    }
}
