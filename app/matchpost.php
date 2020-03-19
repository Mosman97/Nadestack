<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * This Model represents a Matchpost
 */

class matchpost extends Model
{
    
    protected $fillable = ['match_id','user_id','comment'];
}
