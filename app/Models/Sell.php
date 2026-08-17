<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\Functions;

class Sell extends Model
{
    protected $table = 'sells';
    public $incrementing = true;
    protected $perPage = 25;

    protected $fillable = [
        'horse_id',
        'user_id',
        'date',
    ];

    public function getHorseId()
    {
        return $this->horse_id;
    }

    public function setHorseId($horse_id)
    {
        $this->horse_id = $horse_id;
        return $this;
    }

    public function getUserId()
    {
        return $this->user_id;
    }

    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
        return $this;
    }

    public function getCreatedAt()
    {
        return $this->created_at;
    }

    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    public function Horses()
    {
        return $this->belongsTo(Horse::class, 'horse_id', 'id');
    }

    public function setDate()
    {
        $this->date = Functions::AjustarFechaYmd();
        return $this;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function getFechaFormat()
    {
        return Functions::AjustarFechaYmd($this->date);
    }

    public function getFechaSlash()
    {
        return Functions::AjustarFechaYmd($this->date);
    }
}