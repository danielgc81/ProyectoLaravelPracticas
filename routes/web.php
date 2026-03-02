<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

// Rutas para las vistas que sirven los formularios de Registro e Iniciar Sesión
Route::get('/login', function () {
   return view('auth.login');
})->name('login');
Route::get('/register', function() {
   return view('auth.register');
})->name('register');

// ** Este inicio es una prueba **
Route::get('/inicio', function () {
   return view('index');
})->name('inicio');

// Rutas encargadas del ciclo de autententicación de usuarios: nuevas cuentas, inicio de sesión y cierre de sesión
Route::post('/register-validated', [LoginController::class, 'register'])->name('register-validated');
Route::post('/log-in', [LoginController::class, 'login'])->name('log-in');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

