<?php

namespace App\Models;

use App\Http\Controllers\Functions;
use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    protected $table = 'servicios';
    protected $guarded = [];

    protected $casts = [
        'price' => 'float',
        'type' => 'int',
        'discount' => 'float',
        'ds3' => 'float',
        'dst6' => 'float',
        'dst12' => 'float',
        'moneda' => 'int',
        'status' => 'bool',
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

    public function getDiscount()
    {
        $d = $this->discount;
        if (empty($d)) {
            return 0;
        }
        return $d;
    }

    public function setDiscount($discount)
    {
        $this->discount = $discount;
        return $this;
    }

    public function getEN()
    {
        return $this->EN;
    }

    public function setEN($EN)
    {
        $this->EN = $EN;
        return $this;
    }

    public function getES()
    {
        return $this->ES;
    }

    public function setES($ES)
    {
        $this->ES = $ES;
        return $this;
    }

    public function getNL()
    {
        return $this->NL;
    }

    public function setNL($NL)
    {
        $this->NL = $NL;
        return $this;
    }

    public function getDE()
    {
        return $this->DE;
    }

    public function setDE($DE)
    {
        $this->DE = $DE;
        return $this;
    }

    public function getFR()
    {
        return $this->FR;
    }

    public function setFR($FR)
    {
        $this->FR = $FR;
        return $this;
    }

    public function getIT()
    {
        return $this->IT;
    }

    public function setIT($IT)
    {
        $this->IT = $IT;
        return $this;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;
        return $this;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    public function setDs3($ds3)
    {
        $this->ds3 = $ds3;
        return $this;
    }

    public function getDst6()
    {
        $d = $this->dst6;
        if (empty($d)) {
            return 0;
        }
        return $d;
    }

    public function setDst6($ds6)
    {
        $this->dst6 = $ds6;
        return $this;
    }

    public function getDst12()
    {
        $d = $this->dst12;
        if (empty($d)) {
            return 0;
        }
        return $d;
    }

    public function setDst12($ds12)
    {
        $this->dst12 = $ds12;
        return $this;
    }

    public function getMoneda()
    {
        return $this->moneda;
    }

    public function setMoneda($moneda)
    {
        $this->moneda = $moneda;
        return $this;
    }

    public function getNameEn()
    {
        return $this->name_en;
    }

    public function setNameEn($name_en)
    {
        $this->name_en = $name_en;
        return $this;
    }

    public function getNameNl()
    {
        return $this->name_nl;
    }

    public function setNameNl($name_nl)
    {
        $this->name_nl = $name_nl;
        return $this;
    }

    public function getNameDe()
    {
        return $this->name_de;
    }

    public function setNameDe($name_de)
    {
        $this->name_de = $name_de;
        return $this;
    }

    public function getNameFr()
    {
        return $this->name_fr;
    }

    public function setNameFr($name_fr)
    {
        $this->name_fr = $name_fr;
        return $this;
    }

    public function getNameIt()
    {
        return $this->name_it;
    }

    public function setNameIt($name_it)
    {
        $this->name_it = $name_it;
        return $this;
    }

    public function getNamePr()
    {
        return $this->name_pr;
    }

    public function setNamePr($name_Pr)
    {
        $this->name_pr = $name_Pr;
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

    public function getBase()
    {
        return $this->AjusteNumero($this->price);
    }

    public function AjusteNumero($n = 0)
    {
        return $n * 1;
        return Functions::ConvertirNumeroAFloat($n, 2) * 1;
    }

    public function get3Meces()
    {
        $dst = $this->getDs3();
        if (($dst) != 0) {
            $t = 3 * $this->getDescuentoBase();
            $d = $this->AjusteNumero($t - ($t * ($dst / 100)));
            return $d;
        }
        return $this->AjusteNumero($this->getNMeces());
    }

    public function getDs3()
    {
        $d = $this->ds3;
        if (empty($d)) {
            return 0;
        }
        return $d;
    }

    public function getDescuentoBase()
    {
        $p = $this->price;
        $d = $this->getDiscount();
        $sal = 0;
        if ($d == 0) {
            $sal = $p;
        } else {
            $sal = ($p - ($p * ($d / 100)));
        }
        $sal = $this->AjusteNumero($sal);
        return $sal;
    }

    public function getNMeces($mes = 3)
    {
        $t = $mes * $this->getDescuentoBase();
        return $this->AjusteNumero($t);
    }

    public function get6Meces()
    {
        if (!empty($this->dst6)) {
            $t = 6 * $this->getDescuentoBase();
            return $this->AjusteNumero($t - ($t * ($this->dst6 / 100)));
        }
        return $this->AjusteNumero($this->getNMeces(6));
    }

    public function get12Meces()
    {
        if (!empty($this->dst12)) {
            $t = 12 * $this->getDescuentoBase();
            return $this->AjusteNumero($t - ($t * ($this->dst12 / 100)));
        }
        return $this->AjusteNumero($this->getNMeces(12));
    }

    public function scopePlan($query)
    {
        return $query->where('type', 1);
    }

    public function getMonedaString()
    {
        $s = $this->moneda;
        if ($s == 0) {
            return "<i class='fa fa-eur'></i>";
        }
    }
}
