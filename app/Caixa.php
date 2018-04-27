<?php

namespace sistemaLaravel;

use Illuminate\Database\Eloquent\Model;

class Caixa extends Model
{
	protected $table = 'caixa';
	protected $primaryKey = 'idcaixa';

	public $timestamps = false;
	protected $fillable = [



		'idmovimentacaocaixa',
		'data',
		'saldoInicial',
		'saldoFinal',
		'diferenca',
		'situacao',

		protected $guarded = [];
	}
