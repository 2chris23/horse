<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class DummyController extends Controller
{
    //
    use SendsPasswordResetEmails;

    public function showLinkRequestForm()
    {
        return view('auth.passwords.email');
    }

    public function sendResetLinkEmail(Request $request)
    {

        $this->validate($request, ['email' => 'required|email']);

        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
        $response = $this->broker()->sendResetLink(
            $request->only('email')
        );
        dd($response->all());

        return $response == Password::RESET_LINK_SENT
            ? $this->sendResetLinkResponse($response)
            : $this->sendResetLinkFailedResponse($request, $response);
    }

    public function broker()
    {
        return Password::broker();
    }

    public function SendMailToken(Request $r)
    {
        $r = $this->r;
        $email = $r->email;
        $usuario = Usuario::Correo($email)->first();
        if (!empty($usuario)) {

            echo '<div class="alert alert-success" role="alert">¡Exelente! Ya hemos enviado a tu correo los pasos a seguir para que recuperes tu contraseña.</div>';
        } else {
            echo '<div class="alert alert-danger" role="alert">Error este correo no se encuentra registrado</div>';

        }

    }

}
