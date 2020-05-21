<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class forum_post extends Model
{
    protected $fillable = [
        'forum_post_id',
        'forum_thread_id',
        'forum_post_content',
        'is_deleted',
    ];
    protected $guarded = [];
}
