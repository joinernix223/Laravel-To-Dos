<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTodosFormRequest extends FormRequest
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
            //
            'title' => ['required', 'max:25'],
            'category_id' => ['exists:categories,id']
        ];
    }

    public function messages()
    {
        return[
            'title.required' => 'El titulo es obligatorio',
            'title.max' => 'El Titulo debe contener maximo 25 caracteres',
            'category_id.exists' => 'La Categoria no existe'
        ];
    }
}
