<?php

namespace App\Http\Requests\Valoracion;

use Illuminate\Foundation\Http\FormRequest;

class CreateValoracionRequest extends FormRequest
{
   /**
    * Determine if the user is authorized to make this request.
    */
   public function authorize(): bool
   {
      return true;
   }

   /**
    * Get the validation rules that apply to the request.
    *
    * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
    */
   public function rules(): array
   {
      return [
         'libro_id'   => ['required', 'integer', 'exists:libros,id'],
         'comentario' => ['required', 'string'],
         'estrellas'  => ['required', 'integer', 'min:1', 'max:5'],
      ];
   }
}
