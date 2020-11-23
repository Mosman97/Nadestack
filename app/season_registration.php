<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Season_registration extends Model
{
    protected $fillable = [
        'id',
        'season_id',
        'team_id',
        'reg_date',
        'day'
    ];
    protected $guarded = [];
}
