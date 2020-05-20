<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class forum_categorie extends Model
{
    protected $fillable = [
        'forum_categorie_id',
        'forum_categorie_title',
        'forum_categorie_icon',
        'forum_categorie_text',
    ];
    protected $guarded = [];
}
