<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\FileController;

class Marcaagua extends Model
{
    protected $table = 'marcaagua';
    protected $perPage = 25;

    protected $fillable = [
        'foto',
        'fotourl',
        'stud_id',
        'created_by',
        'updated_by',
        'status',
    ];

    protected $casts = [
        'stud_id' => 'int',
        'created_by' => 'int',
        'updated_by' => 'int',
        'status' => 'int'
    ];

    protected static function boot()
    {
        parent::boot();
        static::created(function ($model) {
            $d = Photo::find($model->id);
        });
        static::saving(function ($model) {
        });
        static::deleting(function ($model) {
            $borrado = new FileController();
            $nombre = $model->name;
            $f = null;
            $f = "uploads" . DS . 'waters5599' . DS . $nombre;
            if (!empty($f)) {
                \Log::critical('Borrando marca de agua' . $model->foto . "  y url " . $model->fotourl . " ubicado en $f de yeguada " . $model->stud_id);
                $borrado->Borrar_File(public_path($f));
            }
        });
    }

    public function getFoto()
    {
        return $this->foto;
    }

    public function setFoto($foto)
    {
        $this->foto = $foto;
        return $this;
    }

    public function getFotourl()
    {
        return $this->fotourl;
    }

    public function setFotourl($fotourl)
    {
        $this->fotourl = $fotourl;
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

    public function getStudId()
    {
        return $this->stud_id;
    }

    public function setStudId($stud_id)
    {
        $this->stud_id = $stud_id;
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

    public function getUpdatedBy()
    {
        return $this->updated_by;
    }

    public function setUpdatedBy($updated_by)
    {
        $this->updated_by = $updated_by;
        return $this;
    }

    public function Stud()
    {
        return $this->belongsTo(Stud::class, 'stud_id', 'id');
    }

    public function Borrar()
    {
        $borrado = new FileController();
        $f = "uploads" . DS . $this->Folder() . DS . $this->foto;
        if (!empty($f)) {
            $borrado->Borrar_File(public_path($f));
            $this->delete();
        }
    }

    public function Folder()
    {
        return 'waters5599';
    }

    public function getAbsoluteFile()
    {
        return public_path() . DS . 'uploads' . DS . $this->Folder() . DS . $this->foto;
    }
}