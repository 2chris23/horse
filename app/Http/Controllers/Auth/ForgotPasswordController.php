<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Functions;
use App\Http\Controllers\MailController;
use App\Models\PasswordReset;
use Auth;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use User;
use function compact;
use function redirect;
use function view;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showLinkRequestForm()
    {
        return view('auth.passwords.email');
    }

    /**
     * Send a reset link to the given user.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function sendResetLinkEmail(Request $request)
    {
        $this->validate($request, ['email' => 'required|email']);
        $user = User::where('email', $request->email)->first();
        if (!empty($user)) {
            $t = new MailController();
            $s = $t->RestaurarContrasena($user);
            if ($s == true) {
                //ok
            } else {
                $sms = trans('error.NoCliente');
                \Session::flash('error', $sms);
                flash($sms)->error();

                //problemas al enviar el correo
            }
        } else {
            //No existe
            $sms = trans('error.NoCliente');
            \Session::flash('error', $sms);
            flash($sms)->error();
        }
        return redirect()->route('landinghome');
        /*
        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
        $response = $this->broker()->sendResetLink(
            $request->only('email')
        );

        return $response == Password::RESET_LINK_SENT
            ? $this->sendResetLinkResponse($response)
            : $this->sendResetLinkFailedResponse($request, $response);
        */
    }

    public function ResetToken(Request $r, $token = null)
    {

        $token = PasswordReset::where('token', $token)->first();
        if (!empty($token)) {
            $token = $token->getToken();
            return view('auth.passwords.reset', compact('token'));
        }
        return redirect()->route('portal');
    }

    public function RestaurarContrasena(Request $r)
    {
        $token = $r->token;
        $email = Functions::LimpiarCorreo($r->email);
        $emailc = Functions::ComprobarCorreo($email);
        $min = 5;
        $password = $r->password;
        $rpassword = $r->password_confirmation;
        $pswlen = strlen($password);
        $d = PasswordReset::where(['token' => $token, 'email' => $email])->first();
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
        $u = User::where(['email' => $email])->first();

        if (empty($u)) {
            $sms = trans('users.usernotfund');
            return redirect()->back()->withInput()->withErrors([
                'email' => $sms
            ]);
        }
        $u->setPassword($password)->push();

        $this->guard()->login($u);
        $d->delete();
        return redirect()->route('user.profile');
    }

    protected function guard()
    {
        return Auth::guard();
    }
}

