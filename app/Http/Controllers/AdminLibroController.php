<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use App\Http\Requests\Libro\StoreLibroRequest;
use App\Http\Requests\Libro\UpdateLibroRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminLibroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $libros = Libro::with('user')->orderBy('created_at', 'desc')->get();
      return view('admin.libros.index', compact('libros'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      $genres = Libro::distinct()->orderBy('genre')->pluck('genre');
      return view('admin.libros.create', compact('genres'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLibroRequest $request)
    {
      $data = $request->validated();

      if ($request->hasFile('image')) {
         $path = $request->file('image')->store('portadas', 'public');
         $data['image'] = 'storage/' . $path;
      }

      $data['user_id'] = Auth::user()->id;

      Libro::create($data);

      return redirect()->route('admin.libros.index')->with('success', 'Libro creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Libro $libro)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Libro $libro)
    {
      $genres = Libro::distinct()->orderBy('genre')->pluck('genre');
      return view('admin.libros.edit', compact('libro', 'genres'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLibroRequest $request, Libro $libro)
    {
      $data = $request->validated();

      if ($request->hasFile('image')) {
         Storage::disk('public')->delete($libro->image);
         $data['image'] = 'storage/' . $request->file('image')->store('portadas', 'public');
      } else {
         unset($data['image']);
      }

      $libro->update($data);
      return redirect()->route('admin.libros.index')->with('success', 'Libro actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Libro $libro)
    {
        //
    }
}
