<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Registrarse</title>
   @vite('resources/css/app.css')
</head>
<body>
   <main class="flex">
      <form method="POST" action="{{ route('register-validated') }}">
         @csrf
         <div class="">
            <label for="user">Nombre</label>
            <input id="user" type="text" name="name" required>
         </div>
         <div class="">
            <label for="email">Email</label>
            <input id="email" type="email" name="email" required>
         </div>
         <div class="">
            <label for="password">Contraseña</label>
            <input id="password" type="password" name="password" required>
         </div>
         <div class="">
            <p>¿Ya tienes cuenta? <a href="{{ route('login') }}">Inicia sesión</a></p>
         </div>
         <button type="submit">Registrarse</button>
      </form>
   </main>
</body>
</html>
