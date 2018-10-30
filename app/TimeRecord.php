<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TimeRecord extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'date', 'timezone','user_id','category_ids'
    ];

    protected $hidden = [
        'created_at', 'updated_at', 'deleted_at',
    ];
}
