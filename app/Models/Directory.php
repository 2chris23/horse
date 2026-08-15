<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\Functions;

class Directory extends Model
{
    protected $table = 'directory';

    protected $fillable = [
        'phone',
        'type',
        'tableid',
        'ext',
        'country_code',
    ];

    public function getPhone()
    {
        if ($this->phone == 0 || $this->phone == '') {
            return '';
        }
        return (string)$this->phone;
    }

    public function setPhone($phone)
    {
        $phone = str_replace(' ', '', (string)$phone);
        $this->phone = Functions::RetornaNumero($phone);
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

    public function getTableid()
    {
        return $this->tableid;
    }

    public function setTableid($tableid)
    {
        $this->tableid = $tableid;
        return $this;
    }

    public function getCountryCode()
    {
        return $this->country_code;
    }

    public function setCountryCode($country_code)
    {
        $this->country_code = $country_code;
        return $this;
    }

    public function getExt()
    {
        return $this->ext;
    }

    public function setExt($ext)
    {
        $this->ext = $ext;
        return $this;
    }

    public function FormatNumber()
    {
        $s = Functions::RetornaNumero($this->phone);
        $ext = $this->ext;

        $t = sprintf(
            "%s %s %s %s %s",
            substr($s, 0, 3),
            substr($s, 3, 3),
            substr($s, 6, 3),
            substr($s, 9, 3),
            substr($s, 12)
        );

        return "+($ext) " . trim($t);
    }

    public function getFormatNumberOnly()
    {
        $str = str_replace([' ', '(', ')'], '', $this->FormatNumber());
        return $str;
    }

    public function isNull()
    {
        return (Functions::RetornaNumero($this->phone) == 0);
    }

    public function scopeQuitarBug($query)
    {
        return $query->where('phone', "!=", '2147483647');
    }
}
