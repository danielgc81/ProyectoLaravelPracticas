<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
   protected $fillable = [
      'title',
      'author',
      'editorial',
      'year',
      'genre',
      'ISBN',
      'image',
   ];

   public const PAGINATE = 20;

   public function valoraciones() {
      return $this->hasMany(Valoracion::class);
   }
}
