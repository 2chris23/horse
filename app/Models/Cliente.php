<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes';
    protected $perPage = 25;
    protected $guarded = [];

    protected $casts = [
        'url' => 'bool',
    ];

    protected $fillable = [
        'name',
        'url',
        'site',
        'type',
        'email',
        'studs_id',
        'country_id',
        'stud',
        'state_id',
        'city',
        'address',
    ];

    public $incrementing = true;

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->id)) {
                $model->{$model->getKeyName()} = static::max('id') + 1;
            }
            return true;
        });
    }

    public function getStudsId()
    {
        return $this->studs_id;
    }

    public function setStudsId($studs_id)
    {
        $this->studs_id = $studs_id;
        return $this;
    }

    public function setId()
    {
        if (empty($this->id)) {
            $this->id = (static::max('id') ?? 0) + 1;
        }
        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function setAddress($address)
    {
        $this->address = $address;
        return $this;
    }

    public function getCountryId()
    {
        return empty($this->country_id) ? 0 : $this->country_id;
    }

    public function setCountryId($country_id)
    {
        $this->country_id = $country_id;
        return $this;
    }

    public function getCity()
    {
        return $this->city;
    }

    public function setCity($city)
    {
        $this->city = $city;
        return $this;
    }

    public function getStateId()
    {
        return empty($this->state_id) ? 0 : $this->state_id;
    }

    public function setStateId($state_id)
    {
        $this->state_id = $state_id;
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

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function getSite()
    {
        return $this->site;
    }

    public function setSite($site)
    {
        $this->site = $site;
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

    public function getStud()
    {
        return $this->stud;
    }

    public function setStud($stud)
    {
        $this->stud = $stud;
        return $this;
    }

    public function getPhone()
    {
        $p = Directory::where(['type' => 4, 'tableid' => $this->id])->get()->toArray();
        return $p;
    }

    public function getPhoneModel()
    {
        $p = Directory::where(['type' => 4, 'tableid' => $this->id])->get();

        $temp = null;
        foreach ($p as $k => $v) {
            if (!empty($temp)) {
                $ext_t = $temp->ext;
                $ext_c = $temp->country_code;
                $p_t = $v->ext;
                $p_c = $v->country_code;

                if ($v->phone == $temp->phone) {
                    if (!empty($ext_t) and empty($p_t)) {
                        $v->setExt($ext_t)->push();
                    }
                    if (empty($ext_t) and !empty($p_t)) {
                        $temp->setExt($p_t)->push();
                    }
                    if (!empty($ext_c) and empty($p_t)) {
                        $v->setCountryCode($ext_c)->push();
                    }
                    if (empty($ext_c) and !empty($p_t)) {
                        $temp->setCountryCode($p_c)->push();
                    }
                }
            }
            $temp = $v;
        }

        // MySQL con ONLY_FULL_GROUP_BY rechaza SELECT * + GROUP BY phone.
        // Se desactiva strict mode solo para esta query (la intencion es
        // obtener un registro unico por telefono).
        $connection = \DB::connection();
        $previousStrict = true;
        try {
            $connection->setStrictMode(false);
            $p = Directory::where(['type' => 4, 'tableid' => $this->id])->groupBy('phone')->get();
        } finally {
            $connection->setStrictMode($previousStrict);
        }

        return $p;
    }

    public function getNewPhone()
    {
        return new Directory(['type' => 4, 'tableid' => $this->id]);
    }

    public function setPhone($number, $id = null)
    {
        if (empty($id)) {
            $te = Directory::where(['phone' => $number, 'type' => 4, 'tableid' => $this->id])->first();
            if (empty($te)) {
                $phone = new Directory(['tableid' => $this->id, 'type' => 4]);
            } else {
                $phone = $te;
            }
        } else {
            $phone = Directory::find($id);
        }
        $phone->setPhone($number)->push();
        return $this;
    }

    public function redes()
    {
        $d = [];
        if ($this->url == 1) {
            $d['url'] = $this->site;
        }
        $s = ClientesSocial::where('cliente_id', $this->id)->whereNotNull('url')->groupBy('url')->get();
        foreach ($s as $k => $v) {
            $type = $v->getType();
            if ($type == 1) {
                $d['tw'] = $v->url;
            } elseif ($type == 2) {
                $d['fb'] = $v->url;
            } elseif ($type == 3) {
                $d['pn'] = $v->url;
            } elseif ($type == 4) {
                $d['gl'] = $v->url;
            } elseif ($type == 5) {
                $d['in'] = $v->url;
            } elseif ($type == 6) {
                $d['yt'] = $v->url;
            }
        }
        return $d;
    }
}
