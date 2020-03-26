<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Te7aHoudini\LaravelTrix\Traits\HasTrixRichText;


class News extends Model {
    use HasTrixRichText;

    protected $fillable = [
        'news_id', 'news_author', 'news_title', 'news_content', 'news_date'
    ];
     protected $guarded = [];

}
