<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Facebookpost extends Model
{
    use SoftDeletes;

    protected $table = 'facebookpost';
    protected $perPage = 25;

    protected $fillable = [
        'user_post',
        'user_make',
        'studs_id',
        'horses_id',
        'url',
        'message',
        'facebook_id',
        'facebook_page',
        'publish_time',
        'programing_date',
        'type',
        'data',
        'deleted_by',
        'posted',
    ];

    protected $casts = [
        'user_post' => 'int',
        'user_make' => 'int',
        'studs_id' => 'int',
        'horses_id' => 'int',
        'deleted_by' => 'int',
        'publish_time' => 'datetime',
        'programing_date' => 'datetime'
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
        });
        static::saving(function ($model) {
            $pt = $model->publish_time;
            $pd = $model->programing_date;
            $time = 'UTC';
            date_default_timezone_set($time);
            if (!empty($pt)) {
                $t1 = Carbon::parse($pt)->setTimezone($time)->timestamp;
                $model->publish_time = $t1;
            }
            if (!empty($pd)) {
                $t1 = Carbon::parse($pd)->setTimezone($time)->timestamp;
                $model->programing_date = $t1;
            }
            date_default_timezone_set(\Session::get('timezone'));
        });
        static::deleting(function ($model) {
        });
    }

    public function getHorse()
    {
        return Horse::find($this->horses_id);
    }

    public function setHorse(Horse $horse)
    {
        $this->horses_id = $horse->id;
        return $this;
    }

    public function getHorsesId()
    {
        return $this->horses_id;
    }

    public function setHorsesId($horses_id)
    {
        $this->horses_id = $horses_id;
        return $this;
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function setMessage($message = null)
    {
        $this->message = $message;
        return $this;
    }

    public function getFacebookId()
    {
        return $this->facebook_id;
    }

    public function setFacebookId($facebook_id)
    {
        $this->facebook_id = $facebook_id;
        return $this;
    }

    public function getFacebookPage()
    {
        return $this->facebook_page;
    }

    public function setFacebookPage($facebook_page)
    {
        $this->facebook_page = $facebook_page;
        return $this;
    }

    public function getDeletedBy()
    {
        return $this->deleted_by;
    }

    public function setDeletedBy($deleted_by)
    {
        $this->deleted_by = $deleted_by;
        return $this;
    }

    public function getUserPost()
    {
        return $this->user_post;
    }

    public function setUserPost($user_post = 0)
    {
        $this->user_post = $user_post;
        return $this;
    }

    public function getUserMake()
    {
        return $this->user_make;
    }

    public function setUserMake($user_make)
    {
        $this->user_make = $user_make;
        return $this;
    }

    public function setUserMakeModel(User $user)
    {
        $this->user_make = $user->id;
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

    public function getStud()
    {
        return Stud::find($this->studs_id);
    }

    public function setStud(Stud $studs_id)
    {
        $this->studs_id = $studs_id->id;
        return $this;
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function setUrl($id = null)
    {
        $t = explode('_', $id);
        if (isset($t[0]) and isset($t[1])) {
            $this->url = "https://www.facebook.com/" . $t[0] . "/posts/" . $t[1];
        }
        return $this;
    }

    public function getPublishTime()
    {
        $f = $this->publish_time;

        $time = \Session::get('timezone');
        $time = !empty($time) ? $time : \Config::get('app.timezone');

        if (empty($f)) {
            $f = Carbon::now()->setTimezone($time)->timestamp;
        } else {
            $f = Carbon::createFromTimestamp($f)->setTimezone($time)->timestamp;
        }
        return $f;
    }

    public function setPublishTime($publish_time)
    {
        if (empty($publish_time)) $publish_time = Carbon::now();
        $fa = \Session::get('timezone');

        if (!empty($fa)) {
            $date = Carbon::parse($publish_time, $fa)->setTimezone('UTC');
            $fa = \Config::get('app.timezone');
            $date = Carbon::parse($date, 'UTC')->setTimezone($fa);
        } else {
            $fa = \Config::get('app.timezone');
            $date = Carbon::parse($publish_time, 'UTC')->setTimezone($fa);
        }

        $this->publish_time = $date;
        return $this;
    }

    public function getProgramingDate()
    {
        $f = $this->programing_date;
        $time = \Session::get('timezone');
        $time = !empty($time) ? $time : \Config::get('app.timezone');
        return Carbon::createFromTimestamp($f)->setTimezone($time)->timestamp;
    }

    public function setProgramingDate($programing_date)
    {
        $this->programing_date = $programing_date;
        return $this;
    }

    public function getPublishTime2()
    {
        $f = $this->publish_time;
        $time = \Session::get('timezone');
        $time = !empty($time) ? $time : \Config::get('app.timezone');
        if (is_object($f)) {
            $f->setTimezone('UTC')->setTimezone($time);
        } else {
            if (empty($f)) {
                $f = Carbon::now();
            } else {
                $f = Carbon::createFromTimestamp($f);
            }
            $f->setTimezone('UTC')->setTimezone($time);
        }

        return $f;
    }

    public function getProgramingDate2()
    {
        $f = $this->programing_date;
        $time = \Session::get('timezone');
        $time = !empty($time) ? $time : \Config::get('app.timezone');
        if (is_object($f)) {
            $f->setTimezone('UTC')->setTimezone($time);
        } else {
            if (empty($f)) {
                $f = Carbon::now()->setTimezone($time);
            } else {
                $f = Carbon::createFromTimestamp($f)->setTimezone($time)->getTimestamp();
            }
            $f->setTimezone('UTC')->setTimezone($time);
        }

        return $f;
    }

    public function Yeguada()
    {
        return $this->hasOne(User::class, 'id', 'studs_id');
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

    public function getData()
    {
        return json_decode($this->data);
    }

    public function setData($data = [])
    {
        $this->data = json_encode($data);
        return $this;
    }

    public function getOp()
    {
        return json_decode($this->op);
    }

    public function setOp($op = [])
    {
        $this->op = json_encode($op);
        return $this;
    }

    public function getPosted()
    {
        return $this->posted;
    }

    public function setPosted($posted = 1)
    {
        $this->posted = $posted;
        return $this;
    }
}