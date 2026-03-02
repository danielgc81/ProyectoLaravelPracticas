<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
</head>
<body>
   <h1>Hola,@auth {{ Auth::user()->name }} @endauth</h1>
   <p>AQUI HABRÁ MUCHOS LIBROS</p>

<!-- Este Boton de cierre de sesión es de PRUEBA -->
   <a href="{{ route('logout') }}">
      <button type="button">
         Salir
      </button>
   </a>
</body>
</html>
