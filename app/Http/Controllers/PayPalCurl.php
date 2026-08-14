<?php

namespace App\Http\Controllers;

use function flash;
use Illuminate\Http\Request;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Validator;

class PayPalCurl extends Controller
{
    //
    protected $stripe;

    /**
     * PayPalCurl constructor.
     * @param $stripe
     */
    public function __construct()
    {
        $this->stripe = Stripe::make(\Config::get('services.stripe.secret'));
    }


    function get_web_page($url)
    {
        /*Perfil de fb*/
        $user_agent = 'Mozilla/5.0 (Windows NT 6.1; rv:8.0) Gecko/20100101 Firefox/8.0';

        $options = array(

            CURLOPT_CUSTOMREQUEST => "GET",        //set request type post or get
            CURLOPT_POST => false,        //set to GET
            CURLOPT_USERAGENT => $user_agent, //set user agent
            CURLOPT_COOKIEFILE => "cookie.txt", //set cookie file
            CURLOPT_COOKIEJAR => "cookie.txt", //set cookie jar
            CURLOPT_RETURNTRANSFER => true,     // return web page
            CURLOPT_HEADER => false,    // don't return headers
            CURLOPT_FOLLOWLOCATION => true,     // follow redirects
            CURLOPT_ENCODING => "",       // handle all encodings
            CURLOPT_AUTOREFERER => true,     // set referer on redirect
            CURLOPT_CONNECTTIMEOUT => 120,      // timeout on connect
            CURLOPT_TIMEOUT => 120,      // timeout on response
            CURLOPT_MAXREDIRS => 10,       // stop after 10 redirects
        );

        $ch = curl_init($url);
        curl_setopt_array($ch, $options);
        $content = curl_exec($ch);
        $err = curl_errno($ch);
        $errmsg = curl_error($ch);
        $header = curl_getinfo($ch);
        curl_close($ch);

        $header['errno'] = $err;
        $header['errmsg'] = $errmsg;
        $header['content'] = $content;
        return $header;
    }

