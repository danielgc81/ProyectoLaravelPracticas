<?php

namespace App\Http\Requests\Libro;

use Illuminate\Foundation\Http\FormRequest;

class UpdateLibroRequest extends FormRequest
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
            'title'=> 'required|string|max:255',
            'author'=> 'required|string|max:255',
            'editorial' => 'required|string|max:255',
            'year' => 'required|integer|max:' . date('Y'),
            'ISBN' => 'required|string|max:20',
            'genre'  => 'required|string|max:100',
            'synopsis' => 'required|string',
            'image' => 'nullable|¡image|mimes:jpg,jpeg,png,webp|max:2048',
        ];
    }
}
