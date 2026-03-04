<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>{{ $libro->title }} / Valoraciones</title>
   @vite('resources/css/app.css')
</head>
<body>
   <img src="{{ $libro->image }}" alt="Portada {{ $libro->title }}">
   @foreach ($valoraciones as $valoracion)
      <p>{{ $valoracion->comentario }}</p>
      <p>{{ $valoracion->estrellas }}</p>
   @endforeach
   <a href="{{ route('valoraciones.create', ['libro_id' => $libro->id]) }}">Deja tu opinión</a>
   <a href="{{ route('libros.index') }}">Volver</a>
</body>
</html>

