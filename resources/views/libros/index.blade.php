<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>CloudBook: Descubre libros, personas ...</title>
   @vite('resources/css/app.css')
</head>
<body class="flex flex-col items-center min-h-screen">
   <x-navbar/>
   <main class="w-7xl max-w-7xl mb-10">
      <x-breadcrumbs :breadcrumbs="[
      ['label' => 'Inicio', 'url' => route('welcome')],
      ['label' => 'Libros', 'url' => route('libros.index')],
      ]"/>
      <section class="grid grid-cols-2 gap-3 mb-3">
         <!-- ISSUE #4 - Barra de Busqueda -->
         <div class="col-span-2 flex justify-end">
            <form method="GET" action="{{ route('libros.index') }}" class="flex gap-3">
               <!-- ISSUE #5 - Select Order By y ASC o DESC -->
               <!-- Select criterio -->
               <select name="order_by"
                     onchange="this.form.submit()"
                     class="border border-[#004d42] rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#004d42] cursor-pointer">
                  <option value="created_at" {{ ($orderBy ?? 'created_at') === 'created_at' ? 'selected' : '' }}>Más Reciente</option>
                  <option value="title" {{ ($orderBy ?? '') === 'title' ? 'selected' : '' }}>Título A-Z</option>
                  <option value="author" {{ ($orderBy ?? '') === 'author' ? 'selected' : '' }}>Autor</option>
                  <option value="valoraciones" {{ ($orderBy ?? '') === 'valoraciones' ? 'selected' : '' }}>Nº Opiniones</option>
                  <option value="media" {{ ($orderBy ?? '') === 'media' ? 'selected' : '' }}>Puntuación media</option>
               </select>
               <!-- Select dirección -->
               <select name="direction"
                     onchange="this.form.submit()"
                     class="border border-[#004d42] rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#004d42] cursor-pointer">
                  <option value="default" {{ ($direction ?? 'default') === 'default' ? 'selected' : '' }}>Por defecto</option>
                  <option value="asc" {{ ($direction ?? '') === 'asc' ? 'selected' : '' }}>Ascendente</option>
                  <option value="desc" {{ ($direction ?? '') === 'desc' ? 'selected' : '' }}>Descendente</option>
               </select>

               <!-- ISSUE #8 - Select categoría o género -->
               <select name="genre"
                     onchange="this.form.submit()"
                     class="border border-[#004d42] rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#004d42] cursor-pointer">
                  <option value="">Todos los géneros</option>
                  @foreach ($genres as $g)
                     <option value="{{ $g->id }}" {{ ($genre ?? '') == $g->id ? 'selected' : '' }}>
                        {{ $g->name }}
                     </option>
                  @endforeach
               </select>

               <input type="text" name="search" value="{{ $search ?? ''}}" placeholder="Buscar por título o autor" maxlength="255"
                  class="w-70 flex-1 border border-[#004d42] rounded-md px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#004d42]">
               <button type="submit"
                     class="bg-[#f5a623] px-6 py-2 rounded-3xl text-sm uppercase cursor-pointer hover:bg-[#e09520] transtion">
                     Buscar
               </button>
               <!-- Tras la busqueda aparecera un boton de limpiar para eliminarla -->
               @if(!empty($search))
                  <a href="{{ route('libros.index') }}" class="bg-gray-200 text-gray-600 px-4 py-2 rounded-3xl text-sm uppercase hover:bg-gray-300 transition">
                     Limpiar
                  </a>
               @endif
            </form>
         </div>

         <div>
            @auth
            <h1 class="text-2xl text-[#004d42]">Bienvenido a CloudBook, @auth {{ Auth::user()->name }} @endauth</h1>
            @endauth
         </div>

         <div class="text-right">
            <p class="text-[#737373] font-light text-2xl">
               {{$libros->count()}} {{ $libros->count() === 1 ? 'libro encontrado' : 'libros encontrados' }}
               <!-- Tras la búsqueda actualizara este texto para saber cuantos libros se encontraron con ella -->
               @if(!empty($search))
                  <span> para "<strong>{{ $search }}</strong>"</span>
               @endif
            </p>
         </div>
      </section>
      <section class="grid grid-cols-5 gap-y-5">
         @forelse($libros as $libro)
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
            @empty
               @if(!empty($search))
                     <div class="col-span-5 text-center py-16">
                        <p class="text-[#004d42] text-3xl font-bold">No se encontraron libros</p>
                        <p class="text-[#737373] text-sm mt-2 font-light">Prueba con otro título o autor</p>
                        <a href="{{ route('libros.index') }}" class="inline-block mt-4 bg-[#004d42] text-white px-6 py-2 rounded-3xl text-sm uppercase hover:bg-[#003830] transition">
                           Ver todos los libros
                        </a>
                     </div>
               @endif
         @endforelse
      </section>
   </main>
</body>
</html>
