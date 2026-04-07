<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $genres = Genre::withCount('libros')->where('visible', true)->orderBy('name')->get();

      return view('genres.index', compact('genres'));
    }
}
