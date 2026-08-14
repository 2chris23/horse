<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;
use App\Observador\Updater;
use App\Http\Controllers\Functions;
use Illuminate\Support\Facades\Session;

class Country extends Model
{
    use SoftDeletes, Searchable, Updater;

    protected $table = 'country';
    
    protected $perPage = 10;

    protected $fillable = [
        'name',
        'shortname',
        'status',
        'created_by',
        'updated_by',
        'deleted_by',
        'dominios',
        'shortname_2',
        'callcode',
        'capital',
        'altername',
        'region',
        'subregion',
        'population',
        'lat',
        'lng',
        'demonym',
        'area',
        'gini',
        'timezone',
        'timezone_h',
        'borders',
        'nativeName',
        'currencies',
        'languages',
        'translations',
        'flag',
        'regionalBlocs',
        'cioc',
        'numericcode',
        'de',
        'es',
        'en',
        'fr',
        'it',
        'pt',
        'nl',
        'currency'
    ];

    protected $casts = [
        'status' => 'boolean',
        'created_by' => 'integer',
        'updated_by' => 'integer',
        'deleted_by' => 'integer',
    ];

    public function states()
    {
        return $this->hasMany(\App\Models\State::class);
    }

    public function contacto()
    {
        return $this->hasMany(\App\Models\Contacto::class, 'country_id', 'id');
    }

    public function studs()
    {
        return $this->hasMany(\App\Models\Stud::class, 'country', 'id');
    }

    public function getName(): mixed
    {
        $lng = Session::get('lang');
        $lng = (empty($lng)) ? 'en' : $lng;

        $data = $this->name;
        if (in_array($lng, ['es', 'fr', 'nl', 'de', 'it', 'pt'])) {
            $data = $this->{$lng};
        }

        return $data;
    }

    public function setName(mixed $name): static
    {
        $this->name = $name;
        return $this;
    }

    public function getShortname(): mixed
    {
        return $this->shortname;
    }

    public function setShortname(mixed $shortname): static
    {
        $this->shortname = $shortname;
        return $this;
    }

    public function isStatus(): bool
    {
        return $this->status;
    }

    public function getStatus(): bool
    {
        return $this->status == 1;
    }

    public function setStatus(mixed $status = null): static
    {
        if (!empty($status)) {
            $this->status = $status;
        } else {
            $this->status = $this->status == 0 ? 1 : 0;
        }
        return $this;
    }

    public function getCreatedBy(): mixed
    {
        return $this->created_by;
    }

    public function setCreatedBy(mixed $created_by): static
    {
        $this->created_by = $created_by;
        return $this;
    }

    public function getUpdatedBy(): mixed
    {
        return $this->updated_by;
    }

    public function setUpdatedBy(mixed $updated_by): static
    {
        $this->updated_by = $updated_by;
        return $this;
    }

    public function getDeletedBy(): mixed
    {
        return $this->deleted_by;
    }

    public function setDeletedBy(mixed $deleted_by): static
    {
        $this->deleted_by = $deleted_by;
        return $this;
    }

    public function getDeletedAt(): mixed
    {
        return $this->deleted_at;
    }

    public function setDeletedAt(mixed $deleted_at): static
    {
        $this->deleted_at = $deleted_at;
        return $this;
    }

    public function getCreatedAt(): mixed
    {
        return $this->created_at;
    }

    public function setCreatedAt(mixed $created_at): static
    {
        $this->created_at = $created_at;
        return $this;
    }

    public function getUpdatedAt(): mixed
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(mixed $updated_at): static
    {
        $this->updated_at = $updated_at;
        return $this;
    }

    public function getDominios(): mixed
    {
        return json_decode($this->dominios);
    }

    public function setDominios(mixed $dominios = []): static
    {
        $this->dominios = json_encode($dominios);
        return $this;
    }

    public function getShortname2(): mixed
    {
        return $this->shortname_2;
    }

    public function setShortname2(mixed $shortname_2): static
    {
        $this->shortname_2 = $shortname_2;
        return $this;
    }

    public function getCallcode(): mixed
    {
        return $this->callcode;
    }

    public function setCallcode(mixed $callcode): static
    {
        $this->callcode = $callcode;
        return $this;
    }

    public function getCapital(): mixed
    {
        return $this->capital;
    }

    public function setCapital(mixed $capital): static
    {
        $this->capital = $capital;
        return $this;
    }

    public function getAltername(): mixed
    {
        return $this->altername;
    }

    public function setAltername(mixed $altername): static
    {
        $this->altername = $altername;
        return $this;
    }

    public function getRegion(): mixed
    {
        return $this->region;
    }

    public function setRegion(mixed $region): static
    {
        $this->region = $region;
        return $this;
    }

