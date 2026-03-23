<?php
namespace App\Services;

use App\Models\Libro;

class LibroService {

   public function getAll (?string $search = null, string $orderBy = 'created_at', string $direction = 'desc', ?string $genre = null) {
      if ($orderBy === 'valoraciones') {
         // Cuando ordenamos por n de valoraciones,
         // este metodo crea una tabla valoraciones_count en cada libro
         // para ordenar por esa tabla
         $query = Libro::withCount('valoraciones');

         // Lógica de la busqueda
         if ($search) {
               $query->where(function ($q) use ($search) {
                  $q->where('title', 'like', "%{$search}%")
                     ->orWhere('author', 'like', "%{$search}%");
               });
         }

         if ($genre) {
            $query->where('genre', $genre);
         }

         $query->orderBy('valoraciones_count', $direction);
      } else {
         $query = Libro::latest();

         // Lógica de la busqueda
         if ($search) {
               $query->where(function ($q) use ($search) {
                  $q->where('title', 'like', "%{$search}%")
                     ->orWhere('author', 'like', "%{$search}%");
               });
         }

         if ($genre) {
            $query->where('genre', $genre);
         }

         // Este método elimina el orden de latest() y aplica
         // el especificado en sus parámetros
         $query->reorder($orderBy, $direction);
      }

      return $query->get();
   }

   public function getGenres(): array {
      return Libro::distinct()->orderBy('genre')->pluck('genre')->toArray();
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
