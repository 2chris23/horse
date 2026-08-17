<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reporte extends Model
{
    protected $table = 'reporte';
    protected $perPage = 25;

    protected $fillable = [
        'url',
        'horse_id',
        'type',
        'correo',
        'comentario',
        'gcaptcha'
    ];

    protected $casts = [
        'horse_id' => 'int',
        'type' => 'int'
    ];

    public function getUrl()
    {
        return $this->url;
    }

    public function setUrl($url)
    {
        $this->url = $url;
        return $this;
    }

    public function getHorseId()
    {
        return $this->horse_id;
    }

    public function setHorseId($horse_id)
    {
        $this->horse_id = $horse_id;
        return $this;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    public function getCorreo()
    {
        return $this->correo;
    }

    public function setCorreo($correo)
    {
        $this->correo = $correo;
        return $this;
    }

    public function getComentario()
    {
        return $this->comentario;
    }

    public function setComentario($comentario)
    {
        $this->comentario = $comentario;
        return $this;
    }

    public function getGcaptcha()
    {
        return $this->gcaptcha;
    }

    public function setGcaptcha($gcaptcha)
    {
        $this->gcaptcha = $gcaptcha;
        return $this;
    }

    public function horse()
    {
        return $this->belongsTo(Horse::class, 'horse_id', 'id');
    }
}