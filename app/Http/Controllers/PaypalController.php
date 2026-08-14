<?php

namespace App\Http\Controllers;

use App\Models\Codigopromo;
use App\Models\Orden;
use App\Models\Ordenitem;
use App\Models\Servicio;
use Carbon\Carbon;
use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Http\Request;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Exception\PayPalConnectionException;
use PayPal\Rest\ApiContext;
use function flash;
use function is_array;
use function is_numeric;
use function redirect;

//use PayPal\Api\ExecutePayment;


class PaypalController extends Controller
{
    private $_api_context;

    public function __construct()
    {
        // setup PayPal api context
        $paypal_conf = \Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential($paypal_conf['client_id'], $paypal_conf['secret']));
        $this->_api_context->setConfig($paypal_conf['settings']);
    }

    /*
        public function postPayment()
        {
            $payer = new Payer();
            $payer->setPaymentMethod('paypal');

            $items = array();
            $subtotal = 0;
            $cart = \Session::get('cart');
            $currency = 'MXN';

            foreach ($cart as $producto) {
                $item = new Item();
                $item->setName($producto->name)
                    ->setCurrency($currency)
                    ->setDescription($producto->extract)
                    ->setQuantity($producto->quantity)
                    ->setPrice($producto->price);

                $items[] = $item;
                $subtotal += $producto->quantity * $producto->price;
            }

            $item_list = new ItemList();
            $item_list->setItems($items);

            $details = new Details();
            $details->setSubtotal($subtotal)
                ->setShipping(100);

            $total = $subtotal + 100;

            $amount = new Amount();
            $amount->setCurrency($currency)
                ->setTotal($total)
                ->setDetails($details);

            $transaction = new Transaction();
            $transaction->setAmount($amount)
                ->setItemList($item_list)
                ->setDescription('Pedido de prueba en mi Laravel App Store');

            $redirect_urls = new RedirectUrls();
            $redirect_urls->setReturnUrl(\URL::route('payment.status'))
                ->setCancelUrl(\URL::route('payment.status'));

            $payment = new Payment();
            $payment->setIntent('Sale')
                ->setPayer($payer)
                ->setRedirectUrls($redirect_urls)
                ->setTransactions(array($transaction));

            try {
                $payment->create($this->_api_context);
            } catch (\PayPal\Exception\PPConnectionException $ex) {
                if (\Config::get('app.debug')) {
                    echo "Exception: " . $ex->getMessage() . PHP_EOL;
                    $err_data = json_decode($ex->getData(), true);
                    exit;
                } else {
                    die('Ups! Algo salió mal');
                }
            }

            foreach ($payment->getLinks() as $link) {
                if ($link->getRel() == 'approval_url') {
                    $redirect_url = $link->getHref();
                    break;
                }
            }

            // add payment ID to session
            \Session::put('paypal_payment_id', $payment->getId());

            if (isset($redirect_url)) {
                // redirect to paypal
                return \Redirect::away($redirect_url);
            }

            return \Redirect::route('cart-show')
                ->with('paypalsms', 'Ups! Error desconocido.');

        }
        */

    public function getPaymentStatus(Request $r, $paymentId = null, $Token = null, $PayerID = null)
    {

        $s = $r->all();
        //http://app.desarrollo.com/payment/status?paymentId=PAY-3AH65987MS884131NLIMFRSA&token=EC-21U79193KE813330L&PayerID=X5YZEK2X8ZXZL


        // Get the payment ID before session clear
        $payment_id = \Session::get('paypal_payment_id');

        // clear the session payment ID
        \Session::forget('paypal_payment_id');

//        $payerId = \Input::get('PayerID');

        $payerId = (isset($s['PayerID'])) ? $s['PayerID'] : null;
        //$token = \Input::get('token');
        $token = (isset($s['token'])) ? $s['token'] : null;

        if (empty($payerId)) {
            flash(trans('error.PagoCancelUsuario'))->error();
            return redirect()->route('suscripcion.plan');
        }
        if (empty($payerId) || empty($token)) {
            //flash()
            flash(trans('error.ProblemaPaypal'))->error();
            return redirect()->route('suscripcion.plan');
            return \Redirect::route('home')
                ->with('paypalsms', 'Hubo un problema al intentar pagar con Paypal');
        }

        $payment = Payment::get($payment_id, $this->_api_context);

        $execution = new PaymentExecution();
        $execution->setPayerId($payerId);


        $result = $payment->execute($execution, $this->_api_context);

        if ($result->getState() == 'approved') {
            try {
                $this->saveOrder($result->id);
            } catch (PayPalConnectionException $e) {
                dd($e);
            }
            \Session::forget('cart');
            return redirect()->route('suscripcion.index')->with('paypalsms', 'Compra realizada de forma correcta');
            //return redirect()->route('home')->with('paypalsms', 'Compra realizada de forma correcta');
            //return \Redirect::route('home')->with('paypalsms', 'Compra realizada de forma correcta');

        }
        return redirect()->route('suscripcion.index')->with('paypalsms', 'La compra fue cancelada');
        return redirect()->route('home')->with('paypalsms', 'La compra fue cancelada');
        //return \Redirect::route('home')->with('paypalsms', 'La compra fue cancelada');

    }

    protected function saveOrder($payment_id)
    {
        $subtotal = 0;
        $cart = \Session::get('cart');
        $cantidad = 0;
        if (is_array($cart)) {
            foreach ($cart as $producto) {
                $subtotal += $producto->subtotal;
                $cantidad +=$producto->cantidad;
            }
        } else {
            $subtotal = $cart->subtotal;
            $cantidad  =$cart->cantidad;
        }
        $order = Orden::create([
            //'cupones',
            //'descuento',
            'payment_id' => $payment_id,
            'users_id' => \Auth::user()->id,
            'studs_id' => \Auth::user()->Yeguada()->id,
            'subtotal' => $subtotal,

        ]);


        if (is_array($cart)) {
            foreach ($cart as $producto) {
                $this->saveOrderItem($producto, $order->id);
            }
        } else {
            $this->saveOrderItem($cart, $order->id);
        }
        \Auth::user()->Yeguada()->SumarMesSuscripcion($cantidad)->push();

    }

    protected function saveOrderItem($producto, $order_id)
    {

        if (!empty($producto->id)) {
            $t = Ordenitem::find($producto->id);
            $t->servicio_id = $producto->servicio_id;
            $t->tipo_servicio = $producto->tipo_servicio;
            $t->subtotal = $producto->subtotal;
            $t->cupones = $producto->cupones;
            $t->cantidad = $producto->cantidad;
            $t->status = $producto->status;
            $t->sesion = $producto->sesion;
            $t->orden_id = $order_id;

        } else {
            OrdenItem::create([
                'servicio_id' => $producto->servicio_id,
                'tipo_servicio' => $producto->tipo_servicio,
                'subtotal' => $producto->subtotal,
                'cupones' => $producto->cupones,
                'status' => $producto->status,
                'sesion' => $producto->sesion,
                'users_id' => $producto->users_id,
                'cantidad' => $producto->cantidad,
                'studs_id' => $producto->studs_id,
                'orden_id' => $order_id,
            ]);
        }
        \Session::forget('starpay');
    }

    public function SaveFakeSuscr(Request $r)
    {
        $t = new Ordenitem();
        $user = \Auth::user();
        $user_id = $user->id;
        $stud_id = $user->Yeguada()->id;

        $t->setUsersId($user_id)->setStudsId($stud_id);
        /*
                'servicio_id',
                'tipo_servicio',
                'subtotal',
                'status',
                'sesion',
                */
        $t->setServicioId(1)->setTipoServicio(0)->setSubtotal(49)->setSesion(\Session::getId())
            ->push();

        return Functions::RetornaJson($t->toArray());
    }

    public function GetOrdensFake()
    {
        $user = \Auth::user();
        $user_id = $user->id;
        $stud_id = $user->Yeguada()->id;

        $t = Ordenitem::where(['users_id' => $user_id, 'studs_id' => $stud_id])->get();

    }

    public function postPayment()
    {
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        $items = array();
        $subtotal = 0;
        //$cart = \Auth::user()->OrdenItem()->get();
        $cart = \Session::get('cart');
        $currency = 'EUR';
        $name = '1 mes de suscripcion';
        $descrip = 'Sucripcion por 1 mes de hws';
        $cantidad = 1;
        $i = 0;

        if (is_array($cart)) {
            foreach ($cart as $producto) {

                $item = new Item();
                $servicio = $producto->servicio_id;
                $tipo_servicio = $producto->tipo_servicio;
                $subtotal_p = $producto->subtotal;

                $item->setName($name)
                    ->setCurrency($currency)
                    ->setDescription($descrip)
                    ->setQuantity($cantidad)
                    ->setPrice($subtotal_p);

                $items[$i] = $item;
                $i += 1;
                $subtotal += $cantidad * $subtotal_p;
            }
        } else {
            $item = new Item();
            $servicio = $cart->servicio_id;
            $tipo_servicio = $cart->tipo_servicio;
            $subtotal_p = $cart->subtotal;

            $item->setName($name)
                ->setCurrency($currency)
                ->setDescription($descrip)
                ->setQuantity($cantidad)
                ->setPrice($subtotal_p);


            $items[0] = $item;
            $subtotal += $cantidad * $subtotal_p;
        }
        //dd($items);
        //return Functions::RetornaJson($items);


        $item_list = new ItemList();
        $item_list->setItems($items);

        $details = new Details();
        $details->setSubtotal($subtotal);
        ///->setShipping(100);

        //$total = $subtotal + 100;
        $total = $subtotal;

        $amount = new Amount();
        $amount->setCurrency($currency)
            ->setTotal($total)
            ->setDetails($details);

        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($item_list)
            ->setDescription('Suscripcion de HorsesWorldSale.com');

        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(\URL::route('payment.status'))
            ->setCancelUrl(\URL::route('payment.status'));

        $payment = new Payment();
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));

        try {

            $payment->create($this->_api_context);

        } catch (\PayPal\Exception\PayPalConnectionException $ex) {
            if (\Config::get('app.debug')) {
                echo "Exception: " . $ex->getMessage() . PHP_EOL;
                $err_data = json_decode($ex->getData(), true);
                exit;
            } else {
                die('Ups! Algo salió mal');
            }
        }

        foreach ($payment->getLinks() as $link) {
            if ($link->getRel() == 'approval_url') {
                $redirect_url = $link->getHref();
                break;
            }
        }

        // add payment ID to session
        \Session::put('paypal_payment_id', $payment->getId());

        if (isset($redirect_url)) {
            // redirect to paypal
            return \Redirect::away($redirect_url);
        }

        return \Redirect::route('cart-show')
            ->with('paypalsms', 'Ups! Error desconocido.');

    }

    public function BuscarCodigo($Codigo)
    {

    }

    public function Pago1mes(Request $r, $mnt = 1)
    {
        $plan = Servicio::Plan()->first();
        $valor = 25;


        if (!empty($r->mes)) {
            $mnt = $r->mes;
        }

        if ($mnt == 1) {
            $valor = $plan->getDescuentoBase();
        } elseif ($mnt == 3) {
            $valor = $plan->get3Meces();
        } elseif ($mnt == 6) {
            $valor = $plan->get6Meces();
        } elseif ($mnt == 12) {
            $valor = $plan->get12Meces();
        } elseif (is_numeric($mnt)) {
            $valor = $plan->getNMeces($mnt);
        } else {
            flash(trans('error.NoPlan'))->error();
            return redirect()->back();
        }

        if ($mnt < 1) {
            flash(trans('error.NoPlan'))->error();
            return redirect()->back();
        }


        $user = \Auth::user();
        $min10 = Carbon::now()->subMinutes(10);


        $pagos = Orden::where([
            'users_id' => $user->id,
            'subtotal' => $valor,
        ])->
        whereBetween('created_at', [$min10, Carbon::now()])->
        //wherenotnull('payment_id')->
        first();

        $sesion = \Session::getId();
        $codigo = strtolower($r->codigo);
        $hoy = Functions::AjustarFechaYmd(Carbon::now());
        if(!empty($codigo)){
            $c = Codigopromo::where([
                    'code' => $codigo,
                    'status' => 1,
                    'fin' <= $hoy]
            )->first();
            $d = Orden::where([
                'cupones'=>$codigo,
                'studs_id'=>\Auth::user()->Yeguada()->id,

            ])->first();

            if(!empty($d)){
                /*Codigo fue utilizado por este usuario*/
                //$f = Ordenitem::where('orden_id',$d->id)->first();
                $c = null;
            }

            if (!empty($c)) {
                $codigo = $codigo;
                \Session::put('promocion', $c);
            }else{
                $codigo = null;
            }
        }else{
            $c = null;
            $d = null;
        }


        $cart = new Ordenitem([
            'servicio_id' => $plan->id,
            'tipo_servicio' => 0,
            'subtotal' => $valor,
            'cupones' => $codigo,
            'status' => 0,
            'cantidad' => $mnt,
            'sesion' => \Session::getId(),
            'users_id' => \Auth::user()->id,
            'studs_id' => \Auth::user()->Yeguada()->id,

        ]);
        /**********************************************/
        /****************CODIGO AQUI*******************/
        /**********************************************/

        if (empty($pagos)) {







            \Session::put('cart', $cart);
            \Session::put('starpay', $sesion);


            $payer = new Payer();
            $payer->setPaymentMethod('paypal');

            $items = array();
            $subtotal = 0;
            //$cart = \Auth::user()->OrdenItem()->get();
            $cart = \Session::get('cart');
            $currency = 'EUR';
            $name = '1 mes de suscripcion';
            $descrip = 'Sucripcion por 1 mes de hws';
            $cantidad = 1;
            $i = 0;

            if (is_array($cart)) {
                foreach ($cart as $producto) {

                    $item = new Item();
                    $servicio = $producto->servicio_id;
                    $tipo_servicio = $producto->tipo_servicio;
                    $subtotal_p = $producto->subtotal;
                    if (!empty($c)) {
                        /*Si tiene codigo, se descuenta del total */
                        $subtotal_p = $c->getDescuentoPorcentaje($subtotal_p);
                    }
                    $item->setName($name)
                        ->setCurrency($currency)
                        ->setDescription($descrip)
                        ->setQuantity($cantidad)
                        ->setPrice($subtotal_p);


                    $items[$i] = $item;
                    $i += 1;
                    $subtotal += $cantidad * $subtotal_p;
                }
            } else {
                $item = new Item();
                $servicio = $cart->servicio_id;
                $tipo_servicio = $cart->tipo_servicio;
                $subtotal_p = $cart->subtotal;


                if (!empty($c)) {
                    /*Si tiene codigo, se descuenta del total */
                    $subtotal_p = $c->getDescuentoPorcentaje($subtotal_p);
                }
                $item->setName($name)
                    ->setCurrency($currency)
                    ->setDescription($descrip)
                    ->setQuantity($cantidad)
                    ->setPrice($subtotal_p);


                $items[0] = $item;
                $subtotal += $cantidad * $subtotal_p;
            }
            //dd($items);
            //return Functions::RetornaJson($items);


            $item_list = new ItemList();
            $item_list->setItems($items);

            $details = new Details();
            /*
            if (!empty($c)) {
                //Si tiene codigo, se descuenta del total
                $subtotal = $c->getDescuentoPorcentaje($subtotal);
            }
            */
            $details->setSubtotal($subtotal);
            ///->setShipping(100);

            //$total = $subtotal + 100;
            $total = $subtotal;

            $amount = new Amount();
            $amount->setCurrency($currency)
                ->setTotal($total)
                ->setDetails($details);

            $transaction = new Transaction();
            $transaction->setAmount($amount)
                ->setItemList($item_list)
                ->setDescription("Pago de suscripcion de $mnt meses para HorsesWorldSale.com,");

            $redirect_urls = new RedirectUrls();
            $redirect_urls->setReturnUrl(\URL::route('payment.status'))
                ->setCancelUrl(\URL::route('payment.status'));

            $payment = new Payment();
            $payment->setIntent('Sale')
                ->setPayer($payer)
                ->setRedirectUrls($redirect_urls)
                ->setTransactions(array($transaction));

            try {

                $payment->create($this->_api_context);

            } catch (\PayPal\Exception\PayPalConnectionException $ex) {
                if (\Config::get('app.debug')) {
                    echo "Exception: " . $ex->getMessage() . PHP_EOL;
                    $err_data = json_decode($ex->getData(), true);
                    exit;
                } else {
                    \Session::forget(['cart','starpay','promocion','paypal_payment_id']);
                    die('Ups! Algo salió mal');
                }
            }

            foreach ($payment->getLinks() as $link) {
                if ($link->getRel() == 'approval_url') {
                    $redirect_url = $link->getHref();
                    break;
                }
            }

            // add payment ID to session
            \Session::put('paypal_payment_id', $payment->getId());

            if (isset($redirect_url)) {
                // redirect to paypal
                return \Redirect::away($redirect_url);
            }
            \Session::forget(['cart','starpay','promocion','paypal_payment_id']);
            return \Redirect::route('cart-show')
                ->with('paypalsms', 'Ups! Error desconocido.');


        } else {
            return redirect()->route('suscripcion.plan')->with('paypalsms', 'Ya has realizado este pago');
        }


    }

}

