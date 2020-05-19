<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class forum_categorie extends Model
{
    protected $fillable = [
        'forum_categories_id',
        'forum_categories_title',
    ];
    protected $guarded = [];
}
