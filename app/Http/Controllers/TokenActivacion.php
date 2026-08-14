<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function flash;
use function redirect;
use function strlen;

class TokenActivacion extends Controller
{
    protected function guard()
    {
        return Auth::guard();
    }
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
    public function store(Request $request)
    {
        //
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
        //$d =
    }

    public function Activar($token)
    {
        //

        $d = \App\Models\TokenActivacion::where('token', $token)->first();

        if (!empty($token) and !empty($d)) {

            $user = $d->getUser();
            return view('backend.auth.passwords.changepassword', compact('token'));

        }else{
            flash(trans('error.TokenValidacionError'))->error();
            return redirect()->route('landinghome');
        }

    }

    public function PrimeraClave(Request $r)
    {


        $token = $r->token;
        $email = Functions::LimpiarCorreo($r->email);
        $emailc = Functions::ComprobarCorreo($email);
        $min = 5;
        $password = $r->password;
        $rpassword = $r->password_confirmation;
        $pswlen = strlen($password);
        $d = \App\Models\TokenActivacion::where('token', $token)->first();

        if (empty($d)) {
            $sms = trans('users.tokeninvalid');
            return redirect()->back()->withInput()->withErrors([
                'email' => $sms
            ]);
        }

        if ($password != $rpassword) {
            $sms = trans('users.passworddif');
            return redirect()->back()->withInput()->withErrors([
                'password' => $sms,
                'password_confirmation' => $sms
            ]);
        }
        if ($pswlen < $min) {
            $sms = trans('users.passwordlng', ['num' => $min]);
            return redirect()->back()->withInput()->withErrors([
                'password' => $sms,
                'password_confirmation' => $sms
            ]);
        }
        if ($emailc == false) {
            $sms = trans('users.emailinvalid');
            return redirect()->back()->withInput()->withErrors([
                'email' => $sms
            ]);
        }
        $u = User::where(['email' => $email, 'id' => $d->getUsersId()])->first();

        if (empty($u)) {
            $sms = trans('users.usernotfund');
            return redirect()->back()->withInput()->withErrors([
                'email' => $sms
            ]);
        }
        $d->delete();
        $u->setPassword($password)->
        setActive(1)->
        setValidado(0)->
        push();
        $this->guard()->login($u);
        $primera_vez = true;
        return redirect()->route('user.profile')->withErrors([
            'firsttime' => $primera_vez,
        ]);

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

    public function setNewToken()
    {
        $d = Functions::random_str();
        $f = \App\Models\TokenActivacion::where('token', $d)->first();
        if (!empty($f)) {
            $d = self::setNewToken();
        }
        return $d;

    }
}

