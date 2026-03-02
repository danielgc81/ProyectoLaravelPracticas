<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests\Auth\RegisterRequest;
use Illuminate\Http\Request;

// ** Controlador encargado de gestionar el ciclo de autenticaciónde usuarios **

class LoginController extends Controller
{
   // Gestiona el registro de nuevos usuarios en el sistema
   public function register (RegisterRequest $request) {

      $user = User::create([
         'name' => $request->name,
         'email' => $request->email,
         'password' => Hash::make($request->password),
      ]);

      Auth::login($user);

      return redirect()->route('inicio');
   }

   // Valida las credenciales y autentica al usuario
   public function login (Request $request) {

   }

   // Cierra la sesión activa del usuario autenticado
   public function logout (Request $request) {
      Auth::logout();
      $request->session()->invalidate();
      $request->session()->regenerateToken();
      return redirect()->route('login');
   }
}
