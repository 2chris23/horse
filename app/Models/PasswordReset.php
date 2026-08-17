<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Str;

class PasswordReset extends Model
{
    protected $table = 'password_resets';
    protected $perPage = 25;

    public $incrementing = true;
    public $timestamps = false;

    protected $hidden = [
        'token'
    ];

    protected $fillable = [
        'email',
        'token'
    ];

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    public function setToken()
    {
        $this->token = \Hash::make(\Hash::make(Carbon::now()->toDateString()));
        $this->token = Str::random(64);

        return $this;
    }

    public function getToken()
    {
        return $this->token;
    }
}