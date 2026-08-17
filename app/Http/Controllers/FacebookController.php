<?php
/*
https://www.facebook.com/settings?tab=applications
*/
/*150333739015306 PENMDIENTE ES PRUEBA*/
//https://stackoverflow.com/questions/23907170/oauth-exception-2500
//https://developers.facebook.com/apps/260261811093896/review-status/
//https://developers.facebook.com/docs/facebook-login/review/what-is-login-review/
//https://developers.facebook.com/docs/facebook-login/permissions/#reference-publish_pages
//https://developers.facebook.com/docs/facebook-login/access-tokens/#pagetokens
//https://developers.facebook.com/docs/graph-api/common-scenarios/#scheduledposts
//https://developers.facebook.com/docs/graph-api/reference/v2.8/page

namespace App\Http\Controllers;

use App;
use App\Models\Autopostconf;
use App\Models\Facebookpost;
use App\Models\Horse;
use App\Models\Photo;
use App\Models\Tokensocial;
use App\Models\Video;
use App\Models\User;
use Carbon\Carbon;
use Config;
use Facebook\Exceptions\FacebookAuthenticationException as FacebookAuthenticationException;
use Facebook\Exceptions\FacebookAuthorizationException as FacebookAuthorizationException;
use Facebook\Exceptions\FacebookClientException as FacebookClientException;
use Facebook\Exceptions\FacebookOtherException as FacebookOtherException;
use Facebook\Exceptions\FacebookResponseException as FacebookResponseException;
use Facebook\Exceptions\FacebookSDKException as FacebookSDKException;
use Facebook\Facebook;
use Horses;
use Illuminate\Http\Request;
use Socialite;
use function array_push;
use function flash;
use function is_array;
use function public_path;
use function redirect;
use function view;


//use \Facebook\Facebook
//1519916990+51839

class FacebookController extends Controller
{
    //
    const facebookScope = [
        //'user_birthday',
        //'user_location',

        'publish_pages',
        'manage_pages',
        /*Requeridos para publicar*/
        //'publish_actions',
        //'public_profile',

        //'pages_manage_instant_articles',
        //'user_friends',
        //'email',
    ];

    const facebookFields = [
        //'name', // Default
        'email', // Default
        //'gender', // Default
        //'birthday', // I've given permission
        //'location', // I've given permission
    ];
// Token de prueba  EAADstOzMgYgBAGTjw4NRe6FkcMmoqBJdGqIlDzre3CoJswlBsMf1RELE5KfcyGy2baNDBKqQVa89fBHp6zIF7rFiZCZBuZCxZB09YPhgAaTOcFN9OxMUXZCcs60SEF0qiNMhnstgJkyTHZCYSf454aUu99YwdnOzXcfSoYgJV0sYCFZCVYrxgA0NwloVj1TsKtTbHGZCOqB7z6WAA2SJQBVCfmgSLMZCAtXMTq2uX2PVUgwZDZD
    protected $fb;

    public function redirectToProvider($provider)
    {

        if (empty(\Auth::user())) return redirect()->route('portal');

        return Socialite::driver('facebook')->fields(self::facebookFields)->scopes(self::facebookScope)->redirect();
        return Socialite::driver($provider)->redirect();
    }

    public function FacebookCallBack(Request $request)
    {
        $rr = $request->error_reason;
        if ($rr == "user_denied") {
            flash(trans('facebook.error.user_deny'))->error();
            return redirect()->route('gallery.index');
        }
        $rr = $request->error_code;
        if (!empty($rr)) {
            flash(trans('facebook.error.errorfb', ['sms' => $request->error_code]))->error();
            return redirect()->route('gallery.index');
        }
        if (empty(\Auth::user())) return redirect()->route('portal');
        try {
            $user = Socialite::driver('facebook')->
            fields(self::facebookFields)->scopes(self::facebookScope)->reRequest()->stateless();

        } catch (\GuzzleHttp\Exception\ClientException $e) {
            abort(403, 'Unauthorized action.');
            return redirect()->to('/');
        } catch (\Exception  $e) {
            \Log::critical("Error en sociales " . $e->getMessage() . "\nCodigo : " . $e->getCode());
            flash(trans('facebook.error.errorfb1'))->error();
            return redirect()->route('gallery.index');
        }
        try {
            $users = $user->user();

        } catch (\GuzzleHttp\Exception\ClientException $e) {
            flash(trans('facebook.error.noatu'))->error();
            return redirect()->to('/');
        } catch (\Exception  $e) {
            \Log::critical("Error en sociales " . $e->getMessage() . "\nCodigo : " . $e->getCode());
            flash(trans('facebook.error.errorfb1'))->error();
            return redirect()->route('gallery.index');
        }

        /*GuzzleHttp\Exception\ClientException*/
        $jcode = json_encode($users);
        $ts = json_decode($jcode);
        $usuario = \Auth::user();
        $adm = $usuario->isAdm();
        if ($adm == true) {
            $yeguada = null;
            $sociales = Tokensocial::where(['user_id' => $usuario->id, 'studs_id' => 0, 'type' => 1])->first();
        } else {
            $yeguada = $usuario->Yeguada();
            $sociales = Tokensocial::where(['user_id' => $usuario->id, 'studs_id' => $yeguada->id, 'type' => 1])->first();
        }


        $social = $sociales;
        //$sociales = $usuario->Social()->where('type', 1)->first();
        if (empty($sociales)) {
            $sociales = new Tokensocial();
        }
        if ($adm == true) {
            $sociales->
            setTokenSocial($ts->token)->
            setSocialId($ts->id)->
            setEmail($users->email)->
            setJson($jcode)->
            setRed('Facebook')->
            setFacebookType()->
            setUserId($usuario->id)->
            setStudsId(0)->
            setExpire($users->expiresIn)->
            push();

        } else {
            $sociales->
            setTokenSocial($ts->token)->
            setSocialId($ts->id)->
            setEmail($users->email)->
            setJson($jcode)->
            setRed('Facebook')->
            setFacebookType()->
            setUserId($usuario->id)->
            setStudsId($yeguada->id)->
            setExpire($users->expiresIn)->
            push();
        }


        flash(trans('facebook.asso'))->info();
        /*Aqui paso 2*/
        return self::ListarPaginas();
        return redirect()->route('ObtenerPagina');
        /*$stud->getFbcontact()*/


    }

    public function ListarPaginas()
    {
        $usuario = \Auth::user();
        $adm = $usuario->isAdm();
        if ($adm == true) {
            $stud = null;
            $sociales = Tokensocial::where(['user_id' => $usuario->id, 'studs_id' => 0, 'type' => 1])->first();
        } else {
            $stud = $usuario->Yeguada();
            $sociales = Tokensocial::where(['user_id' => $usuario->id, 'studs_id' => $stud->id, 'type' => 1])->first();
        }

        if (empty($sociales)) {
            flash(trans('facebook.error.needpage'))->error();
            if ($adm == true) {
                return redirect()->route('FacebookAdmin');
            } else {
                return redirect()->route('ObtenerPagina');
            }
        }
        $r = self::ObtenerPaginasUsuario();
        if (!empty($r)) {

            $dat = $r->getDecodedBody();
            $paginas = $dat['data'];
            if ($adm != true) {
                return view('backend.content.facebook.paginas', compact('paginas'));
            } else {
                return view('admin.facebook.paginas', compact('paginas'));
            }
        } else {
            flash(trans('facebook.error.needpage'))->error();
            if ($adm == true) {
                return redirect()->route('FacebookAdmin');
            } else {
                return redirect()->route('ObtenerPagina');
            }

        }

    }

    public function ObtenerPaginasUsuario($id = null)
    {
        $fb = self::setFb();
        $usuario = \Auth::user();
        $adm = $usuario->isAdm();
        if ($adm != true) {
            $stud = $usuario->Yeguada();
            $sociales = Tokensocial::where(['user_id' => $usuario->id, 'studs_id' => $stud->id, 'type' => 1])->first();
        } else {
            $stud = null;
            $sociales = Tokensocial::where(['user_id' => $usuario->id, 'studs_id' => 0, 'type' => 1])->first();
        }
        $social = $sociales;
        if (empty($social)) {
            flash(trans('facebook.error.needpage'))->error();
            if ($adm != true) {
                return redirect()->route('ObtenerPagina');
            } else {
                return redirect()->route('FacebookAdmin');
            }
        }
        /*pendiente con esto

        Errores ajustar
        */
        $token = $social->getTokenSocial();
        $response = null;
        try {
            $response = $fb->get("/me/accounts?limit=100", "{$token}");
        } catch (FacebookResponseException $e) {
            // When Graph returns an error
            $sms = "FacebookResponseException : " . $e->getMessage();
            flash($sms)->error();

        } catch (FacebookAuthorizationException $e) {
            // When validation fails or other local issues
            $sms = "FacebookAuthorizationException : " . $e->getMessage();
            \Session::flash('errorlogin', true);
            flash($sms)->error();
        } catch (FacebookSDKException $e) {
            // When validation fails or other local issues
            $sms = "FacebookSDKException : " . $e->getMessage();
            \Session::flash('errorlogin', true);
            flash($sms)->error();
        } catch (FacebookClientException $e) {
            // When validation fails or other local issues
            $sms = "FacebookClientException : " . $e->getMessage();
            \Session::flash('errorlogin', true);
            flash($sms)->error();
        } catch (FacebookOtherException $e) {
            // When validation fails or other local issues
            $sms = "FacebookOtherException : " . $e->getMessage();
            \Session::flash('errorlogin', true);
            flash($sms)->error();
        } catch (FacebookAuthenticationException $e) {
            // When validation fails or other local issues
            $sms = "FacebookAuthenticationException : " . $e->getMessage();
            \Session::flash('errorlogin', true);
            flash($sms)->error();
        }
        /*error aqui*/
        if (!empty($response)) {
            $data = $response->getDecodedBody();
            $social->setUserData($data)->push();
            return $response;
        } else {
            if (!empty($sociales)) {
                $sociales->delete();
            }

            return null;
        }


    }

