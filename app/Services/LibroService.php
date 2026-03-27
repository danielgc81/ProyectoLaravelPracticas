<?php
namespace App\Services;

use App\Models\Libro;

class LibroService {

   public function getAll (?string $search = null, string $orderBy = 'created_at', string $direction = 'desc', ?string $genre = null) {
      $query = $orderBy === 'valoraciones' ? Libro::withCount('valoraciones') : Libro::query();

      if ($search) {
         $query->where(function ($q) use ($search) {
            $q->where('title', 'like', "%{$search}%")
               ->orWhere('author', 'like', "%{$search}%");
         });
      }

      if ($genre) {
         $query->where('genre', $genre);
      }

      $query->orderBy(
         $orderBy === 'valoraciones' ? 'valoraciones_count' : $orderBy, $direction
      );

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
