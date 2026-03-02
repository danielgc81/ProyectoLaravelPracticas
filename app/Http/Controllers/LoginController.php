<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Requests\Auth\LoginRequest;
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
   public function login (LoginRequest $request) {
      $credentials = $request->only('email', 'password');

      $remember = ($request->has('remember') ? true : false);

      if (Auth::attempt($credentials, $remember)) {
         $request->session()->regenerate();
         return redirect()->intended(route('inicio'));
      }
      
      return back()->withErrors([
         'credentials' => 'El email o contraseña no es válido'
      ]);
   }

   // Cierra la sesión activa del usuario autenticado
   public function logout (Request $request) {
      Auth::logout();
      $request->session()->invalidate();
      $request->session()->regenerateToken();
      return redirect()->route('login');
   }
}
