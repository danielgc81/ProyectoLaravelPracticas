<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Inicio de Sesión</title>
   @vite('resources/css/app.css')
</head>
<body>
   <main class=" bg-red-400 h-dvh flex justify-center items-center">
      <form method="POST" action="{{ route('log-in') }}" class="bg-gray-100 flex flex-col p-3.5 w-96 rounded-2xl shadow-xl">
         @csrf
         <h1 class="text-3xl font-bold self-center m-2.5">Log in</h1>
         @error('credentials')
            <div class="flex items-center bg-red-300 gap-4 text-white border border-red-500 py-2 px-1.5 mb-2.5">
               <img src="https://cdn-icons-png.flaticon.com/128/463/463612.png" alt="Error credenciales" class="max-w-8 h-8">
               <p>{{ $message }}</p>
            </div>
         @enderror
         <div class="flex flex-col mb-4">
            <label for="email" class="mb-1.5">Email</label>
            <input id="email" type="email" name="email" required class="bg-white py-1.5 px-3 rounded-xl focus:outline-none text-gray-600">
         </div>
         <div class="flex flex-col mb-6">
            <label for="password" class="mb-1.5">Contraseña</label>
            <input id="password" type="password" name="password" required class="bg-white py-1.5 px-3 rounded-xl focus:outline-none text-gray-600">
         </div>
         <div class="flex items-center justify-between mb-8">
            <div class="flex items-center gap-1.5">
               <input id="remember" type="checkbox" name="remember" class="w-4 h-4 accent-red-500">
               <label for="remember" class="text-xs">Mantener sesión</label>
            </div>
            <div class="">
               <p class="text-xs">¿No tienes cuenta? <a href="{{ route('register') }}" class="text-red-500 underline">Regístrate</a></p>
            </div>
         </div>
         <button type="submit" class="bg-red-500 outline-2 outline-red-500 py-4 rounded-4xl text-white font-bold mb-4 cursor-pointer">Acceder</button>
      </form>
   </main>
</body>
</html>


