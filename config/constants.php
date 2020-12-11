<?php

return [
    'RESPONSE_CONSTANTS' => [
        'STATUS_ERROR' => 0,
        'STATUS_SUCCESS' => 1,
        'STATUS_OTHER_ERROR' => 2,
        'STATUS_ACCOUNT_UNAUTHORIZED' => 3,
        'STATUS_ACCOUNT_SUSPENDED' => 4,
        'STATUS_ACCOUNT_DELETED' => 5,
        'STATUS_INVALID_TOKEN' => 6,
        'STATUS_EMAIL_NOT_VERIFIED' => 8,
        'INVALID_PARAMETERS' => 'Invalid Request Parameters.',
        'ERROR_EMAIL_EXIST' => 'Email Already In Use.',
        'ERROR_PASSWORD_MATCH' => 'Current Password Not Match.',
        'ERROR_PHONE_EXIST' => 'Phone Already In Use.',
        'ERROR_USER_NAME_EXIST' => 'User Name Already In Use.',
        'ERROR_INVALID_CREDENTIALS' => 'Invalid Email or Password.',
        'ERROR_ACCOUNT_DELETED' => 'Your Account Has Been Deleted.',
        'ERROR_ACCOUNT_UNAUTHORIZED' => 'Your Account Is Not Authorized Yet.',
        'ERROR_INVALID_EMAIL' => 'Invalid Email Address.',
        'MSG_LOGGED_IN' => 'Logged In Successfully.',
        'MSG_LOGGED_OUT' => 'Logged Out Successfully.',
        'MSG_REGISTERED_SUCCESS' => 'Registered Successfully.',
        'MSG_PROFILE_UPDATE_SUCCESS' => 'Profile Update Successfully.',
        'MSG_ITEM_ADDED_RECORD' => 'Item Added Successfully.',
    ],

    'CATEGORY_CONSTANTS' => [
        'KEY_CATEGORY_ID' => 'category_id',
    ],
    'AUTH_CONSTANTS' => [
        'KEY_EMAIL' => 'email',
        'KEY_PASSWORD' => 'password',
        'KEY_DEVICE_TOKEN' => 'device_token',
        'KEY_NEW_PASSWORD' => 'new_password',

    ],
    'PRODUCT_CONSTANTS' => [
        'KEY_PRODUCT_ID' => 'product_id',
    ],
    'GENERAL_CONSTANTS' => [
        'KEY_COUNT' => 'count',
    ],
    'USER_CONSTANTS' => [
        'KEY_USER_ID' => 'user_id',
        'KEY_NAME' => 'name',
        'KEY_EMAIL' => 'email',
        'KEY_PASSWORD' => 'password',
        'KEY_NEW_PASSWORD' => 'new_password',
        'KEY_PHONE_NO' => 'phone_no',
        'KEY_HOME_NO' => 'home_no',
        'KEY_GENDER' => 'gender',
        'KEY_ADDRESS' => 'address',
        'KEY_ZIP_CODE' => 'zip_code',
        'KEY_PROFILE_IMAGE' => 'profile_image',
    ],
];

