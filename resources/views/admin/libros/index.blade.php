<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>CloudBook: Administrar Libros</title>
   @vite('resources/css/app.css')
</head>
<body>
   <x-navbar/>
   <section class="max-w-7xl mx-auto mt-2">
      <x-breadcrumbs :breadcrumbs="[
            ['label' => 'Inicio', 'url' => route('welcome')],
            ['label' => 'Administrar libros', 'url' => route('admin.libros.index')],
      ]"/>
      <div class="flex justify-between items-center mb-6 mt-5">
         <h1 class="text-2xl font-bold text-[#004d42] self-end">Administrar libros</h1>
         <div class="flex gap-x-4">
            <a href="{{ route('admin.genres.index') }}" class="bg-gray-200 text-gray-600 px-4 py-2 rounded-3xl hover:bg-gray-300 transition uppercase">
               Administrar Géneros
            </a>
            <a href="{{ route('admin.libros.create') }}" class="bg-[#f5a623] px-4 py-2 rounded-3xl hover:bg-[#e09520] transition uppercase">
               + Añadir libro
            </a>
         </div>
      </div>
      @if(session('success'))
         <p class="mb-4 text-green-700 bg-green-100 px-4 py-2 rounded">{{ session('success') }}</p>
      @endif
      <table class="w-full text-sm border border-gray-200 rounded overflow-hidden">
         <thead class="bg-gray-50 text-left text-gray-600">
            <tr>
                  <th class="px-4 py-3">Título</th>
                  <th class="px-4 py-3">Autor</th>
                  <th class="px-4 py-3">Género</th>
                  <th class="px-4 py-3">Creado por</th>
                  <th class="px-4 py-3">Fecha</th>
                  <th class="px-4 py-3"></th>
            </tr>
         </thead>
         <tbody class="divide-y divide-gray-100">
            @foreach($libros as $libro)
            <tr class="hover:bg-gray-50">
                  <td class="px-4 py-3 font-medium">{{ $libro->title }}</td>
                  <td class="px-4 py-3 text-gray-600">{{ $libro->author }}</td>
                  <td class="px-4 py-3 text-gray-600">{{ $libro->genre?->name ?? '' }}</td>
                  <td class="px-4 py-3 text-gray-600">{{ $libro->user?->name ?? '—' }}</td>
                  <td class="px-4 py-3 text-gray-400">{{ $libro->created_at ? $libro->created_at->format('d/m/Y H:i') : '—' }}</td>
                  <td class="px-4 py-3">
                     <a href="{{ route('admin.libros.edit', $libro) }}" class="text-[#004d42] hover:underline">Editar</a>
                  </td>
            </tr>
            @endforeach
         </tbody>
      </table>
   </section>
</body>
</html>

