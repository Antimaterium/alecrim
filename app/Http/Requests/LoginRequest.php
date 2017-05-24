<?php

namespace alecrim\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'email'     => 'required|max:100|email',
            'password'  => 'required|min:6|max:16'
        ];
    }

    public function messages() {

        return [
            'email.required'    => 'E-mail obrigatório',
            'email.max'         => 'Digite no máximo 100 caracteres',
            'email.email'       => 'Digite um e-mail válido',

            'password.required'    => 'Senha obrigatória',
            'password.min'         => 'Digite no mínimo 8 caracteres',
            'password.max'         => 'Digite no máximo 16 caracteres',
        ];

    }
}
