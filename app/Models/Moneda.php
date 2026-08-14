<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Moneda extends Model
{
    protected $table = 'monedas';

    protected $fillable = [
        'nombre',
        'simbolo',
        'small',
        'valor',
        'base',
        'status',
    ];

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
        return $this;
    }

    public function getBase()
    {
        return $this->base;
    }

    public function setBase($base)
    {
        $this->base = $base;
        return $this;
    }

    public function getSimbolo()
    {
        return $this->simbolo;
    }

    public function setSimbolo($simbolo)
    {
        $this->simbolo = $simbolo;
        return $this;
    }

    public function getSmall()
    {
        return $this->small;
    }

    public function setSmall($small)
    {
        $this->small = $small;
        return $this;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    public function getValor()
    {
        return $this->valor;
    }

    public function setValor($valor = 0)
    {
        if (!empty($valor)) {
            $this->valor = $valor;
        }
        return $this;
    }

    public function scopeCorto($query, $smal = "EUR")
    {
        return $query->where('small', $smal);
    }
}
