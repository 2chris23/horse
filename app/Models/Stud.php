<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;
use App\Http\Controllers\Functions;

class Stud extends Model
{
    use SoftDeletes;
    use Sluggable;

    protected $table = 'studs';
    public $incrementing = true;
    protected $primaryKey = 'id';

    protected $fillable = [
        'logo', 'fav', 'name', 'description', 'color', 'address', 'country', 'state',
        'titulo', 'seodescripcion', 'words', 'footer', 'header', 'desing',
        'city', 'lat', 'slug', 'lng', 'ga', 'email', 'paid', 'code', 'wscontact',
        'fbcontact', 'moneda', 'users_id', 'created_by', 'subcritiondate',
        'updated_by', 'deleted_by'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => ['source' => 'name']
        ];
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function horses()
    {
        return $this->hasMany(Horse::class, 'studs_id');
    }

    public function photos()
    {
        return $this->hasMany(Photo::class, 'tableid')->whereIn('type', [2, 3, 5, 7, 8]);
    }

    public function videos()
    {
        return $this->hasMany(Video::class, 'tableid')->where('type', 3);
    }

    // ── Getters and Setters ──────────────────────────────────────

    public function getName()
    {
        $d = explode("_", (string)$this->name);
        $s = "";
        foreach ($d as $v) {
            $s .= " " . $v;
        }
        $s = trim(preg_replace('/\s+/', ' ', $s));
        return empty($s) ? 'Yeguada' : $s;
    }

    public function setName($name)
    {
        $name = str_replace(["  ", "_"], ' ', (string)$name);
        $name = ucwords(trim($name));
        $this->name = $name;
        return $this;
    }

    public function getDescription()
    {
        return str_replace(["'", "\""], " ", (string)$this->description);
    }

    public function setDescription($description)
    {
        $this->description = Functions::LimpiarTexto($description);
        return $this;
    }

    public function getAddress()
    {
        $d = Functions::LimpiarTexto($this->address);
        return str_replace(['<p>', '</p>'], '', (string)$d);
    }

    public function setAddress($address)
    {
        $this->address = Functions::LimpiarTexto($address);
        return $this;
    }

    public function getCountry()
    {
        return empty($this->country) ? 0 : $this->country;
    }

    public function getCountryModel()
    {
        return Country::findOrNew($this->country);
    }

    public function setCountry($country)
    {
        $this->country = $country;
        return $this;
    }

    public function getState()
    {
        return empty($this->state) ? 0 : $this->state;
    }

    public function getStateModel()
    {
        return State::findOrNew($this->state);
    }

    public function setState($state)
    {
        $this->state = $state;
        return $this;
    }

    public function getCity()
    {
        return $this->city ?? '';
    }

    public function setCity($city)
    {
        $this->city = $city;
        return $this;
    }

    public function getPaid()
    {
        return $this->paid ?? 0;
    }

    public function setPaid($paid)
    {
        $this->paid = $paid;
        return $this;
    }

    public function getMoneda()
    {
        return $this->moneda ?? 'EUR';
    }

    public function setMoneda($moneda = 'EUR')
    {
        $this->moneda = $moneda;
        return $this;
    }

    public function getLogo()
    {
        if (!empty($this->logo)) {
            $f = \Config::get('aplication.fotologo', 'logo');
            return url("uploads/" . $f . "/" . $this->logo);
        }
        return url('img/admin.jpg');
    }

    public function getLogoClear()
    {
        return $this->logo;
    }

    public function setLogo($logo)
    {
        $this->logo = $logo;
        return $this;
    }

    public function getEmail()
    {
        return strtolower((string)$this->email);
    }

    public function setEmail($email)
    {
        $this->email = strtolower((string)$email);
        return $this;
    }

    public function getUsersId()
    {
        return $this->users_id;
    }

    public function setUsersId($users_id)
    {
        $this->users_id = $users_id;
        return $this;
    }

    public function getCreatedBy()
    {
        return $this->created_by;
    }

    public function setCreatedBy($created_by)
    {
        $this->created_by = $created_by;
        return $this;
    }

    public function getUpdatedBy()
    {
        return $this->updated_by;
    }

    public function setUpdatedBy($updated_by)
    {
        $this->updated_by = $updated_by;
        return $this;
    }

    public function getDeletedBy()
    {
        return $this->deleted_by;
    }

    public function setDeletedBy($deleted_by)
    {
        $this->deleted_by = $deleted_by;
        return $this;
    }

    public function getPhone()
    {
        $user = $this->user()->first();
        return $user ? [$user->phone] : [];
    }

    public function getLat()
    {
        return $this->lat;
    }

    public function setLat($lat)
    {
        $this->lat = $lat;
        return $this;
    }

    public function getLng()
    {
        return $this->lng;
    }

    public function setLng($lng)
    {
        $this->lng = $lng;
        return $this;
    }

    public function getGa()
    {
        return $this->ga;
    }

    public function setGa($ga)
    {
        $this->ga = $ga;
        return $this;
    }

    public function getFav()
    {
        return $this->fav;
    }

    public function setFav($fav)
    {
        $this->fav = $fav;
        return $this;
    }

    public function getColor()
    {
        return $this->color;
    }

    public function setColor($color)
    {
        $this->color = $color;
        return $this;
    }

    public function getTitulo()
    {
        return $this->titulo;
    }

    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
        return $this;
    }

    public function getSeodescripcion()
    {
        return $this->seodescripcion;
    }

    public function setSeodescripcion($seodescripcion)
    {
        $this->seodescripcion = $seodescripcion;
        return $this;
    }

    public function getWords()
    {
        return $this->words;
    }

    public function setWords($words)
    {
        $this->words = $words;
        return $this;
    }

    public function getFooter()
    {
        return $this->footer ?? 0;
    }

    public function setFooter($footer)
    {
        $this->footer = $footer;
        return $this;
    }

    public function getHeader()
    {
        return $this->header ?? 0;
    }

    public function setHeader($header = 0)
    {
        $this->header = $header;
        return $this;
    }

    public function getDesing()
    {
        return $this->desing ?? 0;
    }

    public function setDesing($desing)
    {
        $this->desing = $desing;
        return $this;
    }

    public function getCode()
    {
        return $this->code;
    }

    public function setCode($code)
    {
        $this->code = $code;
        return $this;
    }

    public function getWscontact()
    {
        return $this->wscontact;
    }

    public function setWscontact($wscontact)
    {
        $this->wscontact = $wscontact;
        return $this;
    }

    public function getFbcontact()
    {
        return $this->fbcontact;
    }

    public function setFbcontact($fbcontact)
    {
        $this->fbcontact = $fbcontact;
        return $this;
    }

    public function getSlug()
    {
        return $this->slug;
    }

    public function setSlug($slug)
    {
        $this->slug = $slug;
        return $this;
    }

    public function getSocialNetwork()
    {
        return [
            'facebook' => $this->fbcontact ?? '',
            'whatsapp' => $this->wscontact ?? '',
        ];
    }

    public function getHorses()
    {
        return $this->horses()->get();
    }

    public function getHorsesId()
    {
        return $this->horses()->pluck('id')->toArray();
    }
}
