<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;
use App\Http\Controllers\Functions;
use App\Models\Directory;

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

    public function getPhotos()
    {
        return Photo::gallery($this->id)->get()->toArray();
    }

    public function getInstalationsGallery()
    {
        return Photo::instalations($this->id)->get()->toArray();
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

    public function getFavUrl()
    {
        $c = url(\Config::get('logos.favicon16'));
        if (!empty($this->fav)) {
            $favfol = \Config::get('aplication.favicon');
            $folder2 = "uploads/" . $favfol . "/" . $this->fav;
            $c = url($folder2);
        }
        return $c;
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
        $p = Directory::where(['type' => 3, 'tableid' => $this->id])
            ->where('phone', '!=', 0)
            ->whereNotNull('phone')
            ->get()
            ->toArray();

        return $p;
    }

    public function TieneTelefonos()
    {
        return count($this->getPhone()) > 0;
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

    public function getTituloWeb()
    {
        $d = $this->titulo;
        if (empty($d)) {
            $d = $this->name;
        }
        return $d;
    }

    public function getPhotosModel()
    {
        return \App\Models\Photo::Gallery($this->id)->get();
    }

    public function getPhotosModelInv()
    {
        return \App\Models\Photo::Galleryinv($this->id)->get();
    }

    public function getSliders()
    {
        $d = \App\Models\Photo::Slider($this->id)->get();
        if (count($d) == 0) {
            $d = collect([new \App\Models\Photo()]); // Wrap in collection so $sliders[0] works in view
        }
        return $d;
    }

    public function hasSlider()
    {
        $d = \App\Models\Photo::Slider($this->id)->get();
        if (count($d) == 0) {
            return false;
        }
        return true;
    }

    public function getTwitter()
    {
        $d = \App\Models\SocialNetwork::Twitter($this->id, $this->users_id)->first();
        if (empty($d)) {
            $d = new \App\Models\SocialNetwork(['stud_id' => $this->id, 'user_id' => $this->users_id, 'type' => 1]);
        }
        return $d;
    }

    public function getFacebook()
    {
        $d = \App\Models\SocialNetwork::Facebook($this->id, $this->users_id)->first();
        if (empty($d)) {
            $d = new \App\Models\SocialNetwork(['stud_id' => $this->id, 'user_id' => $this->users_id, 'type' => 2]);
        }
        return $d;
    }

    public function getPinterest()
    {
        $d = \App\Models\SocialNetwork::Pinterest($this->id, $this->users_id)->first();
        if (empty($d)) {
            $d = new \App\Models\SocialNetwork(['stud_id' => $this->id, 'user_id' => $this->users_id, 'type' => 3]);
        }
        return $d;
    }

    public function getInstagram()
    {
        $d = \App\Models\SocialNetwork::Instagram($this->id, $this->users_id)->first();
        if (empty($d)) {
            $d = new \App\Models\SocialNetwork(['stud_id' => $this->id, 'user_id' => $this->users_id, 'type' => 5]);
        }
        return $d;
    }

    public function getYoutube()
    {
        $d = \App\Models\SocialNetwork::Youtube($this->id, $this->users_id)->first();
        if (empty($d)) {
            $d = new \App\Models\SocialNetwork(['stud_id' => $this->id, 'user_id' => $this->users_id, 'type' => 6]);
        }
        return $d;
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
    public function getPhoneFormat()
    {
        $p = Directory::where(['type' => 3, 'tableid' => $this->id])->get();
        $temp = null;
        foreach ($p as $k => $v) {
            if (!empty($temp)) {
                $ext_t = $temp->ext;
                $ext_c = $temp->country_code;

                $p_t = $v->ext;
                $p_c = $v->country_code;

                if ($v->phone == $temp->phone) {
                    if (!empty($ext_t) and empty($p_t)) $v->setExt($ext_t)->push();
                    if (empty($ext_t) and !empty($p_t)) $temp->setExt($p_t)->push();

                    if (!empty($ext_c) and empty($p_t)) $v->setCountryCode($ext_c)->push();
                    if (empty($ext_c) and !empty($p_t)) $temp->setCountryCode($p_c)->push();
                }
            }
            $temp = $v;
        }
        $p = Directory::where(['type' => 3, 'tableid' => $this->id])->get()->unique('phone');

        $to = "";
        foreach ($p as $k => $v) {
            if (!empty($v)) {
                $s = Functions::RetornaNumero($v->getPhone());
                $t = sprintf("%s %s %s %s %s",
                    substr($s, 0, 2),
                    substr($s, 2, 3),
                    substr($s, 5, 3),
                    substr($s, 8, 3),
                    substr($s, 11));
                $to = "+$t<br>";
            }
        }

        return $to;
    }
}