    public function setFb($user = null)
    {

        if (empty($user)) {
            $usuario = \Auth::user();
        } else {
            $usuario = $user;
        }
        $adm = $usuario->isAdm();
        if ($adm == true) {
            $stud_id = 0;
        } else {
            $stud = $usuario->Yeguada();
            $stud_id = $stud->id;
        }
        $sociales = Tokensocial::where(['user_id' => $usuario->id, 'studs_id' => $stud_id, 'type' => 1])->first();
        $social = $sociales;
        if (empty($social)) {

            $this->fb = new Facebook([
                'app_id' => \Config::get('services.facebook.app_id'),
                'app_secret' => \Config::get('services.facebook.app_secret'),
                'default_graph_version' => 'v2.8',
                //'default_access_token' => '246d701f5e5f50779b1c3373a3c1c2b9', // optional
            ]);
        } else {
            $token = $social->token_social;
            $paged = $social->getDataPage();
            if (!empty($paged)) {
                $token = $paged->access_token;
                $pid = $paged->id;
            }
            if (!empty($token)) {
                $this->fb = new Facebook([
                    'app_id' => \Config::get('services.facebook.app_id'),
                    'app_secret' => \Config::get('services.facebook.app_secret'),
                    'default_graph_version' => 'v2.8',
                    'default_access_token' => $token, // optional
                ]);
            } else {
                $this->fb = new Facebook([
                    'app_id' => \Config::get('services.facebook.app_id'),
                    'app_secret' => \Config::get('services.facebook.app_secret'),
                    'default_graph_version' => 'v2.8',
                    //'default_access_token' => '246d701f5e5f50779b1c3373a3c1c2b9', // optional
                ]);
            }
        }


        return $this->fb;
    }

    public function AutoPost()
    {

        $usuario = \Auth::user();
        $stud = $usuario->Yeguada();
        //$social = $stud->Social()->where('type', 1)->first();
        $sociales = Tokensocial::where(['user_id' => $usuario->id, 'studs_id' => $stud->id, 'type' => 1])->first();
        $social = $sociales;
        if (empty($social)) {
            flash(trans('facebook.error.needpage'))->error();
            return redirect()->route('ObtenerPagina');
        }
        $token = $social->getTokenSocial();
        $pid = $stud->getFbcontact();
        $paged = $social->getDataPage();
        if (!empty($paged)) {
            $token = $paged->access_token;
            $pid = $paged->id;
        }

        $response = self::DatoFb($pid, "/me", $token);
        if (!empty($response)) {
            $me = $response->getGraphUser();
            echo 'Logged in as ' . $me->getName();
        }
        dd($response);

    }

    public function LoginSdk()
    {
        $fb = self::setFb();

        $helper = $fb->getRedirectLoginHelper();

        try {
            $accessToken = $helper->getAccessToken();
        } catch (FacebookSDKException $e) {
            // When validation fails or other local issues
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
        } catch (FacebookClientException $e) {
            // When validation fails or other local issues
            echo 'FacebookClientException: ' . $e->getMessage();
            exit;
        } catch (FacebookOtherException $e) {
            // When validation fails or other local issues
            echo 'FacebookOtherException: ' . $e->getMessage();
            exit;
        } catch (FacebookAuthenticationException $e) {
            // When validation fails or other local issues
            echo 'FacebookAuthenticationException: ' . $e->getMessage();
            exit;
        } catch (FacebookSDKException $e) {
            // When validation fails or other local issues
            echo 'FacebookSDKException: ' . $e->getMessage();
            exit;
        } catch (FacebookAuthorizationException $e) {
            // When validation fails or other local issues
            echo 'FacebookAuthorizationException: ' . $e->getMessage();
            exit;
        } catch (FacebookResponseException $e) {
            // When Graph returns an error
            echo '1 Graph returned an error: ' . $e->getMessage();
            exit;
        }
        if (!isset($accessToken)) {

            if ($helper->getError()) {
                header('HTTP/1.0 401 Unauthorized');
                echo "Error: " . $helper->getError() . "\n";
                echo "Error Code: " . $helper->getErrorCode() . "\n";
                echo "Error Reason: " . $helper->getErrorReason() . "\n";
                echo "Error Description: " . $helper->getErrorDescription() . "\n";
            } else {

                header('HTTP/1.0 400 Bad Request');
                echo 'Bad request';
            }
            exit;
        }
        dd($accessToken);
        $permissions = ['email']; // Optional permissions
        $loginUrl = $helper->getLoginUrl('https://example.com/fb-callback.php', $permissions);

        echo '<a href="' . $loginUrl . '">Log in with Facebook!</a>';
    }

    public function ObtenerPagina()
    {

        //150333739015306
        return self::ConsultaFb('feed');
        $response = self::ConsultaFb('feed');

        /*$response = self::ConsultaFb('feed?fields=access_token');*/
        dd($response);
        $graphNode = $response->getGraphNode();
        dd($graphNode);
        /* handle the result*/
    }

    public function ConsultaFb($ask = 'feed')
    {
        /*https://developers.facebook.com/docs/graph-api/reference/page*/
        return self::PublicarCaballo();
        $fb = self::setFb();
        $usuario = \Auth::user();
        $stud = $usuario->Yeguada();

        //$social = $stud->Social()->where('type', 1)->first();
        $sociales = Tokensocial::where(['user_id' => $usuario->id, 'studs_id' => $stud->id, 'type' => 1])->first();
        $social = $sociales;
        if (empty($social)) {
            flash(trans('facebook.error.needpage'))->error();
            return redirect()->route('ObtenerPagina');
        }

        $token = $social->getTokenSocial();
        $pid = $stud->getFbcontact();
        $paged = $social->getDataPage();
        if (!empty($paged)) {
            $token = $paged->access_token;
            $pid = $paged->id;
        }

        $usuario = \Auth::user();
        $stud = $usuario->Yeguada();
        //$social = $stud->Social()->where('type', 1)->first();
        $sociales = Tokensocial::where(['user_id' => $usuario->id, 'studs_id' => $stud->id, 'type' => 1])->first();
        $social = $sociales;
        if (empty($social)) {
            flash(trans('facebook.error.needpage'))->error();
            return redirect()->route('ObtenerPagina');
        }
        $token = $social->getTokenSocial();
        $pid = $stud->getFbcontact();
        $paged = $social->getDataPage();
        if (!empty($paged)) {
            $token = $paged->access_token;
            $pid = $paged->id;
        }

        $response = self::DatoFb($pid, "/me", $token);
        if (!empty($response)) {

        }
    }

