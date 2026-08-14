<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $table = 'photos';

    protected $fillable = [
        'name', 'type', 'tableid', 'url', 'description', 'titulo1',
        'titulo2', 'order', 'publish', 'size', 'created_by',
        'updated_by', 'deleted_by', 'marcado'
    ];

    protected static function boot(): void
    {
        parent::boot();

        static::created(function (self $model) {
            // Optimization logic should be handled through jobs or observers in L11
        });

        static::deleting(function (self $model) {
            // File deletion should be moved to observers or controllers
        });
    }

    public function horse()
    {
        return $this->belongsTo(Horse::class, 'tableid')->where('type', 4);
    }

    public function stud()
    {
        return $this->belongsTo(Stud::class, 'tableid')->whereIn('type', [2, 3, 5, 7, 8]);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'tableid')->whereIn('type', [1, 10]);
    }
}
