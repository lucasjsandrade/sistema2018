<?php

namespace sistemaLaravel\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use sistemaLaravel\Http\Requests\Request;

class PaisFormRequest extends FormRequest
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
           
           'nomePais' => 'required',
           'sigla'=>'required|max:3'


           


        ];
    }
}