    public function PublicarCaballo($op = [], $horse = null, $tipo = 1, $posted = 1)
    {
        $fb = self::setFb();
        $usuario = \Auth::user();
        $adm = $usuario->isAdm();
        if ($adm != true) {
            $stud = $usuario->Yeguada();
            $stud_id = $stud->id;
            $sociales = Tokensocial::where(['user_id' => $usuario->id, 'studs_id' => $stud->id, 'type' => 1])->first();
        } else {
            $stud = null;
            $stud_id = 0;
            $sociales = Tokensocial::where(['user_id' => $usuario->id, 'studs_id' => 0, 'type' => 1])->first();
        }

        $social = $sociales;
        if (empty($sociales)) {
            flash(trans('facebook.error.needpage'))->error();
            return redirect()->route('ObtenerPagina');
        };
        $token = $sociales->getTokenSocial();
        if ($adm != true) {
            $pid = $stud->getFbcontact();
        } else {
            $pid = null;
        }
        $paged = $sociales->getDataPage();
        if (!empty($paged)) {
            $token = $paged->access_token;
            $pid = $paged->id;
        }

        if (empty($op)) {
            $contenido = '';
            if (!empty($horse)) {
                $horse = Horse::find(6);
                $link = route('MyHorseDetailed', ['stud' => $stud->slug, 'horse' => $horse->slug]);
                $op = [
                    'message' => $contenido,
                    'link' => $link,
                ];
            } else {
                $horse = 0;
                $op = [
                    'message' => $contenido,
                ];
            }
        } else {

            $contenido = $op['message'];
        }
        if (isset($op['source'])) {
            $op['link'] = $op['link'];
            $op['source'] = $fb->fileToUpload($op['source']);

            /*
            $ops = new CURLFile($op['source']['file'], 'image/' . $op['source']['ext']);
            $op['source']=$ops;
            */
            //$fb['source'] = ['file'=>public_path() . DS . $f['filepath'],'ext'=>$f['ext']];

        }

        if (empty($social)) {
            flash(trans('facebook.error.needpage'))->error();
            return redirect()->route('ObtenerPagina');
        }
        $token = $social->getTokenSocial();
        $paged = $social->getDataPage();
        if (!empty($paged)) {
            $token = $paged->access_token;
            $pid = $paged->id;
        }
        $timetogo = null;
        if (isset($op['scheduled_publish_time'])) {
            $timetogo = $op['scheduled_publish_time'];
            //$timetogo = Carbon::createFromTimestamp($timetogo);
        }
        if ($posted == 1) {
            $response = self::Publicar($pid, "feed?fields=created_time,from,id,message,permalink_url", $token, $op, $posted);//pido pagina
        }
        $hoy = Carbon::now();
        //$hoy = self::CambiarZona($hoy);
        if ($posted == 0) {
            /*no esta posteado*/
            $fp = new Facebookpost();
            $url = null;
            $id = null;
            $usuario = \Auth::user();
            if (!empty($usuario)) {
                $adm = $usuario->isAdm();
                if ($adm != true) {
                    if (empty($stud_id)) {
                        $stud_id = $usuario->Yeguada()->id;
                    }
                }
            }
            if ($tipo == 1) {
                /*Caballo*/
                $fp->
                setHorse($horse)->
                setFacebookId($id)->
                setStudsId($stud_id)->
                setMessage($contenido)->
                setUrl($url)->
                setFacebookPage($pid)->
                setUserMakeModel($usuario)->
                setUserPost(\Auth::user()->id)->
                setPublishTime($hoy)->
                setType($tipo)->
                setOp($op)->
                setPosted($posted);
                if (!empty($timetogo)) {
                    $fp->setProgramingDate($timetogo);
                }
                $fp->push();
            } elseif ($tipo == 2) {
                //$stud = \Auth::user()->Yeguada()->id;
                //$stud_id
                $fp->
                //setHorse($horse)->
                setStudsId($stud_id)->
                setFacebookId($id)->
                setMessage($contenido)->
                setUrl($url)->
                setFacebookPage($pid)->
                setUserMakeModel($usuario)->
                setUserPost(\Auth::user()->id)->
                setPublishTime($hoy)->
                setType($tipo)->
                setOp($op)->
                setPosted($posted);
                if (!empty($timetogo)) {
                    $fp->setProgramingDate($timetogo);
                }

                $fp->push();
            } elseif ($tipo == 3) {
                if ($adm != true) {
                    if (empty($stud_id)) {
                        $stud_id = $usuario->Yeguada()->id;
                    }
                }
                //$stud = \Auth::user()->Yeguada()->id;
                $fp->
                //setHorse($horse)->
                setStudsId($stud_id)->
                setFacebookId($id)->
                setMessage($contenido)->
                setUrl($url)->
                setFacebookPage($pid)->
                setUserMakeModel($usuario)->
                setUserPost(\Auth::user()->id)->
                setPublishTime($hoy)->
                setType($tipo)->
                setPosted($posted)->
                setOp($op);
                if (!empty($timetogo)) {
                    $fp->setProgramingDate($timetogo);
                }
                $fp->push();
            }
        } else {

            $usuario = \Auth::user();
            $stud_id = 0;
            if (!empty($usuario)) {
                $adm = $usuario->isAdm();
                if ($adm != true) {
                    if (empty($stud_id)) {
                        $stud_id = $usuario->Yeguada()->id;
                    }
                }
            }
            if (!empty($response)) {
                try {
                    $t = $response->getDecodedBody();
                    $id = $t['id'];
                    $fp = new Facebookpost();

                    if ($tipo == 1) {
                        /*Caballo*/

                        $fp->
                        setHorse($horse)->
                        setFacebookId($id)->
                        setMessage($contenido)->
                        setStudsId($stud_id)->
                        setUrl($t['id'])->
                        setFacebookPage($pid)->
                        setUserMakeModel($usuario)->
                        setUserPost(\Auth::user()->id)->
                        setPublishTime($hoy)->
                        setType($tipo)->
                        setOp($op)->
                        setPosted($posted)->
                        setData($t);
                        if (!empty($timetogo)) {
                            $fp->setProgramingDate($timetogo);
                        }
                        $fp->push();
                    } elseif ($tipo == 2) {
                        //$stud = \Auth::user()->Yeguada()->id;
                        $fp->
                        //setHorse($horse)->
                        setStudsId($stud_id)->
                        setFacebookId($id)->
                        setMessage($contenido)->
                        setUrl($t['id'])->
                        setFacebookPage($pid)->
                        setUserMakeModel($usuario)->
                        setUserPost(\Auth::user()->id)->
                        setPublishTime($hoy)->
                        setType($tipo)->
                        setOp($op)->
                        setPosted($posted)->
                        setData($t);
                        if (!empty($timetogo)) {
                            $fp->setProgramingDate($timetogo);
                        }

                        $fp->push();
                    } elseif ($tipo == 3) {
                        //$stud = \Auth::user()->Yeguada()->id;
                        $fp->
                        //setHorse($horse)->
                        setStudsId($stud_id)->
                        setFacebookId($id)->
                        setMessage($contenido)->
                        setUrl($t['id'])->
                        setFacebookPage($pid)->
                        setUserMakeModel($usuario)->
                        setUserPost(\Auth::user()->id)->
                        setPublishTime($hoy)->
                        setType($tipo)->
                        setPosted($posted)->
                        setOp($op)->
                        setData($t);
                        if (!empty($timetogo)) {
                            $fp->setProgramingDate($timetogo);
                        }
                        $fp->push();
                    }
                } catch (\BadMethodCallException $e) {

                }
            }
        }
        return redirect()->route('ObtenerPagina');
        return $fp;


    }

    public function Publicar($page_id = null, $ask = null, $token = null, $op = [], $posted = 1, $automatico = 0, $fb = null)
    {
        if (empty($fb)) {
            $fb = self::setFb();
        }
        $sms = null;
        $response = null;
        /*Este es el base */
        if ($posted == 1) {
            /*Aqui si se postea*/
        } else {
            /*Aqui si no se postea, guarda para luego*/
        }


        try {
            $response = $fb->post("/{$page_id}/$ask", $op, "{$token}");
        } catch (FacebookSDKException $e) {
            // When validation fails or other local issues
            $sms = "FacebookSDKException : " . $e->getMessage();
            if ($automatico != 1) {
                \Session::flash('errorlogin', true);
                flash($sms)->error();
            } else {
                $ahora = Functions::AjustarFechaFacebookTimeStamp();
                \Log::critical("ERROR PUB AUTOMATICA ahora = $ahora \n\t$sms\n\t" . json_encode($op) . "\n" . json_encode($e));

            }
        } catch (FacebookClientException $e) {
            // When validation fails or other local issues
            $sms = "FacebookClientException : " . $e->getMessage();
            if ($automatico != 1) {
                \Session::flash('errorlogin', true);
                flash($sms)->error();
            } else {
                \Log::critical("ERROR PUB AUTOMATICA $sms");
                \Log::critical(json_encode($e));
            }
        } catch (FacebookOtherException $e) {
            // When validation fails or other local issues
            $sms = "FacebookOtherException : " . $e->getMessage();
            if ($automatico != 1) {
                \Session::flash('errorlogin', true);
                flash($sms)->error();
            } else {
                \Log::critical("ERROR PUB AUTOMATICA $sms");
            }
        } catch (FacebookAuthenticationException $e) {
            // When validation fails or other local issues
            $sms = "FacebookAuthenticationException : " . $e->getMessage();
            if ($automatico != 1) {
                \Session::flash('errorlogin', true);
                flash($sms)->error();
            } else {
                \Log::critical("ERROR PUB AUTOMATICA $sms");
                \Log::critical(json_encode($e));
            }
        } catch (FacebookAuthorizationException $e) {
            // When validation fails or other local issues
            $sms = "FacebookAuthorizationException : " . $e->getMessage();
            \Log::critical(json_encode($e));
            if ($automatico != 1) {
                \Session::flash('errorlogin', true);
                flash($sms)->error();
            } else {
                \Log::critical("ERROR PUB AUTOMATICA $sms");
                \Log::critical(json_encode($e));
            }
        } catch (FacebookResponseException $e) {
            // When Graph returns an error
            $sms = "FacebookResponseException : " . $e->getMessage();
            if ($automatico != 1) {

                flash($sms)->error();
            } else {
                \Log::critical("ERROR PUB AUTOMATICA $sms");
                \Log::critical(json_encode($e));
            }

        }
        if ($automatico == 1) {
            $fa['respuesta'] = $response;
            $fa['post'] = 1;
            return $fa;
        }
        if (!empty($sms)) {
            if ($automatico != 1) {
                return redirect()->route('ObtenerPagina');
            } else {
                //\Log::critical("No pudo realizarse el post");
                return 0;
            }

        }
        if ($automatico != 1) {
            return $response;
        } else {
            $fa['respuesta'] = $response;
            $fa['post'] = 1;
            return $fa;
        }
    }

