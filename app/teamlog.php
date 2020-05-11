<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class teamlog extends Model {

    protected $fillable = [
        'action_id',
        'acttion_parent_id',
        'user_id',
        'team_id',
        'action',
        'logtext'
    ];

}
