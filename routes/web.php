<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LibroController;
use App\Http\Controllers\AdminLibroController;
use App\Http\Controllers\AdminGenreController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ValoracionController;

use App\Models\Libro;
use App\Models\User;
use App\Models\Valoracion;

// Ruta de bienvenida
Route::get('/', function() { return view('welcome', [
   'totalLibros' => Libro::count(), // Datos Públicos
   'totalValoraciones' => Valoracion::count(),
   'totalUsers' => User::count(),
]); })->name('welcome');

// Rutas públicas de libro
Route::get('/libros', [LibroController::class, 'index'])->name('libros.index');
Route::get('/libros/{libro}', [LibroController::class, 'show'])->name('libros.show');

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
   Route::resource('admin/libros', AdminLibroController::class)->names('admin.libros');
   Route::resource('admin/genres', AdminGenreController::class)->names('admin.genres');
   Route::resource('libros', LibroController::class)->except('index', 'show');
   Route::resource('valoraciones', ValoracionController::class);
   Route::resource('user', UserController::class);
   // Ruta encargada de cierre de sesión
   Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
});
