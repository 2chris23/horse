<?php

namespace App\Http\Controllers;

use App;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use function explode;
use function flash;
use function redirect;
use function str_replace;

class HomeController extends Controller
{
    protected $error;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct($error = null)
    {
        $this->error = $error;
        //$this->middleware('auth');
    }

    public function RetornaCssFacebookIcon()
    {
        /*
                return response(view('assets.css.FbIcon')->render(), 200)
                    ->header('Content-Type', 'text/css');
        */
        return (new PublicController())->RetronoCompreso('text/css', view('assets.css.FbIcon')->render());
    }

    public function RetornaCssLanding()
    {
        return (new PublicController())->RetronoCompreso('text/css', view('frontend.landing.css')->render());
    }

    public function RetornaCssSearch()
    {
        return (new PublicController())->RetronoCompreso('text/css', view('assets.css.search')->render());
    }

    public function RetornaCssWP()
    {
        return (new PublicController())->RetronoCompreso('text/css', view('assets.css.fakeWp')->render());
    }

    public function RetornaClockJs()
    {
        return (new PublicController())->RetronoCompreso('text/javascript', view('assets.js.clockpicker')->render());
    }

    public function RetornaClockCss()
    {
        return (new PublicController())->RetronoCompreso('text/css', view('assets.css.clockpicker')->render());
    }

    public function RetornaJsLanding()
    {

        $txt = view('frontend.landing.js')->render();
        //return (new PublicController())->RetronoCompreso('text/css',$txt);
        return response($txt, 200)
            ->header('Content-Type', 'text/javascript');

    }

    public function RetornaJsEasing()
    {
        $txt = view('assets.js.easing')->render();
        //return (new PublicController())->RetronoCompreso('text/css',$txt);
        return response($txt, 200)
            ->header('Content-Type', 'text/javascript');

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $r)
    {

        $dominios = [
            0 => 'app'
        ];

        $lang = new PublicController($r);
        $lang->EstablecerLenguaje($r);
        //$this->EstablecerLenguaje($r); /*Para landing home tambien*/
        $buscar = \Config::get('aplication.host');
        $sub_app = \Config::get('aplication.sub_app');
        $r = str_replace($buscar, '', $_SERVER['SERVER_NAME']);
        $user = \Auth::user();
        if (!empty($this->error)) {
            flash($this->error);
        }
        if (empty($user)) {
            if ($r == $sub_app) {
                return redirect()->route('landinghome')->withErrors(['Error', $this->error]);

                //return redirect()->route('landinghome')->withErrors(['Error',$this->error]);
                //return view('frontend.landing.index');
            } else {
                return redirect()->route('portal');
            }

            //return view('portal.landing');
            //return view('fake.index');
            //return view('fake.ErrorFb');
            //return view('backend.home');
        } else {
            if ($user->isAdm()) {
                return view('admin.landing');
            }
            return view('backend.index');
            return redirect()->route('blank');
            return redirect()->route('horse.create');
            return redirect()->route('caballoc.index');
        }
        return view('backend.index');
        return redirect()->route('blank');
        return redirect()->route('caballoc.index');
    }

    public function indexlanding()
    {
        //dd(\Config::get('aplication.host'));
        //return view('frontend.landing.index');

        $dominios = [
            0 => 'app'
        ];


        $error = \Session::get('Error');
        $exito = \Session::get('exitoso');
        if (!empty($exito)) {
            flash($exito)->success();
        }
        if (!empty($error)) {
            flash($error)->error();
        }
        if (!empty($this->error)) {
            flash($this->error);
        }
        LaravelLocalization::setLocale(App::getLocale());

        $user = \Auth::user();
        if (empty($user)) {
            return view('fake.index');
        } else {
            if ($user->isAdm()) {
                return redirect('/admin/LogAs');
            } elseif ($user->Asociado()) {
                return redirect('/associated/LogAs');
            }
            return redirect('/panel/Caballos');
        }


            //$ruta =LaravelLocalization::getLocalizedURL(App::getLocale(), route('iniciocliente'));
            //$ruta =LaravelLocalization::getURLFromRouteNameTranslated(App::getLocale(), route('iniciocliente'));
            /*
            $url = url(App::getLocale() . "/" . LaravelLocalization::transRoute('rutas_admin.panel') . "/" . LaravelLocalization::transRoute('rutas_admin.iniciocliente'));
            dd($url);
            */
            $ruta = self::CambioUrlIdioma(route('iniciocliente'));

            return redirect($ruta);

            return redirect()->route('iniciocliente');
            return redirect()->route('gallery.index');
            return view('backend.index');
            return view('blank');
            return redirect()->route('blank');
            return redirect()->route('horse.create');
            return redirect()->route('caballoc.index');
        }
        return redirect()->route('blank');
        return redirect()->route('caballoc.index');
    }

    public static function CambioUrlIdioma($url, $leng = null)
    {
        $htt = "http://";
        if (empty($leng)) {
            $leng = App::getLocale();
        }
        $st = str_replace($htt, '', $url);
        $ex = explode("/", $st);
        $da = '';
        //dd($ex);
        for ($i = 0; $i < count($ex); $i++) {
            if ($i == 0) {
                $da = $ex[0] . "/$leng/";
            } else {
                $da = $da . $ex[$i] . "/";
            }
        }


        return ($htt.$da);

    }
}
