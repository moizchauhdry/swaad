<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Reservation;
use App\User;
use Config;
use Illuminate\Http\Request;
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
            $this->reservationConstants['KEY_DATE'] => 'required',
            $this->reservationConstants['KEY_DAYTIME'] => 'required',
            $this->reservationConstants['KEY_PEOPLE'] => 'required',
            $this->reservationConstants['KEY_MESSAGE'] => 'required',
        ];

        if (!isset($request->header()['authorization'][0])) {
            $rules[$this->reservationConstants['KEY_NAME']] = 'required';
            $rules[$this->reservationConstants['KEY_EMAIL']] = 'required|email';
            $rules[$this->reservationConstants['KEY_PHONE']] = 'required';
        }

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'status' => $this->responseConstants['STATUS_ERROR'],
                'message' => $this->responseConstants['INVALID_PARAMETERS'],
                'errors' => $validator->errors()
            ]);
        }

        if (isset($request->header()['authorization'][0])) {
            $user = User::where('access_token', $request->header()['authorization'][0])->first();
            $userId = $user->id;
        } else {
            $userId = null;
        }
        if (isset($request->header()['authorization'][0])) {
            $name = $user->name;
            $email = $user->email;
            $phone = $user->phone_no;
        } else {
            $name = $request->get($this->reservationConstants['KEY_NAME']);
            $email = $request->get($this->reservationConstants['KEY_EMAIL']);
            $phone = $request->get($this->reservationConstants['KEY_PHONE']);
        }
        $data = [
            "user_id" => $userId,
            "name" => $name,
            "email" => $email,
            "phone" => $phone,
            "people" => $request->get($this->reservationConstants['KEY_PEOPLE']),
            "date" => $request->get($this->reservationConstants['KEY_DATE']),
            "time_of_day" => $request->get($this->reservationConstants['KEY_DAYTIME']),
            "message" => $request->get($this->reservationConstants['KEY_MESSAGE']),
        ];

        $reservation = Reservation::create($data);

        $response['status'] = $this->responseConstants['STATUS_SUCCESS'];
        $response['message'] = 'Your Reservation Is Submit.';
        return response()->json($response);
    }
}
