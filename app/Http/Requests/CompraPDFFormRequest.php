<?php

namespace sistemaLaravel\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompraPDFFormRequest extends FormRequest
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
            'idfornecedor',
            'quantidade',
            'numeroDeParcelas',
            'valorTotal',
            'valorUnitario',
            'idfuncionario',
            'condicaoPagamento',
            'formaPagamento',




        ];
    }
}
