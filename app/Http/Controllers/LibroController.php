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
   public function index()
   {
      $libros = $this->service->getAll();

      return view('libros.index', compact('libros'));
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

      return view('libros.libro', compact('libro'));
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
