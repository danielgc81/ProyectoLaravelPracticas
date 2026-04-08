<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
   @vite('resources/css/app.css')
   <!-- Este css no se puede hacer en Tailwind por '~' -->
   <style>
      .stars input:checked ~ label,
      .stars label:hover,
      .stars label:hover ~ label { color: #f5a623; }
   </style>
</head>
<body>
   <x-navbar/>
   <section class="max-w-7xl mx-auto">
      <x-breadcrumbs :breadcrumbs="[
         ['label' => 'Inicio', 'url' => route('welcome')],
         ['label' => 'Libros', 'url' => route('libros.index')],
         ['label' => $libro->title, 'url' => route('libros.show', $libro)],
         ['label' => 'Dejar opinión', 'url' => '#'],
      ]"/>
      <div class="mt-5 w-[60%]">
         <div class="flex">
               <img src="{{ asset('storage/logo.png') }}" alt="Logo CloudBook" class="w-100">
         </div>
         <h1 class="text-2xl font-bold text-[#004d42]">Dejar una opinión</h1>
         <form action="{{ route('valoraciones.store', $libro_id) }}" method="POST" class="flex flex-col gap-4">
            @csrf
            <div class="mt-3">
               <label class="block text-sm font-medium text-gray-700 mb-2">Comentario</label>
               <textarea name="comentario" id="comentario" rows="5" placeholder="Escribe tu opinión..."
               class="w-full px-4 py-3 border border-gray-300 rounded-lg text-base resize-none focus:outline-none focus:ring-2 focus:ring-[#004d42]"></textarea>
            </div>
            <div class="flex flex-col items-center gap-1">
               <div class="stars flex flex-row-reverse justify-end gap-2 text-2xl text-gray-300">
                  <input type="radio" class="hidden" name="estrellas" id="star5" value="5">
                  <label class="cursor-pointer" for="star5" title="5 estrellas">★</label>
                  <input type="radio" class="hidden" name="estrellas" id="star4" value="4">
                  <label class="cursor-pointer" for="star4" title="4 estrellas">★</label>
                  <input type="radio" class="hidden" name="estrellas" id="star3" value="3">
                  <label class="cursor-pointer" for="star3" title="3 estrellas">★</label>
                  <input type="radio" class="hidden" name="estrellas" id="star2" value="2">
                  <label class="cursor-pointer" for="star2" title="2 estrellas">★</label>
                  <input type="radio" class="hidden" name="estrellas" id="star1" value="1">
                  <label class="cursor-pointer" for="star1" title="1 estrella">★</label>
               </div>
               @error('estrellas')
                  <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
               @enderror
            </div>
            <input type="hidden" name="libro_id" value="{{ $libro_id }}">
            <div class="flex gap-3 justify-center mt-2">
               <button type="submit" class="bg-[#ebab21] py-2 px-6 uppercase rounded-3xl hover:bg-[#e09520] transition cursor-pointer">
                  Enviar
               </button>
            </div>
         </form>
      </div>
   </section>
</body>
</html>
