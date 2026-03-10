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
   <div class="h-dvh flex justify-center items-center bg-linear-to-b from-0% from-[#004d42] to-70% to-[#ebab21]">
      <form action="{{ route('valoraciones.store', $libro_id) }}" method="POST" class=" w-2xl flex justify-center flex-col mx-auto gap-4 bg-gray-100 border-2 border-[#e8e9ed] rounded-2xl p-3.5 shadow-xl">
         @csrf
         <label for="comentario">Comentario</label>
         <textarea name="comentario" id="comentario" rows="4" placeholder="Escribe tu opinión..."
            class="w-full px-4 py-3 border border-gray-300 rounded-lg text-base resize-y outline-[#004d42]"
         ></textarea>

         <div class="stars flex flex-row-reverse justify-end gap-2 text-lg self-center">
            <input type="radio" class="hidden" name="estrellas" id="star5" value="5">
            <label for="star5" title="5 estrellas">★</label>

            <input type="radio" class="hidden" name="estrellas" id="star4" value="4">
            <label for="star4" title="4 estrellas">★</label>

            <input type="radio" class="hidden" name="estrellas" id="star3" value="3">
            <label for="star3" title="3 estrellas">★</label>

            <input type="radio" class="hidden" name="estrellas" id="star2" value="2">
            <label for="star2" title="2 estrellas">★</label>

            <input type="radio" class="hidden" name="estrellas" id="star1" value="1">
            <label for="star1" title="1 estrella">★</label>
         </div>

         @error('estrellas')
               <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
            @enderror

         <input type="hidden" name="libro_id" value="{{ $libro_id }}">
         <div class="flex self-center">
            <button type="submit" class="w-fit bg-[#ebab21] py-2.5 px-5 uppercase rounded-md self-end mb-5 mr-5 cursor-pointer">Enviar</button>
            <a href="{{route('libros.show', $libro_id)}}" class="bg-[#004d42] py-2.5 px-5 uppercase text-white rounded-md self-end mb-5 mr-5">Volver</a>
         </div>
      </form>
   </div>
</body>
</html>
