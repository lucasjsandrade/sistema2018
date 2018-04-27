<?php

namespace sistemaLaravel\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompraFormRequest extends FormRequest
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

        'idproduto',
        'idfornecedor' => 'required',
        'quantidade', 
        'numeroDeParcelas',
        'valorTotal',
        'valorUnitario'=>'min:0',
        'idfuncionario' => 'required',
        'condicaoPagamento',
        'formaPagamento',




        ];
    }
}
