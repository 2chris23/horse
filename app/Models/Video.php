<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $table = 'videos';

    protected $fillable = [
        'name', 'type', 'tableid', 'url', 'desription', 'orden',
        'publish', 'created_by', 'updated_by', 'deleted_by'
    ];

    protected static function boot(): void
    {
        parent::boot();

        static::deleting(function (self $model) {
            // Log deleted video
        });
    }

    public function horse()
    {
        return $this->belongsTo(Horse::class, 'tableid')->where('type', 4);
    }

    public function stud()
    {
        return $this->belongsTo(Stud::class, 'tableid')->where('type', 3);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'tableid')->where('type', 0);
    }
}
