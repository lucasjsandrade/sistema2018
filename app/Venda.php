<?php

namespace sistemaLaravel;

use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    protected $table = 'venda';
	protected $primaryKey = 'idvenda';

	public $timestamps = false;
	protected $fillable = [
	
    'idcliente',
	'idfuncionario',	
	'dataVenda',	
	'valorTotal',	
	'desconto',	
	'valorFinal',	
	'condicaoPagamento',	
	'status',	
	'origemVenda',	
	'numeroDeParcelas'	

    

    ];

	protected $guarded = [];   



}
