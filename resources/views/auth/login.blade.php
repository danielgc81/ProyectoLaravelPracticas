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
      <form method="POST" action="{{ route('log-in') }}" class="bg-gray-200 flex flex-col p-3.5 w-96 rounded-2xl">
         @csrf
         @error('credentials')
            <p>{{ $message }}</p>
         @enderror
         <h1 class="text-2xl font-bold self-center m-2.5">Log in</h1>
         <div class="flex flex-col mb-4">
            <label for="email" class="mb-1.5">Email</label>
            <input id="email" type="email" name="email" required class="bg-white py-1.5 px-3 rounded-xl focus:outline-none text-gray-600">
         </div>
         <div class="flex flex-col mb-6">
            <label for="password" class="mb-1.5">Contraseña</label>
            <input id="password" type="password" name="password" required class="bg-white py-1.5 px-3 rounded-xl focus:outline-none text-gray-600">
         </div>
         <div class="flex items-center justify-between mb-6">
            <div class="flex items-center gap-1.5">
               <input id="remember" type="checkbox" name="remember" class="w-4 h-4 accent-red-500">
               <label for="remember" class="text-xs">Mantener sesión</label>
            </div>
            <div class="">
               <p class="text-xs">¿No tienes cuenta? <a href="{{ route('register') }}" class="text-red-500 underline">Regístrate</a></p>
            </div>
         </div>
         <button type="submit" class="bg-red-500 py-4 rounded-4xl text-white font-bold mb-4 cursor-pointer">Acceder</button>
      </form>
   </main>
</body>
</html>


