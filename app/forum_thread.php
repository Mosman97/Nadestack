<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class forum_thread extends Model
{
    protected $fillable = [
        'forum_thread_id',
        'forum_thread_title',
        'user_id',
        'forum_category_id',
        'is_closed',
    ];
    protected $guarded = [];
}
