<?php

    return [
        'fcubs_base_url' => env('FCUBS_BASE_URL', 'http://10.11.5.3:5005'),
        'pmweb_base_url' => env('PMWEB_BASE_URL', 'http://10.11.5.3:5003'),

        'services' => [
            'FCUBSCustomer'          => env('FCUBSCustomer_WSDL', '/FCUBSCustomerService/FCUBSCustomerService?WSDL'),
            'FCUBSAcc'               => env('FCUBSAcc_WSDL', '/FCUBSAccService/FCUBSAccService?WSDL'),
            'FCUBSInwardRemittance'  => env('FCUBSInwardRemittance_WSDL', '/PMWeb/InwardRemittanceQueryService?WSDL'),
            'FCUBSOutwardRemittance' => env('FCUBSOutwardRemittance_WSDL', '/PMWeb/OutwardRemittanceQueryService?WSDL'),
            'FCUBSPMSinglePayout'    => env('FCUBSPMSinglePayout_WSDL', '/PMWeb/PMSinglePayOutService?WSDL'),
            'FCUBSPMAchOut'          => env('FCUBSPMAchOut_WSDL', '/PMWeb/PMAchOutService?WSDL'),
            'FCUBSPMCommonSingleTxn' => env('FCUBSPMCommonSingleTxn_WSDL', '/PMWeb/CommonSingleTxnQueryService?WSDL')
        ],

        'header' => [
            'source'   => env('FCUBSource', ''),
            'ubscomp'  => env('FCUBUbsComp', ''),
            'userid'   => env('FCUBUserId', ''),
            'branch'   => env('FCUBBranch', '000'),
            'moduleid' => env('FCUBModuleId', '')
        ],

        'providers' => [
            'models' => [
                'transaction'           => \App\Models\Common\Transaction::class,
                'merchant'              => \App\Models\Common\Merchant::class,
                'api'                   => \App\Models\Settings\ApiAccess::class,
                'webhook'               => \App\Models\Settings\Webhook::class,
                'merchant_account'      => \App\Models\Common\MerchantAccount::class,
                'retail_account'        => \App\Models\Account::class,
                'account_limit_setting' => \App\Models\AccountLimitSetting::class,
                'account_limit_log'     => \App\Models\AccountLimitLog::class,
                'sca'                   => \Finxp\Sca\Models\Token::class,
                'service'               => \App\Models\Common\Service::class,
                'user'                  => \App\Models\Auth\User::class,
            ],
            'services' => [
                'webhook' => \App\Services\Webhook\WebhookCallService::class,
                'freshdesk' => \Finxp\FreshDesk\Services\FreshDesk\Facades\FreshDesk::class,
            ]
        ],

        'middleware' => [
            'role' => \Spatie\Permission\Middlewares\RoleMiddleware::class,
            'routeotp' => \Finxp\Sca\Http\Middleware\RouteOtp::class
        ],

        'mail' => [
            'paymentNotificationTo' => env('PAYMENT_NOTIFICATION_TO')
        ],

        'prefix' => 'api/fc',

        'webhook_header_keys' => [
            'branchCode'      => env('FCUBBranch', '000'),
            'appId'           => env('FCUBSAppId', 'SRVADAPTER'),
            'userId'          => '',
            'ECID-Context'    => ''
        ],

        'fc_app' => env('FC_FRONTEND_APP'),

        'banking_api'      => [
            'base_url'     => env('BANKING_API_BASE_URL', 'http://10.1.100.6:82/api/v1'),
            'credentials'  => [
                'username' => env('BANKING_API_AUTH_KEY', ''),
                'password' => env('BANKING_API_AUTH_SECRET', '')
            ]
        ],

        'db_services' => [
            'id' => env('APP_DB_SERVICE_ID'),
            'retail_service_name' => env('APP_RETAIL_SERVICE_NAME', 'CoreRetail'),
            'core_id' => env('APP_DB_SERVICE_CORE_ID'),
            'retail_id' => env('APP_DB_SERVICE_RETAIL_ID'),
        ],

        'enable_webpush_notification' => env('ENABLE_WEBPUSH_NOTIF', false),

        'general' => [
            'secret_key' => env('SIGNED_SECRET_KEY'),
            'signed_providers' => env('SIGNED_PROVIDERS')
        ],

        'transaction' => [
            'payment_url' => env('RETAIL_PAYMENT_URL'),
            'days_min_limit' => env('ZAZOO_TRANSACTION_DAYS_MIN_LIMIT', 30),
            'days_max_limit' => env('ZAZOO_TRANSACTION_DAYS_MAX_LIMIT', 90),
        ],

        'provider' => [
            'piq_webhook_url' => env('PIQ_WEBHOOK_URL'),
            'piq_webhook_secret' => env('PIQ_WEBHOOK_SECRET_KEY'),
        ],

        'bic' => env('FINXP_BIC', 'PAUUMTM1XXX'),

        'zazoo' => env('ZAZOO_PROVIDER_NAME', 'ziyl'),

        'payment_notification_url' => env('PAYMENT_NOTIFICATION_URL'),
    ];
