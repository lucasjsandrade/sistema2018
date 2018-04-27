<?php

namespace sistemaLaravel;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
     protected $table = 'cliente';
    protected $primaryKey = 'idcliente';

    public $timestamps = false;
    protected $fillable = [

     'idcidade',
     'nomeCliente',
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
