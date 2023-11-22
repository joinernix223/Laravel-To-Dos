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
<<<<<<< HEAD
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
=======
            'name_user' => 'required',
            'email' => 'email:rfc,dns|required',
            'password' => 'required'
        ];
    }
    public function messages(){
        return[
            'name_user.required' => 'Nombre de usuario obligatorio',
            'email.email' => 'Email no valido',
            'email.required' => 'Email Obligatorio',
            'password' => 'Contraseña requerida'
>>>>>>> fc023f1689a83ea2e41d959a25ef05ac30177247
        ];
    }
}
