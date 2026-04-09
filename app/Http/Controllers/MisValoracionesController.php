<?php

namespace App\Http\Controllers;

use App\Models\Valoracion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MisValoracionesController extends Controller
{
   public function index () {
      $valoraciones = Valoracion::withTrashed()
            ->where('user_id', Auth::id())
            ->with('libro')
            ->orderBy('created_at', 'desc')
            ->get();

      return view('mis-valoraciones.index', compact('valoraciones'));
   }

   public function softDelete (Valoracion $valoracion) {
      if (Auth::id() !== $valoracion->user_id) abort(403);
      $valoracion->delete();
      return back()->with('success', 'Valoración eliminada.');
   }

   public function restore ($id) {
      $valoracion = Valoracion::withTrashed()->findOrFail($id);
      if (Auth::id() !== $valoracion->user_id) abort(403);
      $valoracion->restore();
      return back()->with('success', 'Valoración restaurada.');
   }

   public function forceDelete ($id) {
      $valoracion = Valoracion::withTrashed()->findOrFail($id);
      if (Auth::id() !== $valoracion->user_id) abort(403);
      $valoracion->forceDelete();
      return back()->with('success', 'Valoración eliminada definitivamente.');
   }
}
