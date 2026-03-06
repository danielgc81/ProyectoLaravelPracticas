<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Valoracion extends Model
{
   protected $fillable = [
      'libro_id',
      'user_id',
      'comentario',
      'estrellas'
   ];

   public function user () {
      return $this->belongsTo(User::class);
   }
}
