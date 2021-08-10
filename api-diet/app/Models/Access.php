<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Access extends Model
{
    protected $fillable = [
        'level_name'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
