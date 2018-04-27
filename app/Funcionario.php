<?php

namespace sistemaLaravel;

use Illuminate\Database\Eloquent\Model;

class funcionario extends Model
{
    protected $table = 'funcionario';
    protected $primaryKey = 'idfuncionario';

    public $timestamps = false;
    protected $fillable = [

    'idcidade',
     'nomeFuncionario',
     'rg',
     'cpf',
     'sexo',
     'telefone',
     'celular',
     'whatsapp',
     'email',
     'logradouro',
     'numero',
     'bairro',
     'cep',
     'dataNascimento',
     'status',
     'dataCadastro',
    


    ];

    protected $guarded = [];
}
