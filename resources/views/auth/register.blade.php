<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Registrarse</title>
   @vite('resources/css/app.css')
</head>
<body>
   <main class="bg-red-400 h-dvh flex justify-center items-center">
      <form method="POST" action="{{ route('register-validated') }}" class="bg-gray-100 flex flex-col p-3.5 w-96 rounded-2xl shadow-xl">
         @csrf
         <h1 class="text-3xl font-bold self-center m-2.5">Registrarse</h1>
         <div class="flex flex-col mb-4">
            <label for="user" class="mb-1.5">Nombre de Usuario</label>
            <input id="user" type="text" name="name" required class="bg-white py-1.5 px-3 rounded-xl focus:outline-none text-gray-600">
            @error('name')
               <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
            @enderror
         </div>
         <div class="flex flex-col mb-6">
            <label for="email" class="mb-1.5">Email</label>
            <input id="email" type="email" name="email" required class="bg-white py-1.5 px-3 rounded-xl focus:outline-none text-gray-600">
            @error('email')
               <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
            @enderror
         </div>
         <div class="flex flex-col mb-6">
            <label for="password" class="mb-1.5">Contraseña</label>
            <input id="password" type="password" name="password" required class="bg-white py-1.5 px-3 rounded-xl focus:outline-none text-gray-600">
            @error('password')
               <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
            @enderror
         </div>
         <button type="submit" class="bg-red-500 outline-2 outline-red-500 py-4 rounded-4xl text-white font-bold mb-4 cursor-pointer">Registrarse</button>
         <a href="{{ route('login') }}" class="py-4 rounded-4xl text-red-500 outline-2 outline-red-500 font-bold mb-4 cursor-pointer text-center">Log in</a>
      </form>
   </main>
</body>
</html>
