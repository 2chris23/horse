<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tokensocial extends Model
{
    protected $table = 'tokensocial';
    protected $perPage = 25;

    protected $fillable = [
        'token_social',
        'social_id',
        'email',
        'json',
        'user_data',
        'expire',
        'red',
        'type',
        'user_id',
        'studs_id',
        'token_page',
        'data_page',
    ];

    protected $casts = [
        'type' => 'int'
    ];

    public function getExpire()
    {
        return $this->expire;
    }

    public function setExpire($expire)
    {
        $this->expire = $expire;
        return $this;
    }

    public function getTokenSocial()
    {
        return $this->token_social;
    }

    public function setTokenSocial($token_social)
    {
        $this->token_social = $token_social;
        return $this;
    }

    public function getSocialId()
    {
        return $this->social_id;
    }

    public function setSocialId($social_id)
    {
        $this->social_id = $social_id;
        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    public function getJson()
    {
        return $this->json;
    }

    public function getJsonArray()
    {
        return json_decode($this->json);
    }

    public function setJson($json)
    {
        if (is_array($json)) {
            $json = json_encode($json);
        }
        $this->json = $json;
        return $this;
    }

    public function getRed()
    {
        return $this->red;
    }

    public function setRed($red)
    {
        $this->red = $red;
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

    public function getUserId()
    {
        return $this->user_id;
    }

    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
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

    public function setFacebookType()
    {
        $this->type = 1;
        return $this;
    }

    public function Stud()
    {
        if (empty($this->studs_id)) return null;
        return Stud::find($this->studs_id);
    }

    public function User()
    {
        if (empty($this->studs_id)) return null;
        return User::find($this->user_id);
    }

    public function scopeFacebookUser($query, $user_id)
    {
        return $query->where('user_id', $user_id);
    }

    public function scopeFacebookStud($query, $stud_id)
    {
        return $query->where('studs_id', $stud_id);
    }

    public function getUserData()
    {
        return json_decode($this->user_data);
    }

    public function setUserData($data = [])
    {
        $this->user_data = json_encode($data);
        return $this;
    }

    public function getTokenPage()
    {
        return ($this->token_page);
    }

    public function getDataPage()
    {
        return json_decode($this->data_page);
    }

    public function setDataPage($data_page = [])
    {
        if (count($data_page) != 0) {
            $this->setTokenPage($data_page->access_token);
        }
        $this->data_page = json_encode($data_page);

        return $this;
    }

    public function setTokenPage($token_page)
    {
        $this->token_page = ($token_page);
        return $this;
    }
}