    public function GuardarDatosPagina(Request $r)
    {
        /*Guardar paginas 2*/
        $data_page = json_decode(Functions::DevolverComilla($r->data_page));

        $usuario = \Auth::user();
        $adm = $usuario->isAdm();
        if ($adm != true) {

            $stud = $usuario->Yeguada();
            //$social = $stud->Social()->where('type', 1)->first();

            $sociales = Tokensocial::where(['user_id' => $usuario->id, 'studs_id' => $stud->id, 'type' => 1])->first();
        } else {
            $sociales = Tokensocial::where(['user_id' => $usuario->id, 'studs_id' => 0, 'type' => 1])->first();
        }
        $social = $sociales;
        $social->setDataPage($data_page)->push();
        return self::MostrarPanelFacebook();
        if ($adm != true) {
            return redirect()->route('ObtenerPagina');
        } else {
            return redirect()->route('FacebookAdmin');
        }
    }

    public function MostrarPanelFacebook()
    {
        $user = \Auth::user();
        $adm = $user->isAdm();
        $usuario = $user;
        if ($adm == true) {
            $stud = null;
            $sociales = Tokensocial::where(['user_id' => $usuario->id, 'studs_id' => 0, 'type' => 1])->first();
        } else {
            $stud = $user->Yeguada();
            $sociales = Tokensocial::where(['user_id' => $usuario->id, 'studs_id' => $stud->id, 'type' => 1])->first();
        }
        if (empty($sociales)) {
            if ($adm == true) {
                return view('admin.facebook.login', compact('user', 'stud'));
            } else {
                return view('backend.content.facebook.login', compact('user', 'stud'));
            }
        }
        $paged = $sociales->getDataPage();
        if (empty($paged)) {
            return self::ListarPaginas();
        }

        if ($adm == true) {
            $publicaciones = Facebookpost::where([
                'user_post' => $user->id,
                'user_make' => $user->id,
                'studs_id' => 0,
            ])->get();
            $horses = Horses::where('id', '!=', 0)->orderby('name')->get();
            return view('admin.facebook.index', compact('user', 'stud', 'social', 'publicaciones', 'horses'));
        } else {
            $publicaciones = Facebookpost::where([
                'user_post' => $user->id,
                'user_make' => $user->id,
                /*'studs_id' => $user->Yeguada()->id,*/
            ])->get();
            //$publicaciones = $stud->FacebookPost()->get();
            $horses = Horses::where('id', '!=', 0)->where('studs_id', $user->Yeguada()->id)->orderby('name', 'asc')->get();
            return view('backend.content.facebook.index', compact('user', 'stud', 'social', 'publicaciones', 'horses'));
        }


    }

    public function PublicarContenido($contenido = 'Prueba')
    {
        $fb = self::setFb();
        $usuario = \Auth::user();
        $stud = $usuario->Yeguada();
        //$social = $stud->Social()->where('type', 1)->first();
        $social = Tokensocial::where(['user_id' => $usuario->id, 'studs_id' => $stud->id, 'type' => 1])->first();
        if (empty($social)) {
            flash(trans('facebook.error.needpage'))->error();
            return redirect()->route('ObtenerPagina');
        }

        $token = $social->getTokenSocial();
        $pid = $stud->getFbcontact();
        $paged = $social->getDataPage();
        if (!empty($paged)) {
            $token = $paged->access_token;
            $pid = $paged->id;
        }
        $hoy = Carbon::now();
        //$hoy = self::CambiarZona($hoy);
        $op = [
            'message' => $contenido,
            'name' => 'Veterano',
            'published' => false,
            'scheduled_publish_time' => $hoy->addMonth()->timestamp,
            'link' => 'horsesworldsale.com/yeguadajuanvazquez/detalle/veterano-vi',
        ];

        try {
            // Returns a `Facebook\FacebookResponse` object
            /*
            '/120891512066125/photos',
    array (
      'url' => 'https://scontent-mia3-2.xx.fbcdn.net/v/t39.2081-6/c0.0.17.17/p16x16/24294906_134607370564018_1899108919087726592_n.png?oh=64b0dcd06d66ae657ad204ffb9b99167&oe=5B1A7782'
    ),
    '{access-token}'

            horsesworldsale.com/yeguadajuanvazquez/detalle/veterano-vi
            */
            $response = $fb->post("/{$pid}/feed", $op, "{$token}");
        } catch (FacebookResponseException $e) {
            // When Graph returns an error
            $sms = "FacebookResponseException : " . $e->getMessage();
            flash($sms)->error();

        } catch (FacebookSDKException $e) {
            // When validation fails or other local issues
            $sms = "FacebookSDKException : " . $e->getMessage();
            \Session::flash('errorlogin', true);
            flash($sms)->error();
        } catch (FacebookClientException $e) {
            // When validation fails or other local issues
            $sms = "FacebookClientException : " . $e->getMessage();
            \Session::flash('errorlogin', true);
            flash($sms)->error();
        } catch (FacebookOtherException $e) {
            // When validation fails or other local issues
            $sms = "FacebookOtherException : " . $e->getMessage();
            \Session::flash('errorlogin', true);
            flash($sms)->error();
        } catch (FacebookAuthenticationException $e) {
            // When validation fails or other local issues
            $sms = "FacebookAuthenticationException : " . $e->getMessage();
            \Session::flash('errorlogin', true);
            flash($sms)->error();
        } catch (FacebookAuthorizationException $e) {
            // When validation fails or other local issues
            $sms = "FacebookAuthorizationException : " . $e->getMessage();
            \Session::flash('errorlogin', true);
            flash($sms)->error();
        }
        return $response;
        dd($response->getDecodedBody());
    }

    public function ObtenerPublicaciones()
    {
        /*Obtiene las publicacioens pasadas*/
        $response = self::ConsultaFb('feed');
        $d = $response->getDecodedBody();
        return $d;
        dd($response);
    }

