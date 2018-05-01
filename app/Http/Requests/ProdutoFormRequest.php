<?php

namespace sistemaLaravel\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdutoFormRequest extends FormRequest
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
            'idcategoria'=>'required',
            'codigo'=>'required',
            'modelo'=>'required|max:50',
            'cor'=>'required|max:50',
            'material'=>'max:50',
            'unidadeMedida'=>'max:50',
          
            


        ];
    }
}
