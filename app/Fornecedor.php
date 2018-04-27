<?php

namespace sistemaLaravel;

use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{
     protected $table = 'fornecedor';
    protected $primaryKey = 'idfornecedor';

    public $timestamps = false; //criação e atualização de registro
    protected $fillable = [

    'idcidade',
    'razaoSocial',
    'nomeContato',
    'cnpj',
    'inscricaoEstadual',
    'nomeFantasia',
    'telefone',
    'fax',
    'whatsapp',
    'email',
    'logradouro',
    'numero',
    'bairro',
    'cep',

 ];

    protected $guarded = [];
}
