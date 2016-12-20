<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $table="tickets";
    protected $fillable=[
      'message',
      'etat',
      'user_id',
      'priorite_id'
    ];
}
