<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Cloudbook: Editar Género</title>
   @vite('resources/css/app.css')
</head>
<body>
   <x-navbar/>
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
