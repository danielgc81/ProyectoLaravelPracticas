<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>CloudBook: Descubre libros, personas ...</title>
   @vite('resources/css/app.css')
</head>
<body>
   <x-navbar/>
   <section class="max-w-7xl mx-auto">
      <x-breadcrumbs :breadcrumbs="[
         ['label' => 'Inicio', 'url' => route('welcome')],
         ['label' => 'Libros', 'url' => route('libros.index')],
         ['label' => $valoracion->libro->title, 'url' => route('libros.show', $valoracion->libro)],
         ['label' => 'Valoración de ' . $valoracion->user->name, 'url' => route('valoraciones.show', $valoracion)],
      ]"/>
      <div class="flex">
            <img src="{{ asset('storage/logo.png') }}" alt="Logo CloudBook" class="w-100">
      </div>
      <div class="bg-gray-100 rounded-xl shadow-md w-[60%] max-w-2xl p-8 flex flex-col gap-6 mt-2">
         <div class="flex flex-col gap-1">
            <p class="font-bold text-xl">{{ $valoracion->user->name }}</p>
            <p class="text-sm text-gray-400">{{ $valoracion->created_at->format('d/m/Y H:i') }}</p>
            <div class="flex text-2xl">
               @for ($i = 1; $i <= 5; $i++)
                  <span class="{{ $i <= $valoracion->estrellas ? 'text-[#f5a623]' : 'text-gray-300' }}">★</span>
               @endfor
            </div>
            <p class="text-sm text-gray-500">
                  Valoración sobre
                  <a href="{{ route('libros.show', $valoracion->libro) }}" class="text-[#004d42] hover:underline font-medium">
                     {{ $valoracion->libro->title }}
                  </a>
            </p>
         </div>
         <p class="text-gray-600">{{ $valoracion->comentario }}</p>
      </div>
   </section>
</body>
</html>
