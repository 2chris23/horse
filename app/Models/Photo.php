<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $table = 'photos';

    protected $fillable = [
        'name', 'type', 'tableid', 'url', 'description', 'titulo1',
        'titulo2', 'order', 'publish', 'size', 'created_by',
        'updated_by', 'deleted_by', 'marcado'
    ];

    public function horse()
    {
        return $this->belongsTo(Horse::class, 'tableid')->where('type', 4);
    }

    public function stud()
    {
        return $this->belongsTo(Stud::class, 'tableid')->whereIn('type', [2, 3, 5, 7, 8]);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'tableid')->whereIn('type', [1, 10]);
    }

    public function getUrl()
    {
        $d = $this->url;
        if (empty($d)) {
            if (!empty($this->name)) {
                $f = $this->getFolder();
                return url($f . $this->name);
            }
            return url('portal_/images/posting/car-4.jpg');
        }
        if (str_starts_with($d, 'http://')) {
            $d = 'https://' . substr($d, 7);
        }
        return $d;
    }

    public function getFolder()
    {
        $t = $this->type;
        $f = '';
        $adm = \Config::get('aplication.adminimage', 'adm');
        if ($t == 2) $f = "uploads/" . \Config::get('aplication.fotoyeguada', 'studs') . "/";
        if ($t == 3) $f = "uploads/" . \Config::get('aplication.fotoyeguada', 'studs') . "/";
        if ($t == 4) $f = "uploads/" . \Config::get('aplication.fotohorse', 'horses') . "/";
        if ($t == 5) $f = "uploads/" . \Config::get('aplication.fotoslider', 'slider') . "/";
        if ($t == 7) $f = "uploads/" . \Config::get('aplication.fotofront', 'front') . "/";
        if ($t == 8) $f = "uploads/" . \Config::get('aplication.facebook', 'facebook') . "/";
        if ($t == 10) $f = "uploads/" . $adm . "/";
        return $f;
    }

    public function setUrl($url)
    {
        $this->url = $url;
        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    public function getTitulo1()
    {
        return $this->titulo1 ?? '';
    }

    public function setTitulo1($titulo1)
    {
        $this->titulo1 = $titulo1;
        return $this;
    }

    public function getTitulo2()
    {
        return $this->titulo2 ?? '';
    }

    public function setTitulo2($titulo2)
    {
        $this->titulo2 = $titulo2;
        return $this;
    }

    public function getOrden()
    {
        return $this->order;
    }

    public function setOrden($order)
    {
        $this->order = $order;
        return $this;
    }

    public function getPublish()
    {
        return $this->publish;
    }

    public function setPublish($publish)
    {
        $this->publish = $publish;
        return $this;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setType($type)
    {
        if ($type === 'stud') $type = 1;
        $this->type = $type;
        return $this;
    }

    public function getTableid()
    {
        return $this->tableid;
    }

    public function setTableid($tableid)
    {
        $this->tableid = $tableid;
        return $this;
    }

    public function getSize()
    {
        return $this->size;
    }

    public function setSize($size)
    {
        $this->size = $size;
        return $this;
    }

    // ── Scopes ─────────────────────────────────────────────────

    public function scopeHorse($query, $horse_id)
    {
        return $query->where(['type' => 4, 'tableid' => $horse_id])->orderBy('order', 'asc');
    }

    public function scopeGallery($query, $stud_id)
    {
        return $query->where(['type' => 2, 'tableid' => $stud_id])->orderBy('order', 'asc');
    }

    public function scopeInstalations($query, $stud_id)
    {
        return $query->where(['type' => 3, 'tableid' => $stud_id])->orderBy('order', 'asc');
    }

    public function scopeSlider($query, $stud_id)
    {
        return $query->where(['type' => 5, 'tableid' => $stud_id])->orderBy('order', 'asc');
    }

    public function scopeFront($query, $stud_id)
    {
        return $query->where(['type' => 7, 'tableid' => $stud_id])->orderBy('order', 'asc');
    }

    public function scopeAdminLogo($query, $admin_id)
    {
        return $query->where(['type' => 10, 'tableid' => $admin_id])->orderBy('order', 'asc');
    }
}
