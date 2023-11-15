<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryFormRequest extends FormRequest
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
            'name' => ['required', 'unique:categories', 'max:25'],
            'color' => ['required']
        ];
    }
    public function messages(): array
    {
        return[
            'name.required' => 'El nombre de la categoria es obligatorio',
            'name.unique' => 'El nombre de la categoria ya existe ',
            'color.required' => 'El color es obigatorio',
        ];
    }
    
}
