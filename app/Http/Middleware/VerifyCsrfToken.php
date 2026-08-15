<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class VerifyCsrfToken extends BaseVerifier
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        //
        //'panel/Yeguada/User',
        'wp-login.php',
        'fb/',
        'facebook_/',
        'facebook/',
        'Lang/',
        'provincia/',
        'mundialprice/',
        'mundialcub/',
        'getcubris/',
        'getprice/',
        'getpricetool/',
        'getcubritool/',
        'FacebookPost/',
        'panel/getcubritool',
        'panel/getprice',
        'panel/getpricetool',
        'panel/getcubris',

        'es/provincia/',
        'es/Lang/',
        'es/mundialprice/',
        'es/mundialcub/',
        'es/getcubris/',
        'es/getprice/',
        'es/getpricetool/',
        'es/getcubritool/',
        'es/FacebookPost/',
        'es/panel/getcubritool',
        'es/panel/getprice',
        'es/panel/getpricetool',
        'es/panel/getcubris',

        'en/provincia/',
        'en/Lang/',
        'en/mundialprice/',
        'en/mundialcub/',
        'en/getcubris/',
        'en/getprice/',
        'en/getpricetool/',
        'en/getcubritool/',
        'en/FacebookPost/',
        'en/panel/getcubritool',
        'en/panel/getprice',
        'en/panel/getpricetool',
        'en/panel/getcubris',

        'fr/provincia/',
        'fr/Lang/',
        'fr/mundialprice/',
        'fr/mundialcub/',
        'fr/getcubris/',
        'fr/getprice/',
        'fr/getpricetool/',
        'fr/getcubritool/',
        'fr/FacebookPost/',
        'fr/panel/getcubritool',
        'fr/panel/getprice',
        'fr/panel/getpricetool',
        'fr/panel/getcubris',

        'nl/provincia/',
        'nl/Lang/',
        'nl/mundialprice/',
        'nl/mundialcub/',
        'nl/getcubris/',
        'nl/getprice/',
        'nl/getpricetool/',
        'nl/getcubritool/',
        'nl/FacebookPost/',
        'nl/panel/getcubritool',
        'nl/panel/getprice',
        'nl/panel/getpricetool',
        'nl/panel/getcubris',

        'pt/provincia/',
        'pt/Lang/',
        'pt/mundialprice/',
        'pt/mundialcub/',
        'pt/getcubris/',
        'pt/getprice/',
        'pt/getpricetool/',
        'pt/getcubritool/',
        'pt/FacebookPost/',
        'pt/panel/getcubritool',
        'pt/panel/getprice',
        'pt/panel/getpricetool',
        'pt/panel/getcubris',

        'it/provincia/',
        'it/Lang/',
        'it/mundialprice/',
        'it/mundialcub/',
        'it/getcubris/',
        'it/getprice/',
        'it/getpricetool/',
        'it/getcubritool/',
        'it/FacebookPost/',
        'it/panel/getcubritool',
        'it/panel/getprice',
        'it/panel/getpricetool',
        'it/panel/getcubris',
        
        


        //route('stud.newuser')
    ];
}
