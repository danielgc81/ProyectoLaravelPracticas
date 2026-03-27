<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>CloudBook: Datos Personales</title>
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
                     <a href="{{ route('admin.libros.index') }}" class="block py-1 hover:text-[#004d42]">Administar libros</a>

                     <hr class="my-2">

                     <a href="{{ route('logout') }}" class="flex items-center gap-2">
                        <img src="https://cdn-icons-png.flaticon.com/128/5565/5565704.png" alt="Cerrar sesion" class="w-5 h-5">
                        <button type="button" class="text-red-500 cursor-pointer">
                           Salir
                        </button>
                     </a>
                  @endauth
            </div>
         </div>
      </div>
   </nav>
   <div class="ml-14">
      <x-breadcrumbs :breadcrumbs="[
      ['label' => 'Inicio', 'url' => route('welcome')],
      ['label' => 'Mis datos', 'url' => route('user.show', $user)],
   ]"/>
   </div>
<!-- Issue #2 -->
   <section class="mt-5 ml-15 max-w-sm">
      <h1 class="text-6xl text-[#004d42] font-bold">Mi Cuenta</h1>
      <article class="flex flex-col gap-10 mt-8">
         <div>
            <form action="{{ route('user.update', $user->id) }}" method="POST">
               @csrf
               @method('PUT')
               <label for="name" class="font-light text-[#737373]">Nombre de usuario</label>
               <div class="mt-4 flex justify-between">
                  <input class="py-1 px-3 border-l border-b rounded-bl-md border-[#004d42] outline-none" type="text" id="name" name="name" maxlength="25" value="{{$user->name}}" required>
                  <button type="submit" name="form_type" value="name" class="bg-[#ebab21] outline-2 outline-[#ebab21] py-1.5 px-6 text-sm uppercase rounded-4xl cursor-pointer hover:bg-[#e09520] hover:outline-[#e09520] transtion">Actualizar</button>
               </div>
               @if($errors->nameErrors->any())
                  @foreach($errors->nameErrors->all() as $error)
                     <span class="text-xs text-red-500">{{ $error }}</span>
                  @endforeach
               @endif
               @if(session('success_name'))
                  <span class="text-xs text-green-500">{{ session('success_name') }}</span>
               @endif
            </form>
         </div>
         <div>
            <form action="{{ route('user.update', $user->id) }}" method="POST">
               @csrf
               @method('PUT')
               <label for="email" class="font-light text-[#737373]">Correo electrónico</label>
               <div class="mt-4 flex justify-between">
                  <input class="py-1 px-3 border-l border-b rounded-bl-md border-[#004d42] outline-none" type="email" id="email" name="email" value="{{$user->email}}" required>
                  <button type="submit" name="form_type" value="email" class="bg-[#ebab21] outline-2 outline-[#ebab21] py-1.5 px-6 text-sm uppercase rounded-4xl cursor-pointer hover:bg-[#e09520] hover:outline-[#e09520] transtion">Actualizar</button>
               </div>
               @if($errors->emailErrors->any())
                  @foreach($errors->nameErrors->all() as $error)
                     <span class="text-xs text-red-500">{{ $error }}</span>
                  @endforeach
               @endif
               @if(session('success_email'))
                  <span class="text-xs text-green-500">{{ session('success_email') }}</span>
               @endif
            </form>
         </div>
         <div>
            <form action="{{ route('user.update', $user->id) }}" method="POST" class="flex flex-col gap-3 mt-10">
               @csrf
               @method('PUT')
               <div class="flex flex-col">
                  <label for="password" class="font-light text-[#737373]">Nueva Contraseña</label>
                  <input type="password" id="password" name="password" class="mt-4 py-1 px-3 text-sm border rounded-md border-[#004d42] outline-none">
               </div>
               <div class="flex flex-col">
                  <label for="password_confirmation" class="font-light text-[#737373]">Confirmar Contraseña</label>
                  <input type="password" id="password_confirmation" name="password_confirmation" class="mt-4 py-1 px-3 text-sm border rounded-md border-[#004d42] outline-none">
               </div>
               @if(session('success_password'))
                  <span class="text-xs text-green-500">{{ session('success_password') }}</span>
               @endif
               <div class="flex justify-center">
                  <button type="submit"  id="btn-password" name="form_type" value="password" class="bg-[#ebab21] mt-3 outline-2 opacity-50 pointer-events-none outline-[#ebab21] hover:outline-[#e09520] py-1.5 px-6 text-sm uppercase rounded-4xl cursor-pointer hover:bg-[#e09520] transtion">Actualizar</button>
               </div>
            </form>
         </div>
      </article>
   </section>
   <script>
      // Este codigo comprueba que las contraseñas sean iguales, mientras no lo sean el boton de actualizar aparece deshabilitado
      const password = document.getElementById('password');
      const confirmation = document.getElementById('password_confirmation');
      const btn = document.getElementById('btn-password');

      function checkPasswords() {
         const match = password.value.length >= 8 && password.value === confirmation.value;
         if (match) {
            btn.style.opacity = '1';
            btn.style.pointerEvents = 'auto';
         } else {
            btn.style.opacity = '0.5';
            btn.style.pointerEvents = 'none';
         }
      }

      password.addEventListener('input', checkPasswords);
      confirmation.addEventListener('input', checkPasswords);
   </script>
</body>
</html>
