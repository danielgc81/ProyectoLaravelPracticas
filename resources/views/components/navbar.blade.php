<nav class="bg-white w-full border-b border-b-[#004d42] p-4 mb-2 sticky top-0">
   <div class="max-w-7xl mx-auto flex justify-between items-center">
      <a href="{{ route('welcome') }}">
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
                  @if(Auth::user()->esAdministrador())
                     <a href="{{ route('admin.libros.index')}}" class="block py-1 hover:text-[#004d42]">Administrar libros</a>
                  @endif
                  <a href="{{ route('favoritos.index') }}" class="block py-1 hover:text-[#004d42]">Mis favoritos</a>

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
