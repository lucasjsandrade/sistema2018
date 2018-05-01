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
            //testa ai zoi
            'idcidade'=>'required',
            'nomeCliente'=>'required',
            'rg'=>'required',
            'cpf'=>'required',
            'sexo'=>'required|max:1',
            'telefone' =>'min:10|max:15',
            'whatsapp'=>'min:10|max:15',
            'celular'=>'min:10|max:15',
            'dataNascimento'=>'date|before:tomorrow',
            'email' => 'min:10|max:50|email',
            'logradouro'=>'required|max:50',
            'numero'=>'min:2|numeric',
            'bairro'=>'required|max:50',
            'cep'=>'min:8',


        ];


    }
}
