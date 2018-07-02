<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EstruturaRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'codigo_pai' => 'required',
            'codigo_filho' => 'required',
            'quantidade' => 'required'
        ];
    }

    public function messages()
    {
        return[
            'required' => 'Campo :attribute obrigatório.',
        ];
    }
}
