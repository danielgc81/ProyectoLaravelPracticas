<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Libro;
use App\Services\LibroService;

class LibroController extends Controller
{
   public function __construct(protected LibroService $service) {
   }
   /**
    * Display a listing of the resource.
    */
   public function index(Request $request)
   {
      $search = $request->input('search');
      $orderBy = $request->input('order_by', 'created_at');
      $direction = $request->input('direction', 'desc');
      $genre = $request->input('genre');

      if ($direction === 'default') {
         $direction = 'desc';
      }

      $libros = $this->service->getAll($search, $orderBy, $direction, $genre);
      $genres = $this->service->getGenres();

      return view('libros.index', compact('libros', 'search', 'orderBy', 'direction', 'genre', 'genres'));
   }

   /**
    * Show the form for creating a new resource.
    */
   public function create()
   {
      //
   }

   /**
    * Store a newly created resource in storage.
    */
   public function store(Request $request)
   {
      //
   }

   /**
    * Display the specified resource.
    */
   public function show(int $id)
   {
      $libro = $this->service->find($id);
      $valoraciones = $libro->valoraciones()->with('user')->latest()->get();

      return view('libros.libro', compact('libro', 'valoraciones'));
   }

   /**
    * Show the form for editing the specified resource.
    */
   public function edit(Libro $libro)
   {
      //
   }

   /**
    * Update the specified resource in storage.
    */
   public function update(Request $request, Libro $libro)
   {
      //
   }

   /**
    * Remove the specified resource from storage.
    */
   public function destroy(Libro $libro)
   {
      //
   }
}
