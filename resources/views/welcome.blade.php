<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>CloudBook: Descubre libros, personas ...</title>
   @vite('resources/css/app.css')
</head>
<body>
   <div class="h-dvh flex flex-col justify-between items-center">
      <div class="flex flex-col items-center">
         <img src="{{asset('storage/logo-grande1.png')}}" alt=""
         class="max-w-3xl">
         <h2 class="text-[#004d42] font-bold text-4xl">Tu Biblioteca Virtual</h2>
         <p class="mt-2.5 text-xl text-[#737373]">Descubre libros que te inspiran y conecta con lectores ...</p>
         <div class="flex gap-10 mt-8">
            <a href="{{ route('login') }}" class="bg-[#ebab21] outline-2 outline-[#ebab21] py-2.5 px-12 uppercase rounded-4xl">Log in</a>
            <a href="{{ route('register') }}" class="bg-white outline-2 outline-[#ebab21] text-[#ebab21] py-2.5 px-5 uppercase rounded-4xl">Registrarse</a>
         </div>
      </div>

      <div class="flex flex-col items-center mb-5 gap-4">
         <div class="flex gap-4 text-[#737373] font-light text-sm">
            <p>+{{ $totalLibros }} Libros</p>
            <p>+{{ $totalValoraciones }} Valoraciones</p>
            <p>+{{ $totalUsers }} Lectores activos</p>
         </div>
         <a href="{{route('libros.index')}}" class="bg-[#004d42] outline-2 outline-[#004d42] text-white text-sm rounded-4xl uppercase py-2.5 px-8">Visita Nuestro Catálogo →</a>
      </div>
   </div>
</body>
</html>
