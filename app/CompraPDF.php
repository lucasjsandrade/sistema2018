<?php

namespace sistemaLaravel;
use Illuminate\Database\Eloquent\Model;


class CompraPDF extends Model
{
    protected $table = 'compra';
    protected $primaryKey = 'idcompra';
    protected $guarded = ['_token'];
    public $timestamps = false;
    protected $fillable = [


        'idfuncionario',
        'idfornecedor',
        'dataCompra',
        'valorTotal',
        'valorFinal',
        'condicaoPagamento',
        'formaPagamento',
        'status',
        'numeroDeParcelas',

    ];

    protected $guarded = [];
}
