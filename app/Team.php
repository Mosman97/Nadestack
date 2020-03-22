<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model {

    protected $fillable = [
        'team_id',
        'team_logo',
        'team_name',
        'team_password',
        'team_tag',
        'team_admin_id',
        'team_desc',
        'team_captain_1_id',
        'team_captain_2_id',
        'team_manger_id',
        'team_website',
        'twitter_url',
        'twitch_url',
        'instagram_url',
        'youtube_url',
        'faceit_url'
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
