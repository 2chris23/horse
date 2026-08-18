<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\Functions;

class Video extends Model
{
    protected $table = 'videos';

    protected $fillable = [
        'name', 'type', 'tableid', 'url', 'desription', 'orden',
        'publish', 'created_by', 'updated_by', 'deleted_by'
    ];

    public function horse()
    {
        return $this->belongsTo(Horse::class, 'tableid')->where('type', 4);
    }

    public function stud()
    {
        return $this->belongsTo(Stud::class, 'tableid')->where('type', 3);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'tableid')->where('type', 0);
    }

    public function getOrden()
    {
        return $this->orden;
    }

    public function setOrden($orden)
    {
        $this->orden = $orden;
        return $this;
    }

    public function getName()
    {
        $s = Functions::LimpiarTexto($this->name);
        return $s;
    }

    public function setName($name = null)
    {
        $this->name = $name;
        return $this;
    }

    public function getDesription()
    {
        return $this->desription;
    }

    public function setDesription($desription)
    {
        $this->desription = $desription;
        return $this;
    }

    public function getCreatedBy()
    {
        return $this->created_by;
    }

    public function setCreatedBy($created_by)
    {
        $this->created_by = $created_by;
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

    public function getTableid()
    {
        return $this->tableid;
    }

    public function setTableid($tableid)
    {
        $this->tableid = $tableid;
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

    public function getPublish()
    {
        return $this->publish;
    }

    public function setPublish($publish)
    {
        $this->publish = $publish;
        return $this;
    }

    public function getUpdatedBy()
    {
        return $this->updated_by;
    }

    public function setUpdatedBy($updated_by)
    {
        $this->updated_by = $updated_by;
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

    public function setVideoYoutube($url)
    {
        if (strpos($url, "v=") !== false) {
            $url = substr($url, strpos($url, "v=") + 2, 11);
        } elseif (strpos($url, "embed/") !== false) {
            $url = substr($url, strpos($url, "embed/") + 6, 11);
        }
        $this->url = $url;
        return $this;
    }

    public function getVideoYoutube()
    {
        $video = (string)$this->url;
        if (strpos($video, "youtube") !== false || strpos($video, "youtu") !== false) {
            $this->setVideoYoutube($video);
        }
        return $this->url;
    }

    public function getEmbedVideoYoutube()
    {
        $video = $this->getVideoYoutube();
        if (empty($video)) return null;
        return "//www.youtube.com/embed/$video";
    }

    public function getNormalVideoYoutube()
    {
        $video = $this->getVideoYoutube();
        return "//www.youtube.com/watch?v=$video";
    }

    public function getYoutubeThumb()
    {
        $vid = $this->getVideoYoutube();
        return "https://i1.ytimg.com/vi/" . $vid . "/hqdefault.jpg";
    }

    public function getNameYoutubeVideo()
    {
        ini_set('max_execution_time', 600);
        $url = "http://www.youtube.com/watch?v=" . $this->url;

        $doc = new \DOMDocument();
        $doc->preserveWhiteSpace = FALSE;
        try {
            $doc->loadHTMLFile($url);
            $title_div = $doc->getElementById('eow-title');
            $title = \App\Http\Controllers\Functions::LimpiarTexto($title_div->nodeValue);
        } catch (\ErrorException $e) {
            $title = '';
        }

        return $title;
    }

    public function scopeNormal($query, $stud_id)
    {
        return $query->where(['tableid' => $stud_id, 'type' => 3])->orderBy('orden');
    }

    public function scopeNormalBuscarVid($query, $stud_id, $vid_url)
    {
        return $query->where(['tableid' => $stud_id, 'type' => 3, 'url' => $vid_url])->orderBy('orden');
    }

    public function scopeNormalBuscarVidHorse($query, $stud_id, $vid_url)
    {
        return $query->where(['tableid' => $stud_id, 'type' => 4, 'url' => $vid_url])->orderBy('orden');
    }
}
