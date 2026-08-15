<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;
use App\Http\Controllers\Functions;
use App\Models\User;

class ControlAsociado extends Eloquent
{
    protected $table = 'control_asociado';

    protected $casts = [
        'user_id' => 'int'
    ];

    protected $fillable = [
        'Paises',
        'codigo',
        'opciones',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getPaises()
    {
        return json_decode($this->Paises);
    }

    public function setPaises($Paises = [])
    {
        $this->Paises = json_encode($Paises);
        return $this;
    }

    public function getCodigo()
    {
        return $this->codigo;
    }

    public function setCodigo($codigo = null)
    {
        if (empty($codigo)) {
            $codigo = (new Functions())->generateRandomString(10);
        }
        $this->codigo = $codigo;
        return $this;
    }

    public function getOpciones()
    {
        return json_decode($this->opciones);
    }

    public function setOpciones($opciones = [])
    {
        $this->opciones = json_encode($opciones);
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

    public function getUser()
    {
        return User::find($this->user_id);
    }

    public function setUser(User $user = null)
    {
        if (empty($user)) {
            return $this;
        }
        $this->user_id = $user->id;
        return $this;
    }

    public function scopeBuscarAsociado($query, User $user)
    {
        return $query->where('user_id', $user->id);
    }
}
