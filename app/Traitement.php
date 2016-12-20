<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Traitement extends Model
{
  protected $table="traitements";
  protected $fillable=[
    'description',
    'duree',
    'user_id',
    'ticket_id'
  ];
}
