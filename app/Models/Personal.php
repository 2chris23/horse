<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Personal extends Model
{
    use SoftDeletes;

    protected $table = 'personal';

    protected $fillable = [
        'name', 'lastname', 'email', 'address', 'country', 'state',
        'postal', 'city', 'users_id', 'created_by', 'updated_by', 'deleted_by'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function getName()
    {
        return $this->name ?? '';
    }

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function getLastname()
    {
        return $this->lastname ?? '';
    }

    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
        return $this;
    }

    public function getEmail()
    {
        return $this->email ?? '';
    }

    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    public function getCountry()
    {
        return empty($this->country) ? 0 : (int)$this->country;
    }

    public function setCountry($country)
    {
        $this->country = $country;
        return $this;
    }

    public function getState()
    {
        return empty($this->state) ? 0 : (int)$this->state;
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

    public function getAddress()
    {
        return $this->address ?? '';
    }

    public function setAddress($address)
    {
        $this->address = $address;
        return $this;
    }

    public function getPostal()
    {
        return $this->postal ?? '';
    }

    public function setPostal($postal)
    {
        $this->postal = $postal;
        return $this;
    }

    public function getPhone()
    {
        return Directory::where(['type' => 2, 'tableid' => $this->id])->get()->toArray();
    }

    public function getPhoneFormat()
    {
        return Directory::where(['type' => 2, 'tableid' => $this->id])->get()->toArray();
    }
}
