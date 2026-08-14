<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Functions;

class BuscarCaballo extends Model
{

    protected $table = 'buscar_caballo';
    
    protected $perPage = 25;

    protected $fillable = [
        'nombre',
        'yeguada',
        'Sexo',
        'Capa',
        'Cubricion',
        'Doma',
        'Raza',
        'horse_id',
        'otro',
    ];

    protected $casts = [
        'horse_id' => 'integer',
    ];

    public function horse()
    {
        return $this->belongsTo(\App\Models\Horse::class);
    }

    public function getNombre(): mixed
    {
        return $this->nombre;
    }

    public function setNombre(mixed $nombre): static
    {
        $this->nombre = $nombre;
        return $this;
    }

    public function getSexo(): mixed
    {
        return $this->Sexo;
    }

    public function getCapa(): mixed
    {
        return $this->Capa;
    }

    public function getCubricion(): mixed
    {
        return $this->Cubricion;
    }

    public function getDoma(): mixed
    {
        return $this->Doma;
    }

    public function getRaza(): mixed
    {
        return $this->Raza;
    }

    public function getYeguada(): mixed
    {
        return $this->yeguada;
    }

    public function setYeguada(mixed $yeguada): static
    {
        $this->yeguada = $yeguada;
        return $this;
    }

    public function getHorseId(): mixed
    {
        return $this->horse_id;
    }

    public function setHorseId(mixed $horse_id): static
    {
        $this->horse_id = $horse_id;
        return $this;
    }

    public function searchableAs(): string
    {
        return 'horse_buscar_index';
    }

    public function llenarData(Horse $horse): static
    {
        $ubicacion = "";
        $lngo = App::getLocale();
        $lng = [
            0 => 'es',
            1 => 'en',
            2 => 'de',
            3 => 'fr',
            4 => 'it',
            5 => 'nl',
            6 => 'pt',
        ];
        $this->nombre = $horse->getName();
        $this->horse_id = $horse->id;
        $this->yeguada = $horse->getStud();
        $stud = Stud::find($horse->studs_id);

        if (!empty($stud)) {
            $ubicacion = $stud->getAddress() . " " . $stud->getCity() . " " . $stud->getStateModel()->name . " ";
            $ubicacion .= (new Functions())->ReemplazarAcentos($stud->getAddress() . " " . $stud->getCity() . " " . $stud->getStateModel()->name . " ");
            $country = $stud->getCountryModel();
            if (!empty($country)) {
                $fa = json_decode($country->translations);
                $co = "";
                if (is_object($fa)) {
                    foreach ($fa as $v) {
                        $co .= "$v ";
                    }
                    $co .= " " . $country->nativename;
                    $ubicacion .= $co;
                } elseif (is_array($fa)) {
                    foreach ($fa as $k => $v) {
                        $co .= "$v " . (new Functions())->ReemplazarAcentos("$v ") . " ";
                    }
                    $co .= $country->nativename . " " . (new Functions())->ReemplazarAcentos($country->nativename . " ") . " ";
                    $ubicacion .= $co;
                }
            }
        }

        $Sexo = "";
        $Capa = "";
        $Cubricion = "";
        $Doma = "";
        $Raza = "";

        for ($i = 0; $i < count($lng); $i++) {
            App::setLocale($lng[$i]);
            if (!empty($horse->doma)) {
                if ($horse->doma != 0) {
                    $Doma .= ($horse->getDoma() != 1) ? trans('horse.doma.0') . " " : trans('horse.doma.' . $horse->doma) . " ";
                }
            }
            if ($horse->tocubri != 0) {
                $Cubricion .= trans('horse.text.cubricion') . " " . (new Functions())->ReemplazarAcentos(trans('horse.text.cubricion')) . " ";
            }
            $Raza .= trans('horse.raza.' . $horse->raza) . " " . (new Functions())->ReemplazarAcentos(trans('horse.raza.' . $horse->raza) . " ") . " ";
            $Sexo .= trans('horse.sex.' . $horse->sex) . " " . (new Functions())->ReemplazarAcentos(trans('horse.sex.' . $horse->sex) . " ") . " ";
            $Capa .= trans('horse.color.' . $horse->color) . " " . (new Functions())->ReemplazarAcentos(trans('horse.color.' . $horse->color) . " ") . " ";
        }

        $this->otro = str_replace("-", " ", $ubicacion);
        
        $this->setSexo(str_replace("-", " ", $Sexo))
            ->setCapa(str_replace("-", " ", $Capa))
            ->setCubricion(str_replace("-", " ", $Cubricion))
            ->setDoma(str_replace("-", " ", $Doma))
            ->setRaza(str_replace("-", " ", $Raza));
            
        App::setLocale($lngo);
        return $this;
    }

    public function setRaza(mixed $Raza): static
    {
        $this->Raza = $Raza;
        return $this;
    }

    public function setDoma(mixed $Doma): static
    {
        $this->Doma = $Doma;
        return $this;
    }

    public function setCubricion(mixed $Cubricion): static
    {
        $this->Cubricion = $Cubricion;
        return $this;
    }

    public function setCapa(mixed $Capa): static
    {
        $this->Capa = $Capa;
        return $this;
    }

    public function setSexo(mixed $Sexo): static
    {
        $this->Sexo = $Sexo;
        return $this;
    }
}
