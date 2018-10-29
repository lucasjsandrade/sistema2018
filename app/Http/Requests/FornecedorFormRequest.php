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
            'razaoSocial' => 'required|max:45',        
            'nomeContato' => 'max:45',
            'cnpj' => 'required',            
            'inscricaoEstadual',
            'nomeFantasia' => 'required|max:45',
            'telefone' => 'required|max:15',
            'fax' => 'max:45',
            'whatsapp' => 'max:15',
            'email' => 'max:45',
            'logradouro' => 'required|max:45',
            'bairro' => 'required|max:45',
            'numero' => 'required|max:6',
            'cep' => 'required|max:15',


        ];
    }
}
