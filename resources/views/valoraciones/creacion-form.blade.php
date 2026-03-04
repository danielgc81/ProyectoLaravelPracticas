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
   <form action="{{ route('valoraciones.store', $libro_id) }}" method="POST">
      @csrf
      <label for="comentario">Comentario</label>
      <textarea name="comentario" id="comentario" rows="4" placeholder="Escribe tu opinión..."
         class="w-full px-4 py-3 border border-gray-300 rounded-lg text-base resize-y"
      ></textarea>

      <div class="stars flex flex-row-reverse justify-end gap-2 text-lg">
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

      <input type="hidden" name="libro_id" value="{{ $libro_id }}">
      <input type="hidden" name="user_id" value="{{ Auth::id() }}">
      <button type="submit" class="bg-[#D4A373] py-1.5 px-3 rounded-2xl">Enviar</button>
   </form>
   <a href="{{route('libros.show', $libro_id)}}">Volver</a>
</body>
</html>
