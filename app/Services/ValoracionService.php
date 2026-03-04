<?php
namespace App\Services;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use App\Models\Valoracion;

class ValoracionService {

   public function getAll (): LengthAwarePaginator {
      $query = Valoracion::latest();

      return $query;
   }

   public function find (int $id): Valoracion {
      return Valoracion::findOrFail($id);
   }

   public function create (array $data): Valoracion {
      return Valoracion::create($data);
   }

   public function delete (int $id):bool {
      return Valoracion::where('id', $id)->delete();
   }
}
