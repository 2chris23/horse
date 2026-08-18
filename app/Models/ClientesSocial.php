<?php

namespace App\Models;

use App\Http\Controllers\Functions;
use Illuminate\Database\Eloquent\Model;

class ClientesSocial extends Model
{
    protected $table = 'clientes_socials';
    protected $perPage = 25;
    protected $guarded = [];

    protected $casts = [
        'type' => 'int',
        'cliente_id' => 'int',
    ];

    protected $fillable = [
        'url',
        'type',
        'cliente_id',
    ];

    public function getClienteId()
    {
        return $this->cliente_id;
    }

    public function setClienteId($cliente_id)
    {
        $this->cliente_id = $cliente_id;
        return $this;
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function setUrl($url)
    {
        $this->url = $url;
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

    public function setTwitter($url)
    {
        $this->type = 1;
        $f = 'twitter';
        $d = filter_var($url, FILTER_SANITIZE_URL);
        if (Functions::BuscarEnString($d, $f) == true) {
            if ($this->UrlExist($d) == true) $this->setUrl($d)->push();
        }
        return $this;
    }

    public function setPinterest($url)
    {
        $this->type = 3;
        $f = 'pinterest';
        $d = filter_var($url, FILTER_SANITIZE_URL);
        if (Functions::BuscarEnString($d, $f) == true) {
            if ($this->UrlExist($d) == true) $this->setUrl($d)->push();
        }
        return $this;
    }

    public function setFacebook($url)
    {
        $this->type = 2;
        $f = 'facebook';
        $d = filter_var($url, FILTER_SANITIZE_URL);
        if (Functions::BuscarEnString($d, $f) == true) {
            if ($this->UrlExist($d) == true) $this->setUrl($d)->push();
        }
        return $this;
    }

    public function setGoogle($url)
    {
        $this->type = 4;
        $f = 'google';
        $d = filter_var($url, FILTER_SANITIZE_URL);
        if (Functions::BuscarEnString($d, $f) == true) {
            if ($this->UrlExist($d) == true) $this->setUrl($d)->push();
        }
        return $this;
    }

    public function setInstagram($url)
    {
        $this->type = 5;
        $f = 'instagram';
        $d = filter_var($url, FILTER_SANITIZE_URL);
        if (Functions::BuscarEnString($d, $f) == true) {
            if ($this->UrlExist($d) == true) $this->setUrl($d)->push();
        }
        return $this;
    }

    public function setYoutube($url)
    {
        $this->type = 6;
        $f = 'youtube';
        $d = filter_var($url, FILTER_SANITIZE_URL);
        if (Functions::BuscarEnString($d, $f) == true) {
            if ($this->UrlExist($d) == true) $this->setUrl($d)->push();
        }
        return $this;
    }

    public function getTwitter()
    {
        return ($this->type == 1) ? $this->url : null;
    }

    public function getPinterest()
    {
        return ($this->type == 3) ? $this->url : null;
    }

    public function getFacebook()
    {
        return ($this->type == 2) ? $this->url : null;
    }

    public function getGoogle()
    {
        return ($this->type == 4) ? $this->url : null;
    }

    public function getInstagram()
    {
        return ($this->type == 5) ? $this->url : null;
    }

    public function getYoutube()
    {
        return ($this->type == 6) ? $this->url : null;
    }

    public function scopeTwitter($query, $cliente_id)
    {
        return $query->where(['cliente_id' => $cliente_id, 'type' => 1]);
    }

    public function scopeFacebook($query, $cliente_id)
    {
        return $query->where(['cliente_id' => $cliente_id, 'type' => 2]);
    }

    public function scopePinterest($query, $cliente_id)
    {
        return $query->where(['cliente_id' => $cliente_id, 'type' => 3]);
    }

    public function scopeGoogle($query, $cliente_id)
    {
        return $query->where(['cliente_id' => $cliente_id, 'type' => 4]);
    }

    public function scopeInstagram($query, $cliente_id)
    {
        return $query->where(['cliente_id' => $cliente_id, 'type' => 5]);
    }

    public function scopeYoutube($query, $cliente_id)
    {
        return $query->where(['cliente_id' => $cliente_id, 'type' => 6]);
    }

    public function FacebookCheck($url)
    {
        $fbUrlCheck = '/^(https?:\/\/)?(www\.)?facebook.com\/[a-zA-Z0-9(\.\?)?]/';
        $secondCheck = '/home((\/)?\.[a-zA-Z0-9])?/';
        if (preg_match($fbUrlCheck, $url) == 1 && preg_match($secondCheck, $url) == 0) {
            return true;
        } else {
            return false;
        }
    }

    public function UrlExist($url)
    {
        if (!$fp = curl_init($url)) return false;
        return true;
    }
}
