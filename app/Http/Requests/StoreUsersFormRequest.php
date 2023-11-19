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
        ];
    }
}
