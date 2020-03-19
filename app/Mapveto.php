<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mapveto extends Model {

    protected $fillable = [
        'vetolog_id', 'team_1_ban_1', 'team_2_ban_1', 'team_1_ban_2', 'team_2_ban_2', 'team_1_pick', 'team_2_pick', 'decider_map','status_counter'
    ];

}
