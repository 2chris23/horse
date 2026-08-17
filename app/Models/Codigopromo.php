<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Codigopromo extends Model
{
    protected $table = 'codigopromos';
    protected $guarded = [];

    public function isActivo()
    {
        return $this->status == 1; // Or however it is determined
    }

    public function getName()
    {
        return $this->name ?? 'N/A';
    }

    public function getCode()
    {
        return $this->code ?? 'N/A';
    }

    public function getDst()
    {
        return $this->discount ?? 0;
    }

    public function getInicio()
    {
        return $this->start_date ?? $this->created_at;
    }

    public function getFin()
    {
        return $this->end_date ?? $this->created_at;
    }

    public function getStatusStr()
    {
        return $this->isActivo() ? 'Activo' : 'Inactivo';
    }
}
