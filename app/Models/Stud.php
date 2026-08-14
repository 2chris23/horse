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

    public function getState()
    {
        return empty($this->state) ? 0 : $this->state;
    }

    public function getStateModel()
    {
        return State::findOrNew($this->state);
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

    public function getMoneda()
    {
        return $this->moneda ?? 'EUR';
    }

    public function getLogo()
    {
        if (!empty($this->logo)) {
            $f = \Config::get('aplication.fotologo', 'logo');
            return url("uploads/" . $f . "/" . $this->logo);
        }
        return url('img/admin.jpg');
    }

    public function getEmail()
    {
        return strtolower((string)$this->email);
    }

    public function getPhone()
    {
        return [];
    }
}
