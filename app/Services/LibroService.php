<?php
namespace App\Services;

use App\Models\Libro;

class LibroService {

   public function getAll () {
      $query = Libro::latest()->get();

      return $query;
   }

   public function find (int $id): Libro {
      return Libro::findOrFail($id);
   }

   public function create (array $data): Libro {
      return Libro::create($data);
   }

   public function update (int $id, array $data): bool {
      return Libro::where('id', $id)->update($data);
   }

   public function delete (int $id):bool {
      return Libro::where('id', $id)->delete();
   }
}
