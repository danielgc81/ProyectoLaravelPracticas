<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LibroController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\FavoritoController;
use App\Http\Controllers\ValoracionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminLibroController;
use App\Http\Controllers\AdminGenreController;

use App\Models\Genre;
use App\Models\Libro;
use App\Models\User;
use App\Models\Valoracion;

// Ruta de bienvenida
Route::get('/', function() { return view('welcome', [
   'totalLibros' => Libro::count(), // Datos Públicos
   'totalGeneros' => Genre::count(),
   'totalValoraciones' => Valoracion::count(),
   'totalUsers' => User::count(),
]); })->name('welcome');

// Rutas públicas de libros y géneros
Route::get('/libros', [LibroController::class, 'index'])->name('libros.index');
Route::get('/libros/{libro}', [LibroController::class, 'show'])->name('libros.show');
Route::get('/genres', [GenreController::class, 'index'])->name('genres.index');

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
   Route::resource('libros', LibroController::class)->except('index', 'show');
   Route::post('/favoritos/{libro}', [FavoritoController::class, 'toggle'])->name('favoritos.toggle');
   Route::get('/favoritos', [FavoritoController::class, 'index'])->name('favoritos.index');
   Route::resource('valoraciones', ValoracionController::class)->except('destroy');
   Route::resource('user', UserController::class);
   // Ruta encargada de cierre de sesión
   Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
});

// Ruta solo User tipo Admin
Route::middleware(['auth', 'admin'])->group(function () {
   Route::resource('admin/libros', AdminLibroController::class)->names('admin.libros');
   Route::resource('admin/genres', AdminGenreController::class)->names('admin.genres');
   Route::delete('/valoraciones/{valoracion}', [ValoracionController::class, 'destroy'])->name('valoraciones.destroy');
});
