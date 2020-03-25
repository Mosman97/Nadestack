<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class News extends Model {

    protected $fillable = [
        'news_id', 'news_author', 'news_title', 'news_content', 'news_date'
    ];

}
