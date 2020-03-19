<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model {

    protected $fillable = [
        'team_logo', 'team_name', 'team_password', 'team_member', 'team_tag', 'team_admin_userid', 'team_desc', 'team_socials'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hildden = [
        'team_password',
    ];

}
