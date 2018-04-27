<?php

namespace sistemaLaravel\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class agendamentoFormRequest extends FormRequest
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
            'idcliente'=>'required',
            'idfuncionario'=>'required',
            'status'=>'required|max:45|alpha',            
            'dataLancamento',
            'dataOrcamento' => 'date|after:yesterday',
            'dataInstalacao' => 'date|after:yesterday',
            'horaMarcada'
           
        

        ];
       
    }
}
