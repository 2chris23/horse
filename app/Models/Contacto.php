<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\Functions;

class Contacto extends Model
{
    protected $table = 'contactos';
    protected $perPage = 25;

    protected $fillable = [
        'nombre',
        'alias',
        'correo',
        'telefono',
        'nota',
        'facebook',
        'twitter',
        'instagram',
        'pinterest',
        'web',
        'direccion',
        'city',
        'country_id',
        'state_id',
        'categoria',
        'studs_id',
        'users_id',
        'favorito',
        'subcat',
    ];

    protected $casts = [
        'country_id' => 'int',
        'state_id' => 'int',
        'categoria' => 'int',
        'studs_id' => 'int',
        'users_id' => 'int'
    ];

    public function stud()
    {
        return $this->belongsTo(Stud::class, 'studs_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'studs_id', 'id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre = null)
    {
        $this->nombre = $nombre;
        return $this;
    }

    public function getAlias()
    {
        return $this->alias;
    }

    public function setAlias($nombre = null)
    {
        $this->alias = $nombre;
        return $this;
    }

    public function getCorreo()
    {
        return $this->correo;
    }

    public function setCorreo($nombre = null)
    {
        $this->correo = $nombre;
        return $this;
    }

    public function getNota()
    {
        return $this->nota;
    }

    public function setNota($nombre = null)
    {
        $nombre = (str_replace('  ', ' ', Functions::LimpiarTexto($nombre)));
        $this->nota = str_replace('  ', ' ', Functions::LimpiarTexto($nombre));
        return $this;
    }

    public function getFacebook()
    {
        return $this->facebook;
    }

    public function setFacebook($nombre = null)
    {
        $this->facebook = $nombre;
        return $this;
    }

    public function getTwitter()
    {
        return $this->twitter;
    }

    public function setTwitter($nombre = null)
    {
        $this->twitter = $nombre;
        return $this;
    }

    public function getInstagram()
    {
        return $this->instagram;
    }

    public function setInstagram($nombre = null)
    {
        $this->instagram = $nombre;
        return $this;
    }

    public function getPinterest()
    {
        return $this->pinterest;
    }

    public function setPinterest($nombre = null)
    {
        $this->pinterest = $nombre;
        return $this;
    }

    public function getWeb()
    {
        return $this->web;
    }

    public function setWeb($nombre = null)
    {
        $this->web = $nombre;
        return $this;
    }

    public function getDireccion()
    {
        return $this->direccion;
    }

    public function setDireccion($nombre = null)
    {
        $this->direccion = $nombre;
        return $this;
    }

    public function getCity()
    {
        return $this->city;
    }

    public function setCity($nombre = null)
    {
        $this->city = $nombre;
        return $this;
    }

    public function getCountryId()
    {
        if (empty($this->country_id)) return 0;
        return $this->country_id;
    }

    public function setCountryId($nombre = 0)
    {
        $this->country_id = $nombre;
        return $this;
    }

    public function getStateId()
    {
        if (empty($this->state_id)) return 0;
        return $this->state_id;
    }

    public function setStateId($nombre = 0)
    {
        $this->state_id = $nombre;
        return $this;
    }

    public function getStudsId()
    {
        return $this->studs_id;
    }

    public function setStudsId($nombre = 0)
    {
        $this->studs_id = $nombre;
        return $this;
    }

    public function getUsersId($nombre)
    {
        return $this->users_id;
    }

    public function setUsersId($id)
    {
        $this->users_id = $id;
        $this->studs_id = User::find($id)->Yeguada()->id;
        return $this;
    }

    public function getCategoria()
    {
        return $this->categoria;
    }

    public function setCategoria($nombre = 0)
    {
        $this->categoria = $nombre;
        return $this;
    }

    public function getTelefono()
    {
        $t = json_decode($this->telefono);
        if (empty($t)) {
            return [];
        }
        return $t;
    }

    public function setTelefono($nombre = [])
    {
        $this->telefono = json_encode($nombre);
        return $this;
    }

    public function getFavorito()
    {
        return $this->favorito;
    }

    public function setFavorito($favorito = 0)
    {
        $this->favorito = $favorito;
        return $this;
    }

    public function getSubcat()
    {
        return $this->subcat;
    }

    public function setSubcat($subcat = null)
    {
        $this->subcat = $subcat;
        return $this;
    }

    public function CambiarFavorito()
    {
        $t = $this->favorito;
        if ($t == 0) {
            $this->favorito = 1;
        } else {
            $this->favorito = 0;
        }
        return $this;
    }
}