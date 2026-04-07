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
   <div class="max-w-7xl mx-auto">
      <x-breadcrumbs :breadcrumbs="[
         ['label' => 'Inicio', 'url' => route('welcome')],
         ['label' => 'Géneros', 'url' => route('genres.index')],
      ]"/>
   </div>
   <section class="max-w-5xl mx-auto mt-4 px-4 mb-20">
      @auth
         <h1 class="text-2xl text-[#004d42] mb-4">Bienvenido a CloudBook, @auth {{ Auth::user()->name }} @endauth</h1>
      @endauth
      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
         @foreach($genres as $genre)
         <div class="border border-gray-200 rounded-lg overflow-hidden shadow-sm hover:shadow-md transition">
               @if($genre->image)
                  <img src="{{ asset($genre->image) }}" alt="{{ $genre->name }}"
                     class="w-full h-40 object-cover">
               @else
                  <div class="w-full h-40 bg-gray-100 flex items-center justify-center text-gray-400 text-sm">
                     Sin imagen
                  </div>
               @endif
               <div class="p-4 flex flex-col gap-2">
                  <h2 class="text-lg font-semibold text-[#004d42]">{{ $genre->name }}</h2>
                  @if($genre->description)
                     <p class="text-sm text-gray-500 line-clamp-2">{{ $genre->description }}</p>
                  @endif
                  <p class="text-sm text-gray-400">
                     {{ $genre->libros_count }} {{ $genre->libros_count === 1 ? 'libro' : 'libros' }}
                  </p>
                  <a href="{{ route('libros.index', ['genre' => $genre->id]) }}"
                     class="mt-2 text-center bg-[#ebab21] text-sm px-4 py-2 rounded-3xl hover:bg-[#e09520] transition">
                     Ver libros
                  </a>
               </div>
         </div>
         @endforeach
      </div>
</section>
</body>
</html>

