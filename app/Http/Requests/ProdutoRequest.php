<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdutoRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

   public function rules()
    {
        return [
            'codigo' => 'required',
            'descricao' => 'required|min:3',
            'custo_unitario' => 'required'
        ];
    }

    public function messages()
    {
        return[
            'required' => 'Campo :attribute obrigatório.',
            'min' => 'O campo :attribute deve conter pelo menos :min caracteres'
        ];
    }

}