    public function getSubregion(): mixed
    {
        return $this->subregion;
    }

    public function setSubregion(mixed $subregion): static
    {
        $this->subregion = $subregion;
        return $this;
    }

    public function getPopulation(): mixed
    {
        return $this->population;
    }

    public function setPopulation(mixed $population): static
    {
        $this->population = $population;
        return $this;
    }

    public function setLat(mixed $lat): static
    {
        $this->lat = $lat;
        return $this;
    }

    public function setLng(mixed $lng): static
    {
        $this->lng = $lng;
        return $this;
    }

    public function getDemonym(): mixed
    {
        return $this->demonym;
    }

    public function setDemonym(mixed $demonym): static
    {
        $this->demonym = $demonym;
        return $this;
    }

    public function getArea(): mixed
    {
        return $this->area;
    }

    public function setArea(mixed $area): static
    {
        $this->area = $area;
        return $this;
    }

    public function getGini(): mixed
    {
        return $this->gini;
    }

    public function setGini(mixed $gini): static
    {
        $this->gini = $gini;
        return $this;
    }

    public function getTimezone(): mixed
    {
        return $this->timezone;
    }

    public function setTimezone(mixed $timezone): static
    {
        $this->timezone = $timezone;
        return $this;
    }

    public function getTimezoneH(): mixed
    {
        return json_decode($this->timezone_h);
    }

    public function setTimezoneH(mixed $timezone_h = []): static
    {
        $this->timezone_h = json_encode($timezone_h);
        return $this;
    }

    public function getBorders(): mixed
    {
        return json_decode($this->borders);
    }

    public function setBorders(mixed $borders = []): static
    {
        $this->borders = json_encode($borders);
        return $this;
    }

    public function getNativeName(): mixed
    {
        return $this->nativeName;
    }

    public function setNativeName(mixed $nativeName): static
    {
        $this->nativeName = $nativeName;
        return $this;
    }

    public function setCurrencies(mixed $currencies = []): static
    {
        $this->currencies = json_encode($currencies);
        return $this;
    }

    public function getLanguages(): mixed
    {
        $fa = json_decode($this->languages);
        if (empty($fa)) {
            $fa = [0 => 'en'];
        }
        return $fa;
    }

    public function setLanguages(mixed $languages = []): static
    {
        $this->languages = json_encode($languages);
        return $this;
    }

    public function getTranslations(): mixed
    {
        return json_decode($this->translations);
    }

    public function setTranslations(mixed $translations = []): static
    {
        $this->translations = json_encode($translations);
        return $this;
    }

    public function getFlag(): mixed
    {
        return $this->flag;
    }

    public function setFlag(mixed $flag): static
    {
        $this->flag = $flag;
        return $this;
    }

    public function getRegionalBlocs(): mixed
    {
        return json_decode($this->regionalBlocs);
    }

    public function setRegionalBlocs(mixed $regionalBlocs = []): static
    {
        $this->regionalBlocs = json_encode($regionalBlocs);
        return $this;
    }

    public function getCioc(): mixed
    {
        return $this->cioc;
    }

    public function setCioc(mixed $cioc): static
    {
        $this->cioc = $cioc;
        return $this;
    }

    public function getNumericCode(): mixed
    {
        return $this->numericcode;
    }

    public function setNumericCode(mixed $numericcode = 0): static
    {
        $this->numericcode = $numericcode;
        return $this;
    }

    public function getLatlng(): array
    {
        return [
            0 => $this->getLat(),
            1 => $this->getLng(),
        ];
    }

    public function getLat(): mixed
    {
        return $this->lat;
    }

    public function getLng(): mixed
    {
        return $this->lng;
    }

    public function setLatlng(array $latlng = [0 => 0, 1 => 0]): static
    {
        $this->lat = $latlng[0];
        $this->lng = $latlng[1];
        return $this;
    }

    public function updateData()
    {
        $nombre = strtolower($this->name);
        $url = 'https://restcountries.eu/rest/v2/name/' . $nombre;
        set_time_limit(0);
        $fa = json_decode((new Functions())->alt_file_get_contents_curl($url));

        $e = 0;
        if (!is_array($fa) || empty($fa)) {
            $e = 1;
        }
        if ($e == 0) {
            $fa = $fa[0] ?? $fa;
            foreach ($fa as $k => $v) {
                $k = strtolower($k);
                if ($k == 'alpha3code') {
                    $k = 'shortname_2';
                } elseif ($k == 'alpha2code') {
                    $k = 'shortname';
                } elseif ($k == 'callingcodes') {
                    $k = 'callcode';
                }
                
                if (in_array($k, $this->fillable)) {
                    $this->{$k} = is_array($v) || is_object($v) ? json_encode($v) : $v;
                }
            }
            $this->save();
        }
        return $this;
    }
}
