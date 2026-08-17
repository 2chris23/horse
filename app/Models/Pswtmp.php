<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\Functions;

class Pswtmp extends Model
{
    protected $table = 'pswtmp';
    protected $perPage = 25;
    public $timestamps = false;

    protected $fillable = [
        'users_id',
        'pwd'
    ];

    protected $casts = [
        'users_id' => 'int'
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
        });
        static::saving(function ($model) {
        });
        static::created(function ($model) {
        });
    }

    public function getPwd()
    {
        return $this->pwd;
    }

    public function setPwd()
    {
        $password = Functions::random_str(rand(6, 10));
        $this->pwd = $password;
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
}