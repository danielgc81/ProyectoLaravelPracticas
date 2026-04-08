<?php

namespace App\Http\Controllers;

use App\Http\Requests\Valoracion\CreateValoracionRequest;
use App\Models\Libro;
use App\Models\Valoracion;
use App\Services\ValoracionService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ValoracionController extends Controller
{
   public function __construct(protected ValoracionService $service) {
   }

   /**
    * Display a listing of the resource.
    */
   public function index()
   {
      //
   }

   /**
    * Show the form for creating a new resource.
    */
   public function create(Request $request)
   {
      $libro = Libro::find($request->query('libro_id'));
      return view('valoraciones.creacion-form', ['valoracion' => new Valoracion(), 'libro_id' => $request->query('libro_id'), 'libro' => $libro]);
   }

   /**
    * Store a newly created resource in storage.
    */
   public function store(CreateValoracionRequest $request)
   {
      $data = $request->validated();
      $data['user_id'] = Auth::id();
      $this->service->create($data);

      return redirect()->route('libros.show', $request->libro_id)->with('message', 'Gracias por su opinión!');
   }

   /**
    * Display the specified resource.
    */
   public function show(Valoracion $valoracion)
   {
      $valoracion->load('libro','user');
      return view('valoraciones.valoracion', compact('valoracion'));
   }

   /**
    * Show the form for editing the specified resource.
    */
   public function edit(Valoracion $valoracion)
   {
      if (Auth::user()->id !== $valoracion->user_id) {
         abort(403, 'No tienes permiso para acceder a esta página.');
      }

      $libro = $valoracion->libro;
      return view('valoraciones.edit', compact('valoracion', 'libro'));
   }

   /**
    * Update the specified resource in storage.
    */
   public function update(Request $request, Valoracion $valoracion)
   {
      if (Auth::user()->id !== $valoracion->user_id) {
         abort(403, 'No tienes permiso para acceder a esta página.');
      }

      $request->validate([
         'comentario' => 'required|string',
         'estrellas'  => 'required|integer|min:1|max:5',
      ]);

      $valoracion->update($request->only('comentario', 'estrellas'));

      return redirect()->route('libros.show', $valoracion->libro_id);
   }

   /**
    * Remove the specified resource from storage.
    */
   public function destroy(Valoracion $valoracion)
   {
      if (!Auth::user()->esAdministrador() && Auth::user()->id !== $valoracion->user_id) {
         abort(403, 'No tienes permiso para acceder a esta página');
      }
      $valoracion->delete();
      return back();
   }
}
