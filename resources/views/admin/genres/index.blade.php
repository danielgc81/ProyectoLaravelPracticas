<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>CloudBook: Administrar Géneros</title>
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
                     <a href="{{ route('user.show', Auth::user()->id) }}" class="block py-1 hover:text-[#004d42]">Mis datos</a>
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
   <div class="flex flex-col mx-auto max-w-7xl mt-2">
      <div>
         <x-breadcrumbs :breadcrumbs="[
               ['label' => 'Inicio', 'url' => route('welcome')],
               ['label' => 'Administrar libros', 'url' => route('admin.libros.index')],
               ['label' => 'Administrar géneros', 'url' => route('admin.genres.index')],
         ]"/>
      </div>
      <section class="max-w-xl">
         <div class="flex justify-between items-center mb-6 mt-5">
            <h1 class="text-2xl font-bold text-[#004d42] self-end">Administrar géneros</h1>
            <div class="flex gap-x-4">
               <a href="{{ route('admin.genres.create') }}" class="bg-[#f5a623] px-4 py-2 rounded-3xl hover:bg-[#e09520] transition uppercase">
                  + Añadir género
               </a>
            </div>
         </div>
         @if(session('success'))
            <p class="mb-4 text-green-700 bg-green-100 px-4 py-2 rounded">{{ session('success') }}</p>
         @endif
         <table class="w-full text-sm border border-gray-200 rounded overflow-hidden">
            <thead class="bg-gray-50 text-left text-gray-600">
               <tr>
                     <th class="px-4 py-3">Nombre</th>
                     <th class="px-4 py-3">N Libros asociados</th>
                     <th class="px-4 py-3"></th>
               </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
               @foreach($genres as $genre)
               <tr class="hover:bg-gray-50">
                     <td class="px-4 py-3 font-medium"><a href="{{route('admin.genres.show', $genre)}}" class="hover:underline">{{ $genre->name }}</a></td>
                     <td class="px-4 py-3 text-gray-600">{{ $genre->libros_count }}</td>
                     <td class="px-2 py-3 flex gap-x-4 justify-end">
                        <a href="{{ route('admin.genres.edit', $genre) }}" class="text-[#004d42] hover:underline">Editar</a>
                        @if($genre->libros_count === 0)
                        <form method="POST" action="{{ route('admin.genres.destroy', $genre) }}">
                           @csrf
                           @method('DELETE')
                           <button type="submit" class="text-red-500 hover:underline cursor-pointer">Eliminar</button>
                        </form>
                        @else
                        <span title="No se puede eliminar hasta el género no tenga libros asociados">
                           <button disabled class="text-red-300 pointer-events-none">Eliminar</button>
                        </span>
                        @endif
                     </td>
               </tr>
               @endforeach
            </tbody>
         </table>
      </section>
   </div>
</body>
</html>
