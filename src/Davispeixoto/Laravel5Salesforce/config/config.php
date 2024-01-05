<?php
return [

    /*
    |--------------------------------------------------------------------------
    | Your Salesforce credentials
    |--------------------------------------------------------------------------
    |
    |
    */

    // production
    'username' => env('SALESFORCE_USERNAME'),
    'password' => env('SALESFORCE_PASSWORD'),
    'token' => env('SALESFORCE_TOKEN'),
    'wsdl' => storage_path('app/' . env('SALESFORCE_WSDL', 'wsdl/enterprise.wsdl.xml')),

    'sf_api_client_id' => env('SF_API_CLIENT_ID'),
    'sf_api_client_secret' => env('SF_API_CLIENT_SECRET'),
    'sf_api_endpoint' => env('SF_API_ENDPOINT'),
    'sf_api_login_endpoint' => env('SF_API_LOGIN_ENDPOINT'),
    'sf_api_password' => env('SF_API_PASSWORD'),
    'sf_api_security_token' => env('SF_API_SECURITY_TOKEN'),
    'sf_api_username' => env('SF_API_USERNAME')
];
