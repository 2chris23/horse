<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ErrorControl extends Model
{
    protected $table = 'error_control';
    protected $perPage = 25;

    protected $fillable = [
        'Tipo',
        'metodo',
        'url',
        'referer',
        'header',
        'mensaje',
        'traza',
        'linea',
        'ip'
    ];

    public function getTipo()
    {
        return $this->Tipo;
    }

    public function setTipo($Tipo)
    {
        $this->Tipo = $Tipo;
        return $this;
    }

    public function getMetodo()
    {
        return $this->metodo;
    }

    public function setMetodo($metodo)
    {
        $this->metodo = $metodo;
        return $this;
    }

    public function getReferer()
    {
        return $this->referer;
    }

    public function setReferer($referer)
    {
        $this->referer = $referer;
        return $this;
    }

    public function getHeader()
    {
        return $this->header;
    }

    public function setHeader($header)
    {
        $this->header = $header;
        return $this;
    }

    public function getMensaje()
    {
        return $this->mensaje;
    }

    public function setMensaje($mensaje)
    {
        $this->mensaje = $mensaje;
        return $this;
    }

    public function getLinea()
    {
        return $this->linea;
    }

    public function setLinea($linea)
    {
        $this->linea = $linea;
        return $this;
    }

    public function getIp()
    {
        return $this->ip;
    }

    public function setIp($ip)
    {
        $this->ip = $ip;
        return $this;
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function setUrl($url)
    {
        $this->url = $url;
        return $this;
    }

    public function getTraza()
    {
        return $this->traza;
    }

    public function setTraza($traza)
    {
        $this->traza = $traza;
        return $this;
    }
}