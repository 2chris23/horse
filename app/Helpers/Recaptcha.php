<?php

namespace App\Helpers;

use Illuminate\Support\Facades\View;

class Recaptcha
{
    public static function render($options = [])
    {
        $publicKey = config('recaptcha.public_key', env('RECAPTCHA_PUBLIC_KEY', '6LcqVQkUAAAAAG1kxAmY--RWD4g1IOTY5NUXiA1v'));
        $dataParams = [];
        $data = [
            'public_key' => $publicKey,
            'options' => $options,
            'dataParams' => $dataParams,
            'lang' => app()->getLocale(),
        ];

        if (View::exists('recap')) {
            return View::make('recap', $data)->render();
        }

        return '<div class="g-recaptcha" data-sitekey="' . e($publicKey) . '"></div><script src="https://www.google.com/recaptcha/api.js" async defer></script>';
    }
}
