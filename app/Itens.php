<?php

namespace sistemaLaravel;

use Illuminate\Database\Eloquent\Model;

class ItensPedido extends Model
{
	protected $table = 'itensp';
	protected $primaryKey = 'iditens';

	public $timestamps = false;
	protected $fillable = [
	'idpedido'
	'idproduto',
	'idfornecedor',
    'quantidade',
	'valorUnitario',
	'valorTotal',

	];

	protected $guarded = [];

}
