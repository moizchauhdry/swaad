<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use JWTAuth;
use Config;
use Storage;
use Validator;

class AuthController extends Controller
{
    private $responseConstants;
    private $authConstants;
    private $userConstants;

    public function __construct()
    {
        $this->responseConstants = Config::get('constants.RESPONSE_CONSTANTS');
        $this->authConstants = Config::get('constants.AUTH_CONSTANTS');
        $this->userConstants = Config::get('constants.USER_CONSTANTS');
    }

    public function login(Request $request)
    {
        $rules = [
            $this->authConstants['KEY_EMAIL'] => 'required|email',
            $this->authConstants['KEY_PASSWORD'] => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'status' => $this->responseConstants['STATUS_ERROR'],
                'message' => $this->responseConstants['INVALID_PARAMETERS'],
            ]);
        }


        $user = User::where('email', $request->get($this->authConstants['KEY_EMAIL']))->first();
        if ($user == null) {
            return response()->json([
                'status' => $this->responseConstants['STATUS_ERROR'],
                'message' => $this->responseConstants['ERROR_INVALID_CREDENTIALS'],
            ]);
        }
        $userStatus = $user->_check();
        if ($userStatus != null) {
            return response()->json($userStatus);
        }

        if (Hash::check($request->get($this->authConstants['KEY_PASSWORD']), $user->password)) {
            $token = Str::random(80) . time();

            $user->update(['last_login' => Carbon::now()->toDateTimeString(), 'access_token' => $token]);

            if ($request->has($this->authConstants['KEY_DEVICE_TOKEN']) && !empty($request->get($this->authConstants['KEY_DEVICE_TOKEN']))) {
                $user->update(['device_token' => $request->get($this->authConstants['KEY_DEVICE_TOKEN'])]);
            }

            $user->makeHidden(['status', 'is_approved', 'access_token']);

            $response['status'] = $this->responseConstants['STATUS_SUCCESS'];
            $response['access_token'] = $token;
            $response['user'] = $user;
            $response['message'] = $this->responseConstants['MSG_LOGGED_IN'];
            return response()->json($response);
        } else {
            return response()->json([
                'status' => $this->responseConstants['STATUS_ERROR'],
                'message' => $this->responseConstants['ERROR_INVALID_CREDENTIALS'],
            ]);
        }
    }

    public function signup(Request $request)
    {

        $rules = [
            $this->authConstants['KEY_EMAIL'] => 'required|unique:users|max:191',
            $this->authConstants['KEY_PASSWORD'] => 'required|min:6',
            $this->userConstants['KEY_NAME'] => 'required|string',
            $this->userConstants['KEY_ADDRESS'] => 'required|string',
            $this->userConstants['KEY_ZIP_CODE'] => 'required',
            $this->userConstants['KEY_PHONE_NO'] => 'required',
            $this->userConstants['KEY_HOME_NO'] => 'required',
//            $this->userConstants['KEY_PROFILE_IMAGE'] => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'status' => $this->responseConstants['STATUS_ERROR'],
                'message' => $this->responseConstants['INVALID_PARAMETERS'],
                'errors' => $validator->errors()
            ]);
        }

        $user = User::where('email', $request->get($this->authConstants['KEY_EMAIL']))->first();

        if (!empty($user)) {
            return response()->json([
                'status' => $this->responseConstants['STATUS_ERROR'],
                'message' => $this->responseConstants['ERROR_EMAIL_EXIST'],
            ]);
        }
        $token = Str::random(80) . time();

        $data = [
            'email' => $request->get($this->authConstants['KEY_EMAIL']),
            'password' => Hash::make($request->get($this->authConstants['KEY_PASSWORD'])),
            'name' => $request->get($this->userConstants['KEY_NAME']),
            'zip_code' => $request->get($this->userConstants['KEY_ZIP_CODE']),
            'address' => $request->get($this->userConstants['KEY_ADDRESS']),
            'phone_no' => $request->get($this->userConstants['KEY_PHONE_NO']),
            'home_no' => $request->get($this->userConstants['KEY_HOME_NO']),
            'access_token' => $token,
        ];

        $user = User::create($data);
        $user->update(['last_login' => Carbon::now()->toDateTimeString()]);


        if ($request->has($this->authConstants['KEY_DEVICE_TOKEN']) && !empty($request->get($this->authConstants['KEY_DEVICE_TOKEN']))) {
            $user->update(['device_token' => $request->get($this->authConstants['KEY_DEVICE_TOKEN'])]);
        }

        if ($request->hasFile($this->userConstants['KEY_PROFILE_IMAGE'])) {

            $directory = 'userProfileImages';
            if (!Storage::exists($directory)) {
                Storage::makeDirectory($directory);
            }

            $image_url = Storage::putFile($directory, new File($request->file($this->userConstants['KEY_PROFILE_IMAGE'])));
            $user->update(['image_url' => $image_url]);
        }

        $user->makeHidden(['is_approved', 'status', 'access_token']);
        $response['status'] = $this->responseConstants['STATUS_SUCCESS'];
        $response['access_token'] = $token;
        $response['user'] = $user;
        $response['message'] = $this->responseConstants['MSG_REGISTERED_SUCCESS'];
        return $response;
    }

    public function forgotPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            $this->authConstants['KEY_EMAIL'] => 'required|email',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => $this->responseConstants['STATUS_ERROR'],
                'message' => $this->responseConstants['INVALID_PARAMETERS'],
            ]);
        }

        $response = app('App\Http\Controllers\Auth\UserForgotPasswordController')->sendResetLinkEmail($request);
        return $response;
    }

    public function logout(Request $request)
    {
        $response = [];
        $user = JWTAuth::toUser($request->token);

        $userStatus = $user->_check();
        if ($userStatus != null) {
            return response()->json($userStatus);
        }

        $user = User::find($user->id);
        $user->update([
            'last_login' => Carbon::now()->toDateTimeString()
        ]);

        $response['status'] = $this->responseConstants['STATUS_SUCCESS'];
        $response['message'] = $this->responseConstants['MSG_LOGGED_OUT'];
        return response()->json($response);
    }

    public function updateProfile(Request $request)
    {

        $rules = [
            $this->userConstants['KEY_NAME'] => 'required|string',
            $this->userConstants['KEY_ADDRESS'] => 'required|string',
            $this->userConstants['KEY_ZIP_CODE'] => 'required',
            $this->userConstants['KEY_PHONE_NO'] => 'required',
            $this->userConstants['KEY_HOME_NO'] => 'required',
//            $this->userConstants['KEY_PROFILE_IMAGE'] => 'required',
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

        if (empty($user)) {
            return response()->json([
                'status' => $this->responseConstants['STATUS_ERROR'],
                'message' => 'User Not Found.',
            ]);
        }

        $data = [
            'name' => $request->get($this->userConstants['KEY_NAME']),
            'zip_code' => $request->get($this->userConstants['KEY_ZIP_CODE']),
            'address' => $request->get($this->userConstants['KEY_ADDRESS']),
            'phone_no' => $request->get($this->userConstants['KEY_PHONE_NO']),
            'home_no' => $request->get($this->userConstants['KEY_HOME_NO']),
        ];

        $user->update($data);


        if ($request->has($this->authConstants['KEY_DEVICE_TOKEN']) && !empty($request->get($this->authConstants['KEY_DEVICE_TOKEN']))) {
            $user->update(['device_token' => $request->get($this->authConstants['KEY_DEVICE_TOKEN'])]);
        }

        if ($request->hasFile($this->userConstants['KEY_PROFILE_IMAGE'])) {

            $directory = 'userProfileImages';
            if (!Storage::exists($directory)) {
                Storage::makeDirectory($directory);
            }

            $image_url = Storage::putFile($directory, new File($request->file($this->userConstants['KEY_PROFILE_IMAGE'])));
            $user->update(['image_url' => $image_url]);
        }

        $response['status'] = $this->responseConstants['STATUS_SUCCESS'];
        $response['user'] = $user;
        $response['message'] = 'Profile Update Successfully.';
        return $response;
    }
}
