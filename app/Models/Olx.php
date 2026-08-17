<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Olx extends Model
{
    protected $table = 'olxes';
    protected $perPage = 25;

    protected $fillable = [
        'country',
        'id_country_olx',
        'state',
        'id_state_olx',
        'city',
        'id_city_olx',
        'neighborhood',
        'id_neighborhood_olx',
        'country_id',
        'state_id',
        'city_hws',
    ];

    protected $casts = [
        'country_id' => 'int',
        'state_id' => 'int'
    ];

    public function getCountry()
    {
        return $this->country;
    }

    public function setCountry($country)
    {
        $this->country = $country;
        return $this;
    }

    public function getIdCountryOlx()
    {
        return $this->id_country_olx;
    }

    public function setIdCountryOlx($id_country_olx)
    {
        $this->id_country_olx = $id_country_olx;
        return $this;
    }

    public function getIdStateOlx()
    {
        return $this->id_state_olx;
    }

    public function setIdStateOlx($id_state_olx)
    {
        $this->id_state_olx = $id_state_olx;
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

    public function getIdCityOlx()
    {
        return $this->id_city_olx;
    }

    public function setIdCityOlx($id_city_olx)
    {
        $this->id_city_olx = $id_city_olx;
        return $this;
    }

    public function getIdNeighborhoodOlx()
    {
        return $this->id_neighborhood_olx;
    }

    public function setIdNeighborhoodOlx($id_neighborhood_olx)
    {
        $this->id_neighborhood_olx = $id_neighborhood_olx;
        return $this;
    }

    public function getCountryId()
    {
        return $this->country_id;
    }

    public function setCountryId($country_id)
    {
        $this->country_id = $country_id;
        return $this;
    }

    public function getCityHws()
    {
        return $this->city_hws;
    }

    public function setCityHws($city_hws)
    {
        $this->city_hws = $city_hws;
        return $this;
    }

    public function getNeighborhood()
    {
        return $this->neighborhood;
    }

    public function setNeighborhood($neighborhood)
    {
        $this->neighborhood = $neighborhood;
        return $this;
    }

    public function getState()
    {
        return $this->state;
    }

    public function setState($state)
    {
        $this->state = $state;
        return $this;
    }

    public function getStateId()
    {
        return $this->state_id;
    }

    public function setStateId($state_id)
    {
        $this->state_id = $state_id;
        return $this;
    }
}