<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SlugCaballo extends Model
{
    protected $table = 'slug_caballo';

    protected $fillable = [
        'es',
        'en',
        'fr',
        'nl',
        'it',
        'pt',
        'de',
        'horse_id'
    ];

    public function horse()
    {
        return $this->belongsTo(Horse::class, 'horse_id');
    }
}
