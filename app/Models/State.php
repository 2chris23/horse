<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Observador\Updater;

class State extends Model
{
    use SoftDeletes, Updater;

    protected $table = 'state';
    
    protected $perPage = 10;

    protected $fillable = [
        'name',
        'status',
        'country_id',
        'created_by',
        'updated_by',
        'deleted_by'
    ];

    protected $casts = [
        'status' => 'boolean',
        'country_id' => 'integer',
        'created_by' => 'integer',
        'updated_by' => 'integer',
        'deleted_by' => 'integer',
    ];

    public function country()
    {
        return $this->belongsTo(\App\Models\Country::class);
    }

    public function cities()
    {
        return $this->hasMany(\App\Models\City::class);
    }

    public function contacto()
    {
        return $this->hasMany(\App\Models\Contacto::class);
    }

    public function applications()
    {
        return $this->hasMany(\App\Models\Aplicante::class);
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

    public function isStatus(): bool
    {
        return $this->status;
    }

    public function setStatus(bool $status): static
    {
        $this->status = $status;
        return $this;
    }

    public function getCountryId(): mixed
    {
        return $this->country_id;
    }

    public function setCountryId(mixed $country_id): static
    {
        $this->country_id = $country_id;
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

    public function getCountry(): mixed
    {
        return $this->country;
    }

    public function setCountry(mixed $country): static
    {
        $this->country = $country;
        return $this;
    }

    public function getCities(): mixed
    {
        return $this->cities;
    }

    public function setCities(mixed $cities): static
    {
        $this->cities = $cities;
        return $this;
    }

    public function getCountryName(): string
    {
        $s = Country::find($this->country_id);
        return (!empty($s)) ? $s->getName() : '';
    }
}
