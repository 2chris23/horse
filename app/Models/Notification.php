<?php

namespace App\Models;

use App\Http\Controllers\Functions;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $table = 'notifications';
    protected $perPage = 25;
    public $incrementing = true;

    protected $casts = [
        'visto' => 'bool',
        'users_id' => 'int',
        'stud_id' => 'int',
        'horse_id' => 'int',
        'nivel' => 'int',
        'tipo' => 'int'
    ];
    protected $fillable = [
        'visto',
        'asunto',
        'correo',
        'numero',
        'other',
        'mensaje',
        'users_id',
        'stud_id',
        'horse_id',
        'nivel',
        'tipo'
    ];

    public function MarcarVisto()
    {
        $this->visto = 1;
        return $this;
    }
    /**
     * @return mixed
     */
    public function getOther()
    {
        return $this->other;
    }

    /**
     * @param mixed $other
     * @return Notification
     */
    public function setOther($other)
    {
        $this->other = $other;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAsunto()
    {
        return $this->asunto;
    }

    /**
     * @param mixed $asunto
     * @return Notification
     */
    public function setAsunto($asunto)
    {
        $this->asunto = $asunto;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCorreo()
    {
        return $this->correo;
    }

    /**
     * @param mixed $correo
     * @return Notification
     */
    public function setCorreo($correo)
    {
        $this->correo = $correo;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * @param mixed $numero
     * @return Notification
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMensaje()
    {
        return $this->mensaje;
    }

    /**
     * @param mixed $mensaje
     * @return Notification
     */
    public function setMensaje($mensaje)
    {
        $this->mensaje = Functions::LimpiarTexto($mensaje);
        return $this;
    }

    /**
     * @return mixed
     */
    public function getStudId()
    {
        return $this->stud_id;
    }

    /**
     * @param mixed $stud_id
     * @return Notification
     */
    public function setStudId($stud_id)
    {
        $this->stud_id = $stud_id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNivel()
    {
        return $this->nivel;
    }

    /**
     * @param mixed $nivel
     * @return Notification
     */
    public function setNivel($nivel)
    {
        $this->nivel = $nivel;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getVisto()
    {
        return $this->visto;
    }

    /**
     * @param mixed $visto
     * @return Notification
     */
    public function setVisto($visto)
    {
        $this->visto = $visto;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUsersId()
    {
        return $this->users_id;
    }

    /**
     * @param mixed $users_id
     * @return Notification
     */
    public function setUsersId($users_id)
    {
        $this->users_id = $users_id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getHorseId()
    {
        return $this->horse_id;
    }

    /**
     * @param mixed $horse_id
     * @return Notification
     */
    public function setHorseId($horse_id)
    {
        $this->horse_id = $horse_id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * @param mixed $tipo
     * @return Notification
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
        return $this;
    }
//$table->integer('nivel')->default(0)->comment('Nivel de la notificacion. 0 neutral, 1 aviso, 2 advertencia, 3 peligro');
//$table->integer('tipo')->default(0)->comment('Tipo de notificacion 1 contacto, 2 caballo, ');
    public function setAlertNeutral()
    {
        $this->nivel = 0;
        return $this;
    }

    public function setAlertAdvice()
    {
        $this->nivel = 1;
        return $this;
    }

    public function setAlertWarning()
    {
        $this->nivel = 2;
        return $this;
    }

    public function setAlertDagner()
    {
        $this->nivel = 3;
        return $this;
    }

    public function setTypeContact()
    {
        $this->tipo = 1;
        return $this;
    }

    public function setTypeHorse()
    {
        $this->tipo = 2;
        return $this;
    }

    public function scopeNotificacionesUsuario($query, $user_id)
    {
        return $query->where('users_id', $user_id);
    }

    public function scopeNotificacionesYeguada($query, $stud_id)
    {
        return $query->where('stud_id', $stud_id);
    }

    public function scopeNotificacionesCaballo($query, $horse_id)
    {
        return $query->where(['horse_id'=> $horse_id,'tipo'=>2]);
    }

    public function scopeNotificacionesUsuarioNew($query, $user_id)
    {
        return $query->where(['users_id' => $user_id, 'visto' => 0]);
    }

    public function scopeNotificacionesYeguadaNew($query, $stud_id)
    {
        return $query->where(['stud_id' => $stud_id, 'visto' => 0]);
    }

    public function scopeNotificacionesCaballoNew($query, $horse_id)
    {
        return $query->where(['horse_id' => $horse_id, 'visto' => 0,'tipo'=>2]);
    }
    public function setNotificacionDeCaballo($horse_id,$email,$numero,$mensaje){
        $h = Horse::find($horse_id);
        $this->horse_id = $horse_id;
        $this->tipo = 2;
        $this->users_id = $h->getUsersId();
        $this->nivel = 1;
        $this->visto = 0;
        $this->asunto =$h->getName();
        $this->correo = Functions::LimpiarCorreo($email);
        $this->numero=Functions::LimpiarTexto($numero);
        $this->mensaje = Functions::LimpiarTexto($mensaje);

        return $this;

    }

    public function users()
    {
        return $this->belongsTo(User::class,'users_id','id');
    }
    public function horse()
    {
        return $this->belongsTo(Horse::class,'horse_id','id');
    }
    public function stud()
    {
        return $this->belongsTo(Stud::class,'stud_id','id');
    }

//$noti = App\Model\Notification::NotificacionesUsuarioNew(\Auth::user()->id)->orderby('id', 'desc')->where('visto','0')->get()->take(6);
    public function scopeObtenerNuevasNotificaciones($query, User $user, $num = 6)
    {
        //'users_id',
        //'stud_id',
        //return $query->where(['users_id' => $user_id, 'visto' => 0]);

        $adm = $user->isAdm();
        $stud = null;
        if ($adm != true) {
            $stud = Stud::where('users_id', $user->id)->first();
        }
        if (empty($stud)) {
            return null;
        }
        if ($num == 0) {
            return $query->where(['users_id' => $user->id, 'visto' => 0,]);
        }


        return $query->where(['users_id' => $user->id, 'visto' => 0,])->take($num);

    }

    public function scopeObtenerNotificaciones($query, User $user)
    {
        //'users_id',
        //'stud_id',
        //return $query->where(['users_id' => $user_id, 'visto' => 0]);

        $adm = $user->isAdm();
        $stud = null;
        if ($adm != true) {
            $stud = Stud::where('users_id', $user->id)->first();
        }
        if (empty($stud)) {
            return null;
        }


        return $query->where(['users_id' => $user->id, 'visto' => 0]);

    }

    public function ObtenerImgenNoti()
    {
        $f = null;
        if ($this->tipo == 2) {
            $horse = $this->horse()->first();
            if (!empty($horse)) {
                $fa = $horse->getPhotoFirstModel();
                if (!empty($fa)) {
                    $f = $fa->getUrl();
                }
            }
        } elseif ($this->tipo == 1) {
            $stud = Stud::find($this->stud_id);
            if (!empty($stud)) {
                $f = $stud->getFavUrl();
            }

        }
        return $f;
    }

}
