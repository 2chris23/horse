<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Autopostconf extends Model
{
    protected $table = 'autopostconf';
    protected $perPage = 25;

    protected $fillable = [
        'users_id',
        'studs_id',
        'facebook_id',
        'status',
        'type',
        'horas',
        'timezone',
    ];

    protected $casts = [
        'users_id' => 'int',
        'studs_id' => 'int',
        'facebook_id' => 'int',
        'status' => 'int'
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
        });
        static::saving(function ($model) {
            if (empty($model->timezone)) {
                $model->timezone = \Config::get('app.timezone');
            }
        });
        static::deleting(function ($model) {
        });
    }

    public function getStudsId()
    {
        if (!empty($this->studs_id)) {
            return Stud::find($this->studs_id);
        } else {
            return 0;
        }
    }

    public function setStudsId(Stud $studs_id = null)
    {
        if (!empty($studs_id)) {
            $stud = Stud::find($this->studs_id);
            if (!empty($stud)) {
                $this->users_id = $stud->users_id;
                $this->studs_id = $studs_id->id;
            }
        }

        return $this;
    }

    public function getFacebookId()
    {
        if (!empty($this->facebook_id)) {
            return Tokensocial::find($this->facebook_id);
        } else {
            return 0;
        }
    }

    public function setFacebookId(Tokensocial $facebook_id = null)
    {
        $this->facebook_id = $facebook_id->id;
        return $this;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status = 0)
    {
        $this->status = $status;
        return $this;
    }

    public function getHoras()
    {
        return json_decode($this->horas);
        return explode(',', $this->horas);
    }

    public function setHoras($horas = [])
    {
        $this->horas = json_encode($horas);
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

    public function getTimezone()
    {
        return $this->timezone;
    }

    public function setTimezone($timezone = null)
    {
        if (empty($timezone)) {
            $f = \Session::get('timezone');
            if (empty($f)) {
                $f = \Config::get('app.timezone');
            }
            $timezone = $f;
        }

        $this->timezone = $timezone;
        return $this;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setType($type = 1)
    {
        $this->type = $type;
        return $this;
    }

    public function scopeCaballoDiario($query, Stud $stud = null)
    {
        if (!empty($stud)) {
            $user = $stud->getUserModel()->id;
            return $query->where(['users_id' => $user, 'studs_id' => $stud->id, 'type' => 1]);
        }
        return $query;
    }

    public function scopeCubricionDiario($query, Stud $stud = null)
    {
        if (!empty($stud)) {
            $user = $stud->getUserModel()->id;
            return $query->where(['users_id' => $user, 'studs_id' => $stud->id, 'type' => 2]);
        }
        return $query;
    }

    public function scopeVentasnDiario($query, Stud $stud = null)
    {
        if (!empty($stud)) {
            $user = $stud->getUserModel()->id;
            return $query->where(['users_id' => $user, 'studs_id' => $stud->id, 'type' => 3]);
        }
        return $query;
    }

    public function scopeCaballoDiarioAdmin($query, $users_id)
    {
        return $query->where(['users_id' => $users_id, 'studs_id' => 0, 'type' => 1]);
    }

    public function scopeCubricionDiarioAdmin($query, $users_id)
    {
        return $query->where(['users_id' => $users_id, 'studs_id' => 0, 'type' => 2]);
    }

    public function scopeVentasnDiarioAdmin($query, $users_id)
    {
        return $query->where(['users_id' => $users_id, 'studs_id' => 0, 'type' => 3]);
    }

    public function scopeFotoInstalacionDiarioStid($query, Stud $stud)
    {
        return $query->where(['studs_id' => $stud->id, 'type' => 4]);
    }

    public function scopeVideoInstalacionDiarioStid($query, Stud $stud)
    {
        return $query->where(['studs_id' => $stud->id, 'type' => 5]);
    }

    public function scopeVideoInstalacionDiario($query, Stud $stud = null)
    {
        if (!empty($stud)) {
            $user = $stud->getUserModel()->id;
            return $query->where(['studs_id' => $stud->id, 'type' => 5]);
        }
        return $query;
    }

    public function scopeFotosInstalacionDiario($query, Stud $stud = null)
    {
        if (!empty($stud)) {
            $user = $stud->getUserModel()->id;
            return $query->where(['studs_id' => $stud->id, 'type' => 4]);
        }
        return $query;
    }

    public function getStudModel()
    {
        return Stud::find($this->studs_id);
    }

    public function getUserModel()
    {
        if (!empty($this->users_id)) {
            return User::find($this->users_id);
        } else {
            $fa = $this->studs_id;
            $fe = Stud::find($fa);
            if (!empty($fe)) {
                return User::find($fe->users_id);
            }
        }
        return null;
    }
}