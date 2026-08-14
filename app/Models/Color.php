<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Observador\Updater;

class Color extends Model
{
    use SoftDeletes, Updater;

    protected $table = 'colors';
    
    protected $perPage = 25;

    protected $fillable = [
        'name',
        'hex',
        'created_by',
        'updated_by',
        'deleted_by'
    ];

    protected $casts = [
        'created_by' => 'integer',
        'updated_by' => 'integer',
        'deleted_by' => 'integer',
    ];

    public function getCreatedBy(): mixed
    {
        return $this->created_by;
    }

    public function setCreatedBy(mixed $created_by): static
    {
        $this->created_by = $created_by;
        return $this;
    }

    public function getHex(): mixed
    {
        return $this->hex;
    }

    public function setHex(mixed $hex): static
    {
        $this->hex = $hex;
        return $this;
    }

    public function getDeletedBy(): mixed
    {
        return $this->deleted_by;
    }

    public function setDeletedBy(mixed $deleted_by): static
    {
        $this->deleted_by = $deleted_by;
        return $this;
    }

    public function getName(): mixed
    {
        return $this->name;
    }

    public function setName(mixed $name): static
    {
        $this->name = $name;
        return $this;
    }

    public function getUpdatedBy(): mixed
    {
        return $this->updated_by;
    }

    public function setUpdatedBy(mixed $updated_by): static
    {
        $this->updated_by = $updated_by;
        return $this;
    }
}
