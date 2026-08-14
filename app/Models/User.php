<?php

namespace App\Models;

use App\Models\Stud;
use App\Models\Horse;
use App\Models\Personal;
use App\Models\Photo;
use App\Models\Video;
use App\Models\SocialNetwork;
use App\Models\Notification;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes;

    protected $table = 'users';
    protected $perPage = 10;

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'type' => 'int',
        'created_by' => 'int',
        'updated_by' => 'int',
        'deleted_by' => 'int',
    ];

    protected $fillable = [
        'name',
        'email',
        'firstt',
        'password',
        'type',
        'created_by',
        'updated_by',
        'deleted_by',
        'remember_token',
        'domain',
        'validado',
        'studs_id',
        'active',
        'subcritiondate',
        'phone',
        'ext',
        'country_code',
    ];

    protected static function boot(): void
    {
        parent::boot();

        static::creating(function (self $model) {
            $model->active = $model->active ?: 0;
            $model->validado = $model->validado ?: 0;
            $model->type = $model->type ?: 1;
        });

        static::saving(function (self $model) {
            $model->active = $model->active ?: 0;
            $model->validado = $model->validado ?: 0;
        });

        static::created(function (self $model) {
            // Replaced push() logic; relationships should now be created explicitly via controllers.
        });
    }

    public function stud()
    {
        return $this->belongsTo(Stud::class, 'studs_id');
    }

    public function studs()
    {
        return $this->hasMany(Stud::class, 'users_id');
    }

    public function personal()
    {
        return $this->hasOne(Personal::class, 'users_id');
    }

    public function horses()
    {
        return $this->hasMany(Horse::class, 'users_id');
    }

    public function photos()
    {
        return $this->hasMany(Photo::class, 'tableid')->where('type', 1);
    }

    public function videos()
    {
        return $this->hasMany(Video::class, 'tableid')->where('type', 0);
    }
}
