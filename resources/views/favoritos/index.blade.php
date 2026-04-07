<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>CloudBook: Mis favoritos</title>
   @vite('resources/css/app.css')
</head>
<body>
   <x-navbar/>
   <div class="max-w-7xl mx-auto">
      <x-breadcrumbs :breadcrumbs="[
         ['label' => 'Inicio', 'url' => route('welcome')],
         ['label' => 'Mis favoritos', 'url' => route('favoritos.index')],
      ]"/>

      <section class="mt-4">
         <h1 class="text-2xl font-bold text-[#004d42] mb-6">Mis favoritos</h1>
         @if($libros->isEmpty())
            <p class="text-gray-400">No tienes ningún libro marcado como favorito.</p>
         @else
         <section class="grid grid-cols-5 gap-y-5">
            @foreach($libros as $libro)
               <article class="max-w-70 border border-[#e8e9ed] overflow-hidden flex flex-col">
                  <div class="h-96">
                     <img src="{{ $libro->image }}" alt="Portada {{ $libro->title }}"
                        class="w-full h-96 p-6 rounded-xl object-fill">
                  </div>
                  <div class="px-5 pb-4 flex flex-col gap-1 flex-1">
                     <h3 class="text-lg uppercase truncate font-semibold text-[#023020]">
                        {{ $libro->title }}
                     </h3>
                     <p class="truncate text-[#004d42]">{{ $libro->author }}</p>
                  </div>
                  <div class="flex items-center text-sm text-gray-500 mt-1 mb-5 px-5 justify-between">
                     <div class="flex flex-col">
                        <span class="flex items-center gap-1">
                           <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-[#ebab21]" viewBox="0 0 24 24" fill="currentColor">
                              <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                           </svg>
                           {{ number_format($libro->valoraciones_avg_estrellas, 1) }}/5
                        </span>
                        <span class="flex items-center gap-1">
                           {{ $libro->valoraciones_count }} {{ $libro->valoraciones_count !== 1 ? 'opiniones' : 'opinión'}}
                        </span>
                     </div>
                     <a href="{{ route('libros.show', $libro->id) }}" class="bg-[#ebab21] py-1.5 text-black px-4 uppercase rounded-2xl hover:bg-[#e09520] transtion">Ver Libro</a>
                  </div>
               </article>
            @endforeach
         </section>
         @endif
      </section>
   </div>
</body>
</html>
