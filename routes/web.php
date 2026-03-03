<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LibroController;
use App\Http\Controllers\LoginController;

// Rutas solo invitados (usuarios no autenticados)
Route::middleware('guest')->group(function () {
   // Rutas para las vistas que sirven los formularios de Registro e Iniciar Sesión
   Route::get('/login', function() { return view('auth.login'); })->name('login');
   Route::get('/register', function() { return view('auth.register'); })->name('register');
   // Rutas encargadas del ciclo de autententicación de usuarios: nuevas cuentas e inicio de sesión
   Route::post('/log-in', [LoginController::class, 'login'])->name('log-in');
   Route::post('/register-validated', [LoginController::class, 'register'])->name('register-validated');
});

// Rutas solo autenticados
Route::middleware('auth')->group(function () {
   Route::resource('libros', LibroController::class);

   // Ruta encargada de cierre de sesión
   Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
});
