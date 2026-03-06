<?php

namespace App\Http\Controllers;

use App\Http\Requests\Valoracion\CreateValoracionRequest;
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
      return view('valoraciones.creacion-form', ['valoracion' => new Valoracion(), 'libro_id' => $request->query('libro_id')]);
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

   }

   /**
    * Show the form for editing the specified resource.
    */
   public function edit(Valoracion $valoracion)
   {
      //
   }

   /**
    * Update the specified resource in storage.
    */
   public function update(Request $request, Valoracion $valoracion)
   {
      //
   }

   /**
    * Remove the specified resource from storage.
    */
   public function destroy(Valoracion $valoracion)
   {
      //
   }
}
