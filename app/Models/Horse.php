<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Horse extends Model
{
    use SoftDeletes;

    protected $table = 'horses';
    public $incrementing = true;
    protected $perPage = 25;
    protected $primaryKey = 'id';

    protected $casts = [
        'raza' => 'int',
        'doma' => 'bool',
        'sex' => 'int',
        'tosold' => 'bool',
        'sold' => 'bool',
        'users_id' => 'int',
        'created_by' => 'int',
        'updated_by' => 'int',
        'deleted_by' => 'int',
    ];

    protected $fillable = [
        'id', 'name', 'raised', 'birthdate', 'raza', 'doma', 'sex', 'stud',
        'tosold', 'sold', 'color', 'descripcion', 'publish', 'price',
        'cubri', 'favorite', 'tocubri', 'slug', 'users_id', 'studs_id',
        'created_by', 'updated_by', 'deleted_by', 'monedabase', 'genealogia',
    ];

    protected static function boot(): void
    {
        parent::boot();

        static::creating(function (self $model) {
            if ($model->users_id && !$model->studs_id) {
                $user = User::find($model->users_id);
                if ($user) {
                    $model->studs_id = $user->studs_id;
                }
            }
        });

        static::saving(function (self $model) {
            $publish = 0;
            if ($model->studs_id) {
                $stud = Stud::find($model->studs_id);
                if ($stud) {
                    $publish = $stud->paid ?? 0;
                }
            }
            $model->publish = $publish;
            $model->tosold = $model->tosold ? 1 : 0;
            $model->doma = $model->doma ? 1 : 0;
            $model->favorite = $model->favorite ? 1 : 0;
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

    public function stud()
    {
        return $this->belongsTo(Stud::class, 'studs_id');
    }

    public function photos()
    {
        return $this->hasMany(Photo::class, 'tableid')->where('type', 4)->orderBy('order');
    }

    public function videos()
    {
        return $this->hasMany(Video::class, 'tableid')->where('type', 4)->orderBy('orden');
    }

    // ── Query Scopes (legacy) ──────────────────────────────────

    public function scopeVentaPublica($query)
    {
        return $query->where(['tosold' => 1, 'publish' => 1, 'sold' => 0]);
    }

    public function scopeEnVenta($query, Stud $stud)
    {
        return $query->where('studs_id', $stud->id)->where(['tosold' => 1, 'sold' => 0]);
    }

    public function scopeBuscarPorAlzada($query, $min = 50, $max = 150)
    {
        return $query->whereBetween('raised', [$min, $max]);
    }

    public function scopeBuscarPorPrecio($query, $min = 0, $max = 50000000)
    {
        return $query->whereBetween('price', [$min, $max]);
    }

    public function scopeBuscarPorYeguadas($query, $yeguadas = [])
    {
        return $query->wherein('studs_id', $yeguadas);
    }

    public function scopeBuscarPorSexos($query, $sexos = [])
    {
        return $query->wherein('sex', $sexos);
    }
}
