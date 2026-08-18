<?php

namespace App\Models;

use App\Http\Controllers\Functions;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Codigopromo extends Model
{
    protected $table = 'codigopromo';
    protected $guarded = [];

    protected $casts = [
        'dst' => 'float',
        'status' => 'bool',
    ];

    protected $dates = [
        'inicio',
        'fin',
    ];

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function getCode()
    {
        return $this->code;
    }

    public function setCode($code)
    {
        if (empty($code)) {
            $code = Str::random(10);
        }
        $this->code = strtolower($code);
        return $this;
    }

    public function getFin()
    {
        return Functions::AjustarFechaYmd($this->fin);
    }

    public function setFin($fin)
    {
        $fin = Functions::AjustarFechaYmd($fin);
        $this->fin = $fin;
        return $this;
    }

    public function getDst()
    {
        return $this->dst;
    }

    public function setDst($dst)
    {
        $this->dst = $dst;
        return $this;
    }

    public function getInicio()
    {
        return Functions::AjustarFechaYmd($this->inicio);
    }

    public function setInicio($inicio)
    {
        $inicio = Functions::AjustarFechaYmd($inicio);
        $this->inicio = $inicio;
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

    public function getDescuentoPorcentaje($subtotal)
    {
        if (!empty($this->dst)) {
            return $this->AjusteNumero($subtotal - ($subtotal * ($this->dst / 100)));
        }
        return $this->AjusteNumero($subtotal);
    }

    public function AjusteNumero($n = 0)
    {
        return Functions::ConvertirNumeroAFloat($n, 2) * 1;
    }

    public function getStatusStr()
    {
        if ($this->isActivo() == false) {
            return "Inactivo";
        }
        return 'Activo';
    }

    public function isActivo()
    {
        if (empty($this->status)) {
            return false;
        }
        if ($this->status == 0) {
            return false;
        }
        if ($this->status == false) {
            return false;
        }
        return true;
    }

    public function scopeValido($query, $codigo)
    {
        $now = Functions::AjustarFechaYmd(Carbon::now());
        return $query->where([
            'code' => $codigo,
            'status' => 1,
        ])
            ->where('inicio', '<=', $now)
            ->where('fin', '>=', $now);
    }
}
