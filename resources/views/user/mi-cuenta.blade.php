<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>CloudBook: Datos Personales</title>
   @vite('resources/css/app.css')
</head>
<body>
   <x-navbar/>
   <div class="max-w-7xl mx-auto">
      <x-breadcrumbs :breadcrumbs="[
         ['label' => 'Inicio', 'url' => route('welcome')],
         ['label' => 'Mis datos', 'url' => route('user.show', $user)],
      ]"/>
   <!-- Issue #2 -->
      <section class="mt-5 max-w-sm">
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
   </div>
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
