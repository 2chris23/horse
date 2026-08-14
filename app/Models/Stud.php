<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Stud extends Model
{
    use SoftDeletes;

    protected $table = 'studs';

    protected $fillable = [
        'logo', 'fav', 'name', 'description', 'color', 'address', 'country', 'state',
        'titulo', 'seodescripcion', 'words', 'footer', 'header', 'desing',
        'city', 'lat', 'slug', 'lng', 'ga', 'email', 'paid', 'code', 'wscontact',
        'fbcontact', 'moneda', 'users_id', 'created_by', 'subcritiondate',
        'updated_by', 'deleted_by'
    ];

    protected static function boot(): void
    {
        parent::boot();

        static::created(function (self $model) {
            // Note: $user->studs_id setting should be handled in controllers instead of push()
        });

        static::deleting(function (self $model) {
            $model->photos()->delete();
            $model->videos()->delete();
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function horses()
    {
        return $this->hasMany(Horse::class, 'studs_id');
    }

    public function photos()
    {
        return $this->hasMany(Photo::class, 'tableid')->whereIn('type', [2, 3, 5, 7, 8]);
    }

    public function videos()
    {
        return $this->hasMany(Video::class, 'tableid')->where('type', 3);
    }
}
