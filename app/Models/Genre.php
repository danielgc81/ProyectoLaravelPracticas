<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
   protected $fillable = [
      'name',
      'image',
      'description',
      'visible'
   ];

   public function libros() {
      return $this->hasMany(Libro::class);
   }
}
