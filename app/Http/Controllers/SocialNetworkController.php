<?php

namespace App\Http\Controllers;

use App\Models\SocialNetwork;
use App\Models\Stud;
use App\Models\User;
use Illuminate\Http\Request;
use function strlen;
use function strtolower;

class SocialNetworkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function AjustarHttp($str = null)
    {
        if (empty($str)) return $str;
        $str = strtolower($str);
        $b = 'https://';
        $t = Functions::BuscarEnString(substr($str, 0, strlen($b)), $b);
        if ($t == true) return $str;
        $b = 'http://';
        $t = Functions::BuscarEnString(substr($str, 0, strlen($b)), $b);
        if ($t == true) return $str;
        $b = 'https://';
        return $b . $str;


    }
    public function store(Request $request)
    {
        //
        $user = \Auth::user();
        $stud = $user->Yeguada()->id;
        if(\Auth::user()->getType()==0){
            $stud = Stud::find($request->stud_id);
            $user = User::find($stud->getUsersId());
        }


        $user = $user->id;
        $type = strtolower($request->type);
        $url = $request->url;

        $facebook = filter_var(($request->facebook), FILTER_SANITIZE_URL);
        $youtube = filter_var($request->youtube, FILTER_SANITIZE_URL);
        $twitter = filter_var($request->twitter, FILTER_SANITIZE_URL);
        $instagram = filter_var($request->instagram, FILTER_SANITIZE_URL);
        $google = filter_var($request->google, FILTER_SANITIZE_URL);
        $pinterest = filter_var($request->pinterest, FILTER_SANITIZE_URL);
        $fbuser = filter_var($request->fbuser, FILTER_SANITIZE_URL);
        $wsuser = Functions::LimpiarTexto($request->wsuser);


        $facebook = self::AjustarHttp($facebook);
        $youtube = self::AjustarHttp($youtube);
        $twitter = self::AjustarHttp($twitter);
        $instagram = self::AjustarHttp($instagram);
        $google = self::AjustarHttp($google);
        $pinterest = self::AjustarHttp($pinterest);



        $sal['status'] = 200;
        $sal['sms'] = "";


        if (!empty($facebook)) {
            $social = SocialNetwork::Facebook($stud, $user)->first();
            $social_n = new SocialNetwork(['user_id' => $user, 'stud_id' => $stud]);
            if (empty($social)) $social = $social_n;
            if ($social->UrlExist($url)) {
                $social->setFacebook($facebook);
                $sal['status'] = 200;
                $sal['sms'] .= "Facebook actualizado $facebook<br>";
            } else {
                $sal['status'] = 400;
                $sal['sms'] .= "La direccion $facebook no es valida<br>";
            }
        } else {
            $social = SocialNetwork::Facebook($stud, $user)->first();
            if (!empty($social)) {
                $social->url = null;
                $social->push();
            }
        }
        if (!empty($pinterest)) {
            $social = SocialNetwork::Pinterest($stud, $user)->first();
            $social_n = new SocialNetwork(['user_id' => $user, 'stud_id' => $stud]);
            if (empty($social)) $social = $social_n;

            if ($social->UrlExist($url)) {
                $social->setPinterest($pinterest);
                $sal['status'] = 200;
                $sal['sms'] .= "Pinterest actualizado $pinterest<br>";
            } else {
                $sal['status'] = 400;
                $sal['sms'] .= "La direccion $pinterest no es valida<br>";
            }

        } else {
            $social = SocialNetwork::Pinterest($stud, $user)->first();
            if (!empty($social)) {
                $social->url = null;
                $social->push();
            }
        }
        if (!empty($twitter)) {
            $social = SocialNetwork::Twitter($stud, $user)->first();
            $social_n = new SocialNetwork(['user_id' => $user, 'stud_id' => $stud]);
            if (empty($social)) $social = $social_n;
            if ($social->UrlExist($url)) {
                $social->setTwitter($twitter);
                $sal['status'] = 200;
                $sal['sms'] .= "Twitter actualizado $twitter<br>";
            } else {
                $sal['status'] = 400;
                $sal['sms'] .= "La direccion $twitter no es valida<br>";
            }
        } else {
            $social = SocialNetwork::Twitter($stud, $user)->first();
            if (!empty($social)) {
                $social->url = null;
                $social->push();
            }
        }
        if (!empty($instagram)) {
            $social = SocialNetwork::Instagram($stud, $user)->first();
            $social_n = new SocialNetwork(['user_id' => $user, 'stud_id' => $stud]);
            if (empty($social)) $social = $social_n;
            if ($social->UrlExist($url)) {
                $social->setInstagram($instagram);
                $sal['status'] = 200;
                $sal['sms'] .= "Instagram actualizado $instagram<br>";
            } else {
                $sal['status'] = 400;
                $sal['sms'] .= "La direccion $instagram no es valida<br>";
            }


        } else {
            $social = SocialNetwork::Instagram($stud, $user)->first();
            if (!empty($social)) {
                $social->url = null;
                $social->push();
            }
        }
        /*
        if (!empty($google)) {
            $social = SocialNetwork::Google($stud, $user)->first();
            $social_n = new SocialNetwork(['user_id' => $user, 'stud_id' => $stud]);
            if (empty($social)) $social = $social_n;

            if ($social->UrlExist($url)) {
                $social->setGoogle($google);
                $sal['status'] = 200;
                $sal['sms'] .= "Google actualizado $google<br>";
            } else {
                $sal['status'] = 400;
                $sal['sms'] .= "Google actualizado $google<br>";
            }

            $sal['status'] = 200;

        }
        */
        if (!empty($youtube)) {
            $social = SocialNetwork::Youtube($stud, $user)->first();
            $social_n = new SocialNetwork(['user_id' => $user, 'stud_id' => $stud]);
            if (empty($social)) $social = $social_n;
            if ($social->UrlExist($url)) {
                $social->setYoutube($youtube);
                $sal['status'] = 200;
                $sal['sms'] .= "Youtube actualizado $youtube<br>";
            } else {
                $sal['status'] = 400;
                $sal['sms'] .= "Youtube actualizado $google<br>";
            }

        } else {
            $social = SocialNetwork::Youtube($stud, $user)->first();
            if (!empty($social)) {
                $social->url = null;
                $social->push();
            }
        }
        $stud = \Auth::user()->Yeguada();
        $stud->setWscontact($wsuser)->setFbcontact($fbuser)->push();
        $sal['fbuser']=$fbuser;
        $sal['$wsuser']=$wsuser;
        return Functions::RetornaJson($sal);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

