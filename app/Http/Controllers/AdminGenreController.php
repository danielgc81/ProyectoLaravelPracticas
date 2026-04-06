<?php

namespace App\Http\Controllers;

use App\Http\Requests\Genres\StoreGenreRequest;
use App\Http\Requests\Genres\UpdateGenreRequest;
use App\Models\Genre;
use Illuminate\Support\Facades\Storage;

class AdminGenreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $genres = Genre::withCount('libros')->orderBy('name')->get();
      return view('admin.genres.index', compact('genres'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      return view('admin.genres.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGenreRequest $request)
    {
      $data = $request->validated();

      if ($request->hasFile('image')) {
         $path = $request->file('image')->store('géneros', 'public');
         $data['image'] = 'storage/' . $path;
      }

      Genre::create($data);

      return redirect()->route('admin.genres.index')->with('success', 'Género creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Genre $genre)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Genre $genre)
    {
      return view('admin.genres.edit', compact('genre'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGenreRequest $request, Genre $genre)
    {
      $data = $request->validated();

      if ($request->hasFile('image')) {
         Storage::disk('public')->delete(str_replace('storage/', '', $genre->image));
         $data['image'] = 'storage/' . $request->file('image')->store('genres', 'public');
      } else {
         unset($data['image']);
      }

      $genre->update($data);

      return redirect()->route('admin.genres.index')->with('success', 'Género actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Genre $genre)
    {
      if ($genre->image) {
            Storage::disk('public')->delete(str_replace('storage/', '', $genre->image));
      }

      $genre->delete();

      return redirect()->route('admin.genres.index');
    }
}
