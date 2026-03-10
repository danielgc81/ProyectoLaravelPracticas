<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>{{ $libro->title }} / Valoraciones</title>
   @vite('resources/css/app.css')
</head>
<body>
   <nav class="bg-white w-full border-b border-b-[#004d42] p-4 mb-9 sticky top-0">
      <div class="max-w-7xl mx-auto flex justify-between items-center">
         <h1 class="text-[#004d42] text-4xl">Hola,@auth {{ Auth::user()->name }} @endauth</h1>
         <div class="flex items-center p-2 rounded-md transition hover:bg-gray-300">
            <img src="https://images.icon-icons.com/602/PNG/512/Gender_Neutral_User_icon-icons.com_55902.png" alt="@auth {{ Auth::user()->name }} @endauth" class="w-8 h-8">
            <span class="text-[#004d42] ml-1.5">Mi Cuenta</span>
         </div>
      </div>
   </nav>
   <section class="max-w-4xl flex mx-auto gap-4">
      <div class="w-3xs">
         <img src="{{ $libro->image }}" alt="Portada {{ $libro->title }}">
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
            <p class="text-lg mt-1.5">{{$libro->synopsis}}</p>
         </div>
         <div class="self-end mt-4">
            <a href="{{route('valoraciones.create', ['libro_id' => $libro->id])}}" class="bg-[#ebab21] py-2.5 px-5 uppercase rounded-md self-end mb-5 mr-5">Dejar mi opinión</a>
            <a href="{{ route('libros.index') }}" class="bg-[#004d42] py-2.5 px-5 uppercase text-white rounded-md self-end mb-5 mr-5">Volver</a>
         </div>
      </div>
   </section>
   <section class="max-w-4xl fle flex-col mt-20 mx-auto">
      <div class="flex justify-between mb-4">
         <h3 class="text-2xl uppercase text-[#004d42]">¿Que opina la gente...?</h3>
         <p class="text-[#737373] font-light">{{$valoraciones->count()}} {{ $valoraciones->count() === 1 ? 'opinión de usuarios' : 'opiniones de usuarios' }}</p>
      </div>
      @foreach ($valoraciones as $valoracion)
      <article class="flex gap-10 mb-4 border-y-2 p-3 border-[#e8e9ed]">
         <div class="mt-4">
            <p class="font-bold text-xl">{{ $valoracion->user->name }}</p>
            <p class="font-light text-sm">{{ $valoracion->created_at->format('d/m/Y') }}</p>
         </div>
         <div class="mt-4 mb-4">
            <div class="flex text-2xl">
               @for ($i = 1; $i <= 5; $i++)
                  <span class="{{ $i <= $valoracion->estrellas ? 'text-[#f5a623]' : 'text-black'}}">★</span>
               @endfor
            </div>
            <p>{{ $valoracion->comentario }}</p>
         </div>
      </article>
      @endforeach
   </section>
</body>
</html>

