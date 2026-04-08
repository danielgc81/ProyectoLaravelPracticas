<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>CloudBook: Descubre libros, personas ...</title>
   @vite('resources/css/app.css')
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
         ['label' => 'Editar opinión', 'url' => '#'],
      ]"/>
      <div class="mt-5 w-[60%]">
         <div class="flex">
               <img src="{{ asset('storage/logo.png') }}" alt="Logo CloudBook" class="w-100">
         </div>
         <h1 class="text-2xl font-bold text-[#004d42]">Editar opinión</h1>
         <form action="{{ route('valoraciones.update', $valoracion) }}" method="POST" class="flex flex-col gap-4">
               @csrf
               @method('PUT')
               <div class="mt-3">
                  <label class="block text-sm font-medium text-gray-700 mb-2">Comentario<span class="text-red-500">*</span></label>
                  <textarea name="comentario" rows="5" placeholder="Escribe tu opinión..."
                     class="w-full px-4 py-3 border border-gray-300 rounded-lg text-base resize-none focus:outline-none focus:ring-2 focus:ring-[#004d42]">{{ old('comentario', $valoracion->comentario) }}</textarea>
                  @error('comentario')
                     <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                  @enderror
               </div>
               <div class="flex flex-col items-center gap-1">
                  <div class="stars flex flex-row-reverse justify-end gap-2 text-2xl text-gray-300">
                     @for($i = 5; $i >= 1; $i--)
                           <input type="radio" class="hidden" name="estrellas" id="star{{ $i }}" value="{{ $i }}"
                              {{ old('estrellas', $valoracion->estrellas) == $i ? 'checked' : '' }}>
                           <label class="cursor-pointer" for="star{{ $i }}" title="{{ $i }} estrellas">★</label>
                     @endfor
                  </div>
                  @error('estrellas')
                     <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                  @enderror
               </div>
               <div class="flex gap-3 justify-center mt-2">
                  <button type="submit" class="bg-[#ebab21] py-2 px-6 uppercase rounded-3xl hover:bg-[#e09520] transition cursor-pointer">
                     Actualizar
                  </button>
               </div>
         </form>
      </div>
   </section>

</body>
</html>
