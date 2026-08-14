<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Sluggable;
use App\Http\Controllers\Functions;
use App\Http\Controllers\PublicController;

class Horse extends Model
{
    use SoftDeletes;
    use Sluggable;

    protected $table = 'horses';
    public $incrementing = true;
    protected $perPage = 25;
    protected $primaryKey = 'id';

    protected $casts = [
        'raza' => 'int',
        'doma' => 'bool',
        'sex' => 'int',
        'tosold' => 'bool',
        'sold' => 'bool',
        'users_id' => 'int',
        'created_by' => 'int',
        'updated_by' => 'int',
        'deleted_by' => 'int',
    ];

    protected $fillable = [
        'id', 'name', 'raised', 'birthdate', 'raza', 'doma', 'sex', 'stud',
        'tosold', 'sold', 'color', 'descripcion', 'publish', 'price',
        'cubri', 'favorite', 'tocubri', 'slug', 'users_id', 'studs_id',
        'created_by', 'updated_by', 'deleted_by', 'monedabase', 'genealogia',
    ];

    protected static function boot(): void
    {
        parent::boot();

        static::creating(function (self $model) {
            if ($model->users_id && !$model->studs_id) {
                $user = User::find($model->users_id);
                if ($user) {
                    $model->studs_id = $user->studs_id;
                }
            }
        });

        static::saving(function (self $model) {
            $publish = 0;
            if ($model->studs_id) {
                $stud = Stud::find($model->studs_id);
                if ($stud) {
                    $publish = $stud->paid ?? 0;
                }
            }
            $model->publish = $publish;
            $model->tosold = $model->tosold ? 1 : 0;
            $model->doma = $model->doma ? 1 : 0;
            $model->favorite = $model->favorite ? 1 : 0;
        });

        static::deleting(function (self $model) {
            $model->photos()->delete();
            $model->videos()->delete();
        });
    }

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

    public function getUser()
    {
        return User::find($this->users_id);
    }

    public function stud()
    {
        return $this->belongsTo(Stud::class, 'studs_id');
    }

    public function photos()
    {
        return $this->hasMany(Photo::class, 'tableid')->where('type', 4)->orderBy('order');
    }

    public function Fotos()
    {
        return $this->hasMany(Photo::class, 'tableid', 'id')->where('type', 4);
    }

    public function videos()
    {
        return $this->hasMany(Video::class, 'tableid')->where('type', 4)->orderBy('orden');
    }

    public function Videoss()
    {
        return $this->hasMany(Video::class, 'tableid', 'id')->where('type', 4);
    }

    public function Colors()
    {
        return $this->belongsTo(Color::class, 'color', 'id');
    }

    // ── Getters and Setters ──────────────────────────────────────

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function getGenealogia()
    {
        return $this->genealogia;
    }

    public function setGenealogia($genealogia)
    {
        $this->genealogia = $genealogia;
        return $this;
    }

    public function getStudsId()
    {
        return $this->studs_id;
    }

    public function setStudsId($user_id)
    {
        $this->studs_id = 0;
        $u = User::find($user_id);
        if (!empty($u)) {
            if (!empty($u->studs_id)) {
                $this->studs_id = $u->studs_id;
            } elseif (!empty($u->Yeguada())) {
                $this->studs_id = $u->Yeguada()->id;
            } else {
                $this->studs_id = 0;
            }
        }
        return $this;
    }

    public function getSex()
    {
        return $this->sex;
    }

    public function getSexString()
    {
        $d = '';
        if ($this->sex != 0) {
            $d = trans('horse.sex.' . $this->sex);
        }
        return $d;
    }

    public function setSex($sex)
    {
        $this->sex = $sex;
        return $this;
    }

    public function getStud()
    {
        return $this->stud;
    }

    public function getStudName()
    {
        $d = $this->getYeguada();
        if (empty($d)) return '';
        return is_object($d) ? $d->getName() : '';
    }

    public function getYeguada()
    {
        $g = User::find($this->users_id);
        if (!empty($g)) {
            $d = $g->Yeguada();
        } else {
            $d = null;
        }
        if (empty($d)) return '';
        return $d;
    }

    public function getStudPhone()
    {
        $d = $this->getYeguada();
        if (empty($d) || !is_object($d)) return null;
        return $d->getPhone();
    }

    public function getStudLocation()
    {
        $d = $this->getYeguada();
        if (empty($d) || !is_object($d)) return null;
        return $d->getAddress();
    }

    public function setStud($stud)
    {
        $this->stud = $stud;
        return $this;
    }

    public function getSold()
    {
        return (bool)$this->sold;
    }

    public function setSold($sold)
    {
        $this->sold = $sold;
        return $this;
    }

    public function getRaised()
    {
        return Functions::AjustarNumeroMil($this->raised);
    }

