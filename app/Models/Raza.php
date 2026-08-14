<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Raza extends Model
{
    use SoftDeletes;

    protected $table = 'razas';
    
    protected $perPage = 25;

    protected $fillable = [
        'name',
        'status',
        'description',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    protected $casts = [
        'created_by' => 'integer',
        'updated_by' => 'integer',
        'deleted_by' => 'integer',
    ];

    public function getName(): mixed
    {
        return $this->name;
    }

    public function setName(mixed $name): static
    {
        $this->name = $name;
        return $this;
    }

    public function getDescription(): mixed
    {
        $f = $this->description;
        if (empty($f)) {
            $f = json_encode([$this->name]);
        }
        return json_decode($f);
    }

    public function setDescription(mixed $description = []): static
    {
        $this->description = json_encode($description);
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

    public function getDeletedBy(): mixed
    {
        return $this->deleted_by;
    }

    public function setDeletedBy(mixed $deleted_by): static
    {
        $this->deleted_by = $deleted_by;
        return $this;
    }

    public function getStatus(): mixed
    {
        return $this->status;
    }

    public function setStatus(mixed $status): static
    {
        $this->status = $status;
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

    public function cambioStatus(): static
    {
        if ($this->status == true) {
            $this->status = false;
        }
        return $this;
    }

    public function searchableAs(): string
    {
        return 'raza_index';
    }

    public function toSearchableArray(): array
    {
        return $this->toArray();
    }
}
