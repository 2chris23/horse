<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\Functions;
use Carbon\Carbon;

class Aplicante extends Model
{
    protected $table = 'aplicante';
    protected $perPage = 25;

    protected $fillable = [
        'email',
        'name',
        'bday',
        'country_id',
        'state_id',
        'city',
        'address',
        'phone',
        'skills',
        'skillapply',
        'present',
        'sms',
        'note',
        'foto',
        'foto_name',
        'docs',
        'docs_name',
        'stud_id',
    ];

    protected $casts = [
        'country_id' => 'int',
        'state_id' => 'int',
        'skillapply' => 'int',
        'studid' => 'int',
        'bday' => 'date',
    ];

    public function getEmail()
    {
        return $this->email;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getBday()
    {
        return $this->bday;
    }

    public function getBdaySlash()
    {
        return Functions::AjustarFechaDmySlash($this->bday);
    }

    public function getCountryId()
    {
        return $this->country_id;
    }

    public function getStateId()
    {
        return $this->state_id;
    }

    public function getCity()
    {
        return $this->city;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function getSkills()
    {
        return json_decode($this->skills);
    }

    public function getSkillapply()
    {
        return $this->skillapply;
    }

    public function getPresent()
    {
        return $this->present;
    }

    public function getSms()
    {
        return $this->sms;
    }

    public function getNote()
    {
        return $this->note;
    }

    public function getFoto()
    {
        return $this->foto;
    }

    public function getFotoName()
    {
        return $this->foto_name;
    }

    public function getDocs()
    {
        return $this->docs;
    }

    public function getDocsName()
    {
        return $this->docs_name;
    }

    public function getStudId()
    {
        return $this->stud_id;
    }

    public function setEmail($val = null)
    {
        $this->email = Functions::LimpiarCorreo($val);
        return $this;
    }

    public function setName($val = null)
    {
        $this->name = Functions::LimpiarTexto($val);
        return $this;
    }

    public function setBday($val = null)
    {
        $this->bday = Functions::AjustarFechaYmd($val);
        return $this;
    }

    public function setCountryId($val = null)
    {
        $val = empty($val) ? 0 : $val;
        $this->country_id = $val;
        return $this;
    }

    public function setStateId($val = null)
    {
        $val = empty($val) ? 0 : $val;
        $this->state_id = $val;
        return $this;
    }

    public function setCity($val = null)
    {
        $this->city = $val;
        return $this;
    }

    public function setAddress($val = null)
    {
        $this->address = $val;
        return $this;
    }

    public function setPhone($val = null)
    {
        $this->phone = $val;
        return $this;
    }

    public function setSkills($val = null)
    {
        $this->skills = json_encode($val);
        return $this;
    }

    public function setSkillapply($val = null)
    {
        $val = empty($val) ? 0 : $val;
        $this->skillapply = $val;
        return $this;
    }

    public function setPresent($val = null)
    {
        $this->present = Functions::LimpiarTexto($val);
        return $this;
    }

    public function setSms($val = null)
    {
        $this->sms = Functions::LimpiarTexto($val);
        return $this;
    }

    public function setNote($val = null)
    {
        $this->note = Functions::LimpiarTexto($val);
        return $this;
    }

    public function setFoto($val = null)
    {
        $this->foto = $val;
        return $this;
    }

    public function setFotoName($val = null)
    {
        $this->foto_name = $val;
        return $this;
    }

    public function setDocs($val = null)
    {
        $this->docs = $val;
        return $this;
    }

    public function setDocsName($val = null)
    {
        $this->docs_name = $val;
        return $this;
    }

    public function setStudId($val = null)
    {
        $this->stud_id = $val;
        return $this;
    }

    public function Stud()
    {
        return $this->belongsTo(Stud::class, 'stud_id', 'id');
    }

    public function Country()
    {
        return $this->belongsTo(Country::class, 'country_id', 'id');
    }

    public function State()
    {
        return $this->belongsTo(State::class, 'state_id', 'id');
    }

    public function CarpetaTrabajoFoto()
    {
        return 'uploads/' . \Config::get('aplication.trabajofoto');
    }

    public function CarpetaTrabajoDoc()
    {
        return 'uploads/' . \Config::get('aplication.trabajodoc');
    }

    public function Anio()
    {
        $fecha = $this->getBday();
        $hoy = Carbon::now();
        if ($fecha == '') return null;
        if ($fecha == null) return null;
        if ($fecha == null) $fecha = Carbon::now();
        if ($fecha == '') $fecha = Carbon::now();
        return $fecha->diffInYears($hoy);
    }
}