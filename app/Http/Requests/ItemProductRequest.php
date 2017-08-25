<?php

namespace Alecrim\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemProductRequest extends FormRequest
{
    
    public function authorize()
    {
        return false;
    }

    public function rules()
    {
       return [
          'product_id'  => 'required',
          'item_id'     => 'required'
        ];
    }

    public function  messages() {
        'product_id'  => 'ID do produto é obrigatório',
        'item_id'     => 'ID do item é obrigatório'
    }
    
}
