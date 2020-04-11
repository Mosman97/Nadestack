<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
  protected $fillable = [
      'ticket_id',
      'creator_id',
      'content',
      'updated_at',
      'created_at'
  ];
}
