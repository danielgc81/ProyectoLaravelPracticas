<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>{{ $libro->title }} / Valoraciones</title>
   @vite('resources/css/app.css')
</head>
<body>
   <x-navbar/>
   <div class="w-7xl max-w-7xl mx-auto">
      <x-breadcrumbs :breadcrumbs="[
         ['label' => 'Inicio', 'url' => route('welcome')],
         ['label' => 'Libros', 'url' => route('libros.index')],
         ['label' => $libro->title, 'url' => route('libros.show', $libro)],
      ]"/>
   </div>
   <!-- Informacion del libro -->
   <section class="max-w-4xl flex mx-auto gap-4 mt-6 justify-center">
      <div class="flex flex-col items-center">
         <div class="w-3xs">
            <img src="{{ asset($libro->image) }}" alt="Portada {{ $libro->title }}">
         </div>
         <div class="mt-5 flex flex-col items-center">
            @auth
               <a href="{{route('valoraciones.create', ['libro_id' => $libro->id])}}" class="bg-[#ebab21] py-2 text-center w-42.5 px-4 text-sm uppercase rounded-3xl hover:bg-[#e09520] transtion">Dejar mi opinión</a>
               <form method="POST" action="{{ route('favoritos.toggle', $libro) }}">
                  @csrf
                  <button type="submit" class="mt-3 flex items-center gap-1.5 text-sm cursor-pointer">
                     @if(auth()->user()->favoritos->contains($libro->id))
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-red-500" viewBox="0 0 24 24" fill="currentColor">
                           <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                        </svg>
                        <span class="text-red-500">Guardado en favoritos</span>
                     @else
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-300" viewBox="0 0 24 24" fill="currentColor">
                           <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                        </svg>
                        <span class="text-gray-400">Añadir a favoritos</span>
                     @endif
                  </button>
               </form>
            @endauth
            @guest
               <a href="{{route('valoraciones.create', ['libro_id' => $libro->id])}}" class="bg-[#ebab21] py-2 px-4 text-sm uppercase rounded-3xl pointer-events-none opacity-50">Dejar mi opinión</a>
            @endguest
         </div>
      </div>
      <div class="w-[60%] flex flex-col gap-2">
         <p class="text-3xl font-bold uppercase text-[#004d42]">{{$libro->title}}</p>
         <div class="font-light">
            <p class="text-[#737373]">{{$libro->author}}</p>
            <p class="text-[#737373]">{{$libro->editorial}} - {{$libro->ISBN}}</p>
         </div>
         <span class="bg-[#004d42] w-fit text-white border rounded-md py-1.5 px-2 text-xs">{{$libro->genre->name}}</span>
         <div class="mt-2">
            <h3 class="font-semibold">Sinopsis de <span class="uppercase">{{$libro->title}}</span></h3>
            <p class="text-lg mt-1.5 line-clamp-15" id="synopsis-text">{{$libro->synopsis}}</p>
            <button id="synopsis-toggle" class="hidden text-[#004d42] font-medium mt-1 cursor-pointer" onclick="toggleSynopsis()">
               Ver más
            </button>
         </div>
         @if($libro->user && $libro->created_at)
            <p class="text-sm text-gray-400">
               Añadido por <span class="font-medium">{{ $libro->user->name }}</span>
               el {{ $libro->created_at->format('d/m/Y') }} a las {{ $libro->created_at->format('H:i') }}
            </p>
         @endif
      </div>
   </section>
   <!-- Informacion de las valoraciones -->
   <section class="max-w-4xl flex flex-col mt-11 mx-auto mb-10">
      <!-- Media valoraciones -->
      <div class="flex items-center gap-4 mb-5">
         <div class="flex mx-auto text-4xl">
            @for ($i = 1; $i <= 5; $i++)
            <span class="{{ $i <= round($valoraciones->avg('estrellas')) ? 'text-[#f5a623]' : 'text-gray-300' }}">★</span>
            @endfor
            <p class="ml-4 text-4xl font-bold">{{ $valoraciones->avg('estrellas') == 5 ? '5' : number_format($valoraciones->avg('estrellas'), 1) }}/5</p>
         </div>
      </div>
      <div class="flex justify-between mb-4">
         <h3 class="text-2xl uppercase text-[#004d42]">¿Que opina la gente...?</h3>
         <p class="text-[#737373] font-light">{{$valoraciones->count()}} {{ $valoraciones->count() === 1 ? 'opinión de usuarios' : 'opiniones de usuarios' }}</p>
      </div>
      <!-- Valoracion de usuario  -->
      @auth
         @foreach ($valoraciones as $valoracion)
         <article class="flex gap-10 mb-4 border-y-2 p-3 border-[#e8e9ed]">
            <div class="mt-4 shrink-0 w-67.5">
               <p class="font-bold text-xl">{{ $valoracion->user->name }}</p>
               <p class="font-light text-sm">{{ $valoracion->created_at->format('d/m/Y') }}</p>
            </div>
            <div class="mt-4 mb-4 flex-1">
               <div class="flex text-2xl">
                  @for ($i = 1; $i <= 5; $i++)
                     <span class="{{ $i <= $valoracion->estrellas ? 'text-[#f5a623]' : 'text-gray-300'}}">★</span>
                  @endfor
               </div>
               <p>{{ $valoracion->comentario }}</p>
               @if(Auth::user()->esAdministrador())
                  <form method="POST" action="{{ route('valoraciones.destroy', $valoracion) }}">
                     @csrf
                     @method('DELETE')
                     <button type="submit" class="mt-2 text-xs text-red-500 hover:underline cursor-pointer">
                           Eliminar
                     </button>
                  </form>
               @endif
            </div>
         </article>
         @endforeach
      @endauth
      @guest
         <p class="mx-auto"><a href="{{route('register')}}" class="underline text-[#004d42]">Registrate</a> para ver las opiniones o si ya tienes cuenta <a href="{{ route('login') }}" class="underline text-[#004d42]">Inicia Sesión</a></p>
      @endguest
   </section>
   <script>
      const synopsis = document.getElementById('synopsis-text');
      const btn = document.getElementById('synopsis-toggle');
      let expanded = false;

      if (synopsis.scrollHeight > synopsis.clientHeight) {
         btn.classList.remove('hidden');
      }

      function toggleSynopsis() {
         expanded = !expanded;
         synopsis.classList.toggle('line-clamp-15', !expanded);
         btn.textContent = expanded ? 'Ver menos' : 'Ver más';
      }
</script>
</body>
</html>

