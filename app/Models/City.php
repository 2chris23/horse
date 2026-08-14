<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Observador\Updater;

class City extends Model
{
    use SoftDeletes, Updater;

    protected $table = 'city';
    
    protected $perPage = 10;

    protected $fillable = [
        'name',
        'status',
        'state_id',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    protected $casts = [
        'status' => 'boolean',
        'state_id' => 'integer',
        'created_by' => 'integer',
        'updated_by' => 'integer',
        'deleted_by' => 'integer',
    ];

    public function state()
    {
        return $this->belongsTo(\App\Models\State::class);
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

    public function getStatus(): bool
    {
        return $this->status;
    }

    public function setStatus(bool $status): static
    {
        $this->status = $status;
        return $this;
    }

    public function getStateId(): mixed
    {
        return $this->state_id;
    }

    public function setStateId(mixed $state_id): static
    {
        $this->state_id = $state_id;
        return $this;
    }

    public function getCreatedBy(): mixed
    {
        return $this->created_by;
    }

    public function setCreatedBy(mixed $created_by): static
    {
        $this->created_by = $created_by;
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

    public function getDeletedBy(): mixed
    {
        return $this->deleted_by;
    }

    public function setDeletedBy(mixed $deleted_by): static
    {
        $this->deleted_by = $deleted_by;
        return $this;
    }

    public function getDeletedAt(): mixed
    {
        return $this->deleted_at;
    }

    public function setDeletedAt(mixed $deleted_at): static
    {
        $this->deleted_at = $deleted_at;
        return $this;
    }

    public function getCreatedAt(): mixed
    {
        return $this->created_at;
    }

    public function setCreatedAt(mixed $created_at): static
    {
        $this->created_at = $created_at;
        return $this;
    }

    public function getUpdatedAt(): mixed
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(mixed $updated_at): static
    {
        $this->updated_at = $updated_at;
        return $this;
    }

    public function getStateString(): string
    {
        $s = State::find($this->state_id);
        return (!empty($s)) ? $s->getName() : '';
    }

    public function getCountryName(): string
    {
        $s = Country::find($this->getCountry());
        return (!empty($s)) ? $s->getName() : '';
    }

    public function getCountry(): mixed
    {
        $s = State::find($this->state_id);

        if (!empty($s)) {
            $d = $s->getCountryId();
        } else {
            $d = 0;
        }
        return $d;
    }
}
