<?php

namespace Alecrim\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'atendent'      => 'required',
            'order_total'   => 'required',
            'items'         => 'required'
        ];
    }

    public function messages()
    {
        return [
            'required'          => 'Campo obrigatório'
        ];
    }
}
