<?php
namespace App\Services;

use App\Models\Libro;

class LibroService {

   public function getAll (?string $search = null) {
      $query = Libro::latest();

      // Si hay una busqueda aplica el filtro
      if ($search) {
         $query->where ( function ($q) use ($search) {
            // Busqueda por título y autor
            $q->where('title', 'like', "%{$search}%")
            ->orWhere('author', 'like', "%{$search}%");
         });
      }

      return $query->get();
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
