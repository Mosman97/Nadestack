<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class report extends Model
{
    protected $fillable = [
        'report_id',
        'user_id',
        'forum_post_id',
        'news_id',
        'report_message',
    ];
    protected $guarded = [];
}
