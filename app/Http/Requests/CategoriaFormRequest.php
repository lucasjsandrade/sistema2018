<?php

namespace sistemaLaravel\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;
use sistemaLaravel\BaseModel;


class CategoriaFormRequest extends FormRequest 
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

    
    public function rules(){

        return [

            'nome' => 'required|alpha',
            'descricao'=>'required|alpha',
            'status|alpha',
           // 'nome'=>'sometimes|required|nome|unique:categoria','nome', {{$idcategoria}},


            //'nome' => 'unique:categoria,nome,'.$this->cat->idcategoria


        ];
    }
}