<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class forum_category extends Model
{
    protected $fillable = [
        'forum_category_id',
        'forum_category_title',
        'forum_category_icon',
        'forum_category_text',
    ];
    protected $guarded = [];
}
