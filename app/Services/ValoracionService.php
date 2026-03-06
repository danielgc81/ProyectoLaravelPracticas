<?php
namespace App\Services;

use App\Models\Valoracion;

class ValoracionService {
   public function create (array $data): Valoracion {
      return Valoracion::create($data);
   }
}
