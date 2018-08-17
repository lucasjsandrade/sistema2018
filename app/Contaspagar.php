<?php

namespace sistemaLaravel;

use Illuminate\Database\Eloquent\Model;

class Contaspagar extends Model
{
	protected $table = 'contaspagar';
	protected $primaryKey = 'idcontasp';

	public $timestamps = false;
	protected $fillable = [
		'idcompra',
		'idfornecedor',
		'parcela',	
		'data',
		'valor',
		'descricao'

	];


	protected $guarded = [];

}
