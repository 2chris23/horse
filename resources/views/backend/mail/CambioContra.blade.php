@php

        @endphp
        <!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="UTF-8">
    <title>Restaurar contraseña</title>
</head>
<body>
<p>Hola, <strong>{{ $nombre }}</strong>

</p>
<p>Usted ha solicitado un cambio de contraseña</p>
<p>Hemos recibido una notificación solicitando un cambio de contraseña, utiliza estas nuevas credenciales para
    acceder:</p>
<h2>{!!route('olvidotoken',$token)!!}</h2>
</body>
</html>
