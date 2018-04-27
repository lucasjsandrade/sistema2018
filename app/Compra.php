<?php

namespace sistemaLaravel;

use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
	protected $table = 'compra';
	protected $primaryKey = 'idcompra';

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
