<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShowCategoryFormRequest extends FormRequest
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
            /*
            DUDAS
            -Mandar error a la vista. Al no cumplir validacion
            -Sintaxis de validacion de FormRequest
            */
            'id' =>  'exists:categories,id'

        ];
    }
    public function messages(): array
    {
        return[
            'id.required' => 'El id no existe'
        ];
    }
    
}
