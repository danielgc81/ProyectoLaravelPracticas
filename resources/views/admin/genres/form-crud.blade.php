<div class="flex flex-col gap-4">
   <div>
      <label class="block text-sm font-medium text-gray-700 mb-1">Nombre <span class="text-red-500">*</span></label>
      <input type="text" name="name" value="{{ old('name', $genre->name ?? '') }}"
         class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#004d42]">
      @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
   </div>
   <div>
      <label class="block text-sm font-medium text-gray-700 mb-1">Descripción</label>
      <textarea name="description" rows="3"
         class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#004d42] resize-none">{{ old('description', $genre->description ?? '') }}</textarea>
      @error('description') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
   </div>
   <div>
      <label class="block text-sm font-medium text-gray-700 mb-1">
         Imagen @isset($genre) <span class="text-gray-400 text-xs">(dejar vacío para mantener la actual)</span> @endisset
      </label>
      @isset($genre)
         @if($genre->image)
               <img src="{{ asset($genre->image) }}" class="w-20 mb-2 rounded shadow object-contain">
         @endif
      @endisset
      <input type="file" name="image" accept="image/*"
         class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#004d42]">
      @error('image') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
   </div>
   <div class="flex items-center gap-2">
      <input type="checkbox" name="visible" id="visible" value="1"
         {{ old('visible', $genre->visible ?? true) ? 'checked' : '' }}
         class="w-4 h-4 accent-[#004d42]">
      <label for="visible" class="text-sm font-medium text-gray-700">Visible en web</label>
   </div>
</div>
