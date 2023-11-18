<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUsersFormRequest extends FormRequest
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
            'name_user' => 'max:10|required',
            'email' => 'email:rfc,dns',
            'password' => 'required',
        ];
    }
    public function messages()
    {
        return[
            'user.required' => 'Nombre de usuario requerido',
            'user.max' => 'Maximo 10 cararacteres',
            'email' => 'Email no valido',
            'password' => 'Contraseña obligatoria'
        ];
    }
}