    public function ConfiguracionProgramaciones(Request $r)
    {
        $diarios = $r->timehorsec;
        $cubriciones = $r->timehorsed;
        $ventas = $r->timehorsef;
        $activo = isset($r->activo) ? $r->activo : 0;
        $Fotoyeguada = isset($r->fyeguada) ? $r->fyeguada : 0;
        $FotoTiempoyeguada = isset($r->ftyeguada) ? $r->ftyeguada : null;
        $Videoyeguada = isset($r->vyeguada) ? $r->vyeguada : 0;
        $VideoTiempoyeguada = isset($r->vtyeguada) ? $r->vtyeguada : null;
        $user = \Auth::user();

        $adm = $user->isAdm();

        /*1*/
        /*
        if (!empty($r->yt)) {
            $fb['link'] = $r->yt;
            $tipo = 3;
        }
        */
        if (!empty($diarios)) {


            if ($adm != true) {
                $stud = $user->Yeguada();
                $config = Autopostconf::CaballoDiario($stud)->first();
                $sociales = Tokensocial::where(['user_id' => $user->id, 'studs_id' => $stud->id, 'type' => 1])->first();
            } else {
                $stud = 0;
                $config = Autopostconf::CaballoDiarioAdmin($user->id)->first();
                $sociales = Tokensocial::where(['user_id' => $user->id, 'studs_id' => 0, 'type' => 1])->first();
            }

            $total = $r->cantidaddiaria;

            if (empty($config)) {
                $config = new Autopostconf();
                if (!empty($stud)) {
                    $config->setStudsId($stud);
                }
                $config->setFacebookId($sociales)->setType(3)->setUsersId($user)->push();
            }
            /*
            if ($total != 0) {
                $config->setStatus(1)->push();
                flash("se ha programado $total caballos diarios")->info();
            } else {
                $config->setStatus(0)->push();
                flash("se han cancelado las publicaciones de caballos")->info();
            }
            */
            if ($activo == 0) {
                $config->setStatus(0)->push();
                flash(trans('facebook.caballos_canel'))->info();
            } else {
                $config->setStatus(1)->push();
                flash(trans('caballos_prog', ['total' => $total]))->info();
            }

            $config->setHoras($diarios)->push();

        }
        /*2*/
        if (!empty($cubriciones)) {

            if ($adm != true) {
                $stud = $user->Yeguada();
                $config = Autopostconf::CubricionDiario($stud)->first();
                $sociales = Tokensocial::where(['user_id' => $user->id, 'studs_id' => $stud->id, 'type' => 1])->first();
            } else {
                $stud = 0;
                $config = Autopostconf::CubricionDiarioAdmin($user->id)->first();
                $sociales = Tokensocial::where(['user_id' => $user->id, 'studs_id' => 0, 'type' => 1])->first();
            }


            $ruta = route('ConfigurarPublicacion');


            $total = $r->cantidaddiariacub;
            if (empty($config)) {
                $config = new Autopostconf();
                if (!empty($stud)) {
                    $config->setStudsId($stud);
                }
                $config->setFacebookId($sociales)->setType(3)->setUsersId($user)->push();
            }
            if ($activo == 0) {
                $config->setStatus(0)->push();
                flash(trans('facebook.cubriciones_canel'))->info();
            } else {
                $config->setStatus(1)->push();
                flash(trans('facebook.cubriciones_prog', ['total' => $total]))->info();

            }
            $config->setHoras($cubriciones)->push();

        }
        /*3*/
        if (!empty($ventas)) {


            if ($adm != true) {
                $stud = $user->Yeguada();
                $config = Autopostconf::VentasnDiario($stud)->first();
                $sociales = Tokensocial::where(['user_id' => $user->id, 'studs_id' => $stud->id, 'type' => 1])->first();
            } else {
                $stud = 0;
                $config = Autopostconf::VentasnDiarioAdmin($user->id)->first();
                $sociales = Tokensocial::where(['user_id' => $user->id, 'studs_id' => 0, 'type' => 1])->first();
            }

            $total = $r->cantidaddiariaventa;

            if (empty($config)) {
                $config = new Autopostconf();
                if (!empty($stud)) {
                    $config->setStudsId($stud);
                }
                $config->setFacebookId($sociales)->setType(3)->setUsersId($user)->push();
            }
            if ($activo == 0) {
                $config->setStatus(0)->push();
                //flash("se han cancelado las publicaciones de ventas")->info();
                flash(trans('facebook.ventas_canel'))->info();
            } else {
                $config->setStatus(1)->push();
                //flash("se ha programado $total ventas diarias")->info();
                flash(trans('facebook.ventas_prog', ['total' => $total]))->info();
            }

            $config->setHoras($ventas)->push();

        }
        /*4*/
        $probl = 1;
        if (!emptY($FotoTiempoyeguada) and $probl != 1) {
            /*Foto de instalacion*/
            $tiempo = $Fotoyeguada;
            $user = \Auth::user();
            $stud = $user->Yeguada();
            $config = Autopostconf::FotoInstalacionDiarioStid($stud)->first();
            $sociales = Tokensocial::where(['user_id' => $user->id, 'studs_id' => $stud->id, 'type' => 1])->first();
            //FotoInstalacionDiarioStid
            if (empty($config)) {
                $config = new Autopostconf();
                if (!empty($stud)) {
                    /*
                     'users_id',
        'studs_id',
                     */
                    $config->users_id = $user->id;
                    $config->studs_id = $stud->id;
                    //$config->setStudsId($stud);
                }
                $config->setFacebookId($sociales)->setType(4)->setUsersId($user)->push();
            }
            $activo = $r->fyeguada;
            if ($activo == 0) {
                $config->setStatus(0)->push();
                //flash("se han cancelado las publicaciones de ventas")->info();
                flash(trans('facebook.ventas_canel'))->info();
            } else {
                $config->setStatus(1)->push();
                //flash("se ha programado $total ventas diarias")->info();
                flash("en foto ok")->info();
            }

            $config->setHoras($FotoTiempoyeguada)->push();
        }

        if (!emptY($VideoTiempoyeguada)) {
            /*Video de instalacion*/
            //$Videoyeguada
            $tiempo = $VideoTiempoyeguada;
            $stud = $user->Yeguada();
            $config = Autopostconf::VideoInstalacionDiarioStid($stud)->first();
            $sociales = Tokensocial::where(['user_id' => $user->id, 'studs_id' => $stud->id, 'type' => 1])->first();
            //FotoInstalacionDiarioStid
            if (empty($config)) {
                $config = new Autopostconf();
                if (!empty($stud)) {
                    $config->users_id = $user->id;
                    $config->studs_id = $stud->id;
                    //$config->setStudsId($stud);
                }
                $config->setFacebookId($sociales)->setType(5)->setUsersId($user)->push();
            }
            $activo = $r->vyeguada;
            if ($activo == 0) {
                $config->setStatus(0)->push();
                //flash("se han cancelado las publicaciones de ventas")->info();
                flash(trans('facebook.ventas_canel'))->info();
            } else {
                $config->setStatus(1)->push();
                //flash("se ha programado $total ventas diarias")->info();
                flash("en video ok")->info();
            }

            $config->setHoras($VideoTiempoyeguada)->push();
        }

        if (!empty($config)) {
            $config->setTimezone(\Session::get('timezone'))->push();
        }


        if ($adm != true) {
            return redirect()->route('ObtenerPagina');
        } else {
            return redirect()->route('FacebookAdmin');
        }

    }

    public function ProgramarPublicacion(Request $r)
    {
        /*Aqui van todos*/
        $tipo = 1;
        $posted = 1;
        $aprob = true;

        $caballo = Horse::where('slug', $r->horse)->first();
        $tt = isset($r->dp2) ? $r->dp2 : null;
        $ta = isset($r->tp2) ? $r->tp2 : null;
        $tim = "$tt $ta";

        $hora = Functions::AjustarFechaFacebookTimeStamp($tim);
        $ahora1 = Functions::AjustarFechaFacebookTimeStamp();

        $mensaje = Functions::LimpiarTexto($r->mensaje);
        $file = $r->dro_fb;
        $user = \Auth::user();
        $adm = $user->isAdm();
        if ($adm != true) {
            $stud = $user->Yeguada();
        } else {
            $stud = null;
        }
        $idp = !empty($r->idp) ? $r->idp : null;


        $cantidadcaballo = isset($r->canhorses) ? $r->canhorses : 0;/*Caballos al azar*/
        $cantidadcaballocub = isset($r->canhorsescub) ? $r->canhorsescub : 0; /*Cubrcion*/
        $dif = $hora - $ahora1;
        $publicado = false;
        $fb = [];
        if ($dif < 60) {
            /*Si la diferencia es menos de 1 min, se publica ahora*/
            $hora = Functions::AjustarFechaFacebookTimeStamp() + 60;
        } else {
            if ($aprob == true) {
                $fb['published'] = $publicado;
                $fb['scheduled_publish_time'] = $hora;
                $posted = 0;
            }
        }


        if (!empty($file)) {
            if (isset($file[0])) {
                $tipo = 2;
                $f = (new FileController())->Imagen($r);
                if (is_array($f)) {
                    //$fb['source'] = ['file' => public_path() . DS . $f['filepath'], 'ext' => $f['ext']];
                    $fb['source'] = public_path() . DS . $f['filepath'];
                    $fb['link'] = $f['url'];
                }
            }

        }
        $sal['caballo'] = $caballo;
        $sal['fecha'] = $tim;
        $sal['hora'] = $hora;
        $sal['mensaje'] = $mensaje;
        $sal['ahora1'] = $ahora1;
        $urlcaballo = null;
        $llaa = App::getLocale();
        if (!empty($caballo)) {
            $stud = $caballo->getYeguada();
            $caballo->RecargarFb();
            if ($adm != true) {
                $abc = $caballo->GetUrlLenguaje();
                if (!empty($abc)) {
                    $urlcaballo = $abc[$llaa];
                    $urlcaballo = route('MyHorseDetailed', ['stud' => $stud->slug, 'horse' => $urlcaballo]);
                }


            } else {
                $abc = $caballo->ObtenerSlug();
                if (!empty($abc)) {
                    $urlcaballo = $abc[$llaa];
                    $urlcaballo = route('MyHorseDetailed', ['stud' => $stud->slug, 'horse' => $urlcaballo]);
                }
                $urlcaballo = route('portalcaballobase', ['slug' => $urlcaballo]);
            }

            $fb['link'] = $urlcaballo;
        }
        $nombrestud = !empty($stud) ? $stud->getName() : '';

        if (!empty($r->yt)) {
            $fb['link'] = $r->yt;
            $tipo = 3;
        }
        $fb['message'] = $mensaje;
        if (empty($idp)) {
            if ($cantidadcaballo != 0) {
                /*Multiples caballos*/

                $tt = isset($r->dp2start) ? $r->dp2start : null;
                $ta = isset($r->tp2start) ? $r->tp2start : null;
                $tim = "$tt $ta";
                $tt1 = isset($r->dp2end) ? $r->dp2end : null;
                $ta1 = isset($r->tp2end) ? $r->tp2end : null;
                $tim1 = "$tt1 $ta1";

                $fechaini = Functions::AjustarFechaFacebookTimeStamp($tim);
                $fechafin = Functions::AjustarFechaFacebookTimeStamp($tim1);
                $dif = 0;
                if ($fechafin < $fechaini) {
                    /*Fecha fin menor que ini, se ajusta nuevo ini*/
                    $t = $fechaini;
                    $fechafin = $fechaini;
                    $fechaini = $t;
                    /*Diferencia / caballo*/
                    $dif = ($fechafin - $fechaini) / $cantidadcaballo;
                } elseif ($fechafin > $fechaini) {
                    $dif = ($fechafin - $fechaini) / $cantidadcaballo;
                } else {
                    /*si fini igual fin, sera diario*/
                    $dif = 86400;
                }
                $caballos = self::CaballosAzar($cantidadcaballo);
                $fb['message'] = '';
                $bla = [];
                for ($i = 0; $i < $cantidadcaballo; $i++) {
                    $caballo = Horses::find($caballos[$i]);
                    $stud = $caballo->getYeguada();
                    $caballo->RecargarFb();
                    $urlcaballo = route('MyHorseDetailed', ['stud' => $stud->slug, 'horse' => $caballo->GetUrlLenguaje()]);
                    $fb['link'] = $urlcaballo;
                    $fb['published'] = $publicado;
                    $fb['scheduled_publish_time'] = $fechaini;
                    $posted = 0;

                    $face = $this->PublicarCaballo($fb, $caballo, $tipo, $posted); //pido pagina
                    $fechaini = $fechaini + $dif;
                }
            } elseif ($cantidadcaballocub != 0) {
                /*Cubriciones*/

                $tt = isset($r->dp2start) ? $r->dp2start : null;
                $ta = isset($r->tp2start) ? $r->tp2start : null;
                $tim = "$tt $ta";
                $tt1 = isset($r->dp2end) ? $r->dp2end : null;
                $ta1 = isset($r->tp2end) ? $r->tp2end : null;
                $tim1 = "$tt1 $ta1";

                $fechaini = Functions::AjustarFechaFacebookTimeStamp($tim);
                $fechafin = Functions::AjustarFechaFacebookTimeStamp($tim1);
                $dif = 0;
                if ($fechafin < $fechaini) {
                    /*Fecha fin menor que ini, se ajusta nuevo ini*/
                    $t = $fechaini;
                    $fechafin = $fechaini;
                    $fechaini = $t;
                    /*Diferencia / caballo*/
                    $dif = ($fechafin - $fechaini) / $cantidadcaballocub;
                } elseif ($fechafin > $fechaini) {
                    $dif = ($fechafin - $fechaini) / $cantidadcaballocub;
                } else {
                    /*si fini igual fin, sera diario*/
                    $dif = 86400;
                }
                $caballos = self::CaballosAzarCubri($cantidadcaballocub);
                $fb['message'] = '';
                $bla = [];
                for ($i = 0; $i < $cantidadcaballocub; $i++) {
                    $caballo = Horses::find($caballos[$i]);
                    $stud = $caballo->getYeguada();
                    $caballo->RecargarFb();
                    $urlcaballo = route('MyHorseDetailed', ['stud' => $stud->slug, 'horse' => $caballo->GetUrlLenguaje()]);
                    $fb['link'] = $urlcaballo;
                    $fb['published'] = $publicado;
                    $fb['scheduled_publish_time'] = $fechaini;
                    $posted = 0;

                    $face = $this->PublicarCaballo($fb, $caballo, $tipo, $posted); //pido pagina
                    $fechaini = $fechaini + $dif;
                }
            } else {
                $face = $this->PublicarCaballo($fb, $caballo, $tipo, $posted); //pido pagina
            }
        } else {
            $p = [
                'id' => $idp,
                'studs_id' => $stud->id,
                'posted' => 0,
            ];
            $post = Facebookpost::where($p)->first();
            if (!empty($post)) {
                $fb['published'] = $publicado;
                $fb['scheduled_publish_time'] = $hora;
                $post->setProgramingDate($hora)->setOp($fb)->push();
            }
            /*Reprogramar*/
        }
        if ($adm != true) {

            return redirect()->route('ObtenerPagina');
        } else {
            return redirect()->route('FacebookAdmin');
        }
        dd($face);

        dd($sal);

    }

