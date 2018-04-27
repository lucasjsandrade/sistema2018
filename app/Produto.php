<?php

namespace sistemaLaravel;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $table = 'produto';
    protected $primaryKey = 'idproduto';

    public $timestamps = false;
    protected $fillable = [

    'idcategoria',
    'codigo',
    'modelo',
    'cor',
    'material',
    'unidadeMedida',
    'quantidade',
    'preco',
    'custo',
    'status',
    'dataCadastro',
    
    

    ];

    protected $guarded = [];
}
