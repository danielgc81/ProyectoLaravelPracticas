@props(['breadcrumbs' => []]) {{-- Este componente recibe un prop que por defecto es un array vacío --}}

@if(count($breadcrumbs) > 1) {{-- Solo renderizamos el breadcrumb si hay más de un elemento --}}
<section class="inline-block py-2.5 mb-1 border-gray-200 border-b">
   <ol class="inline-flex items-center gap-1.5 text-sm list-none">
      @foreach($breadcrumbs as $index => $crumb) {{-- iteramos sobre cada crumb --}}
         @if(!$loop->last) {{-- Si no es el última creamos un enlace clickable seguido de separador > --}}
               <li>
                  <a href="{{ $crumb['url'] }}" class="text-[#004d42] hover:underline">
                     {{ $crumb['label'] }}
                  </a>
               </li>
               <li class="text-gray-400">></li>
         @else {{-- Si es el ultimo pintamos solo el texto sin enlace y lo mostramos mas weight y un color diferente para indicar de manera clara donde estás --}}
               <li class="text-gray-300 font-medium">{{ $crumb['label'] }}</li>
         @endif
      @endforeach
   </ol>
</section>
@endif
