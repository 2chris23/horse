<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TokenActivacion extends Model
{
    protected $table = 'token_activacion';
    protected $perPage = 25;
    public $timestamps = false;

    protected $hidden = [
        'token'
    ];

    protected $fillable = [
        'token',
        'users_id',
        'expiration_date'
    ];

    protected $casts = [
        'users_id' => 'int',
        'expiration_date' => 'datetime'
    ];

    public function getToken()
    {
        return $this->token;
    }

    public function setToken()
    {
        $f = new \App\Http\Controllers\TokenActivacion();
        $this->token = $f->setNewToken();
        return $this;
    }

    public function getUsersId()
    {
        return $this->users_id;
    }

    public function getUser()
    {
        return (!empty($this->users_id)) ? User::find($this->users_id) : null;
    }

    public function setUsersId($users_id)
    {
        $this->users_id = $users_id;
        return $this;
    }

    public function getExpirationDate()
    {
        return $this->expiration_date;
    }

    public function setExpirationDate($expiration_date)
    {
        $this->expiration_date = $expiration_date;
        return $this;
    }
}