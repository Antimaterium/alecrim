<?php

namespace Alecrim\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'product_name'          => 'required|min:2|max:45',
            'product_description'   => 'required|min:10|max:255',
            'product_quantity'      => 'required|numeric',
            'product_price'         => 'required|numeric'
        ];
    }

    public function messages() {

        return [
            //name
            'product_name.required' => 'Preencha o campo',
            'product_name.min'      => 'Digite no minimo 2 caracteres',
            'product_name.max'      => 'Digite no maximo 45 caracteres',
            //description
            'product_description.required'  => 'Preencha o campo',
            'product_description.max'       => 'Digite no maximo 255 caracteres',
            'product_description.min'       => 'Digite no mínimo 10 caracteres',
            //quantity
            'product_quantity.required'     => 'Preencha o campo',
            'product_quantity.numeric'      => 'Digite apenas numeros',
            //price
            'product_price.required'        => 'Preencha o campo ',
            'product_price.numeric'         => 'Digite apenas numeros',
        ];  

    }
}
