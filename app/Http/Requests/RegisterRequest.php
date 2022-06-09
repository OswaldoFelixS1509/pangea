<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'nombre' => 'required',
            'usuario' => 'required|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'contraseña' => 'required',
            'confirmacion_contraseña' => 'required|same:contraseña',

        ];
    }
}
