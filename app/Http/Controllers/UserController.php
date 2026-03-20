<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display the specified resource.
     */
   public function show(User $user)
   {
      return view('user.mi-cuenta', compact('user'));
   }

    /**
     * Update the specified resource in storage.
     */
   public function update (Request $request, User $user) {

      if ($request->form_type === 'name') {
         $request->validateWithBag('nameErrors', [
               'name' => 'required|string|min:3|max:255|unique:users',
         ]);

         $user->name = $request->name;
         $user->save();

         return redirect()->route('user.show', $user->id)->with('success_name', 'Nombre actualizado correctamente.');
      }

      if ($request->form_type === 'email') {
         $request->validateWithBag('emailErrors', [
               'email' => 'required|email|max:255|unique:users,email,' . $user->id,
         ]);

         $user->email = $request->email;
         $user->save();

         return redirect()->route('user.show', $user->id)->with('success_email', 'Email actualizado correctamente.');
      }

      if ($request->form_type === 'password') {
         $request->validateWithBag('passwordErrors', [
            'password' => 'required|string|min:8|confirmed',
         ]);

         $user->password = Hash::make($request->password);
         $user->save();

         return redirect()->route('user.show', $user->id)->with('success_password', 'Contraseña actualizada correctamente.');
      }
   }
}
