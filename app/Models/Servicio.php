<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    protected $table = 'servicios';
    protected $guarded = [];

    public function getPrice()
    {
        return $this->price ?? 0;
    }

    public function getDiscount()
    {
        return $this->discount ?? 0;
    }
}
