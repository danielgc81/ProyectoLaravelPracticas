<?php

namespace App\Http\Requests\Genres;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateGenreRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'        => 'required|string|max:100|unique:genres',
            'image'       => 'image|mimes:jpg,jpeg,png,webp|max:2048',
            'description' => 'required|string',
            'visible'     => 'boolean',
        ];
    }
}
