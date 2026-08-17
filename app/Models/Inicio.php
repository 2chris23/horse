<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inicio extends Model
{
    protected $table = 'inicios';
    protected $perPage = 25;

    protected $hidden = [
        'remember_token'
    ];

    protected $fillable = [
        'url',
        'users_id',
        'ipaddress',
        'remember_token'
    ];

    protected $casts = [
        'users_id' => 'int'
    ];

    public function getIpaddress()
    {
        return $this->ipaddress;
    }

    public function setIpaddress($ipaddress)
    {
        $this->ipaddress = $ipaddress;
        return $this;
    }

    public function getRememberToken()
    {
        return $this->remember_token;
    }

    public function setRememberToken($remember_token)
    {
        $this->remember_token = $remember_token;
        return $this;
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function setUrl($url)
    {
        $this->url = $url;
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

    public function scopePorToken($query, $token)
    {
        return $query->where('remember_token', $token);
    }
}