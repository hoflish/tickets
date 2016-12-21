<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $table="tickets";
    protected $fillable=[
      'message',
      'user_id',
      'priorite_id'
    ];

    public function priorite(){
      return $this->belongsTo(\App\Priorite::class);
    }
    public function user(){
      return $this->belongsTo(\App\User::class);
    }
}
