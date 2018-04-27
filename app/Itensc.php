<?php

namespace sistemaLaravel;

use Illuminate\Database\Eloquent\Model;

class Itensc extends Model
{
    protected $table = 'itensc';
	protected $primaryKey = 'iditensc';

	public $timestamps = false;
	protected $fillable = [
	'idcompra',
	'idproduto',
	'quantidade',
	'valorUnitario',
	'valorTotal',

	];

	protected $guarded = [];
}
