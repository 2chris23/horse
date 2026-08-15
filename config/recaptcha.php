<?php

return [
    'public_key' => env('RECAPTCHA_PUBLIC_KEY', '6LcqVQkUAAAAAG1kxAmY--RWD4g1IOTY5NUXiA1v'),
    'private_key' => env('RECAPTCHA_PRIVATE_KEY', '6LcqVQkUAAAAAN33YLlp4Jp0zbhNWd-pFqDyta40'),
    'template' => 'recap',
    'options' => [
        'curl_timeout' => 30,
        'curl_verify' => true,
    ],
    'version' => 2,
];
