<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\PublicController;
use Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Lang;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        //$this->redirectTo  = route('landinghome');
        $this->redirectTo = 'app.' . config('session.domain');
        //dd($this->redirectTo);
        $this->middleware('guest', ['except' => 'logout']);
    }

    public function showLoginForm()
    {
        $txt = view('backend.auth.login')->render();
        return (new PublicController())->RetronoCompreso('text/html; charset=UTF-8', $txt);
//text/html; charset=UTF-8
        return view('backend.auth.login');
    }

    public function logout(Request $request)
    {
        //dd($request);
        $this->guard()->logout();
        $request->session()->flush();
        $request->session()->regenerate();
        return redirect()->route('landinghome');
    }

    public function validate(Request $request, array $rules, array $messages = [], array $customAttributes = [])
    {
        $validator = $this->getValidationFactory()->make($request->all(), $rules, $messages, $customAttributes);

        $remember = (Input::has('remember')) ? true : false;
        if ($remember == true) {
            $auth = Auth::attempt(
                [
                    'email' => strtolower(Input::get('email')),
                    'password' => Input::get('password')
                ], $remember
            );
        }
        if ($validator->fails()) {
            $this->throwValidationException($request, $validator);
        }
    }

    public function login(Request $request)
    {
        $this->validateLogin($request);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {
            $this->redirectTo = 'app.' . config('session.domain');
            return $this->sendLoginResponse($request);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }

    protected function sendFailedLoginResponse(Request $request)
    {
        flash(Lang::get('auth.failed'))->error();
        return redirect()->back()
            ->withInput($request->only($this->username(), 'remember'))
            ->withErrors([
                $this->username() => Lang::get('auth.failed'),
            ]);
    }

    public function redirectPath()
    {

        if (\Auth::check()) {
            //$this->redirectTo = redirect()->intended(static::getAppUrl())->getTargetUrl();

            $this->redirectTo = 'app.' . config('session.domain');
            //Session::put('session_id',Session::getId());
            return redirect()->intended(static::getAppUrl())->getTargetUrl();
        } else {

            return $this->redirectTo;
        }
    }

}
