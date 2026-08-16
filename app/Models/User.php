<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Http\Controllers\Functions;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes;

    protected $table = 'users';
    protected $perPage = 10;

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'type' => 'int',
        'created_by' => 'int',
        'updated_by' => 'int',
        'deleted_by' => 'int',
    ];

    protected $fillable = [
        'name',
        'email',
        'firstt',
        'password',
        'type',
        'created_by',
        'updated_by',
        'deleted_by',
        'remember_token',
        'domain',
        'validado',
        'studs_id',
        'active',
        'subcritiondate',
        'phone',
        'ext',
        'country_code',
    ];

    protected static function boot(): void
    {
        parent::boot();

        static::creating(function (self $model) {
            $model->active = $model->active ?: 0;
            $model->validado = $model->validado ?: 0;
            $model->type = $model->type ?: 1;
        });

        static::saving(function (self $model) {
            $model->active = $model->active ?: 0;
            $model->validado = $model->validado ?: 0;
        });
    }

    public function stud()
    {
        return $this->belongsTo(Stud::class, 'studs_id');
    }

    public function studs()
    {
        return $this->hasMany(Stud::class, 'users_id');
    }

    public function personalInfo()
    {
        return $this->hasOne(Personal::class, 'users_id');
    }

    public function horses()
    {
        return $this->hasMany(Horse::class, 'users_id');
    }

    public function photos()
    {
        return $this->hasMany(Photo::class, 'tableid')->where('type', 1);
    }

    public function videos()
    {
        return $this->hasMany(Video::class, 'tableid')->where('type', 0);
    }

    // ── Helper Methods ───────────────────────────────────────────

    public function Personal()
    {
        $p = Personal::where('users_id', $this->id)->first();
        if (empty($p) && !empty($this->email)) {
            $p = Personal::where('email', $this->email)->first();
        }
        return $p ?? new Personal();
    }


    public function Yeguada()
    {
        $d = Stud::where('users_id', $this->id)->first();
        if (empty($d) && !empty($this->studs_id)) {
            $d = Stud::find($this->studs_id);
        }
        return $d ?? new Stud();
    }

    public function hasYeguada(): bool
    {
        return Stud::where('users_id', $this->id)->exists();
    }

    public function isAdm(): bool
    {
        return (int)$this->type === 0;
    }

    public function getType(): int
    {
        return (int)$this->type;
    }

    public function getName()
    {
        return $this->name ?? '';
    }

    public function getNombre()
    {
        return $this->getName();
    }

    public function getAllName()
    {
        return $this->getName();
    }

    public function setName($name)
    {
        $this->name = ucwords(trim((string)$name));
        return $this;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getDominio()
    {
        return str_replace(['_', ' '], '', (string)$this->domain);
    }

    public function getLogo()
    {
        $r = $this->Yeguada();
        return $r ? $r->getLogo() : url('img/admin.jpg');
    }

    public function CaballosPublicadosPorRaza($raza = null)
    {
        if (empty($raza)) {
            return Horse::where(['tosold' => 1, 'users_id' => $this->id])->get();
        }
        return Horse::where(['tosold' => 1, 'raza' => $raza, 'users_id' => $this->id])->get();
    }

    public function getHorses()
    {
        return Horse::where('users_id', $this->id)->get();
    }

    public function Asociado()
    {
        if ($this->type == 2) {
            return true;
        }
        return false;
    }

    public function ControlAsociado()
    {
        if ($this->Asociado() != true) {
            return null;
        }

        return \App\Models\ControlAsociado::where('user_id', $this->id)->first();
    }

    public function getNotificationsNew()
    {
        return \App\Models\Notification::NotificacionesUsuarioNew($this->id)->orderby('id', 'desc')->get();
    }

    public function getUrlAdminLogo()
    {
        // TODO: Port Photo model and proper relation
        return asset('images/default-avatar.png');
    }

    public function getNotifications()
    {
        return \App\Models\Notification::NotificacionesUsuario($this->id)->orderby('id', 'desc')->get();
    }
}
