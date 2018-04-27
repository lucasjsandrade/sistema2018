<?php

namespace sistemaLaravel;

use Illuminate\Database\Eloquent\Model;

class Itensp extends Model
{
	protected $table = 'itensp';
	protected $primaryKey = 'iditens';

	public $timestamps = false;
	protected $fillable = [
	'idpedido',
	'idproduto',
	'quantidade',
	'valorUnitario',
	'valorTotal',

	];

	protected $guarded = [];

}
