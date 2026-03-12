<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Descubre libros, personas ...</title>
   @vite('resources/css/app.css')
   <script>
      // Abre/cierra el account al hacer click en "Mi Cuenta"
      function toggleMenu() {
         document.getElementById('account').classList.toggle('hidden');
      }
      // Cierra el account si se hace click fuera de él
      document.addEventListener('click', function(e) {
         if (!e.target.closest('.relative')) {
            document.getElementById('account').classList.add('hidden');
         }
      });
   </script>
</head>
<body class="flex flex-col items-center min-h-screen">
   <nav class="bg-white w-full border-b border-b-[#004d42] p-4 mb-9 sticky top-0">
      <div class="max-w-7xl mx-auto flex justify-between items-center">
         <h1 class="text-[#004d42] text-4xl">Hola,@auth {{ Auth::user()->name }} @endauth</h1>
         <div class="relative">
            <div onclick="toggleMenu()" class="flex items-center p-2 rounded-md transition hover:bg-gray-300 cursor-pointer">
               <img src="https://images.icon-icons.com/602/PNG/512/Gender_Neutral_User_icon-icons.com_55902.png" alt="@auth {{ Auth::user()->name }} @endauth" class="w-8 h-8">
               <span class="text-[#004d42] ml-1.5">Mi Cuenta</span>
            </div>
            <div id="account" class="hidden absolute right-0 mt-2 w-56 border bg-white border-[#e8e9ed] rounded-md shadow-lg p-3">
               <!-- Este enlace es pura estetica -->
               <a href="" class="block py-1 hover:text-[#004d42]">Mis datos</a>

               <hr class="my-2">

               <a href="{{ route('logout') }}" class="flex items-center gap-2">
                  <img src="https://cdn-icons-png.flaticon.com/128/5565/5565704.png" alt="Cerrar sesion" class="w-5 h-5">
                  <button type="button" class="text-red-500 cursor-pointer">
                     Salir
                  </button>
               </a>
            </div>
         </div>
      </div>
   </nav>
   <main class="max-w-7xl grid grid-cols-5 gap-y-5">
      @foreach($libros as $libro)
         <article class="max-w-70 border border-[#e8e9ed] overflow-hidden flex flex-col">
            <div class="h-96">
               <img src="{{ $libro->image }}" alt="Portada {{ $libro->title }}"
                  class="w-full h-96 p-6 rounded-xl object-cover">
            </div>
            <div class="px-5 pb-7 flex flex-col gap-1 flex-1">
               <h3 class="text-lg uppercase truncate font-semibold text-[#023020]">
                  {{ $libro->title }}
               </h3>
               <p class="truncate text-[#004d42]">{{ $libro->author }}</p>
            </div>
            <a href="{{ route('libros.show', $libro->id) }}" class="bg-[#ebab21] py-2.5 px-5 uppercase rounded-md self-end mb-5 mr-5">Ver Libro</a>
         </article>
      @endforeach
   </main>
</body>
</html>
