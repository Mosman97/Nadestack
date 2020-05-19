<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class forum_thread extends Model
{
    protected $fillable = [
        'forum_threads_id',
        'forum_threads_title',
        'forum_categories_id',
        'is_closed',
    ];
    protected $guarded = [];
}
