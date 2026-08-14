<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Observador\Updater;

class Sex extends Model
{
    use SoftDeletes, Updater;

    protected $table = 'sex';
    
    protected $perPage = 25;

    protected $fillable = [
        'name',
        'description',
        'created_by',
        'updated_by',
        'deleted_by'
    ];

    protected $casts = [
        'created_by' => 'integer',
        'updated_by' => 'integer',
        'deleted_by' => 'integer',
    ];
}
