<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class forum_report extends Model
{
    protected $fillable = [
        'forum_report_id',
        'user_id',
        'forum_post_id',
        'forum_report_message',
    ];
    protected $guarded = [];
}
