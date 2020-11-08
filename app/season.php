<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    protected $fillable = [
        'id',
        'name',
        'season_start',
        'season_end',
        'registered_teams',
        'registered_players',
        'is_active',
        'team_limit',
        'reg_end',
        'reg_start'
    ];
    protected $guarded = [];
}
