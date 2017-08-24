<?php

namespace Alecrim\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemRequest extends FormRequest
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
            'item_name'             => 'required|min:2|max:45',
            'item_description'      => 'required|min:5|max:255',
            'item_category'        => 'required|min:5|max:255',
            'item_price'            => 'required|numeric'
        ];
    }

     public function messages() {

        return [
            //name
            'item_name.required' => 'Preencha o campo',
            'item_name.min'      => 'Digite no minimo 2 caracteres',
            'item_name.max'      => 'Digite no maximo 45 caracteres',
            //description
            'item_description.required'  => 'Preencha o campo',
            'item_description.max'       => 'Digite no maximo 255 caracteres',
            'item_description.min'       => 'Digite no mínimo 5 caracteres',
            //categoria
            'item_category.required'  => 'Selecione o campo',
            'item_category.min'       => 'Digite no mínimo 5 caracteres',
            //price
            'item_price.required'        => 'Preencha o campo ',
            'item_price.numeric'         => 'Digite apenas numeros',
        ];  

    }
}
