<?php

namespace sistemaLaravel\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteFormRequest extends FormRequest
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
            'idcidade'=>'required',
            'nomeCliente'=>'required|alpha',
            'rg'=>'required',
            'cpf'=>'required',
            'sexo'=>'required|max:1',
            'telefone' =>'min:10|max:15',
            'whatsapp'=>'numeric',
            'celular'=>'min:10|max:15',
            'email' => 'min:10|max:50|email',
            'logradouro'=>'required|max:50',
            'numero'=>'min:2|numeric',
            'bairro'=>'required|max:50',
            'cep'=>'min:8',
            'dataNascimento'=>'required'
        ];

                   
    }
}
