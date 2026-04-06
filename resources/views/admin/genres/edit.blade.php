<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Cloudbook: Editar Género</title>
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
<body>
   <nav class="bg-white w-full border-b border-b-[#004d42] p-4 mb-2 sticky top-0">
      <div class="max-w-7xl mx-auto flex justify-between items-center">
         <a href="{{ auth()->check() ? route('libros.index') : route('welcome') }}">
            <img src="{{ asset('storage/logo.png') }}" alt="Logo de CloudBook" class="w-64">
         </a>

         <div class="relative">
            <div onclick="toggleMenu()" class="flex items-center p-2 rounded-md transition hover:bg-gray-300 cursor-pointer">
               <img src="https://images.icon-icons.com/602/PNG/512/Gender_Neutral_User_icon-icons.com_55902.png" alt="@auth {{ Auth::user()->name }} @endauth" class="w-8 h-8">
               <span class="text-[#004d42] ml-1.5">Mi Cuenta</span>
            </div>
            <div id="account" class="hidden absolute right-0 mt-2 w-56 border bg-white border-[#e8e9ed] rounded-md shadow-lg p-3">
               @auth
                     <a href="{{route('user.show', Auth::user()->id)}}" class="block py-1 hover:text-[#004d42]">Mis datos</a>
                     <a href="{{ route('admin.libros.index') }}" class="block py-1 hover:text-[#004d42]">Administrar libros</a>

                     <hr class="my-2">

                     <a href="{{ route('logout') }}" class="flex items-center gap-2">
                        <img src="https://cdn-icons-png.flaticon.com/128/5565/5565704.png" alt="Cerrar sesion" class="w-5 h-5">
                        <button type="button" class="text-red-500 cursor-pointer">
                           Salir
                        </button>
                     </a>
                  @endauth
                  @guest
                     <a href="{{ route('register') }}" class="block w-full bg-white outline-2 outline-[#f5a623] text-[#f5a623] uppercase text-center rounded-4xl py-1">Registrarse</a>
                     <hr class="my-3">
                     <a href="{{ route('login') }}" class="block w-full bg-[#f5a623] outline-2 outline-[#f5a623] uppercase text-center rounded-4xl py-1 hover:bg-[#e09520] hover:outline-[#e09520] transtion">Login</a>
                  @endguest
            </div>
         </div>
      </div>
   </nav>
   <div class="max-w-7xl mx-auto">
      <x-breadcrumbs :breadcrumbs="[
         ['label' => 'Inicio', 'url' => route('welcome')],
         ['label' => 'Administrar libros', 'url' => route('admin.libros.index')],
         ['label' => 'Administrar géneros', 'url' => route('admin.genres.index')],
         ['label' => 'Editar género', 'url' => route('admin.genres.create')],
      ]"/>
   </div>

   <section class="max-w-4xl mx-auto mt-5 mb-20">
      <form method="POST" action="{{ route('admin.genres.update', $genre) }}" enctype="multipart/form-data" onsubmit="resolveGenre()">
         @csrf
         @method('PUT')
         <div class="flex justify-between items-center mb-5">
            <h1 class="text-2xl font-bold text-[#004d42]">Editar género</h1>
            <div class="flex gap-4">
               <button type="button" class="bg-gray-200 text-gray-600 px-4 py-1.5 rounded-2xl text-sm cursor-pointer hover:bg-gray-300 transition uppercase">
                  <a href="{{ route('admin.genres.index') }}">Cancelar</a>
               </button>
               <button type="submit" class="bg-[#f5a623] px-4 py-1.5 rounded-2xl text-sm cursor-pointer hover:bg-[#e09520] transition uppercase">
                  Editar
               </button>
            </div>
         </div>
         @include('admin.genres.form-crud')
      </form>
   </section>
</body>
</html>
