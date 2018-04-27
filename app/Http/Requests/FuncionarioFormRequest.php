<?php

namespace sistemaLaravel\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FuncionarioFormRequest extends FormRequest
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
            'nomeFuncionario'=>'required|max:45|alpha',
            'rg'=>'required',
            'cpf'=>'required|max:45',
            'sexo'=>'required|max:15',
            'telefone|max:50',
            'celular|max50',
            'whatsapp|max50',
            'email|max50',
            'logradouro'=>'required|max:45',
            'numero'=>'required|max:45',
            'bairro'=>'required|max:45',
            'cep|max:50',
            'dataNascimento'=>'required|date',
        ];
    }
}
