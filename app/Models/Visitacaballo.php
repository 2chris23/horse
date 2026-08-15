<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visitacaballo extends Model
{
    protected $table = 'visitacaballos';

    protected $fillable = [
        'horse_id',
        'vista_landing',
        'vista_portal',
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

    public function getVistaLanding()
    {
        return $this->vista_landing;
    }

    public function setVistaLanding($vista_landing)
    {
        $this->vista_landing = $vista_landing;
        return $this;
    }

    public function getVistaPortal()
    {
        return $this->vista_portal;
    }

    public function setVistaPortal($vista_portal)
    {
        $this->vista_portal = $vista_portal;
        return $this;
    }

    public function horse()
    {
        return $this->belongsTo(Horse::class, 'horse_id', 'id');
    }

    public function setLanding()
    {
        $s = $this->vista_landing;
        $s = empty($s) ? 1 : $s;
        $this->vista_landing = $s + 1;
        $this->save();
        return $this;
    }

    public function setPortal()
    {
        $s = $this->vista_portal;
        $s = empty($s) ? 0 : $s;
        $this->vista_portal = $s + 1;
        $this->save();
        return $this;
    }

    public function getVisitas()
    {
        $a = empty($this->vista_portal) ? 0 : $this->vista_portal;
        $b = empty($this->vista_landing) ? 0 : $this->vista_landing;
        return ($a + $b);
    }

    public function getVisitasPortal()
    {
        return $this->vista_portal;
    }

    public function getVisitasLanding()
    {
        return $this->vista_landing;
    }
}
