<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClientesSocial extends Model
{
    protected $table = 'clientes_socials';
    protected $perPage = 25;
    protected $guarded = [];

    protected $casts = [
        'type' => 'int',
        'cliente_id' => 'int',
    ];

    protected $fillable = [
        'url',
        'type',
        'cliente_id',
    ];
}
