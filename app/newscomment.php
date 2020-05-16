<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class newscomment extends Model
{
    protected $fillable = [
        'newscomment_id',
        'news_id',
        'user_id',
        'comment',
        'newscomment_date',
    ];
    protected $guarded = [];
}
