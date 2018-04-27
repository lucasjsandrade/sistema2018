<?php

namespace sistemaLaravel;

use Illuminate\Database\Eloquent\Model;

class Itensv extends Model
{
 
    protected $table = 'itensv';
	protected $primaryKey = 'iditensv';

	public $timestamps = false;
	protected $fillable = [
	'idvenda',
	'idorcamento',
	'idproduto',
	'quantidade',
	'valorUnitario',
	'valorTotal',
	'desconto',
	'status',

	];




    }
