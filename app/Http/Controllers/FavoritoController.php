<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use Illuminate\Support\Facades\Auth;

class FavoritoController extends Controller
{
   public function toggle(Libro $libro) {
      Auth::user()->favoritos()->toggle($libro->id);
      return back();
   }

   public function index()
   {
      $libros = Auth::user()->favoritos()->with('genre')->withCount('valoraciones')->get();
      return view('favoritos.index', compact('libros'));
   }
}
