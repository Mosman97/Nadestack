<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ticketresponse extends Model {

    protected $fillable = [
        'ticket_response_id',
        'ticket_id',
        'user_id',
        'content',
        'updated_at',
        'created_at'
    ];

}
