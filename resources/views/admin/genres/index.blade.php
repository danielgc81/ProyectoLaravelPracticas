<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>CloudBook: Administrar Géneros</title>
   @vite('resources/css/app.css')
</head>
<body>
   <x-navbar/>
   <div class="flex flex-col mx-auto max-w-7xl mt-2">
      <div>
         <x-breadcrumbs :breadcrumbs="[
               ['label' => 'Inicio', 'url' => route('welcome')],
               ['label' => 'Administrar libros', 'url' => route('admin.libros.index')],
               ['label' => 'Administrar géneros', 'url' => route('admin.genres.index')],
         ]"/>
      </div>
      <section class="max-w-xl">
         <div class="flex justify-between items-center mb-6 mt-5">
            <h1 class="text-2xl font-bold text-[#004d42] self-end">Administrar géneros</h1>
            <div class="flex gap-x-4">
               <a href="{{ route('admin.genres.create') }}" class="bg-[#f5a623] px-4 py-2 rounded-3xl hover:bg-[#e09520] transition uppercase">
                  + Añadir género
               </a>
            </div>
         </div>
         @if(session('success'))
            <p class="mb-4 text-green-700 bg-green-100 px-4 py-2 rounded">{{ session('success') }}</p>
         @endif
         <table class="w-full text-sm border border-gray-200 rounded overflow-hidden">
            <thead class="bg-gray-50 text-left text-gray-600">
               <tr>
                     <th class="px-4 py-3">Nombre</th>
                     <th class="px-4 py-3">N Libros asociados</th>
                     <th class="px-4 py-3"></th>
               </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
               @foreach($genres as $genre)
               <tr class="hover:bg-gray-50">
                     <td class="px-4 py-3 font-medium">{{ $genre->name }}</td>
                     <td class="px-4 py-3 text-gray-600">{{ $genre->libros_count }}</td>
                     <td class="px-2 py-3 flex gap-x-4 justify-end">
                        <a href="{{ route('admin.genres.edit', $genre) }}" class="text-[#004d42] hover:underline">Editar</a>
                        @if($genre->libros_count === 0)
                        <form method="POST" action="{{ route('admin.genres.destroy', $genre) }}">
                           @csrf
                           @method('DELETE')
                           <button type="submit" class="text-red-500 hover:underline cursor-pointer">Eliminar</button>
                        </form>
                        @else
                        <span title="No se puede eliminar hasta el género no tenga libros asociados">
                           <button disabled class="text-red-300 pointer-events-none">Eliminar</button>
                        </span>
                        @endif
                     </td>
               </tr>
               @endforeach
            </tbody>
         </table>
      </section>
   </div>
</body>
</html>
