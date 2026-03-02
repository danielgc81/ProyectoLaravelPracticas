<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Inicio de Sesión</title>
   @vite('resources/css/app.css')
</head>
<body>
   <main class="flex">
      <form method="POST" action="{{ route('log-in') }}">
         @csrf
         <div class="">
            <label for="email">Email</label>
            <input id="email" type="email" name="email" required>
         </div>
         <div class="">
            <label for="password">Contraseña</label>
            <input id="password" type="password" name="password" required>
         </div>
         <div class="">
            <input id="remember" type="checkbox" name="remember">
            <label for="remember">Mantener sesión</label>
         </div>
         <div class="">
            <p>¿No tienes cuenta? <a href="{{ route('register') }}">Regístrate</a></p>
         </div>
         <button type="submit">Acceder</button>
      </form>
   </main>
</body>
</html>


