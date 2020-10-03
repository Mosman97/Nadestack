<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin_log extends Model
{
    protected $fillable = [
        'id',
        'query',
        'user_id',
    ];
    protected $guarded = [];
}
