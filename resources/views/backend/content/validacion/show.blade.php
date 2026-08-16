@php
$nombre = "dumyy";
    if(isset($user)){
        $nombre = $user->getAllName();

    }
@endphp
hola {!! $nombre !!}, haz activado tu cuenta, por seguridad te recomendamos que cambies la contraseña

