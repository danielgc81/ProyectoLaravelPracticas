<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Mis Valoraciones</title>
   @vite('resources/css/app.css')
</head>
<body>
   <x-navbar/>
   <div class="max-w-7xl mx-auto">
      <x-breadcrumbs :breadcrumbs="[
         ['label' => 'Inicio', 'url' => route('welcome')],
         ['label' => 'Mis valoraciones', 'url' => route('mis-valoraciones.index')],
      ]"/>
      <section class="w-md mt-5">
         @if(session('success'))
            <p class="mb-4 text-green-700 bg-green-100 px-4 py-2 rounded">{{ session('success') }}</p>
         @endif

         <h1 class="text-2xl font-bold text-[#004d42] mb-6">Mis valoraciones</h1>

         @if($valoraciones->isEmpty())
            <p class="text-gray-400">No tienes ninguna valoración.</p>
         @else
            <div class="flex flex-col gap-4">
                  @foreach($valoraciones as $valoracion)
                  <div class="flex items-center gap-4 border border-gray-200 rounded-lg p-4 shadow-sm {{ $valoracion->trashed() ? 'bg-red-50 opacity-60' : 'bg-white hover:shadow-md transition' }}">
                     @if($valoracion->libro?->image)
                        <img src="{{ asset($valoracion->libro->image) }}" class="w-12 h-16 object-cover rounded shadow shrink-0">
                     @else
                        <div class="w-12 h-16 bg-gray-100 rounded shrink-0"></div>
                     @endif
                     <div class="flex-1 flex flex-col gap-1">
                        <p class="font-semibold text-[#004d42]">{{ $valoracion->libro?->title ?? '—' }}</p>
                        <div class="flex text-base">
                              @for($i = 1; $i <= 5; $i++)
                                 <span class="{{ $i <= $valoracion->estrellas ? 'text-[#f5a623]' : 'text-gray-300' }}">★</span>
                              @endfor
                        </div>
                        <p class="text-xs text-gray-400">{{ $valoracion->created_at->format('d/m/Y H:i') }}</p>
                        @if($valoracion->trashed())
                              <span class="text-red-400 text-xs font-medium">Eliminada</span>
                        @else
                              <span class="text-green-600 text-xs font-medium">Activa</span>
                        @endif
                     </div>
                     <div class="flex items-center gap-3 shrink-0">
                        @if($valoracion->trashed())
                              <form method="POST" action="{{ route('mis-valoraciones.restore', $valoracion->id) }}">
                                 @csrf
                                 @method('PATCH')
                                 <button type="submit" class="text-[#004d42] hover:underline text-xs cursor-pointer">Restaurar</button>
                              </form>
                              <form method="POST" action="{{ route('mis-valoraciones.force-delete', $valoracion->id) }}">
                                 @csrf
                                 @method('DELETE')
                                 <button type="submit" class="text-red-500 hover:underline text-xs cursor-pointer">Eliminar</button>
                              </form>
                        @else
                              <div class="flex items-center gap-4">
                                 <a href="{{ route('valoraciones.edit', $valoracion) }}" class="text-[#ebab21] hover:underline text-xs">Editar</a>
                                 <form method="POST" action="{{ route('mis-valoraciones.soft-delete', $valoracion) }}" class="flex">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:underline text-xs cursor-pointer">Eliminar</button>
                                 </form>
                              </div>
                        @endif
                     </div>
                  </div>
                  @endforeach
            </div>
         @endif
      </section>
   </div>
</body>
</html>
