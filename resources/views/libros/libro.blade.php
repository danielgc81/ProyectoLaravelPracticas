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
   
   <a href="{{ route('libros.index') }}">Volver</a>
</body>
</html>