    public function CaballosAzar($max = 0, $ids = [])
    {

        for ($i = 0; $i < $max; $i++) {
            $ids = self::CaballoNoIdNucleo($ids);
        }
        return $ids;


    }

    public function CaballoNoIdNucleo($ids = [])
    {
        if (!is_array($ids)) {
            $ids = [];
        }
        if (count($ids) != 0) {
            if (is_array($ids)) {
                $fa = Horses::where('studs_id', \Auth::user()->Yeguada()->id)->whereNotIn('id', $ids)->inRandomOrder()->first();
                if (!empty($fa)) {
                    $fa = $fa->id;
                    array_push($ids, $fa);
                }
            }
        } else {
            $fa = Horses::where('studs_id', \Auth::user()->Yeguada()->id)->inRandomOrder()->first()->id;
            array_push($ids, $fa);
        }
        return $ids;
    }

    public function CaballosAzarCubri($max = 0, $ids = [])
    {

        for ($i = 0; $i < $max; $i++) {
            $ids = self::CaballoNoIdNucleoCub($ids);
        }
        return $ids;


    }

    public function CaballoNoIdNucleoCub($ids = [])
    {
        if (!is_array($ids)) {
            $ids = [];
        }
        if (count($ids) != 0) {
            if (is_array($ids)) {
                $fa = Horses::where([
                    'studs_id' => \Auth::user()->Yeguada()->id,
                    'tocubri' => 1,
                ])->whereNotIn('id', $ids)->inRandomOrder()->first();
                if (!empty($fa)) {
                    $fa = $fa->id;
                    array_push($ids, $fa);
                }
            }
        } else {
            $fa = Horses::where('studs_id', \Auth::user()->Yeguada()->id)->inRandomOrder()->first()->id;
            array_push($ids, $fa);
        }
        return $ids;
    }

    public function SolicitarAutorizacion()
    {
        /*Login Paso 1*/
        $user = \Auth::user();
        $stud = $user->Yeguada();
        return view('backend.content.facebook.login', compact('user', 'stud'));
    }

    public function BorrarDatosFb()
    {
        $user = \Auth::user();
        $adm = $user->isAdm();
        if (empty($user)) return redirect()->route('landinghome');
        if ($adm != true) {
            $yeguada = $user->Yeguada();
            if (empty($yeguada)) return redirect()->route('landinghome');
            $sociales = Tokensocial::where(['user_id' => $user->id, 'studs_id' => $yeguada->id, 'type' => 1])->first();
            if (empty($sociales)) return redirect()->route('landinghome');
            $sociales->delete();
        } else {
            $sociales = Tokensocial::where(['user_id' => $user->id, 'studs_id' => 0, 'type' => 1])->first();
            if (empty($sociales)) return redirect()->route('landinghome');
            $sociales->delete();
        }


        if (empty($sociales)) return redirect()->route('landinghome');
        return redirect()->route('landinghome');
    }

    public function Privacidad()
    {
        return view('backend.content.facebook.privacidad');
    }

    public function Programas1dia()
    {
        
        $errores = App\Models\ErrorControl::where('created_at', '<', Carbon::now()->subMonth(3)->format('Y-m-d'))->get();
        foreach($errores as $k=>$v){
            $v->delete();
        }


        $errores = App\Models\Inicio::where('created_at', '<', Carbon::now()->subMonth(3)->format('Y-m-d'))->where('users_id', 0)->get();
        foreach($errores as $k=>$v){
            $v->delete();
        }
        
        set_time_limit(900);
        $dia = 120;//segundos
        $hoy = Carbon::now()->setTimezone('UTC');
        //$hoy = self::CambiarZona($hoy);
        $man = $hoy->addSeconds(abs($dia));
        $publ = Facebookpost::where('programing_date', "<", $man)->where('posted', '!=', 1)->get();
        $bad = 0;
        $good = 0;
        foreach ($publ as $k => $v) {
            $te = json_encode($v);

            $face = $this->PublicarRobot($v);


            if ($face == true) {
                $good = $good + 1;
            } else {

                \Log::critical("\n\n\tRevisando elementos \n\n\t$te\n\n" . json_encode($face));
                $v->delete();
                $bad = $bad + 1;
            }
        }
        echo " $good / $bad";
        //\Log::critical("Publicacion automatica el " . Carbon::now()->toDayDateTimeString() . " Buenos $good Malos $bad");
        return null;
    }

