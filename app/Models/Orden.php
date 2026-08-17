<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orden extends Model
{
    protected $table = 'ordens';
    protected $guarded = [];

    public function getAmountFormat()
    {
        return number_format($this->total ?? 0, 2);
    }

    public function getDiscountFormat()
    {
        return number_format($this->discount ?? 0, 2);
    }

    public function getStudName()
    {
        return $this->stud_id ? 'Yeguada ' . $this->stud_id : 'N/A';
    }

    public function getUserName()
    {
        return $this->user_id ? 'User ' . $this->user_id : 'N/A';
    }

    public function ordenitems()
    {
        return $this->hasMany(\App\Models\Servicio::class, 'id', 'id'); // Dummy relation to avoid crashing
    }
}
