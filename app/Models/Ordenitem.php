<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ordenitem extends Model
{
    protected $table = 'ordenitem';
    protected $perPage = 25;

    protected $fillable = [
        'servicio_id',
        'tipo_servicio',
        'cantidad',
        'subtotal',
        'status',
        'sesion',
        'users_id',
        'studs_id',
        'orden_id',
    ];

    protected $casts = [
        'servicio_id' => 'int',
        'tipo_servicio' => 'int',
        'subtotal' => 'float',
        'status' => 'int',
        'users_id' => 'int',
        'studs_id' => 'int',
        'orden_id' => 'int'
    ];

    public function orden()
    {
        return $this->belongsTo(Orden::class);
    }

    public function stud()
    {
        return $this->belongsTo(Stud::class, 'studs_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function getServicioId()
    {
        return $this->servicio_id;
    }

    public function setServicioId($servicio_id)
    {
        $this->servicio_id = $servicio_id;
        return $this;
    }

    public function getTipoServicio()
    {
        return $this->tipo_servicio;
    }

    public function setTipoServicio($tipo_servicio)
    {
        $this->tipo_servicio = $tipo_servicio;
        return $this;
    }

    public function getSubtotal()
    {
        return $this->subtotal;
    }

    public function setSubtotal($subtotal)
    {
        $this->subtotal = $subtotal;
        return $this;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    public function getSesion()
    {
        return $this->sesion;
    }

    public function setSesion($sesion)
    {
        $this->sesion = $sesion;
        return $this;
    }

    public function getUsersId()
    {
        return $this->users_id;
    }

    public function setUsersId($users_id)
    {
        $this->users_id = $users_id;
        return $this;
    }

    public function getStudsId()
    {
        return $this->studs_id;
    }

    public function setStudsId($studs_id)
    {
        $this->studs_id = $studs_id;
        return $this;
    }

    public function getOrdenId()
    {
        return $this->orden_id;
    }

    public function setOrdenId($orden_id)
    {
        $this->orden_id = $orden_id;
        return $this;
    }

    public function getCantidad()
    {
        return $this->cantidad;
    }

    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;
        return $this;
    }
}