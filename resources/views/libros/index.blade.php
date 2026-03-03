<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
   @vite('resources/css/app.css')
</head>
<body class="flex flex-col justify-center items-center min-h-screen">
   <h1>Hola,@auth {{ Auth::user()->name }} @endauth</h1>
   <main class="max-w-7xl grid grid-cols-5">
      @foreach($libros as $libro)
         <article class="max-w-70 border border-[#023020] overflow-hidden bg-[#D4A373]">
            <img src="{{ $libro->image }}" alt="Portada {{ $libro->title }}"
               class="w-full p-1.5 rounded-xl object-cover">
            <div class="p-3 flex flex-col gap-1">
               <h3 class="text-lg uppercase font-bold truncate text-[#023020]">
                  {{ $libro->title }}
               </h3>
               <p class="text-xs truncate underline text-[#2d6a4f]">{{ $libro->author }}</p>
            </div>
            <a href="{{ route('libros.show', $libro->id) }}">Ver valoraciones</a>
         </article>
      @endforeach
   </main>

<!-- Este Boton de cierre de sesión es de PRUEBA -->
   <a href="{{ route('logout') }}">
      <button type="button">
         Salir
      </button>
   </a>
</body>
</html>