    public function PublicarRobot(Facebookpost $post)
    {
        //set_time_limit(300);
        $user = User::find($post->user_post);
        $fb = self::setFb($user);
        $usuario = $user;
        $adm = $user->isAdm();
        if ($adm == true) {
            $stud = null;
            $stud_id = 0;
            $sociales = Tokensocial::where(['user_id' => $usuario->id, 'studs_id' => 0, 'type' => 1])->first();
        } else {
            $stud = $usuario->Yeguada();
            $stud_id = $stud->id;
            $sociales = Tokensocial::where(['user_id' => $usuario->id, 'studs_id' => $stud->id, 'type' => 1])->first();
        }

        $op = $post->getOp();

        $sa = [];
        foreach ($op as $k => $v) {
            $sa[$k] = $v;
        }
        $op = $sa;
        if (isset($op['message'])) {

            $contenido = $op['message'];
        } else {

            $contenido = '';
        }
        $posted = $post->posted;
        $tipo = $post->getType();

        $social = $sociales;
        if (empty($sociales)) {
            \Log::critical('No se pudo postear por falta de permisos ' . $post->id);
            return null;
        };
        $token = $sociales->getTokenSocial();
        $pid = '';
        $paged = $sociales->getDataPage();
        if (!empty($paged)) {
            $token = $paged->access_token;
            $pid = $paged->id;
        }
        if (isset($op['source'])) {
            $op['link'] = $op['link'];
            $op['source'] = $fb->fileToUpload($op['source']);
        }

        $timetogo = null;
        if (isset($op['scheduled_publish_time'])) {
            unset($op['scheduled_publish_time']);
            unset($op['published']);
        }

        $response = self::Publicar($pid, "feed?fields=created_time,from,id,message,permalink_url", $token, $op, 1, 1, $fb);//pido pagina
        $hoy = Carbon::now()->setTimezone('UTC');
        //$hoy = self::CambiarZona($hoy);

        if (!empty($response)) {
            $posted = 1;

            if (isset($response['post'])) {
                $posted = $response['post'];
            }
            if (isset($response['respuesta'])) {
                $response = $response['respuesta'];
            } else {
                $response = null;
            }
            if (!empty($posted) and !empty($response)) {

                try {
                    $t = $response->getDecodedBody();
                    $id = $t['id'];
                    $fp = $post;
                    if ($tipo == 1) {
                        /*Caballo*/
                        $fp->

                        setFacebookId($id)->
                        setMessage($contenido)->
                        setUrl($t['id'])->
                        setPublishTime($hoy)->
                        setOp($op)->
                        setPosted($posted)->
                        setData($t);
                        if (!empty($timetogo)) {
                            $fp->setProgramingDate($timetogo);
                        }
                        $fp->push();
                    } elseif ($tipo == 2) {
                        $fp->
                        setFacebookId($id)->
                        setMessage($contenido)->
                        setUrl($t['id'])->
                        setPublishTime($hoy)->
                        setOp($op)->
                        setPosted($posted)->
                        setData($t);
                        if (!empty($timetogo)) {
                            $fp->setProgramingDate($timetogo);
                        }
                        $fp->push();
                    } elseif ($tipo == 3) {
                        $fp->
                        setFacebookId($id)->
                        setMessage($contenido)->
                        setUrl($t['id'])->
                        setPublishTime($hoy)->
                        setPosted($posted)->
                        setOp($op)->
                        setData($t);
                        if (!empty($timetogo)) {
                            $fp->setProgramingDate($timetogo);
                        }
                        $fp->push();
                    }
                    return true;
                } catch (\BadMethodCallException $e) {
                    return false;

                }
            } else {
                return false;
            }
        }
        return false;
    }

    public function BorrarPost(Request $r)
    {

        $user = \Auth::user();
        $stud = $user->Yeguada();
        $id = $r->id;
        $dat = $r->all();
        $p = [
            'id' => $id,
            'studs_id' => $stud->id,
            'posted' => 0,
        ];
        //return Functions::RetornaJson($dat);
        $post = Facebookpost::where($p)->first();
        $sal['status'] = 200;
        $sal['clear'] = 0;
        $sal['sms'] = Functions::ReemplazarApostrofe(trans('facebook.deletepostf'));
        if (!empty($post)) {
            $sal['sms'] = Functions::ReemplazarApostrofe(trans('facebook.deleteposte'));
            $post->delete();
            $sal['clear'] = 1;

        };
        $sal['status'] = 200;
        return Functions::RetornaJson($sal);
    }

    public function ObtenerDatoCaballo(Request $r)
    {
        $horse = Horse::where('slug', $r->id)->first();
        $sal['id'] = $r->id;
        $div = '<div class="col-6">';
        $ediv = "</div>";
        $foto = null;
        $descripcion = null;
        $st = null;
        if (!empty($horse)) {
            $color = trans('horse.color.' . $horse->color);
            $raza = trans('horse.raza.' . $horse->raza);
            $sexo = trans('horse.sex.' . $horse->sex);
            $edad = trans('horse.sex.' . $horse->sex);
            $color = $horse->getColorString();
            $alzada = $horse->getRaisedFormat();
            $foto = $horse->getPhotoFirstModel();
            $edad = $horse->getAge();
            $mes = $horse->getAgeMonth();
            $tocubri = $horse->tocubri;
            $tosold = $horse->tosold;

            $descripcion .= $div . trans('portal.raza') . ': ' . trans('horse.raza.' . $horse->raza) . $ediv;
            //$descripcion .= trans('portal.age') . ': ';
            if (empty($foto)) {
                $descripcion .= $div . trans('portal.age') . ': ' . trans('horse.years', ['ano' => $edad]) . $ediv;
            }
            if ($edad != 0) {
                $descripcion .= $div . trans('portal.age') . ': ' . trans('horse.years', ['ano' => $edad]) . $ediv;
            } else {
                $descripcion .= $div . trans('portal.age') . ': ' . trans('horse.mes', ['ano' => $mes]) . $ediv;
            }

            if (!empty($horse->raised)) {
                $descripcion .= $div . trans('stud.text.raised') . ': ' . $horse->getRaisedFormat() . $ediv;
            }
            if (!empty($horse->sex)) {
                $descripcion .= $div . trans('portal.sex') . ': ' . trans('horse.sex.' . $horse->sex) . $ediv;
            }
            if (!empty($horse->color)) {
                $descripcion .= $div . trans('horse.attrib.color') . ': ' . trans('horse.color.' . $horse->color) . $ediv;
            }
            if ($horse->getDoma() != 1) {
                $descripcion .= $div . trans('portal.doma') . ': ' . trans('horse.doma.0') . $ediv;
            } else {
                $descripcion .= $div . trans('portal.doma') . ': ' . trans('horse.doma.' . $horse->doma) . $ediv;
            }
            if (!empty($horse->tocubri)) {
                $descripcion .= $div . trans('horse.text.cubricion') . ': ' . Functions::AjustarNumeroMil($horse->ObtenPrecioCubricionMoneda()) . " " . $horse->getSimboloMoneda() . $ediv;
            }
            if ($horse->getTosold() == true) {
                if ($horse->sold == 1) {
                    $descripcion .= $div . trans('portal.price') . ': ' . trans('users.sold') . $ediv;
                } else {
                    if (empty($horse->getPrice())) {
                        $descripcion .= $div . trans('portal.price') . ': ' . trans('users.pricecheck') . $ediv;
                    } else {

                        $descripcion .= $div . trans('portal.price') . ': ' . Functions::AjustarNumeroMil($horse->getPrice()) . " " . $horse->getSimboloMoneda() . $ediv;
                    }
                }
            }

            if (!empty($foto)) {
                if (!empty($foto->url)) {
                    //col-xs-12 col-sm-12 col-md-12 col-lg-3 text-sm-left text-md-left text-lg-right col-12 m-t-25
                    $st .= '<div class="col-xs-12 col-sm-12 col-md-12 col-lg-3 text-sm-left text-md-left text-lg-right col-12 m-t-25">';
                    $st .= '<img src="' . $foto->getUrl() . '" alt="" class="img-fluid imgh">';
                    $st .= '</div>';
                }
            }
            $st .= '<div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 col-12 row m-t-25 row">';
            $st .= '<div class="col-12 text-center">' . $horse->getName() . '</div>';
            $st .= $descripcion;
            $st .= '</div>';
        }


        $sal['status'] = 200;
        //$sal['foto'] = $foto;
        $sal['description'] = Functions::ReemplazarApostrofe($st);
        //$sal['data'] = $horse;
        return Functions::RetornaJson($sal);

    }

    public function CambiarZona(Carbon $tiempo)
    {
        $time = \Session::get('timezone');
        $time = !empty($time) ? $time : Config::get('app.timezone');

        return $tiempo->setTimezone($time);

    }

