<?php

namespace sistemaLaravel\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class fornecedorFormRequest extends FormRequest
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

            'idcidade' => 'required',
            'razaoSocial' => 'required|max:45|alpha',
        
            'nomeContato' => 'max:45',
            'cnpj' => 'required',            
            'inscricaoEstadual' => 'required',
            'nomeFantasia' => 'required|max:45|alpha',
            'telefone' => 'required|max:45',
            'fax' => 'max:45',
            'whatsapp' => 'max:45',
            'email' => 'max:45',
            'logradouro' => 'required|max:45|alpha',
            'bairro' => 'required|max:45',
            'numero' => 'required|max:45',
            'cep' => 'max:45',


        ];
    }
}
