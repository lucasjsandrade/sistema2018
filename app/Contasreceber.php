<?php

namespace sistemaLaravel;

use Illuminate\Database\Eloquent\Model;

class Contasreceber extends Model
{
    protected $table = 'contasreceber';
	protected $primaryKey = 'idcontasr';

	public $timestamps = false;
	protected $fillable = [
		'idvenda',
		'idcliente',
		'parcela',	
		'data',
		'valor',
		'descricao',
		'status'

	];

	protected $guarded = [];

}
