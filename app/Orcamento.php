<?php

namespace sistemaLaravel;

use Illuminate\Database\Eloquent\Model;

class Orcamento extends Model
{
	protected $table = 'venda';
	protected $primaryKey = 'idvenda';

	public $timestamps = false;
	protected $fillable = [
		
		'idcliente',
		'idfuncionario',
		'iditensv',
		'status',		
		'maodeobra',
		'origemVenda'	


		

	];

	protected $guarded = [];   




}
