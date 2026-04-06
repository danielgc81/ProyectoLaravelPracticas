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
      'genre_id',
      'ISBN',
      'synopsis',
      'image',
      'user_id',
   ];

   public function valoraciones() {
      return $this->hasMany(Valoracion::class);
   }

   public function user() {
      return $this->belongsTo(User::class);
   }

   public function genre() {
      return $this->belongsTo(Genre::class);
   }
}
