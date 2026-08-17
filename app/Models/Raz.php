<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Raz extends Model
{
    use Searchable;

    protected $table = 'raz';
    protected $perPage = 25;

    protected $fillable = [
        'name',
        'description'
    ];

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function getDescription()
    {
        $f = $this->description;
        if (empty($f)) {
            $f = json_encode([$this->name]);
        }
        return json_decode($f);
    }

    public function setDescription($description = [])
    {
        $this->description = json_encode($description);
        return $this;
    }

    public function searchableAs()
    {
        return 'raz_index';
    }

    public function toSearchableArray()
    {
        $array = $this->toArray();

        return $array;
    }
}