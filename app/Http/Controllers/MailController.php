<?php

namespace App\Http\Controllers;

use App\Models\Horse;
use App\Models\Notification;
use App\Models\PasswordReset;
use App\Models\Photo;
use App\Models\Stud;
use App\Models\User;
use Config;
use DB;
use Illuminate\Http\Request;
use Mail;
use TijsVerkoyen\CssToInlineStyles\CssToInlineStyles;
use function array_push;
use function flash;
use function redirect;
use function str_random;

class MailController extends Controller
{

    protected $direccionenvio;

    public function PruebaEmail()
    {
        /*PRUEBA DE CORREO*/
        $host = Config::get('aplication.host');
        $direccionenvio = "admin@" . Config::get('aplication.host');
        Mail::alwaysFrom($direccionenvio, $host);
        $data = [];

        $mail = 'alvaradocarlo@gmail.com';
        echo "antes de enviar<br>";
        Mail::send('backend.mail.datosinicio', ['data' => $data], function ($m) use ($mail) {
            $m->to($mail)->subject("Validacion");
        });
        echo "se ha enviado 1<br>";
        \Log::critical('Correo enviado a ' . $mail);
        try {

            Mail::send('backend.mail.datosinicio', ['data' => $data], function ($m) use ($mail) {
                $m->to($mail)->subject("Validacion");
            });
            echo "se ha enviado 2<br>";
            \Log::critical('Correo enviado a ' . $mail);
        } catch (\Swift_TransportException $e) {
            \Log::critical("CORREO DE PRUEBA");
            \Log::critical($e);
            \Session::put('error_correo', "Ocurrio un error intentando enviar el correo de activacion, debes cambiar tu clave<br>tu clave actual es none");
            //echo"probleas<br>";
            //dd($e);
            //$this->guard()->login($u);/*Proceso completado, se loguea como ese usuario*/
        }
        echo "fin";
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

    public function Welcome($user_id)
    {


        if ($user_id != null) {

            $u = User::find($user_id);
            $data = [
                'usuario' => $u,
            ];

            //Ajustar el link de verificacion
            Mail::alwaysFrom('no-responder@naxcan.com', "Naxcan.com");
            $mail = $u->getEmail();
            /*
            Mail::send('Emilio.NuevoCliente', ['data' => $data], function ($m) use ($mail) {
                $m->to($mail)->subject("Nuevo usuario");
            });
            */

        }
    }

    /*
        public function EnviarDatosInicio($user_id)
        {
            /*Se envia los datos de envio y luego, la contrasñe debe borrarse -SOLO ES AL CREAR UN USUARIO ---/


            $direccionenvio = "admin@" . Config::get('aplication.host');
            $host = Config::get('aplication.host');
            $u = User::find($user_id);
            $p = $u->getPersona();
            $mail = $u->getEmail();
            $psw = $u->getPwdTmp();

            $token = \App\Models\TokenActivacion::where(['users_id' => $u->id])->first();
            if (empty($token)) {
                $token = new \App\Models\TokenActivacion(['users_id' => $u->id]);
            }
            $token->setToken()->push();


            $data['user'] = $u;
            $data['personal'] = $p;
            $data['password'] = $psw->getPwd();
            $data['token'] = $token->getToken();

            Mail::alwaysFrom($direccionenvio, $host);
            try {
                Mail::send('backend.mail.datosinicio', ['data' => $data], function ($m) use ($mail) {
                    $m->to($mail)->subject("Validacion");
                });
                \Log::critical('Correo enviado a ' . $mail);
            } catch (\Swift_TransportException $e) {
                \Log::critical("Error con el servidor de correo para el usuario " . $u->toJson());
                \Log::critical($e);
                \Session::put('error_correo', "Ocurrio un error intentando enviar el correo de activacion, debes cambiar tu clave<br>tu clave actual es " . $data['password']);
                $this->guard()->login($u);/*Proceso completado, se loguea como ese usuario--/
            }
        }
            */


    public function CambioDeCorreo($user_id)
    {
        /*Se envia los datos de envio y luego, la contrasñe debe borrarse -SOLO ES AL CREAR UN USUARIO -*/
        $direccionenvio = "admin@horse.com";
        $host = Config::get('aplication.host');
        $u = User::find($user_id);
        $p = $u->getPersona();
        $mail = $u->getEmail();
        $psw = $u->getPwdTmp();

        $data['user'] = $u;
        $data['personal'] = $p;
        $data['password'] = $psw;

        Mail::alwaysFrom($direccionenvio, $host);
        try {
            Mail::send('backend.mail.datosinicio', ['data' => $data], function ($m) use ($mail) {
                $m->to($mail)->subject("Validacion");
            });
        } catch (\Swift_TransportException $e) {
            \Log::critical("Error con el servidor de correo para el usuario " . $u->toJson());
        }


    }

    public function RestaurarContrasena(User $u)
    {

        $direccionenvio = "admin@horse.com";
        $host = Config::get('aplication.host');
        $p = $u->getPersona();
        $mail = $u->getEmail();
        $b = PasswordReset::where('email', $u->getEmail())->get();
        foreach ($b as $k => $v) {
            $v->delete();
        }
        $t = new PasswordReset();
        $t->setToken()->setEmail($u->getEmail())->push();
        $token = $t->getToken();
        $nombre = $u->getName();
        Mail::alwaysFrom($direccionenvio, $host);
        $sal = false;
        try {
            Mail::send('backend.mail.CambioContra', ['nombre' => $nombre, 'token' => $token], function ($m) use ($mail) {
                $m->to($mail)->subject("Reestablecimiento de contraseña");
            });
            $sal = true;
        } catch (\Swift_TransportException $e) {
            \Log::critical("Error con el servidor de correo para el usuario " . $u->toJson());
        }
        return $sal;


    }

    public function FakeMail()
    {

        $data['logo'] = url('assets/img/logo2.png');
        $data['urlapp'] = route('portal');
        $data['titulo'] = 'Horses <span style="color: #fa6900;">World </span> Sale';
        $data['derechos'] = 'Horses <span style="color: #000;">World </span> Sale. © 2017 ';

        $data['titulof1'] = 'Bienvenido, te has registrado exitosamente';
        $contenido = 'Te has registrado en Horses<span style="color: #fa6900;">World</span>Sale.com, necesitamos que valides tu correo y configures tu contraseña mediante este link';
        $contenidof1 = 'Esta prueba es de envio de plantilla para mostrarle en el equipo, puede ser cualquier cosa, bla bla bla el lorem sigue:<br><br>';
        $contenidof1 .= $contenido;
        $data['contenidof1'] = $contenidof1;
        $data['contenido'] = "Aqui el texto en grande para cualquier cosa, no se si se ve bien o mal, horror ortografico de ber en ver bla bla <br><br>$contenido";
        $data['logo1'] = '';
        $data['logo2'] = '';
        $data['logo3'] = '';
        $data['logo4'] = '';
        $data['logo5'] = '';
        $data['logo6'] = '';
        $data['logo7'] = '';
        $data['logo8'] = '';
        $data['twlogo'] = '';
        $data['twlogo1'] = '';
        $nombre = "Francisco Fernandez";
        $direccionenvio = "contacto@horsesworldsale.com";
        $host = Config::get('aplication.host');
        $naranja = "#fa6900";
        $url = route('activacion.confirmar', ['token' => str_random(64)]);
        $data['logo'] = url('assets/img/logo2.png');
        $data['urlapp'] = route('portal');
        $data['titulo'] = "Te damos la bienvenida Carlos Alvarado";
        $data['contenido'] = 'Te has registrado en Horses<span style="color: #fa6900;">World</span>Sale.com, necesitamos que valides tu correo y configures tu contraseña mediante este <a href=\"$url\">link</a>';
        $data['titulof1'] = "Beneficios de nuestra aplicacion";
        $data['contenidof1'] = "Necesitamos que valides tu correo y cambies tu contraseña mediante el <a href=\"$url\">link</a>,<br> ";
        $data['contenidof1'] = "Caracterisiticas aqui";
        $data['link'] = $url;

        $data['logo'] = url('assets/img/logo2.png');
        $data['urlapp'] = route('portal');
        $data['titulo'] = "Te damos la bienvenida $nombre";

        //$data['contenido'] = "Te has registrado exitosamente en HorsesWorldSale.com";
        $data['contenido'] = "
Te has registrado en Horses<span style='color: #fa6900;'>World</span>Sale.com, necesitamos que valides tu correo y configures tu contraseña mediante este <a href='$url' target='_blank'>link</a>
";
        $ok = url('img/social/ok.jpg');

        $img = "<img editable='true' src='$ok' style='height: 25px;line-height:0; font-size:0; border:0; margin: 0 auto;'border='0' alt='image'>";
        $data['boton'] = "<a href=\"$url\"><img editable='true' src='" . url('img/social/botonempezar1.png') . "' style='height: 25px;line-height:0; font-size:0; border:0; margin: 0 auto;'border='0' alt='image'></a>";
        /*
         Multi idioma
        version movil
        gestion de tus caballos
        exportacion de anuncios
        historial de ventas
        oublicidad en varios portales

        */

        $data['titulof1'] = "";
        $caracteristicas = [];

        $c = "Caracterisitica ";
        $data['contenidof1'] = "";
        $con = [];
        $con[0] = 'Multi idioma';
        $con[1] = 'Version movil';
        $con[2] = 'Gestion de tus caballos';
        $con[3] = 'Historial de ventas';
        $con[4] = 'Exportacion de anuncios';

        //$con[5] = 'Publicidad en varios portales';

        foreach ($con as $k => $c) {
            $data['contenidof1'] = $data['contenidof1'] . " 
            <div class='editable-text'> $img  <span class='text_container'>
            $c 
            </span></div>";
        }


        //si no puedes acceder al hacer click, puedes copiar en tu navegador la siguiente direccion $url
        $data['derechos'] = 'Horses <span style="color: #000;">World </span> Sale. © 2017 ';

        Mail::alwaysFrom($direccionenvio, $host);
        $mail = 'alvaradocarlo@gmail.com';
        Mail::send('backend.mail.base', $data, function ($m) use ($mail) {
            $m->to($mail)->subject("Prueba falsa");
        });
        $t = Mail::failures();
        $fallo = count($t);
        if ($fallo != 0) {
            /*
            echo "Error de entrega<br>";
            foreach ($t as $k => $v) {

                echo "$v<br>";
            }
            */
            //flash('No se pudo enviar a todos los destinatarios');
        }
        /*
        $mail = 'adrisenci@gmail.com';
        //$mail = 'carloss_252@hotmail.com';
        Mail::send('backend.mail.base', $data, function ($m) use ($mail) {
            $m->to($mail)->subject("Prueba falsa");
        });
        */


        /*
                        $mail = 'adrisenci@gmail.com';
                        Mail::send('backend.mail.base', $data, function ($m) use ($mail) {
                            $m->to($mail)->subject("Prueba falsa");
                        });
          */
        return view('backend.mail.base')->with($data);
    }

    public function EnviarDatosInicio($user_id)
    {

        $u = User::find($user_id);
        $p = $u->getPersona();
        $mail = $u->getEmail();
        $psw = $u->getPwdTmp();
        $nombre = $u->getNombre();

        $token = \App\Models\TokenActivacion::where(['users_id' => $u->id])->first();

        if (empty($token)) {
            $token = new \App\Models\TokenActivacion(['users_id' => $u->id]);
        }
        $token->setToken()->push();
        $token_ = $token->getToken();

        $url = route('activacion.confirmar', ['token' => $token_]);


        $data['logo'] = url('assets/img/logo2.png');
        $data['urlapp'] = route('portal');
        $data['titulo'] = 'Horses <span style="color: #fa6900;">World </span> Sale';
        $data['derechos'] = 'Horses <span style="color: #000;">World </span> Sale. © 2017 ';

        $data['titulof1'] = 'Bienvenido, te has registrado exitosamente';
        $contenido = 'Te has registrado en Horses<span style="color: #fa6900;">World</span>Sale.com, necesitamos que valides tu correo y configures tu contraseña mediante este link';
        $contenidof1 = 'Esta prueba es de envio de plantilla para mostrarle en el equipo, puede ser cualquier cosa, bla bla bla el lorem sigue:<br><br>';
        $contenidof1 .= $contenido;
        $data['contenidof1'] = $contenidof1;
        $data['contenido'] = "Aqui el texto en grande para cualquier cosa, no se si se ve bien o mal, horror ortografico de ber en ver bla bla <br><br>$contenido";
        $data['logo1'] = '';
        $data['logo2'] = '';
        $data['logo3'] = '';
        $data['logo4'] = '';
        $data['logo5'] = '';
        $data['logo6'] = '';
        $data['logo7'] = '';
        $data['logo8'] = '';
        $data['twlogo'] = '';
        $data['twlogo1'] = '';
        $data['logo'] = url('assets/img/logo2.png');
        $data['urlapp'] = route('portal');
        $data['titulo'] = "Te damos la bienvenida Carlos Alvarado";
        $data['contenido'] = 'Te has registrado en Horses<span style="color: #fa6900;">World</span>Sale.com, necesitamos que valides tu correo y configures tu contraseña mediante este <a href=\"$url\">link</a>';
        $data['titulof1'] = "Beneficios de nuestra aplicacion";
        $data['contenidof1'] = "Necesitamos que valides tu correo y cambies tu contraseña mediante el <a href=\"$url\">link</a>,<br> ";
        $data['contenidof1'] = "Caracterisiticas aqui";
        $data['link'] = $url;
        $data['logo'] = url('assets/img/logo2.png');
        $data['urlapp'] = route('portal');
        $data['titulo'] = "Te damos la bienvenida $nombre";

        //$data['contenido'] = "Te has registrado exitosamente en HorsesWorldSale.com";
        $data['contenido'] = "
Te has registrado en Horses<span style='color: #fa6900;'>World</span>Sale.com, necesitamos que valides tu correo y configures tu contraseña mediante este <a href='$url' target='_blank'>link</a>
";
        $ok = url('img/social/ok.jpg');

        $img = "<img editable='true' src='$ok' style='height: 25px;line-height:0; font-size:0; border:0; margin: 0 auto;'border='0' alt='image'>";
        $data['boton'] = "<a href=\"$url\"><img editable='true' src='" . url('img/social/botonempezar1.png') . "' style='height: 25px;line-height:0; font-size:0; border:0; margin: 0 auto;'border='0' alt='image'></a>";
        /*
         Multi idioma
        version movil
        gestion de tus caballos
        exportacion de anuncios
        historial de ventas
        oublicidad en varios portales

        */

        $data['titulof1'] = "";
        $caracteristicas = [];

        $c = "Caracterisitica ";
        $data['contenidof1'] = "";
        $con = [];
        $con[0] = 'Multi idioma';
        $con[1] = 'Version movil';
        $con[2] = 'Gestion de tus caballos';
        $con[3] = 'Historial de ventas';
        $con[4] = 'Exportacion de anuncios';

        //$con[5] = 'Publicidad en varios portales';

        foreach ($con as $k => $c) {
            $data['contenidof1'] = $data['contenidof1'] . " 
            <div class='editable-text'> $img  <span class='text_container'>
            $c 
            </span></div>";
        }


        $data['derechos'] = 'Horses<span style="color: #000;">World</span>Sale.com © 2017 ';

        //si no puedes acceder al hacer click, puedes copiar en tu navegador la siguiente direccion $url
        $data['derechos'] = 'Horses <span style="color: #000;">World </span> Sale. © 2017 ';
        $direccionenvio = "contacto@horsesworldsale.com";
        $host = Config::get('aplication.host');

        Mail::alwaysFrom($direccionenvio, $host);

        //$mail = 'alvaradocarlo@gmail.com';

        Mail::send('backend.mail.base', $data, function ($m) use ($mail) {
            $m->to($mail)->subject("Bienvenido");
        });
        $t = "El registro fue exitoso, Se ha enviado un correo de verificacion.<br>Revisa la bandeja de entrada de tu correo para continuar con el proceso de registro";
        flash($t)->success();
        \Session::flash('exitoso', $t);
        return true;
        return redirect()->route('landinghome');
        return view('backend.mail.base')->with($data);

    }

    public function EnviarMail($template, $data, $mail_callback, $para, $propietario, $asunto)
    {

        $ticket = unserialize(($data['ticket']));

        $categoria = DB::table('ticketit_categories')->where('id', $ticket->category_id)->select('name')->first()->name;
        $prioridad = DB::table('ticketit_priorities')->where('id', $ticket->priority_id)->select('name')->first()->name;
        $status = DB::table('ticketit_statuses')->where('id', $ticket->status_id)->select('name')->first()->name;

        $contenido = null;
        $texto = null;
        $titulo = $ticket->subject;
        $paranombre = $para->name;
        $cat = false;
        $denombre = $propietario->name;
        //$para -> destinatario
        //$propietario -> quien lo envia
        //$asunto -> $asunto
        //dd($data);
        //dd($para);
        $busqueda = Functions::BuscarEnString($template, 'assigned');
        /*Buscamos Asignado*/
        if ($busqueda == true) {
            $datos = unserialize(($data['notification_owner']));
            $contenido = $ticket->html;
            $as = $datos->subject;
            $texto = "Se ha creado un nuevo ticket del usuario $denombre<br><br>\"$contenido\"<br><br>Categoria: $categoria<br>Prioridad: $prioridad<br>Estado: $status";
            $asunto = "Nuevo Ticket del usuario $denombre. \"$as\" Categoria $categoria";
            $cat = true;
            $texto = trans('soporte.asignado');
            $asunto = trans('soporte.tituloasignado');
        }

        $busqueda = Functions::BuscarEnString($template, 'comment');
        /*Buscamos Comentario*/
        if ($busqueda == true) {
            $datos = unserialize(($data['comment']));
            $contenido = $datos->html;
            $as = $ticket->subject;
            $texto = trans('soporte.comentario');
            $asunto = trans('soporte.titulocomentario');
            $cat = true;
        }
        $busqueda = Functions::BuscarEnString($template, 'status');
        /*Buscamos Status*/
        if ($busqueda == true) {
            $datos = unserialize(($data['notification_owner'])); //usuario
            $original = unserialize(($data['original_ticket']));
            $contenido = $datos->html;
            $as = $original->subject;
            $texto = trans('soporte.status');
            $asunto = trans('soporte.titulostatus');
            $cat = true;
        }
        $busqueda = Functions::BuscarEnString($template, 'tramsfer');
        /*Buscamos tramsfer*/
        if ($busqueda == true) {
            $datos = unserialize(($data['notification_owner'])); //usuario
            $original = unserialize(($data['original_ticket']));
            $contenido = $datos->html;
            $as = $original->subject;
            $texto = "Se ha trasferido el ticjet el ticket $as por el usuario $denombre<br>
            \"$contenido\"<br>
            Categoria: $categoria<br>
            Prioridad: $prioridad<br>
            Estado: $status";
            $asunto = "El ticket \"$as\" se ha transferido";

            $texto = trans('soporte.transferencia');
            $asunto = trans('soporte.titulotransferencia');
            $cat = true;
        }
        if ($cat == false) {
            $te = [];
            // dd($template);
            //Si no esta capturado
        }

        $emaildestino = $para->email;
        $emailorigen = $propietario->email;


        //dd($ticket);
        //dd($datos);

        $t = $data;
        $contenido = $texto;
        //$propietario->email = 'carloss_252@hotmail.com';
        //$para->email = 'carloss_252@hotmail.com';

        $direccionenvio = "contacto@horsesworldsale.com";
        $host = Config::get('aplication.host');

        $url = route('activacion.confirmar', ['token' => str_random(64)]);
        $url = null;
        $ok = url('img/social/ok.jpg');
        $img = "<img editable='true' src='$ok' style='height: 25px;line-height:0; font-size:0; border:0; margin: 0 auto;'border='0' alt='image'>";


        $con = [];
        $con[0] = 'Multi idioma';
        $con[1] = 'Version movil';
        $con[2] = 'Gestion de tus caballos';
        $con[3] = 'Historial de ventas';
        $con[4] = 'Exportacion de anuncios';
        //$con[5] = 'Publicidad en varios portales';
        $tr = '';
        foreach ($con as $k => $c) {
            $tr .= " <div class='editable-text'> $img  <span class='text_container'> $c </span></div>";
        }

        $dat = [
            "derechos" => 'Horses <span style="color: #000;">World </span> Sale. © 2017 ',
            "titulof1" => "Beneficios de nuestra aplicacion",
            "contenidof1" => $tr,
            "link" => $url,
            "logo" => url('assets/img/logo2.png'),
            "urlapp" => route('portal'),
            "titulo" => $asunto,
            "contenido" => $texto,
            //'boton' => "<a href=\"$url\"><img editable='true' src='" . url('img/social/botonempezar1.png') . "' style='height: 25px;line-height:0; font-size:0; border:0; margin: 0 auto;'border='0' alt='image'></a>",
        ];
        return view("backend.mail.soporte", compact('dat'));
        Mail::send('backend.mail.base', $dat, function ($m) use ($para, $propietario, $asunto) {
            $m->to($para->email, $para->name);
            $m->replyTo($propietario->email, $propietario->name);
            $m->subject($asunto);
        });
    }

    public function fakeNuevo($tipo = 1)
    {
        $u = User::find(3);
        $t = User::find(1);

        $ticket = DB::table('ticketit')->where('id', 2)->first();
        $comentario = DB::table('ticketit_comments')->where('ticket_id', 2)->first();
        $categoria = DB::table('ticketit_categories')->where('id', $ticket->category_id)->select('name')->first()->name;
        $prioridad = DB::table('ticketit_priorities')->where('id', $ticket->priority_id)->select('name')->first()->name;
        $status = DB::table('ticketit_statuses')->where('id', $ticket->status_id)->select('name')->first()->name;
        $asunto = $ticket->subject;
        $com = $comentario->content;
        $de = $u->name;
        $para = $t->name;
        $variables = [
            'titulo' => $asunto,
            'name' => $de,
            'categoria' => $categoria,
            'prioridad' => $prioridad,
            'status' => $status,
            'usuario' => $para,
            'contenido' => $com
        ];
        if ($tipo == 1) {
            /*asignado*/
            $titulo = trans('soporte.tituloasignado', $variables);
            $contenido = trans('soporte.asignado', $variables);
        } elseif ($tipo == 2) {
            /*status*/
            $titulo = trans('soporte.titulostatus', $variables);
            $contenido = trans('soporte.status', $variables);
        } elseif ($tipo == 3) {
            /*transferencia*/
            $titulo = trans('soporte.titulotransferencia', $variables);
            $contenido = trans('soporte.transferencia', $variables);
        } elseif ($tipo == 4) {
            /*comentario*/
            $titulo = trans('soporte.titulocomentario', $variables);
            $contenido = trans('soporte.comentario', $variables);
        } else {
            /*status*/
            $titulo = "Desconocido";
            $contenido = "Desconocido";
        }


        $dat = [
            "derechos" => 'Horses <span style="color: #000;">World </span> Sale. © 2017 ',
            "logo" => url('assets/img/logo2.png'),
            "urlapp" => route('portal'),
            "titulo" => $titulo,
            "contenido" => $contenido,
            //'boton' => "<a href=\"$url\"><img editable='true' src='" . url('img/social/botonempezar1.png') . "' style='height: 25px;line-height:0; font-size:0; border:0; margin: 0 auto;'border='0' alt='image'></a>",
        ];
        return view("backend.mail.soporte", compact('dat'));

    }


    public function ContactoMail(Notification $notification, $link = null)
    {
        /*
        if(empty($notification)){
            $notification = new Notification();
        }
        */
        $salida = null;

        if (empty($notification)) {
            flash(trans('error.NoFound'))->error();
            $salida = true;
            //\Log::debug('Norificacion no encontrada') ;
            //return $salida;
        }

        $tipo = $notification->tipo;
        $contacto = null;
        $horse = null;
        $usuario = $notification->users()->first();
        if (empty($usuario)) {
            flash(trans('error.NoFound'))->error();
            $salida = true;
            //\Log::debug('Usuario no encontrado') ;
            //return $salida;
        }
        $persona = $usuario->Person()->first();
        if (empty($persona)) {
            flash(trans('error.NoFound'))->error();
            $salida = true;
            //\Log::debug('Datos personales no encontrados') ;
            //return $salida;
        }
        $stud = $usuario->Stud()->first();
        if (empty($stud)) {
            flash(trans('error.NoFound'))->error();
            $salida = true;
            //\Log::debug('Ueguada no encontrada') ;
            //return $salida;
        }
        //1  contacto
        //2  caballo
        if ($tipo == 1) {
            $c = true;
            //\Log::debug('Notifiacion de contacto') ;
        } elseif ($tipo == 2) {
            $horse = $notification->horse()->first();
            $h = true;

        } else {
            flash(trans('error.NoFound'))->error();
            $salida = true;
            //\Log::debug('Notificacion indeterminada') ;
            //return $salida;
        }
        /*
            $notification;
            $usuario
            $persona
            $stud
            $horse;
        */
        $mensaje = $notification->getMensaje();
        $numero = $notification->getNumero();
        $emilio = $notification->getCorreo();
        $asunto = $notification->getAsunto();
        $nombre = $notification->getOther();
        $mensajeti = "";
        if (!empty($h)) {
            $mensajeti = trans('mail.caballo.asunto', ['name' => $horse->name]);
            $link = !empty($link) ? $link : route('MyHorseDetailed', ['stud' => $stud->slug, 'horse' => $horse->slug]);

            $contenido = trans('mail.caballo.arriba', ['nombre' => $nombre, 'name' => $asunto, 'mensaje' => $mensaje, 'email' => $emilio, 'numero' => $numero, 'link' => $link]);
            //$contenido = trans('mail.contacto.arriba', ['nombre' => $nombre, 'name' => $asunto, 'mensaje' => $mensaje,'email' => $emilio,'numero' => $numero]);
            if (!empty($numero) and empty($emilio)) {
                $contenido .= trans('mail.caballo.textosincorreo', ['numero' => $numero]);
            } elseif (empty($numero) and !empty($emilio)) {
                $contenido .= trans('mail.caballo.textosinnumero', ['email' => $emilio]);
            } elseif (!empty($numero) and !empty($emilio)) {
                $contenido .= trans('mail.caballo.texto', ['email' => $emilio, 'numero' => $numero]);
            }
            $titulo = trans('mail.caballo.titulo', ['name' => $asunto]);
        } elseif (!empty($c)) {
            $mensajeti = trans('mail.contacto.asunto');
            $contenido = trans('mail.contacto.arriba', ['nombre' => $nombre, 'name' => $asunto, 'mensaje' => $mensaje, 'email' => $emilio, 'numero' => $numero]);
            if (!empty($numero) and empty($emilio)) {
                $contenido .= trans('mail.contacto.textosincorreo', ['numero' => $numero]);
            } elseif (empty($numero) and !empty($emilio)) {
                $contenido .= trans('mail.contacto.textosinnumero', ['email' => $emilio]);
            } elseif (!empty($numero) and !empty($emilio)) {
                $contenido .= trans('mail.contacto.texto', ['email' => $emilio, 'numero' => $numero]);
            }
            $titulo = trans('mail.contacto.titulo', ['name' => $asunto]);
        }

        $mail = null;


        //$host = Config::get('aplication.host');
        //$direccionenvio = "admin@" . Config::get('aplication.host');
        //Mail::alwaysFrom('alvaradocarlo@gmail.com', 'serve.com');


        if (!empty($stud->email)) {
            $mail = $stud->email;
        } elseif (!empty($persona->getEmail())) {
            $mail = $persona->getEmail();

        } else {
            flash(trans('error.NoFound'))->error();
            $salida = true;
            //\Log::debug('No tenemos stud o persona') ;
            //return $salida;
        }

        $dat = [
            "contenido" => $contenido,
            "titulo" => $titulo,
            'name' => $nombre,
            'correo' => $emilio,
            'numero' => $numero,
            'mensaje' => $mensaje,
            'email' => $mail,
            'asun' => $mensajeti,
            //'boton' => "<a href=\"$url\"><img editable='true' src='" . url('img/social/botonempezar1.png') . "' style='height: 25px;line-height:0; font-size:0; border:0; margin: 0 auto;'border='0' alt='image'></a>",
        ];


        //$mail = 'carloss_252@hotmail.com';
        if (empty($salida)) {
            //\Log::debug('Enviadno correo a '.$mail) ;
            Mail::send('backend.mail.contactos', array('dat' => $dat), function ($m) use ($dat) {

                $m->to($dat['email']);
                $m->subject($dat['asun']);
            });
        }


        /*
                $mail = 'alvaradocarlo@gmail.com';
                $t = Mail::failures();
                $fallo = count($t);
                if ($fallo != 0) {
                    echo "Error de entrega<br>";


                    foreach ($t as $k => $v) {

                        echo "Error $v<br>";
                    }
                    //flash('No se pudo enviar a todos los destinatarios');
                }
                */
//dd($fallo);
        //return null;
        //return view("backend.mail.contactos", compact('dat'));

    }


    Public function FormatoMasivo(Request $r)
    {
        $paginacion = 10;
        $data = $r->all();


        $orden = isset($r->orden) ? $r->orden : null;
        $texto = isset($r->texto) ? $r->texto : null;
        $raza = isset($r->raza) ? $r->raza : null;

        if (empty($raza)) {
            $raza = isset($r->razas) ? $r->razas : null;
        }
        $raisedmin = isset($r->raisedmin) ? $r->raisedmin : 0; // min -
        $raisedmax = isset($r->raisedmax) ? $r->raisedmax : 0; // 0 - max
        $pricemin = isset($r->pricemin) ? $r->pricemin : 0;
        $pricemax = isset($r->pricemax) ? $r->pricemax : 0;
        $country = isset($r->country) ? $r->country : 0;
        $sex = isset($r->sex) ? $r->sex : null;
        $doma = isset($r->doma) ? $r->doma : null;
        $color = isset($r->color) ? $r->color : null;
        $state = isset($r->state) ? $r->state : null;

        //$sal['dds'] = $data;


        $horse_ = Horse::where(['tosold' => 1, 'publish' => 1, 'sold' => 0])->get()->pluck('id')->toArray();
        $f = Photo::where('type', 4)->wherein('tableid', $horse_)->get()->pluck('tableid')->toArray();//solo caballo con foto

        //dd($horse_);

        /*

        dd($horse_);
        */
        $horse = Horse::wherein('id', $f);

        //dd($horse->get());
        //$horse = Horse::where(['tosold_' => 1, 'publish' => 1]);
        $stud = Stud::query();

        $f[0] = url('landing/images/slider/1/2.jpg');
        $f[1] = url('landing/images/slider/1/6.jpg');
        $f[2] = url('landing/images/slider/1/9.jpg');
        $f[3] = url('landing/images/slider/1/8.jpg');
        $imagen = $f[rand(0, 2)];


        if (is_array($raza)) {
            $tt = [];
            $ck = false;
            foreach ($raza as $k => $v) {
                if (is_string($v)) {
                    array_push($tt, $k);
                } elseif (is_int($v)) {
                    $ck = true;
                    array_push($tt, $v);
                }

            }

            if ($ck == true) {
                foreach ($raza as $k => $v) {
                    $raza[$v] = 'on';
                }
            }
            $horse = $horse->wherein('raza', $tt);

        } elseif ($raza != 0) {

            $horse = $horse->where(['raza' => $raza]);
            $t = $raza;
            $raza = [];
            $raza[$t] = 'on';
            $t = null;

        }


        /*********************************************************************/
        /*********************************************************************/
        /*********************************************************************/
        /*********************************************************************/

        $raisedmin = $raisedmin * 1;
        $raisedmax = $raisedmax * 1;
        if ($raisedmin != 0 and $raisedmax == 0) {
            $raisedmax = 150;
        } elseif ($raisedmax != 0 and $raisedmin == 0) {
            $raisedmin = 50;
        }
        if ($raisedmin != 0 and $raisedmax != 0) {

            $horse = $horse->whereBetween('raised', [$raisedmin, $raisedmax]);

        }


        $pricemin = $pricemin * 1;
        $pricemax = $pricemax * 1;


        //return Functions::RetornaJson(['r'=>$pricemax,'rs'=>$pricemin]);
        /*
        if ($pricemin != 0 and $pricemax == 0) {
            $pricemax = 150;
        }elseif ($pricemax != 0 and $pricemin==0){
            $pricemin = 50;
        }
        */
        if ($pricemin != 0 and $pricemax != 0) {
            $horse = $horse->whereBetween('price', [$pricemin, $pricemax]);
        }


        /****************************************************************************************/
        /****************************************************************************************/
        /****************************************************************************************/

        $stud_id = null;
        if ($country != 0) {
            $stud_id = $stud->where('country', $country)->get()->pluck('id');
            $stud = $stud->where('country', $country);
            if (empty($state)) {
                $horse = $horse->wherein('studs_id', $stud_id);
            }

        }
        $st = 0;

        if (!empty($state)) {
            if (is_array($state)) {

                $tt = [];
                $ck = false;
                foreach ($state as $k => $v) {
                    if ($k != 0) {

                        if (is_int($v)) {
                            $ck = true;
                            array_push($tt, $v);
                        } elseif (is_string($v)) {
                            array_push($tt, $k);
                        }

                    }
                }
                if ($ck == true) {
                    foreach ($state as $k => $v) {
                        $state[$v] = 'on';
                    }
                }
                if (count($tt) != 0) {
                    $st = 1;
                    $stud_1 = $stud->wherein('state', $tt);

                    $sd = $stud_1->first();
                    if (empty($sd)) {
                        flash(trans('error.NoHorseProvincia'))->error();

                    } else {
                        $stud = $stud_1;
                    }
                } else {
                    $horse = $horse->wherein('studs_id', $stud_id);
                }
            } elseif
            ($state != 0) {
                $st = 1;
                $stud_1 = $stud->where('state', $state);
                $sd = $stud_1->first();
                if (empty($sd)) {
                    flash(trans('error.NoHorseProvincia'))->error();


                } else {
                    $stud = $stud_1;
                }
                $t = $state;
                $state = [];
                $state[$t] = 'on';
                $t = null;
            }
        }


        if ($country != 0 or ($st != 0)) {
            $stud = $stud->get()->pluck('id');

        } else {
            $stud = null;
        }

        if (!empty($stud)) {
            if (count($stud) != 0) {
                $horse = $horse->wherein('studs_id', $stud);
            }
        }


        /****************************************************************************************/
        /****************************************************************************************/
        /****************************************************************************************/


        if (!empty($sex)) {

            $tt = [];
            foreach ($sex as $k => $v) {
                array_push($tt, $k);
            }
            $horse = $horse->wherein('sex', $tt);
        }

        if (!empty($doma)) {
            $tt = [];
            foreach ($doma as $k => $v) {
                array_push($tt, $k);
            }
            $horse = $horse->wherein('doma', $tt);
        }


        /*"color" => array:1 [▼
            0 => "1"
          ]*/

        if (!empty($color)) {

            $tt = [];
            foreach ($color as $k => $v) {
                array_push($tt, $v);
            }
            $horse = $horse->wherein('color', $tt);

        }


        /*********************************************************************/
        /*********************************************************************/
        /*********************************************************************/
        /*********************************************************************/
        if (!empty($texto)) {
            //Bsuscamos string de nombre o lo que sea
            $std = Stud::search($texto)->get()->pluck('id');
            $hrs = Horse::search($texto)->get()->pluck('id');

            if (count($std) != 0) {
                $horse = $horse->wherein('studs_id', $std);
            }
            if (count($hrs) != 0) {
                $horse = $horse->wherein('id', $hrs);
            }
        }


        if (empty($orden)) {
            $horse = $horse->orderby('id', 'desc');
        } else {
            $orden = strtolower($orden);
            if ($orden == 'edad') {
                $horse = $horse->orderby('birthdate', 'desc');
            } elseif ($orden == 'precio') {
                $horse = $horse->orderby('price', 'desc');
            } elseif ($orden == 'capa') {
                $horse = $horse->orderby('color', 'desc');
            } elseif ($orden == 'alzada') {
                $horse = $horse->orderby('raised', 'desc');
            } else {
                $horse = $horse->orderby('id', 'desc');
            }

        }

        $ra ['texto'] = $texto;
        $ra ['sex'] = $sex;
        $ra ['doma'] = $doma;
        $ra ['color'] = $color;
        $ra ['country'] = $country;
        $ra ['state'] = $state;
        $ra ['pricemin'] = $pricemin;
        $ra ['pricemax'] = $pricemax;
        $ra ['raisedmax'] = $raisedmax;
        $ra ['raisedmin'] = $raisedmin;
        $ra ['raza'] = $raza;
        $ra ['texto'] = $texto;
        $ra ['orden'] = $orden;

        $sal['request'] = $ra;
        $sal['horses'] = $horse->get();
        $ts = $horse;
        $horse = $horse->paginate($paginacion);

        $sal['lastPage'] = $horse->lastPage();
        $paginator = $horse;
        $sal['pagination'] = $paginacion;
        $sal['currentPage'] = $horse->currentPage();


        //dd($horse->get());
        if ($r->ajax()) {
            //return $horses;
            $sal['pag'] = view('vendor.pagination.portalcaballo', compact('paginator'))->render();
            $sal['mostrando'] = trans('portal.showing', [
                'currentpage' => $horse->currentPage(),
                'lastpage' => $horse->lastPage(),
                'total' => $horse->total(),
            ]);
            $sal['status'] = 200;
            $sal['el'] = view('portal.listas.partials.horse', ['horses' => $horse])->render();
            return Functions::RetornaJson($sal);
        }
        $horse = $ts->get();
        $horses = $horse;

        return view('backend.Masivo.uno', compact(
            'horses',
            'imagen',
            'raisedmin',
            'raisedmax',
            'raza',
            'texto',
            'pricemin',
            'pricemax',
            'state',
            'country',
            'doma',
            'sex',
            'color',
            'orden'
        ));
    }

    public function CargarConfigFake()
    {
        $d = [
            'mail.driver' => 'smtp',
            'mail.host' => 'smtp.gmail.com',
            'mail.port' => 587,
            'mail.encryption' => 'tls',
            'mail.username' => 'democmar@gmail.com',
            'mail.password' => 'cV18966566',
        ];
        foreach ($d as $k => $v) {
            config([$k => $v]);
            (new \Illuminate\Mail\MailServiceProvider(app()))->register();
        }
        return 1;
    }

    Public FUnction CargarConfigN()
    {
        $d = [
            'mail.driver' => 'smtp',
            'mail.host' =>  'smtp.horsesworldsale.com',
            'mail.port' =>  587, //ssl
            'mail.encryption' => 'tls',
            'mail.username' => 'contacto@horsesworldsale.com',
            'mail.password' => 'HW5H0rses',

        ];
        foreach ($d as $k => $v) {
            config([$k => $v]);
            (new \Illuminate\Mail\MailServiceProvider(app()))->register();
        }
        return 1;

    }

    public function EnviarExportar($titulo, $mail, $tipo, $datos, $pdf = 1, $url = null, $stud = null)
    {

        $host = Config::get('aplication.host');
        $direccionenvio = "admin@" . Config::get('aplication.host');
        /*

        $host = $stud->getDomain();
        Mail::alwaysFrom($envio, $host);

        $host = Config::get('aplication.host');
        $direccionenvio = "admin@" . Config::get('aplication.host');
        */
        Mail::alwaysFrom($direccionenvio, $host);
        $stud = !empty($stud) ? $stud : \Auth::user()->Yeguada();
        $envio = $stud->getEmail();
        if ($tipo == 0) {
            /*solo un caballo*/
            $vista = 'backend.Masivo.saturno';

            $v = view('backend.Masivo.saturno', $datos)->render();
        } elseif ($tipo == 1) {
            /*Varios caballos*/
            $vista = 'backend.Masivo.saturno-v';
            $v = view('backend.Masivo.saturno', $datos)->render();
        }
        $dat['vista'] = $vista;
        $dat['tipo'] = $tipo;
        $dat['comp'] = $datos;

        //$dat['mail'] = $mail;
        $dat['titulo'] = $titulo;
        $dat['de'] = $v = str_replace(' ', '', $envio);
        $dat['host'] = $host;
        $s = new CssToInlineStyles();
        $dat['nuev'] = $s->convert($v);

        /*$s->setEncoding($message->getCharset());
        $s->setUseInlineStylesBlock();
        $s->setCleanup();*/


        $dat['host'] = $s;
        if (!empty($url)) {
            $datos['linkcaballo'] = $url;
        }
        $r = 1;
        if ($r == 1) {
            foreach ($mail as $k => $v) {

                $v = Functions::LimpiarCorreo(str_replace(' ', '', $v));
                $dat['mail'] = $v;
                Mail::to($v);
                /*\Log::critical('Enviado desde '.Config::get('mail.host'));*/
                Mail::send($vista, ['dato' => $datos], function ($m) use ($dat) {
                    $m->to($dat['mail'])->subject($dat['titulo']);/*->from($dat['de']);*/
                    /*
                                    \Log::critical(" en mail controler para " . \GuzzleHttp\json_encode($dat['mail']));

                                    $datos = isset($dat['comp']) ? $dat['comp'] : null;
                                    if (!empty($dat['nuev'])) {
                                        $datos['pdf'] = 1;
                                        $s = PDF::loadHTML($dat['nuev'])->output();

                                        //$pd = new PdfController();
                                        //$m->attachData($pd->SalidaMailPdf($dat['nuev'], $datos), 'lista.pdf');
                                        $m->attachData($s, 'lista.pdf');
                                    }*/


                });
            }
        } else {
            $ds = [];
            foreach ($mail as $k => $v) {
                $v = str_replace(' ', '', $v);
                $v = Functions::LimpiarCorreo(str_replace(' ', '', $v));
                //$dat['mail'] = $v;

                array_push($ds, $v);

            }
            $dat['mail'] = $ds;

            Mail::to($ds);
            /*self::CargarConfigFake();*/
            if ($tipo == 0) {
                /*solo un caballo*/
                Mail::send('backend.Masivo.saturno', ['dato' => $datos], function ($m) use ($dat) {
                    $m->to($dat['mail'])->subject($dat['titulo']);/*->from($dat['de']);*/

                });
            } elseif ($tipo == 1) {
                /*Varios caballos*/
                Mail::send('backend.Masivo.saturno-v', ['dato' => $datos], function ($m) use ($dat) {
                    $m->to($dat['mail'])->subject($dat['titulo']);/*->from($dat['de']);*/
                    /*
                                    \Log::critical(" en mail controler para " . \GuzzleHttp\json_encode($dat['mail']));

                                    $datos = isset($dat['comp']) ? $dat['comp'] : null;
                                    if (!empty($dat['nuev'])) {
                                        $datos['pdf'] = 1;
                                        $s = PDF::loadHTML($dat['nuev'])->output();

                                        //$pd = new PdfController();
                                        //$m->attachData($pd->SalidaMailPdf($dat['nuev'], $datos), 'lista.pdf');
                                        $m->attachData($s, 'lista.pdf');
                                    }*/


                });
            }
            /*self::CargarConfigN();*/


        }


        $s = Mail::failures();
        /*\Log::critical(json_encode($s));*/
        return $s;
        return 0;
    }
}

