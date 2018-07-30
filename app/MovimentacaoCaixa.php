<?php

namespace sistemaLaravel;

use Illuminate\Database\Eloquent\Model;

class MovimentacaoCaixa extends Model
{

    protected $table = 'movimentacaocaixa';
    protected $primaryKey = 'idmovimentacao';

    public $timestamps = false;
    protected $fillable = [
        'idcaixa',
        'idrecebimento',
        'idpagamento',
        'valor',
        'tipoMovimentacao',
        'data',
        'descricao',

    ];

    protected $guarded = [];
}