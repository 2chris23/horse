@php
    $user = (isset($data['user'])?$data['user']:null);
    $persona = (isset($data['personal'])?$data['user']:null);
    $psw = (isset($data['password'])?$data['password']:null);
    $token = (isset($data['token'])?$data['token']:null);
    $nombre = (!empty($user))?$user->getAllName():"Prueba";
    $correo = (!empty($user))?$user->getEmail():"Prueba";
@endphp

Hola {!! $nombre !!},
<br>
Te enviamos los datos de inicio de sesion y el link de activacion del usuario:
<br>
Usuario: {!! $correo !!}<br>
{{--Clave:  {!! $psw !!}<br>--}}
<br>
Link para activar el usuario
<a href="{!! route('activacion.confirmar',['token'=>$token]) !!}">{!! route('activacion.confirmar',['token'=>$token]) !!}</a>
<br>
<br>
url si no funciona el link
{!! route('activacion.confirmar',['token'=>$token]) !!}



