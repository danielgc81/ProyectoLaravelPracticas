<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Valoracion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
      $this->call([
         GenreSeeder::class,
         LibroSeeder::class,
      ]);
      User::factory(20)->create();
      Valoracion::factory(100)->create();
    }
}
