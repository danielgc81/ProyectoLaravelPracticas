<div class="flex gap-4">
   <div class="flex flex-col w-[30%] gap-4">
      <div>
         <label class="block text-sm font-medium text-gray-700 mb-1">Título <span class="text-red-500">*</span></label>
         <input type="text" name="title" value="{{ old('title', $libro->title ?? '') }}"
            class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#004d42]">
         @error('title') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
      </div>
      <div>
         <label class="block text-sm font-medium text-gray-700 mb-1">Autor <span class="text-red-500">*</span></label>
         <input type="text" name="author" value="{{ old('author', $libro->author ?? '') }}"
            class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#004d42]">
         @error('author') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
      </div>
      <div>
         <label class="block text-sm font-medium text-gray-700 mb-1">Editorial <span class="text-red-500">*</span></label>
         <input type="text" name="editorial" value="{{ old('editorial', $libro->editorial ?? '') }}"
            class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#004d42]">
         @error('editorial') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
      </div>
      <div>
         <label class="block text-sm font-medium text-gray-700 mb-1">Año <span class="text-red-500">*</span></label>
         <input type="number" name="year" value="{{ old('year', $libro->year ?? '') }}" max="{{ date('Y') }}" {{-- Esto evita que se escriban años sin sentido --}}
            class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#004d42]">
         @error('year') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
      </div>
   </div>
   <div class="flex flex-col w-[30%] gap-4">
      <div>
         <label class="block text-sm font-medium text-gray-700 mb-1">ISBN <span class="text-red-500">*</span></label>
         <input type="text" name="ISBN" value="{{ old('ISBN', $libro->ISBN ?? '') }}"
            class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#004d42]">
         @error('ISBN') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
      </div>
      <div>
         <label class="block text-sm font-medium text-gray-700 mb-1">Género <span class="text-red-500">*</span></label>
         <select name="genre" id="genre-select"
            class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#004d42]">
            <option value="">Selecciona un género</option>
            @foreach($genres as $genre)
                  <option value="{{ $genre }}" {{ old('genre', $libro->genre ?? '') === $genre ? 'selected' : '' }}>
                     {{ $genre }}
                  </option>
            @endforeach
            <option value="nuevo">Otro (nuevo género)</option>
         </select>
         <input type="text" id="genre-new" placeholder="Nuevo género"
            class="hidden mt-2 w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#004d42]">
         @error('genre') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
      </div>
      <div>
         <label class="block text-sm font-medium text-gray-700 mb-1">Sinopsis <span class="text-red-500">*</span></label>
         <textarea name="synopsis" rows="5"
            class="w-full resize-none h-29.5 border border-gray-300 rounded px-3 py-1.5 text-sm focus:outline-none focus:ring-2 focus:ring-[#004d42]">{{ old('synopsis', $libro->synopsis ?? '') }}</textarea>
         @error('synopsis') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
      </div>
   </div>
   <div class="w-[30%]">
      <label class="block text-sm font-medium text-gray-700 mb-1">
         Subir Portada
      </label>
      @isset($libro)
         @if($libro->image)
            <img src="{{ asset($libro->image) }}" class="w-20 mb-2 rounded shadow object-contain">
         @endif
      @endisset
      <input type="file" name="image" accept="image/*"
         class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#004d42]">
      @error('image') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
   </div>
</div>
<script>
   // Este funcion se ejecuta cuando se manda el formulario y comprueba cual de los dos (select o el input) debe enviar
   function resolveGenre() {
      const select = document.getElementById('genre-select');
      const input  = document.getElementById('genre-new');
      if (select.value === 'nuevo' && input.value.trim()) {
         select.value = input.value.trim();
      }
   }

   // Esta funciona permite mostrar el input cuando seleccionamos un Otro en en el select y que desaparezca cuando seleccionamos un genero que existe en nuestra bbdd
   function toggleNewGenre(select) {
      const input = document.getElementById('genre-new');
      if (select.value === 'nuevo') {
         input.name = 'genre';
         select.name = '';
         input.classList.remove('hidden');
         input.focus();
      } else {
         input.name = '';
         select.name = 'genre';
         input.classList.add('hidden');
      }
   }

   document.getElementById('genre-select').addEventListener('change', function() {
      toggleNewGenre(this);
   });
</script>
