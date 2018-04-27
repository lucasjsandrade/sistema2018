<?php

namespace sistemaLaravel;

use Illuminate\Database\Eloquent\Model;

class Orcamento extends Model
{
	protected $table = 'orcamento';
	protected $primaryKey = 'idorcamento';

	public $timestamps = false;
	protected $fillable = [
		
		'idcliente',
		'idfuncionario',
		'status',	
		'observacao',	
		'maodeobra',	


		

	];

	protected $guarded = [];   




}
