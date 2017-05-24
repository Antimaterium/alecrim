<?php

namespace alecrim\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name'                  => 'required|min:10|max:100',
            'email'                 => 'required|max:100|email',
            'permission'            => 'required',
            'password'              => 'required|min:8|string|confirmed', 
            'password-confirm'      => 'required|min:8|string'
        ];
    }

    public function messages() {

        return [
            //name
            'name.required'         => 'Preencha o campo',
            'name.min'              => 'Digite no mínimo 10 caracteres',
            'name.max'              => 'Digite no máximo 100 caracteres',
            //email
            'email.required'        => 'Preencha o campo',
            'email.max'             => 'Digite no máximo 100 caracteres',
            'email.email'           => 'E-mail inválido',
            //permission
            'permission.required'   => 'Preencha o campo',

            //password
            'password.required'     => 'Preencha o campo',
            'password.min'          => 'Digite no mínimo 8 caracteres',
            'password.confirmed'    =>  'Os campos de senha não coincidem',

            //password-confirm
            'password-confirm.required'    => 'Preencha o campo',
            'password-confirm.min'         => 'Digite no mínimo 8 caracteres'
        ];  

    }
}