    public function ProgramarCaballoDia()
    {
        $Programaciones = Autopostconf::where(['status' => 1])->get();
        $test = [];
        //CaballosAzarVenta
        foreach ($Programaciones as $k => $v) {
            //date_default_timezone_set($tas);
            $tz = 'UTC';
            if (!empty($v->timezone)) {
                $tz = $v->timezone;
                date_default_timezone_set($tz);
            }
            $user = User::find($v->users_id);
            //$user = $v->getUserModel();
            $stud = null;
            $adm = false;
            if (!empty($v->studs_id)) {

                $stud = $v->getStudModel();
                $sociales = Tokensocial::where(['user_id' => $v->users_id, 'studs_id' => $stud->id, 'type' => 1])->first();
            } else {
                $adm = true;
                $sociales = Tokensocial::where(['user_id' => $v->users_id, 'type' => 1])->first();
            }
            //$user = $stud->getUserModel();
            $fb = [];
            if (!empty($sociales)) {


                $token = $sociales->getTokenSocial();
                $paged = $sociales->getDataPage();

                if (!empty($paged)) {
                    $token = $paged->access_token;
                    $pid = $paged->id;
                }
                $tipo = $v->type;
                $horas = $v->getHoras();

                //$fb = self::setFb($user);
                $cantidad = count($horas);

                if ($tipo == 1) {
                    //scopeCaballoDiario
                    //CaballosAzar
                    //$h = self::CaballosAzar($cantidad);
                    if (!empty($stud)) {
                        $h = Horses::where(['studs_id' => $stud->id])->inRandomOrder()->get()->take($cantidad);
                    } else {
                        $h = Horses::where()->inRandomOrder()->get()->take($cantidad);
                    }
                } elseif ($tipo == 2) {
                    if (!empty($stud)) {
                        $h = Horses::where(['studs_id' => $stud->id, 'tocubri' => 1])->inRandomOrder()->get()->take($cantidad);
                    } else {
                        $h = Horses::where(['tocubri' => 1])->inRandomOrder()->get()->take($cantidad);
                    }

                    //$h = self::CaballosAzarCubri($cantidad);
                } elseif ($tipo == 3) {
                    if (!empty($stud)) {
                        $h = Horses::where(['studs_id' => $stud->id,
                            'tosold' => 1,
                            'sold' => 0,
                        ])->inRandomOrder()->get()->take($cantidad);
                    } else {
                        $h = Horses::where([
                            'tosold' => 1,
                            'sold' => 0,
                        ])->inRandomOrder()->get()->take($cantidad);
                    }

                    //$h = self::CaballosAzarVenta($cantidad);
                } elseif ($tipo == 4) {
                    //foto
                    if (!empty($stud)) {
                        $fotos = $stud->getPhotosModel()->pluck('id');
                        $fotos = Photo::wherein('id', $fotos)->inRandomOrder()->first();


                    }

                } elseif ($tipo == 5) {
                    //video
                    //getVideosModel
                    if (!empty($stud)) {
                        $videos = $stud->getVideosModel()->pluck('id');
                        $videos = Video::wherein('id', $videos)->inRandomOrder()->first();

                    }

                }

                if (!empty($videos)) {
                    $urlcaballo = ("https:" . $videos->getNormalVideoYoutube());
                    $format = 'Y/m/d ';
                    $hora = Carbon::now()->setTimezone('UTC')->format($format) . str_replace('"', '', $v->hora);
                    $format = 'Y/m/d H:i';
                    $hora = date("$format", strtotime($hora));
                    $time = $v->timezone;
                    $time = 'UTC';
                    if (empty($time)) {
                        $time = 'UTC';
                    }
                    $hora = Carbon::createFromFormat($format, $hora, $time)->setTimezone('UTC');
                    $time = Config::get('app.timezone');

                    $hora = $hora->setTimezone('UTC');
                    //->toDateTimeString()


                    //$fechaini = Functions::AjustarFechaFacebookTimeStamp($hora,true);
                    $fechaini = $hora->timestamp;


                    $fb['link'] = str_replace('(', '', str_replace(')', '', $urlcaballo));
                    $fb['published'] = 0;
                    $fb['scheduled_publish_time'] = $fechaini;

                    $fp = new Facebookpost();;
                    $contenido = null;
                    $id = null;


                    $fp->
                    setFacebookId($id)->
                    setStudsId($v->studs_id)->
                    setMessage($contenido)->
                    setUrl($urlcaballo)->
                    setFacebookPage($pid)->
                    setUserMakeModel($user)->
                    setUserPost($user->id)->
                    setType(5)->
                    setOp($fb)->
                    setPosted(0)->
                    setPublishTime($hora->toDateTimeString())->
                    setProgramingDate($hora->toDateTimeString());
                    $fp->push();
                }

                if (!empty($fotos)) {
                    $urlcaballo = $fotos->getUrl();
                    $format = 'Y/m/d ';
                    $hora = Carbon::now()->setTimezone('UTC')->format($format) . str_replace('"', '', $v->hora);
                    $format = 'Y/m/d H:i';
                    $hora = date("$format", strtotime($hora));
                    $time = $v->timezone;
                    if (empty($time)) {
                        $time = 'UTC';
                    }
                    $hora = Carbon::createFromFormat($format, $hora, $time)->setTimezone('UTC');
                    $time = Config::get('app.timezone');

                    //$hora = $hora->setTimezone($time);
                    //->toDateTimeString()


                    //$fechaini = Functions::AjustarFechaFacebookTimeStamp($hora,true);
                    $fechaini = $hora->timestamp;


                    $fb['link'] = $urlcaballo;
                    $fb['published'] = 0;
                    $fb['scheduled_publish_time'] = $fechaini;

                    $fp = new Facebookpost();;
                    $contenido = null;
                    $id = null;


                    $fp->
                    setFacebookId($id)->
                    setStudsId($v->studs_id)->
                    setMessage($contenido)->
                    setUrl($urlcaballo)->
                    setFacebookPage($pid)->
                    setUserMakeModel($user)->
                    setUserPost($user->id)->
                    setType(4)->
                    setOp($fb)->
                    setPosted(0)->
                    setPublishTime($hora->toDateTimeString())->
                    setProgramingDate($hora->toDateTimeString());
                    $fp->push();
                }


                if (count($cantidad) != 0) {
                    $caballos = $h;
                    $posted = 0;

                    //$caballos = self::CaballosAzar($cantidad);

                    $fb['message'] = '';
                    $bla = [];
                    for ($i = 0; $i < count($caballos); $i++) {
                        $caballo = $caballos[$i];
                        echo "Caballo " . $caballo->id . " Hora :" . $horas[$i] . " stud" . $v->studs_id . "<br>";
                        $format = 'Y/m/d ';
                        $hora = Carbon::now()->setTimezone('UTC')->format($format) . $horas[$i];
                        $format = 'Y/m/d H:i';
                        $hora = date("$format", strtotime($hora));
                        $time = $v->timezone;
                        if (empty($time)) {
                            $time = 'UTC';
                        }
                        $hora = Carbon::createFromFormat($format, $hora, $time)->setTimezone('UTC');
                        $time = Config::get('app.timezone');

                        //$hora = $hora->setTimezone($time);
                        //->toDateTimeString()


                        //$fechaini = Functions::AjustarFechaFacebookTimeStamp($hora,true);
                        $fechaini = $hora->timestamp;

                        $stud = $caballo->getYeguada();
                        $caballo->RecargarFb();
                        if ($adm != true) {
                            $urlcaballo = route('MyHorseDetailed', ['stud' => $stud->slug, 'horse' => $caballo->ObtenerSlug()]);

                        } else {
                            $urlcaballo = route('portalcaballobase', ['slug' => $caballo->ObtenerSlug()]);
                        }

                        $fb['link'] = $urlcaballo;
                        $fb['published'] = 0;
                        $fb['scheduled_publish_time'] = $fechaini;
                        //$face = $this->PublicarCaballo($fb, $caballo, 1, $posted); //pido pagina
                        $fp = new Facebookpost();;
                        $contenido = null;
                        $id = null;


                        $fp->
                        setHorse($caballo)->
                        setFacebookId($id)->
                        setStudsId($v->studs_id)->
                        setMessage($contenido)->
                        setUrl(null)->
                        setFacebookPage($pid)->
                        setUserMakeModel($user)->
                        setUserPost($user->id)->
                        setType($tipo)->
                        setOp($fb)->
                        setPosted(0)->
                        setPublishTime($hora->toDateTimeString())->
                        setProgramingDate($hora->toDateTimeString());
                        $fp->push();


                    }
                }
            } else {
                /* No hay usuario*/
                $sms = "Elemento " . $v->id . "\n\n";
                $sms .= json_encode($v);

                \Log::critical("\n\n\t PROBLEMA DE USUARIO \n\n\t$sms");
                $v->delete();
            }
        }

    }

    public function CaballosAzarVenta($max = 0, $ids = [])
    {

        for ($i = 0; $i < $max; $i++) {
            $ids = self::CaballoNoIdNucleoVenta($ids);
        }
        return $ids;


    }

    public function CaballoNoIdNucleoVenta($ids = [])
    {
        if (!is_array($ids)) {
            $ids = [];
        }
        if (count($ids) != 0) {
            if (is_array($ids)) {
                $fa = Horses::where([
                    'studs_id' => \Auth::user()->Yeguada()->id,
                    'tosold' => 1,
                    'sold' => 0,
                ])->whereNotIn('id', $ids)->inRandomOrder()->first();
                if (!empty($fa)) {
                    $fa = $fa->id;
                    array_push($ids, $fa);
                }
            }
        } else {
            $fa = Horses::where('studs_id', \Auth::user()->Yeguada()->id)->inRandomOrder()->first()->id;
            array_push($ids, $fa);
        }
        return $ids;
    }

}
