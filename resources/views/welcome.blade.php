<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>CloudBook: Descubre libros, personas ...</title>
   @vite('resources/css/app.css')
</head>
<body>
   <x-navbar/>
   <div class="h-[80vh] flex flex-col justify-between items-center">
      <div class="flex flex-col items-center">
         <img src="{{asset('storage/logo-grande1.png')}}" alt=""
         class="max-w-3xl">
         <h2 class="text-[#004d42] font-bold text-4xl">Tu Biblioteca Virtual</h2>
         <p class="mt-2.5 text-xl text-[#737373]">Descubre libros que te inspiran y conecta con lectores ...</p>
         <div class="flex flex-col items-center gap-2 mt-5">
            <p class="text-lg font-light text-[#004d42]">Busca por...</p>
            <div class="flex gap-10">
               <a href="{{ route('libros.index') }}" class="bg-[#ebab21] outline-2 outline-[#ebab21] py-2 w-37.5 text-center uppercase rounded-4xl hover:bg-[#e09520] hover:outline-[#e09520] transtion">Libros</a>
               <a href="{{ route('genres.index') }}" class="bg-[#ebab21] outline-2 outline-[#ebab21] py-2 w-37.5 text-center  hover:bg-[#e09520] hover:outline-[#e09520]  uppercase rounded-4xl">Géneros</a>
            </div>
         </div>
         <div class="flex gap-4 text-[#737373] font-light text-sm mt-3">
            <p>+{{ $totalLibros }} Libros</p>
            <p>+{{ $totalGeneros }} Géneros</p>
            <p>+{{ $totalValoraciones }} Valoraciones</p>
            <p>+{{ $totalUsers }} Lectores activos</p>
         </div>
      </div>
   </div>
</body>
</html>
