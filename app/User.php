<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'phone_no','home_no', 'address', 'zip_code', 'image_url', 'status', 'is_approved', 'email_verified_at', 'device_token', 'last_login', 'remember_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return ['login' => $this->last_login];
    }

    public function _check()
    {
        if ($this->status == 0)
            return [
                'status' => 2,
                'message' => 'Your account is suspended.',
            ];
//        if ($this->is_approved == 0)
//            return [
//                'status' => 3,
//                'message' => 'Your account is not approved yet.',
//            ];

        return null;
    }


}
