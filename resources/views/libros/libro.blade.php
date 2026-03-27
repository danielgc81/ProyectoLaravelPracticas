<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>{{ $libro->title }} / Valoraciones</title>
   @vite('resources/css/app.css')
   <script>
      // Abre/cierra el account al hacer click en "Mi Cuenta"
      function toggleMenu() {
         document.getElementById('account').classList.toggle('hidden');
      }
      // Cierra el account si se hace click fuera de él
      document.addEventListener('click', function(e) {
         if (!e.target.closest('.relative')) {
            document.getElementById('account').classList.add('hidden');
         }
      });
   </script>
</head>
<body>
   <nav class="bg-white w-full border-b border-b-[#004d42] p-4 mb-2 sticky top-0">
      <div class="max-w-7xl mx-auto flex justify-between items-center">
         <a href="{{ auth()->check() ? route('libros.index') : route('welcome') }}"> <!-- Esta ruta welcome la solucionare en la issue #1 -->
            <img src="{{ asset('storage/logo.png') }}" alt="Logo de CloudBook" class="w-64">
         </a>

         <div class="relative">
            <div onclick="toggleMenu()" class="flex items-center p-2 rounded-md transition hover:bg-gray-300 cursor-pointer">
               <img src="https://images.icon-icons.com/602/PNG/512/Gender_Neutral_User_icon-icons.com_55902.png" alt="@auth {{ Auth::user()->name }} @endauth" class="w-8 h-8">
               <span class="text-[#004d42] ml-1.5">Mi Cuenta</span>
            </div>
            <div id="account" class="hidden absolute right-0 mt-2 w-56 border bg-white border-[#e8e9ed] rounded-md shadow-lg p-3">
                  @auth
                     <a href="{{route('user.show', Auth::user()->id)}}" class="block py-1 hover:text-[#004d42]">Mis datos</a>
                     <a href="{{ route('admin.libros.index') }}" class="block py-1 hover:text-[#004d42]">Administar libros</a>

                     <hr class="my-2">

                     <a href="{{ route('logout') }}" class="flex items-center gap-2">
                        <img src="https://cdn-icons-png.flaticon.com/128/5565/5565704.png" alt="Cerrar sesion" class="w-5 h-5">
                        <button type="button" class="text-red-500 cursor-pointer">
                           Salir
                        </button>
                     </a>
                  @endauth
                  @guest
                     <a href="{{ route('register') }}" class="block w-full bg-white outline-2 outline-[#f5a623] text-[#f5a623] uppercase text-center rounded-4xl py-1">Registrarse</a>
                     <hr class="my-3">
                     <a href="{{ route('login') }}" class="block w-full bg-[#f5a623] outline-2 outline-[#f5a623] uppercase text-center rounded-4xl py-1 hover:bg-[#e09520] hover:outline-[#e09520] transtion">Login</a>
                  @endguest
               </div>
         </div>
      </div>
   </nav>
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
         <div class="mt-4 flex flex-col">
            @auth
               <a href="{{route('valoraciones.create', ['libro_id' => $libro->id])}}" class="bg-[#ebab21] py-2.5 px-5 uppercase rounded-md hover:bg-[#e09520] transtion">Dejar mi opinión</a>
            @endauth
            @guest
               <a href="{{route('valoraciones.create', ['libro_id' => $libro->id])}}" class="bg-[#ebab21] py-2.5 px-5 uppercase rounded-md pointer-events-none opacity-50">Dejar mi opinión</a>
            @endguest
            <a href="{{ route('libros.index') }}" class="bg-[#004d42] py-2.5 px-5 uppercase text-white rounded-md hover:bg-[#003830] transition text-center mt-3">Volver</a>
         </div>
      </div>
      <div class="w-[60%] flex flex-col gap-2">
         <p class="text-3xl font-bold uppercase text-[#004d42]">{{$libro->title}}</p>
         <div class="font-light">
            <p class="text-[#737373]">{{$libro->author}}</p>
            <p class="text-[#737373]">{{$libro->editorial}} - {{$libro->ISBN}}</p>
         </div>
         <span class="bg-[#004d42] w-fit text-white border rounded-md py-1.5 px-2 text-xs">{{$libro->genre}}</span>
         <div class="mt-2">
            <h3 class="font-semibold">Sinopsis de <span class="uppercase">{{$libro->title}}</span></h3>
            <p class="text-lg mt-1.5 line-clamp-15" id="synopsis-text">{{$libro->synopsis}}</p>
            <button id="synopsis-toggle" class="hidden text-[#004d42] font-medium mt-1 cursor-pointer" onclick="toggleSynopsis()">
               Ver más
            </button>
         </div>
         @if($libro->user)
            <p class="text-sm text-gray-400">
               Añadido por <span class="font-medium">{{ $libro->user->name }}</span>
               el {{ $libro->created_at->format('d/m/Y') }} a las {{ $libro->created_at->format('H:i') }}
            </p>
         @endif
      </div>
   </section>
   <!-- Informacion de las valoraciones -->
   <section class="max-w-4xl flex flex-col mt-10 mx-auto mb-10">
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
                     <span class="{{ $i <= $valoracion->estrellas ? 'text-[#f5a623]' : 'text-black'}}">★</span>
                  @endfor
               </div>
               <p>{{ $valoracion->comentario }}</p>
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