    public function setRaised($raised)
    {
        $this->raised = $raised;
        return $this;
    }

    public function getBirthdate()
    {
        return $this->birthdate;
    }

    public function setBirthdate($birthdate)
    {
        $this->birthdate = $birthdate;
        return $this;
    }

    public function getRaza()
    {
        return $this->raza;
    }

    public function setRaza($raza)
    {
        $this->raza = $raza;
        return $this;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getPriceMil()
    {
        return Functions::AjustarNumeroMil($this->price);
    }

    public function setPrice($price)
    {
        $this->price = Functions::ConvertirNumeroAFloat($price);
        return $this;
    }

    public function getTosold()
    {
        return (bool)$this->tosold;
    }

    public function setTosold($tosold)
    {
        $this->tosold = ($tosold === true || $tosold === 1 || $tosold === '1' || $tosold === 'true') ? 1 : 0;
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

    public function getDoma()
    {
        return (bool)$this->doma;
    }

    public function setDoma($doma)
    {
        $this->doma = ($doma === true || $doma === 1 || $doma === '1' || $doma === 'true') ? 1 : 0;
        return $this;
    }

    public function getFirstFoto()
    {
        return Photo::where('type', 4)->where('tableid', $this->id)->first();
    }

    public function getPhotoModel()
    {
        return Photo::where('type', 4)->where('tableid', $this->id)->get();
    }

    public function getPhotoFirstModel()
    {
        $p = Photo::where('type', 4)->where('tableid', $this->id)->first();
        return $p ?? new Photo();
    }

    public function getPhoto()
    {
        return Photo::where('type', 4)->where('tableid', $this->id)->get()->toArray();
    }

    public function getColor()
    {
        return $this->color;
    }

    public function getColorString()
    {
        return ($this->color !== 0 && !empty($this->color)) ? trans('horse.color.' . $this->color) : '';
    }

    public function setColor($color)
    {
        $this->color = $color;
        return $this;
    }

    public function getDescripcion()
    {
        return str_replace(["\r\n", "\r"], " ", nl2br((string)$this->descripcion));
    }

    public function setDescripcion($descripcion)
    {
        $this->descripcion = str_replace(["\r\n", "<br>"], " ", (string)$descripcion);
        $this->descripcion = Functions::LimpiarTexto($this->descripcion);
        return $this;
    }

    public function getRaisedFormat()
    {
        return Functions::ConvertirNumeroAFloat($this->raised) . " cm";
    }

    public function getAge()
    {
        $tdy = Carbon::now()->year;
        $dat = Functions::AjustarFechaAnyo($this->getBirthdate());
        return ($tdy - $dat);
    }

    public function getAgeMonth()
    {
        $tdy = Carbon::now()->month;
        $dat = Functions::AjustarFechaMes($this->getBirthdate());
        return ($tdy - $dat);
    }

    public function getVideosModel()
    {
        return Video::where(['type' => 4, 'tableid' => $this->id])->orderBy('orden')->get();
    }

    public function getPublish()
    {
        return $this->publish;
    }

    public function setPublish($publish)
    {
        $this->publish = $publish;
        return $this;
    }

    public function getCubri()
    {
        return $this->cubri;
    }

    public function setCubri($cubri)
    {
        $this->cubri = $cubri;
        return $this;
    }

    public function getToCubri()
    {
        return $this->tocubri;
    }

    public function setToCubri($CubriBol = 0)
    {
        $this->tocubri = empty($CubriBol) ? 0 : $CubriBol;
        return $this;
    }

    public function getCubriPrice()
    {
        return $this->cubri;
    }

    public function setCubriPrice($CubriPrice)
    {
        $this->cubri = $CubriPrice;
        return $this;
    }

    public function getFavorite()
    {
        return $this->favorite ? 1 : 0;
    }

    public function isFavorite()
    {
        return (bool)$this->favorite;
    }

    public function setFavorite($favorite)
    {
        $this->favorite = $favorite;
        return $this;
    }

    public function getMonedabase()
    {
        $f = $this->monedabase;
        if (empty($f)) {
            $ds = \Auth::user();
            $f = 'EUR';
            if ($ds && method_exists($ds, 'isAdm') && !$ds->isAdm()) {
                $y = $ds->Yeguada();
                if ($y && is_object($y) && method_exists($y, 'getMoneda')) {
                    $f = $y->getMoneda();
                }
            }
        }
        return $f ?: 'EUR';
    }

    // ── Query Scopes ───────────────────────────────────────────

    public function scopeVentaPublica($query)
    {
        return $query->where(['tosold' => 1, 'publish' => 1, 'sold' => 0]);
    }

    public function scopeEnVenta($query, Stud $stud)
    {
        return $query->where('studs_id', $stud->id)->where(['tosold' => 1, 'sold' => 0]);
    }

    public function scopeBuscarPorAlzada($query, $min = 50, $max = 150)
    {
        return $query->whereBetween('raised', [$min, $max]);
    }

    public function scopeBuscarPorPrecio($query, $min = 0, $max = 50000000)
    {
        return $query->whereBetween('price', [$min, $max]);
    }

    public function scopeBuscarPorYeguadas($query, $yeguadas = [])
    {
        return $query->whereIn('studs_id', $yeguadas);
    }

    public function scopeBuscarPorSexos($query, $sexos = [])
    {
        return $query->whereIn('sex', $sexos);
    }

    public function scopeCaballosPorUsuario($query, $users_id)
    {
        return $query->where('users_id', $users_id);
    }

    public function scopeCaballos($query, Stud $stud)
    {
        return $query->where('studs_id', $stud->id);
    }

    public function scopeAzar($query)
    {
        return $query->inRandomOrder();
    }

    public function getAltText()
    {
        $s = '';
        if (!empty($this->name)) {
            $s .= $this->name . " ";
        }
        if (!empty($this->sex)) {
            $s .= trans('horse.sex.' . $this->sex) . " ";
        }
        if (!empty($this->raza)) {
            $s .= trans('horse.raza.' . $this->raza) . " ";
        }
        if (!empty($this->studs_id)) {
            $stud = Stud::find($this->studs_id);
            if ($stud) {
                $s .= $stud->name . " ";
            }
        }
        return trim($s);
    }

    public function getSimboloMoneda()
    {
        $d = $this->getMonedabase();
        $m = Moneda::where('small', $d)->first();
        return $m ? $m->getSimbolo() : '€';
    }

    public function setMonedabase($monedabase = null)
    {
        $d = null;
        if (!empty($monedabase)) {
            $d = Moneda::where('small', $monedabase)->first();
        }
        if (!empty($d)) {
            $d = $d->getSmall();
        } else {
            $y = $this->getYeguada();
            $d = ($y && is_object($y) && method_exists($y, 'getMoneda')) ? $y->getMoneda() : 'EUR';
        }
        $this->monedabase = $d;
        return $this;
    }

    public function ObtenPrecioMonedaMill($compara = null)
    {
        if (empty($compara)) {
            $compara = $this->getMonedabase();
        }
        return Functions::AjustarNumeroMil($this->ObtenPrecioMoneda(strtoupper($compara)));
    }

    public function ObtenPrecioMoneda($compara = null)
    {
        if (empty($compara)) {
            $compara = $this->getMonedabase();
        }
        $compara = strtoupper($compara);
        $base = 'EUR';
        $mimoneda = $this->getMonedabase();
        $pv = $this->price;

        if ($mimoneda == $compara) return $pv;

        $c1 = ($compara != $base);
        $c2 = ($mimoneda != $base);

        if ($c1 && !$c2) {
            return Functions::currencyConverter($compara, $pv);
        } elseif (!$c1 && $c2) {
            return Functions::currencyConverter('EUR', $pv, $mimoneda);
        } else {
            $sa = Functions::currencyConverter($base, $pv, $mimoneda);
            return Functions::currencyConverter($compara, $sa, $base);
        }
    }

    public function ObtenPrecioCubricionMonedaMill($compara = null)
    {
        if (empty($compara)) {
            $compara = $this->getMonedabase();
        }
        return Functions::AjustarNumeroMil($this->ObtenPrecioCubricionMoneda(strtoupper($compara)));
    }

    public function ObtenPrecioCubricionMoneda($compara = null)
    {
        if (empty($compara)) {
            $compara = $this->getMonedabase();
        }
        $compara = strtoupper($compara);
        $base = 'EUR';
        $mimoneda = $this->getMonedabase();
        $pv = $this->cubri;

        if ($mimoneda == $compara) return $pv;

        $c1 = ($compara != $base);
        $c2 = ($mimoneda != $base);

        if ($c1 && !$c2) {
            return Functions::currencyConverter($compara, $pv);
        } elseif (!$c1 && $c2) {
            return Functions::currencyConverter('EUR', $pv, $mimoneda);
        } else {
            $sa = Functions::currencyConverter($base, $pv, $mimoneda);
            return Functions::currencyConverter($compara, $sa, $base);
        }
    }

    public function ObtenerSlug()
    {
        $lo = App::getLocale();
        $fa = $this->SlugNuevo()->first();
        if ($fa && !empty($fa->{$lo})) {
            return $fa->{$lo};
        }
        return $this->slug ?? 'caballo';
    }

    public function SlugNuevo()
    {
        return $this->hasOne(SlugCaballo::class, 'horse_id', 'id');
    }
}
