<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class forum_post extends Model
{
    protected $fillable = [
        'forum_posts_id',
        'forum_threads_id',
        'forum_posts_content',
        'is_deleted',
    ];
    protected $guarded = [];
}