    public function PagoCurl(Request $r)
    {

        $url = "https://api.sandbox.paypal.com/v1/payments/payment";
        $user_agent = 'Mozilla/5.0 (Windows NT 6.1; rv:8.0) Gecko/20100101 Firefox/8.0';
        $consulta =
            '{
  "intent": "sale",
  "payer": {
  "payment_method": "paypal"
  },
  "transactions": [
  {
    "amount": {
    "total": "30.11",
    "currency": "USD",
    "details": {
      "subtotal": "30.00",
      "tax": "0.07",
      "shipping": "0.03",
      "handling_fee": "1.00",
      "shipping_discount": "-1.00",
      "insurance": "0.01"
    }
    },
    "description": "The payment transaction description.",
    "custom": "EBAY_EMS_90048630024435",
    "invoice_number": "48787589673",
    "payment_options": {
    "allowed_payment_method": "INSTANT_FUNDING_SOURCE"
    },
    "soft_descriptor": "ECHI5786786",
    "item_list": {
    "items": [
      {
      "name": "hat",
      "description": "Brown hat.",
      "quantity": "5",
      "price": "3",
      "tax": "0.01",
      "sku": "1",
      "currency": "USD"
      },
      {
      "name": "handbag",
      "description": "Black handbag.",
      "quantity": "1",
      "price": "15",
      "tax": "0.02",
      "sku": "product34",
      "currency": "USD"
      }
    ],
    "shipping_address": {
      "recipient_name": "Brian Robinson",
      "line1": "4th Floor",
      "line2": "Unit #34",
      "city": "San Jose",
      "country_code": "US",
      "postal_code": "95131",
      "phone": "011862212345678",
      "state": "CA"
    }
    }
  }
  ],
  "note_to_payer": "Contact us for any questions on your order.",
  "redirect_urls": {
  "return_url": "https://www.example.com/return",
  "cancel_url": "https://www.example.com/cancel"
  }
}';
        $options = array(

            CURLOPT_CUSTOMREQUEST => "post",        //set request type post or get
            CURLOPT_POST => true,        //set to GET
            CURLOPT_USERAGENT => $user_agent, //set user agent
            CURLOPT_COOKIEFILE => "cookie.txt", //set cookie file
            CURLOPT_COOKIEJAR => "cookie.txt", //set cookie jar
            CURLOPT_RETURNTRANSFER => true,     // return web page
            CURLOPT_HEADER => false,    // don't return headers
            CURLOPT_FOLLOWLOCATION => true,     // follow redirects
            CURLOPT_ENCODING => "",       // handle all encodings
            CURLOPT_AUTOREFERER => true,     // set referer on redirect
            CURLOPT_CONNECTTIMEOUT => 120,      // timeout on connect
            CURLOPT_TIMEOUT => 120,      // timeout on response
            CURLOPT_MAXREDIRS => 10,       // stop after 10 redirects
        );
    }

    public function PruebaStripe()
    {
        /*Crear el prodcuto*/
        $product = $this->stripe->products()->create([
            'name' => 'T-shirt',
            'description' => 'Comfortable gray cotton t-shirts',
            'attributes' => ['size', 'gender']
        ]);

        dd($product);

        $sku = $this->stripe->skus()->create([
            'product' => 'pr_16nYIkJvzVWl1WTezKYABD87',
            'price' => 1500,
            'currency' => 'usd',
            'inventory' => [
                'type' => 'finite',
                'quantity' => 500
            ],
            'attributes' => [
                'size' => 'Medium',
                'gender' => 'Unisex',
            ],
        ]);
        dd($sku);

        $order = $this->stripe->orders()->create([
            'currency' => 'usd',
            'items' => [
                [
                    'type' => 'sku',
                    'parent' => 't-shirt-small-red',
                ],
            ],
            'shipping' => [
                'name' => 'Jenny Rosen',
                'address' => [
                    'line1' => '1234 Main street',
                    'city' => 'Anytown',
                    'country' => 'US',
                    'postal_code' => '123456',
                ],
            ],
            'email' => 'jenny@ros.en'
        ]);
        dd($order);

    }

    public function StripePost(Request $r)
    {
        $validator = Validator::make($r->all(), [
            'card_no' => 'required',
            'ccExpiryMonth' => 'required',
            'ccExpiryYear' => 'required',
            'cvvNumber' => 'required',
            'amount' => 'required',
        ]);

        $input = $r->all();
        if ($validator->passes()) {

            $input = array_except($input, array('_token'));
            $stripe = $this->stripe;
            try {
                $token = $stripe->tokens()->create([
                    'card' => [
                        'number' => $r->get('card_no'),
                        'exp_month' => $r->get('ccExpiryMonth'),
                        'exp_year' => $r->get('ccExpiryYear'),
                        'cvc' => $r->get('cvvNumber'),
                    ],
                ]);

                if (!isset($token['id'])) {
                    \Session::put('error', 'The Stripe Token was not generated correctly');
                    return redirect()->route('paywithstripe');
                }
                $charge = $stripe->charges()->create([
                    'card' => $token['id'],
                    'currency' => 'EUR',
                    'amount' => $r->get('amount'),
                    'description' => 'Add in wallet',
                ]);
                if ($charge['status'] == 'succeeded') {
                    /**
                     * Write Here Your Database insert logic.
                     */
                    \Session::put('success', 'Money add successfully in wallet');
                    return redirect()->route('paywithstripe');
                } else {
                    \Session::put('error', 'Money not add in wallet!!');
                    return redirect()->route('paywithstripe');
                }
            } catch (Exception $e) {

                flash($e->getMessage())->error();
                //\Session::put('error', $e->getMessage());
                return redirect()->route('paywithstripe');
            } catch (\Cartalyst\Stripe\Exception\CardErrorException $e) {

                flash($e->getMessage())->error();
                //\Session::put('error', $e->getMessage());
                return redirect()->route('paywithstripe');
            } catch (\Cartalyst\Stripe\Exception\MissingParameterException $e) {

                flash($e->getMessage())->error();

                //\Session::put('error', $e->getMessage());
                return redirect()->route('paywithstripe');
            }
        }
        flash('All fields are required!!')->error();
        //\Session::put('error', 'All fields are required!!');
        return redirect()->route('paywithstripe');
    }

    public function payWithStripe()
    {
        //dd(\Auth::user());
        return view('paywithstripe');
    }
}